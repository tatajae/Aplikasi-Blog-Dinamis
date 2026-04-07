<?php
include 'koneksi.php';

/* CEK LOGIN */
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
    exit;
}

/* AMBIL DATA KATEGORI */
$kategori = mysqli_query($conn,"SELECT * FROM kategori");
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

/* FORM CARD */
.form-card{
    width:700px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

/* TITLE */
.form-card h2{
    margin-bottom:25px;
}

/* FORM GROUP */
.form-group{
    margin-bottom:18px;
}

/* LABEL */
label{
    display:block;
    font-weight:500;
    margin-bottom:6px;
}

/* INPUT */
input, textarea, select{
    width:100%;
    padding:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

/* TEXTAREA */
textarea{
    height:140px;
}

/* BUTTON AREA */
.button-area{
    margin-top:25px;
    display:flex;
    gap:10px;
}

/* BUTTON */
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

<h2>Tambah Artikel</h2>

<form action="index.php?menu=simpan_artikel" method="POST" enctype="multipart/form-data">

<!-- ID USER OTOMATIS -->
<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

<div class="form-group">
<label>Judul Artikel</label>
<input type="text" name="judul" required>
</div>

<div class="form-group">
<label>Isi Artikel</label>
<textarea name="isi" required></textarea>
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
<option value="<?= htmlspecialchars($k['id_kategori']); ?>">
<?= htmlspecialchars($k['nama_kategori']); ?>
</option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Upload Gambar</label>
<input type="file" name="gambar">
</div>

<div class="button-area">
<button type="submit" class="btn btn-simpan">Simpan Artikel</button>
<a href="index.php?menu=artikel" class="btn btn-kembali">Kembali</a>
</div>

</form>
</div>
</div>