<?php
session_start();
include 'koneksi.php';

// proteksi login
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// 🔥 HANYA AMBIL ARTIKEL MILIK DIA
$data = mysqli_query($conn, "
    SELECT * FROM artikel 
    WHERE id_user='$id_user'
    ORDER BY id_artikel DESC
");

if(!$data){
    die("Query error: ".mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Artikel Saya</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
*{
    font-family:'Poppins',sans-serif;
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:linear-gradient(120deg,#e5e7eb,#38bdf8);
}

/* CONTAINER */
.container{
    padding:40px;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

/* BUTTON */
.btn{
    padding:8px 16px;
    border-radius:20px;
    text-decoration:none;
    color:white;
    background:#0d6efd;
    font-size:14px;
}

.btn-warning{
    background:#ffc107;
    color:black;
}

.btn-danger{
    background:#dc3545;
}

/* TABLE */
.table{
    width:100%;
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    border-collapse:collapse;
}

.table th,
.table td{
    padding:14px;
    text-align:left;
    vertical-align:top;
}

.table th{
    background:#f1f5f9;
}

.table tr:hover{
    background:#f9fafb;
}

/* IMAGE */
img{
    width:80px;
    border-radius:10px;
}

/* TEXT LIMIT */
.isi{
    max-width:350px;
}
</style>
</head>

<body>

<div class="container">

<div class="header">
    <h2>Artikel Saya</h2>
    <a href="?menu=tambah_artikel" class="btn">+ Tambah Artikel</a>
</div>

<table class="table">

<thead>
<tr>
    <th width="50">No</th>
    <th width="200">Judul</th>
    <th>Isi</th>
    <th width="120">Gambar</th>
    <th width="160">Aksi</th>
</tr>
</thead>

<tbody>

<?php 
$no=1; 
while($d = mysqli_fetch_assoc($data)) { 
?>

<tr>
    <td><?= $no++; ?></td>

    <td><?= htmlspecialchars($d['judul']); ?></td>

    <td class="isi">
        <?= htmlspecialchars(substr($d['isi'],0,70)); ?>...
    </td>

    <td>
        <?php if(!empty($d['gambar'])){ ?>
            <img src="../assets/img/<?= htmlspecialchars($d['gambar']); ?>" alt="gambar">
        <?php } else { ?>
            -
        <?php } ?>
    </td>

    <td>
        <a href="?menu=edit_artikel&id_artikel=<?= $d['id_artikel']; ?>" class="btn btn-warning">Edit</a>

        <a href="?menu=hapus_artikel&id_artikel=<?= $d['id_artikel']; ?>" 
           class="btn btn-danger"
           onclick="return confirm('Yakin hapus artikel ini?')">
           Hapus
        </a>
    </td>
</tr>

<?php } ?>

</tbody>
</table>

</div>

</body>
</html>