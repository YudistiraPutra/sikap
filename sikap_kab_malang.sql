-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 04:42 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikap_kab_malang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kebutuhan`
--

CREATE TABLE `data_kebutuhan` (
  `keb_id` int(11) NOT NULL,
  `keb_jml` int(11) NOT NULL,
  `keb_kons_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_komoditas`
--

CREATE TABLE `data_komoditas` (
  `id` int(11) NOT NULL,
  `det_kmd_id` varchar(6) NOT NULL,
  `kec_id` char(3) NOT NULL,
  `tanam` double(10,3) DEFAULT NULL,
  `panen` double(10,3) DEFAULT NULL,
  `provitas` double(10,3) DEFAULT NULL,
  `produksi` double(10,3) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` char(4) NOT NULL,
  `ketersediaan` double(10,3) NOT NULL,
  `surplus` double(10,3) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_konsumsi`
--

CREATE TABLE `data_konsumsi` (
  `kons_id` int(11) NOT NULL,
  `kons_jml` double(10,3) NOT NULL,
  `kons_bulan` varchar(15) NOT NULL,
  `kons_thn` char(4) NOT NULL,
  `kons_kec_id` char(3) NOT NULL,
  `kons_det_kmd_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `pend_id` int(11) NOT NULL,
  `pend_jml` int(11) NOT NULL,
  `pend_thn` char(4) NOT NULL,
  `pend_kec_id` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_komoditas`
--

CREATE TABLE `detil_komoditas` (
  `det_kmd_id` varchar(6) NOT NULL,
  `det_kmd_nama` varchar(30) NOT NULL,
  `komoditas_kmd_id` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kat_id` varchar(8) NOT NULL,
  `kat_nama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kec_id` char(3) NOT NULL,
  `kec_nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kec_id`, `kec_nama`) VALUES
('DNO', 'Donomulyo'),
('PGK', 'Pagak');

-- --------------------------------------------------------

--
-- Table structure for table `komoditas`
--

CREATE TABLE `komoditas` (
  `kmd_id` char(6) NOT NULL,
  `kmd_nama` varchar(30) NOT NULL,
  `kategori_kat_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'roy', 'e3966862191604ddd269f41071678a49', 'admin'),
(2, 'putra', '4b301ed6752dc8e0d96cc6d7b84fc16d', 'admin'),
(3, 'Budi', '55d30299d26fc94d9f6b6e744d5527ac', 'Dinas Ketahanan Pangan'),
(4, 'Andi', '8f083b1d60dd039ce6691b2bd82e6a37', 'Dinas Pertanian'),
(5, 'William', '78d4e3965b8cd19c6da61424ff2f026c', 'Dinas Perikanan'),
(6, 'Joni', '0342a186a11ad7c8548e13a7fc7d5ac7', 'Dinas Peternakan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kebutuhan`
--
ALTER TABLE `data_kebutuhan`
  ADD PRIMARY KEY (`keb_id`),
  ADD KEY `data_kebutuhan_data_konsumsi` (`keb_kons_id`);

--
-- Indexes for table `data_komoditas`
--
ALTER TABLE `data_komoditas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_komoditas_detil_komoditas` (`det_kmd_id`),
  ADD KEY `data_komoditas_kecamatan` (`kec_id`);

--
-- Indexes for table `data_konsumsi`
--
ALTER TABLE `data_konsumsi`
  ADD PRIMARY KEY (`kons_id`),
  ADD KEY `data_konsumsi_detil_komoditas` (`kons_det_kmd_id`),
  ADD KEY `data_konsumsi_kecamatan` (`kons_kec_id`);

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`pend_id`),
  ADD KEY `data_penduduk_kecamatan` (`pend_kec_id`);

--
-- Indexes for table `detil_komoditas`
--
ALTER TABLE `detil_komoditas`
  ADD PRIMARY KEY (`det_kmd_id`),
  ADD KEY `detil_komoditas_komoditas` (`komoditas_kmd_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kec_id`);

--
-- Indexes for table `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`kmd_id`),
  ADD KEY `komoditas_kategori` (`kategori_kat_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kebutuhan`
--
ALTER TABLE `data_kebutuhan`
  ADD CONSTRAINT `data_kebutuhan_data_konsumsi` FOREIGN KEY (`keb_kons_id`) REFERENCES `data_konsumsi` (`kons_id`);

--
-- Constraints for table `data_komoditas`
--
ALTER TABLE `data_komoditas`
  ADD CONSTRAINT `data_komoditas_detil_komoditas` FOREIGN KEY (`det_kmd_id`) REFERENCES `detil_komoditas` (`det_kmd_id`),
  ADD CONSTRAINT `data_komoditas_kecamatan` FOREIGN KEY (`kec_id`) REFERENCES `kecamatan` (`kec_id`);

--
-- Constraints for table `data_konsumsi`
--
ALTER TABLE `data_konsumsi`
  ADD CONSTRAINT `data_konsumsi_detil_komoditas` FOREIGN KEY (`kons_det_kmd_id`) REFERENCES `detil_komoditas` (`det_kmd_id`),
  ADD CONSTRAINT `data_konsumsi_kecamatan` FOREIGN KEY (`kons_kec_id`) REFERENCES `kecamatan` (`kec_id`);

--
-- Constraints for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD CONSTRAINT `data_penduduk_kecamatan` FOREIGN KEY (`pend_kec_id`) REFERENCES `kecamatan` (`kec_id`);

--
-- Constraints for table `detil_komoditas`
--
ALTER TABLE `detil_komoditas`
  ADD CONSTRAINT `detil_komoditas_komoditas` FOREIGN KEY (`komoditas_kmd_id`) REFERENCES `komoditas` (`kmd_id`);

--
-- Constraints for table `komoditas`
--
ALTER TABLE `komoditas`
  ADD CONSTRAINT `komoditas_kategori` FOREIGN KEY (`kategori_kat_id`) REFERENCES `kategori` (`kat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
