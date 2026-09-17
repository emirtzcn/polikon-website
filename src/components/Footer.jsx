import { Link } from 'react-router-dom'
import { NAV, PRODUCTS_ORDERED, COMPANY } from '../data/content.js'
import { useLanguage } from '../i18n/LanguageContext.jsx'
import Logo from './Logo.jsx'
import './Footer.css'

export default function Footer() {
  const { t, slogan } = useLanguage()

  return (
    <footer className="site-footer">
      <div className="container site-footer__grid">
        <div className="site-footer__brand">
          <Logo variant="white" size={104} className="site-footer__logo" />
          <span className="site-footer__slogan">{slogan}</span>
          <p>{t('footer.brandText')}</p>
        </div>

        <div>
          <h4>{t('footer.companyHeading')}</h4>
          <ul>
            {NAV.map((n) => (
              <li key={n.to}>
                <Link to={n.to}>{t(`nav.${n.key}`)}</Link>
              </li>
            ))}
          </ul>
        </div>

        <div>
          <h4>{t('footer.productsHeading')}</h4>
          <ul>
            {PRODUCTS_ORDERED.map((p) => (
              <li key={p.slug}>
                <Link to={`/products/${p.slug}`}>{p.name}</Link>
              </li>
            ))}
          </ul>
        </div>

        <div>
          <h4>{t('footer.contactHeading')}</h4>
          <ul>
            <li>
              <a href={`mailto:${COMPANY.email}`}>{COMPANY.email}</a>
            </li>
            <li>{COMPANY.address}</li>
          </ul>
          <a
            href={COMPANY.linkedin}
            target="_blank"
            rel="noopener noreferrer"
            className="site-footer__social"
            aria-label="POLIKON on LinkedIn"
          >
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.66H9.36V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45z" />
            </svg>
            <span>LinkedIn</span>
          </a>
        </div>
      </div>

      <div className="container site-footer__bottom">
        <span>© {new Date().getFullYear()} {COMPANY.name}. {t('footer.rightsReserved')}</span>
        <span className="site-footer__accent">BOPP · Labels · Packaging</span>
      </div>
    </footer>
  )
}
