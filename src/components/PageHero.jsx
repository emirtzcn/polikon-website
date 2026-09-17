import './PageHero.css'

export default function PageHero({ eyebrow, title, lead, image, align = 'left', mediaClassName = '', className = '' }) {
  return (
    <section className={`page-hero ${image ? 'page-hero--image' : ''} ${className}`.trim()}>
      {image && (
        <div className={`page-hero__media ${mediaClassName}`.trim()}>
          <img src={image} alt="" loading="eager" />
        </div>
      )}
      <div className={`container page-hero__content page-hero__content--${align}`}>
        {eyebrow && <span className="eyebrow">{eyebrow}</span>}
        <h1>{title}</h1>
        {lead && <p className="lead">{lead}</p>}
      </div>
    </section>
  )
}
