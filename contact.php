<?php
$active = 'contact';
$page_title = 'İletişim';
$meta_description = 'Polikon iletişim — Kemalpaşa OSB, İzmir adresimiz, telefon ve e-posta. BOPP film teklifleri ve iş birliği için bize ulaşın.';
require_once __DIR__ . '/includes/functions.php';

$addr  = CONTACT_ADDRESS;
$phone = CONTACT_PHONE;
$email = CONTACT_EMAIL;
$phone_href = preg_replace('/[^0-9+]/', '', $phone);
$map_src = 'https://www.google.com/maps?q=' . MAP_LAT . ',' . MAP_LNG . '&hl=tr&z=17&output=embed';

require __DIR__ . '/partials/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content">
                <h1 data-tr="İletişim" data-en="Contact">İletişim</h1>
                <p class="page-header-subtitle" data-tr="Bizimle iletişime geçin" data-en="Get in touch with us">Bizimle iletişime geçin</p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="contact-section">
        <div class="container">
            <h2 class="section-title" data-tr="İletişim Bilgileri" data-en="Contact Information">İletişim Bilgileri</h2>

            <div class="contact-cards">
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    <div>
                        <h4 data-tr="Adres" data-en="Address">Adres</h4>
                        <p><?= e($addr) ?></p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div>
                        <h4 data-tr="Telefon" data-en="Phone">Telefon</h4>
                        <p><a href="tel:<?= e($phone_href) ?>"><?= e($phone) ?></a></p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div>
                        <h4 data-tr="E-posta" data-en="Email">E-posta</h4>
                        <p><a href="mailto:<?= e($email) ?>"><?= e($email) ?></a></p>
                        <p><a href="mailto:<?= e(CONTACT_EMAIL_2) ?>"><?= e(CONTACT_EMAIL_2) ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Harita -->
    <section class="contact-map-section" style="padding-bottom:80px;">
        <div class="container">
            <h2 class="section-title" style="margin:0 0 20px;" data-tr="Konum" data-en="Location">Konum</h2>
            <div style="border-radius:10px; overflow:hidden; border:1px solid var(--light-gray); box-shadow:var(--shadow-md);">
                <iframe
                    src="<?= e($map_src) ?>"
                    width="100%" height="420" style="border:0; display:block;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    title="Polikon konumu"></iframe>
            </div>
            <p class="muted" style="margin-top:12px; color:var(--text-medium); font-size:14px;"><?= e($addr) ?></p>
        </div>
    </section>

<?php require __DIR__ . '/partials/footer.php'; ?>
