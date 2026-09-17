import { Link } from 'react-router-dom'
import { useLanguage } from '../i18n/LanguageContext.jsx'
import './NotFound.css'

export default function NotFound() {
  const { t } = useLanguage()
  return (
    <section className="not-found">
      <div className="container not-found__inner">
        <span className="eyebrow">404</span>
        <h1>{t('notFound.title')}</h1>
        <p className="lead">{t('notFound.lead')}</p>
        <Link to="/" className="btn btn--primary">
          {t('notFound.backHome')}
        </Link>
      </div>
    </section>
  )
}
