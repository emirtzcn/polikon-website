    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-col">
                    <div class="footer-logo">
                        <img src="images/logo%20beyaz%20kirpik.png" alt="Polikon" class="logo-img">
                    </div>
                </div>

                <div class="footer-col">
                    <h4 class="footer-title" data-tr="Şirket" data-en="Company">Şirket</h4>
                    <ul class="footer-links">
                        <li><a href="about.php" data-tr="Hakkımızda" data-en="About Us">Hakkımızda</a></li>
                        <li><a href="news.php" data-tr="Haberler" data-en="News">Haberler</a></li>
                        <li><a href="contact.php" data-tr="İletişim" data-en="Contact">İletişim</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4 class="footer-title" data-tr="İletişim" data-en="Contact">İletişim</h4>
                    <div class="footer-contact-grid">
                        <ul class="footer-contact">
                            <li>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span data-tr="<?= e(CONTACT_ADDRESS) ?>" data-en="<?= e(CONTACT_ADDRESS) ?>"><?= e(CONTACT_ADDRESS) ?></span>
                            </li>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <span><?= e(CONTACT_PHONE) ?></span>
                            </li>
                        </ul>
                        <div class="footer-contact-right">
                            <ul class="footer-contact">
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <span><?= e(CONTACT_EMAIL) ?></span>
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <span><?= e(CONTACT_EMAIL_2) ?></span>
                                </li>
                            </ul>
                            <div class="social-links footer-contact-social">
                                <a href="<?= e(SOCIAL_LINKEDIN) ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> Polikon. <span data-tr="Tüm hakları saklıdır." data-en="All rights reserved.">Tüm hakları saklıdır.</span></p>
                <p class="footer-legal-links">
                    <a href="kvkk.php" data-tr="KVKK Aydınlatma Metni" data-en="Privacy Notice (KVKK)">KVKK Aydınlatma Metni</a>
                    <span class="footer-legal-sep">|</span>
                    <a href="cerez-politikasi.php" data-tr="Çerez Politikası" data-en="Cookie Policy">Çerez Politikası</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Çerez Onay Bandı -->
    <div class="cookie-banner" id="cookieBanner" hidden>
        <div class="cookie-banner-inner">
            <p class="cookie-text">
                <span data-tr="Bu web sitesi, deneyiminizi iyileştirmek için yalnızca gerekli çerezleri ve yerel depolamayı (dil tercihi gibi) kullanır. Ayrıntılar için"
                      data-en="This website uses only necessary cookies and local storage (such as language preference) to improve your experience. For details, see our">Bu web sitesi, deneyiminizi iyileştirmek için yalnızca gerekli çerezleri ve yerel depolamayı (dil tercihi gibi) kullanır. Ayrıntılar için</span>
                <a href="cerez-politikasi.php" data-tr="Çerez Politikası" data-en="Cookie Policy">Çerez Politikası</a><span data-tr="'na göz atabilirsiniz." data-en=".">'na göz atabilirsiniz.</span>
            </p>
            <div class="cookie-actions">
                <button type="button" class="btn btn-outline cookie-btn" id="cookieReject" data-tr="Reddet" data-en="Reject">Reddet</button>
                <button type="button" class="btn btn-primary cookie-btn" id="cookieAccept" data-tr="Kabul Et" data-en="Accept">Kabul Et</button>
            </div>
        </div>
    </div>

    <script src="js/main.js?v=<?= @filemtime(__DIR__ . '/../js/main.js') ?: time() ?>"></script>
</body>
</html>
