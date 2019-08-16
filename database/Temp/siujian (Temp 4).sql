-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Agu 2019 pada 19.13
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
  `jenjang` varchar(50) NOT NULL,
  `noTlpnDosen` varchar(20) NOT NULL,
  `AlamatDosen` varchar(256) NOT NULL,
  `prodi_dosen` int(11) NOT NULL,
  `jabatan_pimpinan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `posisi`, `statusAktif`, `jenjang`, `noTlpnDosen`, `AlamatDosen`, `prodi_dosen`, `jabatan_pimpinan`) VALUES
('1001', 'Dosen A', 0, 1, '', '08123456789', 'Btn Permata Jingga', 1, ''),
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

--
-- Dumping data untuk tabel `isianmahasiswa`
--

INSERT INTO `isianmahasiswa` (`id`, `judulAkhir`, `paradigma`, `kataKunci`, `tujuanPenelitian`, `metodePenelitian1`, `metodePenelitian2`, `temuan`, `kontribusiDanImplikasi`, `Mahasiswanim`) VALUES
('0', 'judul pertama', 'asd', 'asadsa', '', '', '', '', '', '2001'),
('1', 'ASD', 'bcdasasasasasdascaiojc ', 'ddddddddddddddddd', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'bcd', 'bcd', 'ggggg', 'ddddd', '100'),
('2', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'aahahahhaha', '101'),
('3', 'Wadidaw', 'Hahaha', 'Hahaha', 'Hahaha', 'Hahaha', 'Hahaha', 'Hahaha', 'Hahaha', '165150201111231'),
('4', 'BOARD OF DIRECTOR’S CHARACTERISTICS, INTELLECTUAL ', '-', 'Corporate Governance, Board of Directors, Intellec', 'Tujuan penelitian', 'Metode penelitian 1', 'Metode penelitian 2', 'temuan', 'kontribusi dan implikasi', '2003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_notif`
--

