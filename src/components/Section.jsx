export function Section({ children, className = '', tone = 'default', id }) {
  return (
    <section id={id} className={`section section--${tone} ${className}`}>
      <div className="container">{children}</div>
    </section>
  )
}

export function SectionHeader({ eyebrow, title, text, align = 'left', children }) {
  return (
    <div className={`section-header section-header--${align}`}>
      <div>
        {eyebrow && <span className="eyebrow">{eyebrow}</span>}
        <h2>{title}</h2>
        {text && <p className="lead">{text}</p>}
      </div>
      {children && <div className="section-header__aside">{children}</div>}
    </div>
  )
}
