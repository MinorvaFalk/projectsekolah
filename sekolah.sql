-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2020 at 03:41 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `cred`
--

DROP TABLE IF EXISTS `cred`;
CREATE TABLE `cred` (
  `roleid` int(1) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cred`
--

INSERT INTO `cred` (`roleid`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Admin', 'Mimin', 'admin@school.com', '$2y$10$GLiHdrOH6qmE16lljJCfK.ETWuQwGpRl1dPKkvUXHpWbOZiIkZCSu'),
(3, 'Jusuf', 'Kallah lagi', 'student@school.com', '$2y$10$0/2QIEdTLeriPOFPLgOB8.x2I7vnrB1Ie05LiFfHEdu9oqK7CeTUa'),
(2, 'Hansip', 'Ripah Repeh', 'teacher@school.com', '$2y$10$/KUDGKMjGUP6dtLHo/E5xeVBOJNPeew9RNVMoQ3iUEPHpB.drQJyG');

-- --------------------------------------------------------

--
-- Table structure for table `datasiswa`
--

DROP TABLE IF EXISTS `datasiswa`;
CREATE TABLE `datasiswa` (
  `nis` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `namadepan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `namablkg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `telportu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datasiswa`
--

INSERT INTO `datasiswa` (`nis`, `namadepan`, `namablkg`, `tgllahir`, `telportu`, `kelas`, `keterangan`) VALUES
('10001', 'Harvard', 'Senior', '2000-02-29', '085885856969', 'F', 'REMEDIAL!');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

DROP TABLE IF EXISTS `matapelajaran`;
CREATE TABLE `matapelajaran` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `nama`) VALUES
('BIO4D', 'Biologi');

-- --------------------------------------------------------

--
-- Table structure for table `nilaisiswa`
--

DROP TABLE IF EXISTS `nilaisiswa`;
CREATE TABLE `nilaisiswa` (
  `id_pelajaran` varchar(5) NOT NULL,
  `nis` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilaisiswa`
--

INSERT INTO `nilaisiswa` (`id_pelajaran`, `nis`, `nilai_tugas`, `nilai_uts`, `nilai_uas`) VALUES
('BIO4D', '10001', 100, 20, 50);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `roleid` int(1) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `description`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cred`
--
ALTER TABLE `cred`
  ADD PRIMARY KEY (`email`),
  ADD KEY `roleid` (`roleid`);

--
-- Indexes for table `datasiswa`
--
ALTER TABLE `datasiswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaisiswa`
--
ALTER TABLE `nilaisiswa`
  ADD KEY `id_pelajaran` (`id_pelajaran`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cred`
--
ALTER TABLE `cred`
  ADD CONSTRAINT `cred_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`);

--
-- Constraints for table `nilaisiswa`
--
ALTER TABLE `nilaisiswa`
  ADD CONSTRAINT `nilaisiswa_ibfk_1` FOREIGN KEY (`id_pelajaran`) REFERENCES `matapelajaran` (`id`),
  ADD CONSTRAINT `nilaisiswa_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `datasiswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
