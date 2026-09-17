import { useRef } from 'react'
import './TiltImage.css'

// Lightweight CSS-only tilt: no libraries, disabled on touch devices via CSS (hover:hover).
export default function TiltImage({ src, alt, className = '' }) {
  const ref = useRef(null)

  const onMouseMove = (e) => {
    const el = ref.current
    if (!el) return
    const rect = el.getBoundingClientRect()
    const x = (e.clientX - rect.left) / rect.width - 0.5
    const y = (e.clientY - rect.top) / rect.height - 0.5
    el.style.setProperty('--tilt-x', `${(-y * 6).toFixed(2)}deg`)
    el.style.setProperty('--tilt-y', `${(x * 6).toFixed(2)}deg`)
  }

  const onMouseLeave = () => {
    const el = ref.current
    if (!el) return
    el.style.setProperty('--tilt-x', '0deg')
    el.style.setProperty('--tilt-y', '0deg')
  }

  return (
    <div ref={ref} className={`tilt-image ${className}`} onMouseMove={onMouseMove} onMouseLeave={onMouseLeave}>
      <img src={src} alt={alt} loading="lazy" />
    </div>
  )
}
