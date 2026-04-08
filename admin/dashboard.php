<?php
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

/* Ambil jumlah artikel & user */
$total_artikel = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM artikel");
$total_artikel = mysqli_fetch_assoc($total_artikel);

$total_user = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM users");
$total_user = mysqli_fetch_assoc($total_user);

/* Ambil artikel terbaru */
$data = mysqli_query($conn, "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 3");
?>


<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #f4f6f9;
}

/* NAVBAR */
.navbar {
    position: fixed;
    width: 100%;
    padding: 20px 60px;
    display: flex;
    justify-content: space-between; /* logo kiri, menu kanan */
    align-items: center;
    background: linear-gradient(90deg, #e5e7eb, rgb(56, 189, 248));
    backdrop-filter: blur(10px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.logo {
    font-weight: 600;
    color: #1e293b;
    font-size: 22px;
}

.nav-menu {
    display: flex;
    align-items: center;
    gap: 20px; /* jarak antar menu */
}

/* kiri */
.nav-left {
    display: flex;
    align-items: center;
    gap: 10px; /* jarak antar link kiri */
}

/* kanan */
.nav-right {
    display: flex;
    align-items: center;
}

/* link kiri biasa */
.nav-left a {
    text-decoration: none;
    font-weight: 500;
    color: #1e293b;
    padding: 5px 10px;
    transition: 0.3s;
}

.nav-left a:hover {
    color: white;
}

/* dropdown */
.nav-left .dropdown {
    position: relative;
}

.nav-left .dropdown a {
    cursor: pointer;
}

.nav-left .dropdown .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    display: none;
    padding: 5px 0;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    min-width: 150px;
    z-index: 10;
}

.nav-left .dropdown .dropdown-menu li {
    list-style: none;
}

.nav-left .dropdown .dropdown-menu li a {
    display: block;
    padding: 5px 10px;
    color: #1e293b;
    text-decoration: none;
}

.nav-left .dropdown .dropdown-menu li a:hover {
    background: #0d6efd;
    color: white;
}

.nav-left .dropdown:hover .dropdown-menu {
    display: block;
}

/* Tombol Logout versi awal */
.nav-right a {
    background: white;      /* putih */
    color: #0d6efd;         /* biru */
    padding: 8px 18px;      /* ruang di dalam tombol */
    border-radius: 25px;    /* bulat */
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
}

.nav-right a:hover {
    background: rgb(13, 110, 253);    /* biru saat hover */
    color: white;           /* teks putih saat hover */
    box-shadow: 0 5px 15px rgba(13,110,253,0.4);
}

/* HERO */
.hero {
    height: 60vh;
    background: linear-gradient(rgb(56, 189, 248), rgba(0,0,0,0.6)),
                url('../assets/img/jamal.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    padding: 140px 60px;
}

.hero h1 {
    font-size: 45px;
}

.hero p {
    margin-top: 10px;
}

/* STATS */
.stats {
    display: flex;
    justify-content: center;
    margin-top: -50px;
}

.stat-box {
    background: white;
    padding: 25px;
    border-radius: 15px;
    margin: 10px;
    width: 220px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.stat-box h2 {
    font-size: 30px;
    color: #0d6efd;
}

/* CONTENT */
.content {
    padding: 60px;
}

.content h2 {
    margin-bottom: 20px;
}

/* CARDS */
.cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.card {
    width: 280px;
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-10px);
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.card-body h3 {
    font-size: 16px;
    margin-bottom: 8px;
}

.card-body p {
    font-size: 13px;
    color: gray;
}

.btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 15px;
    background: #0d6efd;
    color: white;
    text-decoration: none;
    border-radius: 20px;
    transition: 0.3s;
}

.btn:hover {
    background: #0b5ed7;
}
</style>
</head>

<body>
<!-- NAVBAR -->
<div class="navbar">
    <h2 class="logo">Dashboard</h2>

    <div class="nav-menu">
        <div class="nav-left">
            <a href="index.php">Dashboard</a>
            <a href="?menu=artikel">Artikel</a>

            <!-- Dropdown Kategori & Tag -->
            <div class="dropdown">
                <a href="#">Kategori & Tag ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="?menu=kategori">Kategori</a></li>
                    <li><a href="?menu=tag">Tag</a></li>
                    <li><a href="?menu=komentar">Komentar</a></li>                    
                </ul>
            </div>

            <a href="?menu=pengguna">Pengguna</a>
            <a href="?menu=laporan_statistik">Laporan Statistik</a>
        </div>

        <div class="nav-right">
            <a href="../logout.php">Logout</a>
        </div>
    </div>
</div>

<?php
include "menu.php";
?>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
include "footer.php";
?>

</body>
</html>