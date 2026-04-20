<?php ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:Poppins;
    background:linear-gradient(135deg,#38bdf8,#6366f1);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);
    padding:35px;
    border-radius:20px;
    width:360px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    text-align:center;
    color:white;
}

/* INPUT & SELECT */
input, select{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:10px;
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:20px;
    background:#0ea5e9;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#0284c7;
}

/* ERROR */
.error{
    background:#ef4444;
    padding:10px;
    border-radius:10px;
    margin-bottom:10px;
}

/* LINK */
a{
    color:#fff;
    text-decoration:none;
    font-size:14px;
}
</style>
</head>

<body>

<div class="card">
    <h2>🔐 Login</h2>

    <?php if(isset($_GET['pesan'])): ?>
        <div class="error">
            <?php echo $_GET['pesan']; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="proses_login.php">

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="author">Author</option>
            <option value="pengguna">User</option>
        </select>

        <button type="submit">Login</button>

    </form>

    <br>
    <a href="daftar.php">Belum punya akun? Daftar</a>

</div>

</body>
</html>