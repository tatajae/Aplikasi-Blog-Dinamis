<?php
session_start();
include "koneksi.php";

// Ambil id_artikel dari URL
$id_artikel = isset($_GET['id_artikel']) ? intval($_GET['id_artikel']) : 0;

// Ambil data artikel
$artikelQuery = mysqli_query($conn, "SELECT a.*, k.nama_kategori AS kategori 
                                     FROM artikel a 
                                     LEFT JOIN kategori k ON a.id_kategori = k.id_kategori
                                     WHERE a.id_artikel = $id_artikel");
$artikel = mysqli_fetch_assoc($artikelQuery);

// Ambil komentar
$komentarQuery = mysqli_query($conn, "
    SELECT c.*, u.username 
    FROM komentar c 
    LEFT JOIN users u ON c.id_user = u.id_user
    WHERE c.id_artikel = $id_artikel
    ORDER BY c.id_komentar DESC
");

// Proses kirim komentar
if(isset($_POST['kirim'])){
    if(!isset($_SESSION['id_user'])){
        echo "<script>alert('Login dulu!');window.location='login.php';</script>";
        exit;
    }

    $isi = mysqli_real_escape_string($conn, $_POST['komentar']);
    $id_user = $_SESSION['id_user'];

    mysqli_query($conn, "INSERT INTO komentar(id_artikel, id_user, komentar, tanggal) 
                         VALUES($id_artikel, $id_user, '$isi', NOW())");

    // Redirect agar form tidak double submit
    header("Location: komentar.php?id_artikel=$id_artikel");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Komentar Artikel</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
body{ font-family:'Poppins',sans-serif; margin:0; background:linear-gradient(120deg,#e0f2fe,#f8fafc); }
.navbar{ position:fixed; width:100%; height:70px; background:rgba(255,255,255,0.7); backdrop-filter:blur(10px); display:flex; align-items:center; padding:0 30px; z-index:10; }
.navbar b{ font-size:20px; }
.container{ padding:100px 20px; max-width:800px; margin:auto; }
.artikel{ background:white; padding:20px; border-radius:20px; margin-bottom:20px; box-shadow:0 10px 25px rgba(0,0,0,0.08); }
.chat{ background:rgba(255,255,255,0.7); padding:15px; border-radius:15px; margin-bottom:10px; box-shadow:0 5px 15px rgba(0,0,0,0.05); }
.chat b{ color:#0ea5e9; }
.chat small{ color:#64748b; }
.form{ margin-top:20px; background:white; padding:15px; border-radius:15px; }
textarea{ width:100%; padding:10px; border-radius:10px; border:1px solid #ddd; }
button{ margin-top:10px; padding:10px 20px; border:none; border-radius:20px; background:#0ea5e9; color:white; cursor:pointer; }
.login-info{ background:#fef3c7; padding:10px; border-radius:10px; margin-top:10px; text-align:center; }
.login-info a{ text-decoration:none; color:#0ea5e9; font-weight:bold; margin:0 5px; }
</style>
</head>
<body>

<div class="navbar">
    <b>💬 Komentar Artikel</b>
</div>

<div class="container">

<!-- Tampilkan Artikel -->
<?php if($artikel): ?>
<div class="artikel">
    <h2><?= htmlspecialchars($artikel['judul']); ?></h2>
    <p><?= htmlspecialchars(substr($artikel['isi'],0,300)); ?>...</p>
    <?php if($artikel['kategori'] != ""): ?>
        <p><b>Kategori:</b> <?= htmlspecialchars($artikel['kategori']); ?></p>
    <?php endif; ?>
</div>
<?php else: ?>
<p>Artikel tidak ditemukan.</p>
<?php endif; ?>

<!-- Tampilkan Komentar -->
<h3>Komentar</h3>
<?php if(mysqli_num_rows($komentarQuery) > 0): ?>
    <?php while($k = mysqli_fetch_assoc($komentarQuery)): ?>
        <div class="chat">
            <b><?= htmlspecialchars($k['username'] ?? 'Guest'); ?></b><br>
            <small><?= htmlspecialchars($k['tanggal']); ?></small>
            <p><?= htmlspecialchars($k['komentar']); ?></p>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Belum ada komentar.</p>
<?php endif; ?>

<!-- Form Kirim Komentar -->
<div class="form">
<?php if(!isset($_SESSION['id_user'])): ?>
    <div class="login-info">
        Login dulu untuk komentar <br>
        <a href="login.php">Login</a> / <a href="daftar.php">Daftar</a>
    </div>
<?php else: ?>
<form method="POST" action="simpan_komentar.php">
    <input type="hidden" name="id_artikel" value="<?= $id_artikel; ?>">
    <textarea name="komentar" placeholder="Tulis komentar..." required></textarea>
    <button name="kirim">Kirim</button>
</form>
<?php endif; ?>
</div>

</div>
</body>
</html>