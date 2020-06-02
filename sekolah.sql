-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2020 at 12:47 AM
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
-- Table structure for table `approval`
--

DROP TABLE IF EXISTS `approval`;
CREATE TABLE `approval` (
  `approve_id` varchar(255) NOT NULL,
  `approve` int(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`approve_id`, `approve`, `email`, `password`, `first_name`, `last_name`, `contact`, `address`) VALUES
('A5ebfd66becdc3', 0, 'hello.new@admin.school.com', '$2y$10$5J1jONY2YxtIF2Yyki51P.0HpXbopGKWQX/odyJVN8GQcLpkNAUSu', 'Hello', 'New World', '85922112000', 'Jl. Kenangan Mantan');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE `credentials` (
  `user_id` varchar(255) NOT NULL,
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
('G000000002', 'budi.sutarno', 'budi.sutarno@teacher.school.com', '$2y$12$ECkY4FURTstoLmN2UfJI6eBVNolt8oP4jXr54NsRgJOkhLy/v0D0W'),
('G000000003', 'rudi.jatmoko', 'rudi.jatmoko@teacher.school.com', '$2y$12$YfHpqujfYZbeuf0RjjGx0.DiBK/9UP1ZPSo5yMCh20Sj7awSCj6We'),
('G000000004', 'ahmad.sutejo', 'ahmad.sutejo@teacher.school.com', '$2y$12$mVbxGL.9qkPNVf0NWQpmW.bGwF.lOaur9XYdbsl8WER756i5b1Xc.'),
('G000000005', 'bryan.mcknight', 'bryan.mcknight@teacher.school.com', '$2y$12$zDjn6z.v5IpK.GIkkj4Nfuq9c4SPj9K.9lvZtK3buUszoZFuI6omi'),
('S000000001', 'harvard.harsono', 'harvard.harsono@student.school.com', '$2y$10$kwbpEgBcRcaxcriBmz893.IgvMv.WByDp1MdAeEiPNTHXJ3CTXWU6'),
('S000000002', 'edgar.christian', 'edgar.christian@student.school.com', '$2y$12$4GzAADQNGYeIUB7wrLQbLOIAYpDzDNQ4kbsAFjy2Ch6OH37l.Tae6'),
('S000000003', 'axel.patria', 'axel.patria@student.school.com', '$2y$12$HXFu99LCtcv9qapVvdbxde.V.8Ta9fDlmVhU.uethGhuBXqOZNwn.'),
('S000000004', 'ryo.wang', 'ryo.wang@student.school.com', '$2y$12$V/yYjNawELJ7ex/mcg0Bru9lA6GzW8oPTkoWiFrTNWDNrnNxVY3a6'),
('S000000005', 'anak.soleh', 'anak.soleh@student.school.com', '$2y$12$2niPv5Uq/ABHJWKrmcHi3Om5orf8Fy1v2bZlyJHVRELyoE66YYQpy'),
('S000000006', 'alice.golden', 'alice.golden@student.school.com', '$2y$12$bji9NICXzRBcYJT3vLpHYel2cvWUrHyq0jWlOWXvcHDvIPTbR.eci'),
('S000000007', 'clarissa.gordon', 'clarissa.gordon@student.school.com', '$2y$12$l9eWoXNRVVwiXHqyGUbuheb8piS2xABBTT.98jQm3x2BpOTlu5NX2'),
('S000000008', 'federico.huber', 'federico.huber@student.school.com', '$2y$12$0UefNbUS0dfeEfIRDOTyD.4DuxG.bg3V4naKsU8zsbtL0AzCAxAUe'),
('S000000009', 'henri.fellows', 'henri.fellows@student.school.com', '$2y$12$DFJCiN4FEr7kk7M2Uai.rOrTkUDBVtFkEK3wTI.P0HeuuhwEvLcty'),
('S000000010', 'kamal.north', 'kamal.north@student.school.com', '$2y$12$DgtRwEjj0tZLbfH.HzdFjOblQECErSPEL/p9PCS8BBDWL1oL75qly'),
('S000000011', 'allan.suryajana', 'allan.suryajana@student.school.com', '$2y$12$PS6254tGOB.gFkGqhvmI3O.iHkYITaLomV39/zgi0yNVQIP6CtOAK'),
('S000000012', 'nabila.redfern', 'nabila.redfern@student.school.com', '$2y$12$lOmnSeZForpVx2NbWsiwAenAWNXdPU2zVwPLwdLPyBbrC4cUX7Coa'),
('S000000013', 'yayan.armstrong', 'yayan.armstrong@student.school.com', '$2y$12$IGMSvnyqwFoo4H6BcJ1Pgued5jDnca9LC26PvSYwFA4AIDLsi274S'),
('S000000014', 'joy.nevile', 'joy.nevile@student.school.com', '$2y$12$yf8HP5j5jpLH2OvAEbZb/e1K/KCDQNhpd6reSM6A9XebIxLlY74LW'),
('S000000015', 'marissa.mccabe', 'marissa.mccabe@student.school.com', '$2y$12$l.Nj1ODxPuikx7gOdC7pR.bM62URnUKU99kGylAEUqJegVwadnbma'),
('S000000016', 'robert.connor', 'robert.connor@student.school.com', '$2y$12$IG.mwk6kN1Td2zA6DLpV2evAdtI.Bcm5UMK4tzT5oiC1QMRbUmNIS'),
('S000000017', 'jordan.michael', 'jordan.michael@student.school.com', '$2y$12$bqVLUCjlgo2vBtSaLkFJv.yYjdc1w0KV0CLvqp9R.V6egjQ4kIsL2'),
('S000000018', 'ed.sawyer', 'ed.sawyer@student.school.com', '$2y$12$VEQGyBndq0RX6hVbI3/RsOMdY0lRXdROcnGWAdrdjArvNOSCVjs.O'),
('S000000019', 'zoey.browne', 'zoey.browne@student.school.com', '$2y$12$YXvZciLfOowfdpppl/6hcOLo9H13SVhstpAy9xNxV510LX2mxXVjK'),
('S000000020', 'fern.drew', 'fern.drew@student.school.com', '$2y$12$LLd2RtvqU6uXnSGUcUZmIeTz9V/UPhkCI3YYBy.1NK1pSqStA1paq'),
('S000000021', 'muhammad.rizky', 'muhammad.rizky@student.school.com', '$2y$12$ga1kK4GzBh4Yh6FV1fBT9en.GvIsuouvoG0LhHm0xRpCWVaQlynKy'),
('S000000022', 'roger.federer', 'roger.federer@student.school.com', '$2y$12$ImZ1hZXwtsC/t1vbRud.Eev/kkEl4.zuIO3Rh546VVhr2etr8eB0a'),
('S000000023', 'tiger.woods', 'tiger.woods@student.school.com', '$2y$12$2a99ozbgL/i5GpxUlgO2iOyBiTl/UuZv013evcXOsyY9LXMztyihm'),
('S000000024', 'maria.obama', 'maria.obama@student.school.com', '$2y$12$mFsGWzP5YJwFeZtLN8jDL.wCAxHFPdqhHXLjb3mmITDOTDDaVdjGG'),
('S000000025', 'marion.bola', 'marion.bola@student.school.com', '$2y$12$yXRHUHL/nu3cfZ.STHlgu.eHYSBKffWoFjBtfJ8OxSeCPjFnEmTgq');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `id_pengajar` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
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
('G0001', 'G000000001', 'Budi', 'Sutedjo', '6285911003300', 'Jl. jalan ke luar rumah', NULL),
('G0002', 'G000000002', 'Budi', 'Sutarno', '628123551241', 'Jl. kemana hatimu sedih', NULL),
('G0003', 'G000000003', 'Rudi', 'Jatmoko', '62124145171', 'Jl. tidur subuh', NULL),
('G0004', 'G000000004', 'Ahmad', 'Sutejo', '6291296241', 'Jl. kenangan indah', NULL),
('G0005', 'G000000005', 'Bryan', 'McKnight', '1257182624', 'Amsterdam', NULL),
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
('A', 'IPA', 'G0001'),
('B', 'IPA', 'G0002'),
('C', 'IPS', 'G0003'),
('D', 'IPS', 'G0004'),
('E', 'IPS', 'G0005');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

DROP TABLE IF EXISTS `nilai_siswa`;
CREATE TABLE `nilai_siswa` (
  `id` int(11) NOT NULL,
  `id_subject` varchar(5) NOT NULL,
  `id_siswa` varchar(5) NOT NULL,
  `nilai_tugas` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `komplain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `id_subject`, `id_siswa`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `komplain`) VALUES
(1, 'BIO1', 'S0001', 70, 90, 100, NULL),
(2, 'BIO1', 'S0002', 76, 49, 55, NULL),
(3, 'BIO1', 'S0003', 65, 48, 87, NULL),
(4, 'BIO1', 'S0004', 56, 75, 66, NULL),
(5, 'BIO1', 'S0005', 76, 84, 69, NULL),
(6, 'BIO1', 'S0006', 57, 67, 99, NULL),
(7, 'BIO1', 'S0007', 68, 75, 45, NULL),
(8, 'BIO1', 'S0008', 76, 87, 73, NULL),
(9, 'BIO1', 'S0009', 55, 58, 48, NULL),
(10, 'BIO1', 'S0010', 86, 34, 66, NULL),
(11, 'FIS1', 'S0001', 68, 75, 64, 'Tolong di cek kembali bu'),
(12, 'FIS1', 'S0002', 88, 87, 68, NULL),
(13, 'FIS1', 'S0003', 55, 87, 67, NULL),
(14, 'FIS1', 'S0004', 68, 83, 69, NULL),
(15, 'FIS1', 'S0005', 76, 59, 77, NULL),
(16, 'FIS1', 'S0006', 81, 75, 66, NULL),
(17, 'FIS1', 'S0007', 81, 55, 59, NULL),
(18, 'FIS1', 'S0008', 91, 88, 89, NULL),
(19, 'FIS1', 'S0009', 66, 85, 77, NULL),
(20, 'FIS1', 'S0010', 91, 90, 84, NULL),
(21, 'EKO1', 'S0011', 56, 76, 89, NULL),
(22, 'EKO1', 'S0012', 78, 55, 89, NULL),
(23, 'EKO1', 'S0013', 88, 88, 99, NULL),
(24, 'EKO1', 'S0014', 78, 48, 96, NULL),
(25, 'EKO1', 'S0015', 78, 59, 44, NULL),
(26, 'EKO1', 'S0016', 77, 88, 99, NULL),
(27, 'EKO1', 'S0017', 99, 78, 56, NULL),
(28, 'EKO1', 'S0018', 48, 56, 24, NULL),
(29, 'EKO1', 'S0019', 78, 59, 64, NULL),
(30, 'EKO1', 'S0020', 59, 68, 78, NULL),
(31, 'EKO1', 'S0021', 55, 26, 49, NULL),
(32, 'EKO1', 'S0022', 84, 86, 75, NULL),
(33, 'EKO1', 'S0023', 78, 48, 96, NULL),
(34, 'EKO1', 'S0024', 85, 96, 74, NULL),
(35, 'EKO1', 'S0025', 85, 74, 96, NULL),
(36, 'GEO1', 'S0011', 74, 72, 94, NULL),
(37, 'GEO1', 'S0012', 81, 93, 75, NULL),
(38, 'GEO1', 'S0013', 85, 96, 74, NULL),
(39, 'GEO1', 'S0014', 65, 68, 87, NULL),
(40, 'GEO1', 'S0015', 65, 65, 48, NULL),
(41, 'GEO1', 'S0016', 78, 52, 96, NULL),
(42, 'GEO1', 'S0017', 84, 21, 95, NULL),
(43, 'GEO1', 'S0018', 78, 78, 52, NULL),
(44, 'GEO1', 'S0019', 48, 59, 67, NULL),
(45, 'GEO1', 'S0020', 59, 74, 96, NULL),
(46, 'GEO1', 'S0021', 78, 45, 96, NULL),
(47, 'GEO1', 'S0022', 78, 95, 62, NULL),
(48, 'GEO1', 'S0023', 78, 94, 62, NULL),
(49, 'GEO1', 'S0024', 78, 59, 62, NULL),
(50, 'GEO1', 'S0025', 78, 95, 64, NULL),
(51, 'SEJ1', 'S0011', 45, 78, 95, NULL),
(52, 'SEJ1', 'S0012', 95, 78, 65, NULL),
(53, 'SEJ1', 'S0013', 78, 95, 95, NULL),
(54, 'SEJ1', 'S0014', 78, 49, 65, NULL),
(55, 'SEJ1', 'S0015', 65, 98, 87, NULL),
(56, 'SEJ1', 'S0016', 95, 68, 79, NULL),
(57, 'SEJ1', 'S0017', 54, 65, 79, NULL),
(58, 'SEJ1', 'S0018', 87, 95, 64, NULL),
(59, 'SEJ1', 'S0019', 87, 94, 68, NULL),
(60, 'SEJ1', 'S0020', 89, 78, 64, NULL),
(61, 'SEJ1', 'S0021', 65, 34, 18, NULL),
(62, 'SEJ1', 'S0022', 98, 65, 79, NULL),
(63, 'SEJ1', 'S0023', 98, 98, 98, NULL),
(64, 'SEJ1', 'S0024', 78, 45, 97, NULL),
(65, 'SEJ1', 'S0025', 78, 94, 65, NULL),
(66, 'SEJ1', 'S0001', 75, 69, 100, NULL),
(67, 'EKO1', 'S0001', 75, 69, 100, NULL),
(68, 'KOM1', 'S0001', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id_siswa` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `id_kelas` varchar(5) DEFAULT NULL,
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
('S0001', 'S000000001', 'A', 'Kinanti', 'Prima', '6280000000000', 'Jl. Apapun saya oke', NULL),
('S0002', 'S000000002', 'A', 'Edgar', 'Christian', '62129481414', 'Jl. jalan ke pulau jawa', NULL),
('S0003', 'S000000003', 'A', 'Axel', 'Patria', '62123428174', 'Jl. tekun dan soleh', NULL),
('S0004', 'S000000004', 'A', 'Ryo', 'Wang', '621241641874', 'Jl. puncak tebing', NULL),
('S0005', 'S000000005', 'A', 'Anak', 'Soleh', '6218496129465', 'Jl. kemakmuran', NULL),
('S0006', 'S000000006', 'B', 'Alice', 'Golden', '62123614125', 'Jl. makmur', NULL),
('S0007', 'S000000007', 'B', 'Clarissa', 'Gordon', '623149816591', 'Jl. sukamars', NULL),
('S0008', 'S000000008', 'B', 'Federico', 'Huber', '621246184521', 'Jl. sukajupiter', NULL),
('S0009', 'S000000009', 'B', 'Henri', 'Fellows', '62125124124', 'Jl. sukasaturnus', NULL),
('S0010', 'S000000010', 'B', 'Kamal', 'North', '621246128741', 'Jl. sukauranus', NULL),
('S0011', 'S000000011', 'C', 'Allan', 'Suryajana', '62124716481', 'Jl. sukapluto', NULL),
('S0012', 'S000000012', 'C', 'Nabila', 'Redfern', '621264182476', 'Jl. sukamatahari', NULL),
('S0013', 'S000000013', 'C', 'Yayan', 'Armstrong', '621241845112', 'Jl. sukavenus', NULL),
('S0014', 'S000000014', 'C', 'Joy', 'Nevile', '629867986752', 'Jl. sukamerkurius', NULL),
('S0015', 'S000000015', 'C', 'Marissa', 'McCabe', '627581627461', 'Jl. sukabumi', NULL),
('S0016', 'S000000016', 'D', 'Robert', 'Connor', '62716247814', 'Jl. sukabulan', NULL),
('S0017', 'S000000017', 'D', 'Jordan', 'Michael', '62478152846', 'Jl. belum merdeka', NULL),
('S0018', 'S000000018', 'D', 'Ed', 'Sawyer', '621234618412', 'Jl. perjuangan', NULL),
('S0019', 'S000000019', 'D', 'Zoey', 'Browne', '621872648171', 'Jl. kesejahteraan', NULL),
('S0020', 'S000000020', 'D', 'Fern', 'Drew', '62712648174', 'Jl. makmur', NULL),
('S0021', 'S000000021', 'E', 'Muhammad', 'Rizky', '62981236491', 'Jl. sukses', NULL),
('S0022', 'S000000022', 'E', 'Roger', 'Federer', '621246128412', 'Jl. kebenaran', NULL),
('S0023', 'S000000023', 'E', 'Tiger', 'Woods', '621248761842', 'Jl. kesuksesan', NULL),
('S0024', 'S000000024', 'E', 'Maria', 'Obama', '627182648112', 'Jl. kesesatan', NULL),
('S0025', 'S000000025', 'E', 'Marion', 'Bola', '62891624914', 'Jl. kesenian', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `id_subject` varchar(5) NOT NULL,
  `nama_subject` varchar(255) NOT NULL,
  `id_pengajar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id_subject`, `nama_subject`, `id_pengajar`) VALUES
('BIO1', 'Biologi 1', 'G0001'),
('EKO1', 'Ekonomi', 'G0002'),
('FIS1', 'Fisika', 'G0003'),
('GEO1', 'Geografi', 'G0004'),
('KOM1', 'Computer 1', 'GA001'),
('SEJ1', 'Sejarah', 'G0005');

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
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_pengajar` (`id_pengajar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
  ADD CONSTRAINT `nilai_siswa_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_siswa_ibfk_3` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `credentials` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `guru` (`id_pengajar`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
