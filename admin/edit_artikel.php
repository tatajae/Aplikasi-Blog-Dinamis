<?php
include "koneksi.php";

/* CEK LOGIN */
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
    exit;
}

/* CEK ID ARTIKEL */
if(!isset($_GET['id_artikel'])){
    echo "ID artikel tidak ditemukan";
    exit;
}

$id = $_GET['id_artikel'];

/* AMBIL DATA ARTIKEL */
$data = mysqli_query($conn,"SELECT * FROM artikel WHERE id_artikel='$id'");

if(!$data || mysqli_num_rows($data) == 0){
    echo "Artikel tidak ditemukan";
    exit;
}

$d = mysqli_fetch_assoc($data);
?>

<style>
body{
    background: linear-gradient(120deg,#e5e7eb,#38bdf8);
    font-family:'Poppins',sans-serif;
}

/* WRAPPER */
.form-wrapper{
    margin-top:120px;
    display:flex;
    justify-content:center;
}

/* CARD */
.form-card{
    width:700px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.form-card h2{
    margin-bottom:25px;
}

/* FORM */
.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    font-weight:500;
    margin-bottom:6px;
}

input, textarea{
    width:100%;
    padding:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

textarea{
    height:140px;
}

/* GAMBAR */
img{
    width:120px;
    border-radius:10px;
    margin-bottom:10px;
}

/* BUTTON */
.button-area{
    margin-top:25px;
    display:flex;
    gap:10px;
}

.btn{
    flex:1;
    padding:12px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    font-weight:500;
}

.btn-simpan{
    background:#0d6efd;
    color:white;
}

.btn-simpan:hover{
    background:#0b5ed7;
}

.btn-kembali{
    background:#6c757d;
    color:white;
    text-decoration:none;
    text-align:center;
    line-height:38px;
}
</style>

<div class="form-wrapper">
<div class="form-card">

<h2>Edit Artikel</h2>

<form action="index.php?menu=update_artikel" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id_artikel" value="<?= htmlspecialchars($d['id_artikel']); ?>">

<div class="form-group">
<label>Judul Artikel</label>
<input type="text" name="judul" value="<?= htmlspecialchars($d['judul']); ?>" required>
</div>

<div class="form-group">
<label>Isi Artikel</label>
<textarea name="isi" required><?= htmlspecialchars($d['isi']); ?></textarea>
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" value="<?= htmlspecialchars($d['tanggal']); ?>">
</div>

<div class="form-group">
<label>ID User</label>
<input type="number" name="id_user" value="<?= htmlspecialchars($d['id_user']); ?>">
</div>

<div class="form-group">
<label>ID Kategori</label>
<input type="number" name="id_kategori" value="<?= htmlspecialchars($d['id_kategori']); ?>">
</div>

<div class="form-group">
<label>Gambar Saat Ini</label><br>
<?php if(!empty($d['gambar'])){ ?>
<img src="../assets/img/<?= htmlspecialchars($d['gambar']); ?>" alt="gambar">
<?php } else { ?>
Tidak ada gambar
<?php } ?>
</div>

<div class="form-group">
<label>Ganti Gambar</label>
<input type="file" name="gambar">
</div>

<div class="button-area">
<button type="submit" class="btn btn-simpan">Update Artikel</button>
<a href="index.php?menu=artikel" class="btn btn-kembali">Kembali</a>
</div>

</form>

</div>
</div>