<?php
$page_title = 'Uygulamalar';
$active = 'applications';
$meta_description = 'Polikon BOPP film uygulamaları — içecek ve sarma etiketler, basınca duyarlı etiketler, in-mold gıda ambalajı, esnek ambalaj, laminasyon ve daha fazlası için tasarlanmış yüksek performanslı filmler.';
require_once __DIR__ . '/includes/functions.php';

/* Yol segmentlerini koruyarak URL kodlama (boşluklar dahil). */
if (!function_exists('pk_enc')) {
    function pk_enc(string $path): string
    {
        return implode('/', array_map('rawurlencode', explode('/', $path)));
    }
}

/* Uygulamalar (src/data/content.js APPLICATIONS ile eşleşir). */
$applications = [
    [
        'slug'  => 'beverage-wrap',
        'family' => 'iko-wrap',
        'image' => 'images/mockups/WAL 2.png',
        'name'  => ['tr' => 'İçecek ve Sarma Etiketler', 'en' => 'Beverage & Wrap-Around Labels'],
        'text'  => [
            'tr' => 'Yüksek hızlı sarma etiketleme, üstün baskı sunumu ve tutarlı dönüştürme performansı için tasarlanmış yüksek performanslı BOPP filmler.',
            'en' => 'High-performance BOPP films engineered for high-speed wrap-around labeling, excellent print presentation and consistent converting performance.',
        ],
    ],
    [
        'slug'  => 'pressure-sensitive',
        'family' => 'iko-face',
        'image' => 'images/mockups/PSL 2.png',
        'name'  => ['tr' => 'Baskı Hassasiyetli Etiketler', 'en' => 'Pressure-Sensitive Labels'],
        'text'  => [
            'tr' => 'Baskı hassasiyetli etiketleme için tasarlanan yüzey filmleri; üstün yüzey kalitesi, baskı uygunluğu ve yüksek hızda güvenilir dağıtım sağlar.',
            'en' => 'Facestock films built for pressure-sensitive labeling, delivering excellent surface quality, printability and reliable dispensing at speed.',
        ],
    ],
    [
        'slug'  => 'in-mold-food',
        'family' => 'iko-mold',
        'image' => 'images/mockups/IML 3.png',
        'name'  => ['tr' => 'In-Mold Gıda Ambalajı', 'en' => 'In-Mold Food Packaging'],
        'text'  => [
            'tr' => 'Kaplar ve kapaklar için kavitasyonlu ve solid beyaz IML filmler; sertlik, baskı kalitesi ve etiketsiz görünümü bir arada sunar.',
            'en' => 'Cavitated and solid white IML films for tubs and lids, combining stiffness, print quality and a seamless no-label look.',
        ],
    ],
    [
        'slug'  => 'buckets-pails',
        'family' => 'iko-mold',
        'image' => 'images/mockups/IML 2.png',
        'name'  => ['tr' => 'Plastik Kova ve Kovalar', 'en' => 'Plastic Buckets & Pails'],
        'text'  => [
            'tr' => 'Sert kovalar için solid beyaz ve saten yüzeyli IML filmler; güçlü sertlik ve güvenilir kalıp içi yapışma sağlar.',
            'en' => 'Solid white and satin-finish IML films built for rigid pails and buckets, with strong stiffness and reliable in-mould adhesion.',
        ],
    ],
    [
        'slug'  => 'flexible-packaging',
        'family' => 'iko-pack',
        'image' => 'images/mockups/PACK 2.png',
        'name'  => ['tr' => 'Esnek Gıda Ambalajı', 'en' => 'Flexible Food Packaging'],
        'text'  => [
            'tr' => 'Atıştırmalık, şekerleme ve kahve için ısıyla kaynaklanabilir, koekstrüde ambalaj filmleri; optik özellik, baskı uygunluğu ve işlenebilirliği dengeler.',
            'en' => 'Heat-sealable and coextruded packaging films for snacks, confectionery and coffee, balancing optics, printability and machinability.',
        ],
    ],
    [
        'slug'  => 'overwrap-floral',
        'family' => 'iko-plain',
        'image' => 'images/mockups/PLAIN 3.png',
        'name'  => ['tr' => 'Sarma ve Çiçek Ambalajı', 'en' => 'Overwrap & Floral'],
        'text'  => [
            'tr' => 'Sarma ve çiçek poşetleri için berrak düz filmler; ürünü korurken aynı zamanda öne çıkarır.',
            'en' => 'Crystal-clear plain films for overwrap and floral sleeves, showcasing the product while keeping it protected.',
        ],
    ],
    [
        'slug'  => 'converting-lamination',
        'family' => 'iko-plain',
        'image' => 'images/mockups/PLAIN 1.png',
        'name'  => ['tr' => 'Genel Dönüştürme ve Laminasyon', 'en' => 'General Converting & Lamination'],
        'text'  => [
            'tr' => 'Dönüştürme, baskı ve laminasyon için çok yönlü temel filmler; tutarlı kalınlık ve güvenilir işlem performansı sunar.',
            'en' => 'Versatile base films for converting, printing and lamination, offering consistent thickness and dependable processing performance.',
        ],
    ],
];

