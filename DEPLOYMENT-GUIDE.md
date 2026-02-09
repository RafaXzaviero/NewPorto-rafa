# Deployment Guide - Laravel Portfolio

## Rekomendasi Hosting untuk Laravel

### Opsi 1: Coolify (Recommended - Gratis/Self-hosted)
**https://coolify.io**

Coolify adalah platform self-hosting gratis yang支持 Laravel + MySQL + Redis.

### Opsi 2: Railway ( Freemium)
**https://railway.app**

### Opsi 3: Render ( Freemium)
**https://render.com**

---

## Deploy ke Coolify

### Langkah 1: Persiapan

1. Buat server (bisa VPS seperti DigitalOcean, Hetzner, atau server lokal)
2. Install Coolify di server:
```bash
sudo bash -c "$(curl -fsSL https://get.coolify.io)".sh
```

### Langkah 2: Buat Project di Coolify

1. Buka dashboard Coolify
2. Klik "Create New Project"
3. Connect GitHub repository: `RafaXzaviero/NewPorto-rafa`

### Langkah 3: Configure Services

**Laravel App:**
- Type: Laravel
- PHP Version: 8.2
- Build Command: `composer install --optimize-autoloader`
- Start Command: `php artisan serve --host=0.0.0.0 --port=8000`
- Root Directory: `/`

**Database (MySQL):**
- Type: MySQL
- Version: 8.0
- Database Name: `portfolio`
- User: `portfolio_user`
- Password: (isi password yang kuat)

### Langkah 4: Environment Variables

Di Coolify dashboard, tambahkan:

```env
APP_NAME="Rafael Portfolio"
APP_ENV=production
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxx
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-mysql-host
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=portfolio_user
DB_PASSWORD=your-db-password

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

STORAGE_DISK=public
```

### Langkah 5: Setup Storage Link

Di Coolify, tambahkan post-deployment command:
```bash
php artisan storage:link
php artisan migrate --force
```

### Langkah 6: Configure Domain

1. Di Coolify, klik "Domains"
2. Tambahkan domain custom Anda
3. Configure DNS di registrar

---

## Deploy ke Railway

### Langkah 1: Setup di Railway

1. Login di https://railway.app dengan GitHub
2. Klik "New Project"
3. Pilih "Deploy from GitHub repo"
4. Select repo: `RafaXzaviero/NewPorto-rafa`

### Langkah 2: Add Database

1. Klik "New Service"
2. Select "Database" > "MySQL"
3. Catat connection string

### Langkah 3: Environment Variables

Di Railway dashboard, tambahkan:

```env
APP_NAME="Rafael Portfolio"
APP_ENV=production
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxx
APP_DEBUG=false

DB_CONNECTION=mysql
DB_HOST=${{ MySQL.HOSTNAME }}
DB_PORT=${{ MySQL.PORT }}
DB_DATABASE=${{ MySQL.DATABASE }}
DB_USERNAME=${{ MySQL.USERNAME }}
DB_PASSWORD=${{ MySQL.PASSWORD }}
```

### Langkah 4: Generate App Key

```bash
php artisan key:generate --show
```

Copy output ke APP_KEY environment variable.

### Langkah 5: Run Migrations

1. Klik "New Service" > "Shell"
2. Jalankan:
```bash
php artisan migrate --force
php artisan storage:link
```

---

## Troubleshooting

### Jika Storage tidak terbaca:
```bash
# Di server
php artisan storage:link
chmod -R 775 storage/
```

### Jika Database error:
- Cek credentials di .env
- Jalankan `php artisan migrate:status`

### Jika CSS/JS tidak loading:
```bash
npm run build
# Copy hasil build ke public/
```

---

## Tips Production

1. **Backup reguler** - Setup automated backup di hosting
2. **HTTPS** - Gunakan SSL certificate (Let's Encrypt gratis)
3. **Queue workers** - Untuk email/background jobs:
```bash
php artisan queue:work --tries=3 --max-time=3600
```

---

## Link Repository
**GitHub:** https://github.com/RafaXzaviero/NewPorto-rafa

## Kontak jika butuh bantuan:
- Dokumentasi Laravel: https://laravel.com/docs
- Coolify Docs: https://coolify.io/docs