CREATE TABLE `jenis_notif` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_notif`
--

INSERT INTO `jenis_notif` (`id`, `keterangan`) VALUES
(1, 'Tambah Publikasi (Mahasiswa)'),
(2, 'Tambah Ujian (Mahasiswa)');

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
  `nama_ujian` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `bobot_nilai` float NOT NULL,
  `angka_mutu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kodeujian`
--

INSERT INTO `kodeujian` (`kode`, `nama_ujian`, `status`, `bobot_nilai`, `angka_mutu`) VALUES
(1, 'Ujian Komisi Proposal', 0, 1, 0.1),
(2, 'Ujian Proposal', 0, 1, 0.2),
(3, 'Ujian Seminar Hasil', 0, 1, 0.3),
(4, 'Ujian Tesis', 0, 1, 0.4),
(5, 'Makalah 1', 1, 0.5, 0.2),
(6, 'Makalah 2', 1, 0.5, 0.2),
(7, 'Seminar Proposal', 1, 0.4, 0.1),
(8, 'Proposal', 1, 0.6, 0.1),
(9, 'Persentasi 3', 1, 0.2, 0.7),
(10, 'Seminar Hasil', 1, 0.2, 0.7),
(11, 'Eksternal Review', 1, 0.1, 0.7),
(12, 'Ujian Akhir', 1, 0.5, 0.7),
(13, 'Ujian Proposal', 2, 1, 0.1),
(14, 'Pelaksanaan Penelitian', 2, 1, 0.2),
(15, 'Seminar Hasil Peneltian', 2, 1, 0.3),
(16, 'Ujian Disertasi', 2, 1, 0.4);

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
  `jenjang` varchar(50) NOT NULL,
  `nilaiTA` float NOT NULL,
  `nilai_huruf` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `noTest`, `prodikode`, `password`, `angkatan`, `semester`, `jalur`, `konsentrasi`, `alamat`, `noTelp`, `asalStudi`, `judulTugasAkhir`, `tglMasuk`, `tglMulaiTA`, `statusKelulusan`, `statusWisuda`, `statusTOEFL`, `statusTPA`, `jenjang`, `nilaiTA`, `nilai_huruf`) VALUES
('100', 'Kharis Saja', '0spZ', 8, '$2y$10$cGdEqGQuHAMjA.8HuI1iKO71WMOgwVYF/v2QpPaUv0MKm0ggjMChe', 0, 0, '', '', 'Jl. Bunga No. 21', '090908080', '', '', '0000-00-00', '2019-07-18', 1, 0, 1, 1, 'S2', 83.85, 'A'),
('101', 'Badudu', '', 1, '123', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3', 0, 'K'),
('12356854', 'Dava', 'DmSo', 5, '$2y$10$Hh1O5RPlpuaE.cnOqoAoVO3JK8x.5lQpLMtssGR0.DQ.THDi9/glG', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3', 0, ''),
('165150201111001', 'Adi Saputra', 'AAA', 7, '123', 2016, 0, 'snmptn', '', 'Jl. Kucing', '0888', 'SMAN 1 Malang', 'How To Be Mature to Economics', '2019-07-01', '2019-07-10', 0, 1, 1, 1, 'S2', 0, 'K'),
('165150201111231', 'Aditya Yusril Fikri', '1234', 4, '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 2017, 2, 'snmptn', 'rpl', 'jln. malang aja', '0987654322', 'UB', 'pengaruh senyawa x terhadap senyawa y menggunakan metode z', '2017-06-14', '2019-07-01', 1, 0, 1, 1, 'S3', 82.67, 'A'),
('2001', 'Mahasiswa A', 'hQ4H', 6, '$2y$10$BlrYhlM/nz4ccGzS0WcRIuXxPNw5746lxe3hdhpMyIfWxZDYytXSa', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S2', 0, 'K'),
('2002', 'Mahasiswa B', 'Jter', 10, '$2y$10$gMz.Jv7IlcAdOndPo6God.gupoE./UQFcV5yFmUxzu7wibG2lUsLi', 0, 0, '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S3', 0, 'K'),
('2003', 'Mahasiswa C', 'Qg2C', 4, '$2y$10$31H.DK.qcBIgtJM3ugsay.pSrlTZvgpOQXUmq1kgaDEaxle7O2viO', 0, 0, '', '', 'di malang', '11234523', '', '', '0000-00-00', '2019-08-13', 1, 0, 0, 0, 'S2', 83.06, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notif` varchar(256) NOT NULL,
  `user` int(11) NOT NULL,
  `jenis_notif` varchar(256) NOT NULL,
  `tgl_notif` date NOT NULL,
  `status_baca` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `Mahasiswanim` varchar(15) NOT NULL,
  `Dosennip` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `statusPembimbing` int(1) NOT NULL,
  `tgl_tambah_pembimbing` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`Mahasiswanim`, `Dosennip`, `id`, `statusPembimbing`, `tgl_tambah_pembimbing`) VALUES
