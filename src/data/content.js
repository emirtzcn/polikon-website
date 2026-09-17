import { IMG } from './images.js'

export const NAV = [
  { to: '/', key: 'home' },
  { to: '/products', key: 'products' },
  { to: '/applications', key: 'applications' },
  { to: '/news', key: 'news' },
  { to: '/about', key: 'about' },
  { to: '/contact', key: 'contact' },
]

export const PRODUCTS = [
  {
    slug: 'iko-face',
    name: 'IKO FACE',
    tag: 'Facestock Product Range',
    image: IMG.mockups.face1,
    imageAlt: IMG.mockups.face2,
    summary:
      'Engineered for pressure-sensitive labeling applications, POLIKON IKO FACE films deliver excellent surface quality, printability and converting performance. Their consistent optical properties and dimensional stability support a premium label appearance across personal care, household and other branded packaging applications.',
    thicknessRange: '30–60 µm',
    densityRange: '0.70–0.96',
    features: ['High clarity & gloss', 'Excellent print receptivity', 'Consistent die-cut performance', 'Premium facestock finish'],
    tr: {
      tag: 'Yüzey Film Ürün Ailesi',
      summary:
        'Baskı hassasiyetli etiketleme uygulamaları için tasarlanan POLIKON IKO FACE filmleri; üstün yüzey kalitesi, baskı uygunluğu ve dönüştürme performansı sunar. Tutarlı optik özellikleri ve boyutsal kararlılığı, kişisel bakım, ev bakım ve diğer markalı ambalaj uygulamalarında premium bir etiket görünümü sağlar.',
      features: ['Yüksek şeffaflık ve parlaklık', 'Üstün baskı uygunluğu', 'Tutarlı kesim performansı', 'Premium yüzey film kalitesi'],
    },
    catalogue: [
      { code: 'CPS', appearance: 'Clear Facestock', thickness: '30/40 µm', density: '0.91' },
      { code: 'WPS', appearance: 'White Facestock', thickness: '40/48/57 µm', density: '0.96' },
      { code: 'OPS', appearance: 'High Yield Pearlized Facestock', thickness: '50/56/60 µm', density: '0.70', tds: IMG.tds.OPS },
    ],
  },
  {
    slug: 'iko-mold',
    name: 'IKO MOLD',
    tag: 'Core IML Product Range',
    image: IMG.mockups.iml1,
    imageAlt: IMG.mockups.iml2,
    summary:
      'Developed for high-performance in-mould labeling applications, POLIKON IML Films combine excellent printability, stiffness and dimensional stability with reliable processing performance. They provide strong visual impact and consistent label quality for rigid packaging applications requiring durability, efficiency and premium shelf appearance.',
    thicknessRange: '45–70 µm',
    densityRange: '0.55–0.96',
    features: ['Anti-static treatment', 'Controlled stiffness', 'Superior adhesion to PP', 'Orange-peel-free finish'],
    tr: {
      tag: 'Temel IML Ürün Ailesi',
      summary:
        'Yüksek performanslı in-mold etiketleme uygulamaları için geliştirilen POLIKON IML filmleri; üstün baskı uygunluğu, sertlik ve boyutsal kararlılığı güvenilir işlem performansıyla birleştirir. Dayanıklılık, verimlilik ve premium raf görünümünün önemli olduğu sert ambalajlarda güçlü görsel etki ve tutarlı etiket kalitesi sağlar.',
      features: ['Anti-statik yüzey işlemi', 'Kontrollü sertlik', 'PP’ye üstün yapışma', 'Portakal kabuğu etkisinden arındırılmış yüzey'],
    },
    catalogue: [
      { code: 'CLI', appearance: 'Transparent', thickness: '50 µm', density: '0.91', tds: IMG.tds.CLI },
      { code: 'CMI', appearance: 'Transparent Matt', thickness: '50 µm', density: '0.91', tds: IMG.tds.CMI },
      { code: 'SWI', appearance: 'Solid White', thickness: '45/57 µm', density: '0.91', tds: IMG.tds.SWI },
      { code: 'SSI', appearance: 'Semi Solid White', thickness: '60/70 µm', density: '0.91', tds: IMG.tds.SSI },
      { code: 'SFI', appearance: 'Satin Finish', thickness: '60/65 µm', density: '0.91', tds: IMG.tds.SFI },
      { code: 'OPI', appearance: 'White Cavitated', thickness: '55/60/65 µm', density: '0.91', tds: IMG.tds.OPI },
      { code: 'OMI', appearance: 'Matt White Cavitated', thickness: '50 µm', density: '0.91', tds: IMG.tds.OMI },
      { code: 'CMI-M', appearance: 'Metallized Transparent IML', thickness: '—', density: '0.90' },
    ],
  },
  {
    slug: 'iko-wrap',
    name: 'IKO WRAP',
    tag: 'Wrap-Around & Metallized Label',
    image: IMG.mockups.wrap1,
    imageAlt: IMG.mockups.wrap2,
    summary:
      'Engineered for high-speed wrap-around labeling applications, POLIKON films combine excellent clarity, gloss and dimensional stability with reliable machinability. Their smooth surface supports high-quality printing and strong visual impact, making them an efficient solution for beverage, water and other container labeling applications.',
    thicknessRange: '30–60 µm',
    densityRange: '0.62–0.91',
    features: ['High-speed roll-fed labelling', 'Low shrinkage', 'Wide seal range', 'Metallised & pearlized options'],
    tr: {
      tag: 'Sarma ve Metalize Etiket',
      summary:
        'Yüksek hızlı sarma etiketleme uygulamaları için tasarlanan POLIKON filmleri; üstün şeffaflık, parlaklık ve boyutsal kararlılığı güvenilir işlenebilirlikle birleştirir. Pürüzsüz yüzeyi yüksek kaliteli baskıyı ve güçlü görsel etkiyi destekler; içecek, su ve diğer konteyner etiketleme uygulamaları için etkili bir çözüm sunar.',
      features: ['Yüksek hızlı rulodan etiketleme', 'Düşük çekme oranı', 'Geniş kaynak aralığı', 'Metalize ve sedefli seçenekler'],
    },
    catalogue: [
      { code: 'CWR', appearance: 'Transparent WAL', thickness: '30/35/40 µm', density: '0.91', tds: IMG.tds.CWR },
      { code: 'OWR', appearance: 'Pearlized WAL', thickness: '35/38 µm', density: '0.70', tds: IMG.tds.OWR },
      { code: 'OWRL', appearance: 'Pearlized WAL High Yield', thickness: '35/38 µm', density: '0.62', tds: IMG.tds.OWRL },
      { code: 'OWR-M', appearance: 'Metallized Pearlized WAL', thickness: '—', density: '0.70' },
      { code: 'CWR-M', appearance: 'Metallized Transparent WAL', thickness: '—', density: '0.91' },
    ],
  },
  {
    slug: 'iko-pack',
    name: 'IKO PACK',
    tag: 'Fresh & Transparent Films',
    image: IMG.mockups.pack1,
    imageAlt: IMG.mockups.pack2,
    summary:
      'Developed for flexible packaging applications, POLIKON IKO PACK films combine strong optical performance, excellent printability and reliable machinability. Their balanced mechanical properties support efficient converting and high-quality graphics for snacks, confectionery, coffee and other consumer packaging applications.',
    thicknessRange: '20–40 µm',
    densityRange: '0.70–0.94',
    features: ['Both-side treatment', 'Wide seal range', 'Excellent optics', 'Matte & metallized options'],
    tr: {
      tag: 'Taze ve Şeffaf Filmler',
      summary:
        'Esnek ambalaj uygulamaları için geliştirilen POLIKON IKO PACK filmleri; güçlü optik performansı, üstün baskı uygunluğu ve güvenilir işlenebilirliği birleştirir. Dengeli mekanik özellikleri; atıştırmalık, şekerleme, kahve ve diğer tüketici ambalajlarında verimli dönüştürme ve yüksek kaliteli baskı sağlar.',
      features: ['Çift yüzey işlemi', 'Geniş kaynak aralığı', 'Üstün optik özellikler', 'Mat ve metalize seçenekler'],
    },
    catalogue: [
      { code: 'CLA2', appearance: 'Fresh Pack', thickness: '25/30 µm', density: '0.91' },
      { code: 'CLH', appearance: 'Transparent', thickness: '15/17/20/25/30/40 µm', density: '0.91', tds: IMG.tds.CLH },
      { code: 'CLHL', appearance: 'Transparent Low Sit', thickness: '—', density: '0.91' },
      { code: 'CLM', appearance: 'Transparent Modified Pack', thickness: '—', density: '0.91', tds: IMG.tds.CLM },
      { code: 'WLH', appearance: 'Solid White', thickness: '20/25/30 µm', density: '0.91', tds: IMG.tds.WLH },
      { code: 'WLL', appearance: 'Solid White Lamination', thickness: '—', density: '0.94' },
      { code: 'OPH', appearance: 'White Cavitated Coex', thickness: '—', density: '—', tds: IMG.tds.OPH },
      { code: 'OPL', appearance: 'White Cavitated Coex', thickness: '—', density: '—', tds: IMG.tds.OPL },
      { code: 'OPA', appearance: 'White Cavitated Coex', thickness: '—', density: '—', tds: IMG.tds.OPA },
      { code: 'OPD', appearance: 'White Cavitated Coex', thickness: '—', density: '—', tds: IMG.tds.OPD },
      { code: 'CMH', appearance: 'Matte Coex', thickness: '20 µm', density: '0.88', tds: IMG.tds.CMH },
      { code: 'CMR', appearance: 'Matte Release Film', thickness: '20 µm', density: '0.88', tds: IMG.tds.CMR },
      { code: 'CLH-M', appearance: 'Metallized Transparent', thickness: '20 µm', density: '0.91' },
    ],
  },
  {
    slug: 'iko-plain',
    name: 'IKO PLAIN',
    tag: 'Plain Films',
    image: IMG.mockups.plain1,
    imageAlt: IMG.mockups.plain2,
    summary:
      'Designed as versatile base films for converting and industrial applications, POLIKON IKO PLAIN films offer consistent thickness, dimensional stability and dependable processing performance. Available in clear, white and pearlized variants, they provide a reliable foundation for printing, lamination and specialized downstream applications.',
    thicknessRange: '12–20 µm',
    densityRange: '0.91',
    features: ['Ultra-high transparency', 'Dead-fold options', 'Printable surface', 'One or double-side treated'],
    tr: {
      tag: 'Düz Filmler',
      summary:
        'Dönüştürme ve endüstriyel uygulamalar için tasarlanan POLIKON IKO PLAIN filmleri; tutarlı kalınlık, boyutsal kararlılık ve güvenilir işlem performansı sunar. Şeffaf, beyaz ve sedefli varyantlarda üretilir; baskı, laminasyon ve özel alt uygulamalar için sağlam bir temel oluşturur.',
      features: ['Ultra yüksek şeffaflık', 'Kalıcı kat izi seçenekleri', 'Baskıya uygun yüzey', 'Tek veya çift yüzey işlemi'],
    },
    catalogue: [
      { code: 'CLP1', appearance: 'Transparent Plain One Side Treated', thickness: '15/18/20 µm', density: '0.91' },
      { code: 'CLP2', appearance: 'Transparent Plain Double Side Treated', thickness: '12/15/18 µm', density: '0.91' },
      { code: 'CLR', appearance: 'Release Plain', thickness: '15*20 µm', density: '0.91', tds: IMG.tds.CLR },
      { code: 'CMP2', appearance: 'Mat Plain', thickness: '—', density: '0.91', tds: IMG.tds.CMP2 },
    ],
  },
]

