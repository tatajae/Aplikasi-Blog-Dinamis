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

/* CEK ID TAG */
if(!isset($_GET['id_tag'])){
    echo "<script>
    alert('ID tag tidak ditemukan');
    window.location='index.php?menu=tag';
    </script>";
    exit;
}

$id = intval($_GET['id_tag']);

/* CEK APAKAH TAG ADA DI DATABASE */
$data = mysqli_query($conn, "SELECT * FROM tag WHERE id_tag='$id'");
if(mysqli_num_rows($data) == 0){
    echo "<script>
    alert('Tag tidak ditemukan');
    window.location='index.php?menu=tag';
    </script>";
    exit;
}

/* HAPUS TAG */
$hapus = mysqli_query($conn, "DELETE FROM tag WHERE id_tag='$id'");

/* CEK HASIL HAPUS */
if($hapus){
    echo "<script>
    alert('Tag berhasil dihapus');
    window.location='index.php?menu=tag';
    </script>";
} else {
    echo "<script>
    alert('Gagal menghapus tag: ".mysqli_error($conn)."');
    window.location='index.php?menu=tag';
    </script>";
}
?>