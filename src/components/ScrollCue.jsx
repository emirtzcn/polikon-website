import { useEffect, useState } from 'react'
import './ScrollCue.css'

export default function ScrollCue({ targetId }) {
  const [hidden, setHidden] = useState(false)

  useEffect(() => {
    const onScroll = () => setHidden(window.scrollY > 60)
    window.addEventListener('scroll', onScroll, { passive: true })
    return () => window.removeEventListener('scroll', onScroll)
  }, [])

  const handleClick = () => {
    document.getElementById(targetId)?.scrollIntoView({ behavior: 'smooth' })
  }

  return (
    <button
      type="button"
      className={`scroll-cue ${hidden ? 'is-hidden' : ''}`}
      onClick={handleClick}
      aria-label="Scroll to next section"
    >
      <span className="scroll-cue__label">Scroll</span>
      <span className="scroll-cue__track">
        <span className="scroll-cue__dot" />
      </span>
      <svg className="scroll-cue__chevron" width="14" height="8" viewBox="0 0 14 8" aria-hidden="true">
        <path d="M1 1l6 6 6-6" fill="none" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" strokeLinejoin="round" />
      </svg>
    </button>
  )
}
