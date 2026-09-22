# Polikon Web Sitesi

Polikon BOPP ambalaj/etiket filmleri kurumsal web sitesi.

## Teknoloji
- **Tamamen statik** site — veritabanı yok, sunucuda çalışan işlem yok. Sayfalar PHP şablonlarıyla üretilir (ortak header/footer + `includes/products.php` ürün dizisi).
- **Ürün TDS/PDF**: `datasheets/{pdf_code}.pdf` dosyaları doğrudan yeni sekmede açılır/indirilir (bilgi/e-posta istenmez).
- **İletişim**: yalnızca bilgi + harita gösterilir (form/e-posta gönderimi yoktur).
- Font: Poppins (Google Fonts).

## Klasörler
| Yol | Açıklama |
|---|---|
| `*.php` | Sayfalar (index, about, products, category, product-detail, contact, news, search, kvkk, 404) |
| `partials/` | Paylaşılan header/footer + `products-banner.php` |
| `includes/` | `functions.php` (yardımcılar), `products.php` (ürün verisi) |
| `css/ js/ images/` | Varlıklar |
| `dev/` | Yalnızca yerel test (Docker, PHP) — sunucuya yüklenmez |
| `datasheets/` | Ürün TDS (PDF) dosyaları — `{pdf_code}.pdf` |

## Kurulum ve güvenlik
- Dağıtım (cPanel): **[DEPLOY.md](DEPLOY.md)**
- Güvenlik notları: **[SECURITY.md](SECURITY.md)**

## Yerel çalıştırma
```
cd dev && docker compose up -d --build   # http://localhost:8080
```

## İçerik güncelleme
- **Ürün ekle/çıkar:** `includes/products.php`
- **Ürün TDS (PDF):** `datasheets/{pdf_code}.pdf` olarak ekleyin
- **İletişim bilgileri / site adresi:** `config.php`
