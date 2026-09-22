<?php
/**
 * Ürün ailesi detay sayfası — polikon-website src/pages/ProductDetail.jsx portu.
 * Bölümler: 1) Hero  2) Ana görsel + açıklama  3) Temel özellikler (kalınlık/yoğunluk/avantajlar)
 *           4) Teknik katalog (kod tablosu + TDS bağlantıları)
 */
$active = 'products';
require_once __DIR__ . '/includes/functions.php';

$slug = $_GET['slug'] ?? '';
$category = get_category_by_slug($slug);
if (!$category) {
    http_response_code(404);
    $page_title = 'Ürün bulunamadı';
    require __DIR__ . '/partials/header.php';
    echo '<div class="pk"><section class="section" style="margin-top:102px;"><div class="container"><h1>Ürün ailesi bulunamadı</h1><p style="margin-top:1rem;"><a href="products.php" class="text-link">Tüm ürünlere dön &rarr;</a></p></div></section></div>';
    require __DIR__ . '/partials/footer.php';
    exit;
}

if (!function_exists('pk_enc')) {
    function pk_enc(string $path): string
    {
        return implode('/', array_map('rawurlencode', explode('/', $path)));
    }
}

$page_title = $category['name'];
$variants   = $category['variants'];
$desc      = $category['desc'] ?? ['tr' => '', 'en' => ''];
$tag        = $category['tag'] ?? ['tr' => '', 'en' => ''];
$features   = $category['features'] ?? [];
$hero_img   = $category['mockup'] ?? ($category['image'] ?? '');
$detail_img = $category['mockup_alt'] ?? $hero_img;
$meta_description = $category['name'] . ' — Polikon BOPP film ürün ailesi. ' . strip_tags($desc['tr']);

// Aile adı: "IKO" vurgu rengiyle (FamilyName.jsx)
$__parts    = explode(' ', $category['name'], 2);
$name_first = $__parts[0];
$name_rest  = $__parts[1] ?? '';

/* TDS PDF çözümleyici: datasheets/ içinde "POLIKON <KOD> TDS *.pdf" arar.
   "CLH - M" gibi kodlar normalize edilir; bulunamazsa KOD1 (ör. CLH → CLH1) denenir. */
$__tds_files = glob(__DIR__ . '/datasheets/POLIKON * TDS *.pdf') ?: [];
$__tds_index = [];
foreach ($__tds_files as $__f) {
    if (preg_match('/POLIKON (\S+) TDS /', basename($__f), $__m)) {
        $__tds_index[strtoupper($__m[1])] = 'datasheets/' . basename($__f);
    }
}
function pk_tds_for(string $code, array $index): ?string
{
    $c = strtoupper(preg_replace('/\s+/', '', $code)); // "CLH - M" → "CLH-M"
    if (isset($index[$c])) { return $index[$c]; }
    if (isset($index[$c . '1'])) { return $index[$c . '1']; }
    return null;
}

/* Aralık kutuları (RangeBox): "30–60 µm" → ["30", "60"], "0.91" → ["0.91"] */
function pk_range_parts(string $value, string $unit): array
{
    $parts = array_map(function ($v) use ($unit) {
        $v = trim($v);
        return trim(preg_replace('/\s*' . preg_quote($unit, '/') . '\s*$/u', '', $v));
    }, explode('–', $value));
    return array_values(array_filter($parts, fn($p) => $p !== ''));
}
$thick_parts = pk_range_parts($category['thickness_range'] ?? '', 'µm');
$dens_parts  = pk_range_parts($category['density_range'] ?? '', 'g/cm³');

// "IKO" vurgusu her ailede marka turuncusu (.pk .accent-word); aileye özel renk kullanılmaz.
require __DIR__ . '/partials/header.php';
?>

