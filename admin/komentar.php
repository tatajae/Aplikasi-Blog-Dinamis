<?php
include 'koneksi.php';

// Ambil semua komentar + artikel + user
$komentar = mysqli_query($conn, "
    SELECT k.*, a.judul AS artikel, u.username
    FROM komentar k
    LEFT JOIN artikel a ON k.id_artikel = a.id_artikel
    LEFT JOIN users u ON k.id_user = u.id_user
    ORDER BY k.id_komentar DESC
");

if(!$komentar){
    die("Query error: ".mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Manajemen Komentar</title>
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
    margin-right:5px;
}

.btn-approve{
    background:#198754;
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

/* TEXT LIMIT */
.isi{
    max-width:350px;
    overflow:hidden;
    white-space:nowrap;
    text-overflow:ellipsis;
}

.status-approved{
    color:green;
    font-weight:bold;
}

.status-pending{
    color:orange;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="container">

<div class="header">
    <h2>Manajemen Komentar</h2>
</div>

<table class="table">
<thead>
<tr>
    <th width="50">No</th>
    <th>Artikel</th>
    <th>Username</th>
    <th>Isi Komentar</th>
    <th>Status</th>
    <th width="180">Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; while($k = mysqli_fetch_assoc($komentar)) { ?>

<?php 
// Hindari error status
$status = $k['status'] ?? 'pending'; 
?>

<tr>
    <td><?= $no++; ?></td>
    <td class="isi"><?= htmlspecialchars($k['artikel']); ?></td>
    <td><?= htmlspecialchars($k['username']); ?></td>
    <td class="isi"><?= htmlspecialchars(substr($k['komentar'],0,70)); ?>...</td>

    <td>
        <?php if($status == 'approved'){ ?>
            <span class="status-approved">Approved</span>
        <?php } else { ?>
            <span class="status-pending">Pending</span>
        <?php } ?>
    </td>

    <td>
        <?php if($status != 'approved'){ ?>
            <a href="approve_komentar.php?id_komentar=<?= $k['id_komentar']; ?>" 
               class="btn btn-approve"
               onclick="return confirm('Approve komentar ini?')">
               Approve
            </a>
        <?php } ?>

        <a href="hapus_komentar.php?id_komentar=<?= $k['id_komentar']; ?>" 
           class="btn btn-danger"
           onclick="return confirm('Hapus komentar ini?')">
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