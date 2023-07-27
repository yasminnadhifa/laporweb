-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 04:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapor`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int(11) NOT NULL,
  `no_aspirasi` varchar(100) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `isi` varchar(225) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `dokumen` varchar(225) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `no_aspirasi`, `judul`, `isi`, `created_at`, `dokumen`, `id_user`) VALUES
(1, 'ASP1686022641', 'de2d', 'd2ed', '2023-06-06 05:37:27', '', 25),
(2, 'ASP1686022647', 'sw', 'xqd', '2023-06-06 05:38:10', 'images1.jpg', 25),
(3, 'ASP1686137953', 'dewd', 'def', '2023-06-07 13:39:17', '', 25),
(4, 'ASP1686159179', 'Laporan', 'getg', '2023-06-07 19:33:09', '', 24),
(5, 'ASP1686159257', 'd ewrfx', 'xfrefr3f', '2023-06-07 19:34:29', 'IMG_9440_(1)1.jpg', 24),
(6, 'ASP1686456949', 'xd3re', 'dx3r', '2023-06-11 06:15:57', '', 26);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `jenis`) VALUES
(1, 'Content LMS'),
(2, 'Mentor');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `lembaga` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `nama`, `email`, `password`, `nohp`, `lembaga`, `image`, `is_active`, `date_created`) VALUES
(24, 'Yasmin ', 'lx.yasmin28@gmail.com', '$2y$10$mJBiO.HCPWO2arO146ZybO4/n3mcpb0uMkPnMLZIWCDTRmrcQN1p2', '0987654320', 2, 'Bali.jpg', 1, 1681013988),
(25, 'Yasmin Nadhifa', 'yasminnadhifaa@gmail.com', '$2y$10$M8J9juYy3siTxTNkaXMxpu5Gy8J1KF8lLrymRFyo2M1Naxgcu2W2C', '09876543', 1, '65483e902c0fe9f1219799477fd33cd1.jpg', 1, 1681014174),
(26, 'Azwardi', 'jefzou01@gmail.com', '$2y$10$.drbryrBBeEBQ0J8a1HAkuk2ClegIBlETbkxZNMM6hdELVOSdbGtq', '98765432', 1, 'default.jpg', 1, 1682230200),
(27, 'Azwardi', 'arktourose@gmail.com', '$2y$10$X6Mty7hQhZ1yyVpciVrZAOpgtVH3d9diRzy8JzwyD43VZgNXIuar2', '98765432', 1, 'default.jpg', 1, 1682230218),
(29, 'Yasmin Nadhifa', 'yasmin20ti@mahasiswa.pcr.ac.id', '$2y$10$nGp4PBGo2zR.8LAeh5vxEOEuvABiu4GFnwjNDHYZq1bOtQn70DxG6', '09876543', 4, 'default.jpg', 1, 1686102300),
(30, 'Test user', 'p4nkd1wcmyn0h@gmail.com', '$2y$10$YoiDuQpEQBfGiDHd02c5TOm0/Dw4oM05LyOMFgdmGCA0Y135QR4QS', '098765432', 20, 'default.jpg', 1, 1686537133);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_laporan` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `kategori` varchar(225) NOT NULL,
  `isi` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'Menunggu konfirmasi',
  `pesan` varchar(225) NOT NULL DEFAULT '-',
  `created_at` varchar(225) NOT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_user`, `no_laporan`, `judul`, `tanggal`, `kategori`, `isi`, `status`, `pesan`, `created_at`, `dokumen`) VALUES
(5, 24, 'LX1681014096', 'Laporan', '2023-04-09', 'Tim LX', 'hahahahahahahahahahahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'Menunggu konfirmasi', '-', '', ''),
(6, 24, 'LX1681014134', 'Laporan', '2023-04-07', 'Mentor', 'dewdx3dx3rdx3f4rfr4fr4f4f f4fx4xtft4fx \r\ndww\r\nd\r\nfder\r\nfer\r\nf', 'Menunggu konfirmasi', '-', '', ''),
(7, 25, 'LX1681622566', 'It End With Us', '2023-04-11', 'Tim LX', 'table_pengaduan', 'Selesai', 'v eqr', '', ''),
(8, 25, 'LX1682132838', 'ferferfer', '2023-04-11', 'Mentor', 'vrfgrw', 'Selesai', 'vrtgt', '2023-04-22 05:07:25', ''),
(9, 25, 'LX1682260747', 'LMS 404 Not Responding', '2023-04-06', 'Mentor', 'LMS rusak sudah 2 minggu menampilkan pesan error \"404 Not Responding\"', 'Sedang dalam peninjauan', 'Maaf atas kelalaiannya, akan di cek kembali.', '2023-04-23 16:39:56', ''),
(10, 25, 'LX1685787291', 'erfref', '2023-06-07', '1', 'freferf', 'Menunggu konfirmasi', '-', '2023-06-03 12:15:01', ''),
(11, 25, 'LX1685787320', 'fr3ef', '2023-05-30', 'Content LMS', 'd3rf', 'Menunggu konfirmasi', '-', '2023-06-03 12:15:26', ''),
(12, 25, 'LX1685976972', 'd3efd', '2023-06-07', 'Mentor', 'd3rf3r', 'Menunggu konfirmasi', '-', '2023-06-05 16:56:22', ''),
(13, 25, 'LX1685977071', 'testt', '2023-06-06', 'Mentor', 'de3df', 'Menunggu konfirmasi', '-', '2023-06-05 16:58:05', ''),
(14, 25, 'LX1685977240', 'dew', '2023-06-07', 'Mentor', 'wdefc', 'Menunggu konfirmasi', '-', '2023-06-05 17:00:50', ''),
(15, 25, 'LX1685977394', 'cefc', '2023-06-09', 'Content LMS', 'cer', 'Menunggu konfirmasi', '-', '2023-06-05 17:03:21', ''),
(16, 25, 'LX1685977675', 'cerc', '2023-06-16', 'Content LMS', 'cefc', 'Menunggu konfirmasi', '-', '2023-06-05 17:09:27', ''),
(17, 25, 'LX1685977769', 'xdwx', '2023-06-10', 'Content LMS', 'xedx', 'Menunggu konfirmasi', '-', '2023-06-05 17:09:36', ''),
(18, 25, 'LX1685978004', 'de2', '2023-06-14', 'Content LMS', 'de3d', 'Menunggu konfirmasi', '-', '2023-06-05 17:13:34', ''),
(19, 25, 'LX1685978561', 'dewd', '2023-06-07', 'Content LMS', 'd3re', 'Menunggu konfirmasi', '-', '2023-06-05 17:23:01', ''),
(20, 25, 'LX1685978597', 'bismillah', '2023-06-17', 'Content LMS', 'dwed', 'Menunggu konfirmasi', '-', '2023-06-05 17:23:31', ''),
(21, 25, 'LX1685978659', 'cerc', '2023-06-08', 'Mentor', 'cefc', 'Menunggu konfirmasi', '-', '2023-06-05 17:24:27', ''),
(22, 25, 'LX1685978705', 'frf', '2023-06-01', 'Content LMS', 'fre', 'Menunggu konfirmasi', '-', '2023-06-05 17:25:14', ''),
(23, 25, 'LX1685978728', 'dwe', '2023-06-14', 'Mentor', 'dwerf', 'Menunggu konfirmasi', '-', '2023-06-05 17:28:03', ''),
(24, 25, 'LX1685978884', 'd3re', '2023-06-08', 'Content LMS', 'fr3f', 'Menunggu konfirmasi', '-', '2023-06-05 17:28:13', ''),
(25, 25, 'LX1685979495', 'fr3f', '2023-06-08', 'Content LMS', 'fr4f', 'Menunggu konfirmasi', '-', '2023-06-05 17:38:24', ''),
(26, 25, 'LX1685980035', 'dref', '2023-06-01', 'Content LMS', 'fr4f', 'Menunggu konfirmasi', '-', '2023-06-05 17:47:23', '65483e902c0fe9f1219799477fd33cd13.jpg'),
(28, 25, 'LX1686022376', 'cdwc', '2023-06-07', 'Content LMS', 'cwdc', 'Menunggu konfirmasi', '-', '2023-06-06 05:33:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `provinsi` varchar(225) NOT NULL,
  `nohp` varchar(222) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`id`, `nama`, `alamat`, `provinsi`, `nohp`, `status`) VALUES
(1, 'Dummy School', 'LearningX', 'Riau', '098765432222', 'Active'),
(2, 'Dummy School 2', 'LX', 'Jakarta', '98765432', 'Active'),
(4, 'SMK Bhakti Insani', 'aaa', 'aaa', '98765432', 'Active'),
(5, 'ss', 'ss', 'ss', '98765432', 'Not active'),
(20, 'SMKN 1 Pekanbaru', 'Jl. Sudirman', 'Riau', '09876543', 'Active'),
(21, 'SMKN 2 Pekanbaru', 'Jl. Sudirman 2', 'Riau 2', '09876543', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE `testi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` varchar(225) NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testi`
--

