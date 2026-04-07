<!-- HERO -->
<div class="hero">
    <h1>Halo, <?= $_SESSION['username']; ?> 👋</h1>
    <p>Kelola artikel kamu dengan mudah</p>
</div>

<!-- STATS -->
<div class="stats">
    <div class="stat-box">
        <h2><?= $total_artikel['jumlah']; ?></h2>
        <p>Total Artikel</p>
    </div>
</div>

<!-- CONTENT -->
<div class="content">
    <h2>Artikel Terbaru</h2>

    <div class="cards">
        <?php while($d = mysqli_fetch_assoc($data)) { ?>
        <div class="card">
            <img src="../assets/img/<?= $d['gambar']; ?>">
            <div class="card-body">
                <h3><?= $d['judul']; ?></h3>
                <p><?= substr($d['isi'],0,60); ?>...</p>

                <a href="?menu=edit_artikel&id_artikel=<?= $d['id_artikel']; ?>" class="btn">Edit</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>