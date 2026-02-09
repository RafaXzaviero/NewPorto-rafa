# 🚀 Panduan Deploy ke InfinityFree - Rafael Portfolio

## ✅ Status: SUDAH SIAP!

Semua konfigurasi sudah dibuat. Anda tinggal upload ke InfinityFree.

---

## 📦 File yang Sudah Dibuat

| File | Status | Keterangan |
|------|--------|------------|
| `database/database.sqlite` | ✅ Ready | Database file dengan tabel users, cache, jobs, galleries |
| `.htaccess` | ✅ Ready | Redirect ke folder public untuk shared hosting |
| `.env.infinityfree` | ✅ Ready | Environment production dengan APP_KEY |
| `DEPLOYMENT-GUIDE.md` | ✅ Ready | Panduan lengkap deploy |

---

## 📝 Langkah-langkah Upload ke InfinityFree

### 1. Persiapan File
Upload SEMUA file project ini ke InfinityFree, KECUALI:
- ❌ `node_modules/` (folder besar, tidak perlu)
- ❌ `.git/` (folder git, tidak perlu)
- ❌ `tests/` (opsional, untuk testing saja)

### 2. Upload via File Manager
1. Login ke https://infinityfree.net
2. Buka **File Manager** (vPanel)
3. Upload semua file ke `htdocs/` folder
4. Pastikan struktur folder seperti ini:
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
   ├── vendor/           ← upload atau install via composer
   ├── .env.infinityfree
   ├── .htaccess
   └── ...
   ```

### 3. Setup Environment
1. Di File Manager, rename `.env.infinityfree` → `.env`
2. Edit `.env` jika perlu (sudah dikonfigurasi dengan benar)

### 4. Set Permissions (PENTING!)
Di File Manager, klik kanan folder dan set permission:
- `database/` → **775**
- `storage/` → **775**
- `bootstrap/cache/` → **775**

### 5. Install Composer (Jika vendor/ tidak diupload)

Buat file `install.php` di root:
```php
<?php
exec('composer install --no-dev --optimize-autoloader 2>&1', $output);
echo "<pre>";
print_r($output);
echo "</pre>";
?>
```

Akses: `https://rafael-portofolio.free.nf/install.php`

### 6. Selesai! 🎉

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
