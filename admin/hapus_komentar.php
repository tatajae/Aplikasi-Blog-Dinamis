<?php
include 'koneksi.php';

if(isset($_GET['id_komentar'])){
    $id = $_GET['id_komentar'];

    // Hapus komentar dari database
    $delete = mysqli_query($conn, "DELETE FROM komentar WHERE id_komentar='$id'");

    if($delete){
        echo "<script>
            alert('Komentar berhasil dihapus!');
            window.location='index.php?menu=komentar';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus komentar!');
            window.location='?menu=komentar';
        </script>";
    }
} else {
    die("ID staf tidak ditemukan!");
}
?>