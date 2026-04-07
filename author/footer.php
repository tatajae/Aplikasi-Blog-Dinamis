<!-- footer.php -->
<footer>
    <div class="footer-container">
        <div class="footer-left">
            <h3>Blog Dinamis</h3>
            <p>&copy; <?= date('Y'); ?> Blog Dinamis. All rights reserved.</p>
        </div>
        <div class="footer-right">
            <h4>Menu Cepat</h4>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="artikel.php">Artikel</a></li>
                <li><a href="?menu=kategori">Kategori</a></li>
                <li><a href="?menu=tag">Tag</a></li>
                <li><a href="pengguna.php">Pengguna</a></li>
            </ul>
        </div>
    </div>
</footer>

<style>
footer {
    background: #1e293b;
    color: #f4f6f9;
    padding: 40px 60px;
    margin-top: 50px;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.footer-left h3 {
    margin-bottom: 10px;
    font-size: 20px;
}

.footer-left p {
    font-size: 14px;
    color: #cbd5e1;
}

.footer-right h4 {
    margin-bottom: 10px;
    font-size: 16px;
}

.footer-right ul {
    list-style: none;
    padding: 0;
}

.footer-right ul li {
    margin-bottom: 5px;
}

.footer-right ul li a {
    text-decoration: none;
    color: #f4f6f9;
    transition: 0.3s;
}

.footer-right ul li a:hover {
    color: #38bdf8; /* biru muda */
}
</style>