# Polikon — Güvenlik Notları

Bu belge, sitede **uygulanmış** güvenlik önlemlerini ve **sunucu tarafında sizin/hosting'in yapması gereken** ayarları listeler.

---

## A) Uygulanmış (kod / .htaccess) — hazır

| Önlem | Nerede |
|---|---|
| **HTTPS zorunlu** (http→https 301) | `.htaccess` (localhost hariç) |
| **Güvenlik başlıkları** — X-Content-Type-Options, X-Frame-Options, Referrer-Policy, Permissions-Policy, COOP, HSTS, CSP | `.htaccess` (mod_headers) |
| **CSP** — yalnızca kendi kaynak + Google Fonts + Google Maps gömme | `.htaccess` |
| **Rate limiting** — IP başına: iletişim 5/10dk, PDF talebi 8/10dk | `includes/functions.php` → `rate_limit()` |
| **E-posta header injection koruması** — To/Subject'te CR/LF temizliği + tek geçerli e-posta | `includes/mailer.php`, `functions.php` |
| **Gizli bilgiler koda gömülmez** — SMTP/DB şifreleri `includes/secrets.php` (git dışı, web'e kapalı) veya ortam değişkeni | `config.php`, `includes/secrets.example.php` |
| **Log hijyeni** — şifre/token/kimlik yanıtı loglanmaz; hata detayı yalnızca `APP_DEBUG=1` iken | `includes/mailer.php`, `config.php` |
| **Hassas dosya/klasör erişimi kapalı** — `config.php`, `includes/`, `partials/`, `dev/` → 403 | `.htaccess` |
| **KVKK** — aydınlatma metni + formlarda zorunlu onay kutusu | `kvkk.php`, `contact.php`, `product-detail.php` |
| **Dizin listeleme kapalı** | `.htaccess` (`Options -Indexes`) |

### Gizli bilgileri girme
1. `includes/secrets.example.php` → `includes/secrets.php` olarak kopyalayın.
2. Gerçek SMTP/DB şifrelerini girin. Bu dosya git'e girmez, web'den erişilemez.

### CSP notu
Site satır içi (inline) stil/script kullandığı için CSP `'unsafe-inline'` içerir. Tam sıkılaştırma
istenirse inline kodların ayrı dosyalara taşınması gerekir (ayrı bir iş).

---

## B) Sunucu tarafı — SİZİN/HOSTING'İN yapması gerekenler

> ⚠️ Bu ayarları **ben uygulamadım** (talebiniz üzerine sunucu seviyesinde değişiklik yapılmadı).
> VPS/kök erişiminiz varsa aşağıdaki komutlar; **paylaşımlı cPanel** kullanıyorsanız bunlar
> genelde **hosting firmasının sorumluluğundadır** — onlardan talep edin.

### 1) Firewall — yalnızca 80, 443, SSH
**ufw (Ubuntu/Debian):**
```bash
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow 22/tcp      # SSH (kendi portunuz farklıysa onu açın)
sudo ufw allow 80/tcp      # HTTP
sudo ufw allow 443/tcp     # HTTPS
sudo ufw enable
sudo ufw status verbose
```
**firewalld (CentOS/RHEL/AlmaLinux):**
```bash
sudo firewall-cmd --permanent --add-service=ssh
sudo firewall-cmd --permanent --add-service=http
sudo firewall-cmd --permanent --add-service=https
sudo firewall-cmd --reload
```

### 2) fail2ban (SSH ve web brute-force koruması)
```bash
# Kurulum
sudo apt update && sudo apt install -y fail2ban      # Debian/Ubuntu
# veya: sudo dnf install -y fail2ban                 # RHEL ailesi

# /etc/fail2ban/jail.local
[DEFAULT]
bantime  = 1h
findtime = 10m
maxretry = 5

[sshd]
enabled = true

[apache-auth]
enabled = true

sudo systemctl enable --now fail2ban
sudo fail2ban-client status
```

### 3) HTTPS sertifikası
- cPanel → **SSL/TLS Status → AutoSSL (Let's Encrypt)** ile ücretsiz sertifika kurun.
- Sertifika aktifken `.htaccess`'teki HSTS başlığı devreye girer.

### 4) Diğer öneriler
- SSH'ta parola yerine **anahtar tabanlı giriş**; root ile doğrudan giriş kapalı.
- PHP `display_errors=Off` (canlıda) — `config.php` bunu `APP_DEBUG=0` iken zaten yapar.
- Düzenli yedek (dosyalar + varsa şirket DB).
