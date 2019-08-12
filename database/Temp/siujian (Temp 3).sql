-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2019 at 03:34 AM
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
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `posisi` int(1) NOT NULL,
  `statusAktif` int(1) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `noTlpnDosen` varchar(20) NOT NULL,
  `AlamatDosen` varchar(256) NOT NULL,
  `prodi_dosen` int(11) NOT NULL,
  `jabatan_pimpinan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `posisi`, `statusAktif`, `jenjang`, `noTlpnDosen`, `AlamatDosen`, `prodi_dosen`, `jabatan_pimpinan`) VALUES
('1001', 'Dosen A', 0, 1, '', '', '', 1, ''),
('1002', 'Dosen B', 0, 1, '', '', '', 1, ''),
('1003', 'Dosen C', 0, 1, '', '', '', 2, ''),
('123', 'Madi Aryo Kuncoro', 0, 0, '', '', '', 2, 'Kaprodi'),
('165150201111200', 'Bayu Priambadha', 1, 1, '', '081339678088', 'Malang Selatan aja', 7, 'Kaprodi'),
('165150201111230', 'Johny Kurniawan', 1, 1, '', '081687231', 'Mataram', 3, ''),
('165150201111300', 'Fajar Pradana', 1, 1, '', '', '', 3, ''),
('17515', 'Dimas', 0, 0, '', '', '', 4, ''),
('7000', 'Wahyudi', 1, 1, 'S2', '', '', 2, 'Dekan'),
('9001', 'Jumadi', 0, 1, 'S2', '', '', 8, 'Kaprodi');

-- --------------------------------------------------------

--
-- Table structure for table `isianmahasiswa`
--

CREATE TABLE `isianmahasiswa` (
  `id` varchar(10) NOT NULL,
  `judulAkhir` varchar(50) NOT NULL,
  `paradigma` varchar(50) NOT NULL,
  `kataKunci` varchar(50) NOT NULL,
  `tujuanPenelitian` varchar(50) NOT NULL,
  `metodePenelitian1` varchar(100) NOT NULL,
  `metodePenelitian2` varchar(100) NOT NULL,
  `temuan` varchar(50) NOT NULL,
  `kontribusiDanImplikasi` varchar(50) NOT NULL,
  `Mahasiswanim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isianmahasiswa`
--

INSERT INTO `isianmahasiswa` (`id`, `judulAkhir`, `paradigma`, `kataKunci`, `tujuanPenelitian`, `metodePenelitian1`, `metodePenelitian2`, `temuan`, `kontribusiDanImplikasi`, `Mahasiswanim`) VALUES
('1', 'Wahahahaha', 'bcdasasasasa', 'ddddddddddddddddd', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'bcd', 'bcd', 'ggggg', 'ddddd', '100'),
('2', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'aahahahhaha', '101'),
('3', 'Wadidaw', 'Hahaha', 'Hahaha', 'Hahaha', 'Hahaha', 'Hahaha', 'Hahaha', 'Hahaha', '165150201111231'),
('4', 'jkl', 'jkl', 'jkl', 'jkl', 'jkl', 'aaaaa', 'vvvvvvvvvvv', '', '2003');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode` int(11) NOT NULL,
  `nama_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode`, `nama_jurusan`) VALUES
