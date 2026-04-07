<?php
include 'koneksi.php';

$id = $_GET['id_artikel'];
$id_user = $_SESSION['id_user'];

// CEK KEPEMILIKAN
$cek = mysqli_query($conn,"SELECT * FROM artikel WHERE id_artikel='$id' AND id_user='$id_user'");
if(mysqli_num_rows($cek)==0){
    die("Akses ditolak!");
}

// HAPUS TAG RELASI
mysqli_query($conn,"DELETE FROM artikel_tag WHERE id_artikel='$id'");

// HAPUS ARTIKEL
mysqli_query($conn,"DELETE FROM artikel WHERE id_artikel='$id'");

header("location:index.php?menu=artikel");
?>