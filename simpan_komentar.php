<?php
session_start();
include "koneksi.php";

// CEK LOGIN
if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit;
}

$id_user     = $_SESSION['id_user'];
$nama        = $_SESSION['username']; // ambil dari session login
$id_artikel  = $_POST['id_artikel'];
$komentar    = $_POST['komentar'];
$tanggal     = date("Y-m-d H:i:s");
$status      = "pending"; // atau 'approve'

// VALIDASI
if(empty($komentar)){
    die("Komentar tidak boleh kosong!");
}

// QUERY SESUAI TABEL
$query = mysqli_query($conn, "
    INSERT INTO komentar 
    (id_user, id_artikel, nama, komentar, tanggal, status)
    VALUES 
    ('$id_user', '$id_artikel', '$nama', '$komentar', '$tanggal', '$status')
");

// CEK ERROR
if(!$query){
    die("Query Error: " . mysqli_error($conn));
}

$_SESSION['notif'] = "Komentar berhasil dikirim!";

// REDIRECT
header("Location: detail_artikel.php?id_artikel=$id_artikel");
exit;