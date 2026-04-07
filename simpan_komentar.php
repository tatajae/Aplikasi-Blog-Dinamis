<?php
session_start();
include "koneksi.php";

// Cek apakah user sudah login
if(!isset($_SESSION['id_user'])){
    // Kalau belum login, redirect ke login
    header("Location: login.php");
    exit;
}

// Pastikan form dikirim dengan POST
if(isset($_POST['kirim'])){
    
    // Ambil id_artikel dari hidden input
    $id_artikel = isset($_POST['id_artikel']) ? intval($_POST['id_artikel']) : 0;

    if($id_artikel <= 0){
        echo "<script>alert('ID artikel tidak valid!');window.history.back();</script>";
        exit;
    }

    // Ambil komentar
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    $id_user = $_SESSION['id_user'];

    // Simpan komentar ke database
    $query = "INSERT INTO komentar (id_artikel, id_user, komentar, tanggal)
              VALUES ($id_artikel, $id_user, '$komentar', NOW())";

    if(mysqli_query($conn, $query)){
        // Redirect ke halaman detail artikel setelah sukses
        header("Location: detail_artikel.php?id_artikel=$id_artikel");
        exit;
    } else {
        // Jika gagal
        echo "<script>alert('Gagal menyimpan komentar.');window.history.back();</script>";
        exit;
    }
} else {
    // Jika akses langsung ke file tanpa POST
    header("Location: index.php");
    exit;
}
?>