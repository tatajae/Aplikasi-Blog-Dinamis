<?php
include 'koneksi.php';

/* CEK LOGIN */
if(!isset($_SESSION['id_user'])){
    echo "<script>
    alert('Silahkan login terlebih dahulu');
    window.location='login.php';
    </script>";
    exit;
}

/* AMBIL DATA DARI FORM DAN ESCAPE */
$judul       = mysqli_real_escape_string($conn, $_POST['judul']);
$isi         = mysqli_real_escape_string($conn, $_POST['isi']);
$tanggal     = mysqli_real_escape_string($conn, $_POST['tanggal']);
$id_user     = intval($_POST['id_user']);
$id_kategori = intval($_POST['id_kategori']);

/* DATA GAMBAR */
$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];
$gambar_simpan = '';

if(!empty($gambar)){
    $ext = pathinfo($gambar, PATHINFO_EXTENSION);
    $gambar_simpan = uniqid('img_').'.'.$ext; // nama unik
    $folder = "../assets/img/".$gambar_simpan;

    if(!move_uploaded_file($tmp, $folder)){
        echo "<script>
        alert('Gagal upload gambar');
        window.location='index.php?menu=tambah_artikel';
        </script>";
        exit;
    }
}

/* SIMPAN DATA KE DATABASE */
$sql = "INSERT INTO artikel (judul, isi, tanggal, id_user, id_kategori, gambar)
        VALUES ('$judul','$isi','$tanggal','$id_user','$id_kategori','$gambar_simpan')";

if(mysqli_query($conn, $sql)){
    echo "<script>
    alert('Artikel berhasil disimpan');
    window.location='index.php?menu=artikel';
    </script>";
    exit;
}else{
    echo "<script>
    alert('Gagal menyimpan artikel: ".mysqli_error($conn)."');
    window.location='index.php?menu=tambah_artikel';
    </script>";
    exit;
}
?>