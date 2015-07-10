-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2015 at 03:10 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cuci`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_role`
--

CREATE TABLE IF NOT EXISTS `adm_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `adm_role`
--

INSERT INTO `adm_role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `adm_user`
--

CREATE TABLE IF NOT EXISTS `adm_user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm_user`
--

INSERT INTO `adm_user` (`username`, `password`, `nama_lengkap`, `id_role`, `status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2, 1),
('septiyadi', '7b619d6e91a011c5a308b7e9d3f3befb', 'septiyadi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_fuzzy`
--

CREATE TABLE IF NOT EXISTS `hasil_fuzzy` (
  `id_hasil_fuzzy` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  PRIMARY KEY (`id_hasil_fuzzy`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hasil_fuzzy`
--


-- --------------------------------------------------------

--
-- Table structure for table `karakteristik_user`
--

CREATE TABLE IF NOT EXISTS `karakteristik_user` (
  `karakteristik_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `alternatif_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`karakteristik_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `karakteristik_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `kriteria_id` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(30) NOT NULL,
  `bobot` float DEFAULT NULL,
  PRIMARY KEY (`kriteria_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kriteria`, `bobot`) VALUES
(1, 'merek', NULL),
(2, 'jumlah_tabung', NULL),
(3, 'garansi', NULL),
(4, 'kapasitas mesin', NULL),
(5, 'jenis pintu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE IF NOT EXISTS `mesin` (
  `id_mesin` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin_kategori` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jenis_tabung` tinyint(4) DEFAULT NULL COMMENT '1: satu tabung 2: 2 tabung',
  `fitur_lainya` text,
  `nama_mesin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_mesin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `id_mesin_kategori`, `gambar`, `harga`, `jenis_tabung`, `fitur_lainya`, `nama_mesin`) VALUES
(11, 2, 'U4ksnfL.jpg', NULL, 1, 'Bisa cuci dosa', 'Samsung Cangcimen'),
(12, 2, 'QWAkM6M.jpg', NULL, 2, '-', 'Samsung s6'),
(13, 3, '7tVNujc.jpg', NULL, 1, '-', 'Shark Dry');

-- --------------------------------------------------------

--
-- Table structure for table `mesin_bobot`
--

CREATE TABLE IF NOT EXISTS `mesin_bobot` (
  `id_mesin_bobot` int(11) NOT NULL AUTO_INCREMENT,
  `id_parameter` int(11) DEFAULT NULL,
  `nilai` tinyint(4) DEFAULT NULL COMMENT '1:rendah 2:sedang 3:tinggi',
  `nilai_1` double DEFAULT NULL,
  `nilai_2` double DEFAULT NULL,
  `nilai_3` double DEFAULT NULL,
  PRIMARY KEY (`id_mesin_bobot`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `mesin_bobot`
--

INSERT INTO `mesin_bobot` (`id_mesin_bobot`, `id_parameter`, `nilai`, `nilai_1`, `nilai_2`, `nilai_3`) VALUES
(4, 1, 1, 2000000, 3500000, NULL),
(5, 1, 2, 3000000, 4000000, 5000000),
(6, 1, 3, 4500000, 8000000, NULL),
(7, 2, 1, 5, 8, NULL),
(8, 2, 2, 9, 12, 15),
(9, 2, 3, 16, 25, NULL),
(10, 3, 1, 20, 25, NULL),
(11, 3, 2, 26, 30, 35),
(12, 3, 3, 36, 45, NULL),
(13, 4, 1, 250, 300, NULL),
(14, 4, 2, 301, 350, 380),
(15, 4, 3, 381, 400, NULL),
(16, 5, 1, 30, 35, NULL),
(17, 5, 2, 36, 40, 45),
(18, 5, 3, 46, 50, NULL),
(19, 6, 1, 60, 80, NULL),
(20, 6, 2, 81, 85, 90),
(21, 6, 3, 91, 95, NULL),
(22, 7, 1, 50, 59, NULL),
(23, 7, 2, 60, 85, 90),
(24, 7, 3, 91, 95, NULL),
(28, 8, 1, 120, 139, NULL),
(29, 8, 2, 140, 160, 170),
(30, 8, 3, 171, 180, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mesin_bobot_nilai`
--

CREATE TABLE IF NOT EXISTS `mesin_bobot_nilai` (
  `id_bobot_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin` int(11) DEFAULT NULL,
  `id_parameter` int(11) DEFAULT NULL,
  `nilai_1` double DEFAULT '0' COMMENT '0',
  `nilai_2` double DEFAULT '0',
  `nilai_3` double DEFAULT '0',
  PRIMARY KEY (`id_bobot_nilai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `mesin_bobot_nilai`
--

INSERT INTO `mesin_bobot_nilai` (`id_bobot_nilai`, `id_mesin`, `id_parameter`, `nilai_1`, `nilai_2`, `nilai_3`) VALUES
(2, 11, 1, 0.66666666666667, 0, 0),
(3, 11, 2, 0, 0.33333333333333, 0),
(4, 11, 3, 0, 0, 0),
(5, 11, 4, 1, 0, 0),
(6, 11, 5, 0, 1, 0),
(7, 11, 6, 0.5, 0, 0),
(8, 11, 7, 0, 0.4, 0),
(9, 11, 8, 0, 0.5, 0),
(10, 12, 1, 0.66666666666667, 0, 0),
(11, 13, 1, 0.2, 0.2, 0),
(12, 12, 2, 0, 0.33333333333333, 0),
(13, 13, 2, 0, 0, 0),
(14, 12, 3, 0, 0, 1),
(15, 13, 3, 0, 0, 1),
(16, 12, 4, 1, 0, 0),
(17, 13, 4, 1, 0, 0),
(18, 12, 5, 0, 0, 1),
(19, 13, 5, 1, 0, 0),
(20, 12, 6, 0, 0, 0),
(21, 13, 6, 0.25, 0, 0),
(22, 12, 7, 0, 0.8, 0),
(23, 13, 7, 0, 0.6, 0),
(24, 12, 8, 1, 0, 0),
(25, 13, 8, 0.47368421052632, 0, 0),
(26, 14, 1, 0, 1, 0),
(27, 14, 2, 0, 0, 0),
(28, 14, 3, 0, 0, 1),
(29, 14, 4, 0, 0, 1),
(30, 14, 5, 0, 0, 0),
(31, 14, 6, 1, 0, 0),
(32, 14, 7, 1, 0, 0),
(33, 14, 8, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mesin_dtl`
--

CREATE TABLE IF NOT EXISTS `mesin_dtl` (
  `id_mesin_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_parameter` int(11) DEFAULT NULL,
  `value` double DEFAULT '0',
  `id_mesin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mesin_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `mesin_dtl`
--

INSERT INTO `mesin_dtl` (`id_mesin_detail`, `id_parameter`, `value`, `id_mesin`) VALUES
(89, 1, 2500000, 11),
(90, 2, 10, 11),
(91, 3, 35, 11),
(92, 4, 250, 11),
(93, 5, 40, 11),
(94, 6, 70, 11),
(95, 7, 70, 11),
(96, 8, 150, 11),
(97, 1, 2500000, 12),
(98, 2, 10, 12),
(99, 3, 500, 12),
(100, 4, 130, 12),
(101, 5, 60, 12),
(102, 6, 80, 12),
(103, 7, 80, 12),
(104, 8, 120, 12),
(105, 1, 3200000, 13),
(106, 2, 15, 13),
(107, 3, 300, 13),
(108, 4, 120, 13),
(109, 5, 30, 13),
(110, 6, 75, 13),
(111, 7, 75, 13),
(112, 8, 130, 13);

-- --------------------------------------------------------

--
-- Table structure for table `mesin_kategori`
--

CREATE TABLE IF NOT EXISTS `mesin_kategori` (
  `id_mesin_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mesin_kategori` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_mesin_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mesin_kategori`
--

INSERT INTO `mesin_kategori` (`id_mesin_kategori`, `nama_mesin_kategori`) VALUES
(2, 'Samsung'),
(3, 'Sharp'),
(4, 'Panasonic');

-- --------------------------------------------------------

--
-- Table structure for table `tran_fuzzy`
--

CREATE TABLE IF NOT EXISTS `tran_fuzzy` (
  `id_tran_fuzzy` int(11) NOT NULL AUTO_INCREMENT,
  `on_session` varchar(150) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `hasil_rekomendasi` float DEFAULT NULL,
  PRIMARY KEY (`id_tran_fuzzy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `tran_fuzzy`
--

INSERT INTO `tran_fuzzy` (`id_tran_fuzzy`, `on_session`, `date`, `hasil_rekomendasi`) VALUES
(1, 'hZxlc6zmiYEkBQXL', '2015-06-02 03:47:50', NULL),
(2, '6UFvppfU4SBdM0SC', '2015-06-02 15:27:47', NULL),
(3, 'zJdkEnCD59eeudoo', '2015-06-02 15:29:12', NULL),
(4, 'CDLyf5fmMtA1jVHZ', '2015-06-02 15:29:30', NULL),
(5, 'QRCqYjBaaEIPGcWu', '2015-06-02 15:41:52', NULL),
(6, '13trZCY1w7ZyjWWE', '2015-06-04 00:13:22', NULL),
(7, 'CfPG0bnXBeadMFd7', '2015-06-04 22:35:44', NULL),
(8, 'IhWdk12j0yOhfNyb', '2015-06-04 22:36:04', NULL),
(9, 'J89lpDvBnzrXTTco', '2015-06-04 22:36:13', NULL),
(10, 'gfjCeDIiuzoYYhnQ', '2015-06-04 22:39:16', NULL),
(11, 'TZqk0eGBoV8KIfQr', '2015-06-04 22:40:00', NULL),
(12, 'pl9yrruQXCyCh8rD', '2015-06-04 22:44:19', NULL),
(13, 'tJbH71obUG1DOqrA', '2015-06-04 22:50:33', NULL),
(14, 'bxoHtgayXNrRjYPm', '2015-06-04 22:52:20', NULL),
(15, 'oPsA1V4oaae4jWRe', '2015-06-04 22:53:09', NULL),
(16, 'JvYHxkNKMuQwLcTB', '2015-06-04 23:11:53', NULL),
(17, 'IodkrtewV2EnF5NZ', '2015-06-04 23:12:49', NULL),
(18, 'J5DEsTlNGI5SntXp', '2015-06-04 23:18:16', NULL),
(19, 'HPZuFj63YGkmnrO4', '2015-06-04 23:18:27', NULL),
(20, 'qfrnduBdeQIEf7UR', '2015-06-04 23:19:04', NULL),
(21, 'XyJzGEbV7vLL2Mme', '2015-06-04 23:37:41', NULL),
(22, 'l57g9ljYjzty8aZQ', '2015-06-04 23:38:54', NULL),
(23, 'qYGSTgs2cbMM0fGS', '2015-06-04 23:38:59', NULL),
(24, 'Pcmqlt25RrbPKmuR', '2015-06-04 23:39:48', NULL),
(25, 'ia2btpWIC2NsYZRd', '2015-06-04 23:41:26', NULL),
(26, 'lZbsAM61WDI523Ef', '2015-06-04 23:42:52', NULL),
(27, 'pqMagkIHVasVbDzU', '2015-06-04 23:48:12', NULL),
(28, 'olvNhij2EEEWP6Jo', '2015-06-04 23:53:07', NULL),
(29, 'TgggQiRfo1ggJiqx', '2015-06-04 23:53:11', NULL),
(30, 'aBPizJaVK1NIc6mF', '2015-06-04 23:55:19', NULL),
(31, 'PyRwkwnici8WaCA2', '2015-06-05 00:00:41', NULL),
(32, 'n9FZPsANfIJqTuOM', '2015-06-05 00:01:03', NULL),
(33, 'RqqB6XgJ069IAsCd', '2015-06-05 00:01:14', NULL),
(34, 'iKFDIi2gxUQvSjs4', '2015-06-05 00:03:22', NULL),
(35, 'UfF4XXyS1DLrUhkw', '2015-06-05 00:07:14', NULL),
(36, 'hIWvpXx3cAE59V2e', '2015-06-05 00:07:26', NULL),
(37, 'VTBlv6ltQMKpvhYS', '2015-06-05 00:07:43', NULL),
(38, 'jdQRXujbPp5kegAL', '2015-06-05 00:08:07', NULL),
(39, 'MsdioH9Tf0afdDIc', '2015-06-05 00:08:43', NULL),
(40, 'rTiwuatMzmm1a2c6', '2015-06-05 00:17:34', NULL),
(41, 'N8eGYN60z9jVQP1F', '2015-06-05 00:18:18', NULL),
(42, 'Qv6Mm7WgZqjJBlWs', '2015-06-05 00:20:01', NULL),
(43, 'XI986evW2Tbm2SY4', '2015-06-05 00:22:25', NULL),
(44, '9UfKxcM3Z1mBLxgw', '2015-06-05 00:22:44', NULL),
(45, 'gK6T7579NNNyArdL', '2015-06-05 00:23:07', NULL),
(46, 'EH3BNFuY7mrNaP7D', '2015-06-05 00:23:48', NULL),
(47, 'Y12WUvW3MdAUeSQK', '2015-06-05 00:24:00', NULL),
(48, 'zkR9XNBajjRkGiiv', '2015-06-05 00:25:49', NULL),
(49, '4CNnlldOwNxJIZCy', '2015-06-05 00:28:05', NULL),
(50, 'OZQ5E3HJ6x7aTT1n', '2015-06-05 00:28:20', NULL),
(51, 'T8mlymuk310v9O0V', '2015-06-05 00:28:27', NULL),
(52, 'MHGrfDLOYGZcoxAc', '2015-06-05 00:28:59', NULL),
(53, 'axbbaho80cY3jtyB', '2015-06-05 00:33:10', NULL),
(54, 'hv9lniGY2aTAgTkc', '2015-06-05 00:34:36', NULL),
(55, 'kbuI3mk8DjLGDptu', '2015-06-05 00:38:12', NULL),
(56, 'QJBucOJzFmz0ZACk', '2015-06-05 00:38:36', NULL),
(57, 'jUxrnN1KQ83xU64W', '2015-06-05 00:40:02', NULL),
(58, 'md6EywMgEUJNAnHA', '2015-06-05 00:55:03', NULL),
(59, 'AMzhlB61xHy4dxxQ', '2015-06-05 00:55:17', NULL),
(60, 'raYrDE9RZSlqoPoU', '2015-06-05 00:55:29', NULL),
(61, 'G7bEp24wPGJD2m9X', '2015-06-05 00:55:38', NULL),
(62, 'YomYk1GSc3mQF47o', '2015-06-05 00:56:09', NULL),
(63, '9G1eqc2ZOnDyWZsA', '2015-06-05 00:56:58', NULL),
(64, 'krK2iXzr79gIl4kE', '2015-06-05 00:58:26', NULL),
(65, 'Fwb2FpuWQTVE0MKB', '2015-06-07 22:56:47', NULL),
(66, 'B7DYRzBG0lP51IpD', '2015-06-07 22:57:10', NULL),
(67, 'sDkWvd9Ybl2Xmvew', '2015-06-07 22:58:04', NULL),
(68, '7UVQumcX0xHUnxOW', '2015-06-07 23:00:08', NULL),
(69, '9R9pIJgno5rcetP9', '2015-06-11 17:57:47', NULL),
(70, 'XsbTuIIoR1j2312n', '2015-06-11 17:58:58', NULL),
(71, 'kU9vXzAGKRrbXosz', '2015-07-01 01:02:34', NULL),
(72, 'Aqofj1bNxYVUcWQ2', '2015-07-01 01:02:47', NULL),
(73, 'uhlt9sNfizVGi2Ew', '2015-07-08 20:19:39', NULL),
(74, 'aKMYPNjzbTcWOn2L', '2015-07-08 20:29:16', NULL),
(75, 'QNbOK2Z8xrkkTc0S', '2015-07-08 20:29:23', NULL),
(76, 'kw2AUQ7iaUDV28Ds', '2015-07-08 20:29:38', NULL),
(77, '5xr5Exg8zB6MqNoR', '2015-07-08 20:35:16', NULL),
(78, 'F7ijsapml2FaCOOz', '2015-07-08 20:44:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tran_fuzzy_dtl`
--

CREATE TABLE IF NOT EXISTS `tran_fuzzy_dtl` (
  `id_tran_fuzzy_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin` int(11) DEFAULT NULL,
  `nilai_rekomendasi` float DEFAULT NULL,
  `id_tran_fuzzy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tran_fuzzy_dtl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `tran_fuzzy_dtl`
--

INSERT INTO `tran_fuzzy_dtl` (`id_tran_fuzzy_dtl`, `id_mesin`, `nilai_rekomendasi`, `id_tran_fuzzy`) VALUES
(1, 11, 0, 1),
(2, 12, 1, 1),
(3, 13, 0.473684, 1),
(4, 11, 0, 2),
(5, 12, 1, 2),
(6, 13, 0.473684, 2),
(7, 11, 0, 3),
(8, 12, 0, 3),
(9, 13, 0, 3),
(10, 11, 0, 4),
(11, 12, 1, 4),
(12, 13, 0.473684, 4),
(13, 11, 0.5, 5),
(14, 12, 0, 5),
(15, 13, 0, 5),
(16, 11, 0, 6),
(17, 12, 0, 6),
(18, 13, 0, 6),
(19, 11, 0, 7),
(20, 12, 0, 7),
(21, 13, 0, 7),
(22, 11, 0, 8),
(23, 12, 0, 8),
(24, 13, 0.473684, 8),
(25, 11, 0, 9),
(26, 12, 0, 9),
(27, 13, 0.473684, 9),
(28, 11, 0, 10),
(29, 12, 0, 10),
(30, 13, 0, 10),
(31, 14, NULL, 10),
(32, 11, 0, 11),
(33, 12, 0, 11),
(34, 13, 0.473684, 11),
(35, 14, NULL, 11),
(36, 11, 0, 12),
(37, 12, 0, 12),
(38, 13, 0.473684, 12),
(39, 14, 1, 12),
(40, 11, 1, 13),
(41, 12, 0.8, 13),
(42, 13, 0.6, 13),
(43, 14, 1, 13),
(44, 11, 1, 14),
(45, 12, 0.8, 14),
(46, 13, 0.6, 14),
(47, 14, 0, 14),
(48, 11, 1, 15),
(49, 12, 0.8, 15),
(50, 13, 0.6, 15),
(51, 14, 1, 15),
(52, 11, 1, 16),
(53, 12, 1, 16),
(54, 13, 1, 16),
(55, 11, 1, 17),
(56, 12, 1, 17),
(57, 13, 0.473684, 17),
(58, 11, 1, 18),
(59, 12, 1, 18),
(60, 13, 1, 18),
(61, 11, 1, 19),
(62, 12, 1, 19),
(63, 13, 1, 19),
(64, 11, 0, 20),
(65, 12, 0.8, 20),
(66, 13, 0.473684, 20),
(67, 11, 0, 21),
(68, 12, 0, 21),
(69, 13, 0, 21),
(70, 11, 0, 22),
(71, 12, 0, 22),
(72, 13, 0, 22),
(73, 11, 0, 23),
(74, 12, 0, 23),
(75, 13, 0, 23),
(76, 11, 0, 24),
(77, 12, 0, 24),
(78, 13, 0, 24),
(79, 11, 0, 25),
(80, 12, 0.8, 25),
(81, 13, 0.473684, 25),
(82, 11, 0, 26),
(83, 12, 0.8, 26),
(84, 13, 0.473684, 26),
(85, 11, 0, 27),
(86, 12, 0.8, 27),
(87, 13, 0.473684, 27),
(88, 11, 0, 28),
(89, 12, 0.8, 28),
(90, 13, 0.473684, 28),
(91, 11, 0, 29),
(92, 12, 0.8, 29),
(93, 13, 0.473684, 29),
(94, 11, 0, 30),
(95, 12, 0.8, 30),
(96, 13, 0.473684, 30),
(97, 11, 0, 31),
(98, 12, 0.8, 31),
(99, 13, 0.473684, 31),
(100, 11, 0, 32),
(101, 12, 0.8, 32),
(102, 13, 0.473684, 32),
(103, 11, 0, 33),
(104, 12, 0.8, 33),
(105, 13, 0.473684, 33),
(106, 11, 0, 34),
(107, 12, 0.8, 34),
(108, 13, 0.473684, 34),
(109, 11, 0, 35),
(110, 12, 1, 35),
(111, 13, 0.473684, 35),
(112, 11, 0, 36),
(113, 12, 0.8, 36),
(114, 13, 0.473684, 36),
(115, 11, 0, 37),
(116, 12, 0.8, 37),
(117, 13, 0.473684, 37),
(118, 11, 0, 38),
(119, 12, 0.8, 38),
(120, 13, 0.473684, 38),
(121, 11, 0, 39),
(122, 12, 0.8, 39),
(123, 13, 0.473684, 39),
(124, 11, 0, 40),
(125, 12, 0.8, 40),
(126, 13, 0.473684, 40),
(127, 11, 0, 41),
(128, 12, 0.8, 41),
(129, 13, 0.473684, 41),
(130, 11, 0, 42),
(131, 12, 0.8, 42),
(132, 13, 0.473684, 42),
(133, 11, 0, 43),
(134, 12, 0.8, 43),
(135, 13, 0.473684, 43),
(136, 11, 0, 44),
(137, 12, 0.8, 44),
(138, 13, 0.473684, 44),
(139, 11, 0, 45),
(140, 12, 0.8, 45),
(141, 13, 0.473684, 45),
(142, 11, 0, 46),
(143, 12, 0.8, 46),
(144, 13, 0.473684, 46),
(145, 11, 0, 47),
(146, 12, 0.8, 47),
(147, 13, 0.473684, 47),
(148, 11, 0, 48),
(149, 12, 0, 48),
(150, 13, 0.25, 48),
(151, 11, 0, 49),
(152, 12, 0, 49),
(153, 13, 0.25, 49),
(154, 11, 0, 50),
(155, 12, 0, 50),
(156, 13, 0.25, 50),
(157, 11, 0, 51),
(158, 12, 0, 51),
(159, 13, 0.25, 51),
(160, 11, 0, 52),
(161, 12, 0, 52),
(162, 13, 0.25, 52),
(163, 11, 0, 53),
(164, 12, 0, 53),
(165, 13, 0.25, 53),
(166, 11, 0, 54),
(167, 12, 0, 54),
(168, 13, 0.25, 54),
(169, 11, 1, 55),
(170, 12, 1, 55),
(171, 13, 1, 55),
(172, 11, 1, 56),
(173, 12, 1, 56),
(174, 13, 1, 56),
(175, 11, 0, 57),
(176, 12, 0, 57),
(177, 13, 0, 57),
(178, 11, 0, 58),
(179, 12, 0, 58),
(180, 13, 0, 58),
(181, 11, 0, 59),
(182, 12, 0, 59),
(183, 13, 0, 59),
(184, 11, 0, 60),
(185, 12, 0, 60),
(186, 13, 0, 60),
(187, 11, 0, 61),
(188, 12, 0, 61),
(189, 13, 0, 61),
(190, 11, 0, 62),
(191, 12, 0, 62),
(192, 13, 0, 62),
(193, 11, 0.4, 63),
(194, 12, 1, 63),
(195, 13, 0.473684, 63),
(196, 11, 0, 64),
(197, 12, 1, 64),
(198, 13, 0.473684, 64),
(199, 11, 0.5, 65),
(200, 12, 0, 65),
(201, 13, 0, 65),
(202, 11, 0, 66),
(203, 12, 1, 66),
(204, 13, 0.473684, 66),
(205, 11, 0, 67),
(206, 12, 1, 67),
(207, 13, 0.473684, 67),
(208, 11, 0, 68),
(209, 12, 1, 68),
(210, 13, 0.473684, 68),
(211, 11, 0.4, 69),
(212, 12, 1, 69),
(213, 13, 0.473684, 69),
(214, 11, 0.5, 70),
(215, 12, 0, 70),
(216, 13, 0, 70),
(217, 11, NULL, 71),
(218, 12, NULL, 71),
(219, 13, NULL, 71),
(220, 11, 0.5, 72),
(221, 12, 0, 72),
(222, 13, 0, 72),
(223, 11, 0.4, 73),
(224, 12, 1, 73),
(225, 13, 0.473684, 73),
(226, 11, 0, 74),
(227, 12, 0, 74),
(228, 13, 0, 74),
(229, 11, 0, 75),
(230, 12, 0, 75),
(231, 13, 0, 75),
(232, 11, 0.5, 76),
(233, 12, 0, 76),
(234, 13, 0, 76),
(235, 11, 0.4, 77),
(236, 12, 1, 77),
(237, 13, 0.473684, 77),
(238, 11, 0.5, 78),
(239, 12, 0, 78),
(240, 13, 0, 78);

-- --------------------------------------------------------

--
-- Table structure for table `tran_parameter`
--

CREATE TABLE IF NOT EXISTS `tran_parameter` (
  `id_parameter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_parameter` varchar(50) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tran_parameter`
--

INSERT INTO `tran_parameter` (`id_parameter`, `nama_parameter`, `satuan`) VALUES
(1, 'Harga', 'Rp'),
(2, 'Kapasitas', 'Kg'),
(3, 'Kecepatan', 'Rpm'),
(4, 'Daya', 'Watt'),
(5, 'Berat', 'Kg'),
(6, 'Panjang', 'Cm'),
(7, 'Lebar', 'Cm'),
(8, 'Tinggi', 'Cm');

-- --------------------------------------------------------

--
-- Table structure for table `tran_zadeh`
--

CREATE TABLE IF NOT EXISTS `tran_zadeh` (
  `id_zadeh` int(11) NOT NULL AUTO_INCREMENT,
  `id_parameter_1` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `id_parameter_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_zadeh`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tran_zadeh`
--

INSERT INTO `tran_zadeh` (`id_zadeh`, `id_parameter_1`, `operator`, `id_parameter_2`) VALUES
(71, 1, 2, 2),
(72, 2, 1, 3),
(73, 3, 2, 4),
(74, 4, 1, 5),
(75, 5, 2, 6),
(76, 6, 1, 7),
(77, 7, 2, 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
