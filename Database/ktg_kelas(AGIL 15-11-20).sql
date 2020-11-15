-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2020 pada 15.04
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
-- Struktur dari tabel `ktg_kelas`
--

CREATE TABLE `ktg_kelas` (
  `ID_KTGKLS` varchar(10) NOT NULL,
  `KTGKLS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ktg_kelas`
--

INSERT INTO `ktg_kelas` (`ID_KTGKLS`, `KTGKLS`) VALUES
('KKL00001', 'Wirausaha Dasar'),
('KKL00002', 'Wirausaha Lanjutan'),
('KKL00003', 'SEO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ktg_kelas`
--
ALTER TABLE `ktg_kelas`
  ADD PRIMARY KEY (`ID_KTGKLS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
