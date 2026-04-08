<?php
include 'koneksi.php';

// proteksi halaman
if(!isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

$id_user = $_SESSION['id_user'];

/* Ambil jumlah artikel milik penulis */
$total_artikel = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM artikel WHERE id_user='$id_user'");
$total_artikel = mysqli_fetch_assoc($total_artikel);

/* Ambil artikel terbaru milik penulis */
$data = mysqli_query($conn, "SELECT * FROM artikel WHERE id_user='$id_user' ORDER BY id_artikel DESC LIMIT 3");
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Author</title>
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
    padding: 10px 20px;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index:999;
    background: linear-gradient(90deg, #e5e7eb, rgb(56, 189, 248));
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
    gap: 20px;
}

.nav-left {
    display: flex;
    gap: 15px;
}

.nav-left a {
    text-decoration: none;
    color: #1e293b;
    font-weight: 500;
}

.nav-left a:hover {
    color: white;
}

.nav-right a {
    background: white;
    color: #0d6efd;
    padding: 8px 18px;
    border-radius: 25px;
    text-decoration: none;
}

.nav-right a:hover {
    background: #0d6efd;
    color: white;
}

/* HERO */
.hero {
    height: 60vh;
    background: linear-gradient(rgb(56, 189, 248), rgba(0,0,0,0.6)),
                url('../assets/img/jamal.jpg');
    background-size: cover;
    color: white;
    padding: 140px 60px;
}

.hero h1 {
    font-size: 40px;
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
    color: #0d6efd;
}

/* CONTENT */
.content {
    padding: 60px;
}

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
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 15px;
    background: #0d6efd;
    color: white;
    text-decoration: none;
    border-radius: 20px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2 class="logo">Author Panel</h2>

    <div class="nav-menu">
        <div class="nav-left">
            <a href="index.php">Dashboard</a>
            <a href="?menu=artikel">Artikel Saya</a>
            <a href="?menu=komentar">Komentar</a>
        </div>

        <div class="nav-right">
            <a href="logout.php">Logout</a>
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