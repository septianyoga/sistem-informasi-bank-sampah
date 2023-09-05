-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 05:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-sigebank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_sampah`
--

CREATE TABLE `bank_sampah` (
  `id_bank_sampah` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `koordinat` varchar(255) NOT NULL,
  `total_berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bank_sampah`
--

INSERT INTO `bank_sampah` (`id_bank_sampah`, `nama_bank`, `koordinat`, `total_berat`) VALUES
(1, 'Bank Sampah A', '-6.568928, 107.762074', 71),
(2, 'Bank Sampah B', '-6.564138, 107.766136', 40);

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id_sampah` int(11) NOT NULL,
  `id_bank_sampah` int(11) NOT NULL,
  `jumlah_sampah` int(11) NOT NULL,
  `berat_sampah` int(11) NOT NULL,
  `jenis` enum('Organik','Anorganik') NOT NULL,
  `status` enum('Terverifikasi','Belum Terverifikasi') NOT NULL DEFAULT 'Belum Terverifikasi',
  `tanggal_sampah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id_sampah`, `id_bank_sampah`, `jumlah_sampah`, `berat_sampah`, `jenis`, `status`, `tanggal_sampah`) VALUES
(2, 1, 2, 10, 'Organik', 'Terverifikasi', '2023-08-30 13:20:50'),
(3, 2, 2, 5, 'Organik', 'Terverifikasi', '2023-08-30 13:22:13'),
(4, 1, 1, 4, 'Anorganik', 'Belum Terverifikasi', '2023-08-30 13:23:20'),
(5, 1, 12, 10, 'Anorganik', 'Belum Terverifikasi', '2023-08-30 13:32:02'),
(6, 2, 5, 8, 'Anorganik', 'Terverifikasi', '2023-08-30 23:14:08'),
(7, 1, 5, 7, 'Anorganik', 'Terverifikasi', '2023-08-31 14:42:02'),
(8, 2, 8, 7, 'Organik', 'Terverifikasi', '2023-08-31 15:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','staff','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'password', 'admin'),
(2, 'Staff', 'Staff', 'password', 'staff'),
(3, 'User', 'user', 'password', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_sampah`
--
ALTER TABLE `bank_sampah`
  ADD PRIMARY KEY (`id_bank_sampah`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id_sampah`),
  ADD KEY `id_bank_sampah` (`id_bank_sampah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_sampah`
--
ALTER TABLE `bank_sampah`
  MODIFY `id_bank_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sampah`
--
ALTER TABLE `sampah`
  ADD CONSTRAINT `sampah_ibfk_1` FOREIGN KEY (`id_bank_sampah`) REFERENCES `bank_sampah` (`id_bank_sampah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
