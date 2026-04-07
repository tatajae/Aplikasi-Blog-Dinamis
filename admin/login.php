<?php
include "koneksi.php";

// generate captcha
$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
$_SESSION['captcha'] = substr(str_shuffle($chars), 0, 4);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#87CEEB,#dfe6e9);
    margin:0;
}

.login-box{
    background:white;
    padding:30px 20px;
    width:100%;
    max-width:400px; /* agar tidak terlalu besar di laptop */
    border-radius:10px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

@media(max-width:576px){
    .login-box{
        padding:20px 15px;
    }
}
</style>
</head>

<body>

<div class="login-box">

<h3 class="text-center mb-4">Login Admin</h3>

<form method="POST" action="proses_login.php">

    <!-- Username -->
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <!-- Role -->
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-select" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="author">Author</option>
            <option value="pengguna">Pengguna</option>
        </select>
    </div>

    <!-- Captcha -->
    <div class="mb-3">
        <label>Captcha</label><br>
        <img src="captcha.php" onclick="this.src='captcha.php?'+Math.random();" title="Klik untuk refresh" style="cursor:pointer; max-width:100%;">
        <input type="text" name="captcha" class="form-control mt-2" placeholder="Masukkan captcha" required>
    </div>

    <button class="btn btn-primary w-100" name="login">Login</button>
    
</form>

</div>

</body>
</html>