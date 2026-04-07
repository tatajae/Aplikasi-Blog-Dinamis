<?php
include "koneksi.php";

/* ambil data dari form */
$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$role = $_POST['role'];

/* cek username sudah ada atau belum */
$cek = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

if(mysqli_num_rows($cek) > 0){

echo "<script>
alert('Username sudah digunakan!');
window.location='index.php?menu=pengguna';
</script>";

}else{

/* simpan ke database */
mysqli_query($conn,"INSERT INTO users (nama,username,email,password,role)
VALUES ('$nama','$username','$email','$password','$role')");

echo "<script>
alert('Pengguna berhasil ditambahkan');
window.location='index.php?menu=pengguna';
</script>";

}
?>