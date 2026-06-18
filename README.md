# Premium Laravel Web GIS Case Study (MAPID Recruitment)

Aplikasi Web 2 halaman yang menghadirkan profil portofolio profesional dan visualisasi data spasial (GIS) interaktif berbasis MapLibre GL JS tanpa database.

## Tech Stack

- **Backend:** Laravel 11 (PHP 8.2+)
- **Frontend:** Tailwind CSS v3 + Alpine.js v3
- **GIS Engine:** MapLibre GL JS v4 + CARTO Voyager Basemap
- **Build Tool:** Vite
- **Database:** None (Static In-Memory Arrays)

## Fitur Utama

### Halaman 1: Portfolio Premium
- Desain glassmorphism dark theme modern
- SEO-optimized (Meta tags, Open Graph, Twitter Cards, JSON-LD Schema.org)
- 6 portofolio proyek komersial internasional & domestik
- Sertifikasi BNSP & prestasi olahraga
- Mobile-first responsive design

### Halaman 2: Live Map GIS Explorer
- Peta interaktif MapLibre GL JS dengan basemap CARTO Voyager (gratis, tanpa API key)
- 5 marker lokasi kustom dengan popup interaktif
- Visualisasi LineString (jalur navigasi)
- Visualisasi Polygon (zona area cakupan)
- Layer toggle controls dengan Alpine.js
- Navigation controls & scale indicator

## Panduan Instalasi Lokal

1. Clone repositori:
   ```bash
   git clone https://github.com/username/your-repo-name.git
   cd your-repo-name
   ```

2. Jalankan instalasi dependensi:
   ```bash
   composer install --no-dev --optimize-autoloader
   npm install && npm run build
   ```

3. Setup environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Jalankan server lokal:
   ```bash
   php artisan serve
   ```

5. Buka browser: `http://localhost:8000`

## Deployment ke Azure VM

Lihat file `vm_setup_documentation.md` untuk panduan lengkap deployment ke Azure VM Ubuntu Server dengan Nginx, SSL Let's Encrypt, dan domain Namecheap.

## Struktur Proyek

```
├── app/Http/Controllers/
│   ├── HomeController.php      ← Data SEO portofolio
│   └── MapController.php       ← Data spasial in-memory
├── resources/views/
│   ├── layouts/app.blade.php   ← Master layout + navbar + footer
│   ├── home/index.blade.php    ← Portfolio page
│   └── map/index.blade.php     ← Interactive map page
├── resources/css/app.css       ← Tailwind + custom CSS
├── routes/web.php              ← Routes + sitemap generator
└── public/robots.txt           ← SEO crawler config
```

## Lisensi

© 2026 Natanael Adrie Christiawan. All Rights Reserved.
