-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2018 at 08:02 AM
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
  `jns_pelatihan_nama` varchar(50) NOT NULL,
  `jns_pelatihan_kode` varchar(10) NOT NULL,
  `jns_pelatihan_aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jns_pelatihan`
--

INSERT INTO `m_jns_pelatihan` (`jns_pelatihan_nama`, `jns_pelatihan_kode`, `jns_pelatihan_aktif`) VALUES
('Java SE Fundamental ( OCA )', '1Z0-808', 'y'),
('Java SE Programming ( OCP )', '1Z0-809', 'y'),
('MySQL Developer', '1Z0-882', 'y'),
('Zend PHP', '200-710', 'y'),
('Cisco Routing & Switching', 'CCNA', 'y'),
('Mikrotik Basic Essential', 'MTCNA', 'y');

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
  `peserta_instansi_nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_peserta`
--

INSERT INTO `m_peserta` (`peserta_id`, `peserta_nama`, `peserta_email`, `peserta_alamat`, `peserta_telp`, `peserta_jenis`, `peserta_aktif`, `peserta_instansi_nama`) VALUES
(1, 'PUJI', 'ouija@gmail.com', 'surabaya', '081234564321', 'individu', 'y', NULL),
(2, 'andi', 'ianu@gmial.com', 'suarabay', '098712344567', 'individu', 'y', NULL),
(3, 'poki', 'pok@gmal.cpm', 'subaraya', '098712324567', 'individu', 'y', NULL),
(4, 'PUJI', 'abadi@gamil.com', 'Jl. Tumpang Tindih', '081331473554', 'instansi', 'y', 'PT. API ABADI'),
(5, 'TOTOK', 'abadi@gamil.com', 'Jl. Tumpang Tindih', '081331473554', 'instansi', 'y', 'PT. API ABADI'),
(6, 'ANJI', 'abadi@gamil.com', 'Jl. Tumpang Tindih', '081331473554', 'instansi', 'y', 'PT. API ABADI');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(10) NOT NULL,
  `user_level` int(10) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `user_level`, `user_nama`, `user_pwd`) VALUES
(1, 1, 'ani', '123'),
(2, 2, 'adit', '1234'),
(6, 2, 'hera', '1234'),
(7, 2, 'melika', '123'),
(8, 2, 'ana', '123'),
(9, 2, 'farida', '123'),
(10, 2, 'elsa', '123');

-- --------------------------------------------------------

--
-- Table structure for table `t_sertifikasi`
--

CREATE TABLE `t_sertifikasi` (
  `sertifikasi_id` int(10) NOT NULL,
  `id_jadwal` int(1) NOT NULL,
  `id_peserta` int(10) NOT NULL,
  `id_jns_pelatihan` varchar(10) NOT NULL,
  `id_marketing` int(10) NOT NULL,
  `reg_no` varchar(11) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tools` varchar(50) NOT NULL,
  `status_pay` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sertifikasi`
--

INSERT INTO `t_sertifikasi` (`sertifikasi_id`, `id_jadwal`, `id_peserta`, `id_jns_pelatihan`, `id_marketing`, `reg_no`, `tgl_registrasi`, `lokasi`, `tools`, `status_pay`) VALUES
(1, 1, 3, '1Z0-808', 0, '', '0000-00-00', '', '', ''),
(2, 1, 4, '1Z0-808', 0, '', '0000-00-00', '', '', ''),
(3, 1, 5, '1Z0-808', 0, '', '0000-00-00', '', '', ''),
(4, 1, 6, '1Z0-808', 0, '', '0000-00-00', '', '', '');

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
  ADD PRIMARY KEY (`jns_pelatihan_kode`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `m_peserta`
--
ALTER TABLE `m_peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `level_id` (`user_level`);

--
-- Indexes for table `t_sertifikasi`
--
ALTER TABLE `t_sertifikasi`
  ADD PRIMARY KEY (`sertifikasi_id`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_jns_pelatihan` (`id_jns_pelatihan`),
  ADD KEY `id_marketing` (`id_marketing`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_jadwal`
--
ALTER TABLE `m_jadwal`
  MODIFY `jadwal_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_peserta`
--
ALTER TABLE `m_peserta`
  MODIFY `peserta_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_sertifikasi`
--
ALTER TABLE `t_sertifikasi`
  MODIFY `sertifikasi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `m_level` (`level_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
