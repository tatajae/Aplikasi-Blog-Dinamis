<?php
include 'koneksi.php';

$id         = $_POST['id_artikel'];
$id_user    = $_SESSION['id_user'];
$judul      = $_POST['judul'];
$isi        = $_POST['isi'];
$tanggal    = $_POST['tanggal'];
$id_kategori= $_POST['id_kategori'];

// CEK KEPEMILIKAN
$cek = mysqli_query($conn,"SELECT * FROM artikel WHERE id_artikel='$id' AND id_user='$id_user'");
if(mysqli_num_rows($cek)==0){
    die("Akses ditolak!");
}

// UPLOAD GAMBAR BARU
$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

if($gambar != ""){
    move_uploaded_file($tmp, "../assets/img/".$gambar);

    mysqli_query($conn,"UPDATE artikel SET 
    judul='$judul',
    isi='$isi',
    tanggal='$tanggal',
    gambar='$gambar',
    id_kategori='$id_kategori'
    WHERE id_artikel='$id'");
}else{
    mysqli_query($conn,"UPDATE artikel SET 
    judul='$judul',
    isi='$isi',
    tanggal='$tanggal',
    id_kategori='$id_kategori'
    WHERE id_artikel='$id'");
}

// UPDATE TAG
mysqli_query($conn,"DELETE FROM artikel_tag WHERE id_artikel='$id'");

if(isset($_POST['tag'])){
    foreach($_POST['tag'] as $t){
        mysqli_query($conn,"INSERT INTO artikel_tag VALUES(NULL,'$id','$t')");
    }
}

header("location:index.php?menu=artikel");
?>