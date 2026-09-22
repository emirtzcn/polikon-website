<?php
$page_title = "Hakkımızda";
$active = "about";
$meta_description = "Polikon hakkında — BOPP film ve esnek ambalaj alanında yaklaşık 25 yıllık deneyimi yeni nesil üretim teknolojisiyle birleştiren yüksek performanslı film üreticisi. Üretim, Ar-Ge, kalite ve uzmanlık.";
require_once __DIR__ . '/includes/functions.php';

/* Bilingual attribute helper. */
if (!function_exists('tt')) {
    function tt(string $tr, string $en): string
    {
        return 'data-tr="' . e($tr) . '" data-en="' . e($en) . '"';
    }
}

$expertise = [
    ['tr' => ['BOPP Film Uzmanlığı', 'Film yapıları, işleme davranışı ve uygulama performansı konusunda derin bilgi birikimi.'],
     'en' => ['BOPP Film Expertise', 'Deep understanding of film structures, processing behaviour and application performance.']],
    ['tr' => ['Esnek Ambalaj Bilgi Birikimi', 'Ambalaj, konvertör işlemleri ve son kullanım gereksinimleri genelinde deneyim.'],
     'en' => ['Flexible Packaging Know-How', 'Experience across packaging, converting and end-use requirements.']],
    ['tr' => ['Uygulama Odaklı Yaklaşım', 'Baskı, etiketleme, ambalajlama ve konvertör süreçlerinin gerçek gereksinimlerine göre yönlendirilen film geliştirme.'],
     'en' => ['Application-Driven Thinking', 'Film development guided by the real demands of printing, labelling, packaging and converting processes.']],
];

$rd_quality = [
    ['title' => ['Ar-Ge', 'R&D'],
     'items' => [
        ['Film yapısı geliştirme', 'Film structure development'],
        ['Uygulama odaklı ürün geliştirme', 'Application-focused product development'],
        ['Malzeme ve süreç optimizasyonu', 'Material and process optimization'],
        ['Sürekli iyileştirme', 'Continuous improvement'],
     ]],
    ['title' => ['Kalite', 'Quality'],
     'items' => [
        ['Tesis içi kalite kontrol', 'In-house quality control'],
        ['Süreç izleme', 'Process monitoring'],
        ['Ürün tutarlılığı', 'Product consistency'],
        ['Performans doğrulama', 'Performance verification'],
     ]],
];

$why_pillars = [
    ['Teknoloji', 'Ürettiğimiz her üründe yer alan ileri üretim yetenekleri.', 'Technology', 'Advanced manufacturing capabilities embedded into every product we run.'],
    ['Uzmanlık', 'Gerçek uygulama ve dönüştürme zorluklarına uygulanan derin sektör bilgi birikimi.', 'Expertise', 'Deep industry know-how applied to real application and conversion challenges.'],
    ['Ortaklık', 'Her iş birliğinin arkasındaki tutarlılık ve müşteri odaklı düşünce.', 'Partnership', 'Consistency and customer-centric thinking behind every collaboration.'],
];

$brand_story = [
    ['01', 'Deneyim', 'Ekibimizde biriken yaklaşık 25 yıllık BOPP ve esnek ambalaj bilgi birikimi.', 'Experience', 'Nearly 25 years of accumulated BOPP and flexible packaging expertise within our team.'],
    ['02', 'Üretim Altyapısı', 'Kontrollü, tutarlı ve yüksek performanslı film üretimi için modern üretim altyapısı.', 'Manufacturing Infrastructure', 'Modern manufacturing infrastructure designed for controlled, consistent and high-performance film production.'],
    ['03', 'Ar-Ge + Kalite', 'Ürün performansını destekleyen teknik geliştirme, proses kontrolü ve disiplinli kalite yaklaşımı.', 'R&D + Quality', 'Technical development, process control and a disciplined quality approach supporting reliable product performance.'],
];

$gallery = ['factory-1', 'factory-2', 'factory-3', 'factory-4', 'factory-5'];

require __DIR__ . '/partials/header.php';
?>

