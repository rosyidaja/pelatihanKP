-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 05:42 AM
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
-- Table structure for table `m_pegawai`
--

CREATE TABLE `m_pegawai` (
  `pegawai_id` int(10) NOT NULL,
  `pegawai_nama` varchar(100) NOT NULL,
  `pegawai_jenis` varchar(50) NOT NULL,
  `pegawai_aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pegawai`
--

INSERT INTO `m_pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_jenis`, `pegawai_aktif`) VALUES
(1, 'ani', 'admin', 'y'),
(2, 'adit', 'marketing', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `m_peserta`
--

CREATE TABLE `m_peserta` (
  `peserta_id` int(10) NOT NULL,
  `peserta_nama` int(100) NOT NULL,
  `peserta_email` varchar(50) NOT NULL,
  `peserta_alamat` varchar(100) NOT NULL,
  `peserta_telp` int(12) NOT NULL,
  `peserta_jenis` varchar(10) NOT NULL,
  `peserta_aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_peserta`
--

INSERT INTO `m_peserta` (`peserta_id`, `peserta_nama`, `peserta_email`, `peserta_alamat`, `peserta_telp`, `peserta_jenis`, `peserta_aktif`) VALUES
(1, 0, 'archiecakra1@gmail.com', 'RUNGKUT MENANGGAL HARAPAN H-21', 1232321, '', ''),
(2, 0, 'minartieko@gmail.com', 'wdwadwadwadwa', 446768, '', ''),
(3, 0, 'iqbal@adwada.com', 'wadwadawda123', 1232321, '', ''),
(4, 0, 'archiecakra3@gmail.com', 'RUNGKUT MENANGGAL HARAPAN H-21a1231231', 2131232, '', ''),
(5, 0, 'wqewq@awda', '12321', 1232, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(10) NOT NULL,
  `user_level` text NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `pegawai_id` int(10) NOT NULL,
  `user_aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `user_level`, `user_nama`, `user_pwd`, `pegawai_id`, `user_aktif`) VALUES
(1, 'admin', 'ani', '123', 1, 'y'),
(2, 'marketing', 'adit', '123', 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `t_sertifikasi`
--

CREATE TABLE `t_sertifikasi` (
  `sertifikassi_id` int(10) NOT NULL,
  `jadwal_id` int(1) NOT NULL,
  `peserta_id` int(10) NOT NULL,
  `reg_no` int(6) NOT NULL,
  `instansi` varchar(20) NOT NULL,
  `jns_pelatihan_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sertifikasi`
--

INSERT INTO `t_sertifikasi` (`sertifikassi_id`, `jadwal_id`, `peserta_id`, `reg_no`, `instansi`, `jns_pelatihan_id`) VALUES
(1, 1, 1, 0, '', 0),
(2, 1, 2, 0, '', 0),
(3, 2, 3, 0, '', 0),
(4, 1, 4, 0, '', 0),
(5, 0, 5, 0, '', 0);

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
-- Indexes for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `m_peserta`
--
ALTER TABLE `m_peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `t_sertifikasi`
--
ALTER TABLE `t_sertifikasi`
  ADD PRIMARY KEY (`sertifikassi_id`);

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
-- AUTO_INCREMENT for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  MODIFY `pegawai_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_peserta`
--
ALTER TABLE `m_peserta`
  MODIFY `peserta_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_sertifikasi`
--
ALTER TABLE `t_sertifikasi`
  MODIFY `sertifikassi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
