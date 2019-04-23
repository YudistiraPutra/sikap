-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 05:17 AM
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
-- Database: `sikap_sikap`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_komoditas`
--

CREATE TABLE `data_komoditas` (
  `id` int(11) NOT NULL,
  `det_kmd_id` int(6) NOT NULL,
  `kec_id` char(3) NOT NULL,
  `tanam` double(10,3) DEFAULT NULL,
  `panen` double(10,3) DEFAULT NULL,
  `provitas` double(10,3) DEFAULT NULL,
  `produksi` double(10,3) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` char(4) NOT NULL,
  `ketersediaan` double(10,3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_komoditas`
--

INSERT INTO `data_komoditas` (`id`, `det_kmd_id`, `kec_id`, `tanam`, `panen`, `provitas`, `produksi`, `bulan`, `tahun`, `ketersediaan`, `timestamp`) VALUES
(1, 1, 'APG', 4000.000, 4000.000, 40000.000, 40004.000, 'Januari', '2019', 25098.510, '2019-04-23 03:08:58'),
(2, 1, 'BTR', 4000.000, 4000.000, 4000.000, 4000.000, 'Mei', '2019', 2509.600, '2019-04-23 03:11:48');

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
  `kons_det_kmd_id` int(6) NOT NULL
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

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`pend_id`, `pend_jml`, `pend_thn`, `pend_kec_id`) VALUES
(1, 52426, '2018', 'APG'),
(2, 68891, '2018', 'BTR'),
(3, 71924, '2018', 'BLW'),
(4, 118921, '2018', 'DPT'),
(5, 77860, '2018', 'DAU'),
(6, 62627, '2018', 'DNO'),
(7, 53132, '2018', 'GDG'),
(8, 85546, '2018', 'GDL'),
(9, 74529, '2018', 'JBG'),
(10, 60180, '2018', 'KPR'),
(11, 84822, '2018', 'KPL'),
(12, 31279, '2018', 'KSB'),
(13, 107955, '2018', 'KPJ'),
(14, 38187, '2018', 'KRM'),
(15, 111844, '2018', 'LWG'),
(16, 49309, '2018', 'NJM'),
(17, 56418, '2018', 'NGT'),
(18, 45740, '2018', 'PGK'),
(19, 67631, '2018', 'PGL'),
(20, 160763, '2018', 'PKS'),
(21, 90140, '2018', 'PKJ'),
(22, 92797, '2018', 'PCM'),
(23, 68184, '2018', 'PJN'),
(24, 183415, '2018', 'SGR'),
(25, 90275, '2018', 'SMW'),
(26, 54418, '2018', 'SPC'),
(27, 54346, '2018', 'TJN'),
(28, 60876, '2018', 'TYD'),
(29, 75605, '2018', 'TMP'),
(30, 114698, '2018', 'TRN'),
(31, 89450, '2018', 'WGR'),
(32, 81047, '2018', 'WJK'),
(33, 41361, '2018', 'WNS');

-- --------------------------------------------------------

--
-- Table structure for table `detil_komoditas`
--

CREATE TABLE `detil_komoditas` (
  `det_kmd_id` int(6) NOT NULL,
  `det_kmd_nama` varchar(30) NOT NULL,
  `komoditas_kmd_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_komoditas`
--

INSERT INTO `detil_komoditas` (`det_kmd_id`, `det_kmd_nama`, `komoditas_kmd_id`) VALUES
(1, 'Padi', 1),
(2, 'Jagung', 2),
(3, 'Kedelai', 3),
(4, 'Ubi Kayu', 4),
(5, 'Ubi Jalar', 5),
(6, 'Kacang Tanah', 6),
(7, 'Kacang Hijau', 7),
(8, 'Bawang Merah', 8),
(9, 'Bawang Putih', 8),
(10, 'Cabe Merah', 9),
(11, 'Cabe Rawit', 10),
(12, 'Daging Kerbau', 11),
(13, 'Daging Kuda', 11),
(14, 'Daging Sapi Potong', 11),
(15, 'Daging Sapi Perah', 11),
(16, 'Daging Babi', 11),
(17, 'Daging Domba', 11),
(18, 'Daging Kambing', 11),
(19, 'Daging Kelinci', 11),
(20, 'Daging Ayam Buras', 11),
(21, 'Daging Ayam Ras Pedaging', 11),
(22, 'Daging Ayam Ras Petelur', 11),
(23, 'Daging Burung Dara', 11),
(24, 'Daging Burung Puyuh', 11),
(25, 'Daging Itik', 11),
(26, 'Daging Entok', 11),
(27, 'Susu Sapi Perah', 12),
(28, 'Susu Kambing Perah', 12),
(29, 'Telur Ayam Buras', 13),
(30, 'Telur Ayam Ras Petelur', 13),
(31, 'Telur Burung Puyuh', 13),
(32, 'Telur Itik', 13),
(33, 'Telur Entok', 13),
(34, 'Ikan Tangkap Laut', 14),
(35, 'Ikan Tangkap PU', 14),
(36, 'Ikan Budidaya', 14),
(37, 'Ikan Olahan', 14),
(38, 'Gula', 15);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kat_id` int(3) NOT NULL,
  `kat_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kat_id`, `kat_nama`) VALUES