/* Uygulamanın önerilen ürün ailesine (kategori sayfasına) giden bağlantıyı render eder. */
function render_app_family(array $app): void
{
    $cat = get_category_by_slug($app['family'] ?? '');
    if (!$cat) { return; }
    echo '<div class="app-codes">';
    echo '<a class="app-codes__link" href="category.php?slug=' . rawurlencode($cat['slug']) . '" title="' . e($cat['name']) . '">';
    echo '<span class="app-codes__label" data-tr="Önerilen Filmler" data-en="Recommended Films">Önerilen Filmler</span> <span class="arrow">&rarr;</span>';
    echo '</a></div>';
}

require __DIR__ . '/partials/header.php';
?>

<div class="pk">
    <!-- Hero (polikon-website Applications.jsx .app-hero portu) -->
    <section class="app-hero" style="background-image: url('<?= e(pk_enc('images/backgrounds/app 2.png')) ?>');">
        <div class="container app-hero__content">
            <span class="eyebrow" data-tr="Uygulamalar" data-en="Applications">Uygulamalar</span>
            <h1 data-tr="Gerçek Dünya Uygulamaları İçin Tasarlandı." data-en="Engineered for Real-World Applications.">Gerçek Dünya Uygulamaları İçin Tasarlandı.</h1>
            <p class="lead" data-tr="Etiketlerden ambalajlara, esnek paketlemeden konteynerlere kadar POLIKON BOPP filmleri her uygulamanın performans gereksinimlerine göre tasarlanır." data-en="From labels and containers to flexible packaging, POLIKON BOPP films are engineered around the performance demands of each application.">Etiketlerden ambalajlara, esnek paketlemeden konteynerlere kadar POLIKON BOPP filmleri her uygulamanın performans gereksinimlerine göre tasarlanır.</p>
        </div>
    </section>

    <!-- Explorer -->
    <section class="section news-wave" id="app-explorer">
        <div class="container">
            <div class="section-header">
                <div>
                    <span class="eyebrow" data-tr="Uygulamaya Göre" data-en="By Application">Uygulamaya Göre</span>
                    <h2 data-tr="Uygulamaya Göre Keşfedin" data-en="Explore by Application">Uygulamaya Göre Keşfedin</h2>
                </div>
            </div>

            <!-- Desktop: category rail + panel -->
            <div class="app-explorer">
                <div class="app-explorer__rail">
                    <?php foreach ($applications as $i => $app): ?>
                        <button type="button" class="app-explorer__tab<?= $i === 0 ? ' is-active' : '' ?>" data-app="<?= e($app['slug']) ?>" data-tr="<?= e($app['name']['tr']) ?>" data-en="<?= e($app['name']['en']) ?>"><?= e($app['name']['tr']) ?></button>
                    <?php endforeach; ?>
                </div>
                <div class="app-explorer__panels">
                    <?php foreach ($applications as $i => $app): ?>
                        <div class="app-explorer__panel<?= $i === 0 ? ' is-active' : '' ?>" data-app="<?= e($app['slug']) ?>">
                            <div class="app-explorer__media">
                                <img src="<?= e(pk_enc($app['image'])) ?>" alt="<?= e($app['name']['tr']) ?>" loading="lazy">
                            </div>
                            <div class="app-explorer__content">
                                <h3 data-tr="<?= e($app['name']['tr']) ?>" data-en="<?= e($app['name']['en']) ?>"><?= e($app['name']['tr']) ?></h3>
                                <p class="lead" data-tr="<?= e($app['text']['tr']) ?>" data-en="<?= e($app['text']['en']) ?>"><?= e($app['text']['tr']) ?></p>
                                <?php render_app_family($app); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Mobile: accordion -->
            <div class="app-accordion">
                <?php foreach ($applications as $i => $app): ?>
                    <details class="app-accordion__item" id="<?= e($app['slug']) ?>"<?= $i === 0 ? ' open' : '' ?>>
                        <summary data-tr="<?= e($app['name']['tr']) ?>" data-en="<?= e($app['name']['en']) ?>"><?= e($app['name']['tr']) ?></summary>
                        <div class="app-accordion__body">
                            <div class="app-accordion__media">
                                <img src="<?= e(pk_enc($app['image'])) ?>" alt="<?= e($app['name']['tr']) ?>" loading="lazy">
                            </div>
                            <p class="lead" data-tr="<?= e($app['text']['tr']) ?>" data-en="<?= e($app['text']['en']) ?>"><?= e($app['text']['tr']) ?></p>
                            <?php render_app_family($app); ?>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section section--dark">
        <div class="container pk-app-cta__inner">
            <h2 data-tr="Uygulamanız için hangi filmin uygun olduğundan emin değil misiniz?" data-en="Not sure which film fits your application?">Uygulamanız için hangi filmin uygun olduğundan emin değil misiniz?</h2>
            <p class="lead" data-tr="Ekibimiz, üretim gereksinimleriniz için en doğru POLIKON çözümünü belirlemenize yardımcı olabilir." data-en="Our team can help identify the right POLIKON solution for your converting requirements.">Ekibimiz, üretim gereksinimleriniz için en doğru POLIKON çözümünü belirlemenize yardımcı olabilir.</p>
            <a href="contact.php" class="btn btn--primary">
                <span data-tr="Ekibimizle Görüşün" data-en="Talk to Our Team">Ekibimizle Görüşün</span> <span class="arrow">&rarr;</span>
            </a>
        </div>
    </section>
</div>

<script>
(function () {
    var tabs = document.querySelectorAll('.app-explorer__tab');
    var panels = document.querySelectorAll('.app-explorer__panel');
    function activate(slug) {
        var found = false;
        tabs.forEach(function (t) {
            var on = t.getAttribute('data-app') === slug;
            t.classList.toggle('is-active', on);
            found = found || on;
        });
        panels.forEach(function (p) {
            p.classList.toggle('is-active', p.getAttribute('data-app') === slug);
        });
        return found;
    }
    tabs.forEach(function (t) {
        t.addEventListener('click', function () { activate(t.getAttribute('data-app')); });
    });
    function fromHash() {
        var slug = (location.hash || '').replace('#', '');
        if (!slug) return;
        var ok = activate(slug);
        var acc = document.getElementById(slug);
        if (acc && acc.tagName === 'DETAILS') { acc.open = true; }
        if (ok || acc) {
            var ex = document.getElementById('app-explorer');
            if (ex) ex.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
    window.addEventListener('hashchange', fromHash);
    fromHash();
})();
</script>

<?php require __DIR__ . '/partials/footer.php'; ?>
