import { Link } from 'react-router-dom'
import { PRODUCTS_ORDERED } from '../data/content.js'
import { IMG } from '../data/images.js'
import PageHero from '../components/PageHero.jsx'
import { Section } from '../components/Section.jsx'
import FamilyName from '../components/FamilyName.jsx'
import { useLanguage, useLocalized } from '../i18n/LanguageContext.jsx'
import './Products.css'

export default function Products() {
  const { t } = useLanguage()
  const tl = useLocalized()

  return (
    <>
      <PageHero
        eyebrow={t('productsPage.eyebrow')}
        title={t('productsPage.title')}
        lead={t('productsPage.lead')}
        image={IMG.backgrounds.productHero}
        mediaClassName="page-hero__media--products"
        className="page-hero--products"
      />

      <Section>
        <div className="product-list">
          {PRODUCTS_ORDERED.map((p, i) => (
            <article className={`product-row ${i === 0 ? 'product-row--featured' : ''}`} id={p.slug} key={p.slug}>
              <div className={`product-row__media media ${i % 2 ? 'order-2' : ''}`}>
                <img src={p.image} alt={p.name} loading="lazy" />
              </div>
              <div className="product-row__content">
                <span className="eyebrow">{tl(p, 'tag')}</span>
                <h2>
                  <FamilyName name={p.name} />
                </h2>
                <p className="lead">{tl(p, 'summary')}</p>
                <ul className="feature-list">
                  {tl(p, 'features').map((f) => (
                    <li key={f}>{f}</li>
                  ))}
                </ul>
                <Link to={`/products/${p.slug}`} className="text-link" style={{ marginTop: '1.75rem' }}>
                  {t('productsPage.viewDetails')} <span className="arrow">&rarr;</span>
                </Link>
              </div>
            </article>
          ))}
        </div>
      </Section>
    </>
  )
}
