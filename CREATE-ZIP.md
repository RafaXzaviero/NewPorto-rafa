# 📦 Cara Membuat ZIP untuk Upload ke InfinityFree

## 🚀 Cara Paling Mudah (Rekomendasi) - Install di Lokal

### Step 1: Install Composer di Terminal VSCode (Lokal)

```bash
composer install --no-dev --optimize-autoloader
```

Ini akan install semua dependency di folder `vendor/`

### Step 2: Siapkan Environment Production

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

### Step 3: Jalankan Migrasi

```bash
php artisan migrate --force
```

### Step 4: Buat ZIP File (Include Vendor)

```bash
zip -r portfolio-infinityfree.zip . \
  -x "node_modules/*" \
  -x ".git/*" \
  -x "tests/*" \
  -x "*.log" \
  -x ".DS_Store" \
  -x "portfolio-infinityfree.zip"
```

> **Note:** Karena sudah install composer di Step 1, folder `vendor/` sudah ada dan akan di-include di ZIP.

### Step 5: Upload ke InfinityFree

1. **Login** ke https://infinityfree.net
2. **File Manager** → **Upload** → pilih `portfolio-infinityfree.zip`
3. **Extract** ZIP di File Manager
4. **Selesai!** Langsung akses website

> **Note:** Jika ada error permission, bisa set permission 775 untuk folder `database/`, `storage/`, dan `bootstrap/cache/` di File Manager.

---

## 🔄 Alternatif: ZIP Tanpa Vendor (Lebih Kecil)

Jika file ZIP terlalu besar dengan vendor:

### Step 1: Buat ZIP Tanpa Vendor

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

### Step 2: Upload & Install Composer di Hosting

**Opsi A: Via Online PHP Shell**
1. Buka **https://www.w3schools.com/php/phptryit.asp?filename=tryphp_compiler**
2. Copy paste kode ini:

```php
<?php
echo "Starting composer install...<br>";
system('cd /home/volXX_XX/epiz_XXXXXX/htdocs && composer install --no-dev --optimize-autoloader 2>&1');
echo "Done!";
?>
```

3. Ganti path dengan folder Anda (lihat di File Manager)

**Opsi B: Via Cron Job**
1. Login vPanel → **Cron Jobs**
2. Tambah command:
```bash
cd /home/volXX_XX/epiz_XXXXXX/htdocs && composer install --no-dev --optimize-autoloader
```
3. Set "Once", save, tunggu 1-2 menit

**Opsi C: Upload Vendor Terpisah**
- ZIP folder `vendor/` terpisah
- Upload via FTP atau File Manager
- Extract di hosting

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
✅ `vendor/` - Dependencies (jika install di lokal)  
✅ `.env` - Environment production  
✅ `.htaccess` - Konfigurasi shared hosting  
✅ `artisan` - CLI Laravel  

❌ **Tidak termasuk:** node_modules, .git, tests, file log

---

## 🔧 Troubleshooting

| Error | Solusi |
|-------|--------|
| ZIP terlalu besar | Pilih alternatif (tanpa vendor), install composer di hosting |
| Extract error | Pastikan file ZIP tidak corrupt, coba upload ulang |
| Permission denied | Set permission 775 untuk folder database/, storage/, bootstrap/cache/ di File Manager |
| 404 Not Found | Pastikan `.htaccess` ada di root folder |

---

## 💡 Tips

- **Selalu install composer di lokal dulu** (cara paling mudah & aman)
- **Jika vendor terlalu besar**, upload terpisah dalam beberapa ZIP
- **Gunakan FTP client** (FileZilla) untuk upload lebih cepat

---

**Status:** Ready to ZIP and Deploy! 🚀
