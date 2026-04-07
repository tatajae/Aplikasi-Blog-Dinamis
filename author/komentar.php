<?php
session_start();
include 'koneksi.php';

// proteksi login
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// ambil komentar dari artikel milik penulis
$data = mysqli_query($conn, "
    SELECT komentar.*, artikel.judul 
    FROM komentar
    JOIN artikel ON komentar.id_artikel = artikel.id_artikel
    WHERE artikel.id_user='$id_user'
    ORDER BY komentar.id_komentar DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Komentar Artikel</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
}

body{
    background:linear-gradient(120deg,#e5e7eb,#38bdf8);
}
.container {
    padding: 40px;
}

/* HEADER */
.header {
    margin-bottom: 20px;
}

/* TABLE */
.table {
    width: 100%;
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.table th, .table td {
    padding: 15px;
    text-align: left;
}

.table th {
    background: #f1f5f9;
}
</style>

</head>

<body>

<div class="container">

<div class="header">
    <h2>Komentar Artikel Saya</h2>
</div>

<table class="table">

<tr>
    <th>No</th>
    <th>Artikel</th>
    <th>Nama</th>
    <th>Komentar</th>
</tr>

<?php $no=1; while($d = mysqli_fetch_assoc($data)) { ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['judul']; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['isi']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>