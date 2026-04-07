<?php
include 'koneksi.php';

// CEK LOGIN
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
    exit;
}

$id = $_GET['id_artikel'];
$id_user = $_SESSION['id_user'];

// AMBIL DATA ARTIKEL (HARUS MILIK SENDIRI)
$data = mysqli_query($conn,"
SELECT * FROM artikel 
WHERE id_artikel='$id' AND id_user='$id_user'
");

if(mysqli_num_rows($data)==0){
    die("Akses ditolak!");
}

$d = mysqli_fetch_assoc($data);

// AMBIL KATEGORI & TAG
$kategori = mysqli_query($conn,"SELECT * FROM kategori");
$tag = mysqli_query($conn,"SELECT * FROM tag");

// AMBIL TAG TERPILIH
$tag_terpilih = [];
$q = mysqli_query($conn,"SELECT id_tag FROM artikel_tag WHERE id_artikel='$id'");
while($t=mysqli_fetch_assoc($q)){
    $tag_terpilih[] = $t['id_tag'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Artikel</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background: linear-gradient(120deg,#e5e7eb,#38bdf8);
    font-family:'Poppins',sans-serif;
}

/* CONTAINER */
.container{
    padding:120px 40px 40px; /* 🔥 ANTI NAVBAR */
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
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

<div class="header">
    <h2>Edit Artikel</h2>
    <a href="?menu=artikel" class="btn btn-kembali">← Kembali</a>
</div>

<div class="form-card">

<form action="index.php?menu=update_artikel" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id_artikel" value="<?= $d['id_artikel']; ?>">

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
<input type="date" name="tanggal" value="<?= $d['tanggal']; ?>" required>
</div>

<div class="form-group">
<label>Kategori</label>
<select name="id_kategori" required>
<?php while($k=mysqli_fetch_assoc($kategori)){ ?>
<option value="<?= $k['id_kategori']; ?>"
<?= $k['id_kategori']==$d['id_kategori'] ? 'selected' : '' ?>>
<?= htmlspecialchars($k['nama_kategori']); ?>
</option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Tag</label>
<div class="tag-box">
<?php while($t=mysqli_fetch_assoc($tag)){ ?>
<label class="tag-item">
<input type="checkbox" name="tag[]" value="<?= $t['id_tag']; ?>"
<?= in_array($t['id_tag'],$tag_terpilih) ? 'checked' : '' ?>>
<?= htmlspecialchars($t['nama_tag']); ?>
</label>
<?php } ?>
</div>
</div>

<div class="form-group">
<label>Gambar Saat Ini</label><br>
<?php if($d['gambar']){ ?>
<img src="../assets/img/<?= $d['gambar']; ?>" width="120" style="border-radius:10px;">
<?php } else { echo "Tidak ada gambar"; } ?>
</div>

<div class="form-group">
<label>Ganti Gambar</label>
<input type="file" name="gambar">
</div>

<div class="button-area">
<button type="submit" class="btn btn-simpan">Update Artikel</button>
</div>

</form>

</div>
</div>

</body>
</html>