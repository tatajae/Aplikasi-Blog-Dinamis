<?php
session_start(); 
include "koneksi.php";

/* CEK LOGIN */
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
    exit;
}

/* AMBIL DATA DARI FORM DAN ESCAPE */
$id          = intval($_POST['id_artikel']);
$judul       = mysqli_real_escape_string($conn, $_POST['judul']);
$isi         = mysqli_real_escape_string($conn, $_POST['isi']);
$tanggal     = mysqli_real_escape_string($conn, $_POST['tanggal']);
$id_user     = intval($_POST['id_user']);
$id_kategori = intval($_POST['id_kategori']);

/* DATA GAMBAR */
$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

/* AMBIL DATA GAMBAR LAMA */
$old_data = mysqli_query($conn,"SELECT gambar FROM artikel WHERE id_artikel='$id'");
$old = mysqli_fetch_assoc($old_data);
$old_gambar = $old['gambar'];

/* JIKA ADA GAMBAR BARU */
if(!empty($gambar)){
    $ext = pathinfo($gambar, PATHINFO_EXTENSION);
    $gambar = uniqid('img_').'.'.$ext; // nama unik
    $path = "../assets/img/".$gambar;

    if(move_uploaded_file($tmp,$path)){
        // Hapus gambar lama jika ada
        if(!empty($old_gambar) && file_exists("../assets/img/".$old_gambar)){
            unlink("../assets/img/".$old_gambar);
        }
    }

    $sql = "UPDATE artikel SET
        judul='$judul',
        isi='$isi',
        tanggal='$tanggal',
        id_user='$id_user',
        id_kategori='$id_kategori',
        gambar='$gambar'
        WHERE id_artikel='$id'";
}else{
    $sql = "UPDATE artikel SET
        judul='$judul',
        isi='$isi',
        tanggal='$tanggal',
        id_user='$id_user',
        id_kategori='$id_kategori'
        WHERE id_artikel='$id'";
}

/* EKSEKUSI QUERY */
$query = mysqli_query($conn,$sql);

/* CEK HASIL UPDATE */
if($query){
    echo "<script>
    alert('Artikel berhasil diupdate');
    window.location='index.php?menu=artikel';
    </script>";
    exit;
}else{
    echo "<script>
    alert('Gagal update artikel: ".mysqli_error($conn)."');
    window.location='index.php?menu=artikel';
    </script>";
    exit;
}
?>