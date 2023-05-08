-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 03:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `db_mps`
--

-- --------------------------------------------------------

--
-- Table structure for table `kartu`
--

CREATE TABLE `kartu` (
  `id_kartu` int(11) NOT NULL,
  `nomor_kartu` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu`
--

INSERT INTO `kartu` (`id_kartu`, `nomor_kartu`, `saldo`, `created_at`, `updated_at`) VALUES
(3, 0, 0, '2023-05-05 03:55:40', '2023-05-05 03:55:40'),
(4, 0, 0, '2023-05-05 03:57:11', '2023-05-05 03:57:11'),
(5, 0, 0, '2023-05-05 03:58:02', '2023-05-05 03:58:02'),
(6, 0, 0, '2023-05-05 04:02:04', '2023-05-05 04:02:04'),
(9, 0, 0, '2023-05-05 04:10:26', '2023-05-05 04:10:26'),
(16, 0, 0, '2023-05-06 05:43:59', '2023-05-06 05:43:59'),
(19, 0, 0, '2023-05-06 06:23:15', '2023-05-06 06:23:15'),
(20, 0, 0, '2023-05-06 07:00:21', '2023-05-06 07:00:21'),
(21, 0, 0, '2023-05-06 13:01:55', '2023-05-06 13:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(4) NOT NULL,
  `nama_role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'keuangan'),
(3, 'operator'),
(4, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `npm` int(11) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`npm`, `id_kartu`, `id_role`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'dika diem bae', '202cb962ac59075b964b07152d234b70', '2023-05-05 03:55:40', '2023-05-05 03:55:40'),
(2, 4, 2, 'arief fadhil', '202cb962ac59075b964b07152d234b70', '2023-05-05 03:57:11', '2023-05-05 03:57:11'),
(3, 5, 3, 'dapidah', '202cb962ac59075b964b07152d234b70', '2023-05-05 03:58:02', '2023-05-05 03:58:02'),
(4, 6, 4, 'marselridwanfatah', '202cb962ac59075b964b07152d234b70', '2023-05-05 04:02:05', '2023-05-05 04:02:05'),
(12345678, 9, 1, 'loginci4', '202cb962ac59075b964b07152d234b70', '2023-05-05 04:10:26', '2023-05-05 04:10:26'),
(1212121212, 21, 3, 'Aini Naddahtul Atika', '593c099838336e13b90fe2799a1daff8', '2023-05-06 13:01:55', '2023-05-06 13:01:55'),
(1234567899, 19, 2, 'Arief Fadhillaaa', '2f61155981ce87024fa51430a71b1d12', '2023-05-06 06:23:15', '2023-05-06 06:23:15'),
(2021320109, 20, 2, 'Arief Fadhillah Rochmala', 'a76ecb2970911f595d00bc18dc208118', '2023-05-06 07:00:21', '2023-05-06 07:00:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kartu`
--
ALTER TABLE `kartu`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `id_role_reference_tabel_role` (`id_role`),
  ADD KEY `id_kartu_reference_tabel_kartu` (`id_kartu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kartu`
--
ALTER TABLE `kartu`
  MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_kartu_reference_tabel_kartu` FOREIGN KEY (`id_kartu`) REFERENCES `kartu` (`id_kartu`),
  ADD CONSTRAINT `id_role_reference_tabel_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;
