<?php
session_start();    
include 'koneksi.php';

// Cek apakah form disubmit
if(isset($_POST['id_tag']) && isset($_POST['nama_tag'])) {

    $id_tag = $_POST['id_tag'];
    $nama_tag = mysqli_real_escape_string($conn, $_POST['nama_tag']);

    // Update data tag
    $query = "UPDATE tag SET nama_tag = '$nama_tag' WHERE id_tag = '$id_tag'";
    $update = mysqli_query($conn, $query);

    if($update) {
        // Berhasil update, kembali ke halaman tag
        echo "<script>
                alert('Tag berhasil diperbarui!');
                window.location='?menu=tag';
              </script>";
    } else {
        // Gagal update
        echo "<script>
                alert('Gagal memperbarui tag!');
                window.location='index.php?menu=tag';
              </script>";
    }

} else {
    // Jika akses langsung halaman ini tanpa form
    header("Location: index.php?menu=tag");
    exit;
}
?>