📝 Aplikasi Blog Dinamis Berbasis Web
1. Deskripsi Project
Aplikasi Blog Dinamis adalah sistem website berbasis web yang digunakan untuk membuat, mengelola, dan menampilkan artikel blog secara online.
Website ini bersifat dinamis, artinya konten yang ditampilkan dapat berubah sesuai dengan data yang tersimpan pada database dan interaksi pengguna. Website dinamis biasanya menggunakan bahasa pemrograman seperti PHP dan database seperti MySQL untuk mengelola data secara real-time.
Aplikasi ini dapat digunakan untuk:
- Membuat artikel
- Mengelola kategori artikel
- Menampilkan artikel kepada pengunjung
- Mengelola pengguna sistem
2. Tujuan Pengembangan
Tujuan dari pembuatan aplikasi ini adalah:
  1. Membuat sistem blog berbasis web
  2. Mempermudah pengelolaan artikel secara online
  3. Memberikan media publikasi informasi melalui website
  4. Mempelajari implementasi CRUD (Create, Read, Update, Delete) menggunakan PHP dan MySQL
3. Fitur Aplikasi
👤 Manajemen User
- Login pengguna
- Logout
- Hak akses pengguna
📰 Manajemen Artikel
- Tambah artikel
- Edit artikel
- Hapus artikel
- Menampilkan daftar artikel
📂 Manajemen Kategori
- Menambahkan kategori
- Mengedit kategori
- Menghapus kategori
💬 Komentar Artikel
- Pengunjung dapat memberikan komentar
- Admin dapat mengelola komentar
🌐 Tampilan Blog
- Halaman daftar artikel
- Halaman detail artikel
- Navigasi kategori
4. Teknologi yang Digunakan
| Teknologi  | Fungsi                    |
| ---------- | ------------------------- |
| PHP        | Backend aplikasi          |
| MySQL      | Database penyimpanan data |
| HTML       | Struktur halaman web      |
| CSS        | Desain tampilan           |
| JavaScript | Interaksi pengguna        |
5. Struktur Folder Project
Aplikasi-Blog-Dinamis/
│
├── admin/
│   ├── dashboard.php
│   ├── artikel.php
│   └── kategori.php
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── config/
│   └── koneksi.php
│
├── database/
│   └── blog.sql
│
├── index.php
├── login.php
├── logout.php
└── README.md
6. Instalasi
  1. Download / Clone Repository
     git clone https://github.com/tatajae/Aplikasi-Blog-Dinamis.git
  2. Pindahkan ke Folder Server
     Masukkan project ke folder:
     xampp/htdocs/Aplikasi-Blog-Dinamis
  3. Import Database
     - Buka phpMyAdmin
     - Buat database baru
     - Import file database .sql
  4. Jalankan Project
     Buka browser dan akses:
     http://localhost/Aplikasi-Blog-Dinamis
7. Hak Akses Pengguna
| Role       | Hak Akses                                 |
| ---------- | ----------------------------------------- |
| Admin      | Mengelola artikel, kategori, dan komentar |
| Pengunjung | Melihat artikel dan memberi komentar      |
8. Tampilan Sistem
Beberapa halaman utama aplikasi:
- Halaman Login
- Dashboard Admin
- Halaman Artikel
- Halaman Kategori
- Halaman Blog
- Halaman Detail Artikel
👤 Pembuat
Shinta Agustina
📌 Catatan
Project ini dibuat untuk keperluan pembelajaran dan tugas kuliah.
