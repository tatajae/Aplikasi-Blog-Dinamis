<?php
session_start();
include "koneksi.php";

// Generate captcha
if(!isset($_SESSION['captcha'])){
    $_SESSION['captcha'] = rand(1000,9999);
}

if(isset($_POST['daftar'])){

    $nama     = mysqli_real_escape_string($conn,$_POST['nama']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email    = mysqli_real_escape_string($conn,$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $captcha  = $_POST['captcha'];

    // Validasi captcha
    if($captcha != $_SESSION['captcha']){
        echo "<script>alert('Captcha salah!');window.location='daftar.php';</script>";
        exit;
    }

    // Cek username sudah ada
    $cek = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Username sudah digunakan!');window.location='daftar.php';</script>";
        exit;
    }

    // Default role
    $role = "pengguna";

    // Simpan ke database
    mysqli_query($conn,"INSERT INTO users(username,password,nama,email,role)
    VALUES('$username','$password','$nama','$email','$role')");

    // Reset captcha
    unset($_SESSION['captcha']);

    echo "<script>alert('Pendaftaran berhasil! Silakan login');window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Daftar Akun</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:Poppins;
    background:linear-gradient(135deg,#38bdf8,#6366f1);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);
    padding:35px;
    border-radius:20px;
    width:360px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    text-align:center;
    color:white;
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:10px;
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:20px;
    background:#0ea5e9;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#0284c7;
}

/* CAPTCHA */
.captcha{
    background:white;
    color:black;
    padding:10px;
    border-radius:10px;
    font-weight:bold;
    letter-spacing:3px;
    margin:10px 0;
}

/* LINK */
a{
    color:#fff;
    text-decoration:none;
    font-size:14px;
}
</style>
</head>

<body>

<div class="card">
    <h2>✨ Daftar Akun</h2>

    <form method="POST">

        <input type="text" name="nama" placeholder="Nama Lengkap" required>

        <input type="text" name="username" placeholder="Username" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <div class="captcha">
            <?= $_SESSION['captcha']; ?>
        </div>

        <input type="text" name="captcha" placeholder="Masukkan captcha" required>

        <button name="daftar">Daftar</button>

    </form>

    <br>
    <a href="login.php">Sudah punya akun? Login</a>

</div>

</body>
</html>