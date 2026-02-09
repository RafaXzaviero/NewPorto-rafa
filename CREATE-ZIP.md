# 📦 Cara Membuat ZIP untuk Upload ke InfinityFree

## 🚀 Cara Cepat (Rekomendasi)

### Step 1: Siapkan Environment Production

**Edit file `.env` di lokal Anda:**

```env
APP_NAME="Rafael Portfolio"
APP_ENV=production
APP_KEY=base64:l7wX8BrVWGr5ECXyJv3wn3vRximVBo8JzCSKBRPjNcw=
APP_DEBUG=false
APP_URL=https://rafael-portofolio.free.nf

# DATABASE - SQLITE
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
DB_FOREIGN_KEYS=true

# CACHE & SESSION
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

# QUEUE
QUEUE_CONNECTION=sync
```

### Step 2: Jalankan Migrasi

```bash
php artisan migrate --force
```

### Step 3: Buat ZIP File

**Pilihan A: ZIP dengan Vendor (Lebih Besar tapi Langsung Jalan)**

```bash
zip -r portfolio-infinityfree.zip . \
  -x "node_modules/*" \
  -x ".git/*" \
  -x "tests/*" \
  -x "*.log" \
  -x ".DS_Store" \
  -x "portfolio-infinityfree.zip"
```

**Pilihan B: ZIP tanpa Vendor (Lebih Kecil, Install Composer di Hosting)**

```bash
zip -r portfolio-infinityfree.zip . \
  -x "node_modules/*" \
  -x "vendor/*" \
  -x ".git/*" \
  -x "tests/*" \
  -x "*.log" \
  -x ".DS_Store" \
  -x "portfolio-infinityfree.zip"
```

### Step 4: Upload ke InfinityFree

1. **Login** ke https://infinityfree.net
2. **File Manager** → **Upload** → pilih `portfolio-infinityfree.zip`
3. **Extract** ZIP di File Manager
4. **Selesai!** Langsung akses website

> **Note:** Jika ada error permission, bisa set permission 775 untuk folder `database/`, `storage/`, dan `bootstrap/cache/` di File Manager.

### Step 5: Install Composer (Jika ZIP tanpa Vendor)

Buat file `install.php`:
```php
<?php
exec('composer install --no-dev --optimize-autoloader 2>&1', $output);
echo "<pre>";
print_r($output);
echo "</pre>";
?>
```

Akses: `https://rafael-portofolio.free.nf/install.php`

### Step 6: Selesai! 🎉

Akses: **https://rafael-portofolio.free.nf**

---

## 📋 Checklist File dalam ZIP

✅ `app/` - Folder aplikasi Laravel  
✅ `bootstrap/` - Folder bootstrap  
✅ `config/` - Konfigurasi Laravel  
✅ `database/` - Termasuk `database.sqlite`  
✅ `public/` - Folder public  
✅ `resources/` - Views, CSS, JS  
✅ `routes/` - Route definitions  
✅ `storage/` - Folder storage  
✅ `vendor/` - Dependencies (jika pilih opsi A)  
✅ `.env` - Environment production  
✅ `.htaccess` - Konfigurasi shared hosting  
✅ `artisan` - CLI Laravel  

❌ **Tidak termasuk:** node_modules, .git, tests, file log

---

## 🔧 Troubleshooting

| Error | Solusi |
|-------|--------|
| ZIP terlalu besar | Pilih opsi B (tanpa vendor), install composer di hosting |
| Extract error | Pastikan file ZIP tidak corrupt, coba upload ulang |
| Permission denied | (Opsional) Set permission 775 untuk folder database/, storage/, bootstrap/cache/ di File Manager |
| 404 Not Found | Pastikan `.htaccess` ada di root folder |

---

**Status:** Ready to ZIP and Deploy! 🚀
