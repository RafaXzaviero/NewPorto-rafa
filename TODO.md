# TODO - Deploy ke InfinityFree dengan SQLite

## Progress:
- [ ] 1. Buat file database.sqlite
- [ ] 2. Update konfigurasi .env untuk SQLite production
- [ ] 3. Buat file .htaccess untuk shared hosting
- [ ] 4. Update DEPLOYMENT-GUIDE.md dengan panduan InfinityFree
- [ ] 5. Jalankan migrasi untuk SQLite
- [ ] 6. Verifikasi konfigurasi

## Langkah-langkah Deploy ke InfinityFree:

### Step 1: Persiapan Database SQLite
- [ ] Buat file database/database.sqlite
- [ ] Pastikan folder database writable (chmod 775)

### Step 2: Konfigurasi Environment
- [ ] Update .env file:
  - DB_CONNECTION=sqlite
  - DB_DATABASE=database/database.sqlite
  - APP_ENV=production
  - APP_DEBUG=false

### Step 3: Shared Hosting Setup
- [ ] Buat .htaccess di root folder
- [ ] Redirect semua traffic ke public/index.php

### Step 4: Dokumentasi
- [ ] Update DEPLOYMENT-GUIDE.md dengan langkah-langkah InfinityFree
