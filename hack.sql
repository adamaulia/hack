-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2015 at 12:10 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hack`
--
CREATE DATABASE IF NOT EXISTS `hack` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hack`;

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_agama` varchar(25) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `jenis_agama`) VALUES
(1, 'Islam'),
(2, 'Protestan'),
(3, 'katolik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Kong Hu Cu');

-- --------------------------------------------------------

--
-- Table structure for table `hakim`
--

CREATE TABLE IF NOT EXISTS `hakim` (
  `id_hakim` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(30) NOT NULL,
  `nama_hakim` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_hakim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hakim`
--

INSERT INTO `hakim` (`id_hakim`, `alamat`, `nama_hakim`) VALUES
(1, 'bandung', 'PN Bandung'),
(2, 'Bogor', 'PN Bogor');

-- --------------------------------------------------------

--
-- Table structure for table `kelamin`
--

CREATE TABLE IF NOT EXISTS `kelamin` (
  `id_kelamin` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kelamin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kelamin`
--

INSERT INTO `kelamin` (`id_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan'),
(3, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `kriminalitas`
--

CREATE TABLE IF NOT EXISTS `kriminalitas` (
  `id_kriminalitas` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kriminalitas` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kriminalitas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kriminalitas`
--

INSERT INTO `kriminalitas` (`id_kriminalitas`, `jenis_kriminalitas`) VALUES
(1, 'perampokan/pencurian'),
(2, 'penipuan'),
(3, 'pembunuhan'),
(4, 'pelanggaran lalu lintas');

-- --------------------------------------------------------

--
-- Table structure for table `ktp`
--

CREATE TABLE IF NOT EXISTS `ktp` (
  `NIK` varchar(50) NOT NULL,
  `tag_id` varchar(30) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `Tempat` varchar(25) NOT NULL,
  `TTL` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_kelamin` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_status_perkawinan` int(11) NOT NULL,
  PRIMARY KEY (`NIK`),
  UNIQUE KEY `NIK` (`NIK`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ktp`
--

INSERT INTO `ktp` (`NIK`, `tag_id`, `nama`, `Tempat`, `TTL`, `alamat`, `kewarganegaraan`, `masa_berlaku`, `id_agama`, `id_kelamin`, `id_pekerjaan`, `id_status_perkawinan`) VALUES
('3204082402950006', '04738152062b80 ', 'ADAM AULIA RAHMADI', 'Bandung', '1995-02-24', 'JL. GRIYA PERMAI B-29', 'WNI', '2017-02-24', 1, 1, 36, 1),
('3204082402950007', '7897899', 'aulia', 'bandung', '1995-10-07', 'cibiru', 'WNI', '2015-10-10', 3, 2, 14, 1),
('3204082402950008', '35965767', 'rahmadi', 'bandung', '1994-10-28', 'buah batu', 'WNI', '2016-10-28', 1, 1, 31, 1),
('3577031406940003', '0498662a022c80', 'aditya arya mahesa', 'Madiun', '1994-07-01', 'Madiun', 'Indonesia', '2017-02-24', 1, 1, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `map_kriminal_ktp`
--

CREATE TABLE IF NOT EXISTS `map_kriminal_ktp` (
  `id_map_kriminal_ktp` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` varchar(30) DEFAULT NULL,
  `NIK` varchar(50) NOT NULL,
  `id_kriminalitas` int(11) NOT NULL,
  `id_hakim` int(11) NOT NULL,
  PRIMARY KEY (`id_map_kriminal_ktp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `map_kriminal_ktp`
--

INSERT INTO `map_kriminal_ktp` (`id_map_kriminal_ktp`, `tag_id`, `NIK`, `id_kriminalitas`, `id_hakim`) VALUES
(1, '04738152062b80 ', '3204082402950006', 4, 1),
(2, '04738152062b80 ', '3204082402950006', 2, 1),
(3, NULL, '3204082402950006', 3, 2),
(4, NULL, '3204082402950007', 3, 2),
(5, NULL, '3204082402950008', 1, 1),
(6, NULL, '3204082402950008', 3, 1),
(7, NULL, '3204082402950008', 2, 2),
(8, NULL, '3204082402950008', 1, 1),
(9, '04738152062b80 ', '', 1, 1),
(10, '04738152062b80 ', '', 1, 2),
(11, '', '3204082402950006', 3, 1),
(12, '3204082402950006', '', 3, 2),
(13, '', '3204082402950006', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `map_ktp_penyakit`
--

CREATE TABLE IF NOT EXISTS `map_ktp_penyakit` (
  `id_map_ktp_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(50) DEFAULT NULL,
  `tag_id` varchar(30) DEFAULT NULL,
  `penyakit` varchar(50) NOT NULL,
  `obat` varchar(50) NOT NULL,
  `id_rumah_sakit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_map_ktp_penyakit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `map_ktp_penyakit`
--

INSERT INTO `map_ktp_penyakit` (`id_map_ktp_penyakit`, `NIK`, `tag_id`, `penyakit`, `obat`, `id_rumah_sakit`) VALUES
(1, '3204082402950006', '04738152062b80 ', 'flu', 'panadol', '1'),
(2, '3204082402950006', '04738152062b80 ', 'flu + batuk', 'panadol', '2'),
(3, '3204082402950006', '', 'dbd', 'jus jambu', '1'),
(4, '3204082402950006', NULL, 'asma', 'inhaler', '1'),
(5, '', NULL, '', '', ''),
(6, '', '04738152062b80 ', 'asma', 'oksigen', '1'),
(7, '', '04738152062b80 ', 'ksjdj', 'ksjdf', '2'),
(8, '', '04738152062b80 ', 'tes', 'tes', '3');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_pekerjaan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `jenis_pekerjaan`) VALUES
(1, 'Arsitek'),
(2, 'Apoteker'),
(3, 'Akuntan'),
(4, 'Aktor'),
(5, 'Atlet'),
(6, 'Aktris'),
(7, 'Bidan'),
(8, 'Buruh'),
(9, 'Camat'),
(10, 'Dokter'),
(11, 'Dosen'),
(12, 'Desainer'),
(13, 'Editor'),
(14, 'Fotografer'),
(15, 'Guru'),
(16, 'Hakim'),
(17, 'Ilustrator'),
(18, 'Ilmuwan'),
(19, 'Jaksa'),
(20, 'Kondektur'),
(21, 'Koki'),
(22, 'Lurah'),
(23, 'Manajer'),
(24, 'Nelayan'),
(25, 'Pegawai Negeri'),
(26, 'Pegawai Swasta'),
(27, 'Penyanyi'),
(28, 'Pengacara'),
(29, 'Pemahat'),
(30, 'Polisi'),
(31, 'Programmer'),
(32, 'Psikologi'),
(33, 'Psikiater'),
(34, 'Pengusaha'),
(35, 'Pilot'),
(36, 'Pelajar/Mahasiwa'),
(37, 'Pramugari'),
(38, 'Mahasiswa'),
(39, 'Satpam'),
(40, 'Supir');

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE IF NOT EXISTS `rumah_sakit` (
  `id_rumah_sakit` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  PRIMARY KEY (`id_rumah_sakit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id_rumah_sakit`, `nama`, `alamat`) VALUES
(1, 'RS Hasan Sadikin', 'Dago'),
(2, 'RS Al-Islam', 'Bypass'),
(3, 'Muhammadiyah', 'bubat');

-- --------------------------------------------------------

--
-- Table structure for table `status_perkawinan`
--

CREATE TABLE IF NOT EXISTS `status_perkawinan` (
  `id_status_perkawinan` int(11) NOT NULL AUTO_INCREMENT,
  `status_perkawinan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_status_perkawinan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status_perkawinan`
--

INSERT INTO `status_perkawinan` (`id_status_perkawinan`, `status_perkawinan`) VALUES
(1, 'belum kawin'),
(2, 'kawin'),
(3, 'duda'),
(4, 'janda');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
