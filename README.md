# 🚀 Proyek-3: Pengembangan Aplikasi Web Dinamis

Proyek ini merupakan implementasi pengembangan aplikasi web yang dibangun dari awal menggunakan PHP dan framework CodeIgniter 4. Tujuannya adalah untuk menciptakan sebuah sistem yang fungsional, aman, dan dapat dikelola dengan mudah.

Aplikasi ini mencakup fitur-fitur fundamental dalam pengembangan web modern, seperti:
- **Manajemen Data (CRUD)**: Fungsionalitas penuh untuk *Create*, *Read*, *Update*, dan *Delete*.
- **Sistem Autentikasi**: Mekanisme login dan logout untuk memverifikasi identitas pengguna.
- **Sistem Otorisasi**: Pembatasan hak akses berdasarkan peran pengguna (*Role-Based Access Control*).

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP 8.2
- **Framework**: CodeIgniter 4.6.3
- **Database**: MySQL (via MariaDB)
- **Web Server**: Apache (via XAMPP)

---

## 📊 Spesifikasi Database

Aplikasi ini menggunakan **MySQL** sebagai sistem manajemen basis data.

- **Nama Database**: `akademik_db`
- **Tabel Utama**:
    - `users`: Menyimpan kredensial dan peran pengguna.
    - `mahasiswa`: Menyimpan data profil mahasiswa.
    - `courses`: Menyimpan data mata kuliah.
    - `takes`: Tabel relasi untuk fitur pendaftaran mata kuliah.

---

## ⚙️ Cara Menjalankan Program

1.  **Clone Repositori**
    ```bash
    git clone [URL_GITHUB_ANDA]
    ```
2.  **Setup Database**
    -   Buat database baru bernama `akademik_db` di phpMyAdmin.
    -   Impor file `database/akademik_db.sql` yang ada di dalam repositori ini.

3.  **Konfigurasi Environment**
    -   Salin file `env` menjadi `.env`.
    -   Buka file `.env` dan sesuaikan konfigurasi database dengan pengaturan XAMPP Anda.

4.  **Jalankan Server**
    -   Buka terminal di dalam direktori proyek.
    -   Jalankan perintah berikut:
        ```bash
        php spark serve
        ```
    -   Aplikasi siap diakses di `http://localhost:8080`.

---

## 📝 Akun untuk Uji Coba

-   **Admin**:
    -   Username: `admin`
    -   Password: `password123`
-   **Mahasiswa**:
    -   Username: `mahasiswa1`
    -   Password: `mahasiswa123`
