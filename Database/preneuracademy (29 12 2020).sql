-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2020 pada 10.46
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
  `ID_ROLE` int(11) NOT NULL,
  `FTO_ADM` varchar(60) DEFAULT NULL,
  `NM_ADM` varchar(100) DEFAULT NULL,
  `HP_ADM` varchar(13) DEFAULT NULL,
  `ALMT_ADM` text DEFAULT NULL,
  `EMAIL_ADM` varchar(30) DEFAULT NULL,
  `PSW_ADM` varchar(100) DEFAULT NULL,
  `ACTIVE` int(11) NOT NULL,
  `DATE_ADM` varchar(10) NOT NULL,
  `UPDATE_ADM` varchar(20) NOT NULL,
  `UPDATE_PSWADM` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_ADM`, `ID_ROLE`, `FTO_ADM`, `NM_ADM`, `HP_ADM`, `ALMT_ADM`, `EMAIL_ADM`, `PSW_ADM`, `ACTIVE`, `DATE_ADM`, `UPDATE_ADM`, `UPDATE_PSWADM`) VALUES
('ADM0000', 1, 'Jellyfish1.jpg', 'Agus Hadi Prayitno', '089775667775', 'Solo, Jawa Tengah.', 'turtleninjaaa77@gmail.com', '$2y$10$Dv6GmV1W3yt/Wj6.XtOtCOlhSYqAGJmZmxe9Yqg89iE6/WiT7Je1y', 1, '0', '1609092104', '1605846423');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `ID_CT` char(10) NOT NULL,
  `NM_CT` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`ID_CT`, `NM_CT`) VALUES
('CT0001', 'Pendidikan'),
('CT0002', 'Teknologi'),
('CT0003', 'Pertanian'),
('CT0004', 'Akuntansi'),
('CT0005', 'Pariwisata'),
('CT0006', 'Kewirausahaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_fasilitas_kls`
--

