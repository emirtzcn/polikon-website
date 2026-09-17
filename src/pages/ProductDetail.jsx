import { useEffect, useRef, useState } from 'react'
import { useParams, Navigate, Link } from 'react-router-dom'
import { PRODUCTS } from '../data/content.js'
import PageHero from '../components/PageHero.jsx'
import { Section, SectionHeader } from '../components/Section.jsx'
import FamilyName from '../components/FamilyName.jsx'
import TiltImage from '../components/TiltImage.jsx'
import { useLanguage, useLocalized } from '../i18n/LanguageContext.jsx'
import './Products.css'

function RangeBox({ label, value, tone, unit }) {
  const parts = value
    .split('–')
    .map((v) => v.trim().replace(new RegExp(`\\s*${unit}\\s*$`), ''))
  const isRange = parts.length === 2
  const ref = useRef(null)
  const [visible, setVisible] = useState(false)

  useEffect(() => {
    const el = ref.current
    if (!el) return
    const io = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setVisible(true)
          io.disconnect()
        }
      },
      { threshold: 0.4 }
    )
    io.observe(el)
    return () => io.disconnect()
  }, [])

  return (
    <div className={`range-box ${visible ? 'is-visible' : ''}`} ref={ref}>
      <span className={`range-box__label range-box__label--${tone}`}>{label}</span>
      <div className={`range-box__bar range-box__bar--${tone}`}>
        <span className="range-box__bar-track" />
        <span className="range-box__bar-fill" />
        <span className="range-box__dot range-box__dot--start" />
        {isRange && <span className="range-box__dot range-box__dot--end" />}
      </div>
      <div className="range-box__values">
        <strong>{parts[0]} {unit}</strong>
        {isRange && <strong>{parts[1]} {unit}</strong>}
      </div>
    </div>
  )
}

export default function ProductDetail() {
  const { slug } = useParams()
  const product = PRODUCTS.find((p) => p.slug === slug)
  const { t } = useLanguage()
  const tl = useLocalized()

  if (!product) return <Navigate to="/products" replace />

  return (
    <>
      {/* 1. Product hero */}
      <PageHero
        eyebrow={tl(product, 'tag')}
        title={<FamilyName name={product.name} />}
        lead={tl(product, 'summary')}
        image={product.image}
      />

      {/* 2. Main visual + description */}
      <Section>
        <div className="product-detail">
          <div className="media product-detail__media">
            <TiltImage src={product.imageAlt || product.image} alt={product.name} />
          </div>
          <div className="product-detail__content">
            <span className="eyebrow">{tl(product, 'tag')}</span>
            <h2>
              <FamilyName name={product.name} />
            </h2>
            <p className="lead">{tl(product, 'summary')}</p>
            <Link to="/contact" className="btn btn--primary" style={{ marginTop: '2rem' }}>
              {t('productDetail.requestQuote')} <span className="arrow">&rarr;</span>
            </Link>
          </div>
        </div>
      </Section>

      {/* 3. Information / benefit boxes */}
      <Section tone="muted">
        <SectionHeader eyebrow={t('common.productInformation')} title={t('common.keyProperties')} />
        <div className="key-properties">
          <RangeBox label={t('common.thicknessRange')} value={product.thicknessRange} tone="accent" unit="µm" />
          <RangeBox label={t('common.densityRange')} value={product.densityRange} tone="neutral" unit="g/cm³" />
          <div className="info-box info-box--benefits">
            <span className="info-box__label">{t('common.keyBenefits')}</span>
            <ul className="info-box__list">
              {tl(product, 'features').map((f) => (
                <li key={f}>{f}</li>
              ))}
            </ul>
          </div>
        </div>
      </Section>

      {/* 4 & 5. Technical catalogue + TDS documents */}
      <Section id="tds">
        <SectionHeader
          eyebrow={t('common.technicalCatalogue')}
          title={
            <>
              <FamilyName name={product.name} /> {t('productDetail.productRange')}
            </>
          }
          text={t('productDetail.technicalCatalogueText')}
        />
        <div className="tech-table">
          <div className="tech-table__row tech-table__row--head">
            <span>{t('common.code')}</span>
            <span>{t('common.appearance')}</span>
            <span>{t('common.thickness')}</span>
            <span>{t('common.density')}</span>
            <span>{t('common.tdsProperties')}</span>
          </div>
          {product.catalogue.map((row) => (
            <div className="tech-table__row" key={row.code}>
              <span className="tech-table__code">{row.code}</span>
              <span>{row.appearance}</span>
              <span>{row.thickness}</span>
              <span>{row.density}</span>
              <span>
                {row.tds ? (
                  <a href={row.tds} target="_blank" rel="noopener noreferrer" className="tech-table__tds">
                    {t('common.viewTds')}
                  </a>
                ) : (
                  <span className="tech-table__tds tech-table__tds--none">{t('common.notAvailable')}</span>
                )}
              </span>
            </div>
          ))}
        </div>
      </Section>
    </>
  )
}
