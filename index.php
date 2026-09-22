<?php
$page_title = "Ana Sayfa";
$active = "home";
$meta_description = "Polikon — premium BOPP ambalaj ve etiket filmleri üreticisi. Etiket, ambalaj ve laminasyon için yüksek performanslı, sürdürülebilir film çözümleri. İzmir Kemalpaşa'da üretim.";
require __DIR__ . '/partials/header.php';
?>

    <!-- Hero Carousel -->
    <section class="hero-carousel">
        <div class="carousel-container">
            <!-- 1. slayt: polikon-website Home.jsx hero portu (ekip fotoğrafı + slogan) -->
            <div class="carousel-slide slide--home-src active">
                <div class="slide-overlay slide-overlay--home-src"></div>
                <div class="slide-bg" style="background-image: url('images/factory/factory-2.jpeg'); background-position: center;"></div>
                <div class="container">
                    <div class="hero-content hero-content--home-src">
                        <div class="hs-heading-row">
                            <div>
                                <span class="hs-eyebrow" data-tr="BOPP Film Üreticisi" data-en="BOPP Film Manufacturer">BOPP Film Üreticisi</span>
                                <h1 class="hs-title" data-tr="Etiket ve ambalaj için performans odaklı hassas filmler." data-en="Precision films for labels &amp; packaging that perform.">Etiket ve ambalaj için performans odaklı hassas filmler.</h1>
                            </div>
                            <div class="hs-sig-wrap">
                            <span class="hs-dash" aria-hidden="true"></span>
                            <svg class="hs-signature" viewBox="0 0 1120 266" role="img" aria-label="Expertise in Every Layer">
                                <defs>
                                    <linearGradient id="heroSigFade" x1="0" y1="0" x2="1" y2="0">
                                        <stop offset="0%" stop-color="#fff"></stop>
                                        <stop offset="96%" stop-color="#fff"></stop>
                                        <stop offset="100%" stop-color="#000"></stop>
                                    </linearGradient>
                                    <mask id="heroSigMask"><rect x="0" y="0" width="1120" height="266" fill="url(#heroSigFade)"></rect></mask>
                                </defs>
                                <text x="10" y="166" font-family="'Homemade Apple', cursive" font-size="78" fill="#f0731a" mask="url(#heroSigMask)">Expertise in Every Layer</text>
                                <g mask="url(#heroSigMask)" stroke="#f0731a" stroke-linecap="round" fill="none" opacity="0.7">
                                    <path d="M1058 169 q 14 4 24 -2" stroke-width="2.2"></path>
                                    <path d="M1060 174 q 12 8 20 6" stroke-width="1.4" opacity="0.8"></path>
                                    <path d="M1055 163 q 16 -3 22 -9" stroke-width="1.1" opacity="0.6"></path>
                                </g>
                            </svg>
                            </div>
                        </div>
                        <p class="hs-lead" data-tr="POLIKON; sarma etiketler, in-mold etiketleme ve esnek ambalaj için yüksek şeffaflıkta, tutarlı kalitede BOPP filmler üretir. Filmlerimiz modern hatlarda üretilir, kendi tesisimizde test edilir ve birçok sektörde güvenle kullanılır." data-en="POLIKON produces high-clarity, high-consistency BOPP films for wrap-around labels, in-mould labelling and flexible packaging. Our films are engineered on modern lines, tested in-house and trusted across industries.">POLIKON; sarma etiketler, in-mold etiketleme ve esnek ambalaj için yüksek şeffaflıkta, tutarlı kalitede BOPP filmler üretir. Filmlerimiz modern hatlarda üretilir, kendi tesisimizde test edilir ve birçok sektörde güvenle kullanılır.</p>
                    </div>
                </div>
            </div>

            <!-- 2. slayt: 1. slaytla aynı stil (eyebrow + büyük başlık + açıklama), kendi metni ve butonları -->
            <div class="carousel-slide slide--home-src">
                <div class="slide-overlay slide-overlay--home-src"></div>
                <div class="slide-bg" style="background-image: url('images/hero_carousel1.jpeg');"></div>
                <div class="container">
                    <div class="hero-content hero-content--home-src">
                        <div class="hs-heading-row">
                            <div>
                                <span class="hs-eyebrow" data-tr="Yenilikçi Çözümler" data-en="Innovative Solutions">Yenilikçi Çözümler</span>
                                <h1 class="hs-title hs-title--wide" data-tr="Driven by Innovation, Proven by Performance" data-en="Driven by Innovation, Proven by Performance">Driven by Innovation, Proven by Performance</h1>
                            </div>
                        </div>
                        <p class="hs-lead" data-tr="Premium BOPP film çözümleri ile sektörde fark yaratan teknoloji. Modern hatlarda üretilen ve kendi tesisimizde test edilen filmlerimiz; tutarlı şeffaflık, dayanım ve baskı kalitesi sunar. Etiketten esnek ambalaja kadar markaların her rafta öne çıkmasına yardımcı oluyoruz." data-en="Industry-leading technology with premium BOPP film solutions. Produced on modern lines and tested in-house, our films deliver consistent clarity, strength and printability. From labels to flexible packaging, we help brands stand out on every shelf.">Premium BOPP film çözümleri ile sektörde fark yaratan teknoloji. Modern hatlarda üretilen ve kendi tesisimizde test edilen filmlerimiz; tutarlı şeffaflık, dayanım ve baskı kalitesi sunar. Etiketten esnek ambalaja kadar markaların her rafta öne çıkmasına yardımcı oluyoruz.</p>
                        <div class="hero-buttons hs-buttons">
                            <a href="products.php" class="btn btn-orange" data-tr="Ürünlerimizi Keşfedin" data-en="Explore Our Products">Ürünlerimizi Keşfedin</a>
                            <a href="contact.php" class="btn btn-orange" data-tr="İletişime Geçin" data-en="Contact Us">İletişime Geçin</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sabit ürün mockup'ı: tüm slaytların üzerinde görünür -->
        <img class="hero-mockup" src="images/mockups/GENEL.png" alt="" aria-hidden="true" loading="lazy">

        <div class="carousel-controls">
            <button class="carousel-btn prev" aria-label="Previous">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <div class="carousel-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
            </div>
            <button class="carousel-btn next" aria-label="Next">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>
    </section>

    <?php
    // Home ürün ailesi navigasyonu + uygulama/haber teaserları (src/pages/Home.jsx).
    $home_family_order = ['iko-mold', 'iko-wrap', 'iko-face', 'iko-pack', 'iko-plain'];
    $home_mockup = [
        'iko-mold'  => 'images/mockups/IML 1.png',
        'iko-wrap'  => 'images/mockups/WAL 1.png',
        'iko-face'  => 'images/mockups/PSL 1.png',
        'iko-pack'  => 'images/mockups/PACK 1.png',
        'iko-plain' => 'images/mockups/PLAIN 1.png',
    ];
    $home_apps = [
        ['slug' => 'beverage-wrap', 'image' => 'images/mockups/WAL 2.png',
         'name' => ['İçecek ve Sarma Etiketler', 'Beverage & Wrap-Around Labels'],
         'text' => ['Yüksek hızlı sarma etiketleme, üstün baskı sunumu ve tutarlı dönüştürme performansı için tasarlanmış yüksek performanslı BOPP filmler.', 'High-performance BOPP films engineered for high-speed wrap-around labeling, excellent print presentation and consistent converting performance.']],
        ['slug' => 'pressure-sensitive', 'image' => 'images/mockups/PSL 2.png',
         'name' => ['Baskı Hassasiyetli Etiketler', 'Pressure-Sensitive Labels'],
         'text' => ['Baskı hassasiyetli etiketleme için tasarlanan yüzey filmleri; üstün yüzey kalitesi, baskı uygunluğu ve yüksek hızda güvenilir dağıtım sağlar.', 'Facestock films built for pressure-sensitive labeling, delivering excellent surface quality, printability and reliable dispensing at speed.']],
        ['slug' => 'in-mold-food', 'image' => 'images/mockups/IML 3.png',
         'name' => ['In-Mold Gıda Ambalajı', 'In-Mold Food Packaging'],
         'text' => ['Kaplar ve kapaklar için kavitasyonlu ve solid beyaz IML filmler; sertlik, baskı kalitesi ve etiketsiz görünümü bir arada sunar.', 'Cavitated and solid white IML films for tubs and lids, combining stiffness, print quality and a seamless no-label look.']],
    ];
    $home_news = function_exists('get_news') ? get_news() : [];
    ?>

    <div class="pk">
        <!-- Product navigation -->
        <section class="product-nav" style="background-image: url('<?= e(pk_enc('images/backgrounds/bobinler.png')) ?>');">
            <div class="container product-nav__inner">
                <div class="product-nav__heading">
                    <span class="eyebrow" <?= tt('Ürün Ailemiz', 'Our Range') ?>>Ürün Ailemiz</span>
                    <h2 class="product-nav__title" <?= tt('Ürün Portföyü', 'Product Portfolio') ?>>Ürün Portföyü</h2>
                </div>
                <div class="product-nav__grid">
                    <?php foreach ($home_family_order as $slug):
                        $cat = get_category_by_slug($slug);
                        if (!$cat) { continue; }
                        $img   = $home_mockup[$slug];
                        $parts = explode(' ', $cat['name'], 2);
                        $first = $parts[0];
                        $rest  = $parts[1] ?? '';
                        $url   = 'category.php?slug=' . rawurlencode($cat['slug']);
                    ?>
                        <div class="product-nav__item">
                            <a href="<?= $url ?>" class="product-nav__link">
                                <img src="<?= e(pk_enc($img)) ?>" alt="<?= e($cat['name']) ?>" loading="lazy">
                                <div class="product-nav__overlay"></div>
                                <span class="product-nav__name"><span class="accent-word"><?= e($first) ?></span><?= $rest !== '' ? ' ' . e($rest) : '' ?></span>
                            </a>
                            <a href="<?= $url ?>" class="product-nav__caption">
                                <span class="product-nav__caption-name"><span class="accent-word"><?= e($first) ?></span><?= $rest !== '' ? ' ' . e($rest) : '' ?></span>
                                <span class="product-nav__caption-link"><span <?= tt('Ürünü İncele', 'View Product') ?>>Ürünü İncele</span> <span class="arrow">&rarr;</span></span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Split feature -->
        <section class="split-feature">
            <div class="split-feature__media">
                <img src="images/factory/bopp-line-overview.jpeg" alt="POLIKON BOPP germe hattının içi" loading="lazy">
            </div>
            <div class="split-feature__content container">
                <span class="eyebrow eyebrow--slogan" <?= tt('Her Katmanda Uzmanlık', 'Expertise in Every Layer') ?>>Her Katmanda Uzmanlık</span>
                <h2 <?= tt('Yüksek standartlarla çalışan modern bir üretim hattı.', 'A modern line, run to a demanding standard.') ?>>Yüksek standartlarla çalışan modern bir üretim hattı.</h2>
                <p class="lead" <?= tt('Brückner marka germe hattımız ve koekstrüzyon teknolojimiz; her ruloda sıkı kalınlık kontrolü, tutarlı optik özellikler ve tekrarlanabilir mekanik performans sağlar.', 'Our Brückner-built stretching line and coextrusion technology give us tight thickness control, consistent optics and repeatable mechanical properties, roll after roll.') ?>>Brückner marka germe hattımız ve koekstrüzyon teknolojimiz; her ruloda sıkı kalınlık kontrolü, tutarlı optik özellikler ve tekrarlanabilir mekanik performans sağlar.</p>
                <ul class="check-list">
                    <li <?= tt('Hat üzerinde kalınlık ve gramaj takibi', 'In-line thickness & gauge monitoring') ?>>Hat üzerinde kalınlık ve gramaj takibi</li>
                    <li <?= tt('Kontrollü korona / alev yüzey işlemi', 'Controlled corona / flame surface treatment') ?>>Kontrollü korona / alev yüzey işlemi</li>
                    <li <?= tt('Kapsamlı optik ve mekanik kalite kontrol laboratuvarı', 'Full optical & mechanical QC laboratory') ?>>Kapsamlı optik ve mekanik kalite kontrol laboratuvarı</li>
                    <li <?= tt('7/24 kesintisiz üretim kapasitesi', 'Continuous 24/7 production capability') ?>>7/24 kesintisiz üretim kapasitesi</li>
                </ul>
                <a href="about.php" class="text-link">
                    <span <?= tt('Tesisimiz hakkında daha fazla bilgi', 'More about our facility') ?>>Tesisimiz hakkında daha fazla bilgi</span> <span class="arrow">&rarr;</span>
                </a>
            </div>
        </section>

        <!-- Applications teasers -->
        <section class="section section--muted">
            <div class="container">
                <div class="section-header">
                    <div>
                        <span class="eyebrow" <?= tt('Kullanım Alanları', "Where It's Used") ?>>Kullanım Alanları</span>
                        <h2 <?= tt('Tek film platformu, birçok sektör.', 'One film platform, many industries.') ?>>Tek film platformu, birçok sektör.</h2>
                        <p class="lead" <?= tt('POLIKON filmleri; içecek, süt ürünleri, atıştırmalık, kişisel bakım ve daha birçok alanda ürünleri korur ve sergiler.', 'POLIKON films protect and present products across beverage, dairy, snacks, home care and more.') ?>>POLIKON filmleri; içecek, süt ürünleri, atıştırmalık, kişisel bakım ve daha birçok alanda ürünleri korur ve sergiler.</p>
                    </div>
                    <div class="section-header__aside">
                        <a href="applications.php" class="text-link">
                            <span <?= tt('Tüm uygulamaları görün', 'See all applications') ?>>Tüm uygulamaları görün</span> <span class="arrow">&rarr;</span>
                        </a>
                    </div>
                </div>
                <div class="grid grid--3 app-teasers">
                    <?php foreach ($home_apps as $a): ?>
                        <a href="applications.php#<?= e($a['slug']) ?>" class="app-teaser">
                            <div class="media app-teaser__media">
                                <img src="<?= e(pk_enc($a['image'])) ?>" alt="<?= e($a['name'][0]) ?>" loading="lazy">
                            </div>
                            <h3 <?= tt($a['name'][0], $a['name'][1]) ?>><?= e($a['name'][0]) ?></h3>
                            <p <?= tt($a['text'][0], $a['text'][1]) ?>><?= e($a['text'][0]) ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- News updates (arka plan: images/wave-pattern.svg) -->
        <section class="section news-wave">
            <div class="container">
                <div class="section-header">
                    <div>
                        <span class="eyebrow" <?= tt('Güncel', 'Latest') ?>>Güncel</span>
                        <h2 <?= tt('Haberler ve Gelişmeler', 'News & Updates') ?>>Haberler ve Gelişmeler</h2>
                    </div>
                    <div class="section-header__aside">
                        <a href="news.php" class="text-link">
                            <span <?= tt('Tüm haberler', 'All news') ?>>Tüm haberler</span> <span class="arrow">&rarr;</span>
                        </a>
                    </div>
                </div>
                <div class="grid grid--3 news-teasers">
                    <?php foreach ($home_news as $n): ?>
                        <a href="news-detail.php?slug=<?= rawurlencode($n['slug']) ?>" class="news-teaser">
                            <div class="media news-teaser__media">
                                <img src="<?= e(pk_enc($n['image'])) ?>" alt="<?= e($n['title']['tr']) ?>" loading="lazy">
                            </div>
                            <div class="news-teaser__body">
                                <span class="news-teaser__meta" <?= tt($n['date']['tr'], $n['date']['en']) ?>><?= e($n['date']['tr']) ?></span>
                                <h3 <?= tt($n['title']['tr'], $n['title']['en']) ?>><?= e($n['title']['tr']) ?></h3>
                                <span class="text-link"><span <?= tt('Devamını oku', 'Read more') ?>>Devamını oku</span> <span class="arrow">&rarr;</span></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- CTA band -->
        <section class="cta-band">
            <div class="container cta-band__inner">
                <div>
                    <h2 <?= tt('Bir sonraki ruloyu birlikte konuşalım.', "Let's talk about your next roll.") ?>>Bir sonraki ruloyu birlikte konuşalım.</h2>
                    <p class="lead" <?= tt('Uygulamanızı ve spesifikasyonunuzu bize iletin, ekibimiz doğru film ve teslim süresiyle geri dönsün.', 'Tell us your application and specification, and our team will respond with the right film and lead time.') ?>>Uygulamanızı ve spesifikasyonunuzu bize iletin, ekibimiz doğru film ve teslim süresiyle geri dönsün.</p>
                </div>
                <a href="contact.php" class="btn btn--light">
                    <span <?= tt('Ekibimizle İletişime Geçin', 'Contact Our Team') ?>>Ekibimizle İletişime Geçin</span> <span class="arrow">&rarr;</span>
                </a>
            </div>
        </section>
    </div>

<?php require __DIR__ . '/partials/footer.php'; ?>
