-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 08:08 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_schebiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_jadwal`
--

CREATE TABLE `m_jadwal` (
  `jadwal_id` int(1) NOT NULL,
  `jadwal_sesi` varchar(10) NOT NULL,
  `jadwal_mulai` date NOT NULL,
  `jadwal_selesai` date NOT NULL,
  `jadwal_aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jadwal`
--

INSERT INTO `m_jadwal` (`jadwal_id`, `jadwal_sesi`, `jadwal_mulai`, `jadwal_selesai`, `jadwal_aktif`) VALUES
(1, 'Sesi 1', '2018-09-04', '2018-09-06', 'y'),
(2, 'Sesi 2', '2018-10-16', '2018-10-31', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `m_jns_pelatihan`
--

CREATE TABLE `m_jns_pelatihan` (
  `jns_pelatihan_id` int(10) NOT NULL,
  `jns_pelatihan_nama` varchar(50) NOT NULL,
  `jns_pelatihan_kode` varchar(10) NOT NULL,
  `jns_pelatihan_aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jns_pelatihan`
--

INSERT INTO `m_jns_pelatihan` (`jns_pelatihan_id`, `jns_pelatihan_nama`, `jns_pelatihan_kode`, `jns_pelatihan_aktif`) VALUES
(1, 'Java SE Fundamental ( OCA )', '1Z0-808', 'y'),
(2, 'Zend PHP', '200-710', 'y'),
(3, 'Mikrotik Basic Essential', 'MTCNA', 'y'),
(4, 'Cisco Routing & Switching', 'CCNA', 'y'),
(5, 'MySQL Developer', '1Z0-882', 'y'),
(6, 'Java SE Programming ( OCP )', '1Z0-809', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `level_id` int(10) NOT NULL,
  `level_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_user`) VALUES
(1, 'admin'),
(2, 'marketing');

-- --------------------------------------------------------

--
-- Table structure for table `m_peserta`
--

CREATE TABLE `m_peserta` (
  `peserta_id` int(10) NOT NULL,
  `peserta_nama` varchar(100) NOT NULL,
  `peserta_email` varchar(50) NOT NULL,
  `peserta_alamat` varchar(100) NOT NULL,
  `peserta_telp` varchar(12) NOT NULL,
  `peserta_jenis` varchar(10) NOT NULL,
  `peserta_aktif` char(1) NOT NULL DEFAULT 'y',
  `peserta_instansi_nama` varchar(100) DEFAULT NULL,
  `jns_pelatihan_kode` varchar(10) NOT NULL,
  `jadwal_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_peserta`
--

INSERT INTO `m_peserta` (`peserta_id`, `peserta_nama`, `peserta_email`, `peserta_alamat`, `peserta_telp`, `peserta_jenis`, `peserta_aktif`, `peserta_instansi_nama`, `jns_pelatihan_kode`, `jadwal_id`) VALUES
(1, 'putra', 'ibnuiqbal99@gmail.com', 'surabaya', '081332147071', 'individu', 'y', NULL, 'CCNA', 0),
(2, 'arci', 'arcimedes@gmail.com', 'sidoarjo', '081232131234', 'individu', 'y', NULL, 'CCNA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(10) NOT NULL,
  `level_id` int(10) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `user_nama`, `user_pwd`) VALUES
(1, 1, 'ani', '123'),
(2, 2, 'adit', '123');

-- --------------------------------------------------------

--
-- Table structure for table `t_sertifikasi`
--

CREATE TABLE `t_sertifikasi` (
  `sertifikasi_id` int(10) NOT NULL,
  `jadwal_id` int(1) NOT NULL,
  `peserta_id` int(10) NOT NULL,
  `reg_no` int(6) NOT NULL,
  `instansi` varchar(20) NOT NULL,
  `jns_pelatihan_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sertifikasi`
--

INSERT INTO `t_sertifikasi` (`sertifikasi_id`, `jadwal_id`, `peserta_id`, `reg_no`, `instansi`, `jns_pelatihan_id`) VALUES
(1, 1, 1, 0, '', 0),
(2, 1, 2, 0, '', 0),
(3, 2, 3, 0, '', 0),
(4, 1, 4, 0, '', 0),
(5, 0, 5, 0, '', 0),
(6, 1, 6, 0, '', 0),
(7, 2, 7, 0, '', 0),
(8, 1, 8, 0, '', 0),
(9, 2, 9, 0, '', 0),
(10, 1, 10, 0, '', 0),
(11, 1, 11, 0, '', 0),
(12, 1, 12, 0, '', 0),
(13, 1, 13, 0, '', 0),
(14, 1, 14, 0, '', 0),
(15, 1, 15, 0, '', 0),
(16, 1, 16, 0, '', 0),
(17, 1, 17, 0, '', 0),
(18, 1, 1, 0, '', 0),
(19, 1, 2, 0, '', 0),
(20, 1, 3, 0, '', 0),
(21, 1, 4, 0, '', 0),
(22, 2, 5, 0, '', 0),
(23, 1, 1, 0, '', 0),
(24, 1, 2, 0, '', 0),
(25, 1, 3, 0, '', 0),
(26, 1, 4, 0, '', 0),
(27, 1, 5, 0, '', 0),
(28, 1, 6, 0, '', 0),
(29, 1, 7, 0, '', 0),
(30, 2, 8, 0, '', 0),
(31, 1, 9, 0, '', 0),
(32, 1, 10, 0, '', 0),
(33, 1, 11, 0, '', 0),
(34, 1, 12, 0, '', 0),
(35, 1, 1, 0, '', 0),
(36, 1, 2, 0, '', 0),
(37, 1, 3, 0, '', 0),
(38, 1, 4, 0, '', 0),
(39, 1, 5, 0, '', 0),
(40, 1, 6, 0, '', 0),
(41, 1, 7, 0, '', 0),
(42, 1, 8, 0, '', 0),
(43, 1, 9, 0, '', 0),
(44, 1, 10, 0, '', 0),
(45, 1, 11, 0, '', 0),
(46, 1, 12, 0, '', 0),
(47, 1, 13, 0, '', 0),
(48, 1, 14, 0, '', 0),
(49, 1, 15, 0, '', 0),
(50, 1, 16, 0, '', 0),
(51, 1, 17, 0, '', 0),
(52, 1, 18, 0, '', 0),
(53, 1, 19, 0, '', 0),
(54, 1, 20, 0, '', 0),
(55, 1, 21, 0, '', 0),
(56, 1, 22, 0, '', 0),
(57, 1, 23, 0, '', 0),
(58, 1, 24, 0, '', 0),
(59, 1, 25, 0, '', 0),
(60, 1, 26, 0, '', 0),
(61, 1, 27, 0, '', 0),
(62, 1, 28, 0, '', 0),
(63, 1, 29, 0, '', 0),
(64, 1, 1, 0, '', 0),
(65, 1, 2, 0, '', 0),
(66, 1, 3, 0, '', 0),
(67, 1, 4, 0, '', 0),
(68, 1, 5, 0, '', 0),
(69, 1, 6, 0, '', 0),
(70, 1, 7, 0, '', 0),
(71, 1, 1, 0, '', 0),
(72, 1, 2, 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_jadwal`
--
ALTER TABLE `m_jadwal`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indexes for table `m_jns_pelatihan`
--
ALTER TABLE `m_jns_pelatihan`
  ADD PRIMARY KEY (`jns_pelatihan_id`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `m_peserta`
--
ALTER TABLE `m_peserta`
  ADD PRIMARY KEY (`peserta_id`),
  ADD KEY `id_jenis_pelatihan` (`jns_pelatihan_kode`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `t_sertifikasi`
--
ALTER TABLE `t_sertifikasi`
  ADD PRIMARY KEY (`sertifikasi_id`),
  ADD KEY `peserta_id` (`peserta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_jadwal`
--
ALTER TABLE `m_jadwal`
  MODIFY `jadwal_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_jns_pelatihan`
--
ALTER TABLE `m_jns_pelatihan`
  MODIFY `jns_pelatihan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_peserta`
--
ALTER TABLE `m_peserta`
  MODIFY `peserta_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_sertifikasi`
--
ALTER TABLE `t_sertifikasi`
  MODIFY `sertifikasi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
