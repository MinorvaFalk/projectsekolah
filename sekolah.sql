-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2020 at 02:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--
CREATE DATABASE IF NOT EXISTS `sekolah` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sekolah`;

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

DROP TABLE IF EXISTS `approval`;
CREATE TABLE `approval` (
  `approve_id` varchar(255) NOT NULL,
  `approve` int(1) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`approve_id`, `approve`, `email`, `password`, `first_name`, `last_name`, `contact`, `address`) VALUES
('A5ebfd66becdc3', 1, 'hello.new@admin.school.com', '$2y$10$5J1jONY2YxtIF2Yyki51P.0HpXbopGKWQX/odyJVN8GQcLpkNAUSu', 'Hello', 'New World', '85922112000', 'Jl. Kenangan Mantan'),
('A5ec050dec6661', NULL, 'hello.world@admin.school.com', '$2y$10$uoi/aMgTDPK4Uqsv5Y2jpu7hPDKNWdXgYRUQQRgx1YX3LrgX3C2ma', 'Hello', 'World', '85922112000', 'afafafa');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE `credentials` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`user_id`, `username`, `email`, `password`) VALUES
('A000000001', 'james.bondan', 'james.bondan@admin.school.com', '$2y$10$GLiHdrOH6qmE16lljJCfK.ETWuQwGpRl1dPKkvUXHpWbOZiIkZCSu'),
('G000000001', 'budi.sutejo', 'budi.sutejo@teacher.school.com', '$2y$10$/PTC517RIFJ17cfAaTIFjuUoESUOIFJxYhFIU3/Qe.6FqZFeKrSQW'),
('G000000003', 'ecnp.hcna', 'ecnp.hcna@teacher.school.com', '$2y$12$TTzF.kcYRSAVf0PxCFuZl.mGLLqF6yv94KUKZ55lvJCBHVZnGcAmK'),
('S000000001', 'harvard.harsono', 'harvard.harsono@student.school.com', '$2y$10$kwbpEgBcRcaxcriBmz893.IgvMv.WByDp1MdAeEiPNTHXJ3CTXWU6'),
('S000000002', 'pig.benis', 'pig.benis@student.school.com', '$2y$04$GKS8YJwiJzSZyMruBWchWu59ZrjRD9LIBmUXbWdfU0mzwjFIKHH46');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `id_pengajar` varchar(255) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact` varchar(13) NOT NULL,
  `address` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_pengajar`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `keterangan`) VALUES
('G0002', 'G000000001', 'Budi', 'Sutedjo', '6285911003300', 'Jl. Kemana saja saya suka', ''),
('G0003', 'G000000003', 'CCNA', 'HCNA', '084949949', 'Jl. Makmur', NULL),
('GA001', 'A000000001', 'James', 'Bondan Prasetyo', '6282911301696', 'JL. Everything is gonna be alright', '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `id_pengajar` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_pengajar`) VALUES
('A', 'IPA', 'G0002'),
('B', 'IPA3', 'GA001');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

DROP TABLE IF EXISTS `nilai_siswa`;
CREATE TABLE `nilai_siswa` (
  `id` int(11) NOT NULL,
  `id_subject` varchar(5) NOT NULL,
  `id_siswa` varchar(5) NOT NULL,
  `id_pengajar` varchar(5) NOT NULL,
  `nilai_tugas` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `komplain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `id_subject`, `id_siswa`, `id_pengajar`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `komplain`) VALUES
(2, 'BIO1', 'A0001', 'G0002', 100, 40, 60, NULL),
(3, 'BIO1', 'A0002', 'GA001', 100, 105, 100, ''),
(5, 'CALC2', 'A0001', 'G0003', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id_siswa` varchar(255) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `user_id`, `id_kelas`, `first_name`, `last_name`, `contact`, `address`, `keterangan`) VALUES
('A0001', 'S000000001', 'A', 'Harvard', 'Harsono', '08696966969', 'Jl Gatau', ''),
('A0002', 'S000000002', 'A', 'Pig', 'Benis', '0890601020', 'Jl. Bawah Jembatan Layang', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `id_subject` varchar(5) NOT NULL,
  `nama_subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id_subject`, `nama_subject`) VALUES
('ALIN1', 'Aljabar Linear 1'),
('BIO1', 'Biologi 2'),
('CALC2', 'Calculus 2'),
('KIM1', 'Kimia 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`approve_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `guru_ibfk_1` (`user_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas_ibfk_1` (`id_pengajar`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `siswa_ibfk_1` (`user_id`),
  ADD KEY `siswa_ibfk_2` (`id_kelas`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `credentials` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `guru` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `nilai_siswa_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `guru` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_siswa_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_siswa_ibfk_3` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `credentials` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
