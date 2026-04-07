-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2026 at 02:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `tanggal`, `id_user`, `id_kategori`, `gambar`) VALUES
(65, 'Tips Belajar Pemrograman Web untuk Pemula', 'Belajar pemrograman web merupakan langkah awal yang baik bagi siapa saja yang ingin terjun ke dunia teknologi. Dengan memahami dasar-dasar pemrograman web, seseorang dapat membuat website sederhana hingga aplikasi web yang kompleks.\r\n\r\nLangkah pertama yang perlu dipelajari adalah HTML. HTML digunakan untuk membuat struktur dasar dari sebuah halaman web seperti judul, paragraf, gambar, dan link.\r\n\r\nSetelah memahami HTML, langkah berikutnya adalah mempelajari CSS. CSS berfungsi untuk mempercantik tampilan website, seperti mengatur warna, ukuran font, tata letak halaman, dan membuat desain menjadi lebih menarik.\r\n\r\nSelanjutnya, pelajari JavaScript agar website menjadi lebih interaktif. Dengan JavaScript, kita bisa membuat fitur seperti tombol interaktif, validasi form, dan animasi pada halaman web.\r\n\r\nJika sudah memahami ketiga dasar tersebut, kita dapat melanjutkan dengan mempelajari bahasa pemrograman backend seperti PHP dan menggunakan database MySQL untuk menyimpan data.\r\n\r\nDengan latihan yang konsisten dan membuat proyek kecil seperti blog sederhana, kemampuan pemrograman web akan berkembang dengan cepat.', '2026-04-07', 3, 2, 'img_69d4e85295157.jfif'),
(66, 'Belajar Dasar HTML untuk Pemula', 'HTML merupakan bahasa dasar yang digunakan untuk membuat struktur halaman website. Dengan HTML, kita dapat membuat berbagai elemen seperti judul, paragraf, gambar, dan tautan.\r\n\r\nBagi pemula yang ingin belajar membuat website, memahami HTML adalah langkah pertama yang sangat penting. HTML memiliki struktur sederhana yang mudah dipelajari.\r\n\r\nSetelah memahami HTML, biasanya pengembang web akan melanjutkan belajar CSS untuk mengatur tampilan halaman agar lebih menarik.', '2026-04-07', 3, 4, '1775562048_html.jfif'),
(67, 'Cara Mengatur Waktu Belajar dengan Baik', 'Mengatur waktu belajar sangat penting agar materi yang dipelajari dapat dipahami dengan baik. Banyak pelajar merasa kesulitan belajar karena tidak memiliki jadwal yang jelas.\r\n\r\nSalah satu cara yang efektif adalah membuat jadwal belajar harian. Dengan jadwal tersebut, kita dapat menentukan waktu khusus untuk belajar tanpa terganggu aktivitas lainnya.\r\n\r\nSelain itu, jangan lupa untuk memberikan waktu istirahat agar pikiran tetap segar.', '2026-04-07', 3, 3, '1775562219_download (6).jfif'),
(68, 'Manfaat Olahraga bagi Kesehatan Tubuh', 'Olahraga merupakan aktivitas yang sangat penting untuk menjaga kesehatan tubuh. Dengan berolahraga secara rutin, tubuh akan menjadi lebih bugar dan kuat.\r\n\r\nSelain menjaga kesehatan fisik, olahraga juga dapat membantu mengurangi stres dan meningkatkan suasana hati.\r\n\r\nBeberapa olahraga ringan seperti jogging, bersepeda, dan senam dapat dilakukan secara rutin setiap hari.', '2026-04-07', 3, 2, '1775562380_download (7).jfif'),
(69, 'Tips Menjadi Lebih Produktif Setiap Hari', 'Produktivitas merupakan kemampuan seseorang untuk menyelesaikan pekerjaan secara efektif dan efisien. Untuk meningkatkan produktivitas, kita perlu mengatur waktu dengan baik.\r\n\r\nSalah satu cara yang dapat dilakukan adalah membuat daftar tugas harian. Dengan daftar tersebut, kita dapat mengetahui pekerjaan apa saja yang harus diselesaikan.\r\n\r\nSelain itu, hindari gangguan seperti penggunaan media sosial secara berlebihan.', '2026-04-07', 3, 1, '1775562518_download (8).jfif'),
(70, 'Pentingnya Membaca Buku Setiap Hari', 'Membaca buku merupakan kegiatan yang memberikan banyak manfaat bagi kehidupan seseorang. Dengan membaca, kita dapat menambah wawasan dan pengetahuan baru.\r\n\r\nSelain itu, membaca juga dapat meningkatkan kemampuan berpikir kritis serta memperluas cara pandang terhadap berbagai hal.\r\n\r\nMeluangkan waktu sekitar 15–30 menit setiap hari untuk membaca buku dapat memberikan dampak positif bagi perkembangan diri.', '2026-04-07', 3, 6, '1775562602_download (9).jfif');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_tag`
--

CREATE TABLE `artikel_tag` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel_tag`
--

INSERT INTO `artikel_tag` (`id`, `id_artikel`, `id_tag`) VALUES
(1, 62, 1),
(2, 63, 1),
(6, 65, 1),
(7, 66, 1),
(8, 66, 4),
(9, 66, 6),
(10, 66, 7),
(11, 67, 3),
(12, 67, 5),
(13, 67, 8),
(14, 67, 9),
(15, 68, 3),
(16, 68, 10),
(17, 68, 11),
(18, 69, 3),
(19, 69, 8),
(20, 69, 9),
(21, 70, 5),
(22, 70, 9),
(23, 70, 11);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Produktivitas'),
(2, 'Kesehatan'),
(3, 'Pendidikan'),
(4, 'Teknologi'),
(6, 'Lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `id_artikel`, `nama`, `komentar`, `tanggal`, `status`) VALUES
(17, 5, 70, 'ichi', 'makasih kaa tipsnya', '2026-04-07', 'approved'),
(18, 10, 68, 'titi', 'ayoo kita olah raga bareng kaa', '2026-04-07', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `nama_tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`) VALUES
(1, 'Tutorial'),
(3, 'Tips'),
(4, 'Pemula'),
(5, 'Belajar'),
(6, 'Coding'),
(7, 'Web'),
(8, 'Produktivitas'),
(9, 'Motivasi'),
(10, 'Kesehatan'),
(11, 'Lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','author','pengguna') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `email`, `role`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'cici', 'cicita@gmail.com', 'admin'),
(3, 'penulis', 'de3709b8e6f81a4ef5a858b7a2d28883', 'tata', 'tata@gmail.com', 'author'),
(5, 'ichi', '202cb962ac59075b964b07152d234b70', 'ichi', 'ichi123@gmail.com', 'pengguna'),
(10, 'titi', '698d51a19d8a121ce581499d7b701668', 'tata', 'tatatiti@gmail.com', 'pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `artikel_tag`
--
ALTER TABLE `artikel_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `artikel_tag`
--
ALTER TABLE `artikel_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