(1, 'Akuntansi'),
(2, 'Ilmu Ekonomi'),
(3, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `kodeujian`
--

CREATE TABLE `kodeujian` (
  `kode` int(10) NOT NULL,
  `nama_ujian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodeujian`
--

INSERT INTO `kodeujian` (`kode`, `nama_ujian`) VALUES
(1, 'Ujian Pra Komisi Proposal'),
(2, 'Ujian Proposal'),
(3, 'Ujian Seminar Hasil'),
(4, 'Ujian Tesis');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `noTest` varchar(10) NOT NULL,
  `prodikode` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `semester` int(2) NOT NULL,
  `jalur` varchar(20) NOT NULL,
  `konsentrasi` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noTelp` varchar(16) NOT NULL,
  `asalStudi` varchar(20) NOT NULL,
  `judulTugasAkhir` varchar(200) NOT NULL,
  `tglMasuk` date NOT NULL,
  `tglMulaiTA` date NOT NULL,
  `statusKelulusan` int(1) NOT NULL,
  `statusWisuda` int(1) NOT NULL,
  `statusTOEFL` int(1) NOT NULL,
  `statusTPA` int(1) NOT NULL,
  `jenjang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `noTest`, `prodikode`, `password`, `angkatan`, `semester`, `jalur`, `konsentrasi`, `alamat`, `noTelp`, `asalStudi`, `judulTugasAkhir`, `tglMasuk`, `tglMulaiTA`, `statusKelulusan`, `statusWisuda`, `statusTOEFL`, `statusTPA`, `jenjang`) VALUES
('100', 'Kharis Saja', '0spZ', 8, '$2y$10$cGdEqGQuHAMjA.8HuI1iKO71WMOgwVYF/v2QpPaUv0MKm0ggjMChe', 0, 0, '', '', 'Semlehur', '090908080', '', '', '0000-00-00', '2019-07-18', 1, 0, 0, 0, 'S2'),
('101', 'Badudu', '', 1, '123', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3'),
('165150201111001', 'Adi Saputra', 'AAA', 7, '123', 2016, 0, 'snmptn', '', 'Jl. Kucing', '0888', 'SMAN 1 Malang', 'How To Be Mature to Economics', '2019-07-01', '2019-07-10', 1, 1, 1, 1, 'S2'),
('165150201111231', 'Aditya Yusril Fikri', '1234', 4, '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 2017, 2, 'snmptn', 'rpl', 'jln. malang aja', '0987654322', 'UB', 'pengaruh senyawa x terhadap senyawa y menggunakan metode z', '2017-06-14', '2019-07-01', 1, 0, 1, 1, 'S3'),
('2001', 'Mahasiswa A', 'hQ4H', 6, '$2y$10$BlrYhlM/nz4ccGzS0WcRIuXxPNw5746lxe3hdhpMyIfWxZDYytXSa', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3'),
('2002', 'Mahasiswa B', 'Jter', 10, '$2y$10$gMz.Jv7IlcAdOndPo6God.gupoE./UQFcV5yFmUxzu7wibG2lUsLi', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3'),
('2003', 'Mahasiswa C', 'Qg2C', 4, '$2y$10$31H.DK.qcBIgtJM3ugsay.pSrlTZvgpOQXUmq1kgaDEaxle7O2viO', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `Mahasiswanim` varchar(15) NOT NULL,
  `Dosennip` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `statusPembimbing` int(1) NOT NULL,
  `tgl_tambah_pembimbing` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`Mahasiswanim`, `Dosennip`, `id`, `statusPembimbing`, `tgl_tambah_pembimbing`) VALUES
('100', '1001', 21, 1, '2019-07-14'),
('100', '1003', 22, 2, '2019-07-15'),
('165150201111231', '1001', 23, 1, '2019-07-15'),
('165150201111231', '1002', 24, 2, '2019-07-19'),
('165150201111001', '1001', 25, 1, '2019-07-13'),
('165150201111001', '1002', 27, 2, '2019-07-15'),
('165150201111231', '1003', 28, 3, '2019-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `Dosennip` varchar(20) NOT NULL,
  `Ujianid` int(10) NOT NULL,
  `statusPenguji` int(1) NOT NULL,
  `id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT '0',
  `tgl_tambah_penguji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji`
--

INSERT INTO `penguji` (`Dosennip`, `Ujianid`, `statusPenguji`, `id`, `nilai`, `tgl_tambah_penguji`) VALUES
('1001', 31, 1, 22, 88, '0000-00-00'),
('1002', 31, 2, 23, 99, '0000-00-00'),
('1003', 31, 7, 30, 88, '0000-00-00'),
('123', 31, 8, 31, 90, '0000-00-00'),
('1001', 19, 8, 50, 90, '0000-00-00'),
('1001', 1, 8, 51, 90, '0000-00-00'),
('1002', 1, 9, 52, 90, '0000-00-00'),
('1003', 1, 1, 53, 90, '0000-00-00'),
('123', 1, 10, 55, 90, '0000-00-00'),
('165150201111200', 1, 7, 56, 90, '0000-00-00'),
('1001', 18, 8, 57, 0, '0000-00-00'),
('1001', 2, 1, 58, 0, '0000-00-00'),
('1001', 32, 1, 59, 0, '2019-07-22'),
('1003', 32, 2, 60, 0, '2019-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `status_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `status_dosen`) VALUES
(1, 'Pembimbing Ketua'),
(2, 'Pembimbing 1'),
(3, 'Pembimbing 2'),
(4, 'Promotor'),
(5, 'Co Promotor 1'),
(6, 'Co Promotor 2'),
(7, 'Penguji Ketua'),
(8, 'Penguji 1'),
(9, 'Penguji 2'),
(10, 'Penguji 3'),
(11, 'Punguji Tamu 1'),
(12, 'Penguji Tamu 2'),
(13, 'Ketua Program Studi');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `jurusankode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode`, `nama_prodi`, `jenjang`, `jurusankode`) VALUES
(1, 'financial accounting', 2, 1),
(2, 'management accounting', 2, 1),
(3, 'auditing', 2, 1),
(4, 'accounting information system', 2, 1),
(5, 'economic mathematics', 2, 2),
(6, ' micro economics', 2, 2),
(7, 'macro economics', 2, 2),
(8, 'mathematics and statistics for management', 2, 3),
(9, 'management science', 2, 3),
(10, 'business', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `idJurnal` int(11) NOT NULL,
  `judulArtikel` varchar(50) NOT NULL,
  `namaJurnal` varchar(20) NOT NULL,
  `volumeDanNoTerbitan` varchar(10) NOT NULL,
  `kategoriJurnal` varchar(15) NOT NULL DEFAULT 'null',
  `statusJurnal` varchar(20) NOT NULL,
  `Mahasiswanim` varchar(15) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`idJurnal`, `judulArtikel`, `namaJurnal`, `volumeDanNoTerbitan`, `kategoriJurnal`, `statusJurnal`, `Mahasiswanim`, `bukti`, `tanggal`, `valid`) VALUES
(18, 'pengaruh air a dengan kandungan y', 'IEEE', '12/1', 'kosong', 'Internasional', '165150201111231', '1562572581__checker_2.jpg', '2019-07-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `Dosennip` varchar(20) NOT NULL,
  `publikasiidJurnal` int(11) NOT NULL,
  `statusReviewer` int(1) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl_tambah_reviewer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` int(10) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `bobot` double NOT NULL DEFAULT '0',
  `nilai_akhir` double DEFAULT '0',
  `statusUjian` int(1) NOT NULL DEFAULT '2',
  `kodeUjiankode` int(10) NOT NULL,
  `MahasiswaNim` varchar(15) NOT NULL,
  `bukti` varchar(255) NOT NULL DEFAULT 'kosong',
  `valid` int(3) NOT NULL DEFAULT '2',
  `tgl_tambah_ujian` date NOT NULL,
  `komentar` varchar(255) NOT NULL DEFAULT 'kosong',
  `nilai_huruf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `tgl_ujian`, `bobot`, `nilai_akhir`, `statusUjian`, `kodeUjiankode`, `MahasiswaNim`, `bukti`, `valid`, `tgl_tambah_ujian`, `komentar`, `nilai_huruf`) VALUES
(1, '2019-07-12', 4, 90, 3, 1, '100', '', 1, '2019-07-12', 'sip', 'A'),
(2, '2019-07-28', 0, 0, 3, 3, '100', 'kosong', 2, '2019-07-21', 'kosong', 'K'),
(18, '0000-00-00', 0, 0, 3, 2, '165150201111231', '1563053544_165150201111231_603-951-1-SM.pdf', 1, '2019-07-13', '', 'K'),
(19, '2019-07-19', 0, 90, 3, 3, '165150201111231', '1563155019_165150201111231_603-951-1-SM.pdf', 1, '2019-07-15', 'bagus boss', ''),
(31, '2019-07-17', 0, 91.25, 3, 4, '165150201111231', 'kosong', 2, '2019-07-17', 'kosong', ''),
(32, '2019-07-15', 0, 0, 3, 2, '100', 'kosong', 3, '2019-07-22', 'kosong', 'K');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `user_profile_kode` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_profile_kode`, `username`, `password`, `is_active`, `nama`, `date_created`, `image`) VALUES
(1, 4, '165150201111230', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'yusril', 1, 'default.png'),
(2, 5, '165150201111231', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini mahasiswa', 1, 'default.png'),
(3, 3, '165150201111232', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini pimpinan', 1, 'default.png'),
(4, 2, '165150201111233', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini operator', 1, 'default.png'),
(5, 1, '165150201111234', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini admin', 1, 'default.png'),
(7, 1, 'Kharis', '$2y$10$EPlufTRpiNhfdmbWxkbguOEAx7mfTJcWflTTU74IqTL1lJxaBSGlS', 1, 'Misbakhul', 0, 'default.png'),
(13, 4, '17515', '$2y$10$P518PNI6bxGtJdAN5JxagO.lY4zNTv6o5sHBZSswybzToYy3.LqPi', 1, 'Dimas', 0, 'default.png'),
(15, 5, '100', '$2y$10$wmMl75.67I/1nQA6VyOY7uATnV7VaoCIByR1rLvCg6ZIG7EPFnSGG', 1, 'Kharis Saja', 0, '237627.jpg'),
(16, 4, '1001', '$2y$10$/wsRGXhiBswtY1hf5S.6t.4GFCi23ebi26KH6y/DkpYmEg7tFsFwu', 1, 'Dosen A', 0, 'default.png'),
(17, 4, '1002', '$2y$10$3tIf6ve9fv26a7eLNqFomOAG6gTHe1E3zW8W.W9FM3kk2bcFRQBmW', 1, 'Dosen B', 0, 'default.png'),
(18, 4, '1003', '$2y$10$ChlyJ4qzT0HWTSQ5DKDisunMGjTd8IcKUUFjmJMxcw1rhwuvXhPNu', 1, 'Dosen C', 0, 'default.png'),
(19, 5, '2001', '$2y$10$DL0fW0HcYL7ZhGrtZcY.juSbDUbhaW9vOs1Gh.mkf0SMTVys4c0Du', 1, 'Mahasiswa A', 0, 'default.png'),
(20, 5, '2002', '$2y$10$7OmB4W1VU.iQ7UIUctqrauX3qeCeDGG/1bCHgQF1T3BXaQhgBTvmm', 1, 'Mahasiswa B', 0, 'default.png'),
(21, 5, '2003', '$2y$10$aWBD9.9kxTSnwGW5jTq2ReN/mKiDkAbMRqRfzdkeYXN4WaFZ5EtTu', 1, 'Mahasiswa C', 0, 'default.png'),
(22, 2, '5001', '$2y$10$cnqVtP5CJ77bgkKDdNy7gOx93L3Q/JtKj8YMUpT7xzGR4cZKfhzTq', 1, 'Operator A', 0, 'default.png'),
(23, 3, '6001', '$2y$10$jOig2AsVDGmRVLai7IW89ubPwmC86pqlxGZrCwcv0T8H7UzmARHhG', 1, 'Pimpinan A', 0, 'default.png'),
(24, 3, '165150201111200', '$2y$10$cnqVtP5CJ77bgkKDdNy7gOx93L3Q/JtKj8YMUpT7xzGR4cZKfhzTq', 1, 'Bayu Priambadha', 0, 'default.png'),
(25, 3, '123', '$2y$10$cnqVtP5CJ77bgkKDdNy7gOx93L3Q/JtKj8YMUpT7xzGR4cZKfhzTq', 1, 'Madi Aryo Kuncoro', 0, 'default.png'),
(26, 3, '7000', '$2y$10$grFq2x0zUjzGRV6lZ1IB5uvwhktgXGy.tL3CeXrKghJZChZQX/05S', 1, 'Wahyudi', 0, 'default.png'),
(27, 3, '9001', '$2y$10$K2tDryvvgWYFE9jVVPJ2puimZAunCBeFqWejifXlhnbvpIRfBCCGm', 1, 'Jumadi', 0, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `kode` int(11) NOT NULL,
  `jenisUser` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`kode`, `jenisUser`) VALUES
(1, 'Administrator'),
(4, 'Dosen'),
(5, 'Mahasiswa'),
(2, 'Operator'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `user_profil_kode` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `user_profil_kode`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 3, 4),
(7, 3, 3),
(8, 4, 4),
(9, 5, 5),
(10, 1, 5),
(11, 2, 5),
(12, 4, 5),
(22, 1, 4),
(23, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Pimpinan'),
(4, 'Dosen'),
(5, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `ikon` varchar(50) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `judul`, `url`, `ikon`, `is_active`, `menu_id`) VALUES
(1, 'Profil', 'mahasiswa/profil', 'far fa-fw fa-id-card', '1', 5),
(2, 'Ujian', 'mahasiswa/ujian', 'fas fa-fw fa-clipboard', '1', 5),
(3, 'Publikasi', 'mahasiswa/publikasi', 'fas fa-fw fa-paper-plane', '1', 5),
(4, 'Bimbingan', 'dosen/bimbingan', 'fas fa-fw fa-graduation-cap', '1', 4),
(5, 'Profil', 'dosen/profil', 'far fa-fw fa-id-card', '1', 4),
(6, 'Input Nilai', 'dosen/inputNilai', 'fas fa-fw fa-pen-alt', '1', 4),
(7, 'Laporan Status Mahasiswa', 'pimpinan/laporanStatusMahasiswa', 'fas fa-fw fa-user-graduate', '1', 3),
(8, 'Laporan Dosen', 'pimpinan/laporanDosen', 'fas fa-fw fa-book-reader', '1', 3),
(9, 'Rekap Dosen', 'pimpinan/rekapDosen', 'fas fa-fw fa-book', '1', 3),
(10, 'Mahasiswa', 'operator/mahasiswa/list', 'fas fa-fw fa-graduation-cap', '1', 2),
(11, 'Dosen', 'operator/dosen/list', 'fas fa-fw fa-chalkboard-teacher', '1', 2),
(12, 'Pimpinan', 'operator/pimpinan', 'fas fa-fw fa-users', '1', 2),
(13, 'Ujian', 'operator/ujian', 'fas fa-fw fa-check-circle', '1', 2),
(14, 'Manajemen User', 'admin/manajemenUser', 'fas fa-fw fa-fingerprint', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nama` (`nama_dosen`),
  ADD KEY `prodi_dosen` (`prodi_dosen`);

--
-- Indexes for table `isianmahasiswa`
--
ALTER TABLE `isianmahasiswa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FKisianMahas737699` (`Mahasiswanim`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kodeujian`
--
ALTER TABLE `kodeujian`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `jenisUjian` (`nama_ujian`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `noTest` (`noTest`),
  ADD KEY `prodikode` (`prodikode`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembimbing_ibfk_1` (`Dosennip`),
  ADD KEY `pembimbing_ibfk_2` (`Mahasiswanim`),
  ADD KEY `statusPembimbing` (`statusPembimbing`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ujianid` (`Ujianid`),
  ADD KEY `Dosennip` (`Dosennip`),
  ADD KEY `statusPenguji` (`statusPenguji`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `nama` (`nama_prodi`),
  ADD KEY `jurusankode` (`jurusankode`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`idJurnal`) USING BTREE,
  ADD KEY `Mahasiswanim` (`Mahasiswanim`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Dosennip` (`Dosennip`),
  ADD KEY `publikasiidJurnal` (`publikasiidJurnal`),
  ADD KEY `statusReviewer` (`statusReviewer`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKUjian691129` (`MahasiswaNim`),
  ADD KEY `kodeUjiankode` (`kodeUjiankode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `user_profile_kode` (`user_profile_kode`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `jenisUser` (`jenisUser`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_menu_ibfk_1` (`menu_id`),
  ADD KEY `user_profil_kode` (`user_profil_kode`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kodeujian`
--
ALTER TABLE `kodeujian`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `idJurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`prodi_dosen`) REFERENCES `prodi` (`kode`);

--
-- Constraints for table `isianmahasiswa`
--
ALTER TABLE `isianmahasiswa`
  ADD CONSTRAINT `isianmahasiswa_ibfk_1` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodikode`) REFERENCES `prodi` (`kode`);

--
-- Constraints for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD CONSTRAINT `pembimbing_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `pembimbing_ibfk_2` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `pembimbing_ibfk_3` FOREIGN KEY (`statusPembimbing`) REFERENCES `posisi` (`id`);

--
-- Constraints for table `penguji`
--
ALTER TABLE `penguji`
  ADD CONSTRAINT `penguji_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `penguji_ibfk_2` FOREIGN KEY (`statusPenguji`) REFERENCES `posisi` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `jurusankode` FOREIGN KEY (`jurusankode`) REFERENCES `jurusan` (`kode`);

--
-- Constraints for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD CONSTRAINT `publikasi_ibfk_1` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD CONSTRAINT `reviewer_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `reviewer_ibfk_2` FOREIGN KEY (`publikasiidJurnal`) REFERENCES `publikasi` (`idJurnal`),
  ADD CONSTRAINT `reviewer_ibfk_3` FOREIGN KEY (`statusReviewer`) REFERENCES `posisi` (`id`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `FKUjian691129` FOREIGN KEY (`MahasiswaNim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`kodeUjiankode`) REFERENCES `kodeujian` (`kode`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_profile_kode`) REFERENCES `userprofile` (`kode`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`user_profil_kode`) REFERENCES `userprofile` (`kode`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