CREATE TABLE `detail_fasilitas_kls` (
  `ID_KLS` char(10) NOT NULL,
  `ID_FA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_fasilitas_kls`
--

INSERT INTO `detail_fasilitas_kls` (`ID_KLS`, `ID_FA`) VALUES
('WB00001', 'FA0001'),
('WB00001', 'FA0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_fasilitas_wbnr`
--

CREATE TABLE `detail_fasilitas_wbnr` (
  `ID_WEBINAR` char(10) NOT NULL,
  `ID_FA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `ID_KLS` int(11) NOT NULL,
  `ID_PS` varchar(10) NOT NULL,
  `ID_TRN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_kelas`
--

INSERT INTO `detail_kelas` (`ID_KLS`, `ID_PS`, `ID_TRN`) VALUES
(10, 'PS00000001', 'TRN335583569'),
(10, 'PS00000002', 'TRN372212516');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_materi`
--

CREATE TABLE `detail_materi` (
  `ID_KLS` int(11) NOT NULL,
  `ID_MT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_materi`
--

INSERT INTO `detail_materi` (`ID_KLS`, `ID_MT`) VALUES
(5, 2),
(10, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tags`
--

CREATE TABLE `detail_tags` (
  `ID_POST` char(10) NOT NULL,
  `ID_TAGS` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_tags`
--

INSERT INTO `detail_tags` (`ID_POST`, `ID_TAGS`) VALUES
('PS00001', 'TG0001'),
('PS00001', 'TG0005'),
('PS00001', 'TG0006'),
('PS00002', 'TG0003'),
('PS00003', 'TG0001'),
('PS00003', 'TG0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_tugas`
--

CREATE TABLE `detil_tugas` (
  `ID_PS` varchar(10) NOT NULL,
  `ID_TG` varchar(10) NOT NULL,
  `ID_MT` int(11) NOT NULL,
  `FILE_DT_TG` varchar(100) NOT NULL,
  `TIME_DT_TG` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detil_tugas`
--

INSERT INTO `detil_tugas` (`ID_PS`, `ID_TG`, `ID_MT`, `FILE_DT_TG`, `TIME_DT_TG`) VALUES
('PSR00001', '1', 1, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `ID_DISKON` int(11) NOT NULL,
  `DISKON` double DEFAULT NULL,
  `NM_DISKON` varchar(30) DEFAULT NULL,
  `STATUS` char(11) DEFAULT NULL,
  `DATE_DIS` int(11) DEFAULT NULL,
  `UPDATE_DIS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`ID_DISKON`, `DISKON`, `NM_DISKON`, `STATUS`, `DATE_DIS`, `UPDATE_DIS`) VALUES
(1, 0.76, 'Kemerdekaan Indonesia', '1', 0, 1605524714),
(2, 0.35, 'Beasiswa Wirausaha Muda', '1', 1605518268, 1605524739),
(3, 0.5, 'Diskon Hari Sumpah Pemuda', '1', 1605518782, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `ID_FA` varchar(10) NOT NULL,
  `NM_FA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`ID_FA`, `NM_FA`) VALUES
('FA0001', 'E-Sertifikat'),
('FA0002', 'Materi'),
('FA0003', 'Seminar Kit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebijakan`
--

CREATE TABLE `kebijakan` (
  `ID_KB` int(11) NOT NULL,
  `NM_KB` varchar(50) DEFAULT NULL,
  `IMG_KB` varchar(200) DEFAULT NULL,
  `LINK_KB` varchar(200) DEFAULT NULL,
  `ISI_KB` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kebijakan`
--

INSERT INTO `kebijakan` (`ID_KB`, `NM_KB`, `IMG_KB`, `LINK_KB`, `ISI_KB`) VALUES
(1, 'Terms Conditions', 'terms.png', 'terms', '&lt;p&gt;HAHAHAHAHAHA&lt;/p&gt;'),
(2, 'Privacy Policy', 'privacy.png', 'privacy', '&lt;p&gt;AWOKWOWKOWKWOK&lt;/p&gt;'),
(3, 'Terms Services', 'service.png', 'services', '&lt;p&gt;HEHEHEHE&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `ID_KLS` int(11) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `ID_KTGKLS` int(11) NOT NULL,
  `ID_DISKON` int(11) NOT NULL,
  `TITTLE` varchar(200) DEFAULT NULL,
  `PERMALINK` varchar(250) DEFAULT NULL,
  `GBR_KLS` varchar(100) DEFAULT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `STAT` char(11) DEFAULT NULL,
  `DATE_KLS` int(11) DEFAULT NULL,
  `UPDATE_KLS` int(11) DEFAULT NULL,
  `LOK_KLS` varchar(50) NOT NULL,
  `TGL_PENDAFTARAN` varchar(20) NOT NULL,
  `TGL_PENUTUPAN` varchar(20) NOT NULL,
  `TGL_MULAI` varchar(20) NOT NULL,
  `TGL_SELESAI` varchar(20) NOT NULL,
  `HARI` varchar(30) NOT NULL,
  `JAM_MULAI` varchar(20) NOT NULL,
  `JAM_SELESAI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`ID_KLS`, `ID_ADM`, `ID_KTGKLS`, `ID_DISKON`, `TITTLE`, `PERMALINK`, `GBR_KLS`, `DESKRIPSI`, `PRICE`, `STAT`, `DATE_KLS`, `UPDATE_KLS`, `LOK_KLS`, `TGL_PENDAFTARAN`, `TGL_PENUTUPAN`, `TGL_MULAI`, `TGL_SELESAI`, `HARI`, `JAM_MULAI`, `JAM_SELESAI`) VALUES
(5, 'ADM0000', 2, 0, 'Wirausaha Dasar Bagi Pemula', 'baru', 'default.jpg', 'halloo teman', 170000, '1', 1605356875, 1609053631, 'Online Class', '2020-12-05', '2020-12-27', '2021-12-01', '2021-12-31', '3 Hari (Senin-Rabu)', '08:00', '11:00'),
(6, 'ADM0000', 2, 0, 'Strategi Bisnis Lewat Sosmed', 'sosmed', 'default.jpg', 'Halloooo', 200000, '1', 1605526657, 1609088010, 'Online Class', '2020-12-29', '2020-12-31', '2021-12-01', '2021-12-31', '3 Hari (Senin-Rabu)', '', ''),
(10, 'ADM0000', 2, 0, 'Teknik Branding Dalam Berwirausaha', 'Branding', 'default.jpg', '<p>Ini kelas branding<br></p>', 150000, '1', 1609005217, 1609099167, 'Online Class', '2020-12-28', '2020-12-31', '2021-01-01', '2021-01-09', '3 Hari (Senin-Rabu)', '09:00', '10:00'),
(14, 'ADM0000', 6, 0, 'Manajemen Keuangan Dalam Wirausaha', 'Manajemen', '54a259d0626f83e71ba9fc42cc2ee505.jpg', '<p>Manajemen</p>', 200000, '1', 1609088355, 0, 'Online Class', '2020-12-01', '2020-12-27', '2021-01-01', '2021-04-30', '3 Hari (Senin-Rabu)', '09:00', '11:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `key`
--

CREATE TABLE `key` (
  `ID_KEY` int(11) NOT NULL,
  `NM_KEY` varchar(50) DEFAULT NULL,
  `KEY_1` varchar(200) DEFAULT NULL,
  `KEY_2` varchar(200) DEFAULT NULL,
  `STATUS` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `key`
--

INSERT INTO `key` (`ID_KEY`, `NM_KEY`, `KEY_1`, `KEY_2`, `STATUS`) VALUES
(1, 'Google OAuth 1', '123456', '123456', 'Aktif'),
(2, 'Facebook Auth', '123456', '123456', 'Aktif'),
(3, 'Recaptcha API', '123456', '123456', 'Aktif'),
(4, 'Instagram API', '123456', '123456', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ktg_kelas`
--

CREATE TABLE `ktg_kelas` (
  `ID_KTGKLS` int(11) NOT NULL,
  `KTGKLS` varchar(50) DEFAULT NULL,
  `DATE_KTGKLS` int(11) DEFAULT NULL,
  `UPDATE_KTGKLS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ktg_kelas`
--

INSERT INTO `ktg_kelas` (`ID_KTGKLS`, `KTGKLS`, `DATE_KTGKLS`, `UPDATE_KTGKLS`) VALUES
(1, 'Wirausaha Dasar', 0, 0),
(2, 'Wirausaha Lanjutan', 0, 0),
(6, 'Advance', 1605843803, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `ID_MT` int(11) NOT NULL,
  `NM_MT` varchar(50) DEFAULT NULL,
  `DETAIL_MT` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`ID_MT`, `NM_MT`, `DETAIL_MT`) VALUES
(2, 'BAB 1 Pengenalan Kewirausahaan', ''),
(3, 'Pengenalan Kelas', '<p><b>Pada</b> tahap  ini akan diberikan pengenalan mengenai kelas kursus ini.</p>'),
(4, 'Pekan 1', '<p>Pengenalan mengenai pengertian kursus sebagai dasar wirausaha</p>'),
(5, 'Pekan 2', '<p>Dasar pengetahuan wirausaha muda</p>'),
(6, 'Pengenalan', '<p>BAB 1 Pengenalan Kelas dan Materi</p>'),
(7, 'BAB 1 Pengenalan', '<p>Pengenalan apa itu branding<br></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_sub`
--

CREATE TABLE `materi_sub` (
  `ID_SUB` int(11) NOT NULL,
  `ID_MT` int(11) NOT NULL,
  `NM_SUB` varchar(40) NOT NULL,
  `DETAIL_SUB` mediumtext NOT NULL,
  `FILE_SUB` varchar(100) NOT NULL,
  `ICON_SUB` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi_sub`
--

INSERT INTO `materi_sub` (`ID_SUB`, `ID_MT`, `NM_SUB`, `DETAIL_SUB`, `FILE_SUB`, `ICON_SUB`) VALUES
(3, 2, 'Presentasi kelas 1', '', 'Mantap.pdf', 'fas fa-file-pdf'),
(4, 3, 'Kelas', '', 'Konsep_Etika_Bisnis.pptx', 'fas fa-file-powerpoint'),
(5, 2, 'Dasar wirausaha', '', 'Manajemen_kualitas_(Tugas_2).docx', 'fas fa-file-word'),
(6, 1, 'Presentasi kelas 1', '', 'Rancangan_Anggaran_Biaya.docx', 'fas fa-file-word'),
(7, 3, 'Pengenalan GIS', '', '01_-_Sekilas_Tentang_GIS.pdf', 'fas fa-file-pdf'),
(8, 3, 'Materi 2', '', 'Agile.docx', 'fas fa-file-word'),
(9, 7, 'Apa itu branding?', '', 'Tips.docx', 'fas fa-file-pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medsos`
--

CREATE TABLE `medsos` (
  `ID_MS` int(11) NOT NULL,
  `NM_MS` varchar(100) DEFAULT NULL,
  `IC_MS` varchar(30) DEFAULT NULL,
  `LINK_MS` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `medsos`
--

INSERT INTO `medsos` (`ID_MS`, `NM_MS`, `IC_MS`, `LINK_MS`) VALUES
(1, 'Youtube', 'fab fa-youtube', 'https://www.youtube.com/channel/UCr5MmNPr-xNwbyt7Hrzu6Hw'),
(2, 'Instagram', 'fab fa-instagram', 'https://www.instagram.com/preneuracademy/'),
(3, 'Twitter', 'fab fa-twitter', 'https://twitter.com/preneuracademy'),
(4, 'Facebook', 'fab fa-facebook', 'https://www.facebook.com/preneuracademy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `navbar`
--

CREATE TABLE `navbar` (
  `ID_NV` int(11) NOT NULL,
  `NM_NV` varchar(20) DEFAULT NULL,
  `LINK_NV` varchar(200) DEFAULT NULL,
  `PR_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `navbar`
--

INSERT INTO `navbar` (`ID_NV`, `NM_NV`, `LINK_NV`, `PR_ID`) VALUES
(1, 'Kelas', 'kelas', NULL),
(3, 'webinar', 'webinar', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `ID_NOT` int(11) NOT NULL,
  `GLOBAL_ID` varchar(128) NOT NULL,
  `ID_US` varchar(10) NOT NULL,
  `TITTLE_NOT` varchar(128) NOT NULL,
  `MSG_NOT` text NOT NULL,
  `LINK` varchar(128) NOT NULL,
  `IS_READ` char(1) NOT NULL,
  `ST_NOT` char(1) NOT NULL,
  `DATE_NOT` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notif`
--

INSERT INTO `notif` (`ID_NOT`, `GLOBAL_ID`, `ID_US`, `TITTLE_NOT`, `MSG_NOT`, `LINK`, `IS_READ`, `ST_NOT`, `DATE_NOT`) VALUES
(1, 'PS00000001', 'PS00000001', 'Pendaftar baru', 'Ada pendaftar baru, atas nama Alex.', 'admin/peserta', '1', '0', '2020-12-25 20:50:15'),
(2, 'PS00000001', 'PS00000001', 'Selamat datang!', 'Selamat bergabung di Preneur Academy', 'peserta/profil', '1', '1', '2020-12-25 20:50:15'),
(3, 'PS00000001', 'PS00000001', 'Aktivasi akun', 'Pendaftar dengan nama Alex berhasil mangaktivasi akun.', 'admin/peserta', '1', '0', '2020-12-25 20:50:15'),
(12, 'a7232dfd-3b9f-46b0-890f-cbd5662ce509', 'PS00000001', 'Transaksi baru', 'Order id TRN335583569, atas nama Alex.', 'admin/transaksi/detpending/a7232dfd-3b9f-46b0-890f-cbd5662ce509', '1', '0', '2020-12-28 09:53:35'),
(13, 'a7232dfd-3b9f-46b0-890f-cbd5662ce509', 'PS00000001', 'Transaksi berhasil', 'Order id TRN335583569', 'peserta/transaksi/dettrn/a7232dfd-3b9f-46b0-890f-cbd5662ce509', '0', '1', '2020-12-28 09:53:35'),
(14, 'PS00000002', 'PS00000002', 'Pendaftar baru', 'Ada pendaftar baru, atas nama Uyab.', 'admin/peserta', '1', '0', '2020-12-28 23:29:47'),
(15, 'PS00000002', 'PS00000002', 'Selamat datang!', 'Selamat bergabung di Preneur Academy', 'peserta/profil', '0', '1', '2020-12-28 23:29:47'),
(16, 'PS00000002', 'PS00000002', 'Aktivasi akun', 'Pendaftar dengan nama Uyab berhasil mangaktivasi akun.', 'admin/peserta', '0', '0', '2020-12-28 23:29:47'),
(17, '61368ba0-08fa-4696-b542-e2c6d5950109', 'PS00000002', 'Transaksi baru', 'Order id TRN372212516, atas nama Uyab.', 'admin/transaksi/detpending/61368ba0-08fa-4696-b542-e2c6d5950109', '1', '0', '2020-12-29 11:55:29'),
(18, '61368ba0-08fa-4696-b542-e2c6d5950109', 'PS00000002', 'Transaksi berhasil', 'Order id TRN372212516', 'peserta/transaksi/dettrn/61368ba0-08fa-4696-b542-e2c6d5950109', '1', '1', '2020-12-29 11:55:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `ID_PS` varchar(10) NOT NULL,
  `ID_ROLE` int(11) NOT NULL,
  `FTO_PS` varchar(60) DEFAULT NULL,
  `NM_PS` varchar(100) DEFAULT NULL,
  `JK_PS` varchar(10) DEFAULT NULL,
  `AGAMA_PS` varchar(10) DEFAULT NULL,
  `USIA_PS` varchar(5) DEFAULT NULL,
  `KOTA` varchar(100) DEFAULT NULL,
  `PEKERJAAN` varchar(100) DEFAULT NULL,
  `HP_PS` varchar(15) DEFAULT NULL,
  `ALMT_PS` text DEFAULT NULL,
  `EMAIL_PS` varchar(30) DEFAULT NULL,
  `PSW_PS` varchar(100) DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL,
  `DATE_CREATE` varchar(15) DEFAULT NULL,
  `STATUS_BELI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`ID_PS`, `ID_ROLE`, `FTO_PS`, `NM_PS`, `JK_PS`, `AGAMA_PS`, `USIA_PS`, `KOTA`, `PEKERJAAN`, `HP_PS`, `ALMT_PS`, `EMAIL_PS`, `PSW_PS`, `ACTIVE`, `DATE_CREATE`, `STATUS_BELI`) VALUES
('PS00000001', 2, 'Hydrangeas.jpg', 'Alex', 'Laki-laki', 'Islam', NULL, NULL, 'Pelajar/Mahasiswa', '085778990009', 'Kediri', 'kurak4647@gmail.com', '$2y$10$p0EZ9IqwxLBecz5FEbnUd.y4Wigi8Gr5EzIRGP1zq6j5IqSva/eBS', '1', '1608904215', 200),
('PS00000002', 2, 'default.jpg', 'Uyab', 'Laki-laki', 'Islam', NULL, NULL, 'Pelajar/Mahasiswa', '087667887667', 'Unknown', 'uyab@gmail.com', '$2y$10$31fp1hvNUxor0GTw9Nw7NuaXjLosq0iIJBDE5Upv3y9S/4HHHf9Uu', '1', '1609172987', 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `ID_POST` char(10) NOT NULL,
  `ID_CT` char(10) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `JUDUL_POST` varchar(200) DEFAULT NULL,
  `KONTEN_POST` text DEFAULT NULL,
  `TGL_POST` varchar(20) DEFAULT NULL,
  `FOTO_POST` varchar(100) DEFAULT NULL,
  `UPDT_TRAKHIR` varchar(20) DEFAULT NULL,
  `ST_POST` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`ID_POST`, `ID_CT`, `ID_ADM`, `JUDUL_POST`, `KONTEN_POST`, `TGL_POST`, `FOTO_POST`, `UPDT_TRAKHIR`, `ST_POST`) VALUES
('PS00001', 'CT0002', 'ADM0000', 'Bagaimana-Caranya-Membuat-Konten-yang-Viral', '&lt;p&gt;Banyak para mastah iklan yang sekarang berlomba membuat konten viral \r\nuntuk bisa menghemat biaya iklan. Apalagi sekarang fb ads dan iklan \r\nberbayar lainnya mulai dikenakan pajak 10% dan langsung ditarik dari \r\nbudget iklan kita loh.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;em&gt;“Gimana ya caranya viralin konten kita, biar bisa jangkau banyak orang secara organik alias tanpa ads berbayar..??”&lt;/em&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Mas Fardi Yandi founder dari Social Kreatif kupas tuntas hal tersebut\r\n di YEA Class yang berjudul the Science of being Viral, Sabtu kemarin. \r\nTernyata konten viral itu bisa kita buat loh dan ada polanya. Tahukah \r\nsobat eagles, konten yang dibuat oleh Mas Fardi Yandi ini sudah \r\nmenjangkau ratusan ribu reach secara organik tanpa ads berbayar.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Waduh, kebayang gak berapa juta tuh kalau pake fb ads buat menjangkau ratusan ribu orang..??&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Nah makanya kita bahas ini kemarin karena dengan konten viral kita \r\nbisa menghemat biaya iklan yang jutaan tadi. Kan lumayan uangnya bisa \r\nkita alokasikan untuk keperluan yang lain.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Ok, jadi gimana caranya..?&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Sebelum dibahas, kita ubah dulu persepsi viral menjadi ‘bisa \r\ndijangkau banyak orang’. Jadi, bagaimana caranya agar konten kita bisa \r\ndijangkau banyak orang tanpa ads..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Perlu diingat, bahwa viral itu butuh proses dalam menemukan pola \r\nviralnya. Beda bisnis, beda tujuan, beda target pasar, tentu berbeda \r\njuga cara jangkaunya. Dan dalam pembahasan ini kita batasi viral hanya \r\ndengan cara yang positif saja ya, baik itu di &lt;a href=&quot;https://yea-indonesia.com/2020/10/26/instagram-versus-tiktok-better-mana-sih/&quot;&gt;instagram maupun tiktok&lt;/a&gt;.&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Stepnya:&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;1. Purpose&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Jangan mulai dari how to, mulai dari WHY. Mengapa konten kita harus \r\nviral, mengapa saya bangun bisnis ini, mengapa saya buat konten ini, \r\nmengapa saya posting hal ini, dan ‘why’ lainnya yang bisa menjadi \r\nfondasi dari bisnis atau konten kita. Karena tidak setiap saat postingan\r\n kita akan selalu di like banyak orang. Mungkin satu atau dua bulan kita\r\n masih dalam spirit atau semangat yang kuat, tapi dalam bulan ketiga \r\njika masih tidak ada yang like apakah kita akan terus melanjutkan bisnis\r\n atau posting konten kita..? Nah ‘why’ yang kuatlah yang akan \r\nmengingatkan kita atau menjadi trigger bagi kita untuk tetap membuat \r\nkonten dan melanjutkan bisnis kita.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;2. Konsep&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Ok, jika sudah punya purpose maka selanjutnya kita harus mengetahui konsep atau anatomy of viral content. Terdiri dari 2 yaitu:&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;–&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Konten yang worth untuk di-shared oleh orang lain à ada 1 \r\nchannel marketing yang masih berlaku dan terpercaya dari jaman nenek \r\nmoyang hingga sekarang, yaitu MLM alias dari mulut ke mulut. Ketika ada \r\npostingan story teman kita yang menurut kita ‘gue banget nih’, kita \r\ncenderung ingin share postingan tersebut. Ada satu psikologi manusia \r\nyang bersifat mengikuti sesuatu yang dilakukan oleh orang terdekat atau \r\norang kebanyakan. Di sinilah awal dari proses viralnya suatu konten. \r\nJadi, apakah konten kita layak untuk dishare oleh orang lain..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;–&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Konten yang terbuka untuk semua orang à konten yang harus \r\nbisa dipahami atau relate dengan semua orang. Jika kita perhatikan saat \r\nini banyak orang membuat konten microblog dengan istilah atau kata-kata \r\nyang hanya dimengerti oleh orang/kalangan tertentu, padahal ini hanya \r\nakan memperkecil kemungkinan share atau jangkauan. Dan konten yang lebih\r\n membumi atau relate dengan kebanyakan netizen justru ini yang membuka \r\npeluang menuju viral.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Banyak orang posting tentang prestasi yang telah diraih. Tapi \r\nbagaimana jika posting tentang ‘bagaimana caranya agar kamu juga bisa \r\nberprestasi atau mendapatkan beasiswa a’ misalkan. Tentu akan jauh lebih\r\n tinggi share dan saved nya karena orang lain mendapatkan benefit dari \r\npostingan kita.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;3 faktor yang membuat sebuah &lt;a href=&quot;https://medium.com/@fattul/10-menit-membuat-konten-yang-mudah-tersebar-di-medsos-konten-viral-dfc60af6dea4&quot;&gt;konten bisa menjadi viral:&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;1.&amp;nbsp; Konten yang membangkitkan emosi: sedih, marah, bahagia, humor, \r\nharu, menyentuh. Angkat isu atau suatu trend dan kaitkan dengan bisnis \r\natau konten kita.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;2.&amp;nbsp; Konten yang menyampaikan pesan positif: harus sesuai dengan value kita.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;3.&amp;nbsp; Konten yang mengajarkan sesuatu: tips, DIY, ilmu terapan&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;Yuk ikuti rules-nya:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Social currency = orang lain senang membicarakan hal yang membuat mereka terlihat pintar.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Keresahan = hal – hal sederhana yang belum bisa diungkapkan netizen, kita ungkapkan menjadi sebuah konten&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Emotion = Kalau kamu peduli, kamu pasti akan share tentang hal ini&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# General Issue = Semakin umum sesuatu, maka semakin besar kesempatan\r\n untuk dibagikan ke orang lain. Gimana caranya buat tahu trend..? main \r\ntwitter, baca medium.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Practical value = hal – hal praktikal yang berguna untuk orang sekitar&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Building stories = cerita yang belum mampu orang sampaikan, tapi mampu kita sampaikan&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;Quick tips:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Pakai Instagram = grabbing attention with visual, consuming time duration, hashtag&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Pakai tik tok = grabbing attention with audio, words, or the visual. 2 detik pertama, hashtag&lt;/p&gt;', '2020-11-25', '20170507_0705044.jpg', '2020-11-25', 1),
('PS00002', 'CT0004', 'ADM0000', 'Cara-Mudah-Memahami-Business-Model-Canvas', '&lt;p&gt;Apakah kamu sering dengar istilah business model canvas atau business model generation..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Business model generation, suatu buku karangan Alexander Osterwalder \r\ndan kawan-kawannya yang sebagian besarnya adalah doctor dan professor di\r\n bidang manajemen. Menurut saya buku ini adalah buku yang terbaik dalam \r\n10 tahun terakhir ini. Hanya saja, bagi orang awam memang tidak mudah \r\nuntuk memahaminya dalam waktu singkat.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Oleh karena itu saya akan berusaha untuk menjelaskan dengan waktu \r\nyang sangat singkat agar kita semua terutama yang awam untuk bisa \r\nmemahami Business Model Canvas (BMC).&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Saya akan menggunakan pendekatan yang disebut dengan input output \r\nanalysis. Bagi saya input ouput analysis adalah induknya framework, \r\nkarena bisa digunakan tidak hanya untuk bisnis saja. Saya mendapatkan \r\nframe work ini justru dari sekolah teknik elektro dimana saya sekolah \r\ndulu.&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;Nah apa sih input output analysis itu..?\r\n\r\n\r\n\r\n&lt;/p&gt;&lt;p&gt;Pada dasarnya terdiri dari 3 bagian yaitu input, proses, dan output. \r\nKalau dalam bisnis mungkin kita sering mendengar istilah hulu ke hilir, \r\ndimana hulu sebagai input, hilir sebagai output, dan perusahaan sebagai \r\nproses.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;1. Hulu&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Di sini kita akan menemui yang namanya supplier, kontraktor, petani, atau penambang.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;2. Perusahaan&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Tentunya di sini kita akan menemukan semua proses yang mengolah semua\r\n bahan dari hulu tadi untuk dibuat suatu produk baru yang diinginkan. \r\nPerusahaan itu bisa berupa manajemen, atau business owner yang punya \r\nsuatu bisnis, atau bisa jadi berupa tempat produksi.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;3. Hilir&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Di sini ujung dari sampainya produk yang telah diolah tadi, bisa \r\nberupa konsumen, toko eceran, dan tempat lainnya yang menerima atau \r\nmembeli produk yang telah diolah tadi.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Jika air mengalirnya dari hulu ke hilir, maka dalam bisnis terjadi \r\nsebaliknya. Uang tentunya akan mengalir dari hilir/konsumen ke \r\nperusahaan (keluar dalam bentuk operasional cost), baru kemudian ke \r\nhulu/supplier.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Selisih dari pemasukan dan pengeluaran menjadi keuntungan. Atau bisa \r\njuga terjadi kerugian jika pengeluaran lebih tinggi daripada pemasukan. \r\nItu yang disebut dengan laba rugi.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Apa korelasinya BMC dan input output analysis..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Kita mulai dari hilir yaitu permintaan pasar/konsumen. Siapa yang sebenarnya menjadi target pasar kita. itu disebut sebagai &lt;strong&gt;customer segmen&lt;/strong&gt; dalam BMC.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;ul&gt;&lt;li&gt;Apa yang mereka butuhkan..?&lt;/li&gt;&lt;li&gt;Masalah apa yang akan kita selesaikan..?&lt;/li&gt;&lt;li&gt;Apa keunggulan atau diferensiasi kita dari kompetitor..?&lt;/li&gt;&lt;/ul&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Jawaban pertanyaan ini akan memperbaiki output atau produk yang \r\nkeluar sehingga mempunyai diferensiasi yang kuat. Inilah yang disebut \r\ndengan &lt;strong&gt;value proposition&lt;/strong&gt; dalam BMC. Bisnis bisa dimulai dalam skala kecil dengan mendeliver value proposition tersebut ke tempat customer.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Tapi pada saat kita ingin melebarkan bisnis, maka kita akan membutuhkan saluran distribusi. Itulah yang disebut dengan &lt;strong&gt;channel distribution&lt;/strong&gt; dalam BMC.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Setelah kita mendistribusikan produk ke titik-titik terdekat dari \r\nkonsumen, permasalahan berikutnya adalah bagaimana caranya menarik \r\nkonsumen untuk mengetahui dan datang ke tempat distribusi tersebut. Di \r\nsinilah membutuhkan yang namanya kampanye/promosi.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;BMC tidak hanya dibuat untuk bisnis yang bersifat komersial saja, \r\nmelainkan bisa digunakan juga untuk organisasi non profit. Maka dari itu\r\n BMC juga menyediakan kolom &lt;strong&gt;customer relationship&lt;/strong&gt;.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Untuk menghasilkan value proposition yang tadi kita siapkan, \r\ndibutuhkan suatu proses dalam internal perusahaan yang disebut dengan &lt;strong&gt;key activities&lt;/strong&gt;.\r\n Adalah aktifitas-aktifitas perusahaan untuk membuat bisnisnya berjalan.\r\n Misal membuat produk, melakukan promosi, dan membuat konten harian.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Dalam aktifitas perusahaan tentunya membutuhkan sumber daya, yang disebut dengan &lt;strong&gt;key resources&lt;/strong&gt;. Bisa berupa sumber daya manusia, mesin, dan alat lainnya yang menjadi sumber daya perusahaan.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Ada beberapa proses yang tidak bisa dilakukan dalam internal \r\nperusahaan. Bisa karena alasan perampingan, meminimalisir resiko, atau \r\njuga untuk mempertahankan kefokusan terhadap kegiatan yang memang \r\nmenjadi potensi bagi perusahaan tersebut. Oleh karena itu, proses yang \r\ntidak bisa dijalankan dalam internal perusahaan dilemparkan keluar atau \r\nbekerjasama dengan pihak luar. Ini yang disebut dengan &lt;strong&gt;key partnership&lt;/strong&gt;. Bentuknya bisa berupa supplier, kontraktor, atau outsourcing.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Bagaimana, paham sampai sini..? Baik, kita lanjutkan.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Uang didapat dari konsumen yang membeli produk kita. Dari sini segala\r\n bentuk penjualan akan menghasilkan omset. Ini disebut dengan &lt;strong&gt;revenue stream&lt;/strong&gt;.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Sedangkan segala biaya yang dikeluarkan, baik biaya untuk \r\nmenghasilkan produk/jasa, biaya aktifitas perusahaan, pembayaran ke key \r\npartner, disebut sebagai &lt;strong&gt;cost structure&lt;/strong&gt;. Biaya internal perusahaan bisa dibagi menjadi 2:&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;1. yang sifatnya tetap, disebut fix cost.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;2. yang tidak tetap, disebut variable cost.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Nah, apakah sudah paham sampai di sini..? Ternyata induk &lt;a href=&quot;https://kirim.email/business-model-canvas/&quot;&gt;konsep BMC &lt;/a&gt;sama dengan framework input output analysis. Beda framework beda istilah, namun sesungguhnya serupa nalarnya.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Jadi, kegiatan apa saja nih yang bisa menambah revenue stream teman-teman..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Semoga bisa dipahami dan bermanfaat. Sampai jumpa di materi berikutnya..&lt;/p&gt;', '2020-11-18', '20170507_0705045.jpg', '2020-11-18', 1),
('PS00003', 'CT0002', 'ADM0000', 'Solusi-untuk-Pola-Kegagalan-Tempat-Wisata', '&lt;p&gt;Banyak tempat pariwisata di Indonesia yang tidak dikemas dengan baik \r\nsehingga menimbulkan pola kegagalan. Salah satunya sering memukul harga \r\nsehingga yang ada di benak kita bahwa makanan yang ada di tempat wisata \r\nya mahal, padahal tidak semua seperti itu. Ini yang membuat rugi bagi \r\npedagang yang menjual murah makanannya. Nah inilah gunanya perlihatkan \r\nharga di depan agar pengunjung tidak was was dan tidak takut untuk \r\nmembeli. Transparansi harga juga sudah banyak diterapkan di daerah \r\nwisata di luar negeri yang membuat pengunjung nyaman saat membeli.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Nah lalu apa solusi taktis yang dapat diterapkan..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;1. Buat alur peta wisata&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Gunanya agar pengunjung tidak bingung dan mendapatkan informasi lebih\r\n mengenai apa saja yang ada di tempat wisata tersebut. Kita juga bisa \r\nmenambahkan keterangan baiknya pengunjung itu mengunjungi tempat mana \r\nterlebih dahulu, disesuaikan keindahan tempatnya sesuai waktu. Misal \r\npagi hari sebaiknya pengunjung ke spot A terlebih dahulu agar dapat \r\nmenikmati sunrise, dan seterusnya.&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;2. Selaraskan semua tema di satu tempat wisata&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Misal tema tempatnya romantic, maka semua hal yang ada di tempat \r\nwisata tersebut harus mengikuti tema yang sudah ditetapkan. Termasuk \r\nsuara music dari tiap warung tidak boleh seenaknya sendiri, melainkan \r\nharus mengikuti tema tempat wisata. Agar pengunjung mendapatkan feel-nya\r\n dari tempat itu sehingga akan terkenang dan ingin berkunjung kembali \r\natau merekomendasikan pada yang lain.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;3.&amp;nbsp; Penataan spot&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Harus dipetakan di luar dan di dalam. Agar pengunjung mengerti ada \r\nspot apa saja dan baik user experience-nya. Ini sebenarnya sudah banyak \r\nditerapkan banyak tempat wisata di Indonesia, hanya perlu penataan lebih\r\n baik saja untuk warung dan pedagangnya.&lt;/p&gt;&lt;p&gt;4. Kuliner di tempat wisata&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Harus diselaraskan dengan tema tempat wisata dan ada transparansi \r\nharga agar pengunjung tidak takut untuk membeli. Kalau bisa jangan ada \r\nmakanan lain di luar tema tempat wisata.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;5. Oleh-olehcfgcf&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Juga harus sesuai tema tempat wisata, juga diedukasi pembuatannya dan\r\n harus dikurasi untuk bisa dijual di tempat tersebut, agar pengunjung \r\ntidak kecewa. Dan kalau bisa oleh-olehnya tidak dijual di tempat lain \r\nagar membuat eksklusifitas dan menciptakan rasa kangen bagi pengunjung.&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Semua ini harus dilakukan oleh siapa..?? Bukan oleh pemerintah saja, melainkan semua yang &lt;a href=&quot;https://www.liputan6.com/lifestyle/read/4180172/solusi-kemenparekraf-dongkrak-pariwisata-yang-anjlok-karena-wabah-virus-corona&quot;&gt;peduli pada daerah wisata Indonesia &lt;/a&gt;bisa\r\n ikut andil dalam hal ini. Misal ibu-ibu PKK, pemuda karang taruna, dan \r\nwarga setempat yang ingin memajukan daerah wisatanya.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Semoga bermanfaat.. &lt;br&gt;&lt;/p&gt;', '2020-12-21', '20170507_0705046.jpg', '2020-12-21', 1);

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
  `ROLE` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `ID_PS` varchar(10) NOT NULL,
  `ID_KLS` int(11) NOT NULL,
  `SERTIFIKAT` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `ID_TAGS` char(10) NOT NULL,
  `NM_TAGS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`ID_TAGS`, `NM_TAGS`) VALUES
('TG0001', 'Kewirausahaan'),
('TG0002', 'Teknologi'),
('TG0003', 'berwirausaha'),
('TG0004', 'Belajar'),
('TG0005', 'sosial'),
('TG0006', 'Milenial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `ID_TOKEN` int(11) NOT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `TOKEN` varchar(100) DEFAULT NULL,
  `DATE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRN` varchar(20) NOT NULL,
  `eID` varchar(225) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `PAYMENT` varchar(13) NOT NULL,
  `BANK` varchar(15) NOT NULL,
  `VA_NUMBER` varchar(50) NOT NULL,
  `TIME` varchar(19) NOT NULL,
  `PDF_GUIDE` text NOT NULL,
  `ID_KLS` int(11) NOT NULL,
  `ID_PS` varchar(10) NOT NULL,
  `STATUS` varchar(3) NOT NULL,
  `EXP_TIME` varchar(19) NOT NULL,
  `TRN_TIME` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRN`, `eID`, `AMOUNT`, `PAYMENT`, `BANK`, `VA_NUMBER`, `TIME`, `PDF_GUIDE`, `ID_KLS`, `ID_PS`, `STATUS`, `EXP_TIME`, `TRN_TIME`) VALUES
('TRN335583569', 'a7232dfd-3b9f-46b0-890f-cbd5662ce509', 150000, 'bank_transfer', 'bri', '120949764042331687', '2020-12-28 09:53:35', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3e922f6d-8801-4d4c-9e43-2f9c499f7570/pdf', 10, 'PS00000001', '200', '2020-12-28 21:53:38', ''),
('TRN372212516', '61368ba0-08fa-4696-b542-e2c6d5950109', 150000, 'bank_transfer', 'bri', '120944784449552255', '2020-12-29 11:55:29', 'https://app.sandbox.midtrans.com/snap/v1/transactions/cfe9cfda-beed-492d-b39c-747f0c6f8bc2/pdf', 10, 'PS00000002', '200', '2020-12-29 23:55:30', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `ID_TG` varchar(10) NOT NULL,
  `ID_MT` int(11) NOT NULL,
  `NM_TG` varchar(20) NOT NULL,
  `DETAIL_TG` varchar(255) DEFAULT NULL,
  `DEADLINE` varchar(20) DEFAULT NULL,
  `FILE_TG` varchar(100) DEFAULT NULL,
  `ICON_TG` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`ID_TG`, `ID_MT`, `NM_TG`, `DETAIL_TG`, `DEADLINE`, `FILE_TG`, `ICON_TG`) VALUES
('TG00001', 7, 'Tugas day 1', 'Tugas day 1<br>', '2020-12-28', 'lt.docx', 'fas fa-file-word');

-- --------------------------------------------------------

--
-- Struktur dari tabel `webinar`
--

CREATE TABLE `webinar` (
  `ID_WEBINAR` char(10) NOT NULL,
  `JUDUL_WEBINAR` varchar(100) NOT NULL,
  `KONTEN_WEB` varchar(1000) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `FOTO_WEBINAR` varchar(100) NOT NULL,
  `HARGA` varchar(20) NOT NULL,
  `PLATFORM` varchar(20) NOT NULL,
  `TGL_WEB` varchar(20) NOT NULL,
  `TGL_POSTWEB` varchar(20) DEFAULT NULL,
  `ST_POSTWEB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `webinar`
--

INSERT INTO `webinar` (`ID_WEBINAR`, `JUDUL_WEBINAR`, `KONTEN_WEB`, `ID_ADM`, `FOTO_WEBINAR`, `HARGA`, `PLATFORM`, `TGL_WEB`, `TGL_POSTWEB`, `ST_POSTWEB`) VALUES
('WB00001', 'Kiat-Mudah-Memetakan-Profil-Calon-Konsumen-Untuk-Wirausaha-Pemula-dan-UMKM', '&lt;p&gt;Halo Sobat Preneur Academy!&lt;br&gt;&lt;br&gt;GRATIS! GRATIS! GRATIS!&lt;br&gt;Webinar Kejar (Kelas Belajar) #07 bareng Dosen Wirausaha dengan tema “Kiat Mudah Melejitkan Profit Usaha di Masa Pandemi Covid-19 Untuk Wirausaha Pemula dan UMKM&quot;&lt;br&gt;&lt;br&gt;Pembicara:&lt;br&gt;Agus Hadi Prayitno, S.Pt., M.Sc., CPC.&lt;br&gt;Penggerak Wirausaha Mahasiswa&lt;br&gt;@DOSENWIRAUSAHA&lt;br&gt;&lt;br&gt;Sabtu, 25 Juli 2020&lt;br&gt;Pukul 10.00 WIB - Selesai&lt;br&gt;at Zoom Meeting&lt;br&gt;&lt;br&gt;Webinar Kejar #07 kali ini diperuntukkan bagi siapa saja yang ingin belajar berwirausaha!&lt;br&gt;TERBATAS 98 PESERTA jadi hanya untuk yang benar-benar KOMITMEN, SERIUS, dan SUNGGUH-SUNGGUH saja.&lt;br&gt;&lt;br&gt;Daftar Sekarang di bit.ly/Kejar07&lt;br&gt;&lt;br&gt;AKHIR PENDAFTARAN&lt;br&gt;Jumat, 24 Juli 2020&lt;br&gt;Pukul 12.00 WIB&lt;br&gt;&lt;br&gt;Support by&lt;br&gt;@sambalperawan&lt;br&gt;@pelatihmahasiswa&lt;br&gt;@naminaunainstitute&lt;br&gt;&lt;br&gt;Salam @Preneu', 'ADM0000', '117648962_293344278395938_1882014996043032884_n.jpg', 'GRATIS', 'ZOOM', '2020-12-21', '2020-12-20', 1),
('WB00002', 'Kiat-Mudah-Membuat-Laporan-Keuangan-Usaha-Untuk-Wirausaha-Pemula-dan-UMKM', '&lt;p&gt;Halo Sobat Preneur Academy!&lt;br&gt;&lt;br&gt;GRATIS! GRATIS! GRATIS!&lt;br&gt;Webinar Kejar (Kelas Belajar) #07 bareng Dosen Wirausaha dengan tema “Kiat Mudah Membuat Laporan Keuangan Usaha Untuk Wirausaha Pemula dan UMKM&quot;&lt;br&gt;&lt;br&gt;Pembicara:&lt;br&gt;Agus Hadi Prayitno, S.Pt., M.Sc., CPC.&lt;br&gt;Penggerak Wirausaha Mahasiswa&lt;br&gt;@DOSENWIRAUSAHA&lt;br&gt;&lt;br&gt;Sabtu, 25 Juli 2020&lt;br&gt;Pukul 10.00 WIB - Selesai&lt;br&gt;at Zoom Meeting&lt;br&gt;&lt;br&gt;Webinar Kejar #07 kali ini diperuntukkan bagi siapa saja yang ingin belajar berwirausaha!&lt;br&gt;TERBATAS 98 PESERTA jadi hanya untuk yang benar-benar KOMITMEN, SERIUS, dan SUNGGUH-SUNGGUH saja.&lt;br&gt;&lt;br&gt;Daftar Sekarang di bit.ly/Kejar07&lt;br&gt;&lt;br&gt;AKHIR PENDAFTARAN&lt;br&gt;Jumat, 24 Juli 2020&lt;br&gt;Pukul 12.00 WIB&lt;br&gt;&lt;br&gt;Support by&lt;br&gt;@sambalperawan&lt;br&gt;@pelatihmahasiswa&lt;br&gt;@naminaunainstitute&lt;br&gt;&lt;br&gt;Salam @PreneurAcademy&lt;br&gt;', 'ADM0000', '116794690_2656215407971837_3854303747453443182_n.jpg', 'GRATIS', 'ZOOM', '2020-12-22', '2020-12-20', 1),
('WB00003', 'Kiat-Sukses-Mengajukan-Proposal-Kompetisi-Inovasi-Bisnis-Mahasiswa-(KIBM)-2020', '&lt;p&gt;Halo Sobat Preneur Academy!&lt;br&gt;&lt;br&gt;GRATIS! GRATIS! GRATIS!&lt;br&gt;Webinar\r\n Kejar (Kelas Belajar) #07 bareng Dosen Wirausaha dengan tema “Kiat \r\nMudah Membuat Laporan Keuangan Usaha Untuk Wirausaha Pemula dan UMKM&quot;&lt;br&gt;&lt;br&gt;Pembicara:&lt;br&gt;Agus Hadi Prayitno, S.Pt., M.Sc., CPC.&lt;br&gt;Penggerak Wirausaha Mahasiswa&lt;br&gt;@DOSENWIRAUSAHA&lt;br&gt;&lt;br&gt;Sabtu, 25 Juli 2020&lt;br&gt;Pukul 10.00 WIB - Selesai&lt;br&gt;at Zoom Meeting&lt;br&gt;&lt;br&gt;Webinar Kejar #07 kali ini diperuntukkan bagi siapa saja yang ingin belajar berwirausaha!&lt;br&gt;TERBATAS 98 PESERTA jadi hanya untuk yang benar-benar KOMITMEN, SERIUS, dan SUNGGUH-SUNGGUH saja.&lt;br&gt;&lt;br&gt;Daftar Sekarang di bit.ly/Kejar07&lt;br&gt;&lt;br&gt;AKHIR PENDAFTARAN&lt;br&gt;Jumat, 24 Juli 2020&lt;br&gt;Pukul 12.00 WIB&lt;br&gt;&lt;br&gt;Support by&lt;br&gt;@sambalperawan&lt;br&gt;@pelatihmahasiswa&lt;br&gt;@naminaunainstitute&lt;br&gt;&lt;br&gt;Salam @PreneurAcademy&lt;br', 'ADM0000', '116040751_758765054895898_4284268374168521207_n.jpg', 'GRATIS', 'ZOOM', '2020-12-23', '2020-12-20', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADM`),
  ADD KEY `FK_ROLE_ADM` (`ID_ROLE`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_CT`);

--
-- Indeks untuk tabel `detail_fasilitas_kls`
--
ALTER TABLE `detail_fasilitas_kls`
  ADD KEY `ID_FA` (`ID_FA`),
  ADD KEY `ID_KLS` (`ID_KLS`);

--
-- Indeks untuk tabel `detail_fasilitas_wbnr`
--
ALTER TABLE `detail_fasilitas_wbnr`
  ADD KEY `ID_FA` (`ID_FA`),
  ADD KEY `ID_WEBINAR` (`ID_WEBINAR`);

--
-- Indeks untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD KEY `FK_MENGIKUTI2` (`ID_PS`),
  ADD KEY `ID_TRN` (`ID_TRN`),
  ADD KEY `ID_KLS` (`ID_KLS`);

--
-- Indeks untuk tabel `detail_materi`
--
ALTER TABLE `detail_materi`
  ADD PRIMARY KEY (`ID_KLS`,`ID_MT`),
  ADD KEY `FK_MEMILIKI2` (`ID_MT`);

--
-- Indeks untuk tabel `detail_tags`
--
ALTER TABLE `detail_tags`
  ADD PRIMARY KEY (`ID_POST`,`ID_TAGS`),
  ADD KEY `FK_R_TAGS2` (`ID_TAGS`);

--
-- Indeks untuk tabel `detil_tugas`
--
ALTER TABLE `detil_tugas`
  ADD PRIMARY KEY (`ID_PS`,`ID_TG`),
  ADD KEY `FK_MENGUMPULKAN2` (`ID_TG`),
  ADD KEY `ID_MT` (`ID_MT`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`ID_DISKON`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`ID_FA`);

--
-- Indeks untuk tabel `kebijakan`
--
ALTER TABLE `kebijakan`
  ADD PRIMARY KEY (`ID_KB`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KLS`),
  ADD KEY `FK_DISKON` (`ID_DISKON`),
  ADD KEY `FK_KTG_KELAS` (`ID_KTGKLS`),
  ADD KEY `FK_MENGAJAR` (`ID_ADM`);

--
-- Indeks untuk tabel `key`
--
ALTER TABLE `key`
  ADD PRIMARY KEY (`ID_KEY`);

--
-- Indeks untuk tabel `ktg_kelas`
--
ALTER TABLE `ktg_kelas`
  ADD PRIMARY KEY (`ID_KTGKLS`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`ID_MT`);

--
-- Indeks untuk tabel `materi_sub`
--
ALTER TABLE `materi_sub`
  ADD PRIMARY KEY (`ID_SUB`);

--
-- Indeks untuk tabel `medsos`
--
ALTER TABLE `medsos`
  ADD PRIMARY KEY (`ID_MS`);

--
-- Indeks untuk tabel `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`ID_NV`);

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`ID_NOT`),
  ADD KEY `GLOBAL_ID` (`GLOBAL_ID`),
  ADD KEY `ID_PS` (`ID_US`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`ID_PS`),
  ADD KEY `FK_ROLE_PS` (`ID_ROLE`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_POST`),
  ADD KEY `FK_KATEGORI` (`ID_CT`),
  ADD KEY `FK_MEMPOSTING` (`ID_ADM`);

--
-- Indeks untuk tabel `post_view`
--
ALTER TABLE `post_view`
  ADD PRIMARY KEY (`ID_VIEW`),
  ADD KEY `FK_POST_VIEW` (`ID_POST`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD KEY `ID_PS` (`ID_PS`),
  ADD KEY `ID_KLS` (`ID_KLS`);

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
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRN`),
  ADD KEY `ID_KLS` (`ID_KLS`),
  ADD KEY `ID_PS` (`ID_PS`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`ID_TG`),
  ADD KEY `FK_BERISI` (`ID_MT`);

--
-- Indeks untuk tabel `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`ID_WEBINAR`),
  ADD KEY `ID_ADM` (`ID_ADM`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `ID_DISKON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kebijakan`
--
ALTER TABLE `kebijakan`
  MODIFY `ID_KB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `ID_KLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `key`
--
ALTER TABLE `key`
  MODIFY `ID_KEY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ktg_kelas`
--
ALTER TABLE `ktg_kelas`
  MODIFY `ID_KTGKLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `ID_MT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `materi_sub`
--
ALTER TABLE `materi_sub`
  MODIFY `ID_SUB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `medsos`
--
ALTER TABLE `medsos`
  MODIFY `ID_MS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `navbar`
--
ALTER TABLE `navbar`
  MODIFY `ID_NV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `ID_NOT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `ID_TOKEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
