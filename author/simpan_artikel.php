<?php
session_start();
include 'koneksi.php';

// ✅ pastikan user login
if(!isset($_SESSION['id_user'])){
    die("User belum login!");
}

$id_user = $_SESSION['id_user'];

// ✅ amankan input
$judul       = mysqli_real_escape_string($conn, $_POST['judul']);
$isi         = mysqli_real_escape_string($conn, $_POST['isi']);
$id_kategori = $_POST['id_kategori'];

// ✅ tanggal otomatis (biar aman)
$tanggal = date("Y-m-d H:i:s");

// ✅ upload gambar
$gambar = "";
if(isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != ""){
    $gambar = time() . "_" . $_FILES['gambar']['name']; // rename biar unik
    $tmp    = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../assets/img/".$gambar);
}

// ✅ query insert
$query = mysqli_query($conn,"
    INSERT INTO artikel 
    (id_user, judul, isi, tanggal, gambar, id_kategori)
    VALUES
    ('$id_user','$judul','$isi','$tanggal','$gambar','$id_kategori')
");

// ❗ tampilkan error asli
if(!$query){
    die("ERROR SQL: " . mysqli_error($conn));
}

// ambil id artikel
$id_artikel = mysqli_insert_id($conn);

// ✅ simpan tag
if(isset($_POST['tag'])){
    foreach($_POST['tag'] as $t){
        mysqli_query($conn,"
            INSERT INTO artikel_tag (id_artikel,id_tag) 
            VALUES('$id_artikel','$t')
        ");
    }
}

header("location:index.php?menu=artikel");
exit;
?>