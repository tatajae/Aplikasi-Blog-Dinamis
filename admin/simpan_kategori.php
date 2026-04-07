<?php
include "koneksi.php";

$nama = $_POST['nama_kategori'];

mysqli_query($conn,"INSERT INTO kategori(nama_kategori)
VALUES('$nama')");

echo "<script>
alert('Kategori berhasil ditambahkan');
window.location='index.php?menu=kategori';
</script>";
?>