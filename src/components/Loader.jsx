import { useEffect, useRef, useState } from 'react'
import { IMG } from '../data/images.js'
import './Loader.css'

// Geometry measured from the real asset (P LOGO.png, 1262x1246, genuinely
// transparent) via pixel analysis (alpha-aware ray-scan from the dot
// center):
//  - REST: the baked orange dot's center (where the settled circle sits)
//  - GATE: the one open gap in the ink ring, found at ~122deg from the dot
//    center (the lower-left aperture) — the true physical opening
//  - ink bounding box (23.3%-75.3% x, 14.1%-90.2% y) used to size the outer
//    orbit so it clears the glyph entirely — the orbit must read as outside
//    the P, never inside it.
const SIZE = 200
const REST_X = SIZE * 0.495
const REST_Y = SIZE * 0.395
const HOLE_R = SIZE * 0.0815
const GATE_X = SIZE * 0.432
const GATE_Y = SIZE * 0.4955

const CENTER_X = SIZE * 0.5
const CENTER_Y = SIZE * 0.5
const ORBIT_R = SIZE * 0.52 // clears the ink bbox corners with margin

// Three fixed anchors, per spec — never recomputed per-loop:
//  BOTTOM_POINT: lowest point of the external orbit, directly under the P.
//  TOP_POINT: highest point of the external orbit, directly above the P.
//  Orbit angle convention: a=0 is +x (right), a=+pi/2 is straight down.
const BOTTOM_POINT = { x: CENTER_X, y: CENTER_Y + ORBIT_R }
const TOP_POINT = { x: CENTER_X, y: CENTER_Y - ORBIT_R }

const MIN_VISIBLE_MS = 1800
const LAP_SECONDS = 2.5 // balanced premium orbit speed
const HOP_SECONDS = 0.45 // gate<->bottom, each leg
const LIQUIFY_SECONDS = 0.52 // internal curved roll + liquefaction, each direction — deliberate, not heavy

// REST -> GATE internal path is a single curved roll (quadratic bezier), not
// a straight hop — reads as controlled liquid movement inside the chamber.
// The exact same curve is reused in reverse for reabsorption (REABSORB uses
// the identical control point), per the symmetry requirement. Bulge kept
// tight so the curve never approaches the ink ring — clearance over drama.
const REST_PT = { x: REST_X, y: REST_Y }
const GATE_PT = { x: GATE_X, y: GATE_Y }
const GATE_DX = GATE_X - REST_X
const GATE_DY = GATE_Y - REST_Y
const GATE_DIST = Math.hypot(GATE_DX, GATE_DY)
const CURVE_BULGE = SIZE * 0.035
const CTRL_PT = {
  x: (REST_X + GATE_X) / 2 + (-GATE_DY / GATE_DIST) * CURVE_BULGE,
  y: (REST_Y + GATE_Y) / 2 + (GATE_DX / GATE_DIST) * CURVE_BULGE,
}

function lerp(a, b, t) {
  return a + (b - a) * t
}
function easeInOutCubic(t) {
  return t < 0.5 ? 4 * t * t * t : 1 - (-2 * t + 2) ** 3 / 2
}
// Slow-start position curve: the liquid visibly gathers/rolls near its
// origin before it noticeably starts travelling — used for the liquify leg
// so the exit reads as internal anticipation building into motion.
function easeGather(t) {
  return Math.pow(t, 2.7) // slow start (liquid gathering), fast finish
}
// Mirror of easeGather for reabsorption: flows in quickly, then eases into
// place as it reforms the resting circle — matches the exit curve reversed.
function easeSettle(t) {
  return 1 - Math.pow(1 - t, 2.7)
}
function quadBezier(p0, p1, p2, t) {
  const mt = 1 - t
  return {
    x: mt * mt * p0.x + 2 * mt * t * p1.x + t * t * p2.x,
    y: mt * mt * p0.y + 2 * mt * t * p1.y + t * t * p2.y,
  }
}
function quadBezierTangentDeg(p0, p1, p2, t, reverse) {
  const mt = 1 - t
  let dx = 2 * mt * (p1.x - p0.x) + 2 * t * (p2.x - p1.x)
  let dy = 2 * mt * (p1.y - p0.y) + 2 * t * (p2.y - p1.y)
  if (reverse) {
    dx = -dx
    dy = -dy
  }
  return (Math.atan2(dy, dx) * 180) / Math.PI
}
// Progressive circle -> asymmetric droplet shape: front corners (the +x
// travel direction, before rotate()) stay round, rear corners taper —
// amount 0 is a perfect circle, amount 1 is a directional liquid form.
function liquidBorderRadius(amount) {
  const front = 50 + amount * 18
  const rear = 50 - amount * 24
  return `${rear}% ${front}% ${front}% ${rear}% / ${rear}% ${front}% ${front}% ${rear}%`
}
// Outer orbit, anchored so theta=0 is always BOTTOM_POINT and theta=PI is
// always TOP_POINT — every lap has the identical designed structure: rise
// via the left side (past the gate's side of the glyph), linger at the top,
// descend via the right side, back to the bottom. Never a random phase.
function orbitPoint(theta) {
  return { x: CENTER_X - ORBIT_R * Math.sin(theta), y: CENTER_Y + ORBIT_R * Math.cos(theta) }
}
function orbitTangentDeg(theta) {
  const dx = -Math.cos(theta)
  const dy = -Math.sin(theta)
  return (Math.atan2(dy, dx) * 180) / Math.PI
}

