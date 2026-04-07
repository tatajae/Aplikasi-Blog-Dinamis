<?php 
include 'koneksi.php'; 

// CEK LOGIN
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
    exit;
}

// AMBIL DATA DARI ADMIN
$kategori = mysqli_query($conn,"SELECT * FROM kategori");
$tag = mysqli_query($conn,"SELECT * FROM tag");
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Artikel</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>

body{
    background: linear-gradient(120deg,#e5e7eb,#38bdf8);
    font-family:'Poppins',sans-serif;
}

.container{
    padding-top:90px; /* 🔥 ini kunci utama */
    padding-left:20px;
    padding-right:20px;
}

/* CARD */
.form-card{
    max-width:700px;
    margin:auto;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
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

input, textarea, select{
    width:100%;
    padding:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

textarea{
    height:130px;
}

/* TAG */
.tag-box{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
}

.tag-item{
    background:#f1f5f9;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    cursor:pointer;
}

/* BUTTON */
.button-area{
    margin-top:25px;
    display:flex;
    gap:10px;
}

.btn{
    padding:10px 18px;
    border-radius:20px;
    text-decoration:none;
    color:white;
    border:none;
    cursor:pointer;
    font-size:14px;
}

.btn-simpan{
    background:#0d6efd;
}

.btn-simpan:hover{
    background:#0b5ed7;
}

.btn-kembali{
    background:#6c757d;
}

</style>
</head>

<body>

<div class="container">

<div class="form-card">
    <h2>Tambah Artikel</h2>
    <a href="?menu=artikel" class="btn btn-kembali">← Kembali</a>
</div>

<div class="form-card">

<form action="index.php?menu=simpan_artikel" method="POST" enctype="multipart/form-data">

<!-- ID USER AUTO -->
<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

<div class="form-group">
<label>Judul Artikel</label>
<input type="text" name="judul" placeholder="Masukkan judul..." required>
</div>

<div class="form-group">
<label>Isi Artikel</label>
<textarea name="isi" placeholder="Tulis isi artikel..." required></textarea>
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" required>
</div>

<div class="form-group">
<label>Kategori</label>
<select name="id_kategori" required>
<option value="">-- Pilih Kategori --</option>
<?php while($k=mysqli_fetch_assoc($kategori)){ ?>
<option value="<?= $k['id_kategori']; ?>">
<?= htmlspecialchars($k['nama_kategori']); ?>
</option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Pilih Tag</label>
<div class="tag-box">
<?php while($t=mysqli_fetch_assoc($tag)){ ?>
<label class="tag-item">
<input type="checkbox" name="tag[]" value="<?= $t['id_tag']; ?>">
<?= htmlspecialchars($t['nama_tag']); ?>
</label>
<?php } ?>
</div>
</div>

<div class="form-group">
<label>Upload Gambar</label>
<input type="file" name="gambar">
</div>

<div class="button-area">
<button type="submit" class="btn btn-simpan">Simpan Artikel</button>
</div>

</form>

</div>
</div>

</body>
</html>