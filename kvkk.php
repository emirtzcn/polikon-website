<?php
$page_title = 'KVKK Aydınlatma Metni';
$active = '';
$meta_description = 'Polikon KVKK Aydınlatma Metni — 6698 sayılı Kişisel Verilerin Korunması Kanunu kapsamında kişisel verilerinizin işlenmesine ilişkin bilgilendirme.';
require_once __DIR__ . '/includes/functions.php';
require __DIR__ . '/partials/header.php';
?>
<section class="page-header" style="margin-top:102px;">
    <div class="page-header-overlay"></div>
    <div class="container">
        <div class="page-header-content">
            <h1>KVKK Aydınlatma Metni</h1>
            <p class="page-header-subtitle">Kişisel Verilerin Korunması Kanunu kapsamında bilgilendirme</p>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container" style="max-width:820px;">
        <div class="kvkk-content" style="line-height:1.8; color:var(--text-medium);">
            <p><strong>Veri Sorumlusu:</strong> <?= e(SITE_NAME) ?> (“Şirket”). Adres: <?= e(CONTACT_ADDRESS) ?>. E-posta: <?= e(CONTACT_EMAIL) ?>.</p>

            <h3 style="margin:26px 0 8px;">1. İşlenen Kişisel Veriler</h3>
            <p>İletişim formu ve teknik doküman (PDF) talep formu aracılığıyla; ad-soyad, e-posta adresi, telefon numarası, şirket/kurum bilgisi ve tarafınızca iletilen mesaj içeriği ile teknik olarak IP adresiniz işlenmektedir.</p>

            <h3 style="margin:26px 0 8px;">2. İşleme Amaçları</h3>
            <ul style="margin-left:20px;">
                <li>Talep ve sorularınızın yanıtlanması, sizinle iletişim kurulması,</li>
                <li>Talep ettiğiniz ürün teknik dokümanlarının (PDF) e-posta ile iletilmesi,</li>
                <li>Ticari ilişkinin yürütülmesi ve müşteri/talep kayıtlarının tutulması,</li>
                <li>Hizmet güvenliğinin sağlanması ve kötüye kullanımın önlenmesi.</li>
            </ul>

            <h3 style="margin:26px 0 8px;">3. Hukuki Sebep</h3>
            <p>Kişisel verileriniz, 6698 sayılı Kanun’un 5. maddesi uyarınca; açık rızanıza, bir sözleşmenin kurulması/ifası için gerekli olmasına ve Şirket’in meşru menfaatine dayanılarak işlenir.</p>

            <h3 style="margin:26px 0 8px;">4. Aktarım</h3>
            <p>Kişisel verileriniz, yalnızca yukarıdaki amaçlarla sınırlı olmak üzere; hizmet aldığımız e-posta/altyapı sağlayıcılarına ve yasal olarak yetkili kamu kurumlarına, mevzuata uygun şekilde aktarılabilir. Verileriniz pazarlama amacıyla üçüncü taraflara satılmaz.</p>

            <h3 style="margin:26px 0 8px;">5. Saklama Süresi</h3>
            <p>Kişisel verileriniz, işleme amacının gerektirdiği süre ve ilgili mevzuatta öngörülen zamanaşımı süreleri boyunca saklanır; süre sonunda silinir, yok edilir veya anonim hale getirilir.</p>

            <h3 style="margin:26px 0 8px;">6. Haklarınız (KVKK md. 11)</h3>
            <p>Kişisel verilerinizin işlenip işlenmediğini öğrenme, bilgi talep etme, düzeltilmesini/silinmesini isteme, işlemeye itiraz etme ve zarara uğramanız halinde giderim talep etme haklarına sahipsiniz. Başvurularınızı <?= e(CONTACT_EMAIL) ?> adresine iletebilirsiniz.</p>

            <p style="margin-top:26px; font-size:13px; color:var(--medium-gray);"><em>Not: Bu metin genel bir şablondur. Yayımlamadan önce şirketinizin hukuk danışmanı tarafından gözden geçirilmesi önerilir.</em></p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
