-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2022 at 02:57 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slbnsawa_galon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `no_hp`, `alamat`, `username`, `password`) VALUES
(1, 'Admin', '085356417778', 'Padang', 'Admin', '$2y$10$Ouqdgfi4GAcTQSe53jK8A./u4YVasRUk9m.hQFKfOS/MtSaTZDI9.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukatutup`
--

CREATE TABLE `tb_bukatutup` (
  `id` int(11) NOT NULL,
  `status` enum('Buka','Tutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bukatutup`
--

INSERT INTO `tb_bukatutup` (`id`, `status`) VALUES
(1, 'Buka');

-- --------------------------------------------------------

--
-- Table structure for table `tb_driver`
--

CREATE TABLE `tb_driver` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_driver`
--

INSERT INTO `tb_driver` (`id`, `nama`, `no_hp`, `alamat`, `username`, `password`) VALUES
(7, 'aditya', '08121312', 'padang', 'adit', '$2y$10$WETVgMPbTCpwVrtML7IGMORqe/VrjuCI8CqyTfucnctQn1dq12sbC'),
(9, 'driver1', '08122222', 'padang', 'driver1', '$2y$10$3En5f/v7bf0kRg39jOx1FeWLxzXAaLsibioAJeJjbtBEFje1pEIc2'),
(10, 'tono', '0812039123', 'padang', 'tono', '$2y$10$Alu9Ymn.x8DYdNkC1lzFCepN1NM26D7fIgZqWPX/.7e6zb6tAAEdi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id` int(11) NOT NULL,
  `harga_galon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_harga`
--

INSERT INTO `tb_harga` (`id`, `harga_galon`) VALUES
(1, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsumen`
--

CREATE TABLE `tb_konsumen` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id`, `nama`, `no_hp`, `alamat`, `username`, `password`) VALUES
(1, 'ani', '0812312121', 'padang', 'ani', '$2y$10$eToOd2xeRBZDQGb64bwy8e0bkp4qXIJ2c3l8HfPPonlrzhr1MlGDS'),
(7, 'Silvia', '1234', 'padang', 'silvia', '$2y$10$WETVgMPbTCpwVrtML7IGMORqe/VrjuCI8CqyTfucnctQn1dq12sbC'),
(9, 'imel', '0823853080', 'pariaman', 'imel', '$2y$10$L/7cTXmPq2qwCdAuLi4ZQ.d5q0Nc36OLCPUXDgdJTynC1SuEQy0Du'),
(10, 'imel', '08', 'lhong', 'imel', '$2y$10$Ol1Wqqi3PxvP.jPxQpEZlOJNc71VFGM0tq4sBsB0nD0bnuQfnvW16'),
(11, 'saskia', '08', 'padang', 'saskia', '$2y$10$ykORaGcJXzXybSsa0h1uBe2RSRYtW5uMspiaWMGcs2dMfoRVTNEt.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jml_pengeluaran` int(11) NOT NULL,
  `ket_pengeluaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id`, `tgl_pengeluaran`, `jml_pengeluaran`, `ket_pengeluaran`) VALUES
(1, '2022-03-31', 10000, 'Isi Bensin'),
(2, '2022-04-14', 50000, 'perbaiki alat'),
(3, '2022-04-01', 10000, 'isi bensin'),
(4, '2022-04-01', 10000, 'isi bensin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah_galon` int(11) NOT NULL,
  `status_transaksi` enum('Pesanan Masuk','Pesanan Diterima','Selesai') NOT NULL,
  `tipe_bayar` enum('Kupon','Tunai') NOT NULL,
  `lat_konsumen` text NOT NULL,
  `lng_konsumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_konsumen`, `id_driver`, `tgl_transaksi`, `jumlah_galon`, `status_transaksi`, `tipe_bayar`, `lat_konsumen`, `lng_konsumen`) VALUES
(1, 7, 7, '2022-04-04', 1, 'Selesai', 'Tunai', '-0.9528316176720804', '100.38925096392632'),
(2, 7, 7, '2022-06-03', 5, 'Selesai', 'Tunai', '0.10044632922239723', '0.0'),
(3, 11, 10, '2022-07-05', 1, 'Selesai', 'Kupon', '-0.9470482289010077', '100.37628382444382'),
(4, 11, 10, '2022-07-05', 2, 'Selesai', 'Kupon', '-0.9470482289010077', '100.37628382444382');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bukatutup`
--
ALTER TABLE `tb_bukatutup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_driver`
--
ALTER TABLE `tb_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bukatutup`
--
ALTER TABLE `tb_bukatutup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_driver`
--
ALTER TABLE `tb_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
