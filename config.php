<?php
/**
 * Polikon — Yapılandırma
 *
 * Site tamamen statiktir (veritabanı ve sunucu işlemi yoktur).
 *  - İçerik PHP şablonlarıyla üretilir (ortak header/footer, ürün verisi dizisi).
 *  - Ürün teknik dokümanları (TDS/PDF) 'datasheets/' klasöründe durur; ziyaretçi
 *    Ürünler sayfasındaki tablodan doğrudan yeni sekmede açar. Dosya: datasheets/{pdf_code}.pdf
 *  - İletişim: sadece bilgi + harita gösterilir (form/e-posta gönderimi yoktur).
 */

/* ============================================================
 * SİTE İLETİŞİM BİLGİLERİ (footer + iletişim sayfası)
 * ============================================================ */
define('CONTACT_ADDRESS', 'Kemalpaşa OSB, 612 Sokak No 8, 35730 Kemalpaşa/İzmir');
define('CONTACT_PHONE',   '+90 212 XXX XX XX');
define('CONTACT_EMAIL',   'sales@polikonfilm.com');
define('CONTACT_EMAIL_2', 'info@polikonfilm.com');
define('SOCIAL_LINKEDIN', 'https://tr.linkedin.com/company/polikon-plastik-film');
// Harita için tam koordinatlar:
define('MAP_LAT', '38.44852608171639');
define('MAP_LNG', '27.426253684341432');

/* ============================================================ */
define('SITE_NAME', 'Polikon');
define('SITE_URL', 'https://polikonfilm.com');   // canonical / sitemap / OG için
define('SITE_DESCRIPTION', 'Polikon — premium BOPP ambalaj ve etiket filmleri üreticisi. İzmir Kemalpaşa\'da yüksek performanslı, sürdürülebilir film çözümleri.');
define('APP_DEBUG', getenv('APP_DEBUG') === '1');

if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
    ini_set('display_errors', '0');
}
date_default_timezone_set('Europe/Istanbul');
