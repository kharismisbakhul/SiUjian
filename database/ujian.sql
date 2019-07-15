-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 04:34 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` varchar(10) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `tgl_tambah_ujian` date NOT NULL,
  `bobot` double NOT NULL,
  `nilai_akhir` double NOT NULL,
  `statusUjian` int(1) NOT NULL,
  `kodeUjiankode` int(10) NOT NULL,
  `MahasiswaNim` varchar(15) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '2',
  `komentar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `tgl_ujian`, `tgl_tambah_ujian`, `bobot`, `nilai_akhir`, `statusUjian`, `kodeUjiankode`, `MahasiswaNim`, `bukti`, `valid`, `komentar`) VALUES
('1', '2019-07-12', '2019-07-12', 0, 0, 1, 1, '100', '', 1, ''),
('11', '2019-07-22', '2019-07-08', 0, 0, 2, 4, '165150201111231', '1562573807_165150201111231_checker_2.jpg', 2, 'kosong'),
('12', '2019-07-10', '2019-07-09', 0, 0, 2, 1, '165150201111231', '1562635690_165150201111231_checker_2.jpg', 2, 'kosong'),
('13', '2019-07-12', '2019-07-09', 0, 0, 2, 2, '165150201111231', '1562635883_165150201111231_603-951-1-SM.pdf', 2, 'kosong'),
('16', '2019-07-12', '2019-07-09', 0, 0, 2, 3, '165150201111231', '1562638067_165150201111231_603-951-1-SM.pdf', 2, 'kosong'),
('17', '2019-07-14', '2019-07-13', 0, 89.3333, 2, 1, '165150201111231', '1563007447_165150201111231_603-951-1-SM.pdf', 3, '-'),
('18', '2019-07-18', '2019-07-13', 0, 29.3333, 2, 2, '165150201111231', '1563053544_165150201111231_603-951-1-SM.pdf', 1, 'kosong'),
('19', '2019-07-19', '2019-07-15', 0, 82.6667, 2, 3, '165150201111231', '1563155019_165150201111231_603-951-1-SM.pdf', 1, 'bagus boss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodeUjiankode` (`kodeUjiankode`),
  ADD KEY `MahasiswaNim` (`MahasiswaNim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`kodeUjiankode`) REFERENCES `kodeujian` (`kode`),
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`MahasiswaNim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
