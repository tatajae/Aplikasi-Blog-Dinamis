<?php
include "koneksi.php";

/* CEK LOGIN */
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
    exit;
}

/* CEK ID ARTIKEL */
if(!isset($_GET['id_artikel'])){
    echo "<script>
    alert('ID artikel tidak ditemukan');
    window.location='index.php?menu=artikel';
    </script>";
    exit;
}

// pastikan id_artikel angka
$id = intval($_GET['id_artikel']);

/* AMBIL DATA ARTIKEL */
$data = mysqli_query($conn,"SELECT * FROM artikel WHERE id_artikel='$id'");
if(!$data || mysqli_num_rows($data) == 0){
    echo "<script>
    alert('Artikel tidak ditemukan');
    window.location='index.php?menu=artikel';
    </script>";
    exit;
}

$d = mysqli_fetch_assoc($data);

/* HAPUS GAMBAR JIKA ADA */
if(!empty($d['gambar'])){
    $path = "../assets/img/".$d['gambar'];
    if(file_exists($path)){
        unlink($path);
    }
}

/* HAPUS DATA ARTIKEL */
$hapus = mysqli_query($conn,"DELETE FROM artikel WHERE id_artikel='$id'");

/* CEK HASIL HAPUS */
if($hapus){
    echo "<script>
    alert('Artikel berhasil dihapus');
    window.location='index.php?menu=artikel';
    </script>";
}else{
    echo "<script>
    alert('Gagal menghapus artikel');
    window.location='index.php?menu=artikel';
    </script>";
}
?>