(1, 'Dinas Pertanian'),
(2, 'Dinas Peternakan'),
(3, 'Dinas Perikanan');

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
('APG', 'AMPELGADING'),
('BLW', 'BULULAWANG'),
('BTR', 'BANTUR'),
('DAU', 'DAU'),
('DNO', 'DONOMULYO'),
('DPT', 'DAMPIT'),
('GDG', 'GEDANGAN'),
('GDL', 'GONDANGLEGI'),
('JBG', 'JABUNG'),
('KPJ', 'KEPANJEN'),
('KPL', 'KARANGPLOSO'),
('KPR', 'KALIPARE'),
('KRM', 'KROMENGAN'),
('KSB', 'KASEMBON'),
('LWG', 'LAWANG'),
('NGT', 'NGANTANG'),
('NJM', 'NGAJUM'),
('PCM', 'PONCOKUSUMO'),
('PGK', 'PAGAK'),
('PGL', 'PAGELARAN'),
('PJN', 'PUJON'),
('PKJ', 'PAKISAJI'),
('PKS', 'PAKIS'),
('SGR', 'SINGOSARI'),
('SMW', 'SUMBERMANJING WETAN'),
('SPC', 'SUMBERPUCUNG'),
('TJN', 'TAJINAN'),
('TMP', 'TUMPANG'),
('TRN', 'TUREN'),
('TYD', 'TIRTOYUDO'),
('WGR', 'WAGIR'),
('WJK', 'WAJAK'),
('WNS', 'WONOSARI');

-- --------------------------------------------------------

--
-- Table structure for table `komoditas`
--

CREATE TABLE `komoditas` (
  `kmd_id` int(6) NOT NULL,
  `kmd_nama` varchar(30) NOT NULL,
  `kategori_kat_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komoditas`
--

INSERT INTO `komoditas` (`kmd_id`, `kmd_nama`, `kategori_kat_id`) VALUES
(1, 'Padi', 1),
(2, 'Jagung', 1),
(3, 'Kedelai', 1),
(4, 'Ubi kayu', 1),
(5, 'Ubi jalar', 1),
(6, 'Kacang tanah', 1),
(7, 'Kacang hijau', 1),
(8, 'Bawang', 1),
(9, 'Cabe Merah', 1),
(10, 'Cabe Rawit', 1),
(11, 'Daging', 2),
(12, 'Susu', 2),
(13, 'Telur', 2),
(14, 'Ikan', 3),
(15, 'Gula', 1);

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
