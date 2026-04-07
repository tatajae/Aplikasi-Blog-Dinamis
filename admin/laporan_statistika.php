<?php
include 'koneksi.php';

// Ambil data artikel dan komentar
$artikel = mysqli_query($conn, "
    SELECT a.id_artikel, a.judul, a.tanggal, COUNT(k.id_komentar) AS jumlah_komentar
    FROM artikel a
    LEFT JOIN komentar k ON a.id_artikel = k.id_artikel
    GROUP BY a.id_artikel
    ORDER BY jumlah_komentar DESC
");

// Ambil artikel terbaru (5 terbaru)
$terbaru = mysqli_query($conn, "
    SELECT id_artikel, judul, tanggal FROM artikel
    ORDER BY tanggal DESC LIMIT 5
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan Statistik</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
* { font-family: 'Poppins', sans-serif; box-sizing: border-box; margin:0; padding:0; }

/* Body */
body { background: linear-gradient(120deg, #e5e7eb, #38bdf8); padding:0; }

/* Container */
.container { padding:30px; max-width:1000px; margin:auto; }

/* Section */
.section { background:white; padding:20px; margin-bottom:20px; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1); }

/* Table */
.table { width:100%; border-collapse:collapse; }
.table th, .table td { padding:12px; text-align:left; border-bottom:1px solid #ccc; }
.table th { background:#f1f5f9; }

/* Chart */
canvas { width:100% !important; max-height:300px; display:block; margin:0 auto; }

/* Responsive */
@media(max-width:600px){
    .navbar h2 { font-size:18px; margin-bottom:8px; width:100%; }
    .navbar .btn { width:100%; text-align:center; }
}
</style>
</head>

<body>
<!-- Container -->
<div class="container">

    <!-- Artikel Populer -->
    <div class="section">
        <h3>Artikel Populer (Jumlah Komentar)</h3>
        <canvas id="populerChart"></canvas>
    </div>

    <!-- Artikel Terbaru -->
    <div class="section">
        <h3>Artikel Terbaru</h3>
        <canvas id="terbaruChart"></canvas>
    </div>

    <!-- Tabel Statistik Artikel -->
    <div class="section">
        <h3>Data Artikel</h3>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal Terbit</th>
                <th>Jumlah Komentar</th>
            </tr>
            <?php $no=1; mysqli_data_seek($artikel,0); while($row = mysqli_fetch_assoc($artikel)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['jumlah_komentar']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>

<script>
// Chart Artikel Populer
const populerCtx = document.getElementById('populerChart').getContext('2d');
const populerLabels = [
    <?php mysqli_data_seek($artikel,0); while($row=mysqli_fetch_assoc($artikel)){ echo '"'.$row['judul'].'",'; } ?>
];
const populerData = [
    <?php mysqli_data_seek($artikel,0); while($row=mysqli_fetch_assoc($artikel)){ echo $row['jumlah_komentar'].','; } ?>
];
new Chart(populerCtx, {
    type:'bar',
    data:{ labels:populerLabels, datasets:[{label:'Jumlah Komentar', data:populerData, backgroundColor:'#0d6efd'}] },
    options:{ responsive:true, maintainAspectRatio:false, plugins:{ legend:{ display:false } } }
});

// Chart Artikel Terbaru
const terbaruCtx = document.getElementById('terbaruChart').getContext('2d');
const terbaruLabels = [
    <?php while($row=mysqli_fetch_assoc($terbaru)){ echo '"'.$row['tanggal'].'",'; } ?>
];
const terbaruData = [
    <?php mysqli_data_seek($terbaru,0); while($row=mysqli_fetch_assoc($terbaru)){ echo '1,'; } ?>
];
new Chart(terbaruCtx, {
    type:'line',
    data:{ labels:terbaruLabels, datasets:[{label:'Jumlah Artikel', data:terbaruData, borderColor:'#17a2b8', fill:false, tension:0.1}] },
    options:{ responsive:true, maintainAspectRatio:false, plugins:{ legend:{ display:false } } }
});
</script>

</body>
</html>