// Official display order wherever all five families are shown together.
export const PRODUCT_ORDER = ['iko-mold', 'iko-wrap', 'iko-face', 'iko-pack', 'iko-plain']
export const PRODUCTS_ORDERED = PRODUCT_ORDER.map((slug) => PRODUCTS.find((p) => p.slug === slug))

// Looks up the real TDS PDF for a film code across all product families (undefined if none exists).
export function getTds(code) {
  for (const p of PRODUCTS) {
    const row = p.catalogue.find((c) => c.code === code)
    if (row?.tds) return row.tds
  }
  return undefined
}

export const APPLICATIONS = [
  {
    slug: 'beverage-wrap',
    name: 'Beverage & Wrap-Around Labels',
    image: IMG.mockups.wrap2,
    text: 'High-performance BOPP films engineered for high-speed wrap-around labeling, excellent print presentation and consistent converting performance.',
    family: 'iko-wrap',
    codes: ['CWR', 'OWR', 'OWRL'],
    tr: {
      name: 'İçecek ve Sarma Etiketler',
      text: 'Yüksek hızlı sarma etiketleme, üstün baskı sunumu ve tutarlı dönüştürme performansı için tasarlanmış yüksek performanslı BOPP filmler.',
    },
  },
  {
    slug: 'pressure-sensitive',
    name: 'Pressure-Sensitive Labels',
    image: IMG.mockups.face2,
    text: 'Facestock films built for pressure-sensitive labeling, delivering excellent surface quality, printability and reliable dispensing at speed.',
    family: 'iko-face',
    codes: ['CPS', 'WPS', 'OPS'],
    tr: {
      name: 'Baskı Hassasiyetli Etiketler',
      text: 'Baskı hassasiyetli etiketleme için tasarlanan yüzey filmleri; üstün yüzey kalitesi, baskı uygunluğu ve yüksek hızda güvenilir dağıtım sağlar.',
    },
  },
  {
    slug: 'in-mold-food',
    name: 'In-Mold Food Packaging',
    image: IMG.mockups.iml3,
    text: 'Cavitated and solid white IML films for tubs and lids, combining stiffness, print quality and a seamless no-label look.',
    family: 'iko-mold',
    codes: ['SWI', 'SSI', 'OPI', 'OMI'],
    tr: {
      name: 'In-Mold Gıda Ambalajı',
      text: 'Kaplar ve kapaklar için kavitasyonlu ve solid beyaz IML filmler; sertlik, baskı kalitesi ve etiketsiz görünümü bir arada sunar.',
    },
  },
  {
    slug: 'buckets-pails',
    name: 'Plastic Buckets & Pails',
    image: IMG.mockups.iml2,
    text: 'Solid white and satin-finish IML films built for rigid pails and buckets, with strong stiffness and reliable in-mould adhesion.',
    family: 'iko-mold',
    codes: ['SWI', 'SFI', 'OMI'],
    tr: {
      name: 'Plastik Kova ve Kovalar',
      text: 'Sert kovalar için solid beyaz ve saten yüzeyli IML filmler; güçlü sertlik ve güvenilir kalıp içi yapışma sağlar.',
    },
  },
  {
    slug: 'flexible-packaging',
    name: 'Flexible Food Packaging',
    image: IMG.mockups.pack2,
    text: 'Heat-sealable and coextruded packaging films for snacks, confectionery and coffee, balancing optics, printability and machinability.',
    family: 'iko-pack',
    codes: ['CLA2', 'CLH', 'CMH', 'CMR'],
    tr: {
      name: 'Esnek Gıda Ambalajı',
      text: 'Atıştırmalık, şekerleme ve kahve için ısıyla kaynaklanabilir, koekstrüde ambalaj filmleri; optik özellik, baskı uygunluğu ve işlenebilirliği dengeler.',
    },
  },
  {
    slug: 'overwrap-floral',
    name: 'Overwrap & Floral',
    image: IMG.mockups.plain3,
    text: 'Crystal-clear plain films for overwrap and floral sleeves, showcasing the product while keeping it protected.',
    family: 'iko-plain',
    codes: ['CLR', 'CMP2'],
    tr: {
      name: 'Sarma ve Çiçek Ambalajı',
      text: 'Sarma ve çiçek poşetleri için berrak düz filmler; ürünü korurken aynı zamanda öne çıkarır.',
    },
  },
  {
    slug: 'converting-lamination',
    name: 'General Converting & Lamination',
    image: IMG.mockups.plain1,
    text: 'Versatile base films for converting, printing and lamination, offering consistent thickness and dependable processing performance.',
    family: 'iko-plain',
    codes: ['CLP1', 'CLP2'],
    tr: {
      name: 'Genel Dönüştürme ve Laminasyon',
      text: 'Dönüştürme, baskı ve laminasyon için çok yönlü temel filmler; tutarlı kalınlık ve güvenilir işlem performansı sunar.',
    },
  },
]

export const NEWS = [
  {
    id: 1,
    date: '2026',
    category: 'Company',
    title: 'Polikon Plastik Film Ambalaj 2026',
    image: IMG.factory.lineOverview,
    excerpt: 'Featured on Brückner Maschinenbau News & Insights.',
    url: 'https://www.brueckner-maschinenbau.com/de/news-insights/polikon-plastik-film-ambalaj-2026',
    source: 'Brückner Maschinenbau',
  },
]

export const STATS = [
  { value: '8.7 m', label: 'Line width' },
  { value: '24/7', label: 'Continuous production' },
  { value: '4', label: 'Product families' },
  { value: '30+', label: 'Export markets' },
]

export const COMPANY = {
  name: 'POLIKON',
  tagline: 'BOPP films for labels & flexible packaging',
  taglineTr: 'Etiket ve esnek ambalaj için BOPP filmler',
  slogan: 'Expertise in Every Layer',
  email: 'sales@polikon.com',
  address: 'Kemalpaşa OSB mah. 612 sok. No: 18 Kemalpasa / IZMIR/TURKEY',
  linkedin: 'https://tr.linkedin.com/company/polikon-plastik-film',
}
