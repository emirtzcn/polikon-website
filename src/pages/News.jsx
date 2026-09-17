import { NEWS } from '../data/content.js'
import { IMG } from '../data/images.js'
import PageHero from '../components/PageHero.jsx'
import { Section } from '../components/Section.jsx'
import { useLanguage } from '../i18n/LanguageContext.jsx'
import './News.css'

export default function News() {
  const { t } = useLanguage()
  return (
    <>
      <PageHero
        eyebrow={t('news.eyebrow')}
        title={t('news.title')}
        lead={t('news.lead')}
        image={IMG.factory.extrusion}
      />

      <Section>
        <div className="news-grid news-grid--single">
          {NEWS.map((n) => (
            <a className="news-card" key={n.id} href={n.url} target="_blank" rel="noopener noreferrer">
              <div className="media news-card__media">
                <img src={n.image} alt={n.title} loading="lazy" />
              </div>
              <div className="news-card__body">
                <div className="news-card__meta">
                  <span className="news-card__category">{n.category}</span>
                  <span>{n.source}</span>
                </div>
                <h3>{n.title}</h3>
                <p>{n.excerpt}</p>
                <span className="text-link">
                  {t('common.readMore')} <span className="arrow">&rarr;</span>
                </span>
              </div>
            </a>
          ))}
        </div>
      </Section>
    </>
  )
}
