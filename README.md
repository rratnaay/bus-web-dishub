# BIS Hub

Sistem informasi rute bus untuk Dinas Perhubungan, dibangun dengan Laravel 12, Blade, MySQL, Tailwind CSS CDN, Leaflet/OpenStreetMap, dan AOS.

## Menjalankan proyek

1. Buat database MySQL bernama `bis_hub`, lalu sesuaikan kredensial pada `.env`.
2. Jalankan `php artisan key:generate` bila `APP_KEY` belum terisi.
3. Jalankan `php artisan migrate --seed`.
4. Jalankan `php artisan serve`, lalu buka `http://127.0.0.1:8000`.

Admin contoh: `admin@dishub.test` / `password`.

## Struktur inti

- `app/Models`: Bus, Stop, Route, Schedule dan relasi Eloquent.
- `app/Http/Controllers/Admin`: resource controller CRUD.
- `database/migrations`: skema MySQL termasuk pivot `route_stop`.
- `database/seeders`: data bus dan halte demonstrasi.
- `resources/views/components`: layout dan komponen Blade reusable.
- `resources/views/admin`: halaman dashboard CRUD.