// Bell-curve dip centered on theta = PI (TOP_POINT, always): a short,
// subtle, premium slowdown — never a long pause, never a full stop.
function speedMultiplier(theta) {
  const wrapped = ((theta % (Math.PI * 2)) + Math.PI * 2) % (Math.PI * 2)
  const d = wrapped - Math.PI
  return 1 - 0.42 * Math.exp(-((d / 0.34) ** 2))
}

const TRAIL_OFFSETS = [0.3, 0.56, 0.8] // radians behind the main streak
const TRAIL_OPACITY = [0.62, 0.4, 0.22]
const TRAIL_SCALES = [0.58, 0.44, 0.3] // large -> medium -> small

// State machine order:
// liquify -> toBottom -> orbit -> finishing -> toGate -> reflow -> settle -> fade -> hidden
export default function Loader() {
  const [phase, setPhase] = useState('liquify')
  const phaseRef = useRef('liquify')
  const dotRef = useRef(null)
  const trailRefs = useRef([])
  const thetaRef = useRef(0)
  const hopRef = useRef(0)
  const targetRef = useRef(null)
  const readyRef = useRef(false)
  const mountedAt = useRef(performance.now())
  const reducedMotion = useRef(
    typeof window !== 'undefined' && window.matchMedia('(prefers-reduced-motion: reduce)').matches
  )

  const setPhaseBoth = (p) => {
    phaseRef.current = p
    setPhase(p)
  }

  // Readiness: window load + a minimum display time so the animation never
  // feels like a flicker on fast connections.
  useEffect(() => {
    let cancelled = false
    const markReady = () => {
      const elapsed = performance.now() - mountedAt.current
      const wait = Math.max(0, MIN_VISIBLE_MS - elapsed)
      window.setTimeout(() => {
        if (!cancelled) readyRef.current = true
      }, wait)
    }
    if (document.readyState === 'complete') {
      markReady()
    } else {
      window.addEventListener('load', markReady, { once: true })
    }
    return () => {
      cancelled = true
      window.removeEventListener('load', markReady)
    }
  }, [])

  // Blur + darken the real site behind the loader; lifted once we fade out.
  useEffect(() => {
    document.documentElement.classList.add('is-loading')
    return () => document.documentElement.classList.remove('is-loading')
  }, [])
  useEffect(() => {
    if (phase === 'fade' || phase === 'hidden') {
      document.documentElement.classList.remove('is-loading')
    }
  }, [phase])

  useEffect(() => {
    if (reducedMotion.current) {
      const dot = dotRef.current
      if (dot) {
        dot.style.width = `${HOLE_R * 2}px`
        dot.style.height = `${HOLE_R * 2}px`
        dot.style.transform = `translate(${REST_X - HOLE_R}px, ${REST_Y - HOLE_R}px)`
      }
      const poll = window.setInterval(() => {
        if (readyRef.current) {
          window.clearInterval(poll)
          setPhaseBoth('settle')
          window.setTimeout(() => setPhaseBoth('fade'), 200)
          window.setTimeout(() => setPhaseBoth('hidden'), 700)
        }
      }, 80)
      return () => window.clearInterval(poll)
    }

    let raf
    let last = performance.now()

    const placeDot = (x, y, r, opts = {}) => {
      const dot = dotRef.current
      if (!dot) return
      const { rotateDeg = 0, stretch = 1, squash = 1, borderRadius = '50%' } = opts
      dot.style.width = `${r * 2}px`
      dot.style.height = `${r * 2}px`
      dot.style.borderRadius = borderRadius
      dot.style.transform = `translate(${x - r}px, ${y - r}px) rotate(${rotateDeg}deg) scale(${stretch}, ${squash})`
    }

    const hideTrail = () => {
      trailRefs.current.forEach((el) => {
        if (el) el.style.opacity = '0'
      })
    }

    const placeTrail = (theta) => {
      TRAIL_OFFSETS.forEach((offset, idx) => {
        const el = trailRefs.current[idx]
        if (!el) return
        const trailTheta = theta - offset
        if (trailTheta < 0) {
          el.style.opacity = '0'
          return
        }
        const r = HOLE_R * TRAIL_SCALES[idx]
        const { x, y } = orbitPoint(trailTheta)
        const tangent = orbitTangentDeg(trailTheta)
        const mult = speedMultiplier(trailTheta)
        // Slight curve-following stretch — droplets trailing the leader
        // under surface tension, restrained well below the leader's own.
        const stretch = 1 + mult * 0.22
        const squash = 1 - mult * 0.12
        el.style.width = `${r * 2}px`
        el.style.height = `${r * 2}px`
        el.style.transform = `translate(${x - r}px, ${y - r}px) rotate(${tangent}deg) scale(${stretch}, ${squash})`
        el.style.opacity = String(TRAIL_OPACITY[idx])
      })
    }

    const tick = (now) => {
      const dt = Math.max(0, Math.min(0.05, (now - last) / 1000))
      last = now

      if (phaseRef.current === 'liquify') {
        // STATE: LIQUIFY — anticipation (easeGather slow-start) then a
        // curved internal roll along the REST->GATE bezier, not a straight
        // hop: a controlled liquid movement inside the chamber. Deformation
        // (asymmetric border-radius + directional stretch) grows with
        // progress, and the radius narrows toward the end to read as
        // necking through P_GATE — continuous into toBottom, no state jump.
        hopRef.current = Math.min(1, hopRef.current + dt / LIQUIFY_SECONDS)
        const h = hopRef.current
        const tt = easeGather(h)
        const { x, y } = quadBezier(REST_PT, CTRL_PT, GATE_PT, tt)
        const angle = quadBezierTangentDeg(REST_PT, CTRL_PT, GATE_PT, tt, false)
        const amount = tt
        placeDot(x, y, lerp(HOLE_R, HOLE_R * 0.68, tt), {
          rotateDeg: angle,
          stretch: 1 + amount * 0.4,
          squash: 1 - amount * 0.3,
          borderRadius: liquidBorderRadius(amount),
        })
        hideTrail()
        if (hopRef.current >= 1) {
          hopRef.current = 0
          phaseRef.current = 'toBottom'
          setPhase('toBottom')
        }
      } else if (phaseRef.current === 'toBottom') {
        // STATE: MOVE_TO_BOTTOM — P_GATE -> BOTTOM_POINT. Moves DOWN first,
        // on purpose, before any orbiting starts. Deformation amount eases
        // back down as the elongated travel streak takes over.
        hopRef.current = Math.min(1, hopRef.current + dt / HOP_SECONDS)
        const t = easeInOutCubic(hopRef.current)
        const x = lerp(GATE_X, BOTTOM_POINT.x, t)
        const y = lerp(GATE_Y, BOTTOM_POINT.y, t)
        const angle = (Math.atan2(BOTTOM_POINT.y - GATE_Y, BOTTOM_POINT.x - GATE_X) * 180) / Math.PI
        placeDot(x, y, lerp(HOLE_R * 0.68, HOLE_R * 0.8, t), {
          rotateDeg: angle,
          stretch: 1 + t * 0.5,
          squash: 1 - t * 0.2,
          borderRadius: liquidBorderRadius(lerp(1, 0.6, t)),
        })
        hideTrail()
        if (hopRef.current >= 1) {
          hopRef.current = 0
          thetaRef.current = 0
          phaseRef.current = 'orbit'
          setPhase('orbit')
        }
      } else if (phaseRef.current === 'orbit' || phaseRef.current === 'finishing') {
        // theta=0 is always BOTTOM_POINT, theta=PI is always TOP_POINT —
        // every lap has the identical designed shape, never a random phase.
        const omega = (Math.PI * 2) / LAP_SECONDS

        if (phaseRef.current === 'orbit') {
          thetaRef.current += omega * speedMultiplier(thetaRef.current) * dt
          if (readyRef.current) {
            // Hands off to the return sequence at the very next BOTTOM_POINT
            // crossing (theta a multiple of 2*PI) — never mid-lap.
            const laps = Math.floor(thetaRef.current / (Math.PI * 2)) + 1
            targetRef.current = laps * Math.PI * 2
            phaseRef.current = 'finishing'
            setPhase('finishing')
          }
        } else {
          const remaining = targetRef.current - thetaRef.current
          if (remaining <= 0.001) {
            thetaRef.current = targetRef.current
          } else {
            const closeness = Math.min(1, remaining / 0.9)
            const decel = 0.18 + 0.82 * closeness
            thetaRef.current += omega * speedMultiplier(thetaRef.current) * decel * dt
            if (thetaRef.current > targetRef.current) thetaRef.current = targetRef.current
          }
        }

        const theta = thetaRef.current
        const { x, y } = orbitPoint(theta)
        const mult = speedMultiplier(theta)
        const tangent = orbitTangentDeg(theta)
        const stretch = 1 + mult * 3.3
        const squash = 1 - mult * 0.38
        placeDot(x, y, HOLE_R * 0.82, { rotateDeg: tangent, stretch, squash, borderRadius: liquidBorderRadius(0.55) })
        placeTrail(theta)

        if (phaseRef.current === 'finishing' && targetRef.current - theta <= 0.001) {
          hopRef.current = 0
          phaseRef.current = 'toGate'
          setPhase('toGate')
          hideTrail()
        }
      } else if (phaseRef.current === 'toGate') {
        // STATE: RETURN_TO_GATE — always starts from BOTTOM_POINT (the
        // finishing branch above only ever lands exactly there), approaches
        // P_GATE from below, contracting and narrowing back toward the neck
        // shape that reflow picks up from.
        hopRef.current = Math.min(1, hopRef.current + dt / HOP_SECONDS)
        const t = easeInOutCubic(hopRef.current)
        const x = lerp(BOTTOM_POINT.x, GATE_X, t)
        const y = lerp(BOTTOM_POINT.y, GATE_Y, t)
        const angle = (Math.atan2(GATE_Y - BOTTOM_POINT.y, GATE_X - BOTTOM_POINT.x) * 180) / Math.PI
        placeDot(x, y, lerp(HOLE_R * 0.8, HOLE_R * 0.68, t), {
          rotateDeg: angle,
          stretch: 1 + (1 - t) * 0.5,
          squash: 1 - (1 - t) * 0.2,
          borderRadius: liquidBorderRadius(lerp(0.6, 1, t)),
        })
        hideTrail()
        if (hopRef.current >= 1) {
          hopRef.current = 0
          phaseRef.current = 'reflow'
          setPhase('reflow')
        }
      } else if (phaseRef.current === 'reflow') {
        // STATE: REFLOW — the exact reverse of LIQUIFY: same bezier curve,
        // same deformation logic, run backwards (tt goes GATE(1) -> REST(0)
        // as h goes 0 -> 1). Flows up from P_GATE, the asymmetric liquid
        // shape relaxes back into a circle, surface tension settling it
        // into place — mirrors the opening sequence, not a fresh animation.
        hopRef.current = Math.min(1, hopRef.current + dt / LIQUIFY_SECONDS)
        const h = hopRef.current
        const tt = 1 - easeSettle(h)
        const { x, y } = quadBezier(REST_PT, CTRL_PT, GATE_PT, tt)
        const angle = quadBezierTangentDeg(REST_PT, CTRL_PT, GATE_PT, tt, true)
        const amount = tt
        placeDot(x, y, lerp(HOLE_R, HOLE_R * 0.68, tt), {
          rotateDeg: angle,
          stretch: 1 + amount * 0.4,
          squash: 1 - amount * 0.3,
          borderRadius: liquidBorderRadius(amount),
        })
        hideTrail()
        if (hopRef.current >= 1) {
          placeDot(REST_X, REST_Y, HOLE_R, {})
          phaseRef.current = 'settle'
          setPhase('settle')
          window.setTimeout(() => setPhaseBoth('fade'), 220)
          window.setTimeout(() => setPhaseBoth('hidden'), 760)
        }
      }

      if (phaseRef.current !== 'settle' && phaseRef.current !== 'fade' && phaseRef.current !== 'hidden') {
        raf = requestAnimationFrame(tick)
      }
    }

    raf = requestAnimationFrame(tick)
    return () => cancelAnimationFrame(raf)
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])

  if (phase === 'hidden') return null

  return (
    <div className={`site-loader ${phase === 'fade' ? 'site-loader--fading' : ''}`} aria-hidden="true">
      <div className="site-loader__mark">
        {/* Layer 1 — the real asset, completely untouched: no filter, no
            blend mode, no mask, no canvas processing. */}
        <img src={IMG.logo.mark} alt="" className="site-loader__p" draggable="false" />
        {/* Layer 2 — animation only. This cover sits exactly over the baked
            orange dot (which is part of the untouched Layer-1 pixels) so the
            opening can visually empty out while the liquid is away; the
            animated dot below repaints on top of it whenever it's at rest. */}
        <span className="site-loader__hole-cover" />
        {TRAIL_OFFSETS.map((_, idx) => (
          <span
            key={idx}
            ref={(el) => {
              trailRefs.current[idx] = el
            }}
            className="site-loader__trail"
          />
        ))}
        <span ref={dotRef} className="site-loader__dot" />
      </div>
    </div>
  )
}