('100', '1001', 21, 1, '2019-07-14'),
('100', '1003', 22, 2, '2019-07-15'),
('165150201111231', '1001', 23, 1, '2019-07-15'),
('165150201111231', '1002', 24, 2, '2019-07-19'),
('165150201111001', '1001', 25, 1, '2019-07-13'),
('165150201111001', '1002', 27, 2, '2019-07-15'),
('165150201111231', '1003', 28, 3, '2019-07-22'),
('2001', '1001', 29, 1, '2019-08-12'),
('2001', '1002', 30, 2, '2019-08-12'),
('2003', '165150201111200', 31, 1, '2019-08-12'),
('2003', '165150201111230', 32, 2, '2019-08-12'),
('2003', '165150201111300', 33, 3, '2019-08-12'),
('12356854', '165150201111200', 36, 1, '2019-08-12'),
('12356854', '165150201111230', 37, 2, '2019-08-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguji`
--

CREATE TABLE `penguji` (
  `Dosennip` varchar(20) NOT NULL,
  `Ujianid` int(10) NOT NULL,
  `statusPenguji` int(1) NOT NULL,
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL DEFAULT '0',
  `tgl_tambah_penguji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penguji`
--

INSERT INTO `penguji` (`Dosennip`, `Ujianid`, `statusPenguji`, `id`, `nilai`, `tgl_tambah_penguji`) VALUES
('1001', 37, 1, 61, 80, '2019-08-09'),
('1003', 37, 2, 62, 80, '2019-08-09'),
('1001', 38, 1, 63, 78, '2019-08-09'),
('1003', 38, 2, 64, 81, '2019-08-09'),
('1001', 39, 1, 65, 88, '2019-08-09'),
('1003', 39, 2, 66, 85, '2019-08-09'),
('1001', 40, 1, 67, 80, '2019-08-09'),
('1003', 40, 2, 68, 90, '2019-08-09'),
('1001', 41, 1, 69, 82.3, '2019-08-09'),
('1002', 41, 2, 70, 82.3, '2019-08-09'),
('1003', 41, 3, 71, 82.3, '2019-08-09'),
('1001', 42, 1, 72, 80.08, '2019-08-09'),
('1002', 42, 2, 73, 80.08, '2019-08-09'),
('1003', 42, 3, 74, 80.08, '2019-08-09'),
('1001', 43, 1, 75, 82.7, '2019-08-09'),
('1002', 43, 2, 76, 82.7, '2019-08-09'),
('1003', 43, 3, 77, 82.7, '2019-08-09'),
('1001', 45, 1, 81, 80, '2019-08-10'),
('1002', 45, 2, 82, 80, '2019-08-10'),
('1003', 45, 3, 83, 80, '2019-08-10'),
('1001', 46, 1, 84, 80.83, '2019-08-10'),
('1002', 46, 2, 85, 80.83, '2019-08-10'),
('1003', 46, 3, 86, 80.83, '2019-08-10'),
('1001', 47, 1, 87, 85, '2019-08-10'),
('1002', 47, 2, 88, 85, '2019-08-10'),
('1003', 47, 3, 89, 85, '2019-08-10'),
('1001', 48, 1, 90, 83.59, '2019-08-10'),
('1002', 48, 2, 91, 83.59, '2019-08-10'),
('1003', 48, 3, 92, 83.59, '2019-08-10'),
('1001', 49, 1, 93, 80, '2019-08-12'),
('1002', 49, 2, 94, 81, '2019-08-12'),
('1003', 49, 8, 95, 75, '0000-00-00'),
('165150201111200', 49, 7, 96, 88, '0000-00-00'),
('165150201111200', 51, 1, 97, 88, '2019-08-12'),
('165150201111230', 51, 2, 98, 75, '2019-08-12'),
('165150201111300', 51, 3, 99, 80, '2019-08-12'),
('123', 51, 7, 100, 81, '0000-00-00'),
('9001', 51, 8, 101, 85, '0000-00-00'),
('165150201111200', 52, 1, 102, 88, '2019-08-12'),
('165150201111230', 52, 2, 103, 90, '2019-08-12'),
('165150201111300', 52, 3, 104, 81, '2019-08-12'),
('165150201111200', 53, 1, 105, 90, '2019-08-12'),
('165150201111230', 53, 2, 106, 75, '2019-08-12'),
('165150201111300', 53, 3, 107, 77, '2019-08-12'),
('165150201111200', 54, 1, 108, 90, '2019-08-12'),
('165150201111230', 54, 2, 109, 88, '2019-08-12'),
('165150201111300', 54, 3, 110, 75, '2019-08-12'),
('1001', 52, 7, 111, 80, '0000-00-00'),
('165150201111200', 56, 1, 113, 0, '2019-08-12'),
('165150201111230', 56, 2, 114, 0, '2019-08-12'),
('1001', 57, 1, 115, 90, '2019-08-13'),
('1002', 57, 2, 116, 90, '2019-08-13'),
('1003', 57, 3, 117, 90, '2019-08-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `status_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi`
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
  `valid` int(1) NOT NULL DEFAULT '2',
  `status_notif` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `publikasi`
--

INSERT INTO `publikasi` (`idJurnal`, `judulArtikel`, `namaJurnal`, `volumeDanNoTerbitan`, `kategoriJurnal`, `statusJurnal`, `Mahasiswanim`, `bukti`, `tanggal`, `valid`, `status_notif`) VALUES
(18, 'pengaruh air a dengan kandungan y', 'IEEE', '12/1', 'kosong', 'Internasional', '165150201111231', '1562572581__checker_2.jpg', '2019-07-13', 1, 1),
(19, 'Analisis A', 'JTIIK', '1/2', 'kosong', 'Nasional', '100', '', '2019-08-02', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviewer`
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
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id` int(10) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `bobot` double NOT NULL DEFAULT '0',
  `nilai_akhir` double DEFAULT '0',
  `nilai_akhir_angka` float NOT NULL,
  `angka_mutu_x_nilai` float NOT NULL,
  `statusUjian` int(1) NOT NULL DEFAULT '2',
  `kodeUjiankode` int(10) NOT NULL,
  `MahasiswaNim` varchar(15) NOT NULL,
  `bukti` varchar(255) NOT NULL DEFAULT 'kosong',
  `valid` int(3) NOT NULL DEFAULT '2',
  `tgl_tambah_ujian` date NOT NULL,
  `komentar` varchar(255) NOT NULL DEFAULT 'kosong',
  `nilai_huruf` varchar(2) NOT NULL,
  `status_notif` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id`, `tgl_ujian`, `bobot`, `nilai_akhir`, `nilai_akhir_angka`, `angka_mutu_x_nilai`, `statusUjian`, `kodeUjiankode`, `MahasiswaNim`, `bukti`, `valid`, `tgl_tambah_ujian`, `komentar`, `nilai_huruf`, `status_notif`) VALUES
(37, '2019-08-09', 3.5, 80, 0, 8, 1, 1, '100', 'kosong', 1, '2019-08-09', 'kosong', 'B+', 0),
(38, '2019-08-10', 3.5, 79.5, 0, 15.9, 1, 2, '100', 'kosong', 1, '2019-08-09', 'kosong', 'B+', 0),
(39, '2019-08-13', 4, 86.5, 0, 25.95, 1, 3, '100', 'kosong', 1, '2019-08-09', 'kosong', 'A', 0),
(40, '2019-08-18', 4, 85, 0, 34, 1, 4, '100', 'kosong', 1, '2019-08-09', 'kosong', 'A', 0),
(41, '2019-08-09', 4, 82.3, 81.19, 16.238, 1, 5, '165150201111231', 'kosong', 1, '2019-08-09', 'kosong', 'A', 1),
(42, '2019-08-10', 4, 80.08, 81.19, 16.238, 1, 6, '165150201111231', 'kosong', 1, '2019-08-09', 'kosong', 'A', 1),
(43, '2019-08-10', 4, 82.7, 0, 0, 1, 7, '165150201111231', 'kosong', 1, '2019-08-09', 'kosong', 'A', 1),
(45, '2019-08-12', 3.5, 80, 82.461, 57.7227, 1, 9, '165150201111231', 'kosong', 1, '2019-08-10', 'kosong', 'B+', 1),
(46, '2019-08-10', 4, 80.83, 82.461, 57.7227, 1, 10, '165150201111231', 'kosong', 1, '2019-08-10', 'kosong', 'A', 1),
(47, '2019-08-12', 4, 85, 82.461, 57.7227, 1, 11, '165150201111231', 'kosong', 1, '2019-08-10', 'kosong', 'A', 1),
(48, '2019-08-20', 4, 83.59, 82.461, 57.7227, 1, 12, '165150201111231', 'kosong', 1, '2019-08-10', 'kosong', 'A', 1),
(49, '2019-08-13', 4, 81, 0, 0, 1, 13, '2001', 'kosong', 1, '2019-08-12', 'kosong', 'A', 0),
(51, '2019-08-06', 4, 81.8, 8.18, 8.18, 1, 1, '2003', 'kosong', 1, '2019-08-12', 'kosong', 'A', 0),
(52, '2019-08-13', 4, 84.75, 16.95, 16.95, 1, 2, '2003', 'kosong', 1, '2019-08-12', 'kosong', 'A', 0),
(53, '2019-08-14', 4, 80.66666666666667, 24.2, 24.2, 1, 3, '2003', 'kosong', 1, '2019-08-12', 'kosong', 'A', 0),
(54, '2019-08-21', 4, 84.33, 33.732, 33.732, 1, 4, '2003', 'kosong', 1, '2019-08-12', 'kosong', 'A', 0),
(56, '2019-08-12', 0, 0, 0, 0, 2, 13, '12356854', 'kosong', 2, '2019-08-12', 'kosong', '', 1),
(57, '2019-08-13', 4, 90, 87.08, 8.708, 1, 8, '165150201111231', 'kosong', 1, '2019-08-13', 'kosong', 'A', 1);

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
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `jumlah_notifikasi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_profile_kode`, `username`, `password`, `is_active`, `nama`, `date_created`, `image`, `jumlah_notifikasi`) VALUES
(1, 4, '165150201111230', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'yusril', 1, 'default.png', 0),
(2, 5, '165150201111231', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini mahasiswa', 1, 'default.png', 0),
(3, 3, '165150201111232', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini pimpinan', 1, 'default.png', 0),
(4, 2, '165150201111233', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini operator', 1, 'default.png', 0),
(5, 1, '165150201111234', '$2y$10$HgGBhJC.JrNcCcVPJ1UZQOgHmvwD3x8W9aRqNLqvzVuOy/qK5oEFa', 1, 'ini admin', 1, 'default.png', 0),
(7, 1, 'Kharis', '$2y$10$EPlufTRpiNhfdmbWxkbguOEAx7mfTJcWflTTU74IqTL1lJxaBSGlS', 1, 'Misbakhul', 0, 'default.png', 0),
(13, 4, '17515', '$2y$10$P518PNI6bxGtJdAN5JxagO.lY4zNTv6o5sHBZSswybzToYy3.LqPi', 1, 'Dimas', 0, 'default.png', 0),
(15, 5, '100', '$2y$10$wmMl75.67I/1nQA6VyOY7uATnV7VaoCIByR1rLvCg6ZIG7EPFnSGG', 1, 'Kharis Saja', 0, '237627.jpg', 0),
(16, 4, '1001', '$2y$10$/wsRGXhiBswtY1hf5S.6t.4GFCi23ebi26KH6y/DkpYmEg7tFsFwu', 1, 'Dosen A', 0, 'default.png', 0),
(17, 4, '1002', '$2y$10$3tIf6ve9fv26a7eLNqFomOAG6gTHe1E3zW8W.W9FM3kk2bcFRQBmW', 1, 'Dosen B', 0, 'default.png', 0),
(18, 4, '1003', '$2y$10$ChlyJ4qzT0HWTSQ5DKDisunMGjTd8IcKUUFjmJMxcw1rhwuvXhPNu', 1, 'Dosen C', 0, 'default.png', 0),
(19, 5, '2001', '$2y$10$DL0fW0HcYL7ZhGrtZcY.juSbDUbhaW9vOs1Gh.mkf0SMTVys4c0Du', 1, 'Mahasiswa A', 0, 'default.png', 0),
(20, 5, '2002', '$2y$10$7OmB4W1VU.iQ7UIUctqrauX3qeCeDGG/1bCHgQF1T3BXaQhgBTvmm', 1, 'Mahasiswa B', 0, 'default.png', 0),
(21, 5, '2003', '$2y$10$aWBD9.9kxTSnwGW5jTq2ReN/mKiDkAbMRqRfzdkeYXN4WaFZ5EtTu', 1, 'Mahasiswa C', 0, 'default.png', 0),
(22, 2, '5001', '$2y$10$cnqVtP5CJ77bgkKDdNy7gOx93L3Q/JtKj8YMUpT7xzGR4cZKfhzTq', 1, 'Operator A', 0, 'default.png', 0),
(23, 3, '6001', '$2y$10$jOig2AsVDGmRVLai7IW89ubPwmC86pqlxGZrCwcv0T8H7UzmARHhG', 1, 'Pimpinan A', 0, 'default.png', 0),
(24, 3, '165150201111200', '$2y$10$cnqVtP5CJ77bgkKDdNy7gOx93L3Q/JtKj8YMUpT7xzGR4cZKfhzTq', 1, 'Bayu Priambadha', 0, 'default.png', 0),
(25, 3, '123', '$2y$10$cnqVtP5CJ77bgkKDdNy7gOx93L3Q/JtKj8YMUpT7xzGR4cZKfhzTq', 1, 'Madi Aryo Kuncoro', 0, 'default.png', 0),
(26, 3, '7000', '$2y$10$grFq2x0zUjzGRV6lZ1IB5uvwhktgXGy.tL3CeXrKghJZChZQX/05S', 1, 'Wahyudi', 0, 'default.png', 0),
(27, 3, '9001', '$2y$10$K2tDryvvgWYFE9jVVPJ2puimZAunCBeFqWejifXlhnbvpIRfBCCGm', 1, 'Jumadi', 0, 'default.png', 0),
(28, 5, '12356854', '$2y$10$MSqOqceEUzpVPJAyg1BN/.eXj5j/m7opOW4KB.aASdNTSpSPO7cNy', 1, 'Dava', 2019, 'default.png', 0);

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
(5, 'Mahasiswa'),
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
(10, 1, 5),
(11, 2, 5),
(12, 4, 5),
(22, 1, 4),
(23, 2, 4);

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
(7, 'Laporan Status Mahasiswa', 'pimpinan/laporanStatusMahasiswa', 'fas fa-fw fa-user-graduate', '1', 3),
(8, 'Laporan Dosen', 'pimpinan/laporanDosen', 'fas fa-fw fa-book-reader', '1', 3),
(9, 'Rekap Dosen', 'pimpinan/rekapDosen', 'fas fa-fw fa-book', '1', 3),
(10, 'Mahasiswa', 'operator/mahasiswa/list', 'fas fa-fw fa-graduation-cap', '1', 2),
(11, 'Dosen', 'operator/dosen/list', 'fas fa-fw fa-chalkboard-teacher', '1', 2),
(12, 'Pimpinan', 'operator/pimpinan', 'fas fa-fw fa-users', '1', 2),
(13, 'Ujian', 'operator/ujian', 'fas fa-fw fa-check-circle', '1', 2),
(14, 'Publikasi', 'operator/publikasi', 'fas fa-fw fa-check-circle', '1', 2),
(15, 'Manajemen User', 'admin/manajemenUser', 'fas fa-fw fa-fingerprint', '1', 1);

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
-- Indexes for table `jenis_notif`
--
ALTER TABLE `jenis_notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kodeujian`
--
ALTER TABLE `kodeujian`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `noTest` (`noTest`),
  ADD KEY `prodikode` (`prodikode`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

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
-- AUTO_INCREMENT for table `jenis_notif`
--
ALTER TABLE `jenis_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kodeujian`
--
ALTER TABLE `kodeujian`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `idJurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`prodi_dosen`) REFERENCES `prodi` (`kode`);

--
-- Ketidakleluasaan untuk tabel `isianmahasiswa`
--
ALTER TABLE `isianmahasiswa`
  ADD CONSTRAINT `isianmahasiswa_ibfk_1` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodikode`) REFERENCES `prodi` (`kode`);

--
-- Ketidakleluasaan untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD CONSTRAINT `pembimbing_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `pembimbing_ibfk_2` FOREIGN KEY (`Mahasiswanim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `pembimbing_ibfk_3` FOREIGN KEY (`statusPembimbing`) REFERENCES `posisi` (`id`);

--
-- Ketidakleluasaan untuk tabel `penguji`
--
ALTER TABLE `penguji`
  ADD CONSTRAINT `penguji_ibfk_1` FOREIGN KEY (`Dosennip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `penguji_ibfk_2` FOREIGN KEY (`statusPenguji`) REFERENCES `posisi` (`id`);

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
  ADD CONSTRAINT `reviewer_ibfk_2` FOREIGN KEY (`publikasiidJurnal`) REFERENCES `publikasi` (`idJurnal`),
  ADD CONSTRAINT `reviewer_ibfk_3` FOREIGN KEY (`statusReviewer`) REFERENCES `posisi` (`id`);

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
