<?php
/**
 * Polikon — Haber verisi (statik).
 * Haber eklemek/çıkarmak için bu diziyi düzenleyin. Veritabanı gerekmez.
 *
 * Her haberde:
 *   slug        => URL için benzersiz kısa ad (news-detail.php?slug=...)
 *   date        => görüntülenecek tarih (tr/en)
 *   category    => etiket (tr/en)
 *   image       => kapak görseli (images/...)
 *   title       => başlık (tr/en)
 *   excerpt     => liste/kart için kısa özet (tr/en)
 *   body        => detay sayfası için paragraflar dizisi (her paragraf tr/en)
 *   source      => (ops.) kaynak adı (kart üstünde kategori yanında görünür)
 *   url         => (ops.) dış bağlantı; verilirse kart yeni sekmede bu adrese gider (detay sayfası yerine)
 */
return [
  [
    'slug'      => 'yeni-uretim-hatti',
    'date'      => ['tr' => '1 Nisan 2026', 'en' => 'April 1, 2026'],
    'category'  => ['tr' => 'Kurumsal', 'en' => 'Corporate'],
    'image'     => 'images/Herkes Makina foto.JPG',
    // Detay sayfasındaki "Habere Git" butonu bu dış habere yönlendirir
    'source_url' => 'https://www.brueckner-maschinenbau.com/en/news-events/polikon-plastik-film-ambalaj-2026',
    'title'    => [
        'tr' => 'Yeni Üretim Hattımız Faaliyete Geçti',
        'en' => 'Our New Production Line is Now Operational',
    ],
    'excerpt'  => [
        'tr' => 'Modern teknoloji ile donatılmış yeni BOPP film üretim hattımız tam kapasite ile üretime başladı.',
        'en' => 'Our new BOPP film production line equipped with modern technology has started production at full capacity.',
    ],
    'body'     => [
        [
            'tr' => 'Polikon olarak, İzmir Kemalpaşa\'daki tesisimizde kurulumunu tamamladığımız yeni nesil BOPP film üretim hattımızı tam kapasite ile devreye aldık. Bu yatırım, üretim kapasitemizi önemli ölçüde artırırken ürün kalitemizi de en üst seviyeye taşıyor.',
            'en' => 'At Polikon, we have brought our next-generation BOPP film production line, installed at our facility in Kemalpaşa, İzmir, into full-capacity operation. This investment significantly increases our production capacity while raising our product quality to the highest level.',
        ],
        [
            'tr' => 'İleri otomasyon sistemleri ve hassas kalite kontrol teknolojileriyle donatılan hat; etiket, ambalaj ve laminasyon uygulamaları için yüksek performanslı filmleri daha kısa teslim süreleriyle üretebilme imkânı sağlıyor.',
            'en' => 'Equipped with advanced automation systems and precise quality-control technologies, the line enables us to produce high-performance films for label, packaging and lamination applications with shorter lead times.',
        ],
        [
            'tr' => 'Sürdürülebilirlik önceliğimiz doğrultusunda yeni hat, enerji verimliliği ve fire azaltımı hedefleriyle tasarlandı. Bu sayede hem çevresel ayak izimizi küçültüyor hem de iş ortaklarımıza daha rekabetçi çözümler sunuyoruz.',
            'en' => 'In line with our sustainability priorities, the new line was designed with energy-efficiency and waste-reduction goals. This allows us both to reduce our environmental footprint and to offer our partners more competitive solutions.',
        ],
    ],
  ],
];
