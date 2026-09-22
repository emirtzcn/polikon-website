<?php
/**
 * Polikon — Ürün verisi (statik).
 * Ürün eklemek/çıkarmak için bu diziyi düzenleyin. Veritabanı gerekmez.
 *
 * Kategori alanları (polikon-website src/data/content.js PRODUCTS ile uyumlu):
 *   slug, name, color, image, mockup (ana görsel), mockup_alt (detay görseli),
 *   tag [tr/en], desc [tr/en] (özet), thickness_range, density_range,
 *   features [[tr, en], ...], variants [...]
 *
 * Varyant alanları: code, name (appearance), thickness, density, pdf_code.
 * thickness/density boş bırakılırsa tabloda "—" görünür.
 * TDS PDF'i datasheets/ klasöründe "POLIKON <KOD> TDS *.pdf" adıyla aranır.
 */
return [
  [
    'slug'  => 'iko-wrap',
    'name'  => 'IKO WRAP',
    'color' => '#9b92c6',
    'image' => 'images/1.jpg',
    'mockup'     => 'images/mockups/WAL 1.png',
    'mockup_alt' => 'images/mockups/WAL 2.png',
    'tag'   => ['tr' => 'Sarma ve Metalize Etiket', 'en' => 'Wrap-Around & Metallized Label'],
    'desc'  => [
      'tr' => 'Yüksek hızlı sarma etiket (wrap-around) uygulamaları için tasarlanan POLIKON filmleri; mükemmel berraklık, parlaklık ve boyutsal kararlılığı güvenilir makine uyumluluğuyla birleştirir. Pürüzsüz yüzeyleri yüksek kaliteli baskıyı ve güçlü görsel etkiyi destekler; içecek, su ve diğer kap etiketleme uygulamaları için verimli bir çözüm sunar.',
      'en' => 'Engineered for high-speed wrap-around labeling applications, POLIKON films combine excellent clarity, gloss and dimensional stability with reliable machinability. Their smooth surface supports high-quality printing and strong visual impact, making them an efficient solution for beverage, water and other container labeling applications.',
    ],
    'thickness_range' => '30–60 µm',
    'density_range'   => '0.62–0.91',
    'features' => [
      ['Yüksek hızlı rulodan etiketleme', 'High-speed roll-fed labelling'],
      ['Düşük çekme oranı', 'Low shrinkage'],
      ['Geniş kaynak aralığı', 'Wide seal range'],
      ['Metalize ve sedefli seçenekler', 'Metallised & pearlized options'],
    ],
    'variants' => [
      ['slug' => 'iko-wrap-cwr',    'code' => 'CWR',     'name' => 'Transparent WAL',           'thickness' => '30/35/40 µm', 'density' => '0,91', 'pdf_code' => 'iko-wrap-cwr'],
      ['slug' => 'iko-wrap-owr',    'code' => 'OWR',     'name' => 'Pearlized WAL',             'thickness' => '35/38 µm',    'density' => '0,70', 'pdf_code' => 'iko-wrap-owr'],
      ['slug' => 'iko-wrap-owrl',   'code' => 'OWRL',    'name' => 'Pearlized WAL High Yield',  'thickness' => '35/38 µm',    'density' => '0,62', 'pdf_code' => 'iko-wrap-owrl'],
      ['slug' => 'iko-wrap-cmi-m',  'code' => 'CMI - M', 'name' => 'Metallized Transparent IML', 'density' => '0,90', 'pdf_code' => 'iko-wrap-cmi-m'],
      ['slug' => 'iko-wrap-owr-m',  'code' => 'OWR - M', 'name' => 'Metallized Pearlized WAL',  'density' => '0,70', 'pdf_code' => 'iko-wrap-owr-m'],
      ['slug' => 'iko-wrap-cwr-m',  'code' => 'CWR - M', 'name' => 'Metallized Transparent WAL', 'density' => '0,91', 'pdf_code' => 'iko-wrap-cwr-m'],
    ],
  ],
  [
    'slug'  => 'iko-mold',
    'name'  => 'IKO MOLD',
    'color' => '#f5a128',
    'image' => 'images/1.jpg',
    'mockup'     => 'images/mockups/IML 1.png',
    'mockup_alt' => 'images/mockups/IML 2.png',
    'tag'   => ['tr' => 'Temel IML Ürün Ailesi', 'en' => 'Core IML Product Range'],
    'desc'  => [
      'tr' => 'Yüksek performanslı kalıp içi etiketleme (IML) uygulamaları için geliştirilen POLIKON IML Filmleri; mükemmel baskı alabilirlik, sertlik ve boyutsal kararlılığı güvenilir işleme performansıyla birleştirir. Dayanıklılık, verimlilik ve premium raf görünümü gerektiren sert ambalaj uygulamaları için güçlü görsel etki ve tutarlı etiket kalitesi sunar.',
      'en' => 'Developed for high-performance in-mould labeling applications, POLIKON IML Films combine excellent printability, stiffness and dimensional stability with reliable processing performance. They provide strong visual impact and consistent label quality for rigid packaging applications requiring durability, efficiency and premium shelf appearance.',
    ],
    'thickness_range' => '45–70 µm',
    'density_range'   => '0.55–0.96',
    'features' => [
      ['Anti-statik yüzey işlemi', 'Anti-static treatment'],
      ['Kontrollü sertlik', 'Controlled stiffness'],
      ['PP’ye üstün yapışma', 'Superior adhesion to PP'],
      ['Portakal kabuğu etkisinden arındırılmış yüzey', 'Orange-peel-free finish'],
    ],
    'variants' => [
      ['slug' => 'iko-mold-cli', 'code' => 'CLI', 'name' => 'Transparent',          'thickness' => '50 µm',       'density' => '0,91', 'pdf_code' => 'iko-mold-cli'],
      ['slug' => 'iko-mold-cmi', 'code' => 'CMI', 'name' => 'Transparent Matt',     'thickness' => '50 µm',       'density' => '0,91', 'pdf_code' => 'iko-mold-cmi'],
      ['slug' => 'iko-mold-swi', 'code' => 'SWI', 'name' => 'Solid White',          'thickness' => '45/57 µm',    'density' => '0,91', 'pdf_code' => 'iko-mold-swi'],
      ['slug' => 'iko-mold-ssi', 'code' => 'SSI', 'name' => 'Semi Solid White',     'thickness' => '60/70 µm',    'density' => '0,91', 'pdf_code' => 'iko-mold-ssi'],
      ['slug' => 'iko-mold-sfi', 'code' => 'SFI', 'name' => 'Satin Finish',         'thickness' => '60/65 µm',    'density' => '0,91', 'pdf_code' => 'iko-mold-sfi'],
      ['slug' => 'iko-mold-opi', 'code' => 'OPI', 'name' => 'White Cavitated',      'thickness' => '55/60/65 µm', 'density' => '0,91', 'pdf_code' => 'iko-mold-opi'],
    ],
  ],
  [
    'slug'  => 'iko-face',
    'name'  => 'IKO FACE',
    'color' => '#5c7191',
    'image' => 'images/2.jpg',
    'mockup'     => 'images/mockups/PSL 1.png',
    'mockup_alt' => 'images/mockups/PSL 2.png',
    'tag'   => ['tr' => 'Yüzey Film Ürün Ailesi', 'en' => 'Facestock Product Range'],
    'desc'  => [
      'tr' => 'Basınca duyarlı etiketleme (pressure-sensitive) uygulamaları için tasarlanan POLIKON IKO FACE filmleri; mükemmel yüzey kalitesi, baskı alabilirlik ve dönüştürme performansı sunar. Tutarlı optik özellikleri ve boyutsal kararlılığı; kişisel bakım, ev bakımı ve diğer markalı ambalaj uygulamalarında premium etiket görünümünü destekler.',
      'en' => 'Engineered for pressure-sensitive labeling applications, POLIKON IKO FACE films deliver excellent surface quality, printability and converting performance. Their consistent optical properties and dimensional stability support a premium label appearance across personal care, household and other branded packaging applications.',
    ],
    'thickness_range' => '30–60 µm',
    'density_range'   => '0.70–0.96',
    'features' => [
      ['Yüksek şeffaflık ve parlaklık', 'High clarity & gloss'],
      ['Üstün baskı uygunluğu', 'Excellent print receptivity'],
      ['Tutarlı kesim performansı', 'Consistent die-cut performance'],
      ['Premium yüzey film kalitesi', 'Premium facestock finish'],
    ],
    'variants' => [
      ['slug' => 'iko-face-cps', 'code' => 'CPS', 'name' => 'Clear Facestock',               'thickness' => '30/40 µm',    'density' => '0,91', 'pdf_code' => 'iko-face-cps'],
      ['slug' => 'iko-face-wps', 'code' => 'WPS', 'name' => 'White Facestock',               'thickness' => '40/48/57 µm', 'density' => '0,96', 'pdf_code' => 'iko-face-wps'],
      ['slug' => 'iko-face-ops', 'code' => 'OPS', 'name' => 'High Yield Pearlized Facestock', 'thickness' => '50/56/60 µm', 'density' => '0,70', 'pdf_code' => 'iko-face-ops'],
    ],
  ],
  [
    'slug'  => 'iko-pack',
    'name'  => 'IKO PACK',
    'color' => '#0e3557',
    'image' => 'images/3.jpg',
    'mockup'     => 'images/mockups/PACK 1.png',
    'mockup_alt' => 'images/mockups/PACK 2.png',
    'tag'   => ['tr' => 'Taze ve Şeffaf Filmler', 'en' => 'Fresh & Transparent Films'],
    'desc'  => [
      'tr' => 'Esnek ambalaj uygulamaları için geliştirilen POLIKON IKO PACK filmleri; güçlü optik performansı, mükemmel baskı alabilirliği ve güvenilir makine uyumluluğunu birleştirir. Dengeli mekanik özellikleri; atıştırmalık, şekerleme, kahve ve diğer tüketici ambalajı uygulamaları için verimli dönüştürme ve yüksek kaliteli grafik sağlar.',
      'en' => 'Developed for flexible packaging applications, POLIKON IKO PACK films combine strong optical performance, excellent printability and reliable machinability. Their balanced mechanical properties support efficient converting and high-quality graphics for snacks, confectionery, coffee and other consumer packaging applications.',
    ],
    'thickness_range' => '20–40 µm',
    'density_range'   => '0.70–0.94',
    'features' => [
      ['Çift yüzey işlemi', 'Both-side treatment'],
      ['Geniş kaynak aralığı', 'Wide seal range'],
      ['Üstün optik özellikler', 'Excellent optics'],
      ['Mat ve metalize seçenekler', 'Matte & metallized options'],
    ],
    'variants' => [
      ['slug' => 'iko-pack-cla2',  'code' => 'CLA2',    'name' => 'Fresh Pack',                'thickness' => '25/30 µm',              'density' => '0,91', 'pdf_code' => 'iko-pack-cla2'],
      ['slug' => 'iko-pack-clh',   'code' => 'CLH',     'name' => 'Transparent',               'thickness' => '15/17/20/25/30/40 µm',  'density' => '0,91', 'pdf_code' => 'iko-pack-clh'],
      ['slug' => 'iko-pack-clhl',  'code' => 'CLHL',    'name' => 'Transparent Low SIT',       'density' => '0,91', 'pdf_code' => 'iko-pack-clhl'],
      ['slug' => 'iko-pack-clm',   'code' => 'CLM',     'name' => 'Transparent Modified Pack', 'density' => '0,91', 'pdf_code' => 'iko-pack-clm'],
      ['slug' => 'iko-pack-wlh',   'code' => 'WLH',     'name' => 'Solid White',               'thickness' => '20/25/30 µm',           'density' => '0,91', 'pdf_code' => 'iko-pack-wlh'],
      ['slug' => 'iko-pack-wll',   'code' => 'WLL',     'name' => 'Solid White Lamination',    'density' => '0,94', 'pdf_code' => 'iko-pack-wll'],
      ['slug' => 'iko-pack-oph',   'code' => 'OPH',     'name' => 'White Cavitated Coex',      'thickness' => '30/35/40 µm',           'density' => '0,70', 'pdf_code' => 'iko-pack-oph'],
      ['slug' => 'iko-pack-cmh',   'code' => 'CMH',     'name' => 'Matte Coex',                'thickness' => '20 µm',                 'density' => '0,88', 'pdf_code' => 'iko-pack-cmh'],
      ['slug' => 'iko-pack-cmr',   'code' => 'CMR',     'name' => 'Matte Release Film',        'thickness' => '20 µm',                 'density' => '0,88', 'pdf_code' => 'iko-pack-cmr'],
      ['slug' => 'iko-pack-clh-m', 'code' => 'CLH - M', 'name' => 'Metallized Transparent',    'thickness' => '20 µm',                 'density' => '0,91', 'pdf_code' => 'iko-pack-clh-m'],
    ],
  ],
  [
    'slug'  => 'iko-plain',
    'name'  => 'IKO PLAIN',
    'color' => '#17a5dc',
    'image' => 'images/4.jpg',
    'mockup'     => 'images/mockups/PLAIN 1.png',
    'mockup_alt' => 'images/mockups/PLAIN 2.png',
    'tag'   => ['tr' => 'Düz Filmler', 'en' => 'Plain Films'],
    'desc'  => [
      'tr' => 'Dönüştürme ve endüstriyel uygulamalar için çok yönlü taban filmler olarak tasarlanan POLIKON IKO PLAIN filmleri; tutarlı kalınlık, boyutsal kararlılık ve güvenilir işleme performansı sunar. Şeffaf, beyaz ve inci (pearlized) çeşitleriyle; baskı, laminasyon ve özel alt uygulamalar için güvenilir bir temel sağlar.',
      'en' => 'Designed as versatile base films for converting and industrial applications, POLIKON IKO PLAIN films offer consistent thickness, dimensional stability and dependable processing performance. Available in clear, white and pearlized variants, they provide a reliable foundation for printing, lamination and specialized downstream applications.',
    ],
    'thickness_range' => '12–20 µm',
    'density_range'   => '0.91',
    'features' => [
      ['Ultra yüksek şeffaflık', 'Ultra-high transparency'],
      ['Kalıcı kat izi seçenekleri', 'Dead-fold options'],
      ['Baskıya uygun yüzey', 'Printable surface'],
      ['Tek veya çift yüzey işlemi', 'One or double-side treated'],
    ],
    'variants' => [
      ['slug' => 'iko-plain-clp1', 'code' => 'CLP1', 'name' => 'Transparent Plain One Side Treated',    'thickness' => '15/18/20 µm', 'density' => '0,91', 'pdf_code' => 'iko-plain-clp1'],
      ['slug' => 'iko-plain-clp2', 'code' => 'CLP2', 'name' => 'Transparent Plain - Double Side Treated', 'thickness' => '12/15/18 µm', 'density' => '0,91', 'pdf_code' => 'iko-plain-clp2'],
      ['slug' => 'iko-plain-clr',  'code' => 'CLR',  'name' => 'Release Plain',                          'thickness' => '15*20 µm',    'density' => '0,91', 'pdf_code' => 'iko-plain-clr'],
      ['slug' => 'iko-plain-cmp2', 'code' => 'CMP2', 'name' => 'Mat Plain', 'pdf_code' => 'iko-plain-cmp2'],
    ],
  ],
];
