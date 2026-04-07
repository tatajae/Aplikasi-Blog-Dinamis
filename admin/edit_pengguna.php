<?php
include "koneksi.php"; // pastikan koneksi ke database benar

/* CEK LOGIN ADMIN */
if(!isset($_SESSION['id_user'])){
    echo "<script>
    alert('Silahkan login terlebih dahulu');
    window.location='login.php';
    </script>";
    exit;
}

/* CEK ID USER */
if(!isset($_GET['id_user'])){
    echo "<script>
    alert('ID pengguna tidak ditemukan');
    window.location='index.php?menu=pengguna';
    </script>";
    exit;
}

$id = intval($_GET['id_user']);

/* AMBIL DATA PENGGUNA */
$data = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id'");
if(mysqli_num_rows($data) == 0){
    echo "<script>
    alert('Pengguna tidak ditemukan');
    window.location='index.php?menu=pengguna';
    </script>";
    exit;
}

$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Pengguna</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
body{
    background: linear-gradient(120deg,#e5e7eb,#38bdf8);
    font-family:'Poppins',sans-serif;
}

/* WRAPPER */
.form-wrapper{
    margin-top:130px;
    display:flex;
    justify-content:center;
}

/* CARD */
.form-card{
    width:500px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.form-card h2{
    margin-bottom:25px;
}

/* FORM */
.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    font-weight:500;
    margin-bottom:6px;
}

input, select{
    width:100%;
    padding:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

/* BUTTON */
.button-area{
    margin-top:25px;
    display:flex;
    gap:10px;
}

.btn{
    flex:1;
    padding:12px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    font-weight:500;
}

.btn-update{
    background:#0d6efd;
    color:white;
}

.btn-update:hover{
    background:#0b5ed7;
}

.btn-kembali{
    background:#6c757d;
    color:white;
    text-decoration:none;
    text-align:center;
    line-height:38px;
}
</style>
</head>
<body>

<div class="form-wrapper">
<div class="form-card">

<h2>Edit Pengguna</h2>

<form action="update_pengguna.php" method="POST">
    <!-- ID USER -->
    <input type="hidden" name="id_user" value="<?= htmlspecialchars($d['id_user']); ?>">

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']); ?>" required>
    </div>

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="<?= htmlspecialchars($d['username']); ?>" required>
    </div>

    <div class="form-group">
        <label>Password Baru</label>
        <input type="password" name="password" placeholder="Kosongkan jika tidak diubah">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($d['email']); ?>" required>
    </div>

    <div class="form-group">
        <label>Role</label>
        <select name="role" required>
            <option value="admin" <?= $d['role']=="admin" ? "selected":"" ?>>Admin</option>
            <option value="author" <?= $d['role']=="author" ? "selected":"" ?>>Author</option>
            <option value="pengguna" <?= $d['role']=="pengguna" ? "selected":"" ?>>Pengguna</option>
        </select>
    </div>

    <div class="button-area">
        <button type="submit" class="btn btn-update">Update Pengguna</button>
        <a href="index.php?menu=pengguna" class="btn btn-kembali">Kembali</a>
    </div>
</form>

</div>
</div>

</body>
</html>