<div class="pk pk-reveal">
    <!-- Hero -->
    <section class="pk-hero">
        <div class="pk-hero__media">
            <img src="images/factory/bopp-line-overview.jpeg" alt="" loading="eager">
        </div>
        <div class="container pk-hero__content">
            <span class="eyebrow" <?= tt('Polikon Hakkında', 'About Polikon') ?>>Polikon Hakkında</span>
            <h1 <?= tt('Her Katmanın Arkasındaki Deneyim.', 'Experience Behind Every Layer.') ?>>Her Katmanın Arkasındaki Deneyim.</h1>
            <p class="lead" <?= tt('POLIKON, BOPP film ve esnek ambalaj alanında yaklaşık 25 yıllık deneyime sahip bir ekiple yeni nesil BOPP üretimini bir araya getirir. İleri üretim teknolojisi, uygulama uzmanlığı ve disiplinli kalite yönetimini birleştirerek gerçek dünya koşullarında tutarlı performans için tasarlanmış film çözümleri geliştiriyoruz.', 'POLIKON brings together a new generation of BOPP manufacturing with a team carrying nearly 25 years of experience across BOPP films and flexible packaging. Combining advanced production technology, application expertise and disciplined quality management, we develop film solutions designed for consistent real-world performance.') ?>>POLIKON, BOPP film ve esnek ambalaj alanında yaklaşık 25 yıllık deneyime sahip bir ekiple yeni nesil BOPP üretimini bir araya getirir. İleri üretim teknolojisi, uygulama uzmanlığı ve disiplinli kalite yönetimini birleştirerek gerçek dünya koşullarında tutarlı performans için tasarlanmış film çözümleri geliştiriyoruz.</p>
        </div>
    </section>

    <!-- Company introduction -->
    <section class="section">
        <div class="container">
            <div class="about-intro">
                <div>
                    <span class="eyebrow" <?= tt('Kimiz', 'Who We Are') ?>>Kimiz</span>
                    <h2>
                        <span <?= tt('Deneyim Üzerine Kuruldu.', 'Built on Experience.') ?>>Deneyim Üzerine Kuruldu.</span><br>
                        <span <?= tt('Bundan Sonrası İçin Tasarlandı.', 'Engineered for What Comes Next.') ?>>Bundan Sonrası İçin Tasarlandı.</span>
                    </h2>
                    <p class="lead" <?= tt('Yeni nesil bir BOPP film üreticisi olarak kurulan POLIKON, modern üretim altyapısını BOPP ve esnek ambalaj sektörlerinde yaklaşık 25 yıl boyunca şekillenmiş bir ekibin birikmiş bilgi birikimiyle birleştirir.', 'Founded as a new-generation BOPP film manufacturer, POLIKON combines modern manufacturing infrastructure with the accumulated know-how of a team shaped by nearly 25 years in the BOPP and flexible packaging industries.') ?>>Yeni nesil bir BOPP film üreticisi olarak kurulan POLIKON, modern üretim altyapısını BOPP ve esnek ambalaj sektörlerinde yaklaşık 25 yıl boyunca şekillenmiş bir ekibin birikmiş bilgi birikimiyle birleştirir.</p>
                    <p class="lead" style="margin-top:1rem;" <?= tt('Deneyimimiz film üretiminin ötesine uzanır. Uygulama gereksinimlerini, konvertör performansını, baskıyı, etiketlemeyi, esnek ambalajı ve müşterilerimizin gerçek üretim ortamlarında karşılaştığı teknik zorlukları kapsar.', 'Our experience extends beyond film production. It includes application requirements, converting performance, printing, labelling, flexible packaging and the technical challenges our customers face in real production environments.') ?>>Deneyimimiz film üretiminin ötesine uzanır. Uygulama gereksinimlerini, konvertör performansını, baskıyı, etiketlemeyi, esnek ambalajı ve müşterilerimizin gerçek üretim ortamlarında karşılaştığı teknik zorlukları kapsar.</p>
                    <p class="lead" style="margin-top:1rem;" <?= tt('Bu deneyim, POLIKON’un her projeye yalnızca bir üretici olarak değil, performans odaklı bir çözüm ortağı olarak yaklaşmasını sağlar.', 'This experience allows POLIKON to approach every project not only as a manufacturer, but as a performance-driven solution partner.') ?>>Bu deneyim, POLIKON’un her projeye yalnızca bir üretici olarak değil, performans odaklı bir çözüm ortağı olarak yaklaşmasını sağlar.</p>
                </div>
                <div class="media about-intro__media">
                    <img src="images/factory/team photo.jpg" alt="POLIKON üretim tesisi ekibi" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- 25 years of industry expertise -->
    <section class="section section--muted">
        <div class="container">
            <div class="experience-stat">
                <span class="experience-stat__number">25+</span>
                <span class="experience-stat__label" <?= tt('Yıllık Sektör Deneyimi', 'Years of Industry Experience') ?>>Yıllık Sektör Deneyimi</span>
                <p class="lead experience-stat__text" <?= tt('BOPP ve esnek ambalaj alanında onlarca yıllık bilgi birikimiyle desteklenen yeni nesil bir üretim anlayışı.', 'A new generation of manufacturing backed by decades of BOPP and flexible packaging know-how.') ?>>BOPP ve esnek ambalaj alanında onlarca yıllık bilgi birikimiyle desteklenen yeni nesil bir üretim anlayışı.</p>
            </div>
            <div class="grid grid--3 expertise-grid">
                <?php foreach ($expertise as $e): ?>
                    <div class="expertise-card">
                        <h3 <?= tt($e['tr'][0], $e['en'][0]) ?>><?= e($e['tr'][0]) ?></h3>
                        <p <?= tt($e['tr'][1], $e['en'][1]) ?>><?= e($e['tr'][1]) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- R&D + Quality -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <div>
                    <span class="eyebrow" <?= tt('Ar-Ge + Kalite', 'R&D + Quality') ?>>Ar-Ge + Kalite</span>
                    <h2 <?= tt('Geliştirmeden Doğrulamaya.', 'From Development to Validation.') ?>>Geliştirmeden Doğrulamaya.</h2>
                </div>
            </div>
            <p class="lead rd-intro" <?= tt('Ar-Ge ve Kalite Merkezimiz, teknik geliştirmeyi, testi ve süreç kontrolünü her film çözümünün merkezine yerleştirir. Malzeme ve film yapısı geliştirmeden uygulama odaklı değerlendirmeye ve kalite doğrulamaya kadar ekiplerimiz, üretim ve konvertör süreçlerinde güvenilir, tekrarlanabilir performans elde etmek için çalışır.', 'Our R&D and Quality Center places technical development, testing and process control at the heart of every film solution. From material and film-structure development to application-focused evaluation and quality verification, our teams work to achieve reliable, repeatable performance across production and converting processes.') ?>>Ar-Ge ve Kalite Merkezimiz, teknik geliştirmeyi, testi ve süreç kontrolünü her film çözümünün merkezine yerleştirir. Malzeme ve film yapısı geliştirmeden uygulama odaklı değerlendirmeye ve kalite doğrulamaya kadar ekiplerimiz, üretim ve konvertör süreçlerinde güvenilir, tekrarlanabilir performans elde etmek için çalışır.</p>
            <div class="rd-quality">
                <div class="media rd-quality__media">
                    <img src="images/factory/factory-5.jpeg" alt="POLIKON film germe süreci" loading="lazy">
                </div>
                <div class="rd-quality__columns">
                    <?php foreach ($rd_quality as $col): ?>
                        <div class="rd-quality__col">
                            <h3 <?= tt($col['title'][0], $col['title'][1]) ?>><?= e($col['title'][0]) ?></h3>
                            <ul>
                                <?php foreach ($col['items'] as $item): ?>
                                    <li <?= tt($item[0], $item[1]) ?>><?= e($item[0]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Manufacturing technology band -->
    <section class="pk-tech-band">
        <div class="pk-tech-band__media">
            <img src="images/factory/factory-8.jpeg" alt="POLIKON BOPP üretim hattı" loading="lazy">
        </div>
        <div class="pk-tech-band__overlay"></div>
        <div class="container pk-tech-band__content">
            <span class="eyebrow" <?= tt('Üretim', 'Manufacturing') ?>>Üretim</span>
            <h2 <?= tt('Tutarlılık İçin Tasarlanmış Teknoloji.', 'Technology Built for Consistency.') ?>>Tutarlılık İçin Tasarlanmış Teknoloji.</h2>
            <p class="lead" <?= tt('Brückner germe teknolojisi de dahil olmak üzere modern BOPP üretim altyapısı, disiplinli üretimi ve tekrarlanabilir süreç kontrolünü destekler. Bu altyapı, tutarlı performansta şeffaf, beyaz ve sedefli BOPP filmler üretir.', 'Modern BOPP production infrastructure, including Brückner stretching technology, supports disciplined manufacturing and repeatable process control. This infrastructure produces transparent, white and pearlized BOPP films with consistent performance.') ?>>Brückner germe teknolojisi de dahil olmak üzere modern BOPP üretim altyapısı, disiplinli üretimi ve tekrarlanabilir süreç kontrolünü destekler. Bu altyapı, tutarlı performansta şeffaf, beyaz ve sedefli BOPP filmler üretir.</p>
        </div>
    </section>

    <!-- Why choose us -->
    <section class="section">
        <div class="container">
            <div class="why-us">
                <div class="why-us__intro">
                    <span class="eyebrow" <?= tt('Neden Polikon', 'Why Polikon') ?>>Neden Polikon</span>
                    <h2 <?= tt('Neden Bizi Seçmelisiniz', 'Why Choose Us') ?>>Neden Bizi Seçmelisiniz</h2>
                    <p class="lead" <?= tt('Geleneksel BOPP film üretiminin ötesinde, performans odaklı bir çözüm ortağı olarak faaliyet gösteriyoruz.', 'Beyond conventional BOPP film manufacturing, we operate as a performance-driven solution partner.') ?>>Geleneksel BOPP film üretiminin ötesinde, performans odaklı bir çözüm ortağı olarak faaliyet gösteriyoruz.</p>
                    <p class="lead" style="margin-top:1rem;" <?= tt('İleri teknolojik yetenekler, derin sektör uzmanlığı ve yüksek kalite standartları her üründe tutarlı biçimde yer alır.', 'Advanced technological capabilities, deep industry expertise, and high quality standards are consistently embedded into every product.') ?>>İleri teknolojik yetenekler, derin sektör uzmanlığı ve yüksek kalite standartları her üründe tutarlı biçimde yer alır.</p>
                    <p class="lead" style="margin-top:1rem;" <?= tt('Üretimin ötesine geçerek, iş ortaklarımızın kalıcı rekabet konumunu güçlendirirken performansı ve güvenilirliği artıran çözümler geliştiriyoruz.', 'By moving beyond production, we develop solutions that enhance performance and reliability while strengthening the lasting competitive position of our business partners.') ?>>Üretimin ötesine geçerek, iş ortaklarımızın kalıcı rekabet konumunu güçlendirirken performansı ve güvenilirliği artıran çözümler geliştiriyoruz.</p>
                    <p class="lead" style="margin-top:1rem;" <?= tt('Yenilikçilik, tutarlılık ve müşteri odaklı düşünceye net bir odaklanmayla, ortaklarımızla birlikte küresel pazarda sürdürülebilir liderlik inşa ediyoruz.', 'With a clear focus on innovation, consistency, and customer-centric thinking, we build sustainable leadership in the global market together with our partners.') ?>>Yenilikçilik, tutarlılık ve müşteri odaklı düşünceye net bir odaklanmayla, ortaklarımızla birlikte küresel pazarda sürdürülebilir liderlik inşa ediyoruz.</p>
                </div>
                <div class="why-us__pillars">
                    <?php foreach ($why_pillars as $i => $p): ?>
                        <div class="why-us__pillar">
                            <span class="why-us__pillar-index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                            <h3 <?= tt($p[0], $p[2]) ?>><?= e($p[0]) ?></h3>
                            <p <?= tt($p[1], $p[3]) ?>><?= e($p[1]) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Core capabilities -->
    <section class="section section--muted">
        <div class="container">
            <div class="section-header">
                <div>
                    <span class="eyebrow" <?= tt('Temel Yetkinliklerimiz', 'Core Capabilities') ?>>Temel Yetkinliklerimiz</span>
                    <h2 <?= tt('Performansın Arkasındaki Güç.', 'The Strength Behind Performance.') ?>>Performansın Arkasındaki Güç.</h2>
                </div>
            </div>
            <div class="brand-story">
                <?php foreach ($brand_story as $s): ?>
                    <div class="brand-story__step">
                        <span class="brand-story__n"><?= e($s[0]) ?></span>
                        <h3 <?= tt($s[1], $s[3]) ?>><?= e($s[1]) ?></h3>
                        <p <?= tt($s[2], $s[4]) ?>><?= e($s[2]) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Facility gallery -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <div>
                    <span class="eyebrow" <?= tt('Tesis', 'Facility') ?>>Tesis</span>
                    <h2 <?= tt('Üretime daha yakından bakış.', 'A closer look at production.') ?>>Üretime daha yakından bakış.</h2>
                </div>
            </div>
            <div class="gallery-grid">
                <?php foreach ($gallery as $i => $g): ?>
                    <div class="media gallery-grid__item">
                        <img src="images/factory/<?= e($g) ?>.jpeg" alt="POLIKON üretim tesisi <?= (int)($i + 1) ?>" loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Partnership / closing (Kaynaklar bölümünün yerine) -->
    <section class="section pk-partnership">
        <div class="container pk-partnership__inner">
          <div class="pk-partnership__text">
            <span class="eyebrow" <?= tt('Film Tedarikinin Ötesinde', 'Beyond Film Supply') ?>>Film Tedarikinin Ötesinde</span>
            <h2 <?= tt('Uzun Vadeli B2B Değeri İçin Tasarlandı.', 'Built for Long-Term B2B Value.') ?>>Uzun Vadeli B2B Değeri İçin Tasarlandı.</h2>
            <p class="lead" <?= tt('Film tedarikinin ötesinde performans, güven ve kalıcı değer sunuyoruz.', 'Beyond film supply, we deliver performance, trust, and lasting value.') ?>>Film tedarikinin ötesinde performans, güven ve kalıcı değer sunuyoruz.</p>
            <p class="lead" style="margin-top:1rem;" <?= tt('İleri üretim teknolojilerini derin uygulama uzmanlığıyla birleştirerek verimliliği artıran, ürün performansını geliştiren ve rekabet avantajını güçlendiren özel BOPP film çözümleri geliştiriyoruz.', 'By combining advanced manufacturing technologies with deep application expertise, we develop tailored BOPP film solutions that improve efficiency, enhance product performance, and strengthen competitive advantage.') ?>>İleri üretim teknolojilerini derin uygulama uzmanlığıyla birleştirerek verimliliği artıran, ürün performansını geliştiren ve rekabet avantajını güçlendiren özel BOPP film çözümleri geliştiriyoruz.</p>
            <p class="lead" style="margin-top:1rem;" <?= tt('Konseptten nihai ürüne, ilişkiyi bir tedarikçi etkileşimi değil, stratejik bir iş ortaklığı olarak şekillendiriyoruz.', 'From concept to final product, we shape the relationship not as a supplier engagement, but as a strategic business partnership.') ?>>Konseptten nihai ürüne, ilişkiyi bir tedarikçi etkileşimi değil, stratejik bir iş ortaklığı olarak şekillendiriyoruz.</p>
          </div>
          <div class="pk-partnership__actions">
              <a href="products.php" class="btn btn--primary">
                  <span <?= tt('Ürünlerimizi Keşfedin', 'Explore Our Products') ?>>Ürünlerimizi Keşfedin</span> <span class="arrow">&rarr;</span>
              </a>
              <a href="contact.php" class="btn btn--ghost">
                  <span <?= tt('Ekibimizle İletişime Geçin', 'Contact Our Team') ?>>Ekibimizle İletişime Geçin</span>
              </a>
          </div>
        </div>
    </section>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