<div class="pk pk-family">
    <!-- 1. Ürün hero (PageHero, fotoğraflı) -->
    <section class="page-hero page-hero--image">
        <div class="page-hero__media">
            <img src="<?= e(pk_enc($hero_img)) ?>" alt="" loading="eager">
        </div>
        <div class="container page-hero__content page-hero__content--left">
            <span class="eyebrow" <?= tt($tag['tr'], $tag['en']) ?>><?= e($tag['tr']) ?></span>
            <h1><span class="accent-word"><?= e($name_first) ?></span><?= $name_rest !== '' ? ' ' . e($name_rest) : '' ?></h1>
            <p class="lead" <?= tt($desc['tr'], $desc['en']) ?>><?= e($desc['tr']) ?></p>
        </div>
    </section>

    <!-- 2. Ana görsel + açıklama -->
    <section class="section">
        <div class="container">
            <div class="product-detail">
                <div class="media product-detail__media">
                    <div class="tilt-image">
                        <img src="<?= e(pk_enc($detail_img)) ?>" alt="<?= e($category['name']) ?>" loading="lazy">
                    </div>
                </div>
                <div class="product-detail__content">
                    <span class="eyebrow" <?= tt($tag['tr'], $tag['en']) ?>><?= e($tag['tr']) ?></span>
                    <h2><span class="accent-word"><?= e($name_first) ?></span><?= $name_rest !== '' ? ' ' . e($name_rest) : '' ?></h2>
                    <p class="lead" <?= tt($desc['tr'], $desc['en']) ?>><?= e($desc['tr']) ?></p>
                    <a href="contact.php" class="btn btn--primary" style="margin-top: 2rem;">
                        <span <?= tt('Teklif Alın', 'Request a Quote') ?>>Teklif Alın</span> <span class="arrow">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Temel özellikler -->
    <section class="section section--muted">
        <div class="container">
            <div class="section-header section-header--left">
                <div>
                    <span class="eyebrow" <?= tt('Ürün Bilgisi', 'Product Information') ?>>Ürün Bilgisi</span>
                    <h2 <?= tt('Temel özellikler', 'Key properties') ?>>Temel özellikler</h2>
                </div>
            </div>
            <div class="key-properties">
                <div class="range-box">
                    <span class="range-box__label range-box__label--accent" <?= tt('Kalınlık Aralığı', 'Thickness Range') ?>>Kalınlık Aralığı</span>
                    <div class="range-box__bar range-box__bar--accent">
                        <span class="range-box__bar-track"></span>
                        <span class="range-box__bar-fill"></span>
                        <span class="range-box__dot range-box__dot--start"></span>
                        <?php if (count($thick_parts) === 2): ?><span class="range-box__dot range-box__dot--end"></span><?php endif; ?>
                    </div>
                    <div class="range-box__values">
                        <?php foreach ($thick_parts as $p): ?><strong><?= e($p) ?> µm</strong><?php endforeach; ?>
                    </div>
                </div>
                <div class="range-box">
                    <span class="range-box__label range-box__label--neutral" <?= tt('Yoğunluk Aralığı', 'Density Range') ?>>Yoğunluk Aralığı</span>
                    <div class="range-box__bar range-box__bar--neutral">
                        <span class="range-box__bar-track"></span>
                        <span class="range-box__bar-fill"></span>
                        <span class="range-box__dot range-box__dot--start"></span>
                        <?php if (count($dens_parts) === 2): ?><span class="range-box__dot range-box__dot--end"></span><?php endif; ?>
                    </div>
                    <div class="range-box__values">
                        <?php foreach ($dens_parts as $p): ?><strong><?= e($p) ?> g/cm³</strong><?php endforeach; ?>
                    </div>
                </div>
                <div class="info-box info-box--benefits">
                    <span class="info-box__label" <?= tt('Temel Avantajlar', 'Key Benefits') ?>>Temel Avantajlar</span>
                    <ul class="info-box__list">
                        <?php foreach ($features as $f): ?>
                            <li <?= tt($f[0], $f[1]) ?>><?= e($f[0]) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Teknik katalog + TDS -->
    <section class="section" id="tds">
        <div class="container">
            <div class="section-header section-header--left">
                <div>
                    <span class="eyebrow" <?= tt('Teknik Katalog', 'Technical Catalogue') ?>>Teknik Katalog</span>
                    <h2><span class="accent-word"><?= e($name_first) ?></span><?= $name_rest !== '' ? ' ' . e($name_rest) : '' ?> <span <?= tt('ürün ailesi', 'product range') ?>>ürün ailesi</span></h2>
                    <p class="lead" <?= tt('POLIKON ürün kataloğundan resmi film kodları. Tam teknik veri föyü özellikleri için TDS PDF’sini açın.', 'Official film codes from the POLIKON product catalogue. Open the TDS PDF for full technical data sheet properties.') ?>>POLIKON ürün kataloğundan resmi film kodları. Tam teknik veri föyü özellikleri için TDS PDF’sini açın.</p>
                </div>
            </div>
            <div class="tech-table">
                <div class="tech-table__row tech-table__row--head">
                    <span <?= tt('Kod', 'Code') ?>>Kod</span>
                    <span <?= tt('Görünüm', 'Appearance') ?>>Görünüm</span>
                    <span <?= tt('Kalınlık', 'Thickness') ?>>Kalınlık</span>
                    <span <?= tt('Yoğunluk', 'Density') ?>>Yoğunluk</span>
                    <span <?= tt('TDS Özellikleri', 'TDS Properties') ?>>TDS Özellikleri</span>
                </div>
                <?php foreach ($variants as $v):
                    $code = $v['code'] ?? '—';
                    $tds  = pk_tds_for($code, $__tds_index);
                ?>
                    <div class="tech-table__row">
                        <span class="tech-table__code"><?= e($code) ?></span>
                        <span><?= e($v['name'] ?? '—') ?></span>
                        <span><?= e($v['thickness'] ?? '—') ?></span>
                        <span><?= e($v['density'] ?? '—') ?></span>
                        <span>
                            <?php if ($tds): ?>
                                <a href="<?= e(pk_enc($tds)) ?>" target="_blank" rel="noopener noreferrer" class="tech-table__tds" <?= tt("TDS'yi Görüntüle", 'View TDS') ?>>TDS'yi Görüntüle</a>
                            <?php else: ?>
                                <span class="tech-table__tds tech-table__tds--none" <?= tt('Mevcut değil', 'Not available') ?>>Mevcut değil</span>
                            <?php endif; ?>
                        </span>
                    </div>
                <?php endforeach; ?>
                <?php if (!$variants): ?>
                    <div class="tech-table__row"><span style="grid-column: 1 / -1; color: var(--pk-ink-3);">Bu ailede henüz ürün yok.</span></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
