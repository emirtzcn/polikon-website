import { Link } from 'react-router-dom'
import { APPLICATIONS, NEWS, PRODUCTS } from '../data/content.js'
import { IMG } from '../data/images.js'
import { Section, SectionHeader } from '../components/Section.jsx'
import FamilyName from '../components/FamilyName.jsx'
import CorporateVideo from '../components/CorporateVideo.jsx'
import HeroSignature from '../components/HeroSignature.jsx'
import ScrollCue from '../components/ScrollCue.jsx'
import { useLanguage, useLocalized } from '../i18n/LanguageContext.jsx'
import './Home.css'

const HOME_FAMILY_ORDER = ['iko-mold', 'iko-wrap', 'iko-face', 'iko-pack', 'iko-plain']

export default function Home() {
  const { t, slogan } = useLanguage()
  const tl = useLocalized()

  return (
    <>
      <section className="hero">
        <div className="hero__media">
          <img src={IMG.factory.polikonTeam} alt="POLIKON team in front of the BOPP production line" />
        </div>
        <div className="hero__mockup" aria-hidden="true">
          <img src={IMG.mockups.general} alt="" loading="lazy" />
        </div>
        <div className="container hero__content">
          <div className="hero__heading-row">
            <div>
              <span className="eyebrow">{t('home.eyebrowHero')}</span>
              <h1>{t('home.heroTitle')}</h1>
            </div>
            <span className="hero__dash" aria-hidden="true" />
            <HeroSignature className="hero__slogan" text={slogan} />
          </div>
          <p className="lead hero__lead">{t('home.heroLead')}</p>
        </div>
        <ScrollCue targetId="corp-video" />
      </section>

      <CorporateVideo />

      <section className="product-nav" style={{ backgroundImage: `url(${IMG.backgrounds.bobinler})` }}>
        <div className="container product-nav__inner">
          <div className="product-nav__heading">
            <span className="eyebrow">{t('home.ourRange')}</span>
            <h2 className="product-nav__title">{t('home.productPortfolio')}</h2>
          </div>
          <div className="product-nav__grid">
            {HOME_FAMILY_ORDER.map((slug) => {
              const p = PRODUCTS.find((item) => item.slug === slug)
              return (
                <div key={p.slug} className="product-nav__item">
                  <Link to={`/products/${p.slug}`} className="product-nav__link">
                    <img src={p.image} alt={p.name} loading="lazy" />
                    <div className="product-nav__overlay" />
                    <span className="product-nav__name">
                      <FamilyName name={p.name} />
                    </span>
                  </Link>
                  <Link to={`/products/${p.slug}`} className="product-nav__caption">
                    <span className="product-nav__caption-name">
                      <FamilyName name={p.name} />
                    </span>
                    <span className="product-nav__caption-link">
                      {t('common.viewProduct')} <span className="arrow">&rarr;</span>
                    </span>
                  </Link>
                </div>
              )
            })}
          </div>
        </div>
      </section>

      <section className="split-feature">
        <div className="split-feature__media">
          <img src={IMG.factory.lineOverview} alt="Inside the POLIKON BOPP stretching line" loading="lazy" />
        </div>
        <div className="split-feature__content container">
          <span className="eyebrow eyebrow--slogan">{slogan}</span>
          <h2>{t('home.insideFactoryTitle')}</h2>
          <p className="lead">{t('home.insideFactoryLead')}</p>
          <ul className="check-list">
            {t('home.checklist').map((item) => (
              <li key={item}>{item}</li>
            ))}
          </ul>
          <Link to="/about" className="text-link">
            {t('home.moreAboutFacility')} <span className="arrow">&rarr;</span>
          </Link>
        </div>
      </section>

      <Section tone="muted">
        <SectionHeader eyebrow={t('home.whereUsedEyebrow')} title={t('home.whereUsedTitle')} text={t('home.whereUsedText')}>
          <Link to="/applications" className="text-link">
            {t('home.seeAllApplications')} <span className="arrow">&rarr;</span>
          </Link>
        </SectionHeader>
        <div className="grid grid--3 app-teasers">
          {APPLICATIONS.slice(0, 3).map((a) => (
            <Link to={`/applications#${a.slug}`} className="app-teaser" key={a.slug}>
              <div className="media app-teaser__media">
                <img src={a.image} alt={tl(a, 'name')} loading="lazy" />
              </div>
              <h3>{tl(a, 'name')}</h3>
              <p>{tl(a, 'text')}</p>
            </Link>
          ))}
        </div>
      </Section>

      <Section>
        <SectionHeader eyebrow={t('home.latest')} title={t('home.newsUpdates')}>
          <Link to="/news" className="text-link">
            {t('home.allNews')} <span className="arrow">&rarr;</span>
          </Link>
        </SectionHeader>
        <div className="grid grid--3 news-teasers">
          {NEWS.map((n) => (
            <a href={n.url} target="_blank" rel="noopener noreferrer" key={n.id} className="news-teaser">
              <div className="media news-teaser__media">
                <img src={n.image} alt={n.title} loading="lazy" />
              </div>
              <span className="news-teaser__meta">{n.category}</span>
              <h3>{n.title}</h3>
            </a>
          ))}
        </div>
      </Section>

      <section className="cta-band">
        <div className="container cta-band__inner">
          <div>
            <h2>{t('home.ctaTitle')}</h2>
            <p className="lead">{t('home.ctaText')}</p>
          </div>
          <Link to="/contact" className="btn btn--light">
            {t('home.ctaButton')} <span className="arrow">&rarr;</span>
          </Link>
        </div>
      </section>
    </>
  )
}
