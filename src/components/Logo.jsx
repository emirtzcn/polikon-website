import { IMG } from '../data/images.js'

// Official POLIKON logo asset. Do not recreate — always render the real file.
export default function Logo({ size = 32, variant = 'main', className = '' }) {
  return (
    <img
      src={IMG.logo[variant]}
      alt="POLIKON"
      className={`logo ${className}`.trim()}
      style={{ '--logo-size': `${size}px`, height: 'var(--logo-size)', width: 'auto', display: 'block' }}
    />
  )
}
