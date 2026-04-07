<?php
session_start(); 
include "koneksi.php";

$id = $_POST['id_kategori'];
$nama = $_POST['nama_kategori'];

mysqli_query($conn,"UPDATE kategori SET
nama_kategori='$nama'
WHERE id_kategori='$id'");

echo "<script>
alert('Kategori berhasil diupdate');
window.location='index.php?menu=kategori';
</script>";
?>