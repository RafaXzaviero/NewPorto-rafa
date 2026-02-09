# 🚀 Deploy ke InfinityFree - Rafael Portfolio

## ✅ Status: SUDAH SIAP!

Semua konfigurasi sudah dibuat. Anda tinggal upload ke InfinityFree.

---

## 📋 Checklist Sebelum Upload

- [x] Database SQLite sudah dibuat (`database/database.sqlite`)
- [x] File `.htaccess` sudah siap untuk shared hosting
- [x] Panduan deploy sudah lengkap

---

## 📝 Langkah-langkah Upload ke InfinityFree

### 1. Persiapan File
Upload SEMUA file project ini ke InfinityFree, KECUALI:
- ❌ `node_modules/` (folder besar, tidak perlu)
- ❌ `.git/` (folder git, tidak perlu)
- ❌ `tests/` (opsional, untuk testing saja)

### 2. Setup Environment di Lokal (SEBELUM UPLOAD)

**Edit file `.env` di lokal Anda:**

```env
APP_NAME="Rafael Portfolio"
APP_ENV=production
APP_KEY=base64:l7wX8BrVWGr5ECXyJv3wn3vRximVBo8JzCSKBRPjNcw=
APP_DEBUG=false
APP_URL=https://rafael-portofolio.free.nf

# DATABASE - SQLITE (File-based, tidak perlu MySQL)
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
DB_FOREIGN_KEYS=true

# CACHE & SESSION (File-based untuk shared hosting)
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

# QUEUE (Sync untuk shared hosting)
QUEUE_CONNECTION=sync
```

### 3. Jalankan Migrasi (SEBELUM UPLOAD)

```bash
php artisan migrate --force
```

### 4. Upload ke InfinityFree

1. **Login** ke https://infinityfree.net
2. **Create Account** → pilih subdomain `rafael-portofolio.free.nf`
3. **File Manager** → upload semua file project ke `htdocs/`

**Struktur folder yang harus ada:**
```
htdocs/
├── app/
├── bootstrap/
├── config/
├── database/
│   └── database.sqlite  ← penting!
├── public/
├── resources/
├── routes/
├── storage/
├── vendor/           ← upload atau install composer
├── .env              ← sudah dikonfigurasi untuk production
├── .htaccess
└── ...
```

### 5. Set Permissions (PENTING!)

Di File Manager InfinityFree, klik kanan folder dan set permission:
- `database/` → **775**
- `storage/` → **775**
- `bootstrap/cache/` → **775**

### 6. Install Dependencies (Jika vendor/ tidak diupload)

Buat file `install.php` di root:
```php
<?php
exec('composer install --no-dev --optimize-autoloader 2>&1', $output);
echo "<pre>";
print_r($output);
echo "</pre>";
?>
```

Akses via browser: `https://rafael-portofolio.free.nf/install.php`

### 7. Selesai! 🎉

Akses website Anda:
**https://rafael-portofolio.free.nf**

---

## 🔧 Troubleshooting

| Error | Solusi |
|-------|--------|
| Database not found | Pastikan `database/database.sqlite` ada dan permission 775 |
| 404 Not Found | Pastikan `.htaccess` di-upload |
| Permission denied | Set permission 775 untuk database/, storage/, bootstrap/cache/ |
| White screen | Check error log di `storage/logs/laravel.log` |

---

## 📞 Butuh Bantuan?

Lihat panduan lengkap di: `DEPLOYMENT-GUIDE.md`

---

**Domain Anda:** https://rafael-portofolio.free.nf
**Status:** Ready to deploy! 🚀
