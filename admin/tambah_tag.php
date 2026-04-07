<?php 
include 'koneksi.php'; 
?>

<style>

body{
    background: linear-gradient(120deg,#e5e7eb,#38bdf8);
    font-family:'Poppins',sans-serif;
}

/* WRAPPER */
.form-wrapper{
    margin-top:130px; /* supaya tidak ketutup navbar */
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
input{
    width:100%;
    padding:10px;
    border-radius:8px;
    border:1px solid #ccc;
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

<h2>Tambah Tag</h2>

<form action="index.php?menu=simpan_tag" method="POST">

<div class="form-group">
<label>Nama Tag</label>
<input type="text" name="nama_tag" required>
</div>

<div class="button-area">
<button class="btn btn-simpan">Simpan Tag</button>
<a href="index.php?menu=kategori" class="btn btn-kembali">Kembali</a>
</div>

</form>

</div>
</div>
