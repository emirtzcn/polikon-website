import { useState } from 'react'
import { IMG } from '../data/images.js'
import { useLanguage } from '../i18n/LanguageContext.jsx'
import './CorporateVideo.css'

export default function CorporateVideo() {
  const [playing, setPlaying] = useState(false)
  const { t } = useLanguage()
  const src = IMG.video.corporate

  return (
    <section className="corp-video" id="corp-video">
      <div className="container corp-video__inner">
        <div className="corp-video__content">
          <span className="corp-video__label">{t('home.corpVideoLabel')}</span>
          <span className="eyebrow">{t('home.corpVideoEyebrow')}</span>
          <h2>{t('home.corpVideoTitle')}</h2>
          <p className="lead">{t('home.corpVideoLead')}</p>
        </div>

        <div className="corp-video__media">
          {!playing && (
            <button
              type="button"
              className="corp-video__preview"
              onClick={() => setPlaying(true)}
              aria-label="Play POLIKON corporate video"
            >
              <img src={IMG.factory.videoPoster} alt="Inside the POLIKON production facility" loading="lazy" />
              <span className="corp-video__play">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M8 5v14l11-7z" />
                </svg>
              </span>
            </button>
          )}

          {playing && src && (
            <video
              className="corp-video__player"
              src={src}
              poster={IMG.factory.videoPoster}
              controls
              autoPlay
              playsInline
            />
          )}

          {playing && !src && (
            <div className="corp-video__soon">
              <img src={IMG.factory.videoPoster} alt="" loading="lazy" />
              <div className="corp-video__soon-overlay">
                <p>Corporate video coming soon.</p>
                <button type="button" className="text-link" onClick={() => setPlaying(false)}>
                  Back to preview
                </button>
              </div>
            </div>
          )}
        </div>
      </div>
    </section>
  )
}
