<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/1828/1828506.png" width="120" alt="CodColl Logo">
</p>

<h1 align="center">CodColl – Laravel x NuxtJS Blog App</h1>

<p align="center">
  Proyek mini blog menggunakan <strong>Laravel (API Backend)</strong> & <strong>NuxtJS 3 (Frontend)</strong><br>
  dengan fitur CRUD, autentikasi, pagination, dan search.
</p>

<p align="center">
  <a href="https://github.com/dzakifairusfadlurrohman/CodColl/actions"><img src="https://github.com/dzakifairusfadlurrohman/CodColl/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"></a>
</p>

---

## 📚 Fitur

- ✅ CRUD Post (admin login only)
- ✅ RESTful API JSON
- ✅ NuxtJS frontend (list & detail)
- ✅ Search, Pagination, Filter (opsional)
- ✅ CKEditor (Rich Text Editor)
- ✅ Laravel Breeze Auth

---

## ⚙️ Cara Install & Menjalankan

### 🔧 Backend – Laravel

```bash
# Clone repo
git clone https://github.com/dzakifairusfadlurrohman/CodColl.git

# Masuk ke folder backend
cd CodColl/blog-backend

# Install dependency Laravel
composer install

# Copy env dan generate app key
cp .env.example .env
php artisan key:generate

# Migrasi & seed database
php artisan migrate --seed

# Jalankan server lokal
php artisan serve

# Masuk ke folder frontend
cd CodColl/blog-frontend

# Install dependency
npm install

# Jalankan server Nuxt
npm run dev

Akun Admin Demo
Role	Email	Password
Admin	admin@gmail.com	admin123

