<?php
include 'koneksi.php';

// Cek apakah form disubmit
if(isset($_POST['nama_tag'])) {

    // Ambil data dari form
    $nama_tag = mysqli_real_escape_string($conn, $_POST['nama_tag']);

    // Simpan ke database
    $query = "INSERT INTO tag (nama_tag) VALUES ('$nama_tag')";
    $simpan = mysqli_query($conn, $query);

    if($simpan) {
        // Berhasil, kembali ke halaman tag
        echo "<script>
                alert('Tag berhasil disimpan!');
                window.location='index.php?menu=tag';
              </script>";
    } else {
        // Gagal
        echo "<script>
                alert('Gagal menyimpan tag!');
                window.history.back();
              </script>";
    }

} else {
    // Jika akses langsung halaman ini tanpa form
    header("Location: tambah_tag.php");
    exit;
}
?>