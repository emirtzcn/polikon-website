import { useEffect, useState } from 'react'
import { NavLink, Link, useLocation } from 'react-router-dom'
import { NAV, PRODUCTS_ORDERED, APPLICATIONS } from '../data/content.js'
import { useLanguage, useLocalized } from '../i18n/LanguageContext.jsx'
import Logo from './Logo.jsx'
import FamilyName from './FamilyName.jsx'
import LanguageSwitcher from './LanguageSwitcher.jsx'
import './Header.css'

export default function Header() {
  const [open, setOpen] = useState(false)
  const [scrolled, setScrolled] = useState(false)
  const [menuOpen, setMenuOpen] = useState(null)
  const { pathname } = useLocation()
  const { t } = useLanguage()
  const tl = useLocalized()

  useEffect(() => {
    setOpen(false)
    setMenuOpen(null)
  }, [pathname])

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 12)
    onScroll()
    window.addEventListener('scroll', onScroll, { passive: true })
    return () => window.removeEventListener('scroll', onScroll)
  }, [])

  useEffect(() => {
    document.body.style.overflow = open ? 'hidden' : ''
    return () => (document.body.style.overflow = '')
  }, [open])

  useEffect(() => {
    if (!open) return
    const onKey = (e) => e.key === 'Escape' && setOpen(false)
    window.addEventListener('keydown', onKey)
    return () => window.removeEventListener('keydown', onKey)
  }, [open])

  const DROPDOWNS = {
    '/products': PRODUCTS_ORDERED.map((p) => ({ key: p.slug, to: `/products/${p.slug}`, label: <FamilyName name={p.name} /> })),
    '/applications': APPLICATIONS.map((a) => ({ key: a.slug, to: `/applications#${a.slug}`, label: tl(a, 'name') })),
  }

  return (
    <header className={`site-header ${scrolled ? 'is-scrolled' : ''}`}>
      <div className="container site-header__inner">
        <Link to="/" className="site-header__brand" aria-label="POLIKON home">
          <Logo size={44} />
        </Link>

        <nav className={`site-nav ${open ? 'is-open' : ''}`} aria-label="Main navigation">
          <div className="site-nav__mobile-head">
            <Logo size={34} />
            <button
              type="button"
              className="nav-close"
              aria-label="Close menu"
              onClick={() => setOpen(false)}
            >
              <span />
              <span />
            </button>
          </div>
          <ul>
            {NAV.map((item) => {
              const items = DROPDOWNS[item.to]
              if (!items) {
                return (
                  <li key={item.to}>
                    <NavLink to={item.to} end={item.to === '/'}>
                      {t(`nav.${item.key}`)}
                    </NavLink>
                  </li>
                )
              }
              const isOpen = menuOpen === item.to
              return (
                <li
                  key={item.to}
                  className="nav-products"
                  onMouseEnter={() => setMenuOpen(item.to)}
                  onMouseLeave={() => setMenuOpen((v) => (v === item.to ? null : v))}
                >
                  <div className="nav-products__row">
                    <NavLink to={item.to} end>
                      {t(`nav.${item.key}`)}
                    </NavLink>
                    <button
                      type="button"
                      className={`nav-products__toggle ${isOpen ? 'is-open' : ''}`}
                      aria-label={`Toggle ${item.key} menu`}
                      aria-expanded={isOpen}
                      onClick={() => setMenuOpen((v) => (v === item.to ? null : item.to))}
                    >
                      <span />
                    </button>
                  </div>
                  <div className={`products-menu ${isOpen ? 'is-open' : ''}`}>
                    {items.map((entry) => (
                      <Link to={entry.to} key={entry.key} className="products-menu__item">
                        {entry.label}
                      </Link>
                    ))}
                  </div>
                </li>
              )
            })}
          </ul>
          <LanguageSwitcher className="site-nav__lang" />
        </nav>

        <div className="site-header__actions">
          <LanguageSwitcher className="lang-switch--mobile" />
          <button
            className={`nav-toggle ${open ? 'is-open' : ''}`}
            aria-label={open ? 'Close menu' : 'Open menu'}
            aria-expanded={open}
            onClick={() => setOpen((v) => !v)}
          >
            <span />
            <span />
            <span />
          </button>
        </div>
      </div>
    </header>
  )
}
