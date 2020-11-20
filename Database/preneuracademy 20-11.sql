-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 03:59 PM
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
  `ID_ROLE` int(11) NOT NULL,
  `FTO_ADM` varchar(60) DEFAULT NULL,
  `NM_ADM` varchar(100) DEFAULT NULL,
  `HP_ADM` varchar(13) DEFAULT NULL,
  `ALMT_ADM` text DEFAULT NULL,
  `EMAIL_ADM` varchar(30) DEFAULT NULL,
  `PSW_ADM` varchar(100) DEFAULT NULL,
  `ACTIVE` int(11) NOT NULL,
  `DATE_CREATE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADM`, `ID_ROLE`, `FTO_ADM`, `NM_ADM`, `HP_ADM`, `ALMT_ADM`, `EMAIL_ADM`, `PSW_ADM`, `ACTIVE`, `DATE_CREATE`) VALUES
('ADM0000', 1, NULL, 'admin1', NULL, NULL, 'turtleninjaaa77@gmail.com', '$2y$10$JqNY.x02erU1MVtJCYfyiulSluajd8DzPafEXsnIAzySdCWFRwEim', 1, '0');

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
('CT0004', 'Akuntansi'),
('CT0005', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `ID_KLS` int(11) NOT NULL,
  `ID_PS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_materi`
--

CREATE TABLE `detail_materi` (
  `ID_KLS` int(11) NOT NULL,
  `ID_MT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_materi`
--

INSERT INTO `detail_materi` (`ID_KLS`, `ID_MT`) VALUES
(5, 1);

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
('PS00001', 'TG0002'),
('PS00001', 'TG0004'),
('PS00002', 'TG0003'),
('PS00003', 'TG0001');

-- --------------------------------------------------------

--
-- Table structure for table `detil_tugas`
--

CREATE TABLE `detil_tugas` (
  `ID_PS` varchar(10) NOT NULL,
  `ID_TG` varchar(10) NOT NULL,
  `ID_MT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detil_tugas`
--

INSERT INTO `detil_tugas` (`ID_PS`, `ID_TG`, `ID_MT`) VALUES
('PSR00001', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
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
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`ID_DISKON`, `DISKON`, `NM_DISKON`, `STATUS`, `DATE_DIS`, `UPDATE_DIS`) VALUES
(1, 0.76, 'Kemerdekaan Indonesia', '1', 0, 1605524714),
(2, 0.35, 'Beasiswa Wirausaha Muda', '1', 1605518268, 1605524739),
(3, 0.5, 'Diskon Hari Sumpah Pemuda', '1', 1605518782, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kebijakan`
--

CREATE TABLE `kebijakan` (
  `ID_KB` int(11) NOT NULL,
  `NM_KB` varchar(50) DEFAULT NULL,
  `IMG_KB` varchar(200) DEFAULT NULL,
  `LINK_KB` varchar(200) DEFAULT NULL,
  `ISI_KB` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kebijakan`
--

INSERT INTO `kebijakan` (`ID_KB`, `NM_KB`, `IMG_KB`, `LINK_KB`, `ISI_KB`) VALUES
(1, 'Terms Conditions', 'terms.png', 'terms', '&lt;p&gt;HAHAHAHAHAHA&lt;/p&gt;'),
(2, 'Privacy Policy', 'privacy.png', 'privacy', '&lt;p&gt;AWOKWOWKOWKWOK&lt;/p&gt;'),
(3, 'Terms Services', 'service.png', 'services', '&lt;p&gt;HEHEHEHE&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID_KLS` int(11) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `ID_KTGKLS` int(11) NOT NULL,
  `ID_DISKON` int(11) NOT NULL,
  `TITTLE` varchar(50) DEFAULT NULL,
  `PERMALINK` varchar(250) DEFAULT NULL,
  `GBR_KLS` varchar(100) DEFAULT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `STAT` char(11) DEFAULT NULL,
  `DATE_CREATE` int(11) DEFAULT NULL,
  `LAST_UPDATE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KLS`, `ID_ADM`, `ID_KTGKLS`, `ID_DISKON`, `TITTLE`, `PERMALINK`, `GBR_KLS`, `DESKRIPSI`, `PRICE`, `STAT`, `DATE_CREATE`, `LAST_UPDATE`) VALUES
(5, 'ADM0000', 3, 1, 'Kelas Baru', 'baru', 'Chrysanthemum.jpg', 'halloo teman', 170000, '1', 1605356875, 0),
(6, 'ADM0000', 1, 1, 'Strategi Bisnis Lewat Sosmed', 'sosmed', 'default.jpg', 'Halloooo', 200000, '1', 1605526657, 0);

-- --------------------------------------------------------

--
-- Table structure for table `key`
--

CREATE TABLE `key` (
  `ID_KEY` int(11) NOT NULL,
  `NM_KEY` varchar(50) DEFAULT NULL,
  `KEY_1` varchar(200) DEFAULT NULL,
  `KEY_2` varchar(200) DEFAULT NULL,
  `STATUS` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `key`
--

INSERT INTO `key` (`ID_KEY`, `NM_KEY`, `KEY_1`, `KEY_2`, `STATUS`) VALUES
(1, 'Google OAuth 1', '123456', '123456', 'Aktif'),
(2, 'Facebook Auth', '123456', '123456', 'Aktif'),
(3, 'Recaptcha API', '123456', '123456', 'Aktif'),
(4, 'Instagram API', '123456', '123456', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ktg_kelas`
--

CREATE TABLE `ktg_kelas` (
  `ID_KTGKLS` int(11) NOT NULL,
  `KTGKLS` varchar(50) DEFAULT NULL,
  `DATE_KTGKLS` int(11) DEFAULT NULL,
  `UPDATE_KTGKLS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ktg_kelas`
--

INSERT INTO `ktg_kelas` (`ID_KTGKLS`, `KTGKLS`, `DATE_KTGKLS`, `UPDATE_KTGKLS`) VALUES
(1, 'Wirausaha Dasar', 0, 0),
(2, 'Wirausaha Lanjutan', 0, 0),
(3, 'SEO', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `ID_MT` int(11) NOT NULL,
  `NM_MT` varchar(50) DEFAULT NULL,
  `DETAIL_MT` varchar(1000) DEFAULT NULL,
  `FILE_MT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`ID_MT`, `NM_MT`, `DETAIL_MT`, `FILE_MT`) VALUES
(1, 'pengenalan pa', 'ini materi', 'materi.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `medsos`
--

CREATE TABLE `medsos` (
  `ID_MS` int(11) NOT NULL,
  `NM_MS` varchar(100) DEFAULT NULL,
  `IC_MS` varchar(30) DEFAULT NULL,
  `LINK_MS` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medsos`
--

INSERT INTO `medsos` (`ID_MS`, `NM_MS`, `IC_MS`, `LINK_MS`) VALUES
(1, 'Youtube', 'fab fa-youtube', 'https://www.youtube.com/channel/UCr5MmNPr-xNwbyt7Hrzu6Hw'),
(2, 'Instagram', 'fab fa-instagram', 'https://www.instagram.com/preneuracademy/'),
(3, 'Twitter', 'fab fa-twitter', 'https://twitter.com/preneuracademy'),
(4, 'Facebook', 'fab fa-facebook', 'https://www.facebook.com/preneuracademy');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `ID_NV` int(11) NOT NULL,
  `NM_NV` varchar(20) DEFAULT NULL,
  `LINK_NV` varchar(200) DEFAULT NULL,
  `PR_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
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
  `JURUSAN` varchar(100) DEFAULT NULL,
  `UNIVERSITAS` varchar(100) DEFAULT NULL,
  `SMT_PS` varchar(5) DEFAULT NULL,
  `LAMA_KERJA` varchar(5) DEFAULT NULL,
  `HP_PS` varchar(15) DEFAULT NULL,
  `ALMT_PS` text DEFAULT NULL,
  `EMAIL_PS` varchar(30) DEFAULT NULL,
  `PSW_PS` varchar(100) DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL,
  `DATE_CREATE` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`ID_PS`, `ID_ROLE`, `FTO_PS`, `NM_PS`, `JK_PS`, `AGAMA_PS`, `USIA_PS`, `KOTA`, `PEKERJAAN`, `JURUSAN`, `UNIVERSITAS`, `SMT_PS`, `LAMA_KERJA`, `HP_PS`, `ALMT_PS`, `EMAIL_PS`, `PSW_PS`, `ACTIVE`, `DATE_CREATE`) VALUES
('PSR00001', 2, 'default.jpg', 'Kura Gayming', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085667776667', 'Jember', 'kurak4647@gmail.com', '$2y$10$b0vLHBSld7woRtx7aZyE8.2D6JZgilwTs0.38RvIRUH2mFcas0/1W', '1', '1604313917'),
('PSR00002', 2, 'default.jpg', 'Rusdi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '086775678877', '', 'rus@gmail.com', '$2y$10$oT41TDbCNvBwHPaIh.Ug9.jfgUNIzAyxo1xwsBQoBXRINZdkH.gzq', '0', '1604318977');

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
  `UPDT_TRAKHIR` varchar(20) DEFAULT NULL,
  `ST_POST` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID_POST`, `ID_CT`, `ID_ADM`, `JUDUL_POST`, `KONTEN_POST`, `TGL_POST`, `FOTO_POST`, `UPDT_TRAKHIR`, `ST_POST`) VALUES
('PS00001', 'CT0002', 'ADM0000', 'Bagaimana Caranya Membuat Konten yang Viral ', '&lt;p&gt;Banyak para mastah iklan yang sekarang berlomba membuat konten viral \r\nuntuk bisa menghemat biaya iklan. Apalagi sekarang fb ads dan iklan \r\nberbayar lainnya mulai dikenakan pajak 10% dan langsung ditarik dari \r\nbudget iklan kita loh.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;em&gt;“Gimana ya caranya viralin konten kita, biar bisa jangkau banyak orang secara organik alias tanpa ads berbayar..??”&lt;/em&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Mas Fardi Yandi founder dari Social Kreatif kupas tuntas hal tersebut\r\n di YEA Class yang berjudul the Science of being Viral, Sabtu kemarin. \r\nTernyata konten viral itu bisa kita buat loh dan ada polanya. Tahukah \r\nsobat eagles, konten yang dibuat oleh Mas Fardi Yandi ini sudah \r\nmenjangkau ratusan ribu reach secara organik tanpa ads berbayar.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Waduh, kebayang gak berapa juta tuh kalau pake fb ads buat menjangkau ratusan ribu orang..??&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Nah makanya kita bahas ini kemarin karena dengan konten viral kita \r\nbisa menghemat biaya iklan yang jutaan tadi. Kan lumayan uangnya bisa \r\nkita alokasikan untuk keperluan yang lain.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Ok, jadi gimana caranya..?&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Sebelum dibahas, kita ubah dulu persepsi viral menjadi ‘bisa \r\ndijangkau banyak orang’. Jadi, bagaimana caranya agar konten kita bisa \r\ndijangkau banyak orang tanpa ads..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Perlu diingat, bahwa viral itu butuh proses dalam menemukan pola \r\nviralnya. Beda bisnis, beda tujuan, beda target pasar, tentu berbeda \r\njuga cara jangkaunya. Dan dalam pembahasan ini kita batasi viral hanya \r\ndengan cara yang positif saja ya, baik itu di &lt;a href=&quot;https://yea-indonesia.com/2020/10/26/instagram-versus-tiktok-better-mana-sih/&quot;&gt;instagram maupun tiktok&lt;/a&gt;.&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Stepnya:&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;1. Purpose&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Jangan mulai dari how to, mulai dari WHY. Mengapa konten kita harus \r\nviral, mengapa saya bangun bisnis ini, mengapa saya buat konten ini, \r\nmengapa saya posting hal ini, dan ‘why’ lainnya yang bisa menjadi \r\nfondasi dari bisnis atau konten kita. Karena tidak setiap saat postingan\r\n kita akan selalu di like banyak orang. Mungkin satu atau dua bulan kita\r\n masih dalam spirit atau semangat yang kuat, tapi dalam bulan ketiga \r\njika masih tidak ada yang like apakah kita akan terus melanjutkan bisnis\r\n atau posting konten kita..? Nah ‘why’ yang kuatlah yang akan \r\nmengingatkan kita atau menjadi trigger bagi kita untuk tetap membuat \r\nkonten dan melanjutkan bisnis kita.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;2. Konsep&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Ok, jika sudah punya purpose maka selanjutnya kita harus mengetahui konsep atau anatomy of viral content. Terdiri dari 2 yaitu:&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;–&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Konten yang worth untuk di-shared oleh orang lain à ada 1 \r\nchannel marketing yang masih berlaku dan terpercaya dari jaman nenek \r\nmoyang hingga sekarang, yaitu MLM alias dari mulut ke mulut. Ketika ada \r\npostingan story teman kita yang menurut kita ‘gue banget nih’, kita \r\ncenderung ingin share postingan tersebut. Ada satu psikologi manusia \r\nyang bersifat mengikuti sesuatu yang dilakukan oleh orang terdekat atau \r\norang kebanyakan. Di sinilah awal dari proses viralnya suatu konten. \r\nJadi, apakah konten kita layak untuk dishare oleh orang lain..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;–&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Konten yang terbuka untuk semua orang à konten yang harus \r\nbisa dipahami atau relate dengan semua orang. Jika kita perhatikan saat \r\nini banyak orang membuat konten microblog dengan istilah atau kata-kata \r\nyang hanya dimengerti oleh orang/kalangan tertentu, padahal ini hanya \r\nakan memperkecil kemungkinan share atau jangkauan. Dan konten yang lebih\r\n membumi atau relate dengan kebanyakan netizen justru ini yang membuka \r\npeluang menuju viral.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Banyak orang posting tentang prestasi yang telah diraih. Tapi \r\nbagaimana jika posting tentang ‘bagaimana caranya agar kamu juga bisa \r\nberprestasi atau mendapatkan beasiswa a’ misalkan. Tentu akan jauh lebih\r\n tinggi share dan saved nya karena orang lain mendapatkan benefit dari \r\npostingan kita.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;3 faktor yang membuat sebuah &lt;a href=&quot;https://medium.com/@fattul/10-menit-membuat-konten-yang-mudah-tersebar-di-medsos-konten-viral-dfc60af6dea4&quot;&gt;konten bisa menjadi viral:&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;1.&amp;nbsp; Konten yang membangkitkan emosi: sedih, marah, bahagia, humor, \r\nharu, menyentuh. Angkat isu atau suatu trend dan kaitkan dengan bisnis \r\natau konten kita.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;2.&amp;nbsp; Konten yang menyampaikan pesan positif: harus sesuai dengan value kita.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;3.&amp;nbsp; Konten yang mengajarkan sesuatu: tips, DIY, ilmu terapan&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;Yuk ikuti rules-nya:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Social currency = orang lain senang membicarakan hal yang membuat mereka terlihat pintar.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Keresahan = hal – hal sederhana yang belum bisa diungkapkan netizen, kita ungkapkan menjadi sebuah konten&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Emotion = Kalau kamu peduli, kamu pasti akan share tentang hal ini&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# General Issue = Semakin umum sesuatu, maka semakin besar kesempatan\r\n untuk dibagikan ke orang lain. Gimana caranya buat tahu trend..? main \r\ntwitter, baca medium.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Practical value = hal – hal praktikal yang berguna untuk orang sekitar&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;# Building stories = cerita yang belum mampu orang sampaikan, tapi mampu kita sampaikan&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;&lt;strong&gt;Quick tips:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Pakai Instagram = grabbing attention with visual, consuming time duration, hashtag&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Pakai tik tok = grabbing attention with audio, words, or the visual. 2 detik pertama, hashtag&lt;/p&gt;', '2020-11-17', '20170507_0705044.jpg', '2020-11-17', NULL),
('PS00002', 'CT0004', 'ADM0000', 'Cara Mudah Memahami Business Model Canvas', '&lt;p&gt;Apakah kamu sering dengar istilah business model canvas atau business model generation..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Business model generation, suatu buku karangan Alexander Osterwalder \r\ndan kawan-kawannya yang sebagian besarnya adalah doctor dan professor di\r\n bidang manajemen. Menurut saya buku ini adalah buku yang terbaik dalam \r\n10 tahun terakhir ini. Hanya saja, bagi orang awam memang tidak mudah \r\nuntuk memahaminya dalam waktu singkat.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Oleh karena itu saya akan berusaha untuk menjelaskan dengan waktu \r\nyang sangat singkat agar kita semua terutama yang awam untuk bisa \r\nmemahami Business Model Canvas (BMC).&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Saya akan menggunakan pendekatan yang disebut dengan input output \r\nanalysis. Bagi saya input ouput analysis adalah induknya framework, \r\nkarena bisa digunakan tidak hanya untuk bisnis saja. Saya mendapatkan \r\nframe work ini justru dari sekolah teknik elektro dimana saya sekolah \r\ndulu.&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;Nah apa sih input output analysis itu..?\r\n\r\n\r\n\r\n&lt;/p&gt;&lt;p&gt;Pada dasarnya terdiri dari 3 bagian yaitu input, proses, dan output. \r\nKalau dalam bisnis mungkin kita sering mendengar istilah hulu ke hilir, \r\ndimana hulu sebagai input, hilir sebagai output, dan perusahaan sebagai \r\nproses.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;1. Hulu&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Di sini kita akan menemui yang namanya supplier, kontraktor, petani, atau penambang.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;2. Perusahaan&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Tentunya di sini kita akan menemukan semua proses yang mengolah semua\r\n bahan dari hulu tadi untuk dibuat suatu produk baru yang diinginkan. \r\nPerusahaan itu bisa berupa manajemen, atau business owner yang punya \r\nsuatu bisnis, atau bisa jadi berupa tempat produksi.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;3. Hilir&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Di sini ujung dari sampainya produk yang telah diolah tadi, bisa \r\nberupa konsumen, toko eceran, dan tempat lainnya yang menerima atau \r\nmembeli produk yang telah diolah tadi.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Jika air mengalirnya dari hulu ke hilir, maka dalam bisnis terjadi \r\nsebaliknya. Uang tentunya akan mengalir dari hilir/konsumen ke \r\nperusahaan (keluar dalam bentuk operasional cost), baru kemudian ke \r\nhulu/supplier.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Selisih dari pemasukan dan pengeluaran menjadi keuntungan. Atau bisa \r\njuga terjadi kerugian jika pengeluaran lebih tinggi daripada pemasukan. \r\nItu yang disebut dengan laba rugi.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Apa korelasinya BMC dan input output analysis..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Kita mulai dari hilir yaitu permintaan pasar/konsumen. Siapa yang sebenarnya menjadi target pasar kita. itu disebut sebagai &lt;strong&gt;customer segmen&lt;/strong&gt; dalam BMC.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;ul&gt;&lt;li&gt;Apa yang mereka butuhkan..?&lt;/li&gt;&lt;li&gt;Masalah apa yang akan kita selesaikan..?&lt;/li&gt;&lt;li&gt;Apa keunggulan atau diferensiasi kita dari kompetitor..?&lt;/li&gt;&lt;/ul&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Jawaban pertanyaan ini akan memperbaiki output atau produk yang \r\nkeluar sehingga mempunyai diferensiasi yang kuat. Inilah yang disebut \r\ndengan &lt;strong&gt;value proposition&lt;/strong&gt; dalam BMC. Bisnis bisa dimulai dalam skala kecil dengan mendeliver value proposition tersebut ke tempat customer.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Tapi pada saat kita ingin melebarkan bisnis, maka kita akan membutuhkan saluran distribusi. Itulah yang disebut dengan &lt;strong&gt;channel distribution&lt;/strong&gt; dalam BMC.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Setelah kita mendistribusikan produk ke titik-titik terdekat dari \r\nkonsumen, permasalahan berikutnya adalah bagaimana caranya menarik \r\nkonsumen untuk mengetahui dan datang ke tempat distribusi tersebut. Di \r\nsinilah membutuhkan yang namanya kampanye/promosi.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;BMC tidak hanya dibuat untuk bisnis yang bersifat komersial saja, \r\nmelainkan bisa digunakan juga untuk organisasi non profit. Maka dari itu\r\n BMC juga menyediakan kolom &lt;strong&gt;customer relationship&lt;/strong&gt;.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Untuk menghasilkan value proposition yang tadi kita siapkan, \r\ndibutuhkan suatu proses dalam internal perusahaan yang disebut dengan &lt;strong&gt;key activities&lt;/strong&gt;.\r\n Adalah aktifitas-aktifitas perusahaan untuk membuat bisnisnya berjalan.\r\n Misal membuat produk, melakukan promosi, dan membuat konten harian.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Dalam aktifitas perusahaan tentunya membutuhkan sumber daya, yang disebut dengan &lt;strong&gt;key resources&lt;/strong&gt;. Bisa berupa sumber daya manusia, mesin, dan alat lainnya yang menjadi sumber daya perusahaan.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Ada beberapa proses yang tidak bisa dilakukan dalam internal \r\nperusahaan. Bisa karena alasan perampingan, meminimalisir resiko, atau \r\njuga untuk mempertahankan kefokusan terhadap kegiatan yang memang \r\nmenjadi potensi bagi perusahaan tersebut. Oleh karena itu, proses yang \r\ntidak bisa dijalankan dalam internal perusahaan dilemparkan keluar atau \r\nbekerjasama dengan pihak luar. Ini yang disebut dengan &lt;strong&gt;key partnership&lt;/strong&gt;. Bentuknya bisa berupa supplier, kontraktor, atau outsourcing.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Bagaimana, paham sampai sini..? Baik, kita lanjutkan.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Uang didapat dari konsumen yang membeli produk kita. Dari sini segala\r\n bentuk penjualan akan menghasilkan omset. Ini disebut dengan &lt;strong&gt;revenue stream&lt;/strong&gt;.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Sedangkan segala biaya yang dikeluarkan, baik biaya untuk \r\nmenghasilkan produk/jasa, biaya aktifitas perusahaan, pembayaran ke key \r\npartner, disebut sebagai &lt;strong&gt;cost structure&lt;/strong&gt;. Biaya internal perusahaan bisa dibagi menjadi 2:&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;1. yang sifatnya tetap, disebut fix cost.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;2. yang tidak tetap, disebut variable cost.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Nah, apakah sudah paham sampai di sini..? Ternyata induk &lt;a href=&quot;https://kirim.email/business-model-canvas/&quot;&gt;konsep BMC &lt;/a&gt;sama dengan framework input output analysis. Beda framework beda istilah, namun sesungguhnya serupa nalarnya.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Jadi, kegiatan apa saja nih yang bisa menambah revenue stream teman-teman..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Semoga bisa dipahami dan bermanfaat. Sampai jumpa di materi berikutnya..&lt;/p&gt;', '2020-11-18', '20170507_0705045.jpg', '2020-11-18', 1),
('PS00003', 'CT0001', 'ADM0000', 'Solusi untuk Pola Kegagalan Tempat Wisata', '&lt;p&gt;Banyak tempat pariwisata di Indonesia yang tidak dikemas dengan baik \r\nsehingga menimbulkan pola kegagalan. Salah satunya sering memukul harga \r\nsehingga yang ada di benak kita bahwa makanan yang ada di tempat wisata \r\nya mahal, padahal tidak semua seperti itu. Ini yang membuat rugi bagi \r\npedagang yang menjual murah makanannya. Nah inilah gunanya perlihatkan \r\nharga di depan agar pengunjung tidak was was dan tidak takut untuk \r\nmembeli. Transparansi harga juga sudah banyak diterapkan di daerah \r\nwisata di luar negeri yang membuat pengunjung nyaman saat membeli.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Nah lalu apa solusi taktis yang dapat diterapkan..?&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;1. Buat alur peta wisata&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Gunanya agar pengunjung tidak bingung dan mendapatkan informasi lebih\r\n mengenai apa saja yang ada di tempat wisata tersebut. Kita juga bisa \r\nmenambahkan keterangan baiknya pengunjung itu mengunjungi tempat mana \r\nterlebih dahulu, disesuaikan keindahan tempatnya sesuai waktu. Misal \r\npagi hari sebaiknya pengunjung ke spot A terlebih dahulu agar dapat \r\nmenikmati sunrise, dan seterusnya.&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;2. Selaraskan semua tema di satu tempat wisata&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Misal tema tempatnya romantic, maka semua hal yang ada di tempat \r\nwisata tersebut harus mengikuti tema yang sudah ditetapkan. Termasuk \r\nsuara music dari tiap warung tidak boleh seenaknya sendiri, melainkan \r\nharus mengikuti tema tempat wisata. Agar pengunjung mendapatkan feel-nya\r\n dari tempat itu sehingga akan terkenang dan ingin berkunjung kembali \r\natau merekomendasikan pada yang lain.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;3.&amp;nbsp; Penataan spot&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Harus dipetakan di luar dan di dalam. Agar pengunjung mengerti ada \r\nspot apa saja dan baik user experience-nya. Ini sebenarnya sudah banyak \r\nditerapkan banyak tempat wisata di Indonesia, hanya perlu penataan lebih\r\n baik saja untuk warung dan pedagangnya.&lt;/p&gt;&lt;p&gt;4. Kuliner di tempat wisata&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Harus diselaraskan dengan tema tempat wisata dan ada transparansi \r\nharga agar pengunjung tidak takut untuk membeli. Kalau bisa jangan ada \r\nmakanan lain di luar tema tempat wisata.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;5. Oleh-oleh&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Juga harus sesuai tema tempat wisata, juga diedukasi pembuatannya dan\r\n harus dikurasi untuk bisa dijual di tempat tersebut, agar pengunjung \r\ntidak kecewa. Dan kalau bisa oleh-olehnya tidak dijual di tempat lain \r\nagar membuat eksklusifitas dan menciptakan rasa kangen bagi pengunjung.&amp;nbsp;&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Semua ini harus dilakukan oleh siapa..?? Bukan oleh pemerintah saja, melainkan semua yang &lt;a href=&quot;https://www.liputan6.com/lifestyle/read/4180172/solusi-kemenparekraf-dongkrak-pariwisata-yang-anjlok-karena-wabah-virus-corona&quot;&gt;peduli pada daerah wisata Indonesia &lt;/a&gt;bisa\r\n ikut andil dalam hal ini. Misal ibu-ibu PKK, pemuda karang taruna, dan \r\nwarga setempat yang ingin memajukan daerah wisatanya.&lt;/p&gt;\r\n\r\n\r\n\r\n&lt;p&gt;Semoga bermanfaat.. &lt;br&gt;&lt;/p&gt;', '2020-11-20', '20170507_0705046.jpg', '2020-11-20', NULL);

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
  `ROLE` varchar(8) DEFAULT NULL
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
('TG0003', 'berwirausaha'),
('TG0004', 'df');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `ID_TOKEN` int(11) NOT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `TOKEN` varchar(100) DEFAULT NULL,
  `DATE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `ID_TG` varchar(10) NOT NULL,
  `ID_MT` int(11) NOT NULL,
  `DETAIL_TG` varchar(255) DEFAULT NULL,
  `DEADLINE` varchar(20) DEFAULT NULL,
  `FILE_TG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`ID_TG`, `ID_MT`, `DETAIL_TG`, `DEADLINE`, `FILE_TG`) VALUES
('1', 1, 'ini tugas', '0', 'tugas.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADM`),
  ADD KEY `FK_ROLE_ADM` (`ID_ROLE`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_CT`);

--
-- Indexes for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD PRIMARY KEY (`ID_KLS`,`ID_PS`),
  ADD KEY `FK_MENGIKUTI2` (`ID_PS`);

--
-- Indexes for table `detail_materi`
--
ALTER TABLE `detail_materi`
  ADD PRIMARY KEY (`ID_KLS`,`ID_MT`),
  ADD KEY `FK_MEMILIKI2` (`ID_MT`);

--
-- Indexes for table `detail_tags`
--
ALTER TABLE `detail_tags`
  ADD PRIMARY KEY (`ID_POST`,`ID_TAGS`),
  ADD KEY `FK_R_TAGS2` (`ID_TAGS`);

--
-- Indexes for table `detil_tugas`
--
ALTER TABLE `detil_tugas`
  ADD PRIMARY KEY (`ID_PS`,`ID_TG`),
  ADD KEY `FK_MENGUMPULKAN2` (`ID_TG`),
  ADD KEY `ID_MT` (`ID_MT`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`ID_DISKON`);

--
-- Indexes for table `kebijakan`
--
ALTER TABLE `kebijakan`
  ADD PRIMARY KEY (`ID_KB`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KLS`),
  ADD KEY `FK_DISKON` (`ID_DISKON`),
  ADD KEY `FK_KTG_KELAS` (`ID_KTGKLS`),
  ADD KEY `FK_MENGAJAR` (`ID_ADM`);

--
-- Indexes for table `key`
--
ALTER TABLE `key`
  ADD PRIMARY KEY (`ID_KEY`);

--
-- Indexes for table `ktg_kelas`
--
ALTER TABLE `ktg_kelas`
  ADD PRIMARY KEY (`ID_KTGKLS`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`ID_MT`);

--
-- Indexes for table `medsos`
--
ALTER TABLE `medsos`
  ADD PRIMARY KEY (`ID_MS`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`ID_NV`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`ID_PS`),
  ADD KEY `FK_ROLE_PS` (`ID_ROLE`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_POST`),
  ADD KEY `FK_KATEGORI` (`ID_CT`),
  ADD KEY `FK_MEMPOSTING` (`ID_ADM`);

--
-- Indexes for table `post_view`
--
ALTER TABLE `post_view`
  ADD PRIMARY KEY (`ID_VIEW`),
  ADD KEY `FK_POST_VIEW` (`ID_POST`);

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
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`ID_TG`),
  ADD KEY `FK_BERISI` (`ID_MT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `ID_DISKON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kebijakan`
--
ALTER TABLE `kebijakan`
  MODIFY `ID_KB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `ID_KLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `key`
--
ALTER TABLE `key`
  MODIFY `ID_KEY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ktg_kelas`
--
ALTER TABLE `ktg_kelas`
  MODIFY `ID_KTGKLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medsos`
--
ALTER TABLE `medsos`
  MODIFY `ID_MS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `ID_NV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `ID_TOKEN` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
