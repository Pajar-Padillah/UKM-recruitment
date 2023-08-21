-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 10:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukm_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `id_recruitment` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `hobby` varchar(200) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `pengalaman_organisasi` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `motto` varchar(150) NOT NULL,
  `alasan_bergabung` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('pending','diterima','ditolak') NOT NULL,
  `tanggal_pendaftaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`id_recruitment`, `user_id`, `email`, `npm`, `nama`, `no_telp`, `hobby`, `angkatan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `prodi`, `jurusan`, `asal_sekolah`, `pengalaman_organisasi`, `alamat`, `motto`, `alasan_bergabung`, `foto`, `status`, `tanggal_pendaftaran`) VALUES
(1, 4, 'yukitsunoda@gmail.com', '19753040', 'Yuki Tsunoda', '082134567890', 'Balap liar', '2019', 'Jepang', '2023-06-21', 'Laki-laki', 'Manajemen Informatika', 'Ekonomi dan bisnis', 'SMA 2 Balam', 'Osis', 'Jakarta', 'Tetap semangat', 'Passion', 'recruitment_1687334399.jpg', 'pending', '2023-06-21'),
(2, 2, 'charles@gmail.com', '19753020', 'Charles Leclerc', '082233445566', 'Memancing buaya', '2018', 'Belanda', '2023-02-22', 'Laki-laki', 'Manajemen Informatika', 'Ekonomi dan bisnis', 'SMA 1 Balam', 'Pramuka', 'Balam', 'Yow', 'Join aja', 'recruitment_1687334521.jpg', 'diterima', '2023-06-21'),
(3, 3, 'sergio@gmail.com', '19753030', 'Sergio Perez', '089766554433', 'Jalan jalan', '2020', 'Malaysia', '2023-01-10', 'Laki-laki', 'Manajemen Informatika', 'Ekonomi dan bisnis', 'SMA 3 Balam', 'Gk ada', 'Bandung', 'Yea', 'Iseng', 'recruitment_1687334692.jpg', 'ditolak', '2023-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id_timeline` int(11) NOT NULL,
  `tgl_awal_pendaftaran` date NOT NULL,
  `tgl_akhir_pendaftaran` date NOT NULL,
  `tgl_tes_tertulis` date NOT NULL,
  `tgl_pengumuman_tes_tertulis` date NOT NULL,
  `tgl_tes_wawancara` date NOT NULL,
  `tgl_pengumuman_tes_wawancara` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id_timeline`, `tgl_awal_pendaftaran`, `tgl_akhir_pendaftaran`, `tgl_tes_tertulis`, `tgl_pengumuman_tes_tertulis`, `tgl_tes_wawancara`, `tgl_pengumuman_tes_wawancara`) VALUES
(1, '2023-06-19', '2023-06-24', '2023-06-25', '2023-06-28', '2023-06-29', '2023-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `npm` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `npm`, `nama`, `username`, `password`, `foto`, `role`) VALUES
(1, 19771010, 'Max Verstappen', 'admin', '$2y$05$h/8fU/GYmXDjH0qZATN69u6AjepZXk78MMX7bo1gWaqaQWlnlEZJu', 'user_1687333908.jpg', 1),
(2, 19753020, 'Charles Leclerc', 'user1', '$2y$05$T4HwiWR1.1MHAJIP7OjCC.hMGXSZxPwPd0EiX02jf2R/9BAna3Q1q', 'user_1687334022.jpg', 2),
(3, 19753030, 'Sergio Perez', 'user2', '$2y$05$t9Sra02m3k59eg3sTAmf7eo55nhkXef6nDD0Xa1oOQ5LHY6VuT6OO', 'user_1687334127.jpg', 2),
(4, 19753040, 'Yuki Tsunoda', 'user3', '$2y$05$8u/nqB9HPbJmywPI3JD46uxBs57KD6P.3jKMVV2IPBrBQN7X8IBNe', 'user_1687334199.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_level` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_level`, `nama`) VALUES
(1, 'admin'),
(2, 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id_recruitment`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id_timeline`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id_recruitment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