INSERT INTO `testi` (`id`, `id_user`, `pesan`, `star`, `created_at`) VALUES
(13, 25, 'fc3erf', 4, '2023-04-23 19:36:33'),
(14, 25, '3rcvfr3vc', 4, '2023-04-23 19:36:37'),
(15, 25, 'rf3fffffffffffffffffffff', 5, '2023-04-23 19:36:46'),
(16, 25, 'ffffffffffffffffffff', 5, '2023-04-23 19:36:53'),
(17, 25, 'fffffffffffffffffff', 1, '2023-04-23 19:36:59'),
(19, 25, '', 0, '2023-06-06 03:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `image`) VALUES
(13, 'admin', 'admin@gmail.com', '44588bb3d2bed677b0193164922f3e8dc6b4027f', 'face2.jpg'),
(14, 'admin', 'admin1@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(24, 'jefzou01@gmail.com', '4eOyEHUft8lk206/eHp0L/p3iN1DE0+n3PRqMRDLbS8=', 1682230200),
(27, 'yasmin20ti@mahasiswa.pcr.ac.id', 'n3pV0sAaAt31ehUS5uGwZOJVPSaSglx9J5CieFtkl14=', 1686102300),
(28, 'yasminnadhifaa@gmail.com', 's5GWV1yz9GRwLfjr8RMTHzRTzNP4b1NEPwaNpif+xzo=', 1686105287),
(30, 'p4nkd1wcmyn0h@gmail.com', '3GH7HH6UqEUAZuZnH/mvpH/AIgq9EKbgi8pjrT6lpU0=', 1686537167);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_Aspirasi` (`id_user`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lembaga` (`lembaga`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_userr` (`id_user`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD CONSTRAINT `fk_user_Aspirasi` FOREIGN KEY (`id_user`) REFERENCES `konsumen` (`id`);

--
-- Constraints for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD CONSTRAINT `fk_lembaga` FOREIGN KEY (`lembaga`) REFERENCES `lembaga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
