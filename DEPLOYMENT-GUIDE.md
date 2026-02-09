# Deployment Guide - Laravel Portfolio

## 🚀 Deploy ke Vercel (GRATIS!)

Vercel sekarang support PHP/Laravel dengan gratis!

### Langkah 1: Persiapan

1. Buka https://vercel.com
2. Login dengan GitHub (Gratis)
3. Klik "Add New Project"

### Langkah 2: Import Repository

1. Select GitHub repo: `RafaXzaviero/NewPorto-rafa`
2. Klik "Import"

### Langkah 3: Configure Project

```
Framework Preset: ⭐ LARAVEL (BUKAN Vite!)
Build Command: npm run build
Output Directory: public
Install Command: composer install && npm install
```

⚠️ **PENTING:** Vite itu build tool, BUKAN framework. Pilih "Laravel" karena Laravel sudah include Vite!

### Langkah 4: Environment Variables

Klik "Environment Variables" dan tambahkan:

```env
APP_NAME=Rafael Portfolio
APP_ENV=production
APP_KEY=base64:RANDOMSTRINGHERE
APP_DEBUG=false
APP_URL=https://your-project.vercel.app
```

### Langkah 5: Generate APP_KEY

Di terminal lokal:
```bash
php artisan key:generate --show
```
Copy hasil nya ke APP_KEY

### Langkah 6: Deploy

Klik "Deploy"

---

## Repository
**GitHub:** https://github.com/RafaXzaviero/NewPorto-rafa

