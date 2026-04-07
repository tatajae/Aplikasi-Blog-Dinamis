<?php
session_start(); // HARUS DIATAS SEMUA

include "koneksi.php";

/* CEK LOGIN ADMIN */
if(!isset($_SESSION['username'])){
    echo "<script>
    alert('Silahkan login terlebih dahulu');
    window.location='login.php';
    </script>";
    exit;
}

/* AMBIL DATA DARI FORM DAN ESCAPE */
$id       = intval($_POST['id_user']);
$nama     = mysqli_real_escape_string($conn, $_POST['nama']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password']; // di-hash nanti jika diisi
$email    = mysqli_real_escape_string($conn, $_POST['email']);
$role     = mysqli_real_escape_string($conn, $_POST['role']);

/* BUAT QUERY UPDATE */
if(!empty($password)){
    $password_hash = md5($password); 
    $sql = "UPDATE users SET
        nama='$nama',
        username='$username',
        password='$password_hash',
        email='$email',
        role='$role'
        WHERE id_user='$id'";
}else{
    $sql = "UPDATE users SET
        nama='$nama',
        username='$username',
        email='$email',
        role='$role'
        WHERE id_user='$id'";
}

/* EKSEKUSI QUERY */
if(mysqli_query($conn, $sql)){
    echo "<script>
    alert('Pengguna berhasil diperbarui');
    window.location='index.php?menu=pengguna';
    </script>";
    exit;
}else{
    echo "<script>
    alert('Gagal memperbarui pengguna: ".mysqli_error($conn)."');
    window.location='index.php?menu=pengguna';
    </script>";
    exit;
}
?>