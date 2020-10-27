-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 07:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preneuracademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADM` char(10) NOT NULL,
  `NM_ADM` varchar(100) DEFAULT NULL,
  `EMAIL_ADM` varchar(30) DEFAULT NULL,
  `PSW_ADM` varchar(100) DEFAULT NULL,
  `ID_ROLE` varchar(11) DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL,
  `DATE_CREATE` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADM`, `NM_ADM`, `EMAIL_ADM`, `PSW_ADM`, `ID_ROLE`, `ACTIVE`, `DATE_CREATE`) VALUES
('ADM0000', 'admin1', 'turtleninjaaa77@gmail.com', '$2y$10$JqNY.x02erU1MVtJCYfyiulSluajd8DzPafEXsnIAzySdCWFRwEim', '1', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID_CT` char(10) NOT NULL,
  `NM_CT` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID_CT`, `NM_CT`) VALUES
('CT0001', 'Pendidikan'),
('CT0002', 'Teknologi'),
('CT0003', 'Pertanian'),
('CT0004', 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tags`
--

CREATE TABLE `detail_tags` (
  `ID_POST` char(10) NOT NULL,
  `ID_TAGS` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_tags`
--

INSERT INTO `detail_tags` (`ID_POST`, `ID_TAGS`) VALUES
('PS00001', 'TG0001'),
('PS00001', 'TG0002'),
('PS00003', 'TG0003');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `ID_NV` char(5) NOT NULL,
  `NM_NV` varchar(20) DEFAULT NULL,
  `LINK_NV` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID_POST` char(10) NOT NULL,
  `ID_CT` char(10) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `JUDUL_POST` varchar(200) DEFAULT NULL,
  `KONTEN_POST` text DEFAULT NULL,
  `TGL_POST` varchar(20) DEFAULT NULL,
  `FOTO_POST` varchar(100) DEFAULT NULL,
  `UPDT_TRAKHIR` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID_POST`, `ID_CT`, `ID_ADM`, `JUDUL_POST`, `KONTEN_POST`, `TGL_POST`, `FOTO_POST`, `UPDT_TRAKHIR`) VALUES
('PS00001', 'CT0001', 'ADM0000', 'Belajar Berwirausaha', '1. Format data digital\r\nFormat data digital adalah data yang sudah berbentuk digital dan ada di dalam komputer. Cara mendapatkan data digital bisa dari mengumpulkan berbagai sumber di internet, jurnal, atau survei yang telah dipublikasikan BPS. Format data digital bisa juga dari data analog yang sudah ditulis ke dalam komputer. \r\n\r\n2. Format data vektor\r\nFormat data vektor merupakan bentuk bumi yang direpresentasikan ke dalam kumpulan garis, polygon atau area (daerah yang dibatasi oleh garis yang berawal dan berakhir pada titik yang sama). Waypoint dan nodes (merupakan titik perpotongan antara dua buah garis). Keuntungan utama dari format data vektor adalah ketepatan dalam merepresentasikan fitur titik, batasan dan garis lurus. Hal ini sangat berguna untuk analisa yang membutuhkan ketepatan posisi, misalnya pada basis data batas-batas kadaster. \r\n', '22 Oktober 2020', NULL, '22 Oktober 2020'),
('PS00002', 'CT0004', 'ADM0000', 'aku', 'aku', NULL, NULL, NULL),
('PS00003', 'CT0004', 'ADM0000', 'aku', 'aku', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_view`
--

CREATE TABLE `post_view` (
  `ID_VIEW` char(10) NOT NULL,
  `ID_POST` char(10) NOT NULL,
  `TGL_VIEW` varchar(20) DEFAULT NULL,
  `IP_PENGGUNA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `ID_TAGS` char(10) NOT NULL,
  `NM_TAGS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`ID_TAGS`, `NM_TAGS`) VALUES
('TG0001', 'Kewirausahaan'),
('TG0002', 'Teknologi'),
('TG0003', 'berwirausaha');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `ID_TOKEN` int(15) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `TOKEN` varchar(100) NOT NULL,
  `DATE` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADM`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_CT`);

--
-- Indexes for table `detail_tags`
--
ALTER TABLE `detail_tags`
  ADD PRIMARY KEY (`ID_POST`,`ID_TAGS`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_TAGS`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`ID_NV`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_POST`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_CT`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_ADM`);

--
-- Indexes for table `post_view`
--
ALTER TABLE `post_view`
  ADD PRIMARY KEY (`ID_VIEW`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_POST`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`ID_TAGS`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`ID_TOKEN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `ID_TOKEN` int(15) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_tags`
--
ALTER TABLE `detail_tags`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_TAGS`) REFERENCES `tags` (`ID_TAGS`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_CT`) REFERENCES `category` (`ID_CT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_ADM`) REFERENCES `admin` (`ID_ADM`);

--
-- Constraints for table `post_view`
--
ALTER TABLE `post_view`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
