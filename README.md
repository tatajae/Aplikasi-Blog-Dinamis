📝 Sistem Informasi Blog Dinamis Berbasis Web
1. Deskripsi Project

Sistem Informasi Blog Dinamis merupakan aplikasi berbasis web yang digunakan untuk membuat dan mengelola artikel blog secara online. Sistem ini memungkinkan admin atau penulis untuk menambahkan artikel, mengedit konten, menghapus artikel, serta mengelola kategori dan komentar.

Aplikasi ini dibangun menggunakan **PHP dan MySQL** sehingga konten yang ditampilkan pada website dapat berubah secara dinamis sesuai dengan data yang tersimpan di dalam database. Dengan adanya sistem ini, proses publikasi artikel menjadi lebih mudah, cepat, dan terorganisir.
2. Fitur Aplikasi

👤 Manajemen Pengguna
* Login Admin
* Logout
* Manajemen pengguna sistem

📰 Manajemen Artikel

* Tambah artikel
* Edit artikel
* Hapus artikel
* Melihat daftar artikel

📂 Manajemen Kategori

* Menambahkan kategori artikel
* Mengedit kategori
* Menghapus kategori

🏷️ Manajemen Tag

* Menambahkan tag artikel
* Mengedit tag
* Menghapus tag

💬 Komentar Artikel

* Pengunjung dapat memberikan komentar
* Admin dapat mengelola komentar

🌐 Tampilan Blog

* Halaman daftar artikel
* Halaman detail artikel
* Navigasi kategori
* Tampilan artikel terbaru
3. Teknologi yang Digunakan
  
| Teknologi  | Keterangan                 |
| ---------- | -------------------------- |
| PHP        | Bahasa pemrograman backend |
| MySQL      | Database penyimpanan data  |
| HTML       | Struktur halaman website   |
| CSS        | Desain tampilan website    |
| JavaScript | Interaksi halaman          |
4. Struktur Folder Project

Contoh struktur folder aplikasi:

```
Aplikasi-Blog-Dinamis/
│
├── admin/
│   ├── dashboard.php
│   ├── artikel.php
│   ├── tambah_artikel.php
│   ├── edit_artikel.php
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│
├── config/
│   └── koneksi.php
│
├── index.php
├── login.php
├── logout.php
├── detail_artikel.php
└── README.md
```

Struktur folder ini digunakan untuk memisahkan **file tampilan, logika program, dan konfigurasi database** sehingga project lebih mudah dikembangkan dan dipelihara.
5. Cara Instalasi

1️⃣ Clone Repository

```
git clone https://github.com/tatajae/Aplikasi-Blog-Dinamis.git
```
2️⃣ Pindahkan ke Folder XAMPP

Letakkan project di folder:

```
xampp/htdocs/Aplikasi-Blog-Dinamis
```
3️⃣ Import Database

1. Buka **phpMyAdmin**
2. Buat database baru
3. Import file database `.sql`
4️⃣ Jalankan Aplikasi

Buka browser dan akses:

```
http://localhost/Aplikasi-Blog-Dinamis
```

---
6. Tampilan Sistem

Beberapa halaman utama yang tersedia dalam aplikasi ini:

* Halaman Login
* Dashboard Admin
* Halaman Artikel
* Halaman Kategori
* Halaman Tag
* Halaman Blog
* Halaman Detail Artikel
7. Hak Akses User

| Role       | Hak Akses                                      |
| ---------- | ---------------------------------------------- |
| Admin      | Mengelola artikel, kategori, tag, dan komentar |
| Pengunjung | Melihat artikel dan memberikan komentar        |
8. Kontributor

Developer Project:

* Nama : Shinta Agustina (2488010020)
* GitHub : [https://github.com/tatajae](https://github.com/tatajae)
9. Lisensi

Project ini bersifat **open source** dan dapat digunakan serta dikembangkan kembali untuk tujuan pembelajaran.
10. Kesimpulan

Aplikasi Blog Dinamis berbasis web mempermudah proses publikasi dan pengelolaan artikel secara online. Dengan menggunakan teknologi PHP dan MySQL, sistem ini mampu menampilkan konten secara dinamis dan memberikan kemudahan bagi admin dalam mengelola blog.
