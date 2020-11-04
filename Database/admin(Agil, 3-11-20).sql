-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2020 pada 12.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_ADM` char(10) NOT NULL,
  `FTO_ADM` varchar(60) NOT NULL,
  `NM_ADM` varchar(100) DEFAULT NULL,
  `HP_ADM` varchar(13) NOT NULL,
  `ALMT_ADM` text NOT NULL,
  `EMAIL_ADM` varchar(30) DEFAULT NULL,
  `PSW_ADM` varchar(100) DEFAULT NULL,
  `ID_ROLE` varchar(11) DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL,
  `DATE_CREATE` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_ADM`, `FTO_ADM`, `NM_ADM`, `HP_ADM`, `ALMT_ADM`, `EMAIL_ADM`, `PSW_ADM`, `ID_ROLE`, `ACTIVE`, `DATE_CREATE`) VALUES
('ADM0000', 'default.jpg', 'admin1', '085735641555', 'Solo', 'turtleninjaaa77@gmail.com', '$2y$10$JXyy.tmhh6TWak5nWCddieWLDexNKu6Y2FrFPM8nya40kU030uJMa', '1', '1', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
