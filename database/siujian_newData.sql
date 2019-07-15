-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jul 2019 pada 04.39
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `posisi` int(1) NOT NULL,
  `statusAktif` int(1) NOT NULL,
  `jenjang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `posisi`, `statusAktif`, `jenjang`) VALUES
('1001', 'Dosen A', 0, 1, ''),
('1002', 'Dosen B', 0, 1, ''),
('1003', 'Dosen C', 0, 1, ''),
('123', 'Madi Aryo Kuncoro', 0, 0, ''),
('165150201111200', 'Bayu Priambadha', 1, 1, ''),
('165150201111230', 'Johny Kurniawan', 1, 1, ''),
('165150201111300', 'Fajar Pradana', 1, 1, ''),
('17515', 'Dimas', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isianmahasiswa`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode` int(11) NOT NULL,
  `nama_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode`, `nama_jurusan`) VALUES
(1, 'Akuntansi'),
(2, 'Ilmu Ekonomi'),
(3, 'Management');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kodeujian`
--

CREATE TABLE `kodeujian` (
  `kode` int(10) NOT NULL,
  `nama_ujian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kodeujian`
--

INSERT INTO `kodeujian` (`kode`, `nama_ujian`) VALUES
(1, 'Ujian Pra Komisi Proposal'),
(2, 'Ujian Proposal'),
(3, 'Ujian Seminar Hasil'),
(4, 'Ujian Tesis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `noTest`, `prodikode`, `password`, `angkatan`, `semester`, `jalur`, `konsentrasi`, `alamat`, `noTelp`, `asalStudi`, `judulTugasAkhir`, `tglMasuk`, `tglMulaiTA`, `statusKelulusan`, `statusWisuda`, `statusTOEFL`, `statusTPA`, `jenjang`) VALUES
('100', 'Kharis Saja', '0spZ', 8, '$2y$10$cGdEqGQuHAMjA.8HuI1iKO71WMOgwVYF/v2QpPaUv0MKm0ggjMChe', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S2'),
('165150201111001', 'Adi Saputra', 'AAA', 7, '123', 2016, 0, 'snmptn', '', 'Jl. Kucing', '0888', 'SMAN 1 Malang', 'How To Be Mature to Economics', '2019-07-01', '2019-07-10', 1, 1, 1, 1, 'S2'),
('165150201111231', 'Aditya Yusril Fikri', '1234', 4, '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 2017, 2, 'snmptn', 'rpl', 'jln. malang aja', '0987654322', 'UB', 'pengaruh senyawa x terhadap senyawa y menggunakan metode z', '2017-06-14', '2019-07-01', 0, 0, 1, 1, ''),
('2001', 'Mahasiswa A', 'hQ4H', 6, '$2y$10$BlrYhlM/nz4ccGzS0WcRIuXxPNw5746lxe3hdhpMyIfWxZDYytXSa', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3'),
('2002', 'Mahasiswa B', 'Jter', 10, '$2y$10$gMz.Jv7IlcAdOndPo6God.gupoE./UQFcV5yFmUxzu7wibG2lUsLi', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3'),
('2003', 'Mahasiswa C', 'Qg2C', 4, '$2y$10$31H.DK.qcBIgtJM3ugsay.pSrlTZvgpOQXUmq1kgaDEaxle7O2viO', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3'),
('Badu', 'Badudu', '', 1, '123', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `Mahasiswanim` varchar(15) NOT NULL,
  `Dosennip` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `statusPembimbing` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembimbing`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguji`
--

CREATE TABLE `penguji` (
  `Dosennip` varchar(20) NOT NULL,
  `Ujianid` int(10) NOT NULL,
  `statusPenguji` int(1) NOT NULL,
  `id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penguji`
--

INSERT INTO `penguji` (`Dosennip`, `Ujianid`, `statusPenguji`, `id`, `nilai`) VALUES
('1001', 17, 1, 3, 90),
('1002', 17, 2, 4, 88),
('123', 18, 1, 6, 0),
('1002', 18, 2, 9, 88),
('1003', 17, 3, 12, 90),
('165150201111300', 18, 3, 15, 0),
('1001', 19, 1, 17, 90),
('1002', 19, 2, 18, 88),
('1003', 19, 3, 19, 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kode` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `jurusankode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
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
-- Struktur dari tabel `publikasi`
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
-- Dumping data untuk tabel `publikasi`
--

INSERT INTO `publikasi` (`idJurnal`, `judulArtikel`, `namaJurnal`, `volumeDanNoTerbitan`, `kategoriJurnal`, `statusJurnal`, `Mahasiswanim`, `bukti`, `tanggal`, `valid`) VALUES
(18, 'pengaruh air a dengan kandungan y', 'IEEE', '12/1', 'kosong', 'Internasional', '165150201111231', '1562572581__checker_2.jpg', '2019-07-13', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviewer`
--

CREATE TABLE `reviewer` (
  `Dosennip` varchar(20) NOT NULL,
  `publikasiidJurnal` int(11) NOT NULL,
  `statusReviewer` int(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
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
  `komentar` varchar(255) NOT NULL DEFAULT 'kosong'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id`, `tgl_ujian`, `bobot`, `nilai_akhir`, `statusUjian`, `kodeUjiankode`, `MahasiswaNim`, `bukti`, `valid`, `tgl_tambah_ujian`, `komentar`) VALUES
(1, '2019-07-12', 0, 0, 1, 1, '100', '', 1, '2019-07-12', ''),
(11, '2019-07-22', 0, 0, 2, 4, '165150201111231', '1562573807_165150201111231_checker_2.jpg', 2, '2019-07-08', 'kosong'),
(12, '2019-07-10', 0, 0, 2, 1, '165150201111231', '1562635690_165150201111231_checker_2.jpg', 2, '2019-07-09', 'kosong'),
(13, '2019-07-12', 0, 0, 2, 2, '165150201111231', '1562635883_165150201111231_603-951-1-SM.pdf', 2, '2019-07-09', 'kosong'),
(16, '2019-07-12', 0, 0, 2, 3, '165150201111231', '1562638067_165150201111231_603-951-1-SM.pdf', 2, '2019-07-09', 'kosong'),
(17, '2019-07-14', 0, 89.3333, 2, 1, '165150201111231', '1563007447_165150201111231_603-951-1-SM.pdf', 3, '2019-07-13', '-'),
(18, '2019-07-18', 0, 29.3333, 2, 2, '165150201111231', '1563053544_165150201111231_603-951-1-SM.pdf', 1, '2019-07-13', 'kosong'),
(19, '2019-07-19', 0, 82.6667, 2, 3, '165150201111231', '1563155019_165150201111231_603-951-1-SM.pdf', 1, '2019-07-15', 'bagus boss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `user_profile_kode` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_profile_kode`, `username`, `password`, `is_active`, `nama`, `date_created`, `image`) VALUES
(1, 4, '165150201111230', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'yusril', 1, ''),
(2, 5, '165150201111231', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini mahasiswa', 1, ''),
(3, 3, '165150201111232', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini pimpinan', 1, ''),
(4, 2, '165150201111233', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini operator', 1, ''),
(5, 1, '165150201111234', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini admin', 1, ''),
(7, 1, 'Kharis', '$2y$10$EPlufTRpiNhfdmbWxkbguOEAx7mfTJcWflTTU74IqTL1lJxaBSGlS', 1, 'Misbakhul', 0, 'default.png'),
(12, 4, 'Madi', '$2y$10$UIavJUuWT.tTDUrDOjcDA.R85nORim.czgbktH6Pv/9KF.3BuYWri', 1, 'Madi Aryo Kuncoro', 0, 'default.png'),
(13, 4, '17515', '$2y$10$P518PNI6bxGtJdAN5JxagO.lY4zNTv6o5sHBZSswybzToYy3.LqPi', 1, 'Dimas', 0, 'default.png'),
(15, 5, '100', '$2y$10$wmMl75.67I/1nQA6VyOY7uATnV7VaoCIByR1rLvCg6ZIG7EPFnSGG', 1, 'Kharis Saja', 0, '237627.jpg'),
(16, 4, '1001', '$2y$10$/wsRGXhiBswtY1hf5S.6t.4GFCi23ebi26KH6y/DkpYmEg7tFsFwu', 1, 'Dosen A', 0, 'default.png'),
(17, 4, '1002', '$2y$10$3tIf6ve9fv26a7eLNqFomOAG6gTHe1E3zW8W.W9FM3kk2bcFRQBmW', 1, 'Dosen B', 0, 'default.png'),
(18, 4, '1003', '$2y$10$ChlyJ4qzT0HWTSQ5DKDisunMGjTd8IcKUUFjmJMxcw1rhwuvXhPNu', 1, 'Dosen C', 0, 'default.png'),
(19, 5, '2001', '$2y$10$DL0fW0HcYL7ZhGrtZcY.juSbDUbhaW9vOs1Gh.mkf0SMTVys4c0Du', 1, 'Mahasiswa A', 0, 'default.png'),
(20, 5, '2002', '$2y$10$7OmB4W1VU.iQ7UIUctqrauX3qeCeDGG/1bCHgQF1T3BXaQhgBTvmm', 1, 'Mahasiswa B', 0, 'default.png'),
(21, 5, '2003', '$2y$10$aWBD9.9kxTSnwGW5jTq2ReN/mKiDkAbMRqRfzdkeYXN4WaFZ5EtTu', 1, 'Mahasiswa C', 0, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userprofile`
--

CREATE TABLE `userprofile` (
  `kode` int(11) NOT NULL,
  `jenisUser` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `userprofile`
--

INSERT INTO `userprofile` (`kode`, `jenisUser`) VALUES
(1, 'Administrator'),
(4, 'Dosen'),
(5, 'mahasiswa'),
(2, 'Operator'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `user_profil_kode` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
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
(10, 1, 6),
(11, 2, 6),
(12, 3, 6),
(13, 4, 6),
(14, 5, 0),
(15, 4, 0),
(16, 3, 0),
(17, 2, 0),
(18, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Pimpinan'),
(4, 'Dosen'),
(5, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `judul`, `url`, `ikon`, `is_active`, `menu_id`) VALUES
(1, 'Profil', 'mahasiswa/profil', 'far fa-fw fa-id-card', '1', 5),
(2, 'Ujian', 'mahasiswa/ujian', 'fas fa-fw fa-clipboard', '1', 5),
(3, 'Publikasi', 'mahasiswa/publikasi', 'fas fa-fw fa-paper-plane', '1', 5),
(4, 'Bimbingan', 'dosen/bimbingan', 'fas fa-fw fa-graduation-cap', '1', 4),
(5, 'Profil', 'dosen/profil', 'far fa-fw fa-id-card', '1', 4),
(6, 'Input Nilai', 'dosen/inputNilai', 'fas fa-fw fa-pen-alt', '1', 4),
(7, 'Laporan Status Mahasiswa', 'pimpinan/laporanStatusMhs', 'fas fa-fw fa-user-graduate', '1', 3),
(8, 'Laporan Dosen', 'pimpinan/laporanDosen', 'fas fa-fw fa-book-reader', '1', 3),
(9, 'Rekap Dosen', 'pimpinan/rekapDosen', 'fas fa-fw fa-book', '1', 3),
(10, 'Mahasiswa', 'operator/mahasiswa', 'fas fa-fw fa-graduation-cap', '1', 2),
(11, 'Dosen', 'operator/dosen', 'fas fa-fw fa-chalkboard-teacher', '1', 2),
(12, 'Validasi', 'operator/validasi', 'fas fa-fw fa-check-circle', '1', 2),
(13, 'Manajemen User', 'admin/manajemenUser', 'fas fa-fw fa-fingerprint', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nama` (`nama_dosen`);

--
-- Indexes for table `isianmahasiswa`
--
ALTER TABLE `isianmahasiswa`
  ADD PRIMARY KEY (`id`,`Mahasiswanim`),
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
  ADD KEY `pembimbing_ibfk_2` (`Mahasiswanim`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ujianid` (`Ujianid`),
  ADD KEY `Dosennip` (`Dosennip`);

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
  ADD KEY `publikasiidJurnal` (`publikasiidJurnal`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `isianmahasiswa`
--
ALTER TABLE `isianmahasiswa`
  ADD CONSTRAINT `FKisianMahas737699` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodikode`) REFERENCES `prodi` (`kode`);

--
-- Ketidakleluasaan untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD CONSTRAINT `pembimbing_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `pembimbing_ibfk_2` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`);

--
-- Ketidakleluasaan untuk tabel `penguji`
--
ALTER TABLE `penguji`
  ADD CONSTRAINT `penguji_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`);

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `jurusankode` FOREIGN KEY (`jurusankode`) REFERENCES `jurusan` (`kode`);

--
-- Ketidakleluasaan untuk tabel `publikasi`
--
ALTER TABLE `publikasi`
  ADD CONSTRAINT `publikasi_ibfk_1` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`);

--
-- Ketidakleluasaan untuk tabel `reviewer`
--
ALTER TABLE `reviewer`
  ADD CONSTRAINT `reviewer_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `reviewer_ibfk_2` FOREIGN KEY (`publikasiidJurnal`) REFERENCES `publikasi` (`idJurnal`);

--
-- Ketidakleluasaan untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `FKUjian691129` FOREIGN KEY (`MahasiswaNim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`kodeUjiankode`) REFERENCES `kodeujian` (`kode`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_profile_kode`) REFERENCES `userprofile` (`kode`);

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`user_profil_kode`) REFERENCES `userprofile` (`kode`);

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
