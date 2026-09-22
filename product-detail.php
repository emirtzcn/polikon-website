<?php
$active = 'products';
require_once __DIR__ . '/includes/functions.php';

$slug = $_GET['product'] ?? '';
$variant = get_variant_by_slug($slug);

if (!$variant) {
    http_response_code(404);
    $page_title = 'Ürün bulunamadı';
    require __DIR__ . '/partials/header.php';
    echo '<section class="product-detail-section" style="margin-top:120px;"><div class="container"><h1 class="section-title">Ürün bulunamadı</h1><p><a href="products.php">Tüm ürünlere dön</a></p></div></section>';
    require __DIR__ . '/partials/footer.php';
    exit;
}

$page_title = $variant['name'];
$meta_description = $variant['name'] . ' (' . $variant['category_name'] . ') — Polikon BOPP film. Ürünün teknik data sheet (TDS) dokümanını görüntüleyin ve indirin.';
$pdf_url = 'datasheets/' . rawurlencode($variant['pdf_code']) . '.pdf';
require __DIR__ . '/partials/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content">
                <h1 class="page-title"><?= e($variant['name']) ?></h1>
                <nav class="breadcrumb">
                    <a href="index.php" data-tr="Ana Sayfa" data-en="Home">Ana Sayfa</a>
                    <span>/</span>
                    <a href="products.php" data-tr="Ürünler" data-en="Products">Ürünler</a>
                    <span>/</span>
                    <a href="category.php?slug=<?= e($variant['category_slug']) ?>"><?= e($variant['category_name']) ?></a>
                    <span>/</span>
                    <span><?= e($variant['name']) ?></span>
                </nav>
            </div>
        </div>
    </section>

    <!-- Product Documentation Section -->
    <section class="product-formulation-section">
        <div class="container">
            <div class="formulation-content" id="formulationContent">
                <div class="formulation-placeholder">
                    <div class="placeholder-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h2 data-tr="Teknik Data Sheet (TDS)" data-en="Technical Data Sheet (TDS)">Teknik Data Sheet (TDS)</h2>
                    <p data-tr="Bu ürünün teknik özelliklerini içeren dokümanı görüntülemek için aşağıdaki butona tıklayın. Belge yeni sekmede açılır; oradan indirebilirsiniz." data-en="Click the button below to view this product's technical data sheet. It opens in a new tab where you can download it.">Bu ürünün teknik özelliklerini içeren dokümanı görüntülemek için aşağıdaki butona tıklayın. Belge yeni sekmede açılır; oradan indirebilirsiniz.</p>

                    <a href="<?= e($pdf_url) ?>" target="_blank" rel="noopener" class="btn btn-primary" data-tr="TDS'i Görüntüle / İndir" data-en="View / Download TDS">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 6px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        TDS'i Görüntüle / İndir
                    </a>
                </div>
            </div>

            <div class="back-to-products">
                <a href="category.php?slug=<?= e($variant['category_slug']) ?>" class="btn btn-outline" data-tr="Kategoriye Dön" data-en="Back to Category">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"></path><polyline points="12 19 5 12 12 5"></polyline></svg>
                    Kategoriye Dön
                </a>
            </div>
        </div>
    </section>

<?php require __DIR__ . '/partials/footer.php'; ?>
