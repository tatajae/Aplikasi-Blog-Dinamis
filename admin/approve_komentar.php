<?php
include 'koneksi.php';

// Cek apakah id_komentar ada
if (isset($_GET['id_komentar'])) {
    $id = intval($_GET['id_komentar']); // pastikan ID angka

    if ($id > 0) {
        // Pastikan kolom 'status' ada di tabel
        $cekKolom = mysqli_query($conn, "SHOW COLUMNS FROM komentar LIKE 'status'");
        if (mysqli_num_rows($cekKolom) == 0) {
            // Jika belum ada, buat kolom 'status'
            mysqli_query($conn, "ALTER TABLE komentar ADD COLUMN status ENUM('pending','approved') NOT NULL DEFAULT 'pending'");
        }

        // Update status komentar menjadi 'approved'
        $update = mysqli_query($conn, "UPDATE komentar SET status='approved' WHERE id_komentar='$id'");

        if ($update) {
            echo "<script>
                    alert('Komentar berhasil disetujui!');
                    window.location='index.php?menu=komentar';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Gagal menyetujui komentar: " . mysqli_error($conn) . "');
                    window.location='?menu=komentar';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('ID komentar tidak valid!');
                window.location='?menu=komentar';
              </script>";
        exit;
    }
} else {
    // jika tidak ada ID, kembali ke halaman komentar
    header("Location: ?menu=komentar");
    exit;
}
?>