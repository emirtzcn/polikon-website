import { useState } from 'react'
import { COMPANY } from '../data/content.js'
import { IMG } from '../data/images.js'
import PageHero from '../components/PageHero.jsx'
import { Section } from '../components/Section.jsx'
import { useLanguage } from '../i18n/LanguageContext.jsx'
import './Contact.css'

export default function Contact() {
  const [submitted, setSubmitted] = useState(false)
  const { t } = useLanguage()

  const handleSubmit = (e) => {
    e.preventDefault()
    setSubmitted(true)
  }

  return (
    <>
      <PageHero
        eyebrow={t('contact.eyebrow')}
        title={t('contact.title')}
        lead={t('contact.lead')}
        image={IMG.factory.lineOverview}
      />

      <Section>
        <div className="contact-grid">
          <div className="contact-info">
            <h2>{t('contact.getInTouch')}</h2>
            <p className="lead">{t('contact.getInTouchLead')}</p>
            <dl className="contact-details">
              <div>
                <dt>{t('contact.emailLabel')}</dt>
                <dd>
                  <a href={`mailto:${COMPANY.email}`}>{COMPANY.email}</a>
                </dd>
              </div>
              <div>
                <dt>{t('contact.addressLabel')}</dt>
                <dd>{COMPANY.address}</dd>
              </div>
            </dl>
            <a
              href={COMPANY.linkedin}
              target="_blank"
              rel="noopener noreferrer"
              className="social-link"
              aria-label="POLIKON on LinkedIn"
            >
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.66H9.36V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45z" />
              </svg>
              <span>LinkedIn</span>
            </a>
          </div>

          <form className="contact-form" onSubmit={handleSubmit}>
            {submitted ? (
              <div className="contact-form__success">
                <h3>{t('contact.thankYouTitle')}</h3>
                <p>{t('contact.thankYouText')}</p>
              </div>
            ) : (
              <>
                <div className="form-row">
                  <label htmlFor="name">{t('contact.formName')}</label>
                  <input id="name" name="name" type="text" required placeholder="Jane Doe" />
                </div>
                <div className="form-row form-row--split">
                  <div>
                    <label htmlFor="email">{t('contact.formEmail')}</label>
                    <input id="email" name="email" type="email" required placeholder="jane@company.com" />
                  </div>
                  <div>
                    <label htmlFor="company">{t('contact.formCompany')}</label>
                    <input id="company" name="company" type="text" placeholder={t('contact.formCompanyPlaceholder')} />
                  </div>
                </div>
                <div className="form-row">
                  <label htmlFor="message">{t('contact.formMessage')}</label>
                  <textarea id="message" name="message" required rows={5} placeholder={t('contact.formMessagePlaceholder')} />
                </div>
                <button type="submit" className="btn btn--primary">
                  {t('contact.sendMessage')} <span className="arrow">&rarr;</span>
                </button>
              </>
            )}
          </form>
        </div>
      </Section>
    </>
  )
}
