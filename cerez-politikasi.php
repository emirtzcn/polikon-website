<?php
$page_title = 'Çerez Politikası';
$active = '';
$meta_description = 'Polikon Çerez Politikası — bu web sitesinde kullanılan çerezler ve benzeri teknolojiler hakkında bilgilendirme.';
require_once __DIR__ . '/includes/functions.php';
require __DIR__ . '/partials/header.php';
?>
<section class="page-header" style="margin-top:102px;">
    <div class="page-header-overlay"></div>
    <div class="container">
        <div class="page-header-content">
            <h1 data-tr="Çerez Politikası" data-en="Cookie Policy">Çerez Politikası</h1>
            <p class="page-header-subtitle" data-tr="Çerezler ve benzeri teknolojiler hakkında bilgilendirme" data-en="Information about cookies and similar technologies">Çerezler ve benzeri teknolojiler hakkında bilgilendirme</p>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container" style="max-width:820px;">
        <div class="kvkk-content" style="line-height:1.8; color:var(--text-medium);">
            <p data-tr="Bu Çerez Politikası, <?= e(SITE_NAME) ?> web sitesini ziyaret ettiğinizde çerezlerin ve benzeri teknolojilerin nasıl kullanıldığını açıklar."
               data-en="This Cookie Policy explains how cookies and similar technologies are used when you visit the <?= e(SITE_NAME) ?> website.">Bu Çerez Politikası, <?= e(SITE_NAME) ?> web sitesini ziyaret ettiğinizde çerezlerin ve benzeri teknolojilerin nasıl kullanıldığını açıklar.</p>

            <h3 style="margin:26px 0 8px;" data-tr="1. Çerez Nedir?" data-en="1. What Is a Cookie?">1. Çerez Nedir?</h3>
            <p data-tr="Çerezler, bir web sitesini ziyaret ettiğinizde tarayıcınıza kaydedilen küçük metin dosyalarıdır. Benzer şekilde, tarayıcınızın yerel depolama (localStorage) alanı da tercihlerinizi cihazınızda saklamak için kullanılabilir."
               data-en="Cookies are small text files stored in your browser when you visit a website. Similarly, your browser's local storage (localStorage) may be used to keep your preferences on your device.">Çerezler, bir web sitesini ziyaret ettiğinizde tarayıcınıza kaydedilen küçük metin dosyalarıdır. Benzer şekilde, tarayıcınızın yerel depolama (localStorage) alanı da tercihlerinizi cihazınızda saklamak için kullanılabilir.</p>

            <h3 style="margin:26px 0 8px;" data-tr="2. Bu Sitede Hangi Teknolojiler Kullanılıyor?" data-en="2. Which Technologies Does This Site Use?">2. Bu Sitede Hangi Teknolojiler Kullanılıyor?</h3>
            <p data-tr="Bu web sitesi tamamen statiktir ve sunucu tarafında herhangi bir işlem yapmaz. Yalnızca sitenin düzgün çalışması için gerekli olan teknolojiler kullanılır:"
               data-en="This website is fully static and performs no server-side processing. Only technologies strictly necessary for the site to function properly are used:">Bu web sitesi tamamen statiktir ve sunucu tarafında herhangi bir işlem yapmaz. Yalnızca sitenin düzgün çalışması için gerekli olan teknolojiler kullanılır:</p>
            <ul style="margin-left:20px;">
                <li>
                    <strong data-tr="Dil tercihi (localStorage):" data-en="Language preference (localStorage):">Dil tercihi (localStorage):</strong>
                    <span data-tr="Seçtiğiniz dilin (TR/EN) sayfalar arasında korunması için tarayıcınızda saklanır."
                          data-en="Stored in your browser so your chosen language (TR/EN) is preserved across pages.">Seçtiğiniz dilin (TR/EN) sayfalar arasında korunması için tarayıcınızda saklanır.</span>
                </li>
                <li>
                    <strong data-tr="Çerez onayı (localStorage):" data-en="Cookie consent (localStorage):">Çerez onayı (localStorage):</strong>
                    <span data-tr="Çerez bildirimine verdiğiniz yanıtın hatırlanması için saklanır."
                          data-en="Stored to remember your response to the cookie notice.">Çerez bildirimine verdiğiniz yanıtın hatırlanması için saklanır.</span>
                </li>
            </ul>

            <h3 style="margin:26px 0 8px;" data-tr="3. Reklam ve İzleme Çerezleri" data-en="3. Advertising and Tracking Cookies">3. Reklam ve İzleme Çerezleri</h3>
            <p data-tr="Bu sitede reklam, pazarlama veya üçüncü taraf izleme (analitik) çerezleri KULLANILMAMAKTADIR. Verileriniz üçüncü taraflara satılmaz veya paylaşılmaz."
               data-en="This site does NOT use advertising, marketing, or third-party tracking (analytics) cookies. Your data is not sold or shared with third parties.">Bu sitede reklam, pazarlama veya üçüncü taraf izleme (analitik) çerezleri KULLANILMAMAKTADIR. Verileriniz üçüncü taraflara satılmaz veya paylaşılmaz.</p>

            <h3 style="margin:26px 0 8px;" data-tr="4. Harita (Google Maps)" data-en="4. Map (Google Maps)">4. Harita (Google Maps)</h3>
            <p data-tr="İletişim sayfasındaki konum haritası, Google Maps üzerinden gömülü olarak sunulur. Bu içeriği görüntülediğinizde Google, kendi çerez ve gizlilik politikalarını uygulayabilir."
               data-en="The location map on the contact page is embedded via Google Maps. When you view this content, Google may apply its own cookie and privacy policies.">İletişim sayfasındaki konum haritası, Google Maps üzerinden gömülü olarak sunulur. Bu içeriği görüntülediğinizde Google, kendi çerez ve gizlilik politikalarını uygulayabilir.</p>

            <h3 style="margin:26px 0 8px;" data-tr="5. Çerezleri Nasıl Yönetebilirsiniz?" data-en="5. How Can You Manage Cookies?">5. Çerezleri Nasıl Yönetebilirsiniz?</h3>
            <p data-tr="Tarayıcınızın ayarları üzerinden çerezleri ve yerel depolamayı istediğiniz zaman silebilir veya engelleyebilirsiniz. Gerekli teknolojileri devre dışı bırakmanız halinde dil tercihi gibi bazı özellikler düzgün çalışmayabilir."
               data-en="You can delete or block cookies and local storage at any time through your browser settings. If you disable the necessary technologies, some features such as the language preference may not work properly.">Tarayıcınızın ayarları üzerinden çerezleri ve yerel depolamayı istediğiniz zaman silebilir veya engelleyebilirsiniz. Gerekli teknolojileri devre dışı bırakmanız halinde dil tercihi gibi bazı özellikler düzgün çalışmayabilir.</p>

            <h3 style="margin:26px 0 8px;" data-tr="6. İletişim" data-en="6. Contact">6. İletişim</h3>
            <p data-tr="Bu politika hakkındaki sorularınız için bizimle iletişime geçebilirsiniz: " data-en="For questions about this policy, you can contact us: ">Bu politika hakkındaki sorularınız için bizimle iletişime geçebilirsiniz: <?= e(CONTACT_EMAIL) ?></p>

            <p style="margin-top:26px; font-size:13px; color:var(--medium-gray);"><em data-tr="Not: Bu metin genel bir şablondur. Yayımlamadan önce şirketinizin hukuk danışmanı tarafından gözden geçirilmesi önerilir." data-en="Note: This text is a general template. It is recommended to have it reviewed by your company's legal advisor before publishing.">Not: Bu metin genel bir şablondur. Yayımlamadan önce şirketinizin hukuk danışmanı tarafından gözden geçirilmesi önerilir.</em></p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
