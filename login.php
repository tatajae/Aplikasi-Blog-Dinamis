<?php
session_start();
include "koneksi.php";

/* GENERATE CAPTCHA */
if(!isset($_SESSION['captcha'])){
    $_SESSION['captcha'] = rand(1000,9999);
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $captcha_input = $_POST['captcha'];

    if($captcha_input != $_SESSION['captcha']){
        $error = "Captcha salah!";
    } else {
        $cek = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
        $data = mysqli_fetch_assoc($cek);

        if(mysqli_num_rows($cek) > 0){
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $data['username'];

            unset($_SESSION['captcha']);
            header("location:index.php");
        }else{
            $error = "Username atau password salah!";
        }
    }

    $_SESSION['captcha'] = rand(1000,9999); // refresh captcha
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:Poppins;
    height:100vh;
    background:linear-gradient(120deg,#e0f2fe,#f8fafc);
    display:flex;
    justify-content:center;
    align-items:center;
}

/* GLASS CARD */
.card{
    width:350px;
    padding:40px;
    border-radius:25px;
    background:rgba(255,255,255,0.7);
    backdrop-filter:blur(12px);
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
    text-align:center;
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:10px;
    border:1px solid #ddd;
}

/* CAPTCHA BOX */
.captcha{
    background:#0ea5e9;
    color:white;
    padding:10px;
    border-radius:10px;
    font-weight:bold;
    letter-spacing:3px;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:20px;
    background:#0ea5e9;
    color:white;
    cursor:pointer;
}

/* ERROR */
.error{
    background:#ef4444;
    color:white;
    padding:8px;
    border-radius:10px;
}
</style>
</head>

<body>

<div class="card">
    <h2>Login</h2>

    <?php if(isset($error)){ ?>
        <div class="error"><?= $error; ?></div>
    <?php } ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <div class="captcha">
            <?= $_SESSION['captcha']; ?>
        </div>

        <input type="text" name="captcha" placeholder="Masukkan captcha" required>

        <button name="login">Login</button>
    </form>

    <p>Belum punya akun? <a href="daftar.php">Daftar</a></p>
</div>

</body>
</html>