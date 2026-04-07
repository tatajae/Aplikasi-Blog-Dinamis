<?php
session_start();
include 'koneksi.php';

$id_user   = $_SESSION['id_user'];
$judul     = $_POST['judul'];
$isi       = $_POST['isi'];
$tanggal   = $_POST['tanggal'];
$id_kategori = $_POST['id_kategori'];

// UPLOAD GAMBAR
$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

if($gambar != ""){
    move_uploaded_file($tmp, "../assets/img/".$gambar);
}

// SIMPAN ARTIKEL
$query = mysqli_query($conn,"INSERT INTO artikel 
(id_user, judul, isi, tanggal, gambar, id_kategori)
VALUES
('$id_user','$judul','$isi','$tanggal','$gambar','$id_kategori')");

if(!$query){
    die("Error: ".mysqli_error($conn));
}

$id_artikel = mysqli_insert_id($conn);

// SIMPAN TAG
if(isset($_POST['tag'])){
    foreach($_POST['tag'] as $t){
        mysqli_query($conn,"INSERT INTO artikel_tag (id_artikel,id_tag) 
        VALUES('$id_artikel','$t')");
    }
}

header("location:index.php?menu=artikel");
?>