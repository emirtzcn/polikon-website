<?php
$page_title = 'Ürünler';
$active = 'products';
$meta_description = 'Polikon BOPP film ürünleri — IKO WRAP, IKO MOLD, IKO FACE, IKO PACK ve IKO PLAIN kategorileriyle etiket, ambalaj ve laminasyon için film çözümleri.';
require_once __DIR__ . '/includes/functions.php';
$categories = get_categories();

$extra_head = <<<'HTML'
<style>
    /* Sayfa başlığı stilleri (.pk .page-hero / --products) css/ported.css içinde */

    /* Kategori zigzag bandı (Ürünler sayfasına özel: alt alta, foto + yan yazı) */
    .pb-zig-section { padding: 64px 0 90px; }
    .pb-zigzag { display: flex; flex-direction: column; gap: 56px; }
    .pb-zig-row { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center; }
    .pb-zig-photo { display: block; position: relative; overflow: hidden; border-radius: 10px; background: var(--light-bg); }
    .pb-zig-photo img { width: 100%; height: 440px; object-fit: contain; display: block; transition: transform .5s ease; }
    .pb-zig-photo:hover img { transform: scale(1.04); }
    /* Çift satırlar (2. ve 4.) fotoğraf sağda, yazı solda */
    .pb-zig-row.reverse .pb-zig-photo { order: 2; }
    .pb-zig-row.reverse .pb-zig-text  { order: 1; }
    .pb-zig-title {
        font-family: var(--font-display); font-size: 34px; font-weight: 800;
        color: var(--text-dark); line-height: 1.1; margin: 0 0 16px;
    }
    .pb-zig-title .pb-orange { color: #f7941e; }
    .pb-zig-desc { font-size: 16px; line-height: 1.7; color: var(--text-medium); margin: 0 0 24px; }
    @media (max-width: 780px) {
        .pb-zig-section { padding: 44px 0 60px; }
        .pb-zig-row, .pb-zig-row.reverse { grid-template-columns: 1fr; gap: 20px; }
        .pb-zig-row.reverse .pb-zig-photo { order: 1; }
        .pb-zig-row.reverse .pb-zig-text  { order: 2; }
        .pb-zig-photo img { height: 300px; }
        .pb-zig-title { font-size: 28px; }
    }

    /* Ürün Genel Bakış Matrisi */
    .pov-section { padding: 10px 0 100px; }
    .pov-wrap { overflow-x: auto; margin-top: 40px; }
    .pov-table { width: 100%; border-collapse: collapse; min-width: 860px; }
    .pov-table th, .pov-table td { padding: 22px 16px; text-align: center; vertical-align: top; }
    .pov-colhead { border-bottom: 1px solid var(--light-gray); }
    .pov-bar { display: block; height: 8px; border-radius: 4px; background: var(--pov-col, #999); margin-bottom: 16px; }
    .pov-cat { display: block; font-family: var(--font-display); font-weight: 800; font-size: 22px; color: var(--text-dark); line-height: 1.1; }
    .pov-sub { display: block; font-size: 13px; font-weight: 700; letter-spacing: 0.6px; color: var(--text-medium); text-transform: uppercase; margin-top: 6px; }
    .pov-corner { width: 180px; }
    .pov-table tbody tr { border-top: 1px solid var(--light-gray); }
    .pov-row { font-weight: 800; color: var(--text-dark); text-transform: uppercase; letter-spacing: 0.5px; font-size: 17px; white-space: nowrap; }
    .pov-table tbody td { color: var(--text-medium); font-size: 18px; line-height: 1.5; }
    /* Genel bakış sonu: boşluk + ince ayıraç çizgi */
    .pov-divider { border: 0; border-top: 1px solid var(--pk-line, #e6e3dc); margin: 56px 0 0; }

    /* 2. ve 4. ürün (foto sağda): satırın arkaplanı, ürün fotoğrafı kutusunun rengiyle kenardan kenara */
    .pk .product-row.product-row--band { position: relative; z-index: 0; padding: clamp(2.5rem, 5vw, 4rem) 0; }
    .pk .product-row.product-row--band::before {
        content: ''; position: absolute; z-index: -1; top: 0; bottom: 0;
        left: 50%; width: 100vw; transform: translateX(-50%);
        background: var(--pk-paper-2);
    }
    .pk .product-row.product-row--band .product-row__media { background: transparent; }
    /* 1., 3. ve 5. ürün (beyaz satırlar): fotoğraf kutusunun zemini beyaz */
    .pk .product-row:not(.product-row--band) .product-row__media { background: #fff; }

    /* Ürün fotoğrafı tıklanabilir (kategori sayfasına gider) — hover'da hafif büyüme */
    .pk a.product-row__media { cursor: pointer; }
    .pk a.product-row__media img { transition: transform .5s ease; }
    .pk a.product-row__media:hover img { transform: scale(1.04); }
</style>
HTML;

require __DIR__ . '/partials/header.php';

// Ürünler başlık görseli (polikon-website: IMG.backgrounds.productHero)
$products_hero = 'images/backgrounds/product 1.png';
?>

    <!-- Page Header (polikon-website PageHero portu) -->
    <div class="pk">
        <section class="page-hero page-hero--image page-hero--products">
            <div class="page-hero__media page-hero__media--products">
                <img src="<?= e(pk_enc($products_hero)) ?>" alt="" loading="eager">
            </div>
            <div class="container page-hero__content page-hero__content--left">
                <span class="eyebrow" <?= tt('Ürün Portföyü', 'Product Portfolio') ?>>Ürün Portföyü</span>
                <h1 <?= tt('Performans İçin Tasarlanmış Filmler.', 'Engineered Films. Built for Performance.') ?>>Performans İçin Tasarlanmış Filmler.</h1>
                <p class="lead" <?= tt('Etiketleme, ambalaj ve konvertör uygulamaları için tasarlanmış beş BOPP film ailesi; tutarlı kalite ve teknik destekle.', 'Five BOPP film families engineered for labelling, packaging and converting applications, backed by consistent quality and technical support.') ?>>Etiketleme, ambalaj ve konvertör uygulamaları için tasarlanmış beş BOPP film ailesi; tutarlı kalite ve teknik destekle.</p>
            </div>
        </section>
    </div>

    <?php
    // Ürün Genel Bakış Matrisi (görünüm türüne göre kodlar)
    $pov_color = [];
    foreach ($categories as $c) { $pov_color[$c['slug']] = $c['color'] ?? '#999'; }
    $pov_cols = [
        ['slug' => 'iko-wrap',  'name' => 'IKO WRAP',  'sub' => 'WRAP-AROUND FILMS'],
        ['slug' => 'iko-mold',  'name' => 'IKO MOLD',  'sub' => 'IML'],
        ['slug' => 'iko-face',  'name' => 'IKO FACE',  'sub' => 'FACESTOCK FILMS'],
        ['slug' => 'iko-pack',  'name' => 'IKO PACK',  'sub' => 'COEX'],
        ['slug' => 'iko-plain', 'name' => 'IKO PLAIN', 'sub' => 'PLAIN FILMS'],
    ];
    // Satırlar: [tr, en, [wrap, mold, face, pack, plain]]
    $pov_rows = [
        ['tr' => 'Şeffaf',         'en' => 'Transparent',  'cells' => ['CWR',          'CLI, CMI',      'CPS', 'CLA2, CLH, CLHL, CLM',  'CLP1, CLP2, CLR']],
        ['tr' => 'Mat',            'en' => 'Matt',         'cells' => ['',              'CMI',           '',    'CMH, CMR',              'CMP2']],
        ['tr' => 'Dolu Beyaz',     'en' => 'Solid White',  'cells' => ['',              'OPI',           'WPS', 'WLH, WLL',              '']],
        ['tr' => 'Kaviteli Beyaz', 'en' => 'White Voided', 'cells' => ['OWR, OWRL',     'SWI, SSI, SFI', 'OPS', 'OPH, OPL, OPA, OPD',    '']],
        ['tr' => 'Metalize',       'en' => 'Metallized',   'cells' => ['OWR-M, CWR-M',  'CMI-M',         '',    'CLH-M, WLH-M',          '']],
    ];
    ?>

    <!-- Ürün Genel Bakış Matrisi -->
    <section class="pov-section" style="padding: 64px 0 0;">
        <div class="container">
            <div class="section-header">
                <span class="section-label section-label-large" data-tr="Ürün Genel Bakış" data-en="Product Overview">Ürün Genel Bakış</span>
            </div>
            <div class="pov-wrap">
                <table class="pov-table">
                    <thead>
                        <tr>
                            <th class="pov-corner"></th>
                            <?php foreach ($pov_cols as $col): ?>
                                <th class="pov-colhead" style="--pov-col: <?= e($pov_color[$col['slug']] ?? '#999') ?>;">
                                    <span class="pov-bar"></span>
                                    <span class="pov-cat"><?= e($col['name']) ?></span>
                                    <span class="pov-sub"><?= e($col['sub']) ?></span>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pov_rows as $row): ?>
                            <tr>
                                <th class="pov-row" data-tr="<?= e($row['tr']) ?>" data-en="<?= e($row['en']) ?>"><?= e($row['tr']) ?></th>
                                <?php foreach ($row['cells'] as $cell): ?>
                                    <td><?= $cell !== '' ? e($cell) : '—' ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Genel bakış ile ürün satırları arasındaki ayıraç -->
            <hr class="pov-divider">
        </div>
    </section>

    <?php
    // Ürün aileleri: gerçek mockup görselleri + öne çıkan özellikler (src/pages/Products.jsx).
    $prod_order  = ['iko-wrap', 'iko-mold', 'iko-face', 'iko-pack', 'iko-plain'];
    $prod_mockup = [
        'iko-mold'  => 'images/mockups/IML 1.png',
        'iko-wrap'  => 'images/mockups/WAL 1.png',
        'iko-face'  => 'images/mockups/PSL 1.png',
        'iko-pack'  => 'images/mockups/PACK 1.png',
        'iko-plain' => 'images/mockups/PLAIN 1.png',
    ];
    $prod_meta = [
        'iko-mold' => [
            'tag' => ['Temel IML Ürün Ailesi', 'Core IML Product Range'],
            'features' => [
                ['Anti-statik yüzey işlemi', 'Anti-static treatment'],
                ['Kontrollü sertlik', 'Controlled stiffness'],
                ['PP’ye üstün yapışma', 'Superior adhesion to PP'],
                ['Portakal kabuğu etkisinden arındırılmış yüzey', 'Orange-peel-free finish'],
            ],
        ],
        'iko-wrap' => [
            'tag' => ['Sarma ve Metalize Etiket', 'Wrap-Around & Metallized Label'],
            'features' => [
                ['Yüksek hızlı rulodan etiketleme', 'High-speed roll-fed labelling'],
                ['Düşük çekme oranı', 'Low shrinkage'],
                ['Geniş kaynak aralığı', 'Wide seal range'],
                ['Metalize ve sedefli seçenekler', 'Metallised & pearlized options'],
            ],
        ],
        'iko-face' => [
            'tag' => ['Yüzey Film Ürün Ailesi', 'Facestock Product Range'],
            'features' => [
                ['Yüksek şeffaflık ve parlaklık', 'High clarity & gloss'],
                ['Üstün baskı uygunluğu', 'Excellent print receptivity'],
                ['Tutarlı kesim performansı', 'Consistent die-cut performance'],
                ['Premium yüzey film kalitesi', 'Premium facestock finish'],
            ],
        ],
        'iko-pack' => [
            'tag' => ['Taze ve Şeffaf Filmler', 'Fresh & Transparent Films'],
            'features' => [
                ['Çift yüzey işlemi', 'Both-side treatment'],
                ['Geniş kaynak aralığı', 'Wide seal range'],
                ['Üstün optik özellikler', 'Excellent optics'],
                ['Mat ve metalize seçenekler', 'Matte & metallized options'],
            ],
        ],
        'iko-plain' => [
            'tag' => ['Düz Filmler', 'Plain Films'],
            'features' => [
                ['Ultra yüksek şeffaflık', 'Ultra-high transparency'],
                ['Kalıcı kat izi seçenekleri', 'Dead-fold options'],
                ['Baskıya uygun yüzey', 'Printable surface'],
                ['Tek veya çift yüzey işlemi', 'One or double-side treated'],
            ],
        ],
    ];
    if (!function_exists('pk_enc')) {
        function pk_enc(string $path): string
        {
            return implode('/', array_map('rawurlencode', explode('/', $path)));
        }
    }
    ?>

    <!-- Ürün Aileleri (gerçek mockup görselleriyle) -->
    <section class="pk">
        <div class="section" style="padding: clamp(2.5rem, 4.5vw, 3.5rem) 0 clamp(2.25rem, 4.5vw, 3.25rem);">
            <div class="container">
                <div class="product-list">
                    <?php $ri = 0; foreach ($prod_order as $slug):
                        $cat = get_category_by_slug($slug);
                        if (!$cat) { continue; }
                        $meta  = $prod_meta[$slug];
                        $img   = $prod_mockup[$slug] ?? ($cat['image'] ?? '');
                        $desc  = $cat['desc'] ?? ['tr' => '', 'en' => ''];
                        $parts = explode(' ', $cat['name'], 2);
                        $first = $parts[0];
                        $rest  = $parts[1] ?? '';
                        $url   = 'category.php?slug=' . rawurlencode($cat['slug']);
                        $featured = ($ri === 0);
                        $imgRight = ($ri % 2 === 1);
                    ?>
                        <article class="product-row<?= $featured ? ' product-row--featured' : '' ?><?= $imgRight ? ' product-row--band' : '' ?>" id="<?= e($cat['slug']) ?>">
                            <a href="<?= $url ?>" class="product-row__media media<?= $imgRight ? ' order-2' : '' ?>" aria-label="<?= e($cat['name']) ?>">
                                <img src="<?= e(pk_enc($img)) ?>" alt="<?= e($cat['name']) ?>" loading="lazy">
                            </a>
                            <div class="product-row__content">
                                <span class="eyebrow" <?= tt($meta['tag'][0], $meta['tag'][1]) ?>><?= e($meta['tag'][0]) ?></span>
                                <h2><span class="accent-word"><?= e($first) ?></span><?= $rest !== '' ? ' ' . e($rest) : '' ?></h2>
                                <p class="lead" <?= tt($desc['tr'], $desc['en']) ?>><?= e($desc['tr']) ?></p>
                                <ul class="feature-list">
                                    <?php foreach ($meta['features'] as $f): ?>
                                        <li <?= tt($f[0], $f[1]) ?>><?= e($f[0]) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <a href="<?= $url ?>" class="text-link" style="margin-top:1.75rem;">
                                    <span <?= tt('Detayları görüntüle', 'View details') ?>>Detayları görüntüle</span> <span class="arrow">&rarr;</span>
                                </a>
                            </div>
                        </article>
                    <?php $ri++; endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php require __DIR__ . '/partials/footer.php'; ?>
