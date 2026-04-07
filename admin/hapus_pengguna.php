<?php
include "koneksi.php";

/* ambil id pengguna */
$id = $_GET['id_user'];

/* hapus pengguna */
mysqli_query($conn,"DELETE FROM users WHERE id_user='$id'");

/* kembali ke halaman pengguna */
echo "<script>
alert('Pengguna berhasil dihapus');
window.location='index.php?menu=pengguna';
</script>";
?>