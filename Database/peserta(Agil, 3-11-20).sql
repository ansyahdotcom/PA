-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2020 pada 12.32
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
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `ID_PS` varchar(10) NOT NULL,
  `FTO_PS` varchar(60) NOT NULL,
  `NM_PS` varchar(100) NOT NULL,
  `ALMT_PS` text NOT NULL,
  `HP_PS` varchar(13) NOT NULL,
  `EMAIL_PS` varchar(30) NOT NULL,
  `PSW_PS` varchar(100) NOT NULL,
  `ID_ROLE` int(11) NOT NULL,
  `ACTIVE` char(1) NOT NULL,
  `DATE_CREATE` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`ID_PS`, `FTO_PS`, `NM_PS`, `ALMT_PS`, `HP_PS`, `EMAIL_PS`, `PSW_PS`, `ID_ROLE`, `ACTIVE`, `DATE_CREATE`) VALUES
('PSR00001', 'default.jpg', 'Kura Gayming', 'Jember', '085667776667', 'kurak4647@gmail.com', '$2y$10$b0vLHBSld7woRtx7aZyE8.2D6JZgilwTs0.38RvIRUH2mFcas0/1W', 2, '1', 1604313917),
('PSR00002', 'default.jpg', 'Rusdi', '', '086775678877', 'rus@gmail.com', '$2y$10$oT41TDbCNvBwHPaIh.Ug9.jfgUNIzAyxo1xwsBQoBXRINZdkH.gzq', 2, '0', 1604318977);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`ID_PS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
