import { Link } from 'react-router-dom'
import { IMG } from '../data/images.js'
import PageHero from '../components/PageHero.jsx'
import { Section, SectionHeader } from '../components/Section.jsx'
import Reveal from '../components/Reveal.jsx'
import { useLanguage } from '../i18n/LanguageContext.jsx'
import './About.css'

export default function About() {
  const { t } = useLanguage()
  const expertise = t('about.expertise')
  const rdQuality = t('about.rdQuality')
  const whyPillars = t('about.whyPillars')
  const brandStory = t('about.brandStory')

  return (
    <>
      <PageHero
        eyebrow={t('about.heroEyebrow')}
        title={t('about.heroTitle')}
        lead={t('about.heroLead')}
        image={IMG.factory.lineOverview}
      />

      {/* Company introduction */}
      <Section>
        <div className="about-intro">
          <Reveal>
            <span className="eyebrow">{t('about.whoWeAre')}</span>
            <h2>
              {t('about.builtTitleLine1')}
              <br />
              {t('about.builtTitleLine2')}
            </h2>
            <p className="lead">{t('about.introP1')}</p>
            <p className="lead" style={{ marginTop: '1rem' }}>{t('about.introP2')}</p>
            <p className="lead" style={{ marginTop: '1rem' }}>{t('about.introP3')}</p>
          </Reveal>
          <Reveal className="media about-intro__media" delay={120}>
            <img src={IMG.factory.polikonTeam} alt="POLIKON team inside the production facility" loading="lazy" />
          </Reveal>
        </div>
      </Section>

      {/* 25 years of industry expertise */}
      <Section tone="muted">
        <Reveal className="experience-stat">
          <span className="experience-stat__number">25+</span>
          <span className="experience-stat__label">{t('about.statLabel')}</span>
          <p className="lead experience-stat__text">{t('about.statText')}</p>
        </Reveal>
        <div className="grid grid--3 expertise-grid">
          {expertise.map((e, i) => (
            <Reveal className="expertise-card" key={e.title} delay={i * 100}>
              <h3>{e.title}</h3>
              <p>{e.text}</p>
            </Reveal>
          ))}
        </div>
      </Section>

      {/* R&D + Quality Center */}
      <Section>
        <SectionHeader eyebrow={t('about.rdEyebrow')} title={t('about.rdTitle')} />
        <p className="lead rd-intro">{t('about.rdIntro')}</p>
        <div className="rd-quality">
          <Reveal className="media rd-quality__media">
            <img src={IMG.factory.stretching} alt="POLIKON film stretching process" loading="lazy" />
          </Reveal>
          <div className="rd-quality__columns">
            {rdQuality.map((col, i) => (
              <Reveal className="rd-quality__col" key={col.title} delay={i * 100}>
                <h3>{col.title}</h3>
                <ul>
                  {col.items.map((item) => (
                    <li key={item}>{item}</li>
                  ))}
                </ul>
              </Reveal>
            ))}
          </div>
        </div>
      </Section>

      {/* Manufacturing technology */}
      <section className="tech-band">
        <div className="tech-band__media">
          <img src={IMG.factory.extrusion} alt="POLIKON BOPP production line" loading="lazy" />
        </div>
        <div className="tech-band__overlay" />
        <div className="container tech-band__content">
          <Reveal>
            <span className="eyebrow">{t('about.manufacturingEyebrow')}</span>
            <h2>{t('about.manufacturingTitle')}</h2>
            <p className="lead">{t('about.manufacturingText')}</p>
          </Reveal>
        </div>
      </section>

      {/* Why choose us */}
      <Section>
        <div className="why-us">
          <Reveal className="why-us__intro">
            <span className="eyebrow">{t('about.whyEyebrow')}</span>
            <h2>{t('about.whyTitle')}</h2>
            <p className="lead">{t('about.whyP1')}</p>
            <p className="lead" style={{ marginTop: '1rem' }}>{t('about.whyP2')}</p>
            <p className="lead" style={{ marginTop: '1rem' }}>{t('about.whyP3')}</p>
            <p className="lead" style={{ marginTop: '1rem' }}>{t('about.whyP4')}</p>
          </Reveal>
          <div className="why-us__pillars">
            {whyPillars.map((p, i) => (
              <Reveal className="why-us__pillar" key={p.title} delay={i * 100}>
                <span className="why-us__pillar-index">{String(i + 1).padStart(2, '0')}</span>
                <h3>{p.title}</h3>
                <p>{p.text}</p>
              </Reveal>
            ))}
          </div>
        </div>
      </Section>

      {/* Core capabilities */}
      <Section tone="muted">
        <SectionHeader eyebrow={t('about.capabilitiesEyebrow')} title={t('about.capabilitiesTitle')} />
        <div className="brand-story">
          {brandStory.map((s, i) => (
            <Reveal className="brand-story__step" key={s.n} delay={i * 100}>
              <span className="brand-story__n">{s.n}</span>
              <h3>{s.title}</h3>
              <p>{s.text}</p>
            </Reveal>
          ))}
        </div>
      </Section>

      {/* Facility gallery */}
      <Section>
        <SectionHeader eyebrow={t('about.facilityEyebrow')} title={t('about.facilityTitle')} />
        <div className="gallery-grid">
          {IMG.factory.gallery.slice(0, 5).map((src, i) => (
            <div className="media gallery-grid__item" key={src}>
              <img src={src} alt={`POLIKON production facility ${i + 1}`} loading="lazy" />
            </div>
          ))}
        </div>
      </Section>

      {/* Corporate document */}
      <Section tone="muted">
        <Reveal className="doc-card">
          <div className="doc-card__info">
            <span className="eyebrow">{t('about.resourcesEyebrow')}</span>
            <h3>{t('about.docTitle')}</h3>
            <span className="doc-card__subtitle">{t('about.docSubtitle')}</span>
            <p>{t('about.docText')}</p>
            <div className="doc-card__actions">
              <a
                href="/documents/POLIKON_Corporate_Factory_Presentation_2026.pdf.pdf"
                target="_blank"
                rel="noopener noreferrer"
                className="btn btn--primary"
              >
                {t('about.viewPdf')} <span className="arrow">&rarr;</span>
              </a>
              <a
                href="/documents/POLIKON_Corporate_Factory_Presentation_2026.pdf.pdf"
                download
                className="btn btn--ghost"
              >
                {t('about.downloadPdf')} &darr;
              </a>
            </div>
          </div>
        </Reveal>
      </Section>

      {/* Partnership / closing */}
      <section className="section section--dark partnership">
        <div className="container partnership__inner">
          <Reveal>
            <span className="eyebrow">{t('about.beyondEyebrow')}</span>
            <h2>{t('about.beyondTitle')}</h2>
            <p className="lead">{t('about.beyondP1')}</p>
            <p className="lead" style={{ marginTop: '1rem' }}>{t('about.beyondP2')}</p>
            <p className="lead" style={{ marginTop: '1rem' }}>{t('about.beyondP3')}</p>
            <div className="partnership__actions">
              <Link to="/products" className="btn btn--primary">
                {t('about.exploreProducts')} <span className="arrow">&rarr;</span>
              </Link>
              <Link to="/contact" className="btn btn--outline-light">
                {t('home.ctaButton')}
              </Link>
            </div>
          </Reveal>
        </div>
      </section>
    </>
  )
}
