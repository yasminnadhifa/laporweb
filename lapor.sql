-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 08:05 AM
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
(10, 'ASP1688497394', 'Discord', 'Gimana kalau kita buat event live coding hadiah mobil untuk meramaikan discord', '2023-07-04 21:03:45', 'face11.jpg', 37),
(11, 'ASP1688504180', 'Discord', 'Saya memiliki saran bagaimana kita membuat event bermain bersama mentor di discord agar dapat meramaikan discord', '2023-07-04 22:56:48', '', 37),
(12, 'ASP1688641733', 'LMS', 'Bagaimana kalau misalnya tugas LMS dibuka tanpa harus menunggu penilaian mentor', '2023-07-06 13:09:37', '', 39),
(13, 'ASP1688653117', 'Mentor Bermasalah', 'Ganti mentor', '2023-07-06 16:18:43', '', 37),
(14, 'ASP1688653123', 'dew', 'dew', '2023-07-06 16:19:00', '', 37),
(15, 'ASP1688653209', 'dew', 'dew', '2023-07-06 16:20:12', '', 37),
(16, 'ASP1688653219', 'dw', 'dwedw', '2023-07-06 16:20:22', '', 37),
(17, 'ASP1688653226', 'er', 'fer', '2023-07-06 16:20:31', '', 37),
(18, 'ASP1688673224', 'dewd', 'd3e', '2023-07-06 21:53:51', 'cara1.png', 37);

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
(6, 'LMS'),
(7, 'Mentor'),
(9, 'Discord'),
(10, 'MSIB '),
(11, 'Akun LMS');

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
  `lembaga` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `nama`, `email`, `password`, `nohp`, `lembaga`, `image`, `is_active`, `date_created`, `role`) VALUES
(37, 'Yasmin ', 'yasminnadhifaa@gmail.com', '$2y$10$arDNPiobFl2.ys0WBHUdfOyrdIqKcKE.HgMc3sACI.6BFs8iaR68u', '85374122490', 'SMKN 2 Pekanbaru', 'face20.jpg', 1, 1688497140, 'Siswa'),
(38, 'Muhammad Fajar ', 'arktourose@gmail.com', '$2y$10$48yAQkIuHjdf5tjb1HjN5Op5/k9nUItP2ftUQKGUCK4nVsuiBCnyi', '85374122490', 'SMKN 2 Pekanbaru', 'default.jpg', 1, 1688503327, 'Siswa'),
(39, 'Hiro', 'jefzou01@gmail.com', '$2y$10$9jecP9.l1q2rNBIA3Aa/4.ASVKab1rLZEai1rYMC5KH2uZzRGcoyS', '85374122490', 'SMKN 2 Pekanbaru', '65483e902c0fe9f1219799477fd33cd1.jpg', 1, 1688636385, 'Pendamping'),
(40, 'Hiro', 'p4nkd1wcmyn0h@gmail.com', '$2y$10$gMvt9J7sM444GOTORne/8.Xn7AlnYmb/nQ8H6pCbuLlw71MDY/Vzy', '85374122490', 'SMKN 10 Pekanbaru', 'default.jpg', 1, 1688705074, 'Siswa'),
(41, 'Yasmin Nadhifa', 'lx.yasmin28@gmail.com', '$2y$10$WbQZD6UZPPQ.QX59n2r6KOuVKZaWRvu9C40HAGY93blNqjzFl94je', '85374122490', 'SMKN 10 Pekanbaru', 'default.jpg', 1, 1688714202, 'Siswa'),
(42, 'Yasmin', 'yasmin@gmail.com', '$2y$10$WUvT8HzyUJNyDucYM.Msv.CXdvReBW8bET30vGF.8qvb7Nj0lVLse', '85374122490', 'SMKN 10 Pekanbaru', 'default.jpg', 0, 1689271173, 'Guru'),
(43, 'Yasmin N', 'yasmin20ti@pcr.ac.id', '$2y$10$RqDydWWXE8k2KQsbBF/kMesVQs31CTJ2xa6IV1DTA5k0e9/d.5n6u', '85274833590', 'SMKN 10 Pekanbaru', 'default.jpg', 0, 1689319718, 'Siswa');

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
(38, 37, 'LX1688641568', 'ded', '2023-07-13', 'Mentor', 'ded', 'Selesai', 'Maaf yak', '2023-07-06 13:06:14', ''),
(39, 39, 'LX1688641777', 'LMS', '2023-07-13', 'LMS', 'LMS saya tidak bisa login, saya lupa password', 'Menunggu konfirmasi', '-', '2023-07-06 13:10:05', ''),
(46, 41, 'LX1688714260', 'Mentor bermasalah', '2023-07-07', 'LMS', 'Mentor gak pernah hadir live session', 'Selesai', 'Maaf sebelumnya akan diganti mentornya ', '2023-07-07 09:19:09', ''),
(47, 37, 'LX1689271239', 'Mentor Bermasalah', '2023-07-14', 'Mentor', 'Mentor tidak datang', 'Selesai', 'Mohon maaf atas ketidaknyamanannya, mentor untuk SMKN 2 Pekanbaru sudah saya ganti. Terima kasih banyak. ', '2023-07-13 20:03:02', 'Screenshot_2023-07-13_2231011.png');

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
(31, 'SMKN 2 Pekanbaru', 'Jl. Sudirman 2', 'Riau 2', '09876545', 'Not active'),
(33, 'SMKN 10 Pekanbaru', 'Jl. Sudirman', 'Riau', '09876543', 'Active'),
(34, 'SMKN 3 Pekanbaru', 'Jl. Sudirman 2', 'Riau 2', '09876543', 'Not active'),
(36, 'SMKN 1 Pekanbaru', 'Jl. Sudirman', 'Riau', '09876543', 'Active'),
(37, 'SMKN 2 Pekanbaru', 'Jl. Sudirman 2', 'Riau 2', '09876543', 'Not active');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` varchar(225) NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_user`, `pesan`, `star`, `created_at`) VALUES
(26, 37, 'Bagus', 4, '2023-07-04 21:07:48'),
(27, 39, '', 4, '2023-07-06 13:10:26'),
(28, 37, 'der', 4, '2023-07-06 16:20:26'),
(29, 37, '', 5, '2023-07-06 21:55:31');

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
(14, 'Tim LearningX', 'admin1@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '96-x-80.png');

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
(39, 'arktourose@gmail.com', 'Cs+wkXCzA+0vLynJ+VL9sHa1su3nH4N835gS5ao3he0=', 1688503327),
(40, 'yasminnadhifaa@gmail.com', 'vBXkq4cH3W6qA2qnrNoFMf/QlNXG2ODO/gm2DBTFeEY=', 1688503386),
(44, 'yasmin@gmail.com', 'LDHS19N6LCw8C29Ko2qvXwNOdOVbAnZesCosbwch9pc=', 1689271173),
(45, 'yasmin20ti@pcr.ac.id', '3goJ+IF2Rr9vxk/H4j8bqJiLohErn6SQgl0N087jrrI=', 1689319718);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD CONSTRAINT `fk_user_Aspirasi` FOREIGN KEY (`id_user`) REFERENCES `konsumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
