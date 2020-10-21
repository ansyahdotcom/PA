-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2020 pada 06.36
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
  `NM_ADM` varchar(100) DEFAULT NULL,
  `EMAIL_ADM` varchar(30) NOT NULL,
  `PSW_ADM` varchar(100) NOT NULL,
  `ID_ROLE` int(11) NOT NULL,
  `ACTIVE` char(1) NOT NULL,
  `DATE_CREATE` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_ADM`, `NM_ADM`, `EMAIL_ADM`, `PSW_ADM`, `ID_ROLE`, `ACTIVE`, `DATE_CREATE`) VALUES
('ADM0000', 'admin1', 'turtleninjaaa77@gmail.com', '$2y$10$JqNY.x02erU1MVtJCYfyiulSluajd8DzPafEXsnIAzySdCWFRwEim', 1, '1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `ID_CT` char(10) NOT NULL,
  `NM_CT` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `navbar`
--

CREATE TABLE `navbar` (
  `ID_NV` char(5) NOT NULL,
  `NM_NV` varchar(20) DEFAULT NULL,
  `LINK_NV` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `ID_POST` char(10) NOT NULL,
  `ID_CT` char(10) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `ID_TAGS` char(10) NOT NULL,
  `JUDUL_POST` varchar(200) DEFAULT NULL,
  `KONTEN_POST` varchar(1000) DEFAULT NULL,
  `TGL_POST` varchar(20) DEFAULT NULL,
  `FOTO_POST` varchar(100) DEFAULT NULL,
  `UPDT_TRAKHIR` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_view`
--

CREATE TABLE `post_view` (
  `ID_VIEW` char(10) NOT NULL,
  `ID_POST` char(10) NOT NULL,
  `TGL_VIEW` varchar(20) DEFAULT NULL,
  `IP_PENGGUNA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `ID_TAGS` char(10) NOT NULL,
  `NM_TAGS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADM`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_CT`);

--
-- Indeks untuk tabel `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`ID_NV`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_POST`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_CT`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_ADM`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_TAGS`);

--
-- Indeks untuk tabel `post_view`
--
ALTER TABLE `post_view`
  ADD PRIMARY KEY (`ID_VIEW`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_POST`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`ID_TAGS`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`ID_TOKEN`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `ID_TOKEN` int(15) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_CT`) REFERENCES `category` (`ID_CT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_ADM`) REFERENCES `admin` (`ID_ADM`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_TAGS`) REFERENCES `tags` (`ID_TAGS`);

--
-- Ketidakleluasaan untuk tabel `post_view`
--
ALTER TABLE `post_view`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
