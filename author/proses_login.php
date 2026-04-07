<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $captcha = $_POST['captcha'];
    $role = $_POST['role']; // ambil role dari form login

    // cek captcha
    if($captcha != $_SESSION['captcha']){
        echo "<script>
        alert('Captcha salah!');
        window.location='index.php';
        </script>";
        exit;
    }

    // query cek username & password
    $query = mysqli_query($conn,"SELECT * FROM users WHERE username ='$username' AND password ='$password'");
    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $data = mysqli_fetch_assoc($query);

        // cek role
        if($data['role'] != $role){
            echo "<script>
            alert('Role yang dipilih tidak sesuai!');
            window.location='index.php';
            </script>";
            exit;
        }

        // jika username, password, dan role sesuai
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];

        echo "<script>
        alert('Login berhasil');
        window.location='index.php';
        </script>";

    } else {
        echo "<script>
        alert('Username atau Password salah!');
        window.location='index.php';
        </script>";
    }
}
?>