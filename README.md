# 🏛️ Diskominfo Kabupaten Pemalang - Website Resmi

Website resmi Dinas Komunikasi dan Informatika Kabupaten Pemalang yang dibangun dengan Laravel 11, dilengkapi dengan sistem manajemen konten (CMS), Role-Based Access Control (RBAC), dan RESTful API.

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3+-blue?style=flat-square&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange?style=flat-square&logo=mysql)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=flat-square&logo=tailwind-css)

---

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Penggunaan](#-penggunaan)
- [API Documentation](#-api-documentation)
- [Database Schema](#-database-schema)
- [Testing](#-testing)
- [Deployment](#-deployment)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)

---

## ✨ Fitur Utama

### 🔐 Role-Based Access Control (RBAC)
- **4 Role Berbeda**: Super Admin, Admin, Editor, Viewer
- **32 Permission Granular**: Kontrol akses detail untuk setiap modul
- **Middleware Protection**: Route protection dengan role dan permission

### 📰 Manajemen Konten
- **Berita**: Publikasi berita dengan status draft/published, tags, dan gambar
- **Layanan Publik**: Showcase layanan digital dengan icon dan link
- **FAQ**: Sistem tanya jawab dengan status pending/answered
- **Dokumen SAKIP**: Upload dan manajemen dokumen SAKIP berdasarkan tahun dan jenis

### 🔌 RESTful API
- **API Versioning**: v1 dengan struktur yang scalable
- **Laravel Sanctum**: Token-based authentication
- **Resource Transformers**: Consistent JSON response format
- **Rate Limiting**: Protection untuk API endpoints

### ⚡ Performance Optimization
- **Database Indexing**: 18 indexes untuk query optimization
- **Selective Column Loading**: Hanya load kolom yang diperlukan
- **Eager Loading**: Prevent N+1 query problems

### 🎨 Modern UI/UX
- **Responsive Design**: Mobile-first approach dengan TailwindCSS
- **Interactive Components**: Slider, cards, hover effects
- **Clean Admin Dashboard**: User-friendly interface untuk manajemen konten

---

## 🛠️ Teknologi

### Backend
- **Framework**: Laravel 11.x
- **PHP**: 8.3+
- **Database**: MySQL 8.0+
- **Authentication**: Laravel Breeze + Sanctum

### Frontend
- **CSS Framework**: TailwindCSS 3.x
- **JavaScript**: Vanilla JS (no framework)
- **Icons**: Heroicons (SVG)

### Development Tools
- **Package Manager**: Composer, NPM
- **Testing**: PHPUnit, Pest
- **Code Quality**: Laravel Pint

---

## 📦 Persyaratan Sistem

- PHP >= 8.3
- Composer >= 2.0
- Node.js >= 18.x
- NPM >= 9.x
- MySQL >= 8.0
- Apache/Nginx Web Server

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/alpaenf/si.git
cd laravel-project
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Configuration

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=diskominfo_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Database Migration & Seeding

```bash
# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed

# Or run both at once
php artisan migrate:fresh --seed
```

### 6. Storage Link

```bash
php artisan storage:link
```

### 7. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Run Development Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://127.0.0.1:8000`

---

## ⚙️ Konfigurasi

### Default Users

Setelah seeding, Anda dapat login dengan akun berikut:

| Role | Email | Password |
|------|-------|----------|
| Super Admin | superadmin@diskominfo.go.id | password |
| Admin | admin@diskominfo.go.id | password |
| Editor | editor@diskominfo.go.id | password |
| Viewer | viewer@diskominfo.go.id | password |

### Roles & Permissions

**Super Admin:**
- Full access ke semua modul
- Dapat manage users dan roles

**Admin:**
- Manage semua konten (berita, layanan, FAQ, dokumen)
- Tidak dapat manage users

**Editor:**
- Create dan edit konten
- Tidak dapat delete

**Viewer:**
- Read-only access
- Hanya dapat melihat konten

---

## 📖 Penggunaan

### Admin Dashboard

Akses admin dashboard di: `http://localhost:8000/dashboard`

**Menu yang Tersedia:**
- **Dashboard**: Overview statistik
- **Berita**: CRUD berita dengan status dan tags
- **Dokumen SAKIP**: Upload dan manage dokumen
- **Layanan**: Manage layanan publik
- **FAQ**: Kelola pertanyaan dan jawaban
- **Profile**: Update informasi profile

### Public Pages

- **Home**: `/` - Halaman utama dengan berita dan layanan
- **Berita**: `/berita` - Daftar semua berita published
- **Profil**: `/profil` - Informasi profil dinas
- **Layanan**: `/layanan` - Daftar layanan publik
- **SAKIP**: `/sakip` - Dokumen SAKIP
- **FAQ**: `/faq` - Tanya jawab dan submit pertanyaan

---

## 🔌 API Documentation

### Base URL

```
http://localhost:8000/api/v1
```

### Authentication

API menggunakan Laravel Sanctum untuk authentication. Untuk mengakses protected endpoints, sertakan token di header:

```
Authorization: Bearer {your-token}
```

### Public Endpoints

#### Register
```http
POST /api/v1/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

#### Login
```http
POST /api/v1/login
Content-Type: application/json

{
  "email": "john@example.com",
  "password": "password123"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "user": { ... },
    "access_token": "1|abc123...",
    "token_type": "Bearer"
  }
}
```

#### Get Berita
```http
GET /api/v1/berita?page=1&per_page=10&search=keyword&status=published
```

#### Get Layanan
```http
GET /api/v1/layanan
```

### Protected Endpoints

Memerlukan authentication token:

#### Logout
```http
POST /api/v1/logout
Authorization: Bearer {token}
```

#### Create Berita
```http
POST /api/v1/berita
Authorization: Bearer {token}
Content-Type: application/json

{
  "judul": "Judul Berita",
  "deskripsi": "Deskripsi berita...",
  "tanggal": "2025-11-29",
  "tags": ["teknologi", "inovasi"],
  "status": "published"
}
```

**Permission Required:** `berita.create`

### Response Format

**Success:**
```json
{
  "success": true,
  "data": { ... },
  "meta": {
    "current_page": 1,
    "last_page": 5,
    "per_page": 15,
    "total": 75
  }
}
```

**Error:**
```json
{
  "success": false,
  "message": "Error message",
  "errors": { ... }
}
```

---

## 🗄️ Database Schema

Lihat file [DATABASE_ERD.md](DATABASE_ERD.md) untuk Entity Relationship Diagram lengkap.

**Tabel Utama:**
- `users` - Data pengguna dengan RBAC
- `roles` - Role (Super Admin, Admin, Editor, Viewer)
- `permissions` - Permission granular
- `berita` - Artikel berita
- `layanan` - Layanan publik
- `faq` - Pertanyaan dan jawaban
- `dokumen_sakip` - Dokumen SAKIP

---

## 🧪 Testing

### Run All Tests

```bash
php artisan test
```

### Run Specific Test

```bash
# RBAC Tests
php artisan test --filter=RolePermissionTest

# API Tests
php artisan test --filter=AuthTest
```

### Test Coverage

```bash
php artisan test --coverage
```

---

## 🚢 Deployment

### Production Checklist

- [ ] Set `APP_ENV=production` di `.env`
- [ ] Set `APP_DEBUG=false` di `.env`
- [ ] Generate production key: `php artisan key:generate`
- [ ] Optimize configuration: `php artisan config:cache`
- [ ] Optimize routes: `php artisan route:cache`
- [ ] Optimize views: `php artisan view:cache`
- [ ] Build production assets: `npm run build`
- [ ] Set proper file permissions
- [ ] Configure web server (Apache/Nginx)
- [ ] Setup SSL certificate
- [ ] Configure database backup
- [ ] Setup monitoring & logging

### Server Requirements

- PHP 8.3+ with extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
- MySQL 8.0+
- Composer
- Node.js & NPM (untuk build assets)

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan ikuti langkah berikut:

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

---

## 📝 Changelog

### Version 1.0.0 (2025-11-29)

**Added:**
- ✅ Role-Based Access Control (RBAC) system
- ✅ RESTful API with Sanctum authentication
- ✅ Berita management with status and tags
- ✅ Layanan publik showcase
- ✅ FAQ system with admin approval
- ✅ Dokumen SAKIP management
- ✅ Database indexing for performance
- ✅ Comprehensive testing suite
- ✅ Modern responsive UI with TailwindCSS

**Fixed:**
- ✅ FAQ submission error (nullable jawaban field)
- ✅ Berita display limit on homepage
- ✅ Admin sidebar spacing

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

## 👥 Tim Pengembang

**Diskominfo Kabupaten Pemalang**
- Website: [https://diskominfo.pemalangkab.go.id](https://diskominfo.pemalangkab.go.id)
- Email: diskominfo@pemalangkab.go.id
- Telepon: (0284) 321234

---

## 📞 Support

Jika Anda menemukan bug atau memiliki pertanyaan, silakan:
- Buat [Issue](https://github.com/alpaenf/si/issues) di GitHub
- Email ke: diskominfo@pemalangkab.go.id

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [TailwindCSS](https://tailwindcss.com) - CSS Framework
- [Heroicons](https://heroicons.com) - Beautiful SVG icons
- [Laravel Breeze](https://laravel.com/docs/breeze) - Authentication scaffolding
- [Laravel Sanctum](https://laravel.com/docs/sanctum) - API authentication

---

<div align="center">
  <p>Made with ❤️ by Diskominfo Kabupaten Pemalang</p>
  <p>© 2025 Diskominfo Kabupaten Pemalang. All rights reserved.</p>
</div>
