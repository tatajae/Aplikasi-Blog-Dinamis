<?php
include 'koneksi.php';

// Ambil semua data pengguna terbaru
$users = mysqli_query($conn, "SELECT * FROM users ORDER BY id_user DESC");
if(!$users){
    die("Query error: ".mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Manajemen Pengguna</title>
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

/* TEXT LIMIT (optional) */
.isi{
    max-width:200px;
    overflow:hidden;
    white-space:nowrap;
    text-overflow:ellipsis;
}
</style>
</head>

<body>

<div class="container">

<div class="header">
    <h2>Manajemen Pengguna</h2>
    <a href="?menu=tambah_pengguna" class="btn">+ Tambah Pengguna</a>
</div>

<table class="table">
<thead>
<tr>
    <th width="50">No</th>
    <th>Username</th>
    <th>Nama</th>  
    <th>Email</th>      
    <th>Role</th>
    <th width="160">Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; while($user = mysqli_fetch_assoc($users)) { ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= htmlspecialchars($user['username']); ?></td>
    <td><?= htmlspecialchars($user['nama']); ?></td>
    <td class="isi"><?= htmlspecialchars($user['email']); ?></td>
    <td><?= ucfirst(htmlspecialchars($user['role'])); ?></td>
    <td>
        <a href="?menu=edit_pengguna&id_user=<?= $user['id_user']; ?>" class="btn btn-warning">Edit</a>
        <a href="?menu=hapus_pengguna&id_user=<?= $user['id_user']; ?>" 
           class="btn btn-danger"
           onclick="return confirm('Yakin hapus pengguna ini?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>

</div>

</body>
</html>