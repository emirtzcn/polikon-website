<?php
/**
 * Ürünler bölümü: "Ürünler" başlığı + 4 kategori ürün fotoğrafı yan yana,
 * her fotoğrafın altında kendi kategori sayfasına giden buton,
 * en altta ortada "Bütün Ürünleri İncele" butonu.
 * Görsel dosyaları: images/iko_label.(png|jpg), iko_face..., iko_pack..., iko_plain...
 */
require_once __DIR__ . '/../includes/functions.php';
$__cats = get_categories();

/** Kategori slug'ına ait görsel dosyasını bul (png/jpg/jpeg). */
function pb_image_for($slug) {
    $base = 'images/' . str_replace('-', '_', $slug);
    foreach (['.png', '.jpg', '.jpeg', '.webp'] as $ext) {
        if (is_file(__DIR__ . '/../' . $base . $ext)) return $base . $ext;
    }
    return $base . '.png'; // varsayılan
}
?>
<section class="products-banner<?= !empty($pb_wave) ? ' has-wave' : '' ?>">
    <div class="container">
        <?php if (empty($pb_hide_title)): ?>
        <div class="section-header">
            <span class="section-label section-label-large" data-tr="Ürünler" data-en="Products">Ürünler</span>
        </div>
        <?php endif; ?>

        <div class="products-banner-inner">
            <?php foreach ($__cats as $__cat):
                $__img = pb_image_for($__cat['slug']);
                $__parts = explode(' ', $__cat['name'], 2);
                $__first = $__parts[0];                 // "IKO"
                $__rest  = $__parts[1] ?? '';           // "LABEL" vb.
            ?>
                <a class="pb-item" href="category.php?slug=<?= e($__cat['slug']) ?>" aria-label="<?= e($__cat['name']) ?>">
                    <img src="<?= e($__img) ?>" alt="<?= e($__cat['name']) ?>" loading="lazy">
                    <span class="pb-item-label">
                        <span class="pb-orange"><?= e($__first) ?></span><?= $__rest !== '' ? ' ' . e($__rest) : '' ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>

        <?php if (empty($pb_hide_cta)): ?>
        <div class="products-banner-cta">
            <a href="products.php" class="btn btn-outline" data-tr="Bütün Ürünleri İncele" data-en="Explore All Products">Bütün Ürünleri İncele</a>
        </div>
        <?php endif; ?>
    </div>
</section>
