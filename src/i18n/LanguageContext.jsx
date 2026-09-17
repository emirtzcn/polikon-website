import { createContext, useContext, useEffect, useMemo, useState } from 'react'
import { translations, SLOGAN } from './translations.js'

const LanguageContext = createContext(null)

function getInitialLang() {
  if (typeof window === 'undefined') return 'en'
  return localStorage.getItem('polikon-lang') === 'tr' ? 'tr' : 'en'
}

export function LanguageProvider({ children }) {
  const [lang, setLang] = useState(getInitialLang)

  useEffect(() => {
    localStorage.setItem('polikon-lang', lang)
    document.documentElement.lang = lang
  }, [lang])

  const value = useMemo(() => {
    const dict = translations[lang]
    const t = (path) => {
      const parts = path.split('.')
      let node = dict
      for (const p of parts) {
        node = node?.[p]
      }
      return node ?? path
    }
    return { lang, setLang, t, slogan: SLOGAN[lang] }
  }, [lang])

  return <LanguageContext.Provider value={value}>{children}</LanguageContext.Provider>
}

export function useLanguage() {
  const ctx = useContext(LanguageContext)
  if (!ctx) throw new Error('useLanguage must be used within LanguageProvider')
  return ctx
}

// Picks the localized copy of a data field: item.tr[field] when Turkish is
// active and a translation exists, otherwise falls back to the English base field.
export function useLocalized() {
  const { lang } = useLanguage()
  return (item, field) => (lang === 'tr' && item.tr?.[field] !== undefined ? item.tr[field] : item[field])
}
