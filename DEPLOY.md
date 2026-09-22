# Polikon — Kurulum ve Yapılandırma

Site **PHP** ile çalışır ama içeriği **statiktir** — site için ayrı bir veritabanı **gerekmez**.
Tek dinamik parça:

> Ziyaretçi bir ürünün **teknik dokümanını (PDF)** ister → PDF **şirketin kendi sisteminden** çekilir →
> ziyaretçinin **e-posta adresine** gönderilir (şirkete de bilgi maili gider).

Ayrıca **iletişim formu** mesajları şirket e-postasına iletilir. **Admin panel ve site veritabanı yoktur.**

---

## 0) Gereksinimler
- PHP **8.0+** (cPanel'de standart).
- PDF şirket veritabanından çekilecekse ilgili PDO sürücüsü: MySQL (`pdo_mysql`) / MSSQL (`pdo_sqlsrv`) / PostgreSQL (`pdo_pgsql`).
- Giden e-posta: cPanel `mail()` **veya** bir SMTP hesabı.

## 1) Dosyaları yükle
`public_html` (alan adı kök klasörü) içine:
```
css/  images/  includes/  js/  partials/
*.php  (index, about, products, category, product-detail, contact, news, search, pdf-request)
.htaccess   config.php   DEPLOY.md
```
**YÜKLENMEYECEKLER:** `dev/  node_modules/  _eski_html_yedek/  datasheets/  .git/  server.js  package*.json  start.bat  .env`
> `datasheets/` yalnızca yerel testte kullanılır (aşağıya bakın). Canlıda PDF şirket sisteminden gelir.

## 2) `config.php` — PDF kaynağı
`config.php` içinde **PDF_SOURCE_MODE**'u seçin:

### Seçenek A — Şirket veritabanından (önerilen: `db`)
```php
define('PDF_SOURCE_MODE', 'db');
define('PDF_DB_DRIVER', 'mysql');      // mysql | sqlsrv | pgsql
define('PDF_DB_HOST',   '10.0.0.5');   // şirket DB sunucusu
define('PDF_DB_PORT',   '');           // boş = sürücü varsayılanı
define('PDF_DB_NAME',   'erp');
define('PDF_DB_USER',   'okuyucu');
define('PDF_DB_PASS',   '****');
define('PDF_DB_TABLE',    'documents');       // PDF'lerin olduğu tablo
define('PDF_DB_KEY_COL',  'product_code');    // ürün kodu kolonu (pdf_code ile eşleşir)
define('PDF_DB_BLOB_COL', 'pdf_data');        // PDF ikili (blob) kolonu
define('PDF_DB_PATH_COL', '');                // VEYA: blob yerine dosya yolu/URL kolonu (bunu doldurursanız blob yok sayılır)
```
- PDF **blob** olarak saklanıyorsa `PDF_DB_BLOB_COL`'u doldurun.
- PDF bir **dosya yolu/URL** olarak saklanıyorsa `PDF_DB_PATH_COL`'u doldurun (blob boş kalsın).

### Seçenek B — Sabit URL kalıbı (`url`)
```php
define('PDF_SOURCE_MODE', 'url');
define('PDF_URL_TEMPLATE', 'https://sistem.polikon.com/pdf/{code}.pdf');  // {code} = ürün kodu
```

## 3) `config.php` — E-posta
```php
// SMTP kullanacaksanız (önerilir):
define('SMTP_HOST', 'mail.polikonfilm.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'no-reply@polikonfilm.com');
define('SMTP_PASS', '****');
define('SMTP_SECURE', 'tls');          // tls | ssl | ''
// SMTP boş bırakılırsa PHP mail() kullanılır.

define('MAIL_FROM', 'no-reply@polikonfilm.com');
define('COMPANY_EMAIL', 'info@polikonfilm.com');   // form + PDF bildirimleri buraya
```

## 4) Ürün ↔ PDF eşleşmesi
`includes/products.php` içinde her ürünün bir **`pdf_code`** değeri var (varsayılan: ürün slug'ı).
Bunu **şirket sistemindeki gerçek ürün koduyla** eşleştirin. Örnek:
```php
['slug' => 'iko-label-transparent', 'name' => 'Transparent', 'image' => 'images/3.jpg',
 'pdf_code' => 'IKO-LBL-TR-001'],   // <-- şirket DB'sindeki product_code
```
Ürün eklemek/çıkarmak da bu dosyadan yapılır (HTML'e dokunmadan).

## 5) Site iletişim bilgileri
`config.php` altındaki `CONTACT_ADDRESS`, `CONTACT_PHONE`, `CONTACT_EMAIL`, `SOCIAL_LINKEDIN`
değerleri footer ve İletişim sayfasında görünür.

## 6) Test
- Bir ürün sayfasına gidin → **"Dokümanı E-postama Gönder"** → formu doldurun.
- PDF, girdiğiniz e-postaya ek olarak gelmeli; `COMPANY_EMAIL`'e bildirim düşmeli.
- İletişim formunu gönderin → `COMPANY_EMAIL`'e mesaj gelmeli.

---

## Güvenlik / notlar
- `config.php`, `includes/`, `partials/` doğrudan HTTP erişimine `.htaccess` ile kapalı.
- SSL (https) kullanın (cPanel AutoSSL).
- Şirket DB kullanıcısı için **sadece okuma (SELECT)** yetkisi yeterli.

## Yerel test (geliştirici)
```
cd dev && docker compose up -d --build      # http://localhost:8080  (MySQL gerekmez)
```
Test modunda (`dev/docker-compose.yml`):
- `PDF_SOURCE_MODE=local` → PDF'ler `datasheets/{pdf_code}.pdf` dosyasından okunur.
- `MAIL_LOG_DIR` ayarlı → e-postalar gönderilmez, `dev/maillog/*.eml` olarak yazılır (inceleyebilirsiniz).
