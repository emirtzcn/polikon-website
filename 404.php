<?php
http_response_code(404);
$page_title = 'Sayfa Bulunamadı';
$active = '';
$meta_description = 'Aradığınız sayfa bulunamadı. Polikon BOPP film ürünlerine ve iletişim bilgilerine ana sayfadan ulaşabilirsiniz.';
require_once __DIR__ . '/includes/functions.php';
require __DIR__ . '/partials/header.php';
?>
<section class="page-header" style="margin-top:102px;">
    <div class="page-header-overlay"></div>
    <div class="container">
        <div class="page-header-content" style="text-align:center;">
            <div style="font-family:var(--font-display); font-size:96px; font-weight:700; line-height:1; color:var(--red);">404</div>
            <h1 data-tr="Sayfa Bulunamadı" data-en="Page Not Found">Sayfa Bulunamadı</h1>
            <p class="page-header-subtitle" data-tr="Aradığınız sayfa taşınmış veya kaldırılmış olabilir." data-en="The page you are looking for may have been moved or removed.">Aradığınız sayfa taşınmış veya kaldırılmış olabilir.</p>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container" style="text-align:center;">
        <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap; margin-bottom:36px;">
            <a href="index.php" class="btn btn-primary" data-tr="Ana Sayfaya Dön" data-en="Back to Home">Ana Sayfaya Dön</a>
            <a href="products.php" class="btn btn-outline" data-tr="Ürünleri İncele" data-en="Browse Products">Ürünleri İncele</a>
            <a href="contact.php" class="btn btn-outline" data-tr="İletişim" data-en="Contact">İletişim</a>
        </div>
        <form action="search.php" method="get" style="max-width:520px; margin:0 auto; display:flex; gap:12px;">
            <input type="text" name="q" placeholder="Sitede arama yapın..." class="search-input" style="flex:1; padding:12px 16px; border:1px solid var(--light-gray); border-radius:6px;">
            <button type="submit" class="btn btn-primary" data-tr="Ara" data-en="Search">Ara</button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
