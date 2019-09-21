-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2019 at 12:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
-- Table structure for table `agendaDosen`
--

CREATE TABLE `agendaDosen` (
  `id_agenda` int(11) NOT NULL,
  `nip_dosen` varchar(50) NOT NULL,
  `nama_agenda` varchar(256) NOT NULL,
  `tanggalMulai` date NOT NULL,
  `waktuMulai` varchar(10) NOT NULL DEFAULT '',
  `tanggalSelesai` date NOT NULL DEFAULT '0000-00-00',
  `waktuSelesai` varchar(10) NOT NULL DEFAULT '00:00:00',
  `durasi` varchar(10) NOT NULL DEFAULT '00:00:00',
  `hariAgenda` varchar(5) DEFAULT NULL,
  `ruangan` varchar(50) DEFAULT NULL,
  `kategoriAgenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jenisKelamin` varchar(2) NOT NULL,
  `statusPNS` varchar(10) NOT NULL,
  `posisi` varchar(50) NOT NULL,
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

INSERT INTO `dosen` (`nip`, `nama_dosen`, `jenisKelamin`, `statusPNS`, `posisi`, `statusAktif`, `jenjang`, `noTlpnDosen`, `AlamatDosen`, `prodi_dosen`, `jabatan_pimpinan`) VALUES
('195012081981031003', 'Prof.Dr.Drs. SURACHMAN , MSIE.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
('195204151974121001', 'Prof.Dr. M. PUDJIHARDJO , SE., MS.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
('195210241981031003', 'Prof. Dr. Drs. MARGONO , SU.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
('195212311978031012', 'Prof. Dr. BAMBANG SUBROTO , SE., Ak., MM.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
('195307271979031005', 'Prof. Dr. H. MOELJADI , SE., SU.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
('195408181983031004', 'Prof.Dr. H. ARMANU , SE., M.Sc.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
('195503221981031002', 'Prof.Dr. MARYUNANI , SE,. MS.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
('195504281986011001', 'Drs. JIMMY ANDRIANUS , MM., Ak.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('195505271981032001', 'Dr. Dra. MULTIFIAH , MS.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
('195508151984031002', 'Prof. Dr. KHUSNUL ASHAR , SE., M.A.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 14, ''),
('195509261983031002', 'Dr. BAMBANG PURNOMOSIDHI , SE., MBA., Ak.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
('195510141986012001', 'Dr. MINTARTI RAHAYU , SE., MS.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('195511171984032001', 'Dra. LILY HENDRASTI NOVADJAJA , MM.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('195604031985031003', 'Prof.Dr. SUTRISNO T. , SE., AK., M.Si.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
('195608101985031002', 'Dr. Drs. SUDJATNO , MS.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('195702121984031003', 'Prof.Dr. MUNAWAR , SE., DEA.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 6, ''),
('195707091983031001', 'Prof.Dr. MADE SUDARMA , SE., AK., MM.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
('195708131983031004', 'Dr. Drs. BAMBANG HARIADI , M.Ec., Ak.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 1, ''),
('195710051983032001', 'Dra. LINDA ARIAMTIKSNA , Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('195710221984031001', 'Drs. NASIKIN , Ak., MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('195802231984031003', 'Drs. SUNARYO , M.Si., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('195803181985031003', 'Dr. MUGIONO , SE., MM.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('195805111983032002', 'Dra. GRACE WIDIJOKO , MSA., Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('195805111986011002', 'Dr. Drs. M. ACHSIN , MM., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('195805291984031002', 'Prof.Dr. ACHMAD SUDIRO , SE., ME.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
('195806201983031001', 'Dr. Drs. AGUNG YUNIARINTO , MS.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('195807091986031002', 'EDDY SUPRAPTO , SE., ME.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 13, ''),
('195808201985031002', 'Drs. ALI DJAMHURI , Ak., M.Com., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
('195808291985031002', 'Drs. SYAEFULLAH , MM., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('195809271986011002', 'Prof. Dr. GHOZALI MASKI , SE., MS.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 6, ''),
('195811051986011001', 'ANANTO BASUKI , SE., MM.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('195902041986012001', 'Dra. WIWIK HIDAJAH EKOWATI , M.Si.,Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('195907101983031004', 'Dr. Drs. ISWAN NOOR , ME.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 14, ''),
('195907101986012001', 'Dr. ASTRID PUSPANINGRUM , SE., MM.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('195907261986011001', 'Dr. WAHDIYAT MOKO , SE., MM.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('195907311986012001', 'Dr. Dra. SUMIATI , M.Si.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('195909021986012001', 'Dr. Dra. ENDANG MARDIATI , M.Si., Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('195910251985031003', 'Drs. MUHAMMAD JUSUF WIBISANA , M.Ec., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('196001241986012001', 'Dr. Dra.  ERWIN SARASWATI , M.Acc.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 1, ''),
('196005161985032002', 'Dr. ROFIATY , SE., MM.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('196006151987011001', 'Prof. Dr. AGUS SUMAN , SE., DEA.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
('196008011986031005', 'Dr. ATIM DJAZULI , SE.,MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('196010301986011001', 'Dr. SUSILO , SE., MS.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
('196011111986012001', 'Dr. SITI AISJAH , SE., MS.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('196012251987011001', 'DAVID KALUGE , SE., MS., M.Ec.Dev., Ph.D', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
('196101211986011005', 'Dr. Drs. FATCHUR ROHMAN , M.Si.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('196101291998022001', 'Dr. Dra. ANDARWATI , M.E', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('196104111986012001', 'Dr. SRI MULJANINGSIH , SE., MSP.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
('196106301988021001', 'Prof. IWAN TRIYUWONO ,SE., Ak., M.Ec., Ph.D.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
('196109232006042001', 'Dr. Dra. KUSUMA RATNAWATI , MM.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('196111081986012002', 'Prof. Dr. Dra. NOERMIJATI , M.T.M.', 'P', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
('196112201986012001', 'Dr. HIMMIYATUL AMANAH JIWA JUWITA , SE., MM.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('196201101987011001', 'Prof. Drs. GUGUS IRIANTO , MSA., Ph.D., Ak.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
('196203151987011001', 'DWI BUDI SANTOSO , SE., MS., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 5, ''),
('196205101986012001', 'RISNA WIJAYANTI , SE., MM., Ph.D.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('196206071987011001', 'TOTO RAHARDJO , SE., MM.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('196211271988021001', 'Dr. Drs. ROEKHUDIN , M.Si., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
('196306221988022001', 'Dr. Dra. NUR KHUSNIYAH INDRAWATI , M.Si.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('196311161990021001', 'Dr. RACHMAD KRESNA SAKTI , SE., M.Si.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 13, ''),
('196407091991032007', 'Dr. Dra. LILIK PURWANTI , M.Si., Ak.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
('196410101998022001', 'Ir. NUR PRIMA WALUYOWATI , MM.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
('196410291989031001', 'Prof. Dr. CANDRA FAJRI ANANDA , SE., M.Sc.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
('196412032003121001', 'Prof. EKO GANIS SUKOHARSONO , SE., M.Com.Hons., Ph', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
('196503111989032001', 'Dra. MARLINA EKAWATY , M.Si., Ph.D.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 6, ''),
('196507281992031002', 'KOMARUDIN ACHMAD , SE.,M.Si.,Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('196508131990021001', 'Dr.  BOGAT AGUS RIYONO , SE., MSA., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('196509181990021001', 'Drs. MUHAMMAD TOJIBUSSABIRIN , MBA., Ak.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 4, ''),
('196511021992031002', 'Drs. IMAM SUBEKTI , Ak., M.Si., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
('196512301991031003', 'DIDIED POERNAWAN AFFANDY , SE.,MBA., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('196605251991031002', 'Dr. Drs. ZAKI BARIDWAN , Ak., M.Si.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('196607061991031001', 'Drs. NURKHOLIS , M.Bus.(Acc)., Ak., Ph.D', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
('196707142005012001', 'Dr. Dra. ARUM PRASTIWI , M.Si.,Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('196809111991032003', 'Dr. Dra. ASFI MANZILATI , ME.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 13, ''),
('196810071992032001', 'TUBAN DRIJAH HERAWATI , SE., Ak., MM.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
('196810291999032001', 'Dr. WURYAN ANDAYANI , SE., Ak., M.Si.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
('196906091993032004', 'NURUL FACHRIYAH , SE.,MSA.,Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('196912101997031003', 'Dr.rer.pol. WILDAN SYAFITRI , SE., ME.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 6, ''),
('196912312009121002', 'Dr. AJI DEDI MULAWARMAN , SP., MSA.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
('197009221995121002', 'ARIF HOETORO , SE., MT., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 14, ''),
('197101111998021001', 'Dr. MOH. KHUSAINI , SE., M.Si., MA.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 15, ''),
('197106232002121002', 'AINUR ROFIQ , SE., MM., Ph.D.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('197206111997022001', 'SARI ATMINI , SE., M.Si., Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('197210052000031001', 'NOVAL ADIB , SE., M.Si., Ak., Ph.D.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('197302102001121001', 'NURMAN SETIAWAN FADJAR , SE., M.Sc.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 6, ''),
('197303221997021001', 'Prof. AHMAD ERANI YUSTIKA , SE., M.Sc., Ph.D.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
('197305172003121002', 'SHOFWAN , SE., M.Si.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 6, ''),
('197307081997021001', 'Dr. NANANG SURYADI , SE., MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('197403022005012001', 'Dr. NURUL BADRIYAH , SE.,ME.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 13, ''),
('197409102002121001', 'Dr. AULIA FUAD RAHMAN , SE., M.Si., Ak.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
('197410181999031001', 'BAHTIAR FITANTO , SE.,MT.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 6, ''),
('197412082000032001', 'Dr. CHRISTIN SUSILOWATI , SE., M.Si.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
('197504052003121001', 'Dr.  SYAIFUL IQBAL , SE., M.Si., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('197505141999032001', 'TYAS DANARTI HASCARYANI , SE., ME.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 13, ''),
('197511052003122001', 'DEVY PUSPOSARI , SE., M.Si., Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 4, ''),
('197606282002121002', 'ABDUL GHOFAR , SE., M.Si.,DBA.,Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('197609102002121003', 'PUTU MAHARDIKA ADI SAPUTRA , SE.,M.Si.,MA., Ph.D', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 13, ''),
('197610032001121003', 'DEVANTO SHASTA PRATOMO , SE., M.Si., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
('197612102003121002', 'DODI WIRAWAN IRAWANTO , SE., M.Com., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
('197804152005021001', 'Dr. MOHAMAD KHOIRU RUSYDI , SE., M.Ak., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
('197805182008121003', 'AKIE RUSAKTIVA RUSTAM , SE., M.SA., Ak.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('197806212005011003', 'LUTFI HARRIS , SE., M.Ak., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
('197904032005011002', 'HELMY ADAM , SE. ,MSA., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
('197908262008122002', 'RIZKA FITRIASARI , SE., M.SA., Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('197912072008121001', 'ADRI PUTRA NUGRAHA , SE., MPA.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('197912172008122002', 'ANITA WIJAYANTI , SE., M.SA., Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('198001162005022001', 'YENEY WIDYA PRIHATININGTIAS , SE., Ak., MSA.,DBA.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
('198005112008122002', 'MYCHELIA CHAMPACA , SE., Ak., MM.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
('198012282005011002', 'FERRY PRASETYIA , SE., M.App.Ec.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 13, ''),
('198107022005011002', 'SETYO TRI WAHYUDI , SE., MEc., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 13, ''),
('198109182008122002', 'IKHTIARA KAIDENI ISHARINA , SE., MM.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 9, ''),
('198112052008122004', 'Dr.  DESI TRI KURNIAWATI , SE., MM.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
('198203092008011008', 'MISBAHUDDIN AZZUHRI , SE., MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('198204232005022001', 'FARAH WULANDARI PANGESTUTY , SE., ME.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 13, ''),
('198208072005011002', 'DIAS SATRIA , SE., M.App.Ec., Ph.D.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 13, ''),
('198208202008012009', 'SRI PALUPI PRABANDARI , SE., MM.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 10, ''),
('198208252008121003', 'DIMAS HENDRAWAN , SE., MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
('198303192008011003', 'ANANDA SABIL HUSSEIN , SE., M.Com.,Ph.D', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 10, ''),
('198401232015041002', 'AJI PURBA TRAPSILA , SE.I., ME.I', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 16, ''),
('198410242010121003', 'ACHMAD ZAKY , SE., MSA., Ak.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('198411212019031004', 'MOH. ATHOILLAH , S.E., M.E.', 'L', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 13, ''),
('198412202014042002', 'MIRNA AMIRYA , SE., MSA, Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('198503032014041001', 'SATRIYA CANDRA BONDAN PRABOWO , SE., MM.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
('198604022015042002', 'KRISTIN ROSALINA , S.E., MSA., Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
('198604032015041002', 'AL MUIZZUDDIN FAZAALLOH , SE., ME.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 13, ''),
('198606242015041001', 'BAYU ILHAM PRADANA , S.E., M.M.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
('198608012015041004', 'NUGROHO SURYO BINTORO , S.E., M.Ec.Dev.', 'L', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 13, ''),
('198706012019032009', 'RISCA FITRI AYUNI , S.E., M.M.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 9, ''),
('198711132019032009', 'NURLITA NOVIANTI , SE., MSA., Ak.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 1, ''),
('199301162019032015', 'LAILA MASRURO PIMADA , S.E., M.SEI.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 14, ''),
('199304172019032030', 'PUSVITA YUANA , SE., M.Sc.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 9, ''),
('2011068401091001', 'DIAN ARI NUGROHO , S.E., M.M', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
('2011068506121001', 'YUKI FIRMANTO , SE., MSA., Ak', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 2, ''),
('2011068702152001', 'PUTU PRIMA WULANDARI , SE., MSA., Ak.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 2, ''),
('2012017811261001', 'YUSUF RISANTO , SE., MM.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 8, ''),
('2012018106201001', 'HENDI SUBANDI , SE.,MA.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 2, ''),
('2012018509031001', 'RADITYO PUTRO HANDRITO , SE., MM.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 8, ''),
('2012018512212001', 'AJENG KARTIKA GALUH , SE., ME.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
('2012018609292001', 'NADIYAH HIRFIYANA ROSITA , SE., MM.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 8, ''),
('2012018707212001', 'IDA YULIANTI , SE., MM., MBA', 'P', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 7, ''),
('2012048712072001', 'VIETHA DEVIA SS , SE., ME.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
('2013018809022001', 'VIRGINIA NUR RAHMANTI , SE., M.S.A., Ak.', 'P', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 2, ''),
('2013048303052001', 'DWI RETNO WIDIYANTI , SE.I., M.Sc', 'P', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 11, ''),
('2013048305101001', 'TAUFIQ ISMAIL , SE., SS., MM', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 7, ''),
('2013048406211001', 'RAHADITYA YUNIANTO , SE., MM', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
('2013048409291001', 'AGUNG NUGROHO ADI , SE., MM., MM(HRM).', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
('2013048507301001', 'SIGIT PRAMONO , SE., M.Sc.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 8, ''),
('2013048605212001', 'AJENG WAHYU PUSPITASARI , SE., MA.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 12, ''),
('2013128812142001', 'AYU FURY PUSPITA , SE., M.S.A., Ak', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 2, ''),
('2014048702201001', 'FAISHAL FADLI , SE., M.E.', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
('2014058707032001', 'PUSPITASARI WAHYU ANGGRAENI , SE.,M.Ec.Dev', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
('2015078810012001', 'YENNY KORNITASARI , SE., ME.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
('2016078109192001', 'RILA ANGGRAENI , S.E., M.M.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
('2016078404122001', 'RADITHA DWI VATA HAPSARI , S.E., M.M.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
('2016078505091001', 'ANAS BUDIHARJO , S.H.I., M.A.', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 3, ''),
('2016078711241001', 'AMINNULLAH ACHMAD MUTTAQIN , M.Sc. Fin.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 12, ''),
('2016079101181001', 'ATU BAGUS WIGUNA , S.E., M.E.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 11, ''),
('2016079111051001', 'M. ABDI DZIL IKHRAM W , S.E., M.M.', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
('2017028406041001', 'MOH. ERFAN ARIF , S.E., M.M.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 7, ''),
('3000', 'Dosen', '', '', '', 1, 'S2', '', '', 3, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode`, `nama_jurusan`) VALUES
(1, 'Akuntansi'),
(2, 'Ekonomi Islam'),
(3, 'Ilmu Akuntansi'),
(4, 'Ilmu Ekonomi'),
(5, 'Ilmu Ekonomi dan Studi Pembangunan'),
(6, 'Manajemen'),
(7, 'Studi Pembangunan');

-- --------------------------------------------------------

--
-- Table structure for table `kodeujian`
--

CREATE TABLE `kodeujian` (
  `kode` int(10) NOT NULL,
  `nama_ujian` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `bobot_nilai` float NOT NULL,
  `angka_mutu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodeujian`
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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `noTest` varchar(10) NOT NULL,
  `prodikode` int(11) NOT NULL,
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
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `noTest`, `prodikode`, `angkatan`, `semester`, `jalur`, `konsentrasi`, `alamat`, `noTelp`, `asalStudi`, `judulTugasAkhir`, `tglMasuk`, `tglMulaiTA`, `statusKelulusan`, `statusWisuda`, `statusTOEFL`, `statusTPA`, `jenjang`, `nilaiTA`, `nilai_huruf`) VALUES
('5000', 'Misbakhul', 'xwB2', 2, 0, 0, '', '', '', '086', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 'S2', 0, '');

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
('5000', '195012081981031003', 1, 1, '2019-09-11'),
('5000', '195204151974121001', 2, 2, '2019-09-11'),
('5000', '195210241981031003', 3, 3, '2019-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `Dosennip` varchar(20) NOT NULL,
  `Ujianid` int(10) NOT NULL,
  `statusPenguji` int(1) NOT NULL,
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL DEFAULT 0,
  `tgl_tambah_penguji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji`
--

INSERT INTO `penguji` (`Dosennip`, `Ujianid`, `statusPenguji`, `id`, `nilai`, `tgl_tambah_penguji`) VALUES
('195012081981031003', 2, 1, 4, 90, '2019-09-13'),
('195204151974121001', 2, 2, 5, 90, '2019-09-13'),
('195210241981031003', 2, 3, 6, 90, '2019-09-13'),
('195012081981031003', 3, 1, 7, 0, '2019-09-17'),
('195204151974121001', 3, 2, 8, 0, '2019-09-17'),
('195210241981031003', 3, 3, 9, 0, '2019-09-17');

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
  `jenjang` varchar(3) NOT NULL,
  `jurusankode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode`, `nama_prodi`, `jenjang`, `jurusankode`) VALUES
(1, 'Akuntansi', 'S3', 1),
(2, 'Akuntansi', 'S2', 1),
(3, 'Ekonomi Islam', 'S2', 2),
(4, 'Ilmu Akuntansi', 'S3', 3),
(5, 'Ilmu Ekonomi', 'S3', 4),
(6, 'Ilmu Ekonomi dan Studi Pembangunan', 'S3', 5),
(7, 'Manajemen', 'S2', 6),
(8, 'Kewirausahaan', 'S2', 6),
(9, 'Manajemen', 'S3', 6),
(10, 'Kewirausahaan', 'S3', 6),
(11, 'Ekonomi Pembangunan', 'S2', 7),
(12, 'Ekonomi Islam', 'S2', 7),
(13, 'Ekonomi Pembangunan', 'S3', 7),
(14, 'Ekonomi Islam', 'S3', 7),
(15, 'Keuangan dan Perbankan', 'S3', 7),
(16, 'Economics', 'S3', 7);

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
  `valid` int(1) NOT NULL DEFAULT 2,
  `status_notif` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`idJurnal`, `judulArtikel`, `namaJurnal`, `volumeDanNoTerbitan`, `kategoriJurnal`, `statusJurnal`, `Mahasiswanim`, `bukti`, `tanggal`, `valid`, `status_notif`) VALUES
(1, 'aa', 'asas', '12/3', 'kosong', 'Nasional Terakredita', '5000', '', '2019-09-13', 2, 1);

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
  `bobot` double NOT NULL DEFAULT 0,
  `nilai_akhir` double DEFAULT 0,
  `nilai_akhir_angka` float NOT NULL,
  `angka_mutu_x_nilai` float NOT NULL,
  `statusUjian` int(1) NOT NULL DEFAULT 2,
  `kodeUjiankode` int(10) NOT NULL,
  `MahasiswaNim` varchar(15) NOT NULL,
  `bukti` varchar(255) NOT NULL DEFAULT 'kosong',
  `valid` int(3) NOT NULL DEFAULT 2,
  `tgl_tambah_ujian` date NOT NULL,
  `komentar` varchar(255) NOT NULL DEFAULT 'kosong',
  `nilai_huruf` varchar(2) NOT NULL,
  `status_notif` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `tgl_ujian`, `bobot`, `nilai_akhir`, `nilai_akhir_angka`, `angka_mutu_x_nilai`, `statusUjian`, `kodeUjiankode`, `MahasiswaNim`, `bukti`, `valid`, `tgl_tambah_ujian`, `komentar`, `nilai_huruf`, `status_notif`) VALUES
(2, '2019-09-13', 4, 90, 0, 0, 1, 1, '5000', 'kosong', 1, '2019-09-13', 'kosong', 'A', 1),
(3, '2019-09-11', 0, 0, 0, 0, 2, 3, '5000', 'kosong', 2, '2019-09-17', 'kosong', '', 1);

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
  `date_created` date NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `jumlah_notifikasi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_profile_kode`, `username`, `password`, `is_active`, `nama`, `date_created`, `image`, `jumlah_notifikasi`) VALUES
(189, 4, '195708131983031004', '$2y$10$MQN7/96fr8lBGC1opsJGH.Avcs2iGkHy.vBO0Jkk/VCzMaE.yLcsC', 1, 'Dr. Drs. BAMBANG HARIADI , M.Ec., Ak.', '2019-08-20', 'default.png', 0),
(190, 4, '196211271988021001', '$2y$10$FJ3eMwB8Sn7i85OTCAEIG.ONQLn78aWCV80Pf8/MGoWrHwN/drTe2', 1, 'Dr. Drs. ROEKHUDIN , M.Si., Ak.', '2019-08-20', 'default.png', 0),
(191, 4, '197804152005021001', '$2y$10$MoKYQd0PdYvwciFBS9jfmOGvaPuDrfdJVulYcug.kKbslPInQUoQ6', 1, 'Dr. MOHAMAD KHOIRU RUSYDI , SE., M.Ak., Ak.', '2019-08-20', 'default.png', 0),
(192, 4, '2011068702152001', '$2y$10$5Uo7pOgEjLP6SlCnFFeaf.M3ybnRy3oy9vfOi72DL15fJl4HFHGaq', 1, 'PUTU PRIMA WULANDARI , SE., MSA., Ak.', '2019-08-20', 'default.png', 0),
(193, 4, '2011068506121001', '$2y$10$tRjMnkRPFND.cRaGtDaS1OUny96laAdSTGp/aEjdyYY9y59HY3gbG', 1, 'YUKI FIRMANTO , SE., MSA., Ak', '2019-08-20', 'default.png', 0),
(194, 4, '2012018106201001', '$2y$10$LgRiJVF1TJrXBZyc6lOxXOKIQX3X.o911eOJUbfBho3yPMqj.RNg2', 1, 'HENDI SUBANDI , SE.,MA.', '2019-08-20', 'default.png', 0),
(195, 4, '2013018809022001', '$2y$10$bxfiveMxW2TCbMvsTD0/P.v8lWtH3GVG0oMbn28X66qeXE9pRE1Pu', 1, 'VIRGINIA NUR RAHMANTI , SE., M.S.A., Ak.', '2019-08-20', 'default.png', 0),
(196, 4, '2013128812142001', '$2y$10$jk7fUoxoI1JRvpDQjfvSFuU80UNmo4D/E3ZHwfgliUmWc2bs2SEEm', 1, 'AYU FURY PUSPITA , SE., M.S.A., Ak', '2019-08-20', 'default.png', 0),
(197, 4, '195212311978031012', '$2y$10$C6xfy7r3DIE4wPbdenPhO.z3FaW1shqTy61dkb2womX7pCFFPpdoG', 1, 'Prof. Dr. BAMBANG SUBROTO , SE., Ak., MM.', '2019-08-20', 'default.png', 0),
(198, 4, '195707091983031001', '$2y$10$Vg2sXU2ZUvHvhQv.jeYFP.idoNrRr7E5DyVPJdITniVBr0sfN2dbO', 1, 'Prof.Dr. MADE SUDARMA , SE., AK., MM.', '2019-08-20', 'default.png', 0),
(199, 4, '195604031985031003', '$2y$10$t2CoPt8IM2l0SEKiH2hXOuOpDDKXjAkMDJ7xI2QS4Lq8Zu50xZMsC', 1, 'Prof.Dr. SUTRISNO T. , SE., AK., M.Si.', '2019-08-20', 'default.png', 0),
(200, 4, '196106301988021001', '$2y$10$OD.oc60rH4dbd7Bdun3k/.t3nflBsXeqmeK/.3O0dPtgL6geTOdYG', 1, 'Prof. IWAN TRIYUWONO ,SE., Ak., M.Ec., Ph.D.', '2019-08-20', 'default.png', 0),
(201, 4, '196412032003121001', '$2y$10$ssZuBEhSZ8lc9hYxnVqdk.heXqSQqWPxLc6KyTVJLQ2HRZ3fQQTuO', 1, 'Prof. EKO GANIS SUKOHARSONO , SE., M.Com.Hons., Ph', '2019-08-20', 'default.png', 0),
(202, 4, '196201101987011001', '$2y$10$j.5r2mJFH/3zpbUcLWoEiOqK.AM/QTcOCOpjvmy0V/g7am4X6W2E2', 1, 'Prof. Drs. GUGUS IRIANTO , MSA., Ph.D., Ak.', '2019-08-20', 'default.png', 0),
(203, 4, '196001241986012001', '$2y$10$hYxyJP0MLq/.jMfUmv5bDOEHi0mzQtjJnS1SqwDFOeoyBonYkGIty', 1, 'Dr. Dra.  ERWIN SARASWATI , M.Acc.', '2019-08-20', 'default.png', 0),
(204, 4, '196912312009121002', '$2y$10$JoHWRtIiGU29VpG1R2aSDumhflUHO/0QG8dzf0.72gPO4v0bBNmdW', 1, 'Dr. AJI DEDI MULAWARMAN , SP., MSA.', '2019-08-20', 'default.png', 0),
(205, 4, '196810071992032001', '$2y$10$ozXIz7nuOa.OG1NSr2ESu./EWZeyiYGFvLAtiWUFQVtvgujqcLCmW', 1, 'TUBAN DRIJAH HERAWATI , SE., Ak., MM.', '2019-08-20', 'default.png', 0),
(206, 4, '197806212005011003', '$2y$10$e5KFHuF1ruX7q97m4bt.qO0U0DsMD/VdeWy7cew7J2jn86tPZkTFC', 1, 'LUTFI HARRIS , SE., M.Ak., Ak.', '2019-08-20', 'default.png', 0),
(207, 4, '197904032005011002', '$2y$10$osxaDqDrZwP0DXMTFKy51OOHmfLiFqGcbikuJ3KOKyFX.6/EO8QdC', 1, 'HELMY ADAM , SE. ,MSA., Ak.', '2019-08-20', 'default.png', 0),
(208, 4, '195710051983032001', '$2y$10$6Ek7Ogra1782Txnojp8MB..XAwdYcg6hLVAF.Cqcj0McRtOoYeyfi', 1, 'Dra. LINDA ARIAMTIKSNA , Ak.', '2019-08-20', 'default.png', 0),
(209, 4, '196906091993032004', '$2y$10$uJZYbF3mc2Uq7a3q.XcB6eccTFIubXdkcNwAeZYHw9dih6xt/chVm', 1, 'NURUL FACHRIYAH , SE.,MSA.,Ak.', '2019-08-20', 'default.png', 0),
(210, 4, '197805182008121003', '$2y$10$G8arPopw3beQser7GyJymOkgFGgrMO5d303IGSG0vlmK5APtC7fLa', 1, 'AKIE RUSAKTIVA RUSTAM , SE., M.SA., Ak.', '2019-08-20', 'default.png', 0),
(211, 4, '197912172008122002', '$2y$10$pzcWCCnbs/P5JShVVmqxI.QeQPZbDFeNNVVub5sjqCMJ2ETJRufXS', 1, 'ANITA WIJAYANTI , SE., M.SA., Ak.', '2019-08-20', 'default.png', 0),
(212, 4, '197912072008121001', '$2y$10$J9tFO5/siwvhQUOXEedoJuD17K9ODOxLyXsM9SrmnVBBtjOwme2Ne', 1, 'ADRI PUTRA NUGRAHA , SE., MPA.', '2019-08-20', 'default.png', 0),
(213, 4, '197908262008122002', '$2y$10$Allo0qvvO3nH2ogPdb.77uWUWCz9UwRt0k.hQikASQUFjBekaVjTW', 1, 'RIZKA FITRIASARI , SE., M.SA., Ak.', '2019-08-20', 'default.png', 0),
(214, 4, '198410242010121003', '$2y$10$n7mmvKvQ20uI5XmQkkmVtO25FlK3qslwInuYBmLeH6X7ieMaZvJKG', 1, 'ACHMAD ZAKY , SE., MSA., Ak.', '2019-08-20', 'default.png', 0),
(215, 4, '198412202014042002', '$2y$10$VRmBNI/.xxORGz.aH1W0N.LT.znMRbjB1MTw5XI0z6udUWFWE866e', 1, 'MIRNA AMIRYA , SE., MSA, Ak.', '2019-08-20', 'default.png', 0),
(216, 4, '198604022015042002', '$2y$10$1g38hK1bGEiws02dBUIMXO.ymZ8DEt6ZMHoibAhc5I2Vw9mFz79uW', 1, 'KRISTIN ROSALINA , S.E., MSA., Ak.', '2019-08-20', 'default.png', 0),
(217, 4, '198711132019032009', '$2y$10$D8PTQ2ESgqfdkDEt4MzzG.CdhjnoqtP6dgQT24j8heOzYx5M9e7yq', 1, 'NURLITA NOVIANTI , SE., MSA., Ak.', '2019-08-20', 'default.png', 0),
(218, 4, '195504281986011001', '$2y$10$hhJE.bbMXl/bGzI0ClIEOexxolC6MRTe/ifCZfec.asT4rURYpJOq', 1, 'Drs. JIMMY ANDRIANUS , MM., Ak.', '2019-08-20', 'default.png', 0),
(219, 4, '2016078505091001', '$2y$10$Na0Fe3kC9XlVkd2oRiA9Neue9XM6ZrnLm6on/haNbeZxMSm0Vy61m', 1, 'ANAS BUDIHARJO , S.H.I., M.A.', '2019-08-20', 'default.png', 0),
(220, 4, '196511021992031002', '$2y$10$g1.fX4aJyt5yHgFl.OB1Z.Og.hynY9evtJT7aGPYPbWA0pG8xrct6', 1, 'Drs. IMAM SUBEKTI , Ak., M.Si., Ph.D.', '2019-08-20', 'default.png', 0),
(221, 4, '195808201985031002', '$2y$10$HHd./e85pz5.EWmlOwizJuQD4t.XIUAWDalAjjUEI8RKSTDmkcnRS', 1, 'Drs. ALI DJAMHURI , Ak., M.Com., Ph.D.', '2019-08-20', 'default.png', 0),
(222, 4, '196607061991031001', '$2y$10$PwGVnf0A/voP.75L16FrOuWBvklXR112g6S1//2tKs51ogomQv3oi', 1, 'Drs. NURKHOLIS , M.Bus.(Acc)., Ak., Ph.D', '2019-08-20', 'default.png', 0),
(223, 4, '195509261983031002', '$2y$10$FSQDkSNJxXxzkqJt5NZwgOwLXqJFjC4yyBvw94HYzOjyrBl0jPjcO', 1, 'Dr. BAMBANG PURNOMOSIDHI , SE., MBA., Ak.', '2019-08-20', 'default.png', 0),
(224, 4, '196407091991032007', '$2y$10$014yUkgzfPlo2Q7K1FxFwehSDiAJDsgr.nYMf1qzEXIjv0cEGmGOO', 1, 'Dr. Dra. LILIK PURWANTI , M.Si., Ak.', '2019-08-20', 'default.png', 0),
(225, 4, '197409102002121001', '$2y$10$a0fCNQ6bfiA8A4GSBryvuuNPwzdI3NsnVJ6Cfxt4aXn/Ty5PfSEca', 1, 'Dr. AULIA FUAD RAHMAN , SE., M.Si., Ak.', '2019-08-20', 'default.png', 0),
(226, 4, '195710221984031001', '$2y$10$4g8a.viDWHHQQUgIueto9.pldGUvBL5ua3df23J6BneJ54Isd7x6e', 1, 'Drs. NASIKIN , Ak., MM.', '2019-08-20', 'default.png', 0),
(227, 4, '195910251985031003', '$2y$10$bYRTG5ZWxPwqjcc4kxrd/u7YobgBw8kBSOVT3n4GHuyV0pwwVxHD6', 1, 'Drs. MUHAMMAD JUSUF WIBISANA , M.Ec., Ak.', '2019-08-20', 'default.png', 0),
(228, 4, '196605251991031002', '$2y$10$XzUh8xsDY5sB6HwynY1Ev.kFemmlsHZc/gY3emuHJZBqACpfRMADi', 1, 'Dr. Drs. ZAKI BARIDWAN , Ak., M.Si.', '2019-08-20', 'default.png', 0),
(229, 4, '196810291999032001', '$2y$10$9jSxo4SryDxRiZ1hWV8/v.2vPJaz.jIUARNsR69.GR8YnQ1UJMYNi', 1, 'Dr. WURYAN ANDAYANI , SE., Ak., M.Si.', '2019-08-20', 'default.png', 0),
(230, 4, '197606282002121002', '$2y$10$BJKtpNpXFCkq0gtAu/ONIOw8ecC9aJuW19pkJsVoSzKOdzJgxVPyO', 1, 'ABDUL GHOFAR , SE., M.Si.,DBA.,Ak.', '2019-08-20', 'default.png', 0),
(231, 4, '195902041986012001', '$2y$10$vh2/JSllCGOtd1SBMiiGdurLE7nMGB.SvJCIfoAzglfYZ5i3Y78Jq', 1, 'Dra. WIWIK HIDAJAH EKOWATI , M.Si.,Ak.', '2019-08-20', 'default.png', 0),
(232, 4, '195808291985031002', '$2y$10$gDpKaUia6LGDBh3Z/lPCWOJAcib3ANLPzBsbBAHY/9HIpSvzEz/Xi', 1, 'Drs. SYAEFULLAH , MM., Ak.', '2019-08-20', 'default.png', 0),
(233, 4, '195805111986011002', '$2y$10$3tkjQtuCpQLbba/9tGINguJbmcUUeSid7ulSax36HEm6.tsMLgNhK', 1, 'Dr. Drs. M. ACHSIN , MM., Ak.', '2019-08-20', 'default.png', 0),
(234, 4, '195909021986012001', '$2y$10$KwrEnJL8z0aiEow67IKqiePpelUEC1m3FPGfhPEpUsJxga2PDyaoK', 1, 'Dr. Dra. ENDANG MARDIATI , M.Si., Ak.', '2019-08-20', 'default.png', 0),
(235, 4, '196512301991031003', '$2y$10$hwEgx7XBWW73Jy94DTbHgOjwC.uLuDJvg8zoXifkJ0dXwaluJoIiG', 1, 'DIDIED POERNAWAN AFFANDY , SE.,MBA., Ak.', '2019-08-20', 'default.png', 0),
(236, 4, '195805111983032002', '$2y$10$AReZy/ht/hkrWwmnwl7yhuFeaC6beYR9WqOuJXXXEl5KeIeX007t6', 1, 'Dra. GRACE WIDIJOKO , MSA., Ak.', '2019-08-20', 'default.png', 0),
(237, 4, '196507281992031002', '$2y$10$ZOpPLQYpedc.Z9MakidjguZ2jNNw4mVHLaI1h/37e1YZzlp6de/tq', 1, 'KOMARUDIN ACHMAD , SE.,M.Si.,Ak.', '2019-08-20', 'default.png', 0),
(238, 4, '196508131990021001', '$2y$10$u/msWXuAie.olnoYzp9nge85yHht6iW3iIAnQjT7Ctivyx/xrzkXa', 1, 'Dr.  BOGAT AGUS RIYONO , SE., MSA., Ak.', '2019-08-20', 'default.png', 0),
(239, 4, '196707142005012001', '$2y$10$MfOKfiaimVCkz8rJL5qzdeLNNIqJPvu8X0wBE06VL5QfP3UPFsi1G', 1, 'Dr. Dra. ARUM PRASTIWI , M.Si.,Ak.', '2019-08-20', 'default.png', 0),
(240, 4, '197206111997022001', '$2y$10$yUAwu0g/pQ0kcjpr58sK0u.k0KnFRYglyfM0QRqO9SNXJmBlAvLta', 1, 'SARI ATMINI , SE., M.Si., Ak.', '2019-08-20', 'default.png', 0),
(241, 4, '197504052003121001', '$2y$10$z5k0yRmUsKdp.7330nrT6evAH8XASiDWMybA4iq7fOJGA.F/EzSTq', 1, 'Dr.  SYAIFUL IQBAL , SE., M.Si., Ak.', '2019-08-20', 'default.png', 0),
(242, 4, '198001162005022001', '$2y$10$K/icmF4m9V1DcH8E9MbcXuIkGrHbOfNcGh4cuuBKrC5mHk9K74XIm', 1, 'YENEY WIDYA PRIHATININGTIAS , SE., Ak., MSA.,DBA.', '2019-08-20', 'default.png', 0),
(243, 4, '196509181990021001', '$2y$10$qSDONaJYYP2htdbpgmjO9O7BfI0CKlBgDwA4Vb3gZ..zuQRz3PSli', 1, 'Drs. MUHAMMAD TOJIBUSSABIRIN , MBA., Ak.', '2019-08-20', 'default.png', 0),
(244, 4, '197511052003122001', '$2y$10$inQwplmqxiDkGDqGiFAP/ezCZWxfkJSdSzNRYcuVTgmtJRVZfUhIO', 1, 'DEVY PUSPOSARI , SE., M.Si., Ak.', '2019-08-20', 'default.png', 0),
(245, 4, '197210052000031001', '$2y$10$Tk0kUU1UAs0Ic8INswKfD.Bi08NbTmeAiLpyR4tGJUADodiRDpy6O', 1, 'NOVAL ADIB , SE., M.Si., Ak., Ph.D.', '2019-08-20', 'default.png', 0),
(246, 4, '195204151974121001', '$2y$10$/jThwPg3mUiluHwHCYEB7u4UcVYHOId3caKJYiP8mlYorIFI4PuUq', 1, 'Prof.Dr. M. PUDJIHARDJO , SE., MS.', '2019-08-20', 'default.png', 0),
(247, 4, '195503221981031002', '$2y$10$/QGSihEbNV8dRJbPdkXfrud0TZZyYa9pUhHH0ATKhhDiyh3Uw67VG', 1, 'Prof.Dr. MARYUNANI , SE,. MS.', '2019-08-20', 'default.png', 0),
(248, 4, '196006151987011001', '$2y$10$d0PKHIWr9VyeyzdkbulI9.gerW/n2QcuPaP2Ezfg1u7pzUqV23MLi', 1, 'Prof. Dr. AGUS SUMAN , SE., DEA.', '2019-08-20', 'default.png', 0),
(249, 4, '197303221997021001', '$2y$10$N4l7UktUTjEEW1W39b6sguowlcNyGJgtPhC/EUw3Z6eEwsQn4bIDe', 1, 'Prof. AHMAD ERANI YUSTIKA , SE., M.Sc., Ph.D.', '2019-08-20', 'default.png', 0),
(250, 4, '196410291989031001', '$2y$10$xP1eESysBwezqgGkqYXxR.MM24wnPX6L3rL6LBP3WjYzcwB5IUdEq', 1, 'Prof. Dr. CANDRA FAJRI ANANDA , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(251, 4, '196203151987011001', '$2y$10$XNsac87cWF8G0e9anId41.InGvn5k.XjmRjUkfX7EKr1Q.VCRBtsK', 1, 'DWI BUDI SANTOSO , SE., MS., Ph.D.', '2019-08-20', 'default.png', 0),
(252, 4, '195702121984031003', '$2y$10$C4pruGudCZISIwvQgkyykeo4Af7DEf.JK2B7LVmC7Up7YP7tPSWpG', 1, 'Prof.Dr. MUNAWAR , SE., DEA.', '2019-08-20', 'default.png', 0),
(253, 4, '195809271986011002', '$2y$10$Wwn/PKtYRFp6k6UmznjHQOdCA1iuboVmSzbf/KeGMhuY0hJrwwDzq', 1, 'Prof. Dr. GHOZALI MASKI , SE., MS.', '2019-08-20', 'default.png', 0),
(254, 4, '195505271981032001', '$2y$10$5vlawdzQQCtbObwikIiIX.QzB.GO1pUdGi3Fj6oQTs7isEdjYZ1aG', 1, 'Dr. Dra. MULTIFIAH , MS.', '2019-08-20', 'default.png', 0),
(255, 4, '196012251987011001', '$2y$10$PrYp7r2dZvjaLrhp5m0QeOECiYg2dLTdHGNhYw8vaVPqXALu5Zm0a', 1, 'DAVID KALUGE , SE., MS., M.Ec.Dev., Ph.D', '2019-08-20', 'default.png', 0),
(256, 4, '196010301986011001', '$2y$10$BxFArFHFqe2x5HUjvxtwXup2IGJXxkG.5JBeaYIEc46CO0Cany3fO', 1, 'Dr. SUSILO , SE., MS.', '2019-08-20', 'default.png', 0),
(257, 4, '197610032001121003', '$2y$10$zDhTPhFWBKLCb0C3nKZOuOECUAyhXBqQnZn6dBQXXhNZLkBQbyLS.', 1, 'DEVANTO SHASTA PRATOMO , SE., M.Si., Ph.D.', '2019-08-20', 'default.png', 0),
(258, 4, '196104111986012001', '$2y$10$lUHuMwGiQAQSnRLOrFuJte4spRRT2DaxacQhUBL3r5bISdy7eDaSm', 1, 'Dr. SRI MULJANINGSIH , SE., MSP.', '2019-08-20', 'default.png', 0),
(259, 4, '196503111989032001', '$2y$10$Otb6fb9Q8Pw96A5z1kmMOO37sbk1NfeKJQ/St/0cGaUc6Uv.deKva', 1, 'Dra. MARLINA EKAWATY , M.Si., Ph.D.', '2019-08-20', 'default.png', 0),
(260, 4, '196912101997031003', '$2y$10$okVBYmA.fQjibyhanJGAturn/d9iKFr8S730T6dV9R/hkGMTD5tKu', 1, 'Dr.rer.pol. WILDAN SYAFITRI , SE., ME.', '2019-08-20', 'default.png', 0),
(261, 4, '197410181999031001', '$2y$10$ykn7FoTonKzKx4p2jecd3ew6MXg.Moi.vgKeeRFu8zyR2GdgGImeW', 1, 'BAHTIAR FITANTO , SE.,MT.', '2019-08-20', 'default.png', 0),
(262, 4, '197305172003121002', '$2y$10$/nviGlXred7p7tuZsQqGl.IFmGDHznXdPzISnFhMsfCbQjlH1tOV2', 1, 'SHOFWAN , SE., M.Si.', '2019-08-20', 'default.png', 0),
(263, 4, '197302102001121001', '$2y$10$6ePELnYU.YVWU3dtTC9.AePJlL1gLPAArRqzcEe6F1ao4ylTHl1YS', 1, 'NURMAN SETIAWAN FADJAR , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(264, 4, '2011068401091001', '$2y$10$eKeNHJ3g/OkL1ycRADU7o.MLRHP4/6uPP4T5uVRksFnxx3GT46HeS', 1, 'DIAN ARI NUGROHO , S.E., M.M', '2019-08-20', 'default.png', 0),
(265, 4, '2012018609292001', '$2y$10$Rla6EmEznWQKf6s5UUkwEeArRmFtElZBmrGw.IGgselovLvDfu8TK', 1, 'NADIYAH HIRFIYANA ROSITA , SE., MM.', '2019-08-20', 'default.png', 0),
(266, 4, '2012017811261001', '$2y$10$KXfYv/N1OcvntwvinTgoR.IOgkcQAGOdoblyxIOcEE/lbDPVfpagi', 1, 'YUSUF RISANTO , SE., MM.', '2019-08-20', 'default.png', 0),
(267, 4, '2012018509031001', '$2y$10$abcpWURG8du.mrK3L/3PfuzBugEXDHRkNvg7Wos4OIC.VVtGjRs.i', 1, 'RADITYO PUTRO HANDRITO , SE., MM.', '2019-08-20', 'default.png', 0),
(268, 4, '2012018707212001', '$2y$10$99OUherHhjzZdU.hv15Wven.lc/F8/m1rW.sz0lz4wuxEIzjzATa6', 1, 'IDA YULIANTI , SE., MM., MBA', '2019-08-20', 'default.png', 0),
(269, 4, '2013048406211001', '$2y$10$axHTSpaZTGV.xlL94CGOWe3aSajSQrKXKPPjQZJiY3emOGpPU.d6e', 1, 'RAHADITYA YUNIANTO , SE., MM', '2019-08-20', 'default.png', 0),
(270, 4, '2013048409291001', '$2y$10$dix9YuG.ZW0yz5h/0p.p1Oz4NasA/FyKAQ8ev8RL2SD/VApEQqt3G', 1, 'AGUNG NUGROHO ADI , SE., MM., MM(HRM).', '2019-08-20', 'default.png', 0),
(271, 4, '2013048507301001', '$2y$10$hVx.QmjwmYSzdsRf8BQROebZt.ndRtplfI.ofz.imcBVr4rh.JEUC', 1, 'SIGIT PRAMONO , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(272, 4, '2013048305101001', '$2y$10$alTv6YMJsbPGBwWnJ1yZsOigIWTx/dUwhC6zK32SI6oKYDOhae7yi', 1, 'TAUFIQ ISMAIL , SE., SS., MM', '2019-08-20', 'default.png', 0),
(273, 4, '2016078404122001', '$2y$10$ZPCVqTqGgssulKIIr6hv5.vHEkDvE.j.aQ2BJnWxfRXlAWW507fO6', 1, 'RADITHA DWI VATA HAPSARI , S.E., M.M.', '2019-08-20', 'default.png', 0),
(274, 4, '2016078109192001', '$2y$10$rvY1RCFIeThCXPExl1RKMOBXtyuMiLpw6H.OZ7PY6MFX8ehp0//v6', 1, 'RILA ANGGRAENI , S.E., M.M.', '2019-08-20', 'default.png', 0),
(275, 4, '2016079111051001', '$2y$10$NYlTYUIWA/xphBCLFc3MnOnTOOuQE5C835jarZgsa7s3SLYvVyA6G', 1, 'M. ABDI DZIL IKHRAM W , S.E., M.M.', '2019-08-20', 'default.png', 0),
(276, 4, '2017028406041001', '$2y$10$.5NvCMmRPDdslyM0upAE6.p6bHKpfM50tcXdXH5Hmr6JdpdRtwUbi', 1, 'MOH. ERFAN ARIF , S.E., M.M.', '2019-08-20', 'default.png', 0),
(277, 4, '195307271979031005', '$2y$10$YbFSG2yq1F0460ibzRbjIubpST8qauRsDzecS1X9OwBo3My8l0tuG', 1, 'Prof. Dr. H. MOELJADI , SE., SU.', '2019-08-20', 'default.png', 0),
(278, 4, '195012081981031003', '$2y$10$Z6rRAIXF5/DV/4QsIOht2O4BYjzYxjPID1lXgKEynQbS4ueJ2ZVAq', 1, 'Prof.Dr.Drs. SURACHMAN , MSIE.', '2019-08-20', 'default.png', 0),
(279, 4, '195805291984031002', '$2y$10$VAATTSn5mjuTIjSTGb.Nmu0G8ijxOI4zu.c3062XMqssQZYCjMGr6', 1, 'Prof.Dr. ACHMAD SUDIRO , SE., ME.', '2019-08-20', 'default.png', 0),
(280, 4, '195210241981031003', '$2y$10$r/MpTgvWy.srmzYEdLNe3eGx07qAdCFvRiro5LoDol3Z4KdLgbpWS', 1, 'Prof. Dr. Drs. MARGONO , SU.', '2019-08-20', 'default.png', 0),
(281, 4, '195408181983031004', '$2y$10$stq4aKCmcZHBfbnCyIbg/uum5eWHHqtLnBhyShBZ8bSb5qmm45Fy6', 1, 'Prof.Dr. H. ARMANU , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(282, 4, '196111081986012002', '$2y$10$vgUA1If7HUqinQkDqR4dXeIDvSktN754vH/vgNUnFILLKDWgg1xmy', 1, 'Prof. Dr. Dra. NOERMIJATI , M.T.M.', '2019-08-20', 'default.png', 0),
(283, 4, '195802231984031003', '$2y$10$AmAv0u.uQyE4q.0G6.MTQORSTAqVj84VQpABM9a5CRbhadw9jybO.', 1, 'Drs. SUNARYO , M.Si., Ph.D.', '2019-08-20', 'default.png', 0),
(284, 4, '195803181985031003', '$2y$10$wDkCgakzREffbK3CJLrrR.RMGZYtfqxkrh1McNLsQ8kVz4Dcdfwn.', 1, 'Dr. MUGIONO , SE., MM.', '2019-08-20', 'default.png', 0),
(285, 4, '196005161985032002', '$2y$10$RzS2gKN97zdkqMO0CBoEgux1ZcOH4zJ.3DRcawU3KIyzWnhwOpHh6', 1, 'Dr. ROFIATY , SE., MM.', '2019-08-20', 'default.png', 0),
(286, 4, '195608101985031002', '$2y$10$5QH/xvZ9pnAtg4DTm6HMH..xdZdgCqCtqNYg1dqWPgHUVZ2DHQs6G', 1, 'Dr. Drs. SUDJATNO , MS.', '2019-08-20', 'default.png', 0),
(287, 4, '195907311986012001', '$2y$10$lqBn/cX8S7DX5HZX6e2KAemMbxHik8dGFSnCE/ZO.q2TVyjGc.ysW', 1, 'Dr. Dra. SUMIATI , M.Si.', '2019-08-20', 'default.png', 0),
(288, 4, '195811051986011001', '$2y$10$o0YyX9wOoTLU2ln/aMsME.zK5RnRoEZc4atoXqmV.w5Tc7U7xZ5d.', 1, 'ANANTO BASUKI , SE., MM.', '2019-08-20', 'default.png', 0),
(289, 4, '195907261986011001', '$2y$10$7fTKmOhy4an8MeFhYbKoLuWRqKEpz8dBtiRIi11VKpfw7yZCA8L2m', 1, 'Dr. WAHDIYAT MOKO , SE., MM.', '2019-08-20', 'default.png', 0),
(290, 4, '196101211986011005', '$2y$10$ii3W6YcvfsfE.j./9jh.serwnhaiv6/b1FJyBlj.R9AhD5sMhMYvi', 1, 'Dr. Drs. FATCHUR ROHMAN , M.Si.', '2019-08-20', 'default.png', 0),
(291, 4, '196011111986012001', '$2y$10$3NhvGW2T/TJcXZnmOMW/z.Q4QxzNV25Zi6/U4HM.1UCAzG6IZKj6m', 1, 'Dr. SITI AISJAH , SE., MS.', '2019-08-20', 'default.png', 0),
(292, 4, '196205101986012001', '$2y$10$yowVm8uhFNrkEO3jl9u5YOlE6RBlg53qrszu.JBJXxMNUvapuQIri', 1, 'RISNA WIJAYANTI , SE., MM., Ph.D.', '2019-08-20', 'default.png', 0),
(293, 4, '196206071987011001', '$2y$10$..//2OByiF9eHX3W0ZnRYuY.iRVzrsZtdEC8vC92zPb.odSvhNvLO', 1, 'TOTO RAHARDJO , SE., MM.', '2019-08-20', 'default.png', 0),
(294, 4, '196306221988022001', '$2y$10$ZShbHZPkrksYLqnR2iOxD.5VtbpwysmiQyPSCtkKcMoollXIkbeIS', 1, 'Dr. Dra. NUR KHUSNIYAH INDRAWATI , M.Si.', '2019-08-20', 'default.png', 0),
(295, 4, '195907101986012001', '$2y$10$2DVGvSzfUr0ikaeN6c6gzOlNz/.EROa9hgIaar2hSfjOY3MKAdgFq', 1, 'Dr. ASTRID PUSPANINGRUM , SE., MM.', '2019-08-20', 'default.png', 0),
(296, 4, '197612102003121002', '$2y$10$PNl/pnOyl6Aga0BwrvbKrujI7iucJ.K/7BNo3i9OuiCi/u9P0MozG', 1, 'DODI WIRAWAN IRAWANTO , SE., M.Com., Ph.D.', '2019-08-20', 'default.png', 0),
(297, 4, '196112201986012001', '$2y$10$iyy5Wz/u.X8uFkIn4Ud3q.M7K0gNX.9T1jjIGOvmm3sYMc4mVGGBC', 1, 'Dr. HIMMIYATUL AMANAH JIWA JUWITA , SE., MM.', '2019-08-20', 'default.png', 0),
(298, 4, '195806201983031001', '$2y$10$ptmMvhlefkKk6NL0mcW25eeVlRNYuln7T24u5owxOzHmCM.sF0Ofa', 1, 'Dr. Drs. AGUNG YUNIARINTO , MS.', '2019-08-20', 'default.png', 0),
(299, 4, '195511171984032001', '$2y$10$EjWwNU7Y.EB6rNRiT8ieRuxNrN2I0m.es1G.gqDNK9Frl4jbr8/mm', 1, 'Dra. LILY HENDRASTI NOVADJAJA , MM.', '2019-08-20', 'default.png', 0),
(300, 4, '196008011986031005', '$2y$10$F7GZUb0ywhBwX8g47YG4/.BLbQCDXYYdBMoUjrQa4rbTnnarD2nR2', 1, 'Dr. ATIM DJAZULI , SE.,MM.', '2019-08-20', 'default.png', 0),
(301, 4, '196109232006042001', '$2y$10$ZPgxJGsr9TswIRRoP9EiF.rH5ls59Zh6mojvw5Qni.Ky13D7a5RCG', 1, 'Dr. Dra. KUSUMA RATNAWATI , MM.', '2019-08-20', 'default.png', 0),
(302, 4, '195510141986012001', '$2y$10$CSvF6uxIcJyOJqeL0iYrQusl5GBULx3x.qMH.16xpjIHfuN8O08Gm', 1, 'Dr. MINTARTI RAHAYU , SE., MS.', '2019-08-20', 'default.png', 0),
(303, 4, '198303192008011003', '$2y$10$hlfJXFBLTB3EV3LjWX9oyOLseihhoT2FDptPogZTrg90jyAY8QsYO', 1, 'ANANDA SABIL HUSSEIN , SE., M.Com.,Ph.D', '2019-08-20', 'default.png', 0),
(304, 4, '197307081997021001', '$2y$10$JiCjPMbba817PkSLAj5rkenKftQPFuuFn9vADvC0qhNypf1Wm5Hsm', 1, 'Dr. NANANG SURYADI , SE., MM.', '2019-08-20', 'default.png', 0),
(305, 4, '196101291998022001', '$2y$10$ECd5al/6RppaAZPYu2UM3uxDNJaPmTQUP45bcYyik.Y900T60crLq', 1, 'Dr. Dra. ANDARWATI , M.E', '2019-08-20', 'default.png', 0),
(306, 4, '197106232002121002', '$2y$10$lGhw71uTGcetKmwIV3Vv5OiLJtWato0rne61mM8RSbgyTtGPhBIPu', 1, 'AINUR ROFIQ , SE., MM., Ph.D.', '2019-08-20', 'default.png', 0),
(307, 4, '198208252008121003', '$2y$10$jBOXCqh2ALJfLCOCQ873OuwRUvxg62Gb3tgrDgjqv2o0EbylsH3K2', 1, 'DIMAS HENDRAWAN , SE., MM.', '2019-08-20', 'default.png', 0),
(308, 4, '198203092008011008', '$2y$10$QlSZMSzuBlch7om2ZQLHfui2SbkD/WrigXhQRfTTP2meuS46bULC6', 1, 'MISBAHUDDIN AZZUHRI , SE., MM.', '2019-08-20', 'default.png', 0),
(309, 4, '196410101998022001', '$2y$10$aDi9TF6lbvhbqPvr1EVFNeqNiRzbuYQBWmmHJo4E2hLaXiBQX8zJa', 1, 'Ir. NUR PRIMA WALUYOWATI , MM.', '2019-08-20', 'default.png', 0),
(310, 4, '198208202008012009', '$2y$10$SsivXkNRCFGifxGUQS2/4.CpssIMABlSexdWB8Qci4Vrzz7nPCEXu', 1, 'SRI PALUPI PRABANDARI , SE., MM.', '2019-08-20', 'default.png', 0),
(311, 4, '198112052008122004', '$2y$10$gk/GccWsZm7Qbj3Bfw.MueIjeu1D.jY/xx868kTo5wlsrJOQXSPkq', 1, 'Dr.  DESI TRI KURNIAWATI , SE., MM.', '2019-08-20', 'default.png', 0),
(312, 4, '198109182008122002', '$2y$10$ZFVV8BidZwIZaoMLZ16Ne.LdXykJPz8JgvTVKxuyHJfICFI4YCjca', 1, 'IKHTIARA KAIDENI ISHARINA , SE., MM.', '2019-08-20', 'default.png', 0),
(313, 4, '198005112008122002', '$2y$10$CzcvJfURgLsPNA2x4DYs3eCOyIlEochDdLaPW1jOZ2YEq2nep9fS.', 1, 'MYCHELIA CHAMPACA , SE., Ak., MM.', '2019-08-20', 'default.png', 0),
(314, 4, '198503032014041001', '$2y$10$Fmrdjp3sEE77/97JG5QrSO0FbJMvsJUmV4VUHNjaMmOQRZ0FSxJr6', 1, 'SATRIYA CANDRA BONDAN PRABOWO , SE., MM.', '2019-08-20', 'default.png', 0),
(315, 4, '198606242015041001', '$2y$10$JnrZjhJxyZiseawT7yyR4.5E7u93QJO2itjHSPt84fZJ8Xh2wYOwC', 1, 'BAYU ILHAM PRADANA , S.E., M.M.', '2019-08-20', 'default.png', 0),
(316, 4, '199304172019032030', '$2y$10$SwNAxMe/aELpOX.w3ULSCOKE.GeFr5Ubn4Lpt2TIovRUa58MXewpe', 1, 'PUSVITA YUANA , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(317, 4, '198706012019032009', '$2y$10$5YtAmhVziwpdph4S7iLwcuHIZWcyFOkVaB0NiSTy7wTW4SXxuUgL6', 1, 'RISCA FITRI AYUNI , S.E., M.M.', '2019-08-20', 'default.png', 0),
(318, 4, '197412082000032001', '$2y$10$l3Hs.VC8mb8bxHD5V9DK.unofkuPw12DgFAzXZTVT3NoNggmiK/OC', 1, 'Dr. CHRISTIN SUSILOWATI , SE., M.Si.', '2019-08-20', 'default.png', 0),
(319, 4, '2012048712072001', '$2y$10$ncbUTlyEyPkc1cC1ik0AoO4NG9TVcWSN1y2DMjqOHM3t1ud6btHVS', 1, 'VIETHA DEVIA SS , SE., ME.', '2019-08-20', 'default.png', 0),
(320, 4, '2012018512212001', '$2y$10$HamKX4JrtX/p0HoLTt1Dfu8P/ToDsJlam/xVMR43iER7Z7UmNesW.', 1, 'AJENG KARTIKA GALUH , SE., ME.', '2019-08-20', 'default.png', 0),
(321, 4, '2014048702201001', '$2y$10$Q/6Ofe0TN.LM0xtB1K2LOe/vWa6IeP8nQL4MnqpZD.EMzI9DWwJs2', 1, 'FAISHAL FADLI , SE., M.E.', '2019-08-20', 'default.png', 0),
(322, 4, '2013048605212001', '$2y$10$ZxI2.SOMxQnXgIr0hRyf7OGgc09fAkd9RIA0AeAcVk1aTruIsWO7W', 1, 'AJENG WAHYU PUSPITASARI , SE., MA.', '2019-08-20', 'default.png', 0),
(323, 4, '2013048303052001', '$2y$10$OwQFzm/WcglW2BMTFQilP.ZjM6q4i9Q/wR.vfjBS/jrmavrgXs5k6', 1, 'DWI RETNO WIDIYANTI , SE.I., M.Sc', '2019-08-20', 'default.png', 0),
(324, 4, '2014058707032001', '$2y$10$y0wxKRUKOjElXlf4PiwF6e6JbIg3rgbWypF4gd1xDARdtyPvm0XuG', 1, 'PUSPITASARI WAHYU ANGGRAENI , SE.,M.Ec.Dev', '2019-08-20', 'default.png', 0),
(325, 4, '2015078810012001', '$2y$10$VbkuHQiKCAXGLkTB7YqDxeE.ptk67SNExUrP1A8OfMyIy8rsNfP6O', 1, 'YENNY KORNITASARI , SE., ME.', '2019-08-20', 'default.png', 0),
(326, 4, '2016078711241001', '$2y$10$PXDHXOHIGukOtqWEh62F3uPfGirB7gQBfLcPT.Hf9ag3iCNwxSy/a', 1, 'AMINNULLAH ACHMAD MUTTAQIN , M.Sc. Fin.', '2019-08-20', 'default.png', 0),
(327, 4, '2016079101181001', '$2y$10$BvqQ92I1XkZnBbnnpAAZPuPTa3jiq0lyF2mM.raEaRszRbakxFYC2', 1, 'ATU BAGUS WIGUNA , S.E., M.E.', '2019-08-20', 'default.png', 0),
(328, 4, '195508151984031002', '$2y$10$xMmt0x31FyvXqsaJ/BYR4O2NQhYZXgOWX8ij6rQjOInSMHfhJg1Ki', 1, 'Prof. Dr. KHUSNUL ASHAR , SE., M.A.', '2019-08-20', 'default.png', 0),
(329, 4, '196809111991032003', '$2y$10$zOFNH59aDYYqOSy3ie2OC.kG4iqaaawIWBWCPanqLXssYoJYF0l9S', 1, 'Dr. Dra. ASFI MANZILATI , ME.', '2019-08-20', 'default.png', 0),
(330, 4, '195907101983031004', '$2y$10$2J0ADacn8uDxv7sCY1n/9uZmB50z0Vq6aVSjlaNgREDPikAMVO1ei', 1, 'Dr. Drs. ISWAN NOOR , ME.', '2019-08-20', 'default.png', 0),
(331, 4, '197101111998021001', '$2y$10$yVl0OYByO2oNc.nqqPRFtONtwTXvktw8.U3MTP55VfrXPyAr7tIWK', 1, 'Dr. MOH. KHUSAINI , SE., M.Si., MA.', '2019-08-20', 'default.png', 0),
(332, 4, '197609102002121003', '$2y$10$fGJrdgg4m6Y8ZbaLJK.9r.tAeMGzEL.GISLIvxXOD8.qf1T.5QMkS', 1, 'PUTU MAHARDIKA ADI SAPUTRA , SE.,M.Si.,MA., Ph.D', '2019-08-20', 'default.png', 0),
(333, 4, '197009221995121002', '$2y$10$m/.76UD/EVvhyAMLIjKYbejXzTmUonAFTn.gkRagcwWF1vxd2C12W', 1, 'ARIF HOETORO , SE., MT., Ph.D.', '2019-08-20', 'default.png', 0),
(334, 4, '198208072005011002', '$2y$10$bhQ.SpUIR2ExgKkI252NaucorqH8EwK64rvew6hsIkUE3GZaVAIyy', 1, 'DIAS SATRIA , SE., M.App.Ec., Ph.D.', '2019-08-20', 'default.png', 0),
(335, 4, '195807091986031002', '$2y$10$RpQWwV0/19PjCNypAgVicuHD0ISHr6W74drXmI3M92hIXC0eunz8a', 1, 'EDDY SUPRAPTO , SE., ME.', '2019-08-20', 'default.png', 0),
(336, 4, '196311161990021001', '$2y$10$x5316ldPCE/Qlmg7L7Ca0uq7zGYCX8gCEOsmthD0RVKE5j/rFP6yS', 1, 'Dr. RACHMAD KRESNA SAKTI , SE., M.Si.', '2019-08-20', 'default.png', 0),
(337, 4, '198107022005011002', '$2y$10$G/0cGnp8kTLhTd3JtVqNEutDAcuZuLoTP5eWhSQPp8pg82LknBv.G', 1, 'SETYO TRI WAHYUDI , SE., MEc., Ph.D.', '2019-08-20', 'default.png', 0),
(338, 4, '197505141999032001', '$2y$10$a5LmyrLO.zbeCQnhA6kzfe6uGuN2tGNecudSjzn77lyZZdvfqrPZe', 1, 'TYAS DANARTI HASCARYANI , SE., ME.', '2019-08-20', 'default.png', 0),
(339, 4, '198012282005011002', '$2y$10$QyEDayQ9fQL0LyGMf37Y0.Y.ixhMmTnQ0ZMmnnen9yroBAIbRQF42', 1, 'FERRY PRASETYIA , SE., M.App.Ec.', '2019-08-20', 'default.png', 0),
(340, 4, '198608012015041004', '$2y$10$wwEfpPO6lpXoGoe1xvNkYurvfWB5QlqlGB9m7yben0z8lN8kwTmFG', 1, 'NUGROHO SURYO BINTORO , S.E., M.Ec.Dev.', '2019-08-20', 'default.png', 0),
(341, 4, '198401232015041002', '$2y$10$OP7JcnKJmjjpr8rog/0tEuwDHD9z4fOlCz/dtpEWg2.cmyAz4NuoK', 1, 'AJI PURBA TRAPSILA , SE.I., ME.I', '2019-08-20', 'default.png', 0),
(342, 4, '198604032015041002', '$2y$10$pWua189Q71xjRnmHaP/lxuNjh2EmRLcNBOjw2Xm4C7xzU0/xBn9G2', 1, 'AL MUIZZUDDIN FAZAALLOH , SE., ME.', '2019-08-20', 'default.png', 0),
(343, 4, '199301162019032015', '$2y$10$yRCUaBlMbgFa1RBjfU45ceWgshuy9ViLJZbYtZAcMIA766uiJ.Mh6', 1, 'LAILA MASRURO PIMADA , S.E., M.SEI.', '2019-08-20', 'default.png', 0),
(344, 4, '198411212019031004', '$2y$10$lglBWR2sYR8SHfiLNZmy8u3jAUgDAl2QvNlF3B5yzTdud91y50dua', 1, 'MOH. ATHOILLAH , S.E., M.E.', '2019-08-20', 'default.png', 0),
(345, 4, '198204232005022001', '$2y$10$nKcjC3gtB5QSDkdkMYpaUussd6N67uUApYTg5OEenGgljGckoXntG', 1, 'FARAH WULANDARI PANGESTUTY , SE., ME.', '2019-08-20', 'default.png', 0),
(346, 4, '197403022005012001', '$2y$10$okGt2cOZRbMBT5ztVCAiLuolKfXHOGizHV7S9ih6A69ykyHh718Ve', 1, 'Dr. NURUL BADRIYAH , SE.,ME.', '2019-08-20', 'default.png', 0),
(347, 5, '5000', '$2y$10$8f1/JJFI770bq4kOGRkSs.2DPSP/pTASfZzJmVUB4jbPTbnFSC/TW', 1, 'Misbakhul', '2019-09-11', 'default.png', 0),
(348, 4, '3000', '$2y$10$GUNvfuhFSSmObsvMfogda.VVDvwjhasTePct7Aan/ZneSraHF7R7W', 1, 'Dosen', '2019-09-13', 'default.png', 0),
(349, 2, '2000', '$2y$10$GpwEBJUM07KKMid5cVb9d.yAaIl/KnUvCHSMkYsz3v8KpqPIJwkYK', 1, 'Operator A', '2019-09-20', 'default.png', 0);

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
(10, 'Mahasiswa', 'operator/mahasiswa/list', 'fas fa-fw fa-graduation-cap', '0', 2),
(11, 'Dosen', 'operator/dosen/list', 'fas fa-fw fa-chalkboard-teacher', '0', 2),
(12, 'Pimpinan', 'operator/pimpinan', 'fas fa-fw fa-users', '0', 2),
(13, 'Ujian', 'operator/ujian', 'fas fa-fw fa-check-circle', '0', 2),
(14, 'Publikasi', 'operator/publikasi', 'fas fa-fw fa-check-circle', '0', 2),
(15, 'Manajemen User', 'admin/manajemenUser', 'fas fa-fw fa-fingerprint', '1', 1),
(16, 'Lecturer Agenda', 'mahasiswa/agendaDosen', 'fas fa-fw fa-user', '1', 5),
(17, 'Lecturer Agenda', 'dosen/agendaDosen', 'fas fa-fw fa-user', '1', 4),
(18, 'Lecturer Agenda', 'operator/agendaDosen', 'fas fa-fw fa-user', '1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendaDosen`
--
ALTER TABLE `agendaDosen`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `nip_dosen` (`nip_dosen`);

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
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
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
-- AUTO_INCREMENT for table `agendaDosen`
--
ALTER TABLE `agendaDosen`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kodeujian`
--
ALTER TABLE `kodeujian`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `idJurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendaDosen`
--
ALTER TABLE `agendaDosen`
  ADD CONSTRAINT `agendaDosen_ibfk_1` FOREIGN KEY (`nip_dosen`) REFERENCES `dosen` (`nip`);

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
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`jurusankode`) REFERENCES `jurusan` (`kode`);

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
