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

**Opsi 1: Via Online PHP Shell (Rekomendasi)**

1. Buka **https://www.w3schools.com/php/phptryit.asp?filename=tryphp_compiler**
2. Copy paste kode ini:

```php
<?php
echo "Starting composer install...<br>";
system('cd /home/volXX_XX/epiz_XXXXXX/htdocs && composer install --no-dev --optimize-autoloader 2>&1');
echo "Done!";
?>
```

3. Ganti `volXX_XX/epiz_XXXXXX` dengan path folder Anda (lihat di File Manager)
4. Klik "Run"

**Opsi 2: Via Cron Job di vPanel**

1. Login ke vPanel InfinityFree
2. Buka **Cron Jobs**
3. Tambah cron job dengan command:
```bash
cd /home/volXX_XX/epiz_XXXXXX/htdocs && composer install --no-dev --optimize-autoloader
```
4. Set "Once" (sekali saja)
5. Save dan tunggu 1-2 menit

**Opsi 3: Upload Vendor Folder Langsung**

Jika semua cara di atas tidak work, upload folder `vendor/` dari lokal ke hosting via FTP atau File Manager (bisa di-ZIP terpisah lalu extract).

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
| "This connection is not private" | Gunakan HTTP (bukan HTTPS) untuk install.php, atau pakai Opsi 2/3 untuk install composer |

---

## 💡 Tips

- **Selalu pilih Opsi A (dengan vendor)** jika tidak mau ribet dengan install composer
- **File vendor bisa di-ZIP terpisah** kalau terlalu besar untuk satu ZIP
- **Gunakan FTP client** (FileZilla) untuk upload lebih cepat daripada File Manager

---

**Status:** Ready to ZIP and Deploy! 🚀
