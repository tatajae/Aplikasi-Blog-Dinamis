<?php
session_start();
include "koneksi.php";

/* SEARCH */
$where = "";
if(isset($_GET['cari']) && $_GET['cari'] != ""){
    $cari = $_GET['cari'];
    $where = "WHERE a.judul LIKE '%$cari%' OR a.isi LIKE '%$cari%'";
}

/* QUERY ARTIKEL + KATEGORI */
$query = mysqli_query($conn, "
SELECT a.*, k.nama_kategori AS kategori
FROM artikel a
LEFT JOIN kategori k ON a.id_kategori = k.id_kategori
$where
ORDER BY a.id_artikel DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>BlogKu Elegant</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
*{ margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
body{ background:linear-gradient(120deg,#e0f2fe,#f8fafc); color:#1e293b; }
.navbar{ position:fixed; top:0; width:100%; height:70px; backdrop-filter:blur(10px);
    background:rgba(255,255,255,0.7); display:flex; justify-content:space-between; align-items:center;
    padding:0 50px; box-shadow:0 8px 30px rgba(0,0,0,0.05); z-index:999; }
.logo{ font-size:24px; font-weight:600; }
.nav-right a{ margin-left:10px; padding:8px 18px; border-radius:25px; text-decoration:none; }
.btn-login{ background:#0ea5e9; color:white; }
.btn-daftar{ background:#38bdf8; color:white; }
.hero{ margin-top:70px; height:350px; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;
    background:linear-gradient(rgba(14,165,233,0.7),rgba(0,0,0,0.4)), url('assets/img/bg.jpg'); background-size:cover; color:white; }
.hero h1{ font-size:40px; }
.search-box{ margin-top:20px; }
.search-box input{ padding:12px; width:280px; border-radius:30px; border:none; }
.search-box button{ padding:12px 18px; border:none; border-radius:30px; background:#0ea5e9; color:white; }
.container{ padding:50px; }
.grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:25px; }
.card{ background:rgba(255,255,255,0.7); backdrop-filter:blur(10px); border-radius:20px; overflow:hidden; box-shadow:0 15px 30px rgba(0,0,0,0.08); transition:0.3s; }
.card:hover{ transform:translateY(-5px); }
.card img{ width:100%; height:180px; object-fit:cover; }
.card-body{ padding:20px; }
.card h2{ font-size:18px; }
.card p{ font-size:14px; color:#475569; }
.card .kategori, .card .tags{ font-size:13px; color:#334155; margin-top:5px; }
.btn{ display:inline-block; margin-top:10px; padding:8px 15px; border-radius:20px; text-decoration:none; font-size:13px; }
.btn-baca{ background:#0ea5e9; color:white; }
.btn-komentar{ background:#64748b; color:white; margin-left:5px; }
.modal{ display:none; position:fixed; width:100%; height:100%; background:rgba(0,0,0,0.5); top:0; }
.modal-content{ background:white; padding:20px; width:300px; margin:150px auto; border-radius:10px; text-align:center; }
</style>

<script>
function cekLogin(id){
<?php if(!isset($_SESSION['id_user'])){ ?>
    document.getElementById('modalLogin').style.display='block';
<?php } else { ?>
    window.location.href="detail_artikel.php?id_artikel="+id;
<?php } ?>
}

function closeModal(){
    document.getElementById('modalLogin').style.display='none';
}
</script>

</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">BlogKu</div>

    <div class="nav-right">
        <?php if(isset($_SESSION['username'])): ?>
            Halo, <?= htmlspecialchars($_SESSION['username']); ?> 👋
            <a href="logout.php" class="btn-login">Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn-login">Login</a>
            <a href="daftar.php" class="btn-daftar">Daftar</a>
        <?php endif; ?>
    </div>
</div>

<!-- HERO -->
<div class="hero">
    <h1>Temukan Artikel Terbaik</h1>

    <div class="search-box">
        <form method="GET">
            <input type="text" name="cari" placeholder="Cari artikel..."
                value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
            <button type="submit">Cari</button>
        </form>
    </div>
</div>

<!-- CONTENT -->
<div class="container">

<?php if(isset($_GET['cari'])): ?>
    <p>Hasil pencarian: <b><?= htmlspecialchars($_GET['cari']); ?></b></p>
<?php endif; ?>

<div class="grid">

<?php if(mysqli_num_rows($query) == 0): ?>
    <p>Tidak ada artikel ditemukan 😢</p>
<?php endif; ?>

<?php while($data = mysqli_fetch_assoc($query)): ?>

    <?php
    // Ambil tag untuk artikel ini
    $tags = [];
    $id_artikel = $data['id_artikel'];
    $qtag = mysqli_query($conn, "
        SELECT t.nama_tag
        FROM tag t
        JOIN artikel_tag at ON t.id_tag = at.id_tag
        WHERE at.id_artikel = $id_artikel
    ");
    while($t = mysqli_fetch_assoc($qtag)){
        $tags[] = $t['nama_tag'];
    }
    ?>

<div class="card">

    <?php if($data['gambar'] != ""): ?>
        <img src="assets/img/<?= $data['gambar']; ?>">
    <?php endif; ?>

    <div class="card-body">
        <h2><?= htmlspecialchars($data['judul']); ?></h2>
        <p><?= htmlspecialchars(substr($data['isi'],0,100)); ?>...</p>
        
        <!-- Kategori -->
        <?php if($data['kategori'] != ""): ?>
        <div class="kategori"><b>Kategori:</b> <?= htmlspecialchars($data['kategori']); ?></div>
        <?php endif; ?>

        <!-- Tags -->
        <?php if(!empty($tags)): ?>
        <div class="tags"><b>Tags:</b> <?= htmlspecialchars(implode(', ', $tags)); ?></div>
        <?php endif; ?>

        <a href="detail_artikel.php?id_artikel=<?= $data['id_artikel']; ?>" class="btn btn-baca">Baca</a>
    </div>

</div>
<?php endwhile; ?>

</div>
</div>

<!-- MODAL LOGIN -->
<div id="modalLogin" class="modal">
    <div class="modal-content">
        <h3>Login Diperlukan</h3>
        <p>Silakan login untuk komentar</p>
        <a href="login.php" class="btn btn-baca">Login</a><br><br>
        <a href="daftar.php" class="btn btn-komentar">Daftar</a><br><br>
        <button onclick="closeModal()">Tutup</button>
    </div>
</div>

</body>
</html>