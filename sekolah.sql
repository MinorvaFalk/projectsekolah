-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 02:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

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

CREATE TABLE `cred` (
  `roleid` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cred`
--

INSERT INTO `cred` (`roleid`, `email`, `password`) VALUES
(1, 'admin@school.com', '$2y$10$GLiHdrOH6qmE16lljJCfK.ETWuQwGpRl1dPKkvUXHpWbOZiIkZCSu'),
(3, 'student@school.com', '$2y$10$0/2QIEdTLeriPOFPLgOB8.x2I7vnrB1Ie05LiFfHEdu9oqK7CeTUa'),
(2, 'teacher@school.com', '$2y$10$/KUDGKMjGUP6dtLHo/E5xeVBOJNPeew9RNVMoQ3iUEPHpB.drQJyG');

-- --------------------------------------------------------

--
-- Table structure for table `datasiswa`
--

CREATE TABLE `datasiswa` (
  `nis` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `namadepan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `namablkg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `telportu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nilaitugas` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilaiuts` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilaiuas` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilaiakhir` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datasiswa`
--

INSERT INTO `datasiswa` (`nis`, `namadepan`, `namablkg`, `tgllahir`, `telportu`, `kelas`, `nilaitugas`, `nilaiuts`, `nilaiuas`, `nilaiakhir`, `keterangan`) VALUES
('10001', 'Harvard', 'Senior', '2000-02-29', '085885856969', 'F', '0', '0', '0', '0', 'REMEDIAL!');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
