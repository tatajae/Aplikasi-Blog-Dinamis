-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2026 at 04:11 AM
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
(7, 'Jeong Jaehyun ', 'dikabarkan jeong jaehyun selesai wamil pada 3 mei 20206', '2026-04-24', 1, 2, 'img_69d3d14ddaef8.jfif'),
(52, 'jamal', 'Nama Panggung: Jaehyun (재현)\r\nNama Lahir: Jeong Jae-hyun (정재현), secara legal diganti menjadi Jeong Yun-o (정윤오)\r\nTempat, Tanggal Lahir: Seoul, Korea Selatan, 14 Februari 1997\r\nZodiak: Aquarius\r\nTinggi Badan: 180 cm\r\nGolongan Darah: A\r\nSub-unit: NCT U, NCT 127\r\nInstagram: @jeongjaehyun', '2026-04-09', 1, 1, 'img_69d3d1402c2d3.jfif'),
(61, 'jamal', 'Debut di bawah SM Entertainment tahun 2016, ia anggota aktif NCT U dan NCT 127. Dikenal dengan vokal lembut dan visual memukau, Jaehyun fasih berbahasa Inggris karena pernah tinggal di Connecticut, AS, selama 4 tahun.', '2026-04-06', 2, 3, 'img_69d3c8e449b2f.jfif'),
(65, 'jeong', 'Jaehyun NCT (Jeong Yun-o) adalah penyanyi, penari, dan aktor asal Korea Selatan yang lahir pada 14 Februari 1997 di Seoul.', '2026-04-06', 3, 2, 'jamal.jfif');

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
(6, 65, 1);

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
(1, 'jepang'),
(2, 'korea'),
(3, 'cina'),
(4, 'thailand');

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
(1, 5, 7, NULL, 'jamal ganteng banget', '2026-04-07', 'approved'),
(2, 0, 0, 'ichi', 'jamal', '2026-04-07', 'pending'),
(3, 0, 0, 'ichi', 'jamal', '2026-04-07', 'pending'),
(4, 0, 0, 'ichi', 'jamal', '2026-04-07', 'pending'),
(5, 0, 0, 'ichi', 'jamal', '2026-04-07', 'pending'),
(6, 0, 0, 'ichi', 'tes', '2026-04-07', 'pending'),
(7, 5, 0, NULL, 'p', '2026-04-07', 'pending'),
(8, 5, 0, NULL, 'tes', '2026-04-07', 'pending'),
(9, 5, 0, NULL, 'tes', '2026-04-07', 'pending');

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
(1, 'kpop'),
(3, 'drama');

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
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `artikel_tag`
--
ALTER TABLE `artikel_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
