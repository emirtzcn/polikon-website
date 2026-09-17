import { useLanguage } from '../i18n/LanguageContext.jsx'
import './LanguageSwitcher.css'

export default function LanguageSwitcher({ className = '' }) {
  const { lang, setLang } = useLanguage()

  return (
    <div className={`lang-switch ${className}`} role="group" aria-label="Language">
      <button type="button" className={`lang-switch__en ${lang === 'en' ? 'is-active' : ''}`} onClick={() => setLang('en')}>
        EN
      </button>
      <span className="lang-switch__divider" aria-hidden="true">
        /
      </span>
      <button type="button" className={`lang-switch__tr ${lang === 'tr' ? 'is-active' : ''}`} onClick={() => setLang('tr')}>
        TR
      </button>
    </div>
  )
}
