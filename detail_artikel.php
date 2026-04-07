<?php
session_start();
include "koneksi.php";

$id = $_GET['id_artikel'];

$data = mysqli_query($conn,"SELECT * FROM artikel WHERE id_artikel='$id'");
$d = mysqli_fetch_assoc($data);

$komentar = mysqli_query($conn,"
SELECT komentar.*, users.username 
FROM komentar 
JOIN users ON komentar.id_user=users.id_user
WHERE id_artikel='$id' ORDER BY id_komentar DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Detail Artikel</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:linear-gradient(120deg,#e0f2fe,#f8fafc);
    color:#1e293b;
    padding-top:90px;
}

/* NAVBAR (SAMA KAYAK INDEX) */
.navbar{
    position:fixed;
    top:0;
    width:100%;
    height:70px;
    backdrop-filter:blur(10px);
    background:rgba(255,255,255,0.7);
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 50px;
    box-shadow:0 8px 30px rgba(0,0,0,0.05);
    z-index:999;
}

.logo{
    font-size:22px;
    font-weight:600;
}

.navbar a{
    margin-left:10px;
    padding:8px 15px;
    border-radius:20px;
    text-decoration:none;
    background:#0ea5e9;
    color:white;
}

/* CONTAINER */
.container{
    width:75%;
    margin:auto;
}

/* ARTIKEL */
.article{
    background:rgba(255,255,255,0.75);
    backdrop-filter:blur(12px);
    border-radius:20px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
    margin-bottom:30px;
}

.article h2{
    font-size:30px;
    margin-bottom:10px;
}

.meta{
    font-size:13px;
    color:#64748b;
    margin-bottom:20px;
}

.article img{
    width:100%;
    border-radius:15px;
    margin-bottom:20px;
}

.article p{
    line-height:1.8;
    color:#334155;
}

/* KOMENTAR */
.comment-box{
    background:rgba(255,255,255,0.75);
    backdrop-filter:blur(12px);
    border-radius:20px;
    padding:30px;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

.comment-box h3{
    margin-bottom:15px;
}

/* ITEM KOMENTAR */
.comment{
    background:white;
    border-radius:15px;
    padding:12px 15px;
    margin-bottom:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.comment b{
    color:#0ea5e9;
}

/* FORM */
textarea{
    width:100%;
    padding:12px;
    border-radius:12px;
    border:1px solid #ccc;
    margin-top:10px;
}

.btn{
    margin-top:10px;
    padding:10px 20px;
    border:none;
    border-radius:25px;
    background:#0ea5e9;
    color:white;
    cursor:pointer;
}

/* ALERT LOGIN */
.login-alert{
    margin-top:15px;
    padding:15px;
    background:#f1f5f9;
    border-radius:10px;
}

</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">BlogKu</div>
    <div>
        <a href="index.php">Home</a>
        <?php if(isset($_SESSION['user'])){ ?>
            <a href="logout.php">Logout</a>
        <?php }else{ ?>
            <a href="login.php">Login</a>
        <?php } ?>
    </div>
</div>

<div class="container">

<!-- ARTIKEL -->
<div class="article">
    <h2><?= $d['judul']; ?></h2>

    <div class="meta">
        Dipublikasikan pada <?= $d['tanggal']; ?>
    </div>

    <?php if($d['gambar'] != ""){ ?>
        <img src="assets/img/<?= $d['gambar']; ?>">
    <?php } ?>

    <p><?= nl2br($d['isi']); ?></p>
</div>

<!-- KOMENTAR -->
<div class="comment-box">
    <h3>Komentar</h3>

    <?php if(mysqli_num_rows($komentar) == 0){ ?>
        <p>Belum ada komentar 😶</p>
    <?php } ?>

    <?php while($k = mysqli_fetch_assoc($komentar)){ ?>
        <div class="comment">
            <b><?= $k['username']; ?></b>
            <p><?= $k['komentar']; ?></p>
        </div>
    <?php } ?>

    <!-- LOGIN CHECK -->
    <?php if(!isset($_SESSION['user'])){ ?>
        <div class="login-alert">
            🔒 Login dulu untuk komentar <br><br>
            <a href="login.php" class="btn">Login</a>
        </div>
    <?php }else{ ?>
        <form action="simpan_komentar.php" method="POST">
            <input type="hidden" name="id_artikel" value="<?= $id_artikel ?>">
            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">

            <textarea name="komentar" placeholder="Tulis komentar..." required></textarea>
            <button class="btn">Kirim</button>
        </form>
    <?php } ?>

</div>

</div>

</body>
</html> 