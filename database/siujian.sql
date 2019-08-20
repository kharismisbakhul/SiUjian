-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 06:35 AM
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
(' 195012081981031003', 'Prof.Dr.Drs. SURACHMAN , MSIE.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
(' 195204151974121001', 'Prof.Dr. M. PUDJIHARDJO , SE., MS.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
(' 195210241981031003', 'Prof. Dr. Drs. MARGONO , SU.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
(' 195212311978031012', 'Prof. Dr. BAMBANG SUBROTO , SE., Ak., MM.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
(' 195307271979031005', 'Prof. Dr. H. MOELJADI , SE., SU.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
(' 195408181983031004', 'Prof.Dr. H. ARMANU , SE., M.Sc.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
(' 195503221981031002', 'Prof.Dr. MARYUNANI , SE,. MS.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
(' 195504281986011001', 'Drs. JIMMY ANDRIANUS , MM., Ak.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 195505271981032001', 'Dr. Dra. MULTIFIAH , MS.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
(' 195508151984031002', 'Prof. Dr. KHUSNUL ASHAR , SE., M.A.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 14, ''),
(' 195509261983031002', 'Dr. BAMBANG PURNOMOSIDHI , SE., MBA., Ak.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
(' 195510141986012001', 'Dr. MINTARTI RAHAYU , SE., MS.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 195511171984032001', 'Dra. LILY HENDRASTI NOVADJAJA , MM.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 195604031985031003', 'Prof.Dr. SUTRISNO T. , SE., AK., M.Si.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
(' 195608101985031002', 'Dr. Drs. SUDJATNO , MS.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 195702121984031003', 'Prof.Dr. MUNAWAR , SE., DEA.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 6, ''),
(' 195707091983031001', 'Prof.Dr. MADE SUDARMA , SE., AK., MM.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
(' 195708131983031004', 'Dr. Drs. BAMBANG HARIADI , M.Ec., Ak.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 1, ''),
(' 195710051983032001', 'Dra. LINDA ARIAMTIKSNA , Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 195710221984031001', 'Drs. NASIKIN , Ak., MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 195802231984031003', 'Drs. SUNARYO , M.Si., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 195803181985031003', 'Dr. MUGIONO , SE., MM.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 195805111983032002', 'Dra. GRACE WIDIJOKO , MSA., Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 195805111986011002', 'Dr. Drs. M. ACHSIN , MM., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 195805291984031002', 'Prof.Dr. ACHMAD SUDIRO , SE., ME.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
(' 195806201983031001', 'Dr. Drs. AGUNG YUNIARINTO , MS.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 195807091986031002', 'EDDY SUPRAPTO , SE., ME.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 13, ''),
(' 195808201985031002', 'Drs. ALI DJAMHURI , Ak., M.Com., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
(' 195808291985031002', 'Drs. SYAEFULLAH , MM., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 195809271986011002', 'Prof. Dr. GHOZALI MASKI , SE., MS.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 6, ''),
(' 195811051986011001', 'ANANTO BASUKI , SE., MM.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 195902041986012001', 'Dra. WIWIK HIDAJAH EKOWATI , M.Si.,Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 195907101983031004', 'Dr. Drs. ISWAN NOOR , ME.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 14, ''),
(' 195907101986012001', 'Dr. ASTRID PUSPANINGRUM , SE., MM.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 195907261986011001', 'Dr. WAHDIYAT MOKO , SE., MM.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 195907311986012001', 'Dr. Dra. SUMIATI , M.Si.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 195909021986012001', 'Dr. Dra. ENDANG MARDIATI , M.Si., Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 195910251985031003', 'Drs. MUHAMMAD JUSUF WIBISANA , M.Ec., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 196001241986012001', 'Dr. Dra.  ERWIN SARASWATI , M.Acc.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 1, ''),
(' 196005161985032002', 'Dr. ROFIATY , SE., MM.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 196006151987011001', 'Prof. Dr. AGUS SUMAN , SE., DEA.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
(' 196008011986031005', 'Dr. ATIM DJAZULI , SE.,MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 196010301986011001', 'Dr. SUSILO , SE., MS.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
(' 196011111986012001', 'Dr. SITI AISJAH , SE., MS.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 196012251987011001', 'DAVID KALUGE , SE., MS., M.Ec.Dev., Ph.D', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
(' 196101211986011005', 'Dr. Drs. FATCHUR ROHMAN , M.Si.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 196101291998022001', 'Dr. Dra. ANDARWATI , M.E', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 196104111986012001', 'Dr. SRI MULJANINGSIH , SE., MSP.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
(' 196106301988021001', 'Prof. IWAN TRIYUWONO ,SE., Ak., M.Ec., Ph.D.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
(' 196109232006042001', 'Dr. Dra. KUSUMA RATNAWATI , MM.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 196111081986012002', 'Prof. Dr. Dra. NOERMIJATI , M.T.M.', 'P', 'PNS', 'Guru Besar', 1, 'S3', '', '', 9, ''),
(' 196112201986012001', 'Dr. HIMMIYATUL AMANAH JIWA JUWITA , SE., MM.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 196201101987011001', 'Prof. Drs. GUGUS IRIANTO , MSA., Ph.D., Ak.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
(' 196203151987011001', 'DWI BUDI SANTOSO , SE., MS., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 5, ''),
(' 196205101986012001', 'RISNA WIJAYANTI , SE., MM., Ph.D.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 196206071987011001', 'TOTO RAHARDJO , SE., MM.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 196211271988021001', 'Dr. Drs. ROEKHUDIN , M.Si., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
(' 196306221988022001', 'Dr. Dra. NUR KHUSNIYAH INDRAWATI , M.Si.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 196311161990021001', 'Dr. RACHMAD KRESNA SAKTI , SE., M.Si.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 13, ''),
(' 196407091991032007', 'Dr. Dra. LILIK PURWANTI , M.Si., Ak.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
(' 196410101998022001', 'Ir. NUR PRIMA WALUYOWATI , MM.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
(' 196410291989031001', 'Prof. Dr. CANDRA FAJRI ANANDA , SE., M.Sc.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
(' 196412032003121001', 'Prof. EKO GANIS SUKOHARSONO , SE., M.Com.Hons., Ph', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 1, ''),
(' 196503111989032001', 'Dra. MARLINA EKAWATY , M.Si., Ph.D.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 6, ''),
(' 196507281992031002', 'KOMARUDIN ACHMAD , SE.,M.Si.,Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 196508131990021001', 'Dr.  BOGAT AGUS RIYONO , SE., MSA., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 196509181990021001', 'Drs. MUHAMMAD TOJIBUSSABIRIN , MBA., Ak.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 4, ''),
(' 196511021992031002', 'Drs. IMAM SUBEKTI , Ak., M.Si., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
(' 196512301991031003', 'DIDIED POERNAWAN AFFANDY , SE.,MBA., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 196605251991031002', 'Dr. Drs. ZAKI BARIDWAN , Ak., M.Si.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 196607061991031001', 'Drs. NURKHOLIS , M.Bus.(Acc)., Ak., Ph.D', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
(' 196707142005012001', 'Dr. Dra. ARUM PRASTIWI , M.Si.,Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 196809111991032003', 'Dr. Dra. ASFI MANZILATI , ME.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 13, ''),
(' 196810071992032001', 'TUBAN DRIJAH HERAWATI , SE., Ak., MM.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
(' 196810291999032001', 'Dr. WURYAN ANDAYANI , SE., Ak., M.Si.', 'P', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
(' 196906091993032004', 'NURUL FACHRIYAH , SE.,MSA.,Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 196912101997031003', 'Dr.rer.pol. WILDAN SYAFITRI , SE., ME.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 6, ''),
(' 196912312009121002', 'Dr. AJI DEDI MULAWARMAN , SP., MSA.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
(' 197009221995121002', 'ARIF HOETORO , SE., MT., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 14, ''),
(' 197101111998021001', 'Dr. MOH. KHUSAINI , SE., M.Si., MA.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 15, ''),
(' 197106232002121002', 'AINUR ROFIQ , SE., MM., Ph.D.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 197206111997022001', 'SARI ATMINI , SE., M.Si., Ak.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 197210052000031001', 'NOVAL ADIB , SE., M.Si., Ak., Ph.D.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 197302102001121001', 'NURMAN SETIAWAN FADJAR , SE., M.Sc.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 6, ''),
(' 197303221997021001', 'Prof. AHMAD ERANI YUSTIKA , SE., M.Sc., Ph.D.', 'L', 'PNS', 'Guru Besar', 1, 'S3', '', '', 5, ''),
(' 197305172003121002', 'SHOFWAN , SE., M.Si.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 6, ''),
(' 197307081997021001', 'Dr. NANANG SURYADI , SE., MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 197403022005012001', 'Dr. NURUL BADRIYAH , SE.,ME.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 13, ''),
(' 197409102002121001', 'Dr. AULIA FUAD RAHMAN , SE., M.Si., Ak.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 4, ''),
(' 197410181999031001', 'BAHTIAR FITANTO , SE.,MT.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 6, ''),
(' 197412082000032001', 'Dr. CHRISTIN SUSILOWATI , SE., M.Si.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
(' 197504052003121001', 'Dr.  SYAIFUL IQBAL , SE., M.Si., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 197505141999032001', 'TYAS DANARTI HASCARYANI , SE., ME.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 13, ''),
(' 197511052003122001', 'DEVY PUSPOSARI , SE., M.Si., Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 4, ''),
(' 197606282002121002', 'ABDUL GHOFAR , SE., M.Si.,DBA.,Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 197609102002121003', 'PUTU MAHARDIKA ADI SAPUTRA , SE.,M.Si.,MA., Ph.D', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 13, ''),
(' 197610032001121003', 'DEVANTO SHASTA PRATOMO , SE., M.Si., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 6, ''),
(' 197612102003121002', 'DODI WIRAWAN IRAWANTO , SE., M.Com., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 9, ''),
(' 197804152005021001', 'Dr. MOHAMAD KHOIRU RUSYDI , SE., M.Ak., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
(' 197805182008121003', 'AKIE RUSAKTIVA RUSTAM , SE., M.SA., Ak.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 197806212005011003', 'LUTFI HARRIS , SE., M.Ak., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
(' 197904032005011002', 'HELMY ADAM , SE. ,MSA., Ak.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 1, ''),
(' 197908262008122002', 'RIZKA FITRIASARI , SE., M.SA., Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 197912072008121001', 'ADRI PUTRA NUGRAHA , SE., MPA.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 197912172008122002', 'ANITA WIJAYANTI , SE., M.SA., Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 198001162005022001', 'YENEY WIDYA PRIHATININGTIAS , SE., Ak., MSA.,DBA.', 'P', 'PNS', 'Lektor', 1, 'S3', '', '', 4, ''),
(' 198005112008122002', 'MYCHELIA CHAMPACA , SE., Ak., MM.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
(' 198012282005011002', 'FERRY PRASETYIA , SE., M.App.Ec.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 13, ''),
(' 198107022005011002', 'SETYO TRI WAHYUDI , SE., MEc., Ph.D.', 'L', 'PNS', 'Lektor Kepala', 1, 'S3', '', '', 13, ''),
(' 198109182008122002', 'IKHTIARA KAIDENI ISHARINA , SE., MM.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 9, ''),
(' 198112052008122004', 'Dr.  DESI TRI KURNIAWATI , SE., MM.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
(' 198203092008011008', 'MISBAHUDDIN AZZUHRI , SE., MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 198204232005022001', 'FARAH WULANDARI PANGESTUTY , SE., ME.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 13, ''),
(' 198208072005011002', 'DIAS SATRIA , SE., M.App.Ec., Ph.D.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 13, ''),
(' 198208202008012009', 'SRI PALUPI PRABANDARI , SE., MM.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 10, ''),
(' 198208252008121003', 'DIMAS HENDRAWAN , SE., MM.', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 9, ''),
(' 198303192008011003', 'ANANDA SABIL HUSSEIN , SE., M.Com.,Ph.D', 'L', 'PNS', 'Lektor', 1, 'S3', '', '', 10, ''),
(' 198401232015041002', 'AJI PURBA TRAPSILA , SE.I., ME.I', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 16, ''),
(' 198410242010121003', 'ACHMAD ZAKY , SE., MSA., Ak.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 198411212019031004', 'MOH. ATHOILLAH , S.E., M.E.', 'L', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 13, ''),
(' 198412202014042002', 'MIRNA AMIRYA , SE., MSA, Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 198503032014041001', 'SATRIYA CANDRA BONDAN PRABOWO , SE., MM.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
(' 198604022015042002', 'KRISTIN ROSALINA , S.E., MSA., Ak.', 'P', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 1, ''),
(' 198604032015041002', 'AL MUIZZUDDIN FAZAALLOH , SE., ME.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 13, ''),
(' 198606242015041001', 'BAYU ILHAM PRADANA , S.E., M.M.', 'L', 'PNS', 'Asisten Ahli', 1, 'S3', '', '', 9, ''),
(' 198608012015041004', 'NUGROHO SURYO BINTORO , S.E., M.Ec.Dev.', 'L', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 13, ''),
(' 198706012019032009', 'RISCA FITRI AYUNI , S.E., M.M.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 9, ''),
(' 198711132019032009', 'NURLITA NOVIANTI , SE., MSA., Ak.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 1, ''),
(' 199301162019032015', 'LAILA MASRURO PIMADA , S.E., M.SEI.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 14, ''),
(' 199304172019032030', 'PUSVITA YUANA , SE., M.Sc.', 'P', 'PNS', 'Tenaga Pengajar', 1, 'S3', '', '', 9, ''),
(' 2011068401091001', 'DIAN ARI NUGROHO , S.E., M.M', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
(' 2011068506121001', 'YUKI FIRMANTO , SE., MSA., Ak', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 2, ''),
(' 2011068702152001', 'PUTU PRIMA WULANDARI , SE., MSA., Ak.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 2, ''),
(' 2012017811261001', 'YUSUF RISANTO , SE., MM.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 8, ''),
(' 2012018106201001', 'HENDI SUBANDI , SE.,MA.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 2, ''),
(' 2012018509031001', 'RADITYO PUTRO HANDRITO , SE., MM.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 8, ''),
(' 2012018512212001', 'AJENG KARTIKA GALUH , SE., ME.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
(' 2012018609292001', 'NADIYAH HIRFIYANA ROSITA , SE., MM.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 8, ''),
(' 2012018707212001', 'IDA YULIANTI , SE., MM., MBA', 'P', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 7, ''),
(' 2012048712072001', 'VIETHA DEVIA SS , SE., ME.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
(' 2013018809022001', 'VIRGINIA NUR RAHMANTI , SE., M.S.A., Ak.', 'P', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 2, ''),
(' 2013048303052001', 'DWI RETNO WIDIYANTI , SE.I., M.Sc', 'P', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 11, ''),
(' 2013048305101001', 'TAUFIQ ISMAIL , SE., SS., MM', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 7, ''),
(' 2013048406211001', 'RAHADITYA YUNIANTO , SE., MM', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
(' 2013048409291001', 'AGUNG NUGROHO ADI , SE., MM., MM(HRM).', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
(' 2013048507301001', 'SIGIT PRAMONO , SE., M.Sc.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 8, ''),
(' 2013048605212001', 'AJENG WAHYU PUSPITASARI , SE., MA.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 12, ''),
(' 2013128812142001', 'AYU FURY PUSPITA , SE., M.S.A., Ak', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 2, ''),
(' 2014048702201001', 'FAISHAL FADLI , SE., M.E.', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
(' 2014058707032001', 'PUSPITASARI WAHYU ANGGRAENI , SE.,M.Ec.Dev', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
(' 2015078810012001', 'YENNY KORNITASARI , SE., ME.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 11, ''),
(' 2016078109192001', 'RILA ANGGRAENI , S.E., M.M.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
(' 2016078404122001', 'RADITHA DWI VATA HAPSARI , S.E., M.M.', 'P', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
(' 2016078505091001', 'ANAS BUDIHARJO , S.H.I., M.A.', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 3, ''),
(' 2016078711241001', 'AMINNULLAH ACHMAD MUTTAQIN , M.Sc. Fin.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 12, ''),
(' 2016079101181001', 'ATU BAGUS WIGUNA , S.E., M.E.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 11, ''),
(' 2016079111051001', 'M. ABDI DZIL IKHRAM W , S.E., M.M.', 'L', 'Non PNS', 'Asisten Ahli', 1, 'S2', '', '', 7, ''),
(' 2017028406041001', 'MOH. ERFAN ARIF , S.E., M.M.', 'L', 'Non PNS', 'Tenaga Pengajar', 1, 'S2', '', '', 7, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `Dosennip` varchar(20) NOT NULL,
  `Ujianid` int(10) NOT NULL,
  `statusPenguji` int(1) NOT NULL,
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL DEFAULT '0',
  `tgl_tambah_penguji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `valid` int(1) NOT NULL DEFAULT '2',
  `status_notif` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `jumlah_notifikasi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_profile_kode`, `username`, `password`, `is_active`, `nama`, `date_created`, `image`, `jumlah_notifikasi`) VALUES
(30, 1, '1000', '$2y$10$qkdbRXHXAgZowdnYHGYLweZykhyH2.wY1y0dvVL/qcO92oOYgy7aS', 1, 'Admin', '2019-08-20', 'default.png', 0),
(31, 4, ' 195708131983031004', '$2y$10$h1u7IUcVl3FZs42vNhF3re7WsGY21sP4Y/gYidxmBQlh.OiOQyo2S', 1, 'Dr. Drs. BAMBANG HARIADI , M.Ec., Ak.', '2019-08-20', 'default.png', 0),
(32, 4, ' 196211271988021001', '$2y$10$zH9xp8.3OH04fJD.Z2.GlOFB95PLMlnNFmSfnjD8UOi71lNM0AZqW', 1, 'Dr. Drs. ROEKHUDIN , M.Si., Ak.', '2019-08-20', 'default.png', 0),
(33, 4, ' 197804152005021001', '$2y$10$SrGfx8yrsNg9qqPSTl9nmOpJUVMyg3UYkdLLIiKnBUBJFN565GNK6', 1, 'Dr. MOHAMAD KHOIRU RUSYDI , SE., M.Ak., Ak.', '2019-08-20', 'default.png', 0),
(34, 4, ' 2011068702152001', '$2y$10$3E7LZ39xVCLt.B8RqGZ.JOVxMn1Oe0AluLBAJ/A8xRtunv14huTs6', 1, 'PUTU PRIMA WULANDARI , SE., MSA., Ak.', '2019-08-20', 'default.png', 0),
(35, 4, ' 2011068506121001', '$2y$10$sdmO8AsvHpAvTypmUQ5HYeSZSKqyn7zVQM4gjmib9gJjI3Q.6EKyq', 1, 'YUKI FIRMANTO , SE., MSA., Ak', '2019-08-20', 'default.png', 0),
(36, 4, ' 2012018106201001', '$2y$10$X0kY.YCOY/zTMwitXt03bO9rNmnOfF2DkS3KIk1diahK8lo3.j2Jq', 1, 'HENDI SUBANDI , SE.,MA.', '2019-08-20', 'default.png', 0),
(37, 4, ' 2013018809022001', '$2y$10$HgMkxXhKrc9LbkRUEWbRP.6U0NvnryK6.sgk0OsIG8Na1GTO4l0fe', 1, 'VIRGINIA NUR RAHMANTI , SE., M.S.A., Ak.', '2019-08-20', 'default.png', 0),
(38, 4, ' 2013128812142001', '$2y$10$kR0qUuV6CxOecXwm8PicLuG40ulL3fd/Vf/r4l0c.nKPv9ZlNQst6', 1, 'AYU FURY PUSPITA , SE., M.S.A., Ak', '2019-08-20', 'default.png', 0),
(39, 4, ' 195212311978031012', '$2y$10$wKi013jG4dEFPFPncY7PquIBWXRBwXqGJv9/0.z.Zx018W79WoeOW', 1, 'Prof. Dr. BAMBANG SUBROTO , SE., Ak., MM.', '2019-08-20', 'default.png', 0),
(40, 4, ' 195707091983031001', '$2y$10$zbq0hOadqEK2wOjI3OPV8.t4akTECdikSrHRZ9DlIIat83aXa6WPm', 1, 'Prof.Dr. MADE SUDARMA , SE., AK., MM.', '2019-08-20', 'default.png', 0),
(41, 4, ' 195604031985031003', '$2y$10$YG5oH7wwEFypqrx8gogGXe9F8Clpb6TPqoTaySF5tE4jpMTtaoDhS', 1, 'Prof.Dr. SUTRISNO T. , SE., AK., M.Si.', '2019-08-20', 'default.png', 0),
(42, 4, ' 196106301988021001', '$2y$10$LmEubntOqSG2N519IVBo1OfojOAEXGyHvPThE9QfGw5Fu1rfiVZ3m', 1, 'Prof. IWAN TRIYUWONO ,SE., Ak., M.Ec., Ph.D.', '2019-08-20', 'default.png', 0),
(43, 4, ' 196412032003121001', '$2y$10$85v4N7zrlhZMdu0OHTUedO4WQy2Vz9/7RwFKKUOebKGDfh4jspUL6', 1, 'Prof. EKO GANIS SUKOHARSONO , SE., M.Com.Hons., Ph', '2019-08-20', 'default.png', 0),
(44, 4, ' 196201101987011001', '$2y$10$Vo8J7j0FY7Ee1Xo8VMlJs.C/qBRXYqJzKKxEoXaK3AGBNdDMKEyFu', 1, 'Prof. Drs. GUGUS IRIANTO , MSA., Ph.D., Ak.', '2019-08-20', 'default.png', 0),
(45, 4, ' 196001241986012001', '$2y$10$thuJTxrdvs27BAs0hZlwe.f.1YiMkxOwUe8JZ7/IYm7WwiCbXieW6', 1, 'Dr. Dra.  ERWIN SARASWATI , M.Acc.', '2019-08-20', 'default.png', 0),
(46, 4, ' 196912312009121002', '$2y$10$61ng4NiDyOWOpwQWpVnb4.LdYCcNTuCHPHZU3mCP3m3ph11BLcsPG', 1, 'Dr. AJI DEDI MULAWARMAN , SP., MSA.', '2019-08-20', 'default.png', 0),
(47, 4, ' 196810071992032001', '$2y$10$zjKcsDwaHCxWoisBAVWH6eu3wPSCQj2htNHIvv7ZPuckmtrpA8lse', 1, 'TUBAN DRIJAH HERAWATI , SE., Ak., MM.', '2019-08-20', 'default.png', 0),
(48, 4, ' 197806212005011003', '$2y$10$T9buKbDdM9fg34Vw1f4jI.w/bVhKkTs3sqbEucIrsthaQooKhss2i', 1, 'LUTFI HARRIS , SE., M.Ak., Ak.', '2019-08-20', 'default.png', 0),
(49, 4, ' 197904032005011002', '$2y$10$Dav1gH2M0EqnrS419wGZaOsV7xWEvVAaZGlyQKFiPWQ79snHi78zy', 1, 'HELMY ADAM , SE. ,MSA., Ak.', '2019-08-20', 'default.png', 0),
(50, 4, ' 195710051983032001', '$2y$10$BcEwHPuvbH15BCCQjbtXyu5//4q8KDmuHH2QxbK4d1Ge8yTAYnMbO', 1, 'Dra. LINDA ARIAMTIKSNA , Ak.', '2019-08-20', 'default.png', 0),
(51, 4, ' 196906091993032004', '$2y$10$FBSZkLLaZEDNua9dvRJQ8eEjv8S1cNcYPqNJp9aZSnd1XNrgyZS56', 1, 'NURUL FACHRIYAH , SE.,MSA.,Ak.', '2019-08-20', 'default.png', 0),
(52, 4, ' 197805182008121003', '$2y$10$6znakUqwImnyWBxNSPoBUubY3LV3EdX6Oekf8vjaiNrVdvQE1y5zq', 1, 'AKIE RUSAKTIVA RUSTAM , SE., M.SA., Ak.', '2019-08-20', 'default.png', 0),
(53, 4, ' 197912172008122002', '$2y$10$rfLK56Nkog7sx08kc/T4mO/AVbO6w3gKjl2eY99YhWmBvHW6RLpBG', 1, 'ANITA WIJAYANTI , SE., M.SA., Ak.', '2019-08-20', 'default.png', 0),
(54, 4, ' 197912072008121001', '$2y$10$QXVA6A8YS23x.gIdmh4m1uLFebhLbGUwbZA0NIdQXSdeLV2m1d9sy', 1, 'ADRI PUTRA NUGRAHA , SE., MPA.', '2019-08-20', 'default.png', 0),
(55, 4, ' 197908262008122002', '$2y$10$r3qGZ3rbNj/BjA6MiarTEu7rDdtAaS6rpXKXBtPH1TK5Wv8zKuueu', 1, 'RIZKA FITRIASARI , SE., M.SA., Ak.', '2019-08-20', 'default.png', 0),
(56, 4, ' 198410242010121003', '$2y$10$RoqAx5t4.Z/vDYWZzQFjKOsmAXIuMvp8XLhgMUQFy5kD8lB6rEkZe', 1, 'ACHMAD ZAKY , SE., MSA., Ak.', '2019-08-20', 'default.png', 0),
(57, 4, ' 198412202014042002', '$2y$10$5mQGcsNO1oxGXRkyFU8Pi.oGYr92AwHhuiGZ06sEkdd5YgkuhnI3i', 1, 'MIRNA AMIRYA , SE., MSA, Ak.', '2019-08-20', 'default.png', 0),
(58, 4, ' 198604022015042002', '$2y$10$.HO.j8fc6LkuVIfYB1RNs.4oOV3z8H.V/.qZ/lo9m9qtoHh1leECq', 1, 'KRISTIN ROSALINA , S.E., MSA., Ak.', '2019-08-20', 'default.png', 0),
(59, 4, ' 198711132019032009', '$2y$10$W46Leqgl5YcuNe9EsSHTKOV4jVYpER9p2UzdAGb28ekKziZ0MKdDC', 1, 'NURLITA NOVIANTI , SE., MSA., Ak.', '2019-08-20', 'default.png', 0),
(60, 4, ' 195504281986011001', '$2y$10$mX9B7JzSYELUsg7/EdFy1.olmNEkuCwRU8jwPDHbHCw.JGEnRpujW', 1, 'Drs. JIMMY ANDRIANUS , MM., Ak.', '2019-08-20', 'default.png', 0),
(61, 4, ' 2016078505091001', '$2y$10$1gWcQG40SPMixsV1gFpl4.Uth5KjApTL1CN8oeywlfNZT7Eut473a', 1, 'ANAS BUDIHARJO , S.H.I., M.A.', '2019-08-20', 'default.png', 0),
(62, 4, ' 196511021992031002', '$2y$10$m0BI34FxdDhmlfECTCxQZeseuSbhP1GsFrGrt.ANhkXQU1ZTfghdC', 1, 'Drs. IMAM SUBEKTI , Ak., M.Si., Ph.D.', '2019-08-20', 'default.png', 0),
(63, 4, ' 195808201985031002', '$2y$10$M8K8IF.qEgCqhOhaC6M37upk3o38OTcmjLkZp93fYO/CRJEm1gK..', 1, 'Drs. ALI DJAMHURI , Ak., M.Com., Ph.D.', '2019-08-20', 'default.png', 0),
(64, 4, ' 196607061991031001', '$2y$10$NxHa7uhjmcvZcsTXC8KJhe2XjqQTIabo/tDH9CBXRAwPvdOTC74Ya', 1, 'Drs. NURKHOLIS , M.Bus.(Acc)., Ak., Ph.D', '2019-08-20', 'default.png', 0),
(65, 4, ' 195509261983031002', '$2y$10$FrYbBgLsbZZnX6WFgifYBuCJQqCYocUvK/TNUQD9TgJJRIzZYa6lK', 1, 'Dr. BAMBANG PURNOMOSIDHI , SE., MBA., Ak.', '2019-08-20', 'default.png', 0),
(66, 4, ' 196407091991032007', '$2y$10$3SgvCclKDZSowhZWRdlmE.rXbdMYl4Nu7.1Iyn4iJF2gn7kRGrMyu', 1, 'Dr. Dra. LILIK PURWANTI , M.Si., Ak.', '2019-08-20', 'default.png', 0),
(67, 4, ' 197409102002121001', '$2y$10$mhnOwfPVtSwTdgPO2KE34.ZpxRogTs9pAS2jZoJaGPlEoXTVGQ2qC', 1, 'Dr. AULIA FUAD RAHMAN , SE., M.Si., Ak.', '2019-08-20', 'default.png', 0),
(68, 4, ' 195710221984031001', '$2y$10$Ho76oBtzVMv9dG2jklJnYuAa/arN9/sxoV8npy5TMYBZK5E9WxaHC', 1, 'Drs. NASIKIN , Ak., MM.', '2019-08-20', 'default.png', 0),
(69, 4, ' 195910251985031003', '$2y$10$jl6RMDlikGblJ9IL.YNo1e7C9SaEAFWhQTmwfiT.K5ST69tNFjdsS', 1, 'Drs. MUHAMMAD JUSUF WIBISANA , M.Ec., Ak.', '2019-08-20', 'default.png', 0),
(70, 4, ' 196605251991031002', '$2y$10$UErAlNSTEvOTlRlEqOAg0uU3NPHBnTbi0FcRc8vt2p2oH.9HuuF9i', 1, 'Dr. Drs. ZAKI BARIDWAN , Ak., M.Si.', '2019-08-20', 'default.png', 0),
(71, 4, ' 196810291999032001', '$2y$10$1nmMtEkOMlPevsxH9mJVEuOe47mA3hYi8n7klP/UXfsIMIKDvNX0O', 1, 'Dr. WURYAN ANDAYANI , SE., Ak., M.Si.', '2019-08-20', 'default.png', 0),
(72, 4, ' 197606282002121002', '$2y$10$WgUocdoONPXdUfTnVrOXJefNv2LHeahEEw8.HCCBS4Td8egvxqhOK', 1, 'ABDUL GHOFAR , SE., M.Si.,DBA.,Ak.', '2019-08-20', 'default.png', 0),
(73, 4, ' 195902041986012001', '$2y$10$TLOjlJiTsIejkL.plG.MXOS64zpY/5rpuUdr7cCCiWZQa67hlMTES', 1, 'Dra. WIWIK HIDAJAH EKOWATI , M.Si.,Ak.', '2019-08-20', 'default.png', 0),
(74, 4, ' 195808291985031002', '$2y$10$KnhyjSRAJ6fCqye326O1buba.kj9cQ8oCT/jGWbGA.j4eKt1dEVcm', 1, 'Drs. SYAEFULLAH , MM., Ak.', '2019-08-20', 'default.png', 0),
(75, 4, ' 195805111986011002', '$2y$10$jNyVmy2oV2cdJ6xGn1/8VOfxFz3n79mLW86q426GUY//jlJLhxZ2K', 1, 'Dr. Drs. M. ACHSIN , MM., Ak.', '2019-08-20', 'default.png', 0),
(76, 4, ' 195909021986012001', '$2y$10$KqLe05nGs1N/f75jRDRci.fM.15sOZLH3MZpn7T5WdpQvcVnuS/TC', 1, 'Dr. Dra. ENDANG MARDIATI , M.Si., Ak.', '2019-08-20', 'default.png', 0),
(77, 4, ' 196512301991031003', '$2y$10$lxzrO06oIKCcwHj3POAzcubNMRjYE6X7k1q6IPOgCmlOOdjYIfgbS', 1, 'DIDIED POERNAWAN AFFANDY , SE.,MBA., Ak.', '2019-08-20', 'default.png', 0),
(78, 4, ' 195805111983032002', '$2y$10$Jkelr5EZus6dEcwiLRWVU.vyqARPLU2uq21p8./MaPzEuPTh89S22', 1, 'Dra. GRACE WIDIJOKO , MSA., Ak.', '2019-08-20', 'default.png', 0),
(79, 4, ' 196507281992031002', '$2y$10$NVF77I3dLwfPoC2K1OWfBOrxLeb5lYsYnTpvH69vViYyo3UdFImm.', 1, 'KOMARUDIN ACHMAD , SE.,M.Si.,Ak.', '2019-08-20', 'default.png', 0),
(80, 4, ' 196508131990021001', '$2y$10$kCmJTjAxvGcH7dRXq6jRL.JrP6HIjfnw3O4VzSVglhcN/ZJz7x6Za', 1, 'Dr.  BOGAT AGUS RIYONO , SE., MSA., Ak.', '2019-08-20', 'default.png', 0),
(81, 4, ' 196707142005012001', '$2y$10$bQDdCrmKsXsdqQDQ5GMqqezg.zm/3r86blWXCyXu3HjGOpobZWSbK', 1, 'Dr. Dra. ARUM PRASTIWI , M.Si.,Ak.', '2019-08-20', 'default.png', 0),
(82, 4, ' 197206111997022001', '$2y$10$vm63F3P5OZpIjVDCIO4P7uanEGoOz7Kwv/R3UAiPkpKHuG60c9gFe', 1, 'SARI ATMINI , SE., M.Si., Ak.', '2019-08-20', 'default.png', 0),
(83, 4, ' 197504052003121001', '$2y$10$ENjj9Y5jIAMXJZ.ZLBFS6.S75wHfMNrxOC2JEjypdH5waHi2Q83I2', 1, 'Dr.  SYAIFUL IQBAL , SE., M.Si., Ak.', '2019-08-20', 'default.png', 0),
(84, 4, ' 198001162005022001', '$2y$10$mSqmxRGJbsAClXyr4TNwJOid.w8FHXqSCWVl/g.i2aAccgdPYzQ3S', 1, 'YENEY WIDYA PRIHATININGTIAS , SE., Ak., MSA.,DBA.', '2019-08-20', 'default.png', 0),
(85, 4, ' 196509181990021001', '$2y$10$4QDuMEuUOotasK0FmcHCBedUEhdmhtP6Ld4mZAOWht0KJO0sxmB2K', 1, 'Drs. MUHAMMAD TOJIBUSSABIRIN , MBA., Ak.', '2019-08-20', 'default.png', 0),
(86, 4, ' 197511052003122001', '$2y$10$X.DczrtyMV3JKQ4CIJ0OGOPsj3TdVGQDebzSNuHk2ECwsf5nbjsRu', 1, 'DEVY PUSPOSARI , SE., M.Si., Ak.', '2019-08-20', 'default.png', 0),
(87, 4, ' 197210052000031001', '$2y$10$Mr8jbDRvzkmDE9iipNQQx.OH69mgbf89Rst3ejfQrVMIO/b2MCV0u', 1, 'NOVAL ADIB , SE., M.Si., Ak., Ph.D.', '2019-08-20', 'default.png', 0),
(88, 4, ' 195204151974121001', '$2y$10$Eujnx3aWEjwMSp28/DjudO9gVoyWci2DsLmJrtljk1SvaQsLxsmXq', 1, 'Prof.Dr. M. PUDJIHARDJO , SE., MS.', '2019-08-20', 'default.png', 0),
(89, 4, ' 195503221981031002', '$2y$10$RvFGWXKGllFCjl9ZQ4AhuO4oU9c9DpGP2DmrMgiaNSOIxli3iaf16', 1, 'Prof.Dr. MARYUNANI , SE,. MS.', '2019-08-20', 'default.png', 0),
(90, 4, ' 196006151987011001', '$2y$10$x7mhEr0ek8xqVc2N6u6QSek9lXHW9/V6hAEk5ApFRd6FFJlDyuGZO', 1, 'Prof. Dr. AGUS SUMAN , SE., DEA.', '2019-08-20', 'default.png', 0),
(91, 4, ' 197303221997021001', '$2y$10$6uTqqERAp3w2GlEYImkmIu5q03oZhQctZ/dmWo4ZwR6LQYdTEvKwO', 1, 'Prof. AHMAD ERANI YUSTIKA , SE., M.Sc., Ph.D.', '2019-08-20', 'default.png', 0),
(92, 4, ' 196410291989031001', '$2y$10$gzXZPAl3mhHQi2seq/feTuu1SZ/lolKGJHpbICs8cuc9DaIyKSfyW', 1, 'Prof. Dr. CANDRA FAJRI ANANDA , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(93, 4, ' 196203151987011001', '$2y$10$cPoO5u1Kbjw/1kqk2VoWTODLo71Q3SwrXVOZMipA6o63wjyXNnJfG', 1, 'DWI BUDI SANTOSO , SE., MS., Ph.D.', '2019-08-20', 'default.png', 0),
(94, 4, ' 195702121984031003', '$2y$10$c/524/cDlRvRSiUHzPWvp.ET.VWp7dpBHd9izeI9kJ36C1XQqWrfS', 1, 'Prof.Dr. MUNAWAR , SE., DEA.', '2019-08-20', 'default.png', 0),
(95, 4, ' 195809271986011002', '$2y$10$UEc2mJKTVTiKs7lvI02rh.61qPDMC0kJ3VnBPwMyiTZzWoPOYvidW', 1, 'Prof. Dr. GHOZALI MASKI , SE., MS.', '2019-08-20', 'default.png', 0),
(96, 4, ' 195505271981032001', '$2y$10$FVYdGD/sn2t.YO.PWTS.QefAHJlg/thdytutevS8MKV4ZeGX3U5ea', 1, 'Dr. Dra. MULTIFIAH , MS.', '2019-08-20', 'default.png', 0),
(97, 4, ' 196012251987011001', '$2y$10$BXfPPywGRh2VyXNig36eBecJuSnQd7pXal.XYQaZjEzXz2kUqZ36q', 1, 'DAVID KALUGE , SE., MS., M.Ec.Dev., Ph.D', '2019-08-20', 'default.png', 0),
(98, 4, ' 196010301986011001', '$2y$10$myBi8tMr5Yd8UCPbk4/G/OmhQR1RrW18Urra6bjSOiAWv3ohQQQZq', 1, 'Dr. SUSILO , SE., MS.', '2019-08-20', 'default.png', 0),
(99, 4, ' 197610032001121003', '$2y$10$unNWvBgCr.I7dPTmkNyu1.2FyTPMY1m5QzYS0YRUWyvrK9FWIYtFW', 1, 'DEVANTO SHASTA PRATOMO , SE., M.Si., Ph.D.', '2019-08-20', 'default.png', 0),
(100, 4, ' 196104111986012001', '$2y$10$kZLkW2rPcle7/jwlNVQUQ.sn0c9cohr7PzS2hQkhONweNZTRm1x6W', 1, 'Dr. SRI MULJANINGSIH , SE., MSP.', '2019-08-20', 'default.png', 0),
(101, 4, ' 196503111989032001', '$2y$10$8dtC5YprZxujUTHZl5BwteNVb5sDW2CBKVK4uStJXWfCmz0xsj8Iu', 1, 'Dra. MARLINA EKAWATY , M.Si., Ph.D.', '2019-08-20', 'default.png', 0),
(102, 4, ' 196912101997031003', '$2y$10$VkQxSsbQa9WsvY6sLpeOG.9yqNo2RBexKsB6.b3e/aAuH7W7Tt/XO', 1, 'Dr.rer.pol. WILDAN SYAFITRI , SE., ME.', '2019-08-20', 'default.png', 0),
(103, 4, ' 197410181999031001', '$2y$10$r0R55GR7Qh.3vbI5pwqar.LiehQuRIzv/KuPGmn1ful1fXIC0VPta', 1, 'BAHTIAR FITANTO , SE.,MT.', '2019-08-20', 'default.png', 0),
(104, 4, ' 197305172003121002', '$2y$10$Bxg28VXuvVrlPkuYe6zpxeYwawLymrF0BvnEEq27rqXJfI0fMH2q2', 1, 'SHOFWAN , SE., M.Si.', '2019-08-20', 'default.png', 0),
(105, 4, ' 197302102001121001', '$2y$10$qFoMW4EVfPc1.9sx5JdLxezAU26G8suQmlPAYVpJ97iON.4.xXxPe', 1, 'NURMAN SETIAWAN FADJAR , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(106, 4, ' 2011068401091001', '$2y$10$B27HSRShM8IZWEDQUOo6aulWoSiiTDl8xteDfvlsjPSJQlYW6wQe2', 1, 'DIAN ARI NUGROHO , S.E., M.M', '2019-08-20', 'default.png', 0),
(107, 4, ' 2012018609292001', '$2y$10$WDN89a7BbKXrRLqFIx3a9ea6VIsH4HB1xh15Ty3cyBiqGD4sUwhD2', 1, 'NADIYAH HIRFIYANA ROSITA , SE., MM.', '2019-08-20', 'default.png', 0),
(108, 4, ' 2012017811261001', '$2y$10$8kdBAsKoHsjVLB0OhiR2TefBDXG9Dx13aqTIGxwJxrkqjHJ0JH0Oy', 1, 'YUSUF RISANTO , SE., MM.', '2019-08-20', 'default.png', 0),
(109, 4, ' 2012018509031001', '$2y$10$Kb/fmdKvpwsikpMyFQpaMuwrnqhxONovA9ewDKq6zDh6K6wUo1LWq', 1, 'RADITYO PUTRO HANDRITO , SE., MM.', '2019-08-20', 'default.png', 0),
(110, 4, ' 2012018707212001', '$2y$10$fFOeqxwbJF2ZrZa7KDSbo.NSUta72dN4of4wedrR.gDX9eqyIEJ86', 1, 'IDA YULIANTI , SE., MM., MBA', '2019-08-20', 'default.png', 0),
(111, 4, ' 2013048406211001', '$2y$10$RYT1pRNktpNj88vl2jVi1OsZtf7YzSiy.uLJuLiC93Bt9XRkQG/ri', 1, 'RAHADITYA YUNIANTO , SE., MM', '2019-08-20', 'default.png', 0),
(112, 4, ' 2013048409291001', '$2y$10$LMnrvICfuBsndUVw1DMsKuHqrmWODd6LXd4rjsEQal57XxcmKXOEG', 1, 'AGUNG NUGROHO ADI , SE., MM., MM(HRM).', '2019-08-20', 'default.png', 0),
(113, 4, ' 2013048507301001', '$2y$10$oBnBbRduneN62MoEWlHT.eN5j4gK9JCzubMPg1exV8QOkvlUZ4ORi', 1, 'SIGIT PRAMONO , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(114, 4, ' 2013048305101001', '$2y$10$lrpt8kbhpDPKKJxxtWusLuurZd49z5EF/CnGH0D/NAqgT12a9bg7S', 1, 'TAUFIQ ISMAIL , SE., SS., MM', '2019-08-20', 'default.png', 0),
(115, 4, ' 2016078404122001', '$2y$10$V7imsBH83dM3Bc0k2mukruweR4.i4eyw7WUcV7Zr20Zmb99ARsasO', 1, 'RADITHA DWI VATA HAPSARI , S.E., M.M.', '2019-08-20', 'default.png', 0),
(116, 4, ' 2016078109192001', '$2y$10$nq3GqF2wYPY4K2QQUJTBNukmCK8m.rfVfF9R8mkZiMAYP4XuKPLNq', 1, 'RILA ANGGRAENI , S.E., M.M.', '2019-08-20', 'default.png', 0),
(117, 4, ' 2016079111051001', '$2y$10$DEgid.wXmyEBYJ4EvraBJuhYo38XkFMicRjyhE8KvNMU0Xk1WJlIy', 1, 'M. ABDI DZIL IKHRAM W , S.E., M.M.', '2019-08-20', 'default.png', 0),
(118, 4, ' 2017028406041001', '$2y$10$ye0LW6znbNsc9uC4wdBdQOEqNOhV6oLLnJna5SKH3XH07X13Jx8oe', 1, 'MOH. ERFAN ARIF , S.E., M.M.', '2019-08-20', 'default.png', 0),
(119, 4, ' 195307271979031005', '$2y$10$pI/.Id3CnEo4cdjI35o5DO0j1Ueixr9o1lAFkH7KBmaPS0scjW/.W', 1, 'Prof. Dr. H. MOELJADI , SE., SU.', '2019-08-20', 'default.png', 0),
(120, 4, ' 195012081981031003', '$2y$10$p4CcwJ5fWBVWsO9SiIvXdukwUCA.EG94j1uJyvclEoZG4xLcDAZz6', 1, 'Prof.Dr.Drs. SURACHMAN , MSIE.', '2019-08-20', 'default.png', 0),
(121, 4, ' 195805291984031002', '$2y$10$SgZQlflaObaWVv8uDIDYLeTg2Xn9ZyhbN5MuXTb48OO6vyDctAV8a', 1, 'Prof.Dr. ACHMAD SUDIRO , SE., ME.', '2019-08-20', 'default.png', 0),
(122, 4, ' 195210241981031003', '$2y$10$J22/mQtqWTsoSEmTGErrP.Ivcf344WM9i/N0x.43d/DYy3P6fYasG', 1, 'Prof. Dr. Drs. MARGONO , SU.', '2019-08-20', 'default.png', 0),
(123, 4, ' 195408181983031004', '$2y$10$vtJoVTC6eSCA67mAT181OeDY5nNG24/JcqpZwV4qv4QxfqVMmpw/u', 1, 'Prof.Dr. H. ARMANU , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(124, 4, ' 196111081986012002', '$2y$10$3nBzA0KxDFj1mo2xT7tNe.Jz0x32pD8vS1wCxuzKJiL9dvpVOvWgO', 1, 'Prof. Dr. Dra. NOERMIJATI , M.T.M.', '2019-08-20', 'default.png', 0),
(125, 4, ' 195802231984031003', '$2y$10$2ZDQhg2EgSMiFrwVIB.yl.zyMYv3f1wW2UKDP.q26uKhpGWS/nXCe', 1, 'Drs. SUNARYO , M.Si., Ph.D.', '2019-08-20', 'default.png', 0),
(126, 4, ' 195803181985031003', '$2y$10$kkyNiNJMXKrLlMA3oPGdoOfU.sTITkgO/oRXnsr9G8wPnEqAxVwBW', 1, 'Dr. MUGIONO , SE., MM.', '2019-08-20', 'default.png', 0),
(127, 4, ' 196005161985032002', '$2y$10$9wwlXHuVJ1yE0r20M6qRheFlpscoIBlbjrrBWO7HdcKZgEZrpF5ZW', 1, 'Dr. ROFIATY , SE., MM.', '2019-08-20', 'default.png', 0),
(128, 4, ' 195608101985031002', '$2y$10$NGZYPZGTtwEnKEQ5W8E7nuszneRdi9huUjyVF7fEcDVZjkjlzyQzS', 1, 'Dr. Drs. SUDJATNO , MS.', '2019-08-20', 'default.png', 0),
(129, 4, ' 195907311986012001', '$2y$10$k9J4nWSaxBKXsA/Pkv/dsOWcy9d33E3r0osNDHgJ90KKvb50vUFmK', 1, 'Dr. Dra. SUMIATI , M.Si.', '2019-08-20', 'default.png', 0),
(130, 4, ' 195811051986011001', '$2y$10$bsGVDONCqRlZz85KhogPCu6XT8feiSjb7wqBY62k6CkVAk8.LSWp.', 1, 'ANANTO BASUKI , SE., MM.', '2019-08-20', 'default.png', 0),
(131, 4, ' 195907261986011001', '$2y$10$.lOEOMl5.C3HOb78apN8DuLLIvXXpKl6836yVL/6Qy9t9isS4lsOC', 1, 'Dr. WAHDIYAT MOKO , SE., MM.', '2019-08-20', 'default.png', 0),
(132, 4, ' 196101211986011005', '$2y$10$REuvf6iinnkxgILLwaePUediv43vjAhAN0hcruHBsombzKOEjX/Fy', 1, 'Dr. Drs. FATCHUR ROHMAN , M.Si.', '2019-08-20', 'default.png', 0),
(133, 4, ' 196011111986012001', '$2y$10$K1zTbMHRmA30BUitmnPQz.SwwKYGxHP5yhRPo6XHYh2CcFFkZ8leW', 1, 'Dr. SITI AISJAH , SE., MS.', '2019-08-20', 'default.png', 0),
(134, 4, ' 196205101986012001', '$2y$10$Lna3j/0Qvhh2fi47887rhOLaWtJNMjMceKWj7dUYxNYxwbeBiEOAS', 1, 'RISNA WIJAYANTI , SE., MM., Ph.D.', '2019-08-20', 'default.png', 0),
(135, 4, ' 196206071987011001', '$2y$10$7fKSvp600hV2RhfQAqHQTutCjn9AhqXk7BR/Qc8YFpxWk2KFb2Fxe', 1, 'TOTO RAHARDJO , SE., MM.', '2019-08-20', 'default.png', 0),
(136, 4, ' 196306221988022001', '$2y$10$J3QXMdwKMcT8EEZiBbnW0uhEun9FPWfZEr/xZB6bTpwE0z3p7miyq', 1, 'Dr. Dra. NUR KHUSNIYAH INDRAWATI , M.Si.', '2019-08-20', 'default.png', 0),
(137, 4, ' 195907101986012001', '$2y$10$B9O8lOVc92LTNhELZWtcweGK9JDBCBpMBBuZcHNDVJnSVvC3jLLhq', 1, 'Dr. ASTRID PUSPANINGRUM , SE., MM.', '2019-08-20', 'default.png', 0),
(138, 4, ' 197612102003121002', '$2y$10$N0qvD2CTWLzEHol9mTdH5.3Axu2ZbYa8I3UHYx.iKRHrrN5s3dmRK', 1, 'DODI WIRAWAN IRAWANTO , SE., M.Com., Ph.D.', '2019-08-20', 'default.png', 0),
(139, 4, ' 196112201986012001', '$2y$10$G4wU1WawmH1P6fRRKu4.SuJjC5vpImHdSVQnnrGYTBVQR.PnOjRSS', 1, 'Dr. HIMMIYATUL AMANAH JIWA JUWITA , SE., MM.', '2019-08-20', 'default.png', 0),
(140, 4, ' 195806201983031001', '$2y$10$dF1rvl5PHf8p4GdGl9ZYDu0VJZyiYCy7u2fLwUcyJBl3138irbI6G', 1, 'Dr. Drs. AGUNG YUNIARINTO , MS.', '2019-08-20', 'default.png', 0),
(141, 4, ' 195511171984032001', '$2y$10$BtV6t8F6DSwhbGGvT/9.xeJNpCCd2yr1.siGq0ztEGwmdUASUfEJq', 1, 'Dra. LILY HENDRASTI NOVADJAJA , MM.', '2019-08-20', 'default.png', 0),
(142, 4, ' 196008011986031005', '$2y$10$BksZ3.A7Rpc/Vq5tIT7tzOs7RXfhmOX9xI77nHjI/1qy0.Z7Rmcla', 1, 'Dr. ATIM DJAZULI , SE.,MM.', '2019-08-20', 'default.png', 0),
(143, 4, ' 196109232006042001', '$2y$10$rP2gqRdtaoKs258TWqLQBOITYQQEXWiI7OI3U7vv6LOTAOktF/0Vu', 1, 'Dr. Dra. KUSUMA RATNAWATI , MM.', '2019-08-20', 'default.png', 0),
(144, 4, ' 195510141986012001', '$2y$10$T19jvu0B/wAboVTaSDkT2.PejKoufQ0uq0XTczfil/hLl.O.hFl4S', 1, 'Dr. MINTARTI RAHAYU , SE., MS.', '2019-08-20', 'default.png', 0),
(145, 4, ' 198303192008011003', '$2y$10$JngBhLNHMNrNYyshNL/zc.BFZXGNiaYB.URWc7R1reT/.xj16WZa6', 1, 'ANANDA SABIL HUSSEIN , SE., M.Com.,Ph.D', '2019-08-20', 'default.png', 0),
(146, 4, ' 197307081997021001', '$2y$10$tJYup9UGifa2IC8MsP1FBufNSjmzvsxOiiWMNph83wN9hdUTQOJVG', 1, 'Dr. NANANG SURYADI , SE., MM.', '2019-08-20', 'default.png', 0),
(147, 4, ' 196101291998022001', '$2y$10$krfqHBrYm7xcs79mkzB0PuX0KGbG5bUM9bqxJAjl6lz4rVXgSghUO', 1, 'Dr. Dra. ANDARWATI , M.E', '2019-08-20', 'default.png', 0),
(148, 4, ' 197106232002121002', '$2y$10$2JQrim.WImVb.9trhBmsFOODtS2.IoKR1dkKGMYOlM0C6OB/oMILS', 1, 'AINUR ROFIQ , SE., MM., Ph.D.', '2019-08-20', 'default.png', 0),
(149, 4, ' 198208252008121003', '$2y$10$kFW6COCLOIsjLXixe6fqNep5CP8dJpMbsP.Oents0ydN8RjQMuAoG', 1, 'DIMAS HENDRAWAN , SE., MM.', '2019-08-20', 'default.png', 0),
(150, 4, ' 198203092008011008', '$2y$10$.HsKrvOvzje71RtmJt5u5uHgi9MaKswQ3GbES8e6qR6A3z6dkGuDG', 1, 'MISBAHUDDIN AZZUHRI , SE., MM.', '2019-08-20', 'default.png', 0),
(151, 4, ' 196410101998022001', '$2y$10$BAsleEt5qijtR34jUMfeTet86Pzi7UO8rFc.jG0Eb7zhSt5aoLn06', 1, 'Ir. NUR PRIMA WALUYOWATI , MM.', '2019-08-20', 'default.png', 0),
(152, 4, ' 198208202008012009', '$2y$10$Qnlfx2hLErkfHW8jw4SY1.BxnP6cRp7quDxqpltqa6B0IzQOQMB9i', 1, 'SRI PALUPI PRABANDARI , SE., MM.', '2019-08-20', 'default.png', 0),
(153, 4, ' 198112052008122004', '$2y$10$aHcoC7wm9nW3gI4YgyRE/eiCSSNDla0DklButlAIPD47uQ0wQcfGm', 1, 'Dr.  DESI TRI KURNIAWATI , SE., MM.', '2019-08-20', 'default.png', 0),
(154, 4, ' 198109182008122002', '$2y$10$V2AInmA70l6I1YBoqfmUbe0SY9uuAhdqzJT4uO6imqeMcVfJ5tMgC', 1, 'IKHTIARA KAIDENI ISHARINA , SE., MM.', '2019-08-20', 'default.png', 0),
(155, 4, ' 198005112008122002', '$2y$10$ZMtDJftIgXSrxXH2.odsV.tP2WlSE3PCFK51ftCM09TXJyrfKLHqy', 1, 'MYCHELIA CHAMPACA , SE., Ak., MM.', '2019-08-20', 'default.png', 0),
(156, 4, ' 198503032014041001', '$2y$10$VZXLGcemXIfLf4j7Z/aLreujiyIonN2DJqtux5cvNrm0PK7EKOuF6', 1, 'SATRIYA CANDRA BONDAN PRABOWO , SE., MM.', '2019-08-20', 'default.png', 0),
(157, 4, ' 198606242015041001', '$2y$10$URGGSIYP3veNdMVltBWgp..jtwRBK6ka72B2GaApJE8a1hcEKVhEm', 1, 'BAYU ILHAM PRADANA , S.E., M.M.', '2019-08-20', 'default.png', 0),
(158, 4, ' 199304172019032030', '$2y$10$nDipf8uC5UlZODNOxcVC..SGeNtlq//Tu9OA7zVomOYe/lT7peeXS', 1, 'PUSVITA YUANA , SE., M.Sc.', '2019-08-20', 'default.png', 0),
(159, 4, ' 198706012019032009', '$2y$10$.jazV2.IoIu6kZDOfvADdOg0lz6sUnfq6ndeASYjofQ0hkLdClP7u', 1, 'RISCA FITRI AYUNI , S.E., M.M.', '2019-08-20', 'default.png', 0),
(160, 4, ' 197412082000032001', '$2y$10$8k.EEhy1.r.UIF9EJdAI9Oida1xT8.R3V6h8dcZH.KZhzQGNwXIRS', 1, 'Dr. CHRISTIN SUSILOWATI , SE., M.Si.', '2019-08-20', 'default.png', 0),
(161, 4, ' 2012048712072001', '$2y$10$1tu7fgS9vZPXDNVL7IXr1ec3tcNyyHnWVQfaUCbJBwo1KtePA5p4K', 1, 'VIETHA DEVIA SS , SE., ME.', '2019-08-20', 'default.png', 0),
(162, 4, ' 2012018512212001', '$2y$10$1nJcu6SgN1YnNdsr3aj92uyacMJKXZeSfJujE2BG/iMoiCIJVWwG.', 1, 'AJENG KARTIKA GALUH , SE., ME.', '2019-08-20', 'default.png', 0),
(163, 4, ' 2014048702201001', '$2y$10$UOMhwyYocC8Vhu.hCUrGfOSR105Kk9Nveb/jRF7oR5G3S2ZyiL2XK', 1, 'FAISHAL FADLI , SE., M.E.', '2019-08-20', 'default.png', 0),
(164, 4, ' 2013048605212001', '$2y$10$gjyEGDD5Pvg9RbWGAS1st.5k/1xUv4IQSjO2EGaLeSxS5hVv4bNTW', 1, 'AJENG WAHYU PUSPITASARI , SE., MA.', '2019-08-20', 'default.png', 0),
(165, 4, ' 2013048303052001', '$2y$10$RgDRH6YTPrxpVh/iILliE.VnKcBrVzJDITLrI6duiQdkt7xeAfQYu', 1, 'DWI RETNO WIDIYANTI , SE.I., M.Sc', '2019-08-20', 'default.png', 0),
(166, 4, ' 2014058707032001', '$2y$10$S.Zuw.L5GXTrIcCE.c5zVet8nGEKbZhNlIo4Z9PcVJ5wDZb59zklK', 1, 'PUSPITASARI WAHYU ANGGRAENI , SE.,M.Ec.Dev', '2019-08-20', 'default.png', 0),
(167, 4, ' 2015078810012001', '$2y$10$T8uMVRgvBJpqmkGlZTrzKe3Cn6NrGrFul4avXOakjxQixIe86wYEC', 1, 'YENNY KORNITASARI , SE., ME.', '2019-08-20', 'default.png', 0),
(168, 4, ' 2016078711241001', '$2y$10$EUdDVQOFWNiceJIDVLxZFOeDIqiV0eIRlixf.QYJV7/mo4ZeBtM5K', 1, 'AMINNULLAH ACHMAD MUTTAQIN , M.Sc. Fin.', '2019-08-20', 'default.png', 0),
(169, 4, ' 2016079101181001', '$2y$10$h.h/9bOrv49Vms4EaHWl7uh/kRgXhwTrZQJcusJd4o29hfT.faojO', 1, 'ATU BAGUS WIGUNA , S.E., M.E.', '2019-08-20', 'default.png', 0),
(170, 4, ' 195508151984031002', '$2y$10$E271Xz8hGkd2b9w9AmJB/ushQ5Od5iOU/QtdIzPMUNHhBWm4pAzPm', 1, 'Prof. Dr. KHUSNUL ASHAR , SE., M.A.', '2019-08-20', 'default.png', 0),
(171, 4, ' 196809111991032003', '$2y$10$5JduRzBnhuJCdgGGbRSQMuAJZCEJMJBp2DGQJ48BXIyAbeZnmMi.2', 1, 'Dr. Dra. ASFI MANZILATI , ME.', '2019-08-20', 'default.png', 0),
(172, 4, ' 195907101983031004', '$2y$10$8BHNDPClZW3qVyQKmcPc7uBgD5roizFWXZmbA2gLaom67cxaYXVpC', 1, 'Dr. Drs. ISWAN NOOR , ME.', '2019-08-20', 'default.png', 0),
(173, 4, ' 197101111998021001', '$2y$10$H.MvKkUCDENfoIzYso6pmOCVKdbUddobu6GiZczSbqh/jgGv5MNQy', 1, 'Dr. MOH. KHUSAINI , SE., M.Si., MA.', '2019-08-20', 'default.png', 0),
(174, 4, ' 197609102002121003', '$2y$10$C5RdKHhx3yqO/OVd6uA9eOAlbg8aIBuM/Of8ANwtiJdGcyd1ROXee', 1, 'PUTU MAHARDIKA ADI SAPUTRA , SE.,M.Si.,MA., Ph.D', '2019-08-20', 'default.png', 0),
(175, 4, ' 197009221995121002', '$2y$10$cBJVBV2ujXmQ6mCYyiTpoOYMLMun4J/VJTH4k/7setcaLZT/9cQoC', 1, 'ARIF HOETORO , SE., MT., Ph.D.', '2019-08-20', 'default.png', 0),
(176, 4, ' 198208072005011002', '$2y$10$RRJO5LqWtTIHEwHy1bHOKuinT85T/sR1Bqz0/cVYxDrGilps0GZoe', 1, 'DIAS SATRIA , SE., M.App.Ec., Ph.D.', '2019-08-20', 'default.png', 0),
(177, 4, ' 195807091986031002', '$2y$10$gvuxLAetgQbD40M5wev1hudZ/0EpEi5Ir0/5FVpYkqKNbQATcQn5y', 1, 'EDDY SUPRAPTO , SE., ME.', '2019-08-20', 'default.png', 0),
(178, 4, ' 196311161990021001', '$2y$10$7cNtVi3PGeZjHxrdJ/F1juq3nZDABAffDGorllbSSV/Xcq1sCwOAa', 1, 'Dr. RACHMAD KRESNA SAKTI , SE., M.Si.', '2019-08-20', 'default.png', 0),
(179, 4, ' 198107022005011002', '$2y$10$nwsXF102WLu6LMA9YdVVG.SRJA4LGvvw3/XSaXCARPUbT23ZqY2Em', 1, 'SETYO TRI WAHYUDI , SE., MEc., Ph.D.', '2019-08-20', 'default.png', 0),
(180, 4, ' 197505141999032001', '$2y$10$h392t0YJvNpuli1FOthBoehq.Ro9TXMSegFKVoKhcbvKI1Y.6yFum', 1, 'TYAS DANARTI HASCARYANI , SE., ME.', '2019-08-20', 'default.png', 0),
(181, 4, ' 198012282005011002', '$2y$10$4u9IN5GWDdZ7kP.VTZqM.OcI4G3/9jo6j4allGn9YcvoNXbdXUOOi', 1, 'FERRY PRASETYIA , SE., M.App.Ec.', '2019-08-20', 'default.png', 0),
(182, 4, ' 198608012015041004', '$2y$10$DozyeCJGs/VmAmi3wa/t5uHYNcT0fWelfOvuLtJIx1YNfM/.InD8q', 1, 'NUGROHO SURYO BINTORO , S.E., M.Ec.Dev.', '2019-08-20', 'default.png', 0),
(183, 4, ' 198401232015041002', '$2y$10$RsmOxI51ws0BMCE3lfMkzOhRjxpHmqmTYJ7W4d2ROcGnAvARC.y3i', 1, 'AJI PURBA TRAPSILA , SE.I., ME.I', '2019-08-20', 'default.png', 0),
(184, 4, ' 198604032015041002', '$2y$10$ufLKTsrUvYF7SXH44t9TiOw10eCo2k76YbrbrDnVSJIg3jv/c2G7O', 1, 'AL MUIZZUDDIN FAZAALLOH , SE., ME.', '2019-08-20', 'default.png', 0),
(185, 4, ' 199301162019032015', '$2y$10$8MqHoMw.8cyW9ZSIlU/WYO4HZTX5c87hQKWfbgHaialIbfYwElGNK', 1, 'LAILA MASRURO PIMADA , S.E., M.SEI.', '2019-08-20', 'default.png', 0),
(186, 4, ' 198411212019031004', '$2y$10$d8c77ct55mruzQem2B64U.a6NHis.gUb5Np3NtlkYLOtsP42U4tmy', 1, 'MOH. ATHOILLAH , S.E., M.E.', '2019-08-20', 'default.png', 0),
(187, 4, ' 198204232005022001', '$2y$10$BO5kw4RQlg4DA2B4hNdksOmUI6VqyizuORmHbpBfQh1ube6XdOlyy', 1, 'FARAH WULANDARI PANGESTUTY , SE., ME.', '2019-08-20', 'default.png', 0),
(188, 4, ' 197403022005012001', '$2y$10$wa0iVO8FqlAhD0SeqLhqJeNxM5dolGlbSwlg.O5jpK9IgPrO0eVzG', 1, 'Dr. NURUL BADRIYAH , SE.,ME.', '2019-08-20', 'default.png', 0);

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
  ADD UNIQUE KEY `noTest` (`noTest`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `idJurnal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

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
