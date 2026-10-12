<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# FinTrack - Personal Finance Tracker

**FinTrack** adalah aplikasi manajemen keuangan pribadi berbasis web yang dibangun menggunakan framework **Laravel 11**. Aplikasi ini dirancang untuk membantu pengguna mencatat, memantau, dan mengelola arus kas harian (pemasukan dan pengeluaran) secara efisien dengan antarmuka yang intuitif dan mudah digunakan.

---

## Anggota Kelompok
1. **Wahyu Adi Novressa** - `255150707111003`
2. **I Dewa Ayu Puspa Dewi** - `255150700111045`
3. **Fa’iq Fajar Islamay** - `255150707111016`
4. **Syifa Amalia Hariyanti** - `25515070111037`

---

## Panduan Instalasi & Menjalankan Aplikasi

Ikuti langkah-langkah di bawah ini untuk menjalankan project di komputer lokal:

### 1. Ekstrak & Buka Project
- Ekstrak file ZIP/RAR project.
- Buka folder project tersebut menggunakan **VS Code** (`File` -> `Open Folder`).

### 2. Install Dependency
Buka Terminal di VS Code (`Ctrl + ~`), lalu jalankan perintah berikut:
```bash
composer install
```

### 3. Buat File Environment (`.env`)
Masih di terminal, jalankan perintah ini untuk membuat file `.env` dari `.env.example`:
```bash
cp .env.example .env
```

### 4. Generate Application Key
Masih di terminal, jalankan perintah:
```bash
php artisan key:generate
```

### 5. Konfigurasi Database
Buka file `.env` di VS Code, lalu scroll ke bagian database dan pastikan pengaturannya seperti berikut:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=paw_keuangan (Pastikan nama database nya 'paw_keuangan'.)
DB_USERNAME=root
DB_PASSWORD=
```
*(Sesuaikan `DB_PASSWORD` jika MySQL/XAMPP menggunakan password)*.

---

## Import Database MySQL

1. Buka **phpMyAdmin** di browser (`http://localhost/phpmyadmin/`).
2. Buat database baru dengan nama **`paw_keuangan`**.
3. Klik database `paw_keuangan` tersebut, pilih tab **Impor / Import** di bagian atas.
4. Pilih file **`paw_keuangan.sql`** yang ada di folder utama project ini, lalu klik tombol **Import / Go**.

---

## Jalankan Server Local

Setelah database terpasang dan `.env` selesai dikonfigurasi, jalankan perintah ini di terminal:
```bash
php artisan serve
```

Akses aplikasi melalui browser di alamat:  
--> **`http://127.0.0.1:8000`**

### 🔑 Kredensial Akses Demo
- **Email**: `user@fintrack.com`
- **Password**: `password`
