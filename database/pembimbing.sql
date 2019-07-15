-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 04:33 AM
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
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `Mahasiswanim` varchar(15) NOT NULL,
  `Dosennip` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `statusPembimbing` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`Mahasiswanim`, `Dosennip`, `id`, `statusPembimbing`) VALUES
('165150201111001', '165150201111230', 1, 1),
('165150201111001', '165150201111300', 2, 2),
('165150201111231', '165150201111230', 3, 1),
('2001', '165150201111300', 5, 1),
('2002', '165150201111300', 6, 2),
('100', '1001', 7, 1),
('100', '1002', 8, 2),
('100', '1003', 9, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Dosennip` (`Dosennip`),
  ADD KEY `Mahasiswanim` (`Mahasiswanim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD CONSTRAINT `pembimbing_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `pembimbing_ibfk_2` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
