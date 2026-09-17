import { useEffect, useState } from 'react'
import { Link, useLocation } from 'react-router-dom'
import { APPLICATIONS, getTds } from '../data/content.js'
import { IMG } from '../data/images.js'
import { Section, SectionHeader } from '../components/Section.jsx'
import TiltImage from '../components/TiltImage.jsx'
import { useLanguage, useLocalized } from '../i18n/LanguageContext.jsx'
import './Applications.css'

function CodeList({ app }) {
  const { t } = useLanguage()

  return (
    <div className="app-codes">
      <span className="app-codes__label">{t('common.recommendedFilms')}</span>
      <div className="app-codes__list">
        {app.codes.map((code) => {
          const tds = getTds(code)
          return tds ? (
            <a key={code} href={tds} target="_blank" rel="noopener noreferrer" className="app-codes__item">
              <span>{code}</span>
            </a>
          ) : (
            <span key={code} className="app-codes__item app-codes__item--static">
              <span>{code}</span>
            </span>
          )
        })}
      </div>
    </div>
  )
}

export default function Applications() {
  const [active, setActive] = useState(APPLICATIONS[0].slug)
  const activeApp = APPLICATIONS.find((a) => a.slug === active)
  const { t } = useLanguage()
  const tl = useLocalized()
  const { hash } = useLocation()

  useEffect(() => {
    const slug = hash.replace('#', '')
    if (!slug) return
    if (!APPLICATIONS.some((a) => a.slug === slug)) return
    setActive(slug)
    const el = document.getElementById('app-explorer')
    if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' })
  }, [hash])

  return (
    <>
      <section className="app-hero" style={{ backgroundImage: `url("${IMG.backgrounds.appHero}")` }}>
        <div className="container app-hero__content">
          <span className="eyebrow">{t('applications.eyebrow')}</span>
          <h1>{t('applications.heroTitle')}</h1>
          <p className="lead">{t('applications.heroLead')}</p>
        </div>
      </section>

      <Section id="app-explorer">
        <SectionHeader eyebrow={t('applications.exploreEyebrow')} title={t('applications.exploreTitle')} />

        {/* Desktop: category rail + visual/detail panel */}
        <div className="app-explorer">
          <div className="app-explorer__rail">
            {APPLICATIONS.map((a) => (
              <button
                key={a.slug}
                type="button"
                className={`app-explorer__tab ${a.slug === active ? 'is-active' : ''}`}
                onClick={() => setActive(a.slug)}
              >
                {tl(a, 'name')}
              </button>
            ))}
          </div>
          <div className="app-explorer__panel">
            <div className="app-explorer__media">
              <TiltImage src={activeApp.image} alt={tl(activeApp, 'name')} />
            </div>
            <div className="app-explorer__content">
              <h3>{tl(activeApp, 'name')}</h3>
              <p className="lead">{tl(activeApp, 'text')}</p>
              <CodeList app={activeApp} />
            </div>
          </div>
        </div>

        {/* Mobile: accordion */}
        <div className="app-accordion">
          {APPLICATIONS.map((a) => (
            <details
              key={a.slug}
              className="app-accordion__item"
              open={a.slug === active}
              onToggle={(e) => e.target.open && setActive(a.slug)}
            >
              <summary>{tl(a, 'name')}</summary>
              <div className="app-accordion__body">
                <div className="media app-accordion__media">
                  <img src={a.image} alt={tl(a, 'name')} loading="lazy" />
                </div>
                <p className="lead">{tl(a, 'text')}</p>
                <CodeList app={a} />
              </div>
            </details>
          ))}
        </div>
      </Section>

      <section className="app-cta section--dark section">
        <div className="container app-cta__inner">
          <h2>{t('applications.ctaTitle')}</h2>
          <p className="lead">{t('applications.ctaText')}</p>
          <Link to="/contact" className="btn btn--primary">
            {t('applications.ctaButton')} <span className="arrow">&rarr;</span>
          </Link>
        </div>
      </section>
    </>
  )
}
