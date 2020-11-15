-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2020 pada 15.03
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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `ID_KLS` int(11) NOT NULL,
  `TITTLE` varchar(50) NOT NULL,
  `PERMALINK` varchar(250) NOT NULL,
  `GBR_KLS` varchar(100) NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `PRICE` double NOT NULL,
  `DISC` double NOT NULL,
  `STAT` char(2) NOT NULL,
  `ID_KTGKLS` varchar(10) NOT NULL,
  `DATE_CREATE` int(11) NOT NULL,
  `LAST_UPDATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`ID_KLS`, `TITTLE`, `PERMALINK`, `GBR_KLS`, `DESKRIPSI`, `PRICE`, `DISC`, `STAT`, `ID_KTGKLS`, `DATE_CREATE`, `LAST_UPDATE`) VALUES
(2, 'Kelas Baru', 'baruuuuu', 'Penguins2.jpg', 'halloo teman', 150000, 0, '1', 'KKL00001', 1605356875, 1605448858),
(35, 'Strategi Bisnis Lewat Sosmed', 'sosmed', 'Lighthouse1.jpg', 'Kelas paling laris looo', 500000, 0, '1', 'KKL00001', 1605433187, 1605448879),
(36, 'Cara Mewujudkan Ide Bisnis', 'ide', 'default.jpg', 'Bla bla bla bla......', 150000, 0, '1', 'KKL00001', 1605433187, 0),
(37, 'Bisnis Digital', 'digital', 'default.jpg', 'hehhehehe', 500000, 0, '1', 'KKL00002', 1605440879, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KLS`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `ID_KLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
