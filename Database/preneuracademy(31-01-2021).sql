-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2021 pada 08.20
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
('ADM0000', 1, 'citations.jpg', 'Agus Hadi Prayitno', '089775667775', 'Solo, Jawa Tengah.', 'turtleninjaaa77@gmail.com', '$2y$10$CErvm3MQmegZODzHduV8N.SqIvz3ln.R68qj/voLjI2UT/IqwULnu', 1, '0', '1609248318', '1609248345');

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
('CT0006', 'Kewirausahaan'),
('CT0007', 'Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `ID_KLS` varchar(10) NOT NULL,
  `ID_PS` varchar(10) NOT NULL,
  `ID_TRN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_kelas`
--

INSERT INTO `detail_kelas` (`ID_KLS`, `ID_PS`, `ID_TRN`) VALUES
('KL00000001', 'PS00000001', 'TRN321143734');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_materi`
--

CREATE TABLE `detail_materi` (
  `ID_KLS` varchar(10) NOT NULL,
  `ID_MT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_materi`
--

INSERT INTO `detail_materi` (`ID_KLS`, `ID_MT`) VALUES
('KL00000001', 11);

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
('PS00004', 'TG0002'),
('PS00005', 'TG0003'),
('PS00005', 'TG0004'),
('PS00006', 'TG0005'),
('PS00006', 'TG0006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_tugas`
--

CREATE TABLE `detil_tugas` (
  `ID_PS` varchar(10) NOT NULL,
  `ID_TG` varchar(10) NOT NULL,
  `ID_MT` int(11) NOT NULL,
  `FILE_DT_TG` varchar(100) NOT NULL,
  `TIME_DT_TG` varchar(20) NOT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ID_KLS` varchar(10) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `ID_KTGKLS` int(11) NOT NULL,
  `ID_DISKON` int(11) NOT NULL,
  `TITTLE` varchar(200) DEFAULT NULL,
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

INSERT INTO `kelas` (`ID_KLS`, `ID_ADM`, `ID_KTGKLS`, `ID_DISKON`, `TITTLE`, `GBR_KLS`, `DESKRIPSI`, `PRICE`, `STAT`, `DATE_KLS`, `UPDATE_KLS`, `LOK_KLS`, `TGL_PENDAFTARAN`, `TGL_PENUTUPAN`, `TGL_MULAI`, `TGL_SELESAI`, `HARI`, `JAM_MULAI`, `JAM_SELESAI`) VALUES
('KL00000001', 'ADM0000', 1, 0, 'Strategi Bisnis Lewat Sosial Media', 'default.jpg', 'Tahukah kamu sosial media ternayata bisa digunakan sebagai ladang bisnis.', 150000, '1', 1610362651, 0, 'Online Class', '2021-01-16 08:00', '2021-01-31 23:59', '2021-02-05', '2021-02-28', '3 Hari (Senin-Rabu)', '09:00', '10:00'),
('KL00000002', 'ADM0000', 2, 0, 'Teknik Manajemen Keuangan Usaha', 'default.jpg', 'Kelas ini berisi cara-cara dalam memanjemen keuangan usaha anda.', 200000, '1', 1610363544, 0, 'Online Class', '2021-01-15 08:00', '2021-01-24 23:59', '2021-02-01', '2021-02-20', '5 Hari (Senin-Jumat)', '10:00', '11:30'),
('KL00000003', 'ADM0000', 1, 0, 'Wirausaha Dasar Bagi Pemula', 'default.jpg', 'Kelas yang cocok bagi pemula, yang ingin terjun ke dunia bisnis.', 150000, '1', 1610819651, 0, 'Online Class', '2021-01-18 00:00', '2021-01-23 00:00', '2021-02-01', '2021-02-28', '3 Hari (Senin-Rabu)', '08:00', '09:00');

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
(1, 'Kelas Dasar', 1610362500, 0),
(2, 'Kelas Lanjutan', 1610362500, 0);

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
(11, 'BAB 1 Pengenalan', '<p>Pengenalan Bisnis</p>');

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
(15, 11, 'Apa Itu Sosial Media', '', '(E41181716)Listening_Section_about_New_Normal_and_Working_from_Home.doc', 'fas fa-file-word'),
(16, 11, 'Link Pertemuan 1', 'Link meeting', '&lt;p&gt;bit.ly/pertemuan1&lt;/p&gt;', 'fas fa-link');

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
(15, 'PS00000002', 'PS00000002', 'Selamat datang!', 'Selamat bergabung di Preneur Academy', 'peserta/profil', '0', '1', '2020-12-28 23:29:47'),
(18, '61368ba0-08fa-4696-b542-e2c6d5950109', 'PS00000002', 'Transaksi berhasil', 'Order id TRN372212516', 'peserta/transaksi/dettrn/61368ba0-08fa-4696-b542-e2c6d5950109', '1', '1', '2020-12-29 11:55:29'),
(33, '01eacad7-5afe-4555-b440-4ccf62f51af5', 'PS00000001', 'Transaksi berhasil', 'Order id TRN321143734', 'peserta/transaksi/dettrn/01eacad7-5afe-4555-b440-4ccf62f51af5', '0', '1', '2021-01-17 00:46:26');

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

INSERT INTO `peserta` (`ID_PS`, `ID_ROLE`, `FTO_PS`, `NM_PS`, `JK_PS`, `AGAMA_PS`, `PEKERJAAN`, `HP_PS`, `ALMT_PS`, `EMAIL_PS`, `PSW_PS`, `ACTIVE`, `DATE_CREATE`, `STATUS_BELI`) VALUES
('PS00000001', 2, 'default.jpg', 'Alex Raymond', 'Laki-laki', 'Islam', 'Pelajar/Mahasiswa', '089776887776', 'Jl. Mastrip, Krajan Timur, Sumbersari, Jember, Jawa Timur 68121', 'kurak4647@gmail.com', '$2y$10$gme2DS9.96MadaBiedb9u.dRRCnCOkFWu6h0ddNxs8Dp5gc2WEqy.', '1', '1609252149', 201);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_wbnr`
--

CREATE TABLE `peserta_wbnr` (
  `ID_WEBINAR` varchar(10) NOT NULL,
  `ID_PS` varchar(10) NOT NULL,
  `ALASAN` varchar(1000) NOT NULL,
  `DATE_PS_WBNR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('PS00004', 'CT0002', 'ADM0000', 'Bagaimana-Caranya-Membuat-Konten-yang-Viral', '<p><span></span></p><p>Banyak para mastah iklan yang sekarang berlomba membuat konten viral \r\nuntuk bisa menghemat biaya iklan. Apalagi sekarang fb ads dan iklan \r\nberbayar lainnya mulai dikenakan pajak 10% dan langsung ditarik dari \r\nbudget iklan kita loh.</p>\r\n\r\n\r\n\r\n<p><em>“Gimana ya caranya viralin konten kita, biar bisa jangkau banyak orang secara organik alias tanpa ads berbayar..??”</em></p>\r\n\r\n\r\n\r\n<p>Mas Fardi Yandi founder dari Social Kreatif kupas tuntas hal tersebut\r\n di YEA Class yang berjudul the Science of being Viral, Sabtu kemarin. \r\nTernyata konten viral itu bisa kita buat loh dan ada polanya. Tahukah \r\nsobat eagles, konten yang dibuat oleh Mas Fardi Yandi ini sudah \r\nmenjangkau ratusan ribu reach secara organik tanpa ads berbayar.</p>\r\n\r\n\r\n\r\n<p>Waduh, kebayang gak berapa juta tuh kalau pake fb ads buat menjangkau ratusan ribu orang..?? </p>\r\n\r\n\r\n\r\n<p>Nah makanya kita bahas ini kemarin karena dengan konten viral kita \r\nbisa menghemat biaya iklan yang jutaan tadi. Kan lumayan uangnya bisa \r\nkita alokasikan untuk keperluan yang lain.</p>\r\n\r\n\r\n\r\n<p>Ok, jadi gimana caranya..? </p>\r\n\r\n\r\n\r\n<p>Sebelum dibahas, kita ubah dulu persepsi viral menjadi ‘bisa \r\ndijangkau banyak orang’. Jadi, bagaimana caranya agar konten kita bisa \r\ndijangkau banyak orang tanpa ads..?</p>\r\n\r\n\r\n\r\n<p>Perlu diingat, bahwa viral itu butuh proses dalam menemukan pola \r\nviralnya. Beda bisnis, beda tujuan, beda target pasar, tentu berbeda \r\njuga cara jangkaunya. Dan dalam pembahasan ini kita batasi viral hanya \r\ndengan cara yang positif saja ya, baik itu di <a href=\"https://yea-indonesia.com/2020/10/26/instagram-versus-tiktok-better-mana-sih/\">instagram maupun tiktok</a>. </p>\r\n\r\n\r\n\r\n<p>Stepnya:</p>\r\n\r\n\r\n\r\n<p><strong>1. Purpose</strong></p>\r\n\r\n\r\n\r\n<p>Jangan mulai dari how to, mulai dari WHY. Mengapa konten kita harus \r\nviral, mengapa saya bangun bisnis ini, mengapa saya buat konten ini, \r\nmengapa saya posting hal ini, dan ‘why’ lainnya yang bisa menjadi \r\nfondasi dari bisnis atau konten kita. Karena tidak setiap saat postingan\r\n kita akan selalu di like banyak orang. Mungkin satu atau dua bulan kita\r\n masih dalam spirit atau semangat yang kuat, tapi dalam bulan ketiga \r\njika masih tidak ada yang like apakah kita akan terus melanjutkan bisnis\r\n atau posting konten kita..? Nah ‘why’ yang kuatlah yang akan \r\nmengingatkan kita atau menjadi trigger bagi kita untuk tetap membuat \r\nkonten dan melanjutkan bisnis kita.</p>\r\n\r\n\r\n\r\n<p><strong>2. Konsep</strong></p>\r\n\r\n\r\n\r\n<p>Ok, jika sudah punya purpose maka selanjutnya kita harus mengetahui konsep atau anatomy of viral content. Terdiri dari 2 yaitu:</p>\r\n\r\n\r\n\r\n<p>–        Konten yang worth untuk di-shared oleh orang lain à ada 1 \r\nchannel marketing yang masih berlaku dan terpercaya dari jaman nenek \r\nmoyang hingga sekarang, yaitu MLM alias dari mulut ke mulut. Ketika ada \r\npostingan story teman kita yang menurut kita ‘gue banget nih’, kita \r\ncenderung ingin share postingan tersebut. Ada satu psikologi manusia \r\nyang bersifat mengikuti sesuatu yang dilakukan oleh orang terdekat atau \r\norang kebanyakan. Di sinilah awal dari proses viralnya suatu konten. \r\nJadi, apakah konten kita layak untuk dishare oleh orang lain..?</p>\r\n\r\n\r\n\r\n<p>–        Konten yang terbuka untuk semua orang à konten yang harus \r\nbisa dipahami atau relate dengan semua orang. Jika kita perhatikan saat \r\nini banyak orang membuat konten microblog dengan istilah atau kata-kata \r\nyang hanya dimengerti oleh orang/kalangan tertentu, padahal ini hanya \r\nakan memperkecil kemungkinan share atau jangkauan. Dan konten yang lebih\r\n membumi atau relate dengan kebanyakan netizen justru ini yang membuka \r\npeluang menuju viral.</p>\r\n\r\n\r\n\r\n<p>Banyak orang posting tentang prestasi yang telah diraih. Tapi \r\nbagaimana jika posting tentang ‘bagaimana caranya agar kamu juga bisa \r\nberprestasi atau mendapatkan beasiswa a’ misalkan. Tentu akan jauh lebih\r\n tinggi share dan saved nya karena orang lain mendapatkan benefit dari \r\npostingan kita.</p>\r\n\r\n\r\n\r\n<p><strong>3 faktor yang membuat sebuah <a href=\"https://medium.com/@fattul/10-menit-membuat-konten-yang-mudah-tersebar-di-medsos-konten-viral-dfc60af6dea4\">konten bisa menjadi viral:</a></strong></p>\r\n\r\n\r\n\r\n<p>1.  Konten yang membangkitkan emosi: sedih, marah, bahagia, humor, \r\nharu, menyentuh. Angkat isu atau suatu trend dan kaitkan dengan bisnis \r\natau konten kita.</p>\r\n\r\n\r\n\r\n<p>2.  Konten yang menyampaikan pesan positif: harus sesuai dengan value kita.</p>\r\n\r\n\r\n\r\n<p>3.  Konten yang mengajarkan sesuatu: tips, DIY, ilmu terapan</p>\r\n\r\n\r\n\r\n<p><strong>Yuk ikuti rules-nya:</strong></p>\r\n\r\n\r\n\r\n<p># Social currency = orang lain senang membicarakan hal yang membuat mereka terlihat pintar.</p>\r\n\r\n\r\n\r\n<p># Keresahan = hal – hal sederhana yang belum bisa diungkapkan netizen, kita ungkapkan menjadi sebuah konten</p>\r\n\r\n\r\n\r\n<p># Emotion = Kalau kamu peduli, kamu pasti akan share tentang hal ini</p>\r\n\r\n\r\n\r\n<p># General Issue = Semakin umum sesuatu, maka semakin besar kesempatan\r\n untuk dibagikan ke orang lain. Gimana caranya buat tahu trend..? main \r\ntwitter, baca medium.</p>\r\n\r\n\r\n\r\n<p># Practical value = hal – hal praktikal yang berguna untuk orang sekitar</p>\r\n\r\n\r\n\r\n<p># Building stories = cerita yang belum mampu orang sampaikan, tapi mampu kita sampaikan</p>\r\n\r\n\r\n\r\n<p><strong>Quick tips:</strong></p>\r\n\r\n\r\n\r\n<p>Pakai Instagram = grabbing attention with visual, consuming time duration, hashtag</p>\r\n\r\n\r\n\r\n<p>Pakai tik tok = grabbing attention with audio, words, or the visual. 2 detik pertama, hashtag</p><p></p>', '2020-12-22', 'CIMG0083.jpg', '2020-12-22', 1),
('PS00005', 'CT0006', 'ADM0000', 'Cara-Mudah-Memahami-Bisnis-Model-Canvas', '<p><span><p>Apakah kamu sering dengar istilah business model canvas atau business model generation..?</p>\r\n\r\n\r\n\r\n<p>Business model generation, suatu buku karangan Alexander Osterwalder \r\ndan kawan-kawannya yang sebagian besarnya adalah doctor dan professor di\r\n bidang manajemen. Menurut saya buku ini adalah buku yang terbaik dalam \r\n10 tahun terakhir ini. Hanya saja, bagi orang awam memang tidak mudah \r\nuntuk memahaminya dalam waktu singkat.</p>\r\n\r\n\r\n\r\n<p>Oleh karena itu saya akan berusaha untuk menjelaskan dengan waktu \r\nyang sangat singkat agar kita semua terutama yang awam untuk bisa \r\nmemahami Business Model Canvas (BMC).</p>\r\n\r\n\r\n\r\n<p>Saya akan menggunakan pendekatan yang disebut dengan input output \r\nanalysis. Bagi saya input ouput analysis adalah induknya framework, \r\nkarena bisa digunakan tidak hanya untuk bisnis saja. Saya mendapatkan \r\nframe work ini justru dari sekolah teknik elektro dimana saya sekolah \r\ndulu.<strong><br></strong></p><p><strong><br></strong>Nah apa sih input output analysis itu..?\r\n\r\n\r\n\r\n</p><p>Pada dasarnya terdiri dari 3 bagian yaitu input, proses, dan output. \r\nKalau dalam bisnis mungkin kita sering mendengar istilah hulu ke hilir, \r\ndimana hulu sebagai input, hilir sebagai output, dan perusahaan sebagai \r\nproses.</p>\r\n\r\n\r\n\r\n<p>1. Hulu</p>\r\n\r\n\r\n\r\n<p>Di sini kita akan menemui yang namanya supplier, kontraktor, petani, atau penambang.</p>\r\n\r\n\r\n\r\n<p>2. Perusahaan</p>\r\n\r\n\r\n\r\n<p>Tentunya di sini kita akan menemukan semua proses yang mengolah semua\r\n bahan dari hulu tadi untuk dibuat suatu produk baru yang diinginkan. \r\nPerusahaan itu bisa berupa manajemen, atau business owner yang punya \r\nsuatu bisnis, atau bisa jadi berupa tempat produksi.</p>\r\n\r\n\r\n\r\n<p>3. Hilir</p>\r\n\r\n\r\n\r\n<p>Di sini ujung dari sampainya produk yang telah diolah tadi, bisa \r\nberupa konsumen, toko eceran, dan tempat lainnya yang menerima atau \r\nmembeli produk yang telah diolah tadi.</p>\r\n\r\n\r\n\r\n<p>Jika air mengalirnya dari hulu ke hilir, maka dalam bisnis terjadi \r\nsebaliknya. Uang tentunya akan mengalir dari hilir/konsumen ke \r\nperusahaan (keluar dalam bentuk operasional cost), baru kemudian ke \r\nhulu/supplier.</p>\r\n\r\n\r\n\r\n<p>Selisih dari pemasukan dan pengeluaran menjadi keuntungan. Atau bisa \r\njuga terjadi kerugian jika pengeluaran lebih tinggi daripada pemasukan. \r\nItu yang disebut dengan laba rugi.</p>\r\n\r\n\r\n\r\n<p>Apa korelasinya BMC dan input output analysis..?</p>\r\n\r\n\r\n\r\n<p>Kita mulai dari hilir yaitu permintaan pasar/konsumen. Siapa yang sebenarnya menjadi target pasar kita. itu disebut sebagai <strong>customer segmen</strong> dalam BMC.</p>\r\n\r\n\r\n\r\n<ul><li>Apa yang mereka butuhkan..?</li><li>Masalah apa yang akan kita selesaikan..?</li><li>Apa keunggulan atau diferensiasi kita dari kompetitor..?</li></ul>\r\n\r\n\r\n\r\n<p>Jawaban pertanyaan ini akan memperbaiki output atau produk yang \r\nkeluar sehingga mempunyai diferensiasi yang kuat. Inilah yang disebut \r\ndengan <strong>value proposition</strong> dalam BMC. Bisnis bisa dimulai dalam skala kecil dengan mendeliver value proposition tersebut ke tempat customer.</p>\r\n\r\n\r\n\r\n<p>Tapi pada saat kita ingin melebarkan bisnis, maka kita akan membutuhkan saluran distribusi. Itulah yang disebut dengan <strong>channel distribution</strong> dalam BMC.</p>\r\n\r\n\r\n\r\n<p>Setelah kita mendistribusikan produk ke titik-titik terdekat dari \r\nkonsumen, permasalahan berikutnya adalah bagaimana caranya menarik \r\nkonsumen untuk mengetahui dan datang ke tempat distribusi tersebut. Di \r\nsinilah membutuhkan yang namanya kampanye/promosi.</p>\r\n\r\n\r\n\r\n<p>BMC tidak hanya dibuat untuk bisnis yang bersifat komersial saja, \r\nmelainkan bisa digunakan juga untuk organisasi non profit. Maka dari itu\r\n BMC juga menyediakan kolom <strong>customer relationship</strong>.</p>\r\n\r\n\r\n\r\n<p>Untuk menghasilkan value proposition yang tadi kita siapkan, \r\ndibutuhkan suatu proses dalam internal perusahaan yang disebut dengan <strong>key activities</strong>.\r\n Adalah aktifitas-aktifitas perusahaan untuk membuat bisnisnya berjalan.\r\n Misal membuat produk, melakukan promosi, dan membuat konten harian.</p>\r\n\r\n\r\n\r\n<p>Dalam aktifitas perusahaan tentunya membutuhkan sumber daya, yang disebut dengan <strong>key resources</strong>. Bisa berupa sumber daya manusia, mesin, dan alat lainnya yang menjadi sumber daya perusahaan.</p>\r\n\r\n\r\n\r\n<p>Ada beberapa proses yang tidak bisa dilakukan dalam internal \r\nperusahaan. Bisa karena alasan perampingan, meminimalisir resiko, atau \r\njuga untuk mempertahankan kefokusan terhadap kegiatan yang memang \r\nmenjadi potensi bagi perusahaan tersebut. Oleh karena itu, proses yang \r\ntidak bisa dijalankan dalam internal perusahaan dilemparkan keluar atau \r\nbekerjasama dengan pihak luar. Ini yang disebut dengan <strong>key partnership</strong>. Bentuknya bisa berupa supplier, kontraktor, atau outsourcing.</p>\r\n\r\n\r\n\r\n<p>Bagaimana, paham sampai sini..? Baik, kita lanjutkan.</p>\r\n\r\n\r\n\r\n<p>Uang didapat dari konsumen yang membeli produk kita. Dari sini segala\r\n bentuk penjualan akan menghasilkan omset. Ini disebut dengan <strong>revenue stream</strong>.</p>\r\n\r\n\r\n\r\n<p>Sedangkan segala biaya yang dikeluarkan, baik biaya untuk \r\nmenghasilkan produk/jasa, biaya aktifitas perusahaan, pembayaran ke key \r\npartner, disebut sebagai <strong>cost structure</strong>. Biaya internal perusahaan bisa dibagi menjadi 2:</p>\r\n\r\n\r\n\r\n<p>1. yang sifatnya tetap, disebut fix cost.</p>\r\n\r\n\r\n\r\n<p>2. yang tidak tetap, disebut variable cost.</p>\r\n\r\n\r\n\r\n<p>Nah, apakah sudah paham sampai di sini..? Ternyata induk <a href=\"https://kirim.email/business-model-canvas/\">konsep BMC </a>sama dengan framework input output analysis. Beda framework beda istilah, namun sesungguhnya serupa nalarnya.</p>\r\n\r\n\r\n\r\n<p>Jadi, kegiatan apa saja nih yang bisa menambah revenue stream teman-teman..?</p>\r\n\r\n\r\n\r\n<p>Semoga bisa dipahami dan bermanfaat. Sampai jumpa di materi berikutnya..</p></span></p>', '2020-12-22', 'CIMG0083.jpg', '2020-12-22', 1),
('PS00006', 'CT0005', 'ADM0000', 'Solusi-Untuk-Kegagalan-Pola-Tempat-Wisata', '<p>Banyak tempat pariwisata di Indonesia yang tidak dikemas dengan baik \r\nsehingga menimbulkan pola kegagalan. Salah satunya sering memukul harga \r\nsehingga yang ada di benak kita bahwa makanan yang ada di tempat wisata \r\nya mahal, padahal tidak semua seperti itu. Ini yang membuat rugi bagi \r\npedagang yang menjual murah makanannya. Nah inilah gunanya perlihatkan \r\nharga di depan agar pengunjung tidak was was dan tidak takut untuk \r\nmembeli. Transparansi harga juga sudah banyak diterapkan di daerah \r\nwisata di luar negeri yang membuat pengunjung nyaman saat membeli.</p>\r\n\r\n\r\n\r\n<p>Nah lalu apa solusi taktis yang dapat diterapkan..?</p>\r\n\r\n\r\n\r\n<p>1. Buat alur peta wisata</p>\r\n\r\n\r\n\r\n<p>Gunanya agar pengunjung tidak bingung dan mendapatkan informasi lebih\r\n mengenai apa saja yang ada di tempat wisata tersebut. Kita juga bisa \r\nmenambahkan keterangan baiknya pengunjung itu mengunjungi tempat mana \r\nterlebih dahulu, disesuaikan keindahan tempatnya sesuai waktu. Misal \r\npagi hari sebaiknya pengunjung ke spot A terlebih dahulu agar dapat \r\nmenikmati sunrise, dan seterusnya.&nbsp;</p>\r\n\r\n\r\n\r\n<p>2. Selaraskan semua tema di satu tempat wisata</p>\r\n\r\n\r\n\r\n<p>Misal tema tempatnya romantic, maka semua hal yang ada di tempat \r\nwisata tersebut harus mengikuti tema yang sudah ditetapkan. Termasuk \r\nsuara music dari tiap warung tidak boleh seenaknya sendiri, melainkan \r\nharus mengikuti tema tempat wisata. Agar pengunjung mendapatkan feel-nya\r\n dari tempat itu sehingga akan terkenang dan ingin berkunjung kembali \r\natau merekomendasikan pada yang lain.</p>\r\n\r\n\r\n\r\n<p>3.&nbsp; Penataan spot</p>\r\n\r\n\r\n\r\n<p>Harus dipetakan di luar dan di dalam. Agar pengunjung mengerti ada \r\nspot apa saja dan baik user experience-nya. Ini sebenarnya sudah banyak \r\nditerapkan banyak tempat wisata di Indonesia, hanya perlu penataan lebih\r\n baik saja untuk warung dan pedagangnya.</p><p>4. Kuliner di tempat wisata</p>\r\n\r\n\r\n\r\n<p>Harus diselaraskan dengan tema tempat wisata dan ada transparansi \r\nharga agar pengunjung tidak takut untuk membeli. Kalau bisa jangan ada \r\nmakanan lain di luar tema tempat wisata.</p>\r\n\r\n\r\n\r\n<p>5. Oleh-olehcfgcf</p>\r\n\r\n\r\n\r\n<p>Juga harus sesuai tema tempat wisata, juga diedukasi pembuatannya dan\r\n harus dikurasi untuk bisa dijual di tempat tersebut, agar pengunjung \r\ntidak kecewa. Dan kalau bisa oleh-olehnya tidak dijual di tempat lain \r\nagar membuat eksklusifitas dan menciptakan rasa kangen bagi pengunjung.&nbsp;</p>\r\n\r\n\r\n\r\n<p>Semua ini harus dilakukan oleh siapa..?? Bukan oleh pemerintah saja, melainkan semua yang <a href=\"https://www.liputan6.com/lifestyle/read/4180172/solusi-kemenparekraf-dongkrak-pariwisata-yang-anjlok-karena-wabah-virus-corona\">peduli pada daerah wisata Indonesia </a>bisa\r\n ikut andil dalam hal ini. Misal ibu-ibu PKK, pemuda karang taruna, dan \r\nwarga setempat yang ingin memajukan daerah wisatanya.</p>\r\n\r\n\r\n\r\n<p>Semoga bermanfaat.. </p>', '2020-12-22', 'CIMG0083.jpg', '2020-12-22', 0);

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
  `ID_KLS` varchar(10) NOT NULL,
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
('TG0006', 'Milenial'),
('TG0007', '12.12');

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

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`ID_TOKEN`, `EMAIL`, `TOKEN`, `DATE`) VALUES
(1, 'm.aardiansyah17@gmail.com', 'o+3BxFV9NRy9ZArc/x3RDxk60y6EU3q/YqJdGqwrIBI=', '1606468421');

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
  `ID_KLS` varchar(10) NOT NULL,
  `ID_PS` varchar(10) NOT NULL,
  `STATUS` varchar(3) NOT NULL,
  `EXP_TIME` varchar(19) NOT NULL,
  `TRN_TIME` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRN`, `eID`, `AMOUNT`, `PAYMENT`, `BANK`, `VA_NUMBER`, `TIME`, `PDF_GUIDE`, `ID_KLS`, `ID_PS`, `STATUS`, `EXP_TIME`, `TRN_TIME`) VALUES
('TRN321143734', '01eacad7-5afe-4555-b440-4ccf62f51af5', 50000, 'bank_transfer', 'bri', '120948346404692510', '2021-01-17 00:46:26', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c62bddd8-9ff0-48d2-abfe-365cec03a75c/pdf', 'KL00000001', 'PS00000001', '201', '2021-01-17 12:46:58', '');

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
('TG00001', 11, 'Tugas 1', 'ini tugas 1', '2021-01-16', '12-peta-jenis-tanah-a3.pdf', 'fas fa-file-pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `webinar`
--

CREATE TABLE `webinar` (
  `ID_WEBINAR` varchar(10) NOT NULL,
  `JUDUL_WEBINAR` varchar(100) NOT NULL,
  `KONTEN_WEB` varchar(1000) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `FOTO_WEBINAR` varchar(100) NOT NULL,
  `SRT_WEBINAR` varchar(200) NOT NULL,
  `HARGA` varchar(20) NOT NULL,
  `LINK_ZOOM` longtext NOT NULL,
  `PLATFORM` varchar(20) NOT NULL,
  `TGL_BUKA` varchar(20) NOT NULL,
  `TGL_TUTUP` varchar(20) NOT NULL,
  `TGL_WEB` varchar(20) NOT NULL,
  `TGL_POSTWEB` varchar(20) DEFAULT NULL,
  `ST_POSTWEB` int(11) NOT NULL,
  `ST_LINK` int(2) NOT NULL,
  `ST_SRT` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `webinar`
--

INSERT INTO `webinar` (`ID_WEBINAR`, `JUDUL_WEBINAR`, `KONTEN_WEB`, `ID_ADM`, `FOTO_WEBINAR`, `SRT_WEBINAR`, `HARGA`, `LINK_ZOOM`, `PLATFORM`, `TGL_BUKA`, `TGL_TUTUP`, `TGL_WEB`, `TGL_POSTWEB`, `ST_POSTWEB`, `ST_LINK`, `ST_SRT`) VALUES
('WB00001', 'Kiat-Mudah-Memetakan-Profil-Calon-Konsumen-Untuk-Wirausaha-Pemula-dan-UMKM', '<p>Halo Sobat Preneur Academy!<br><br>GRATIS! GRATIS! GRATIS!<br>Webinar Kejar (Kelas Belajar) #07 bareng Dosen Wirausaha dengan tema “Kiat Mudah Melejitkan Profit Usaha di Masa Pandemi Covid-19 Untuk Wirausaha Pemula dan UMKM\"<br><br>Pembicara:<br>Agus Hadi Prayitno, S.Pt., M.Sc., CPC.<br>Penggerak Wirausaha Mahasiswa<br>@DOSENWIRAUSAHA<br><br>Sabtu, 25 Juli 2020<br>Pukul 10.00 WIB - Selesai<br>at Zoom Meeting<br><br>Webinar Kejar #07 kali ini diperuntukkan bagi siapa saja yang ingin belajar berwirausaha!<br>TERBATAS 98 PESERTA jadi hanya untuk yang benar-benar KOMITMEN, SERIUS, dan SUNGGUH-SUNGGUH saja.<br><br>Daftar Sekarang di bit.ly/Kejar07<br><br>AKHIR PENDAFTARAN<br>Jumat, 24 Juli 2020<br>Pukul 12.00 WIB<br><br>Support by<br>@sambalperawan<br>@pelatihmahasiswa<br>@naminaunainstitute<br><br>Salam @Preneu', 'ADM0000', 'd9be9e49f50fd2b25a903a2dcc5d89b7.jpeg', '', 'GRATIS', 'sdvsd', 'ZOOM', '2021-01-20 00:00', '2021-01-23 00:00', '2021-02-01 10:00', '2021-01-17', 1, 1, 0),
('WB00002', 'Kiat-Mudah-Membuat-Laporan-Keuangan-Usaha-Untuk-Wirausaha-Pemula-dan-UMKM-Baru', '<p>Halo Sobat Preneur Academy!<br><br>GRATIS! GRATIS! GRATIS!<br>Webinar Kejar (Kelas Belajar) #07 bareng Dosen Wirausaha dengan tema “Kiat Mudah Membuat Laporan Keuangan Usaha Untuk Wirausaha Pemula dan UMKM\"<br><br>Pembicara:<br>Agus Hadi Prayitno, S.Pt., M.Sc., CPC.<br>Penggerak Wirausaha Mahasiswa<br>@DOSENWIRAUSAHA<br><br>Sabtu, 25 Juli 2020<br>Pukul 10.00 WIB - Selesai<br>at Zoom Meeting<br><br>Webinar Kejar #07 kali ini diperuntukkan bagi siapa saja yang ingin belajar berwirausaha!<br>TERBATAS 98 PESERTA jadi hanya untuk yang benar-benar KOMITMEN, SERIUS, dan SUNGGUH-SUNGGUH saja.<br><br>Daftar Sekarang di bit.ly/Kejar07<br><br>AKHIR PENDAFTARAN<br>Jumat, 24 Juli 2020<br>Pukul 12.00 WIB<br><br>Support by<br>@sambalperawan<br>@pelatihmahasiswa<br>@naminaunainstitute<br><br>Salam @PreneurAcademy<br>', 'ADM0000', 'db57592818664c54e9de5e027dbf44b7.jpeg', '', 'GRATIS', '<p>mohammad ardiansyah is inviting you to a scheduled Zoom meeting.<br></p><p>Topic: mohammad ardiansyah\'s Zoom Meeting<br>Time: Dec 29, 2020 07:00 AM Bangkok<br><br>Join Zoom Meeting<br><a href=\"https://us04web.zoom.us/j/79128519039?pwd=amJvNWMxVU5QRVZ1YjdaK003SjRDUT09\" target=\"_blank\">https://us04web.zoom.us/j/79128519039?pwd=amJvNWMxVU5QRVZ1YjdaK003SjRDUT09</a><br><br>Meeting ID: 791 2851 9039<br>Passcode: 827eHT<br></p>', 'ZOOM', '2021-01-23 00:00', '2021-01-25 00:00', '2021-03-02 10:00', '2021-01-17', 1, 1, 0),
('WB00003', 'Kiat-Mudah-Mengajukan-Proposal-Kompetisi-Inovasi-Bisnis-Mahasiswa', '<p>Webinar Bagus</p>', 'ADM0000', 'WhatsApp_Image_2021-01-17_at_00_05_08.jpeg', '', 'GRATIS', '<p>bit.ly/webinarPA</p>', 'ZOOM', '2021-01-19 00:00', '2021-01-23 00:00', '2021-02-01 10:00', '2021-01-17', 1, 1, 0);

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
  ADD KEY `FK_MENGUMPULKAN2` (`ID_TG`),
  ADD KEY `ID_MT` (`ID_MT`),
  ADD KEY `ID_PS` (`ID_PS`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`ID_DISKON`);

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
-- Indeks untuk tabel `peserta_wbnr`
--
ALTER TABLE `peserta_wbnr`
  ADD KEY `ID_PS` (`ID_PS`);

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
-- AUTO_INCREMENT untuk tabel `key`
--
ALTER TABLE `key`
  MODIFY `ID_KEY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ktg_kelas`
--
ALTER TABLE `ktg_kelas`
  MODIFY `ID_KTGKLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `ID_MT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `materi_sub`
--
ALTER TABLE `materi_sub`
  MODIFY `ID_SUB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `ID_NOT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `ID_TOKEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
