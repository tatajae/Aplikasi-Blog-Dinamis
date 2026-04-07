<?php
session_start();
include "koneksi.php";

/* CEK LOGIN */
if(!isset($_SESSION['id_user'])){
    echo "<script>
    alert('Silahkan login terlebih dahulu');
    window.location='login.php';
    </script>";
    exit;
}

/* CEK ID KATEGORI */
if(!isset($_GET['id_kategori'])){
    echo "<script>
    alert('ID kategori tidak ditemukan');
    window.location='index.php?menu=kategori';
    </script>";
    exit;
}

$id = intval($_GET['id_kategori']);

/* CEK APAKAH KATEGORI ADA DI DATABASE */
$data = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
if(mysqli_num_rows($data) == 0){
    echo "<script>
    alert('Kategori tidak ditemukan');
    window.location='index.php?menu=kategori';
    </script>";
    exit;
}

/* HAPUS KATEGORI */
$hapus = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori='$id'");

/* CEK HASIL HAPUS */
if($hapus){
    echo "<script>
    alert('Kategori berhasil dihapus');
    window.location='index.php?menu=kategori';
    </script>";
} else {
    echo "<script>
    alert('Gagal menghapus kategori: ".mysqli_error($conn)."');
    window.location='index.php?menu=kategori';
    </script>";
}
?>