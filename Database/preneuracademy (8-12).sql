-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 07:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADM` char(10) NOT NULL,
  `ID_ROLE` int(11) NOT NULL,
  `FTO_ADM` varchar(60) DEFAULT NULL,
  `NM_ADM` varchar(100) DEFAULT NULL,
  `HP_ADM` varchar(13) DEFAULT NULL,
  `ALMT_ADM` text,
  `EMAIL_ADM` varchar(30) DEFAULT NULL,
  `PSW_ADM` varchar(100) DEFAULT NULL,
  `ACTIVE` int(11) NOT NULL,
  `DATE_ADM` int(11) NOT NULL,
  `UPDATE_ADM` int(11) NOT NULL,
  `UPDATE_PSWADM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADM`, `ID_ROLE`, `FTO_ADM`, `NM_ADM`, `HP_ADM`, `ALMT_ADM`, `EMAIL_ADM`, `PSW_ADM`, `ACTIVE`, `DATE_ADM`, `UPDATE_ADM`, `UPDATE_PSWADM`) VALUES
('ADM0000', 1, 'Koala1.jpg', 'AHP', '089775667775', 'Solo, Jawa Tengah.', 'turtleninjaaa77@gmail.com', '$2y$10$JqNY.x02erU1MVtJCYfyiulSluajd8DzPafEXsnIAzySdCWFRwEim', 1, 0, 1605846204, 1605846423);

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
-- Table structure for table `detail_fasilitas_webinar`
--

CREATE TABLE `detail_fasilitas_webinar` (
  `ID_WEBINAR` int(11) NOT NULL,
  `ID_FA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_fasilitas_webinar`
--

INSERT INTO `detail_fasilitas_webinar` (`ID_WEBINAR`, `ID_FA`) VALUES
(1, 'FA0001');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `ID_KLS` int(11) NOT NULL,
  `ID_PS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kelas`
--

INSERT INTO `detail_kelas` (`ID_KLS`, `ID_PS`) VALUES
(12, 'PSR00003');

-- --------------------------------------------------------

--
-- Table structure for table `detail_materi`
--

CREATE TABLE `detail_materi` (
  `ID_MT` int(11) NOT NULL,
  `ID_KLS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_materi`
--

INSERT INTO `detail_materi` (`ID_MT`, `ID_KLS`) VALUES
(1, 12),
(2, 12),
(3, 12);

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
('PS00002', 'TG0002'),
('PS00003', 'TG0003'),
('PS00004', 'TG0003'),
('PS00006', 'TG0001');

-- --------------------------------------------------------

--
-- Table structure for table `detil_tugas`
--

CREATE TABLE `detil_tugas` (
  `ID_PS` varchar(10) NOT NULL,
  `ID_TG` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `fasilitas_webinar`
--

CREATE TABLE `fasilitas_webinar` (
  `ID_FA` varchar(10) NOT NULL,
  `NM_FA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_webinar`
--

INSERT INTO `fasilitas_webinar` (`ID_FA`, `NM_FA`) VALUES
('FA0001', 'E-Sertifikat'),
('FA0002', 'Materi Webinar'),
('FA0003', 'Seminar Kit');

-- --------------------------------------------------------

--
-- Table structure for table `kebijakan`
--

CREATE TABLE `kebijakan` (
  `ID_KB` int(11) NOT NULL,
  `NM_KB` varchar(50) DEFAULT NULL,
  `IMG_KB` varchar(200) DEFAULT NULL,
  `LINK_KB` varchar(200) DEFAULT NULL,
  `ISI_KB` text
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
  `DESKRIPSI` text,
  `PRICE` int(11) DEFAULT NULL,
  `STAT` char(1) DEFAULT NULL,
  `DATE_KLS` int(11) DEFAULT NULL,
  `UPDATE_KLS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KLS`, `ID_ADM`, `ID_KTGKLS`, `ID_DISKON`, `TITTLE`, `PERMALINK`, `GBR_KLS`, `DESKRIPSI`, `PRICE`, `STAT`, `DATE_KLS`, `UPDATE_KLS`) VALUES
(12, 'ADM0000', 5, 1, 'Dasar-dasar berwirausaha untuk pemula', 'dasar', 'Lighthouse2.jpg', 'Kelas ini merupakan kelas dasar bagi para pemula yang ingin terjun ke dunia bisnis', 100000, '1', 1605844837, 1605854447),
(16, 'ADM0000', 4, 0, 'Bisnis Digital', 'digi', 'Desert.jpg', 'Ini kelas bisnis digital&lt;u&gt;&lt;b&gt;&lt;br&gt;&lt;/b&gt;&lt;/u&gt;', 250000, '1', 1606143974, 1606460676),
(17, 'ADM0000', 5, 3, 'Test 2', 'test 2', 'default.jpg', 'test 2', 200000, '1', 1606143974, 0),
(18, 'ADM0000', 6, 2, 'Test 3', 'test 3', 'default.jpg', 'test 3\r\n', 350000, '1', 1606143974, 0),
(19, 'ADM0000', 4, 3, 'Kelas A', 'kelas a', 'default.jpg', 'haloooo', 200000, '1', 1606276592, 0),
(20, 'ADM0000', 5, 1, 'Kelas B', 'kelas b', 'default.jpg', 'holaaa', 150000, '1', 1606276592, 0),
(21, 'ADM0000', 6, 3, 'Kelas C', 'kelas c', 'default.jpg', 'Aholaaaa', 120000, '1', 1606276592, 0),
(22, 'ADM0000', 4, 2, 'Kelas D', 'kelas d', 'default.jpg', 'ahoyyy slemoy', 130000, '1', 1606276592, 0),
(23, 'ADM0000', 6, 3, 'Kelas E', 'kelas e', 'default.jpg', 'uhuy cuy', 500000, '1', 1606276592, 0),
(24, 'ADM0000', 5, 2, 'Kelas G', 'kelas g', 'default.jpg', 'ehek', 400000, '1', 1606276592, 0),
(25, 'ADM0000', 4, 3, 'Kelas H', 'kelas h', 'default.jpg', 'uhuk', 350000, '1', 1606276592, 0),
(26, 'ADM0000', 6, 2, 'Kelas I', 'kelas i', 'default.jpg', 'hola', 200000, '1', 1606279420, 0),
(27, 'ADM0000', 4, 3, 'Kelas J', 'kelas j', 'default.jpg', 'hilih', 300000, '1', 1606279420, 0),
(29, 'ADM0000', 5, 0, 'bbbbb', 'bb', 'default.jpg', '&lt;p&gt;&lt;u&gt;&lt;b&gt;BBBBB&lt;/b&gt;&lt;/u&gt;&lt;br&gt;&lt;/p&gt;', 1000000, '0', 1606464252, 0);

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
(4, 'Dasar', NULL, 1605843867),
(5, 'Lanjutan', 1605843085, 0),
(6, 'Advance', 1605843803, 0);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `ID_MT` int(11) NOT NULL,
  `NM_MT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`ID_MT`, `NM_MT`) VALUES
(1, 'Anjay'),
(2, 'Wow'),
(3, 'Anjay 2');

-- --------------------------------------------------------

--
-- Table structure for table `materi_sub`
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
-- Dumping data for table `materi_sub`
--

INSERT INTO `materi_sub` (`ID_SUB`, `ID_MT`, `NM_SUB`, `DETAIL_SUB`, `FILE_SUB`, `ICON_SUB`) VALUES
(1, 1, 'Materi Jones', 'Memberikan pengetahuan kepada anak bujank untuk selalu berkreasi.', 'Mantap.pdf', 'far fa-file-pdf'),
(2, 1, 'Materi Jones', 'MMMMMMMMMMMMMMMM', 'power-point.pptx', 'far fa-file-powerpoint');

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

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`ID_NV`, `NM_NV`, `LINK_NV`, `PR_ID`) VALUES
(1, 'Home', 'index', NULL),
(2, 'Blog', 'blog', NULL);

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
  `ALMT_PS` text,
  `EMAIL_PS` varchar(30) DEFAULT NULL,
  `PSW_PS` varchar(100) DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL,
  `DATE_CREATE` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`ID_PS`, `ID_ROLE`, `FTO_PS`, `NM_PS`, `JK_PS`, `AGAMA_PS`, `USIA_PS`, `KOTA`, `PEKERJAAN`, `JURUSAN`, `UNIVERSITAS`, `SMT_PS`, `LAMA_KERJA`, `HP_PS`, `ALMT_PS`, `EMAIL_PS`, `PSW_PS`, `ACTIVE`, `DATE_CREATE`) VALUES
('PSR00003', 2, 'Untitled_jpg_3.jpg', 'Alex', 'Laki-laki', 'Islam', NULL, 'Bandung', 'Mahasiswa', NULL, NULL, NULL, NULL, '000999000999', 'Jember', 'alex@gmail.com', '$2y$10$7X9Bii5gCYpKeENJ5GNlTOeO4uhnMpWtMtqICqFmr3xIo0iTSUhAC', '1', '1606817976');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID_POST` char(10) NOT NULL,
  `ID_CT` char(10) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `JUDUL_POST` varchar(200) DEFAULT NULL,
  `KONTEN_POST` text,
  `TGL_POST` varchar(20) DEFAULT NULL,
  `FOTO_POST` varchar(100) DEFAULT NULL,
  `UPDT_TRAKHIR` varchar(20) DEFAULT NULL,
  `ST_POST` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID_POST`, `ID_CT`, `ID_ADM`, `JUDUL_POST`, `KONTEN_POST`, `TGL_POST`, `FOTO_POST`, `UPDT_TRAKHIR`, `ST_POST`) VALUES
('PS00001', 'CT0003', 'ADM0000', 'Kenapa Universitas Jarang Melahirkan Pengusahaa ', '&lt;b&gt;Wait,,&lt;/b&gt; bagi kamu yang lagi cari channel buat promosiin produk atau bisnis, coba simak dulu hasil analisis dari Mas Fardi Yandi founder Social Kreatif tentang perbandingan antara Instagram dan TikTok berikut ini ya..Ok, kita mulai dengan InstagramGrabbing attention-nya dengan visual berupa warna atau typografi. Jadi sebelum kita bicara value, kita harus tahu dulu apa yang bisa membuat orang berhenti dan mau melihat postingan kita. Salah satu yang bisa membuat netizen Instagram tertarik yaitu warna dan typografi (misal tulisan atau headline yang clickbait). Setelah itu, kita satukan warna tadi dengan value yang ingin kita berikan pada mereka. Sekarang mengapa konten microblog bisa cepat viral..? Instagram punya data konsumsi waktu setiap orang pada setiap postingan. Postingan yang berhasil membuat orang berlama-lama melihatnya, akan cepat dinaikkan oleh Instagram. Nah microblog adalah salah satu jenis postingan yang bisa membuat orang berlama-lama di Instagram. Oleh karena itu lebih cepat viralnya.Hashtag adalah salah satu cara agar postingan kita bisa masuk ke explore. Tapi pertanyaannya adalah bagaimana cara menemukan hashtag yang tepat..? Sobat eagles bisa ikuti step organik berikut ya:1. List 5 kompetitor dan list masing-masing hashtag-nya2. Misal ada 50 hashtag, kemudian kita bagi jadi 3 kelompok A, B, C.3. Lalu kita bandingkan hasilnya dengan cara misal hari ini kita posting dengan hashtag kelompok A, besoknya kelompok B, dan besoknya lagi kelompok C.4. Kita data sehabis 24 jam posting, likenya berapa, sharenya berapa, jangkauannya berapa.5. Pilih kelompok hashtag yang menghasilkan data jangkauan paling luas.Apa bedanya hashtag di caption dan di comment..?Sebenarnya tidak ada bedanya, hanya saja jika kita taruh hashtag di comment maka akan mempercantik tampilan caption dan orang tidak akan terganggu.Trus gimana dengan TikTok..? Ok, sekarang kita bahas TikTokGrabbing attention with audio, words, or the visual. 2 dan 3 detik pertama sangat menentukan apakah audience akan nonton sampai habis atau tidak. Contoh video: bagaimana caranya menjadi viral di Instagram, 3 tips menjadi pebisnis muda, 3 cara membuat video ciamik, video tutorial dan yang mengajarkan sesuatu yang rata-rata bisa menarik perhatian.Jika dilihat customer journey tik tok yang selalu swipe up, maka visual dan headline video menjadi penting untuk bisa membuat mereka mau untuk swipe up. Tips: lagu kalau bisa jangan pakai lagu sendiri, tapi pakailah lagu yang sedang trending di tik tok. Durasi video maksimal 30 detik saja.Jika ada orang yang melihat video yang kita posting beberapa bulan lalu sampai habis, maka video tersebut bisa terus naik di tik tok. Berbeda dengan Instagram yang sangat memperhatikan tanggal terbaru dari postingan kita.Di tik tok, meskipun kita tidak punya followers tapi postingan kita tetap bisa menjangkau banyak orang.Hashtag di tik tok bisa menjadi trending. Jika kita pakai hashtag yang sedang trend maka postingan kita bisa tetap naik. Jadi maksimalkan itu, tapi pakai hashtag yang sesuai dengan konten kita ya. Nah, gimana sobat eagles..? Sudah lebih jelas ya perbedaan antara 2 sosial media tersebut, tinggal pilih aja nih mana yang lebih sesuai untuk promosi bisnisnya masing-masing.Good luck..', '2020-11-15', 'Screenshot_(228).jpg', '2020-11-15', 1),
('PS00002', 'CT0004', 'ADM0000', 'Kenapa Universitas Jarang Melahirkan Pengusaha ', 'Mencetak pengusaha beda cara dengan mencetak karyawan. Seperti mengadon kue, harus tahu dulu kue apa yang akan dibuat. Adonan itu seperti urutan.\r\n\r\n1. Tentukan dulu tujuan, mau membuat apa.\r\n\r\nKarena membuat cake biasa tentunya akan berbeda adonannya dengan membuat brownies.\r\n\r\nTujuan harus jelas dan tidak boleh bias. Misal kita ingin membuat kue cake sekaligus brownies apakah bisa..?? Begitu juga jika ingin mencetak pengusaha sekaligus karyawan, itu akan susah nantinya. Tujuan harus satu agar kurikulum dan semua praktek bisa mengantarkan siswa menuju goalnya itu.\r\n\r\n2. Komposisi bahan\r\n\r\nTentukan bahan untuk membuat kue, misal tepung terigu, telor, mentega. Tapi semua bahan tersebut tidak cukup jika kita tidak tahu takarannya. Jika terigunya kebanyakan maka akan buat kue tersebut bantet dan keras misalnya.\r\n\r\n3. Urutan\r\n\r\nDalam membuat kue urutan bahan yang dimasukkan sangatlah penting. Tidak bisa kita memasukkan semua bahan secara bersamaan karena akan merusak tekstur yang diinginkan. Begitupun jika ingin mencetak pengusaha, ada urutan ilmu yang harus dipelajari terlebih dulu sesuai dengan levelnya. Jika orang yang baru mau mulai berbisnis diberi materi bisnis terkait systemizing, maka niscaya orang tersebut akan takut dan pusing duluan. Akhirnya bisnisnya tidak mulai-mulai. Tahapan pembelajaran sangat penting di sini. Oleh karena itu YEA sendiri memberikan materi 5 tangga bisnis agar siswa menerima asupan secara bertahap sesuai dengan levelnya.\r\n\r\n4. Cara pengerjaan\r\n\r\nCoba tanya pada ahlinya bakery atau tukang buat kue, maka akan paham bahwa cara mengadon cepat dan lambat akan sangat mempengaruhi tekstur dan hasil pada kue tersebut. Entah itu mengembangnya jadi berbeda, atau kelembutannya jadi berbeda.\r\n\r\n5. Alat bantu\r\n\r\nTentunya pemakaian alat bantu juga akan berpengaruh terhadap hasil. Adonan dengan tangan dan alat akan menghasilkan adonan yang berbeda. Tergantung dari apa yang mau kita buat, ada yang lebih baik menggunakan tanggan ada juga yang lebih baik menggunakan alat seperti mixer misalnya.\r\n\r\nMencetak pengusaha, maka kurang lebih akan terkait pada 3 hal ini:\r\n\r\n1. Tujuan\r\n\r\n2. Komposisi\r\n\r\n3. Takaran\r\n\r\nNah, mengapa universitas jarang menelurkan pengusaha meskipun universitas tersebut punya jurusan bisnis..??\r\n\r\nIni fenomena yang terjadi. Sekolah bisnis atau universitas yang ada sekarang ini adalah pengembangan dari ilmu manajemen. Jika kita ditawarkan sekolah manajemen itu biasanya akan ditawari manajemen keuangan, manajemen pemasaran, SDM, dan operasional. Dan kita hanya boleh pilih salah satu. Sedangkan bagi yang ingin menjadi pengusaha membutuhkan 4 materi tersebut.\r\n\r\n“Banyak kok Mas J sekolah bisnis yang sekarang juga menerapkan hal itu, kita jadi bisa mempelajari semuanya..”\r\n\r\nBetul, tapi masalahnya kurikulum mereka adalah pengembangan dari kurikulum manajemen untuk multinasional company yang seringkali tidak pas untuk UKM skalanya. Seringkali juga setelah dicek tujuan mereka selain untuk menciptakan entrepreneur juga menjadikan siswa agar bisa berkarir di perusahaan multinasional.\r\n\r\nBagi saya itu seperti sekolah banci alias 2 kepribadian yang berbeda. Di sisi lain dia ingin membuat siswanya jadi entrepreneur, di sisi lain dia memberi opsi lain pada siswanya agar bisa berkarir di suatu perusahaan. Jelas tidak bisa seperti itu. Jika ingin menjadi pengusaha ya harus menjalankan step –stepnya untuk menjadi pengusaha, yang mana sangat berbeda dengan step-stepnya orang yang mau jadi karyawan.\r\n\r\nOleh karena itu tujuan harus satu dan jelas, karena itu menentukan step-stepnya nanti.\r\n\r\nMakanya untuk YEA saya tidak menyetarakannya dengan universitas, karena memang bukan. YEA itu simpelnya merupakan kursus bisnis yang belajar intensif selama 6 bulan. Walaupun sebenarnya saya kurang sreg dalam waktunya dan ingin menjadikan kurikulumnya itu jadi 1 tahun agar bisa lebih menanamkan mindset pengusaha yang tidak mudah digeser.', '2020-10-17', 'Screenshot_(228).jpg', NULL, 1),
('PS00003', 'CT0004', 'ADM0000', 'Harga Sebuah Peluang', '\r\n\r\nSeringkah anda menerima peluang yang bukan bidangnya anda..? Atau sebaliknya, sering tidak peluangnya anda ada di tangan orang lain..?\r\n\r\nNah apa yang sering kita lakukan..? Kebanyakan orang (semoga bukan anda), akan selalu menjual peluang tersebut.\r\n\r\nA: “Hei bro/sis, ini ada peluang nih buat lo..”\r\n\r\nB: “Ok, bagi hasilnya berapa persen..?”\r\n\r\nA: “Buat gue 15 persen aja deh..”\r\n\r\nB: “Waduh turunin dikit dong..”\r\n\r\nA: “10 persen gimana..?”\r\n\r\nB: “Ok deal.”\r\n\r\nAkhirnya mereka berhasil membuat kesepakatan. Anggaplah A sebagai penjual peluang dan B selaku pembelinya.\r\n\r\nSi B tentunya akan menambahkan 10% tadi ke harga penawaran pada client-nya agar bisa membayar si A, atau yang disebut dengan mark up price. Begitu sampai di client, terjadi penolakan karena harga sudah tidak masuk lagi atau terlalu tinggi. Akhirnya peluang tersebut hilang, tidak didapatkan oleh si A maupun di B.\r\n\r\nNah bagaimana jika saat kita mendapatkan peluang yang bukan bidang kita kemudian kita berikan informasi tersebut pada orang yang memang ahli di bidang tersebut (kredibel) secara cuma-cuma, alias tidak memberikan syarat apapun atau tidak meminta persenan, apa yang akan terjadi..?\r\n\r\nInsya Allah akan terjadi ikatan persaudaraan.\r\n\r\nBesok bisa jadi, hal itu terjadi pada dirinya dia yang memberikan kepada anda. Atau mungkin dia tidak mendapatkan peluang yang anda miliki tapi mendapatkan peluang yang orang lain miliki, yang bukan milik dia. Karena dia sudah mendapatkan kebaikan, maka dia cenderung ingin memberi kebaikan juga pada orang lain.\r\n\r\nKebaikan dan ketulusan itu menular.\r\n\r\nKeberkahan dari apa yang kita lakukan tidak pernah meleset. Karena itu akan berdampak pada diri anda, meskipun kepada orang yang salah sekalipun.\r\n\r\nBayangkan jika hal ini kita lakukan bersama – sama secara konsisten, maka system kapitalis pun perlahan akan tumbang. Kenapa..?\r\n\r\nKarena salah satu fondasi yang meruntuhkan kapitalisme itu adalah ketulusan, lawan dari kapitalisme yang bersifat serakah dan opportunis.\r\n\r\nJadi, ‘give and don’t expect to take’ itu masuk akal kan..?\r\n\r\nSelain itu, ketulusan dan kebaikan akan membangun kredibilitas anda juga. Misal anda selalu memberikan peluang bisnis pada rekan anda yang membutuhkan tanpa imbalan sedikitpun. Otomatis rekan atau komunitas anda akan mengenal anda sebagai orang yang selalu memberikan solusi dan peluang selalu akan menghampiri anda dari arah yang tidak disangka-sangka.\r\n\r\nMenurut anda apakah yang diberi peluang secara cuma-cuma akan melupakan kebaikan orang yang memberi peluang tersebut..? Tentu tidak. Ia akan selalu mengingat kebaikan itu dan jika mendapatkan peluang yang sesuai dengan si pemberi, ia cenderung akan menawarkan terlebih dulu pada si pemberi.\r\n\r\nAdakah orang yang paling berjasa untuk bisnis anda sekarang..? Yuk ingat kembali kebaikan mereka dan lakukan kebaikan yang sama untuk orang sekitar kita.\r\n\r\nSalam,\r\n\r\nJaya Setiabudi\r\n', '2020-11-03', '20170709_105802.jpg', NULL, 1),
('PS00004', 'CT0001', 'ADM0000', 'Bisnis Serakah Vs Bisnis Berkah ', '\r\n\r\nMungkin sebagian besar anak millenial akan berpiki r seperti ini:\r\n\r\n“Modal sekecil-kecilnya, untung sebesar-besarnya.&#8230;”\r\n\r\n“Repot rekrut pegawai, kalau bisa diurus sendiri ya kenapa harus ngeluarin uang buat bayar pegawai??”\r\n\r\n“Cari bisnis yang marginnya gede ah, biar untung juga gede dong..”\r\n\r\n“Nah loh.. Siapa yang mikir kaya gini juga?? Salah gak sih mikir kaya gitu??”\r\n\r\nKita jawab menggunakan studi kasus alumni YEA yang satu ini yuk, dia juga awalnya seperti itu dan sempat berjaya bisnisnya. Tapi siapa sangka dia bangkrut. Namun dari kebangkrutan itu membuatnya sadar bahwa dia sudah membuat kesalahan fatal.\r\n\r\nApakah itu?? Yuk simak ceritanya, karena siapa tahu bisa bermanfaat untuk bisnis kamu kedepannya.\r\n\r\nHalo, aku Ayu alumni YEA 27. Di tahun 2017 aku merintis bisnis kue brownis bernama Brozza. Saat itu sedang semangat-semangatnya mengejar target omset. Tidur jarang, banyak begadang, pokoknya workaholic banget. Alhamdulillah Allah kasih aku kelancaran dan rejeki berlimpah saat itu buat Brozza, hingga di akhir tahun aku bisa membantu orang tua untuk umroh.\r\n\r\nSemua aku kerjakan sendiri, tidak ada pegawai sama sekali. Nah muncullah kebanggaan dalam diri dan berpikir bahwa semuanya itu adalah hasil dari jeri payahku sendiri. Aku pun tidak mau merekrut pegawai karena berpikir untuk menyimpan uang lebih banyak.\r\n\r\nSaat Brozza sedang di atas angin, disitulah setan menggoda lebih jauh. Membuatku berpikir untuk membuka bisnis lain yang marginnya lebih besar. Ditambah keadaan kas yang tipis karena terpakai umroh kemarin, otakku terus berpikir bagaimana caranya mendapatkan uang banyak dalam waktu cepat. Akhirnya aku mengambil tindakan untuk membuka bisnis fashion yang notabene marginnya jauh lebih besar. Untuk modal, aku cari investor kesana kemari.\r\n\r\nSingkat cerita, investor berhasil aku dapatkan dari teman-teman dan terkumpul 20 juta rupiah. Senang sekali rasanya, dan Alhamdulillah Allah sekali lagi memberikan aku kelancaran hingga aku terlena dan meninggalkan Brozza begitu saja.\r\n\r\nKarena merasa lancar dan aman-aman saja aku tidak cepat mengembalikan uang pada investor, uang tersebut malah aku pakai lagi untuk beli stok. Dan sekali lagi, aku tidak merekrut pegawai satupun.\r\n\r\nHehe.. iya iya..aku tahu mungkin kalian yang membaca ini kesal sekali. Ok kita lanjut dulu ya ceritanya..\r\n\r\nNah pada saat uangnya aku putar, dipakai untuk beli stok, iklan, dan segala macam, tapi ternyata orderan mulai sepi. “Duh, salah dimananya ya?? Mana investor pada nanyain uangnya lagi.”\r\n\r\nInvestor mulai tidak sabar menunggu uangnya, mereka marah dan kesal sekali. Di saat itu aku down, dan berpikir untuk membuat brozza dari awal lagi namun merasa sudah tidak ada semangat.\r\n\r\nAku pun merenung di kamar sendirian, uang tidak ada, hanya bisa menangis, dan tidak tahu mau cerita pada siapa.\r\n\r\nSaat itulah Allah menyadarkan aku bahwa aku telah membuat kesalahan besar. Yaitu, niat.\r\n\r\nYap, niatku dari awal membuat bisnis adalah salah. Hanya untuk menguntungkan diri sendiri, serakah, kapitalis, dan tidak mementingkan kebutuhan orang lain. Tidak melihat kanan kiri yang mana mungkin orang saat itu sedang membutuhkan pekerjaan dan sebenarnya aku bisa menggaji pegawai. Namun aku malah tidak mau menjadi saluran rejeki untuk mereka.\r\n\r\nDi saat yang sama, muncul juga rasa gengsi di hadapan teman-teman. Bagaimana jika mereka mengetahui kondisi aku yang sedang bangkrut dan dikejar-kejar orang. Duh pasti malu banget.\r\n\r\nKarena tidak tahu harus melakukan apa, Alhamdulillah mulai ada keinginan untuk solat tahajud lagi. Dan merasa menyesal sekali, menangis, dan minta ampun pada Allah. Curhat selama mungkin pada Allah, menumpahkan cerita. Seperti itu tiap malam.\r\n\r\nTapi kalian tahu tidak?? Setelah cerita pada Allah dan mengakui dosa, rasanya lega sekali. Meskipun masalahnya belum selesai, tapi Allah menenangkan hatiku dan membuatku mantap untuk bangkit dari awal lagi.\r\n\r\nAkhirnya aku mencoba menghubungi reseller dan pelanggan lama satu persatu. Pelan – pelan aku mulai lagi dari awal sembari meluruskan niat dalam bisnis. Jika dulu untuk mencari uang, maka sekarang aku meniatkan untuk membantu orang lain juga. Untuk menjadi salah satu saluran rejeki bagi mereka.\r\n\r\nTidak banyak berpikir, aku mulai merekrut 2 orang karyawan dengan hari kerja tidak setiap hari. Karena orderan belum sebanyak dulu, aku hanya bisa menggaji mereka 50ribu/hari. Mungkin kecil untuk kita, tapi ternyata sangat berharga bagi mereka. Dan di akhir tahun 2018, aku meminta bantuan pada Mas Rafli Egy (alumni YEA juga) untuk membantu memasarkan Brozza.\r\n\r\nAlhamdulillah semenjak itu Allah mulai memberiku banyak orderan hingga aku bisa merekrut pegawai lagi. Saat ini, total 6 tim produksi, 2 admin, dan 6 sales di dodolo.id.\r\n\r\nAlhamdulillah, aku belajar banyak hal. Kalau kita ingin mempunyai bisnis yang berkah dan rejeki yang banyak ya harus banyak orang juga yang dilibatkan karena akan semakin banyak doa yang dipanjatkan. Dan kita tidak akan pernah tahu doa siapa yang dikabulkan.\r\n\r\nRamadhan ini menjadi titik balik bagiku. Haru terasa saat melihat karyawan yang kebanyakan ibu-ibu, mereka membeli takjil dan buka puasa menggunakan gaji yang aku beri. Bahagia terpancar dan mereka terlihat seperti tidak ada lelahnya. “Ya Allah kemana aja aku selama ini…????”\r\n\r\nNah, itulah bisnis yang berkah. Saat bisnis kita menjadi manfaat bagi sekitar. Semoga cerita ini dapat menjadi inspirasi untuk kita semua.\r\n', '2020-11-04', 'Screenshot_(228).jpg', NULL, 0),
('PS00005', 'CT0001', 'ADM0000', 'saf', '&lt;h1&gt;berapa&lt;/h1&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;h5&gt;saflskjflk&lt;/h5&gt;&lt;p&gt;askfjasf&lt;u&gt;falskflaksflaknfk&lt;/u&gt;a&lt;b&gt;&lt;u&gt;sf&lt;i&gt;af&lt;/i&gt;&lt;/u&gt;&lt;/b&gt;&lt;br&gt;&lt;/p&gt;', '2020-11-16', '20170507_070504.jpg', '2020-11-16', 0),
('PS00006', 'CT0001', 'ADM0000', 'sajh', '&lt;h1&gt;BErapa&lt;br&gt;&lt;/h1&gt;', '2020-11-16', '20170507_0705041.jpg', '2020-11-16', 0);

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
('TG0003', 'berwirausaha');

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

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`ID_TOKEN`, `EMAIL`, `TOKEN`, `DATE`) VALUES
(2, 'bayuagil04@gmail.com', 'm6BnYQZopkfix2uETnEphIAvrBg83eI5o4hU1Dx8IDw=', '1606469011'),
(3, 'kurak4647@gmail.com', '0QMa1k6NFC+tncdlZijdCoZpNl4KBeYuNOwvK2nQxfg=', '1606490057'),
(4, 'kurak4647@gmail.com', 'fJiDOvT6Qch//LoR7Rexo2lLkRE940FqiM2a3RjQICg=', '1606490078'),
(5, 'kurak4647@gmail.com', 'lffRvXusGBu94CaoSOdfBZmSIXExHU5gEWDaDj4Ny78=', '1606490333'),
(6, 'roykiyosi@gmail.com', 's0iOwk/gEJcLtgQ7oZUPfmUVdNff61/yKl+T3qgE8Yc=', '1606491909'),
(8, 'kurak4647@gmail.com', '6+FbOYo3Cwk2zufq4u9/0mBoiohY2LRxJlDTblmVX5M=', '1606817634'),
(9, 'alex@gmail.com', 'P9gX8ZDomKqTb0Yvxl5SiubtiEEvUcs7kjj0/+M35wE=', '1606817976');

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

-- --------------------------------------------------------

--
-- Table structure for table `webinar`
--

CREATE TABLE `webinar` (
  `ID_WEBINAR` int(11) NOT NULL,
  `TEMA` varchar(50) NOT NULL,
  `PEMBICARA` varchar(50) NOT NULL,
  `FOTO_PEMBICARA` varchar(100) NOT NULL,
  `HARGA` varchar(20) NOT NULL,
  `PLATFORM` varchar(20) NOT NULL,
  `TGL_WEB` date NOT NULL,
  `TGL_POSTWEB` varchar(20) DEFAULT NULL,
  `ST_POSTWEB` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`ID_WEBINAR`, `TEMA`, `PEMBICARA`, `FOTO_PEMBICARA`, `HARGA`, `PLATFORM`, `TGL_WEB`, `TGL_POSTWEB`, `ST_POSTWEB`) VALUES
(1, 'Coba', 'Mustika Khoiri', 'aku.jpg', 'GRATIS', 'ZOOM', '2020-12-21', NULL, NULL);

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
-- Indexes for table `detail_fasilitas_webinar`
--
ALTER TABLE `detail_fasilitas_webinar`
  ADD KEY `ID_FA` (`ID_FA`),
  ADD KEY `ID_WEBINAR` (`ID_WEBINAR`);

--
-- Indexes for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD KEY `FK_MENGIKUTI2` (`ID_PS`),
  ADD KEY `ID_KLS` (`ID_KLS`,`ID_PS`) USING BTREE;

--
-- Indexes for table `detail_materi`
--
ALTER TABLE `detail_materi`
  ADD KEY `ID_MT` (`ID_MT`,`ID_KLS`),
  ADD KEY `ID_KLS` (`ID_KLS`);

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
  ADD KEY `FK_MENGUMPULKAN2` (`ID_TG`),
  ADD KEY `ID_PS` (`ID_PS`,`ID_TG`) USING BTREE;

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`ID_DISKON`);

--
-- Indexes for table `fasilitas_webinar`
--
ALTER TABLE `fasilitas_webinar`
  ADD PRIMARY KEY (`ID_FA`);

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
-- Indexes for table `materi_sub`
--
ALTER TABLE `materi_sub`
  ADD PRIMARY KEY (`ID_SUB`),
  ADD KEY `ID_MT` (`ID_MT`);

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
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`ID_WEBINAR`);

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
  MODIFY `ID_KLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `key`
--
ALTER TABLE `key`
  MODIFY `ID_KEY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ktg_kelas`
--
ALTER TABLE `ktg_kelas`
  MODIFY `ID_KTGKLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `ID_MT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materi_sub`
--
ALTER TABLE `materi_sub`
  MODIFY `ID_SUB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medsos`
--
ALTER TABLE `medsos`
  MODIFY `ID_MS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `ID_NV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `ID_TOKEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `ID_WEBINAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_ROLE_ADM` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD CONSTRAINT `FK_MENGIKUTI` FOREIGN KEY (`ID_KLS`) REFERENCES `kelas` (`ID_KLS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENGIKUTI2` FOREIGN KEY (`ID_PS`) REFERENCES `peserta` (`ID_PS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_materi`
--
ALTER TABLE `detail_materi`
  ADD CONSTRAINT `detail_materi_ibfk_1` FOREIGN KEY (`ID_MT`) REFERENCES `materi` (`ID_MT`);

--
-- Constraints for table `detail_tags`
--
ALTER TABLE `detail_tags`
  ADD CONSTRAINT `FK_R_TAGS` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_R_TAGS2` FOREIGN KEY (`ID_TAGS`) REFERENCES `tags` (`ID_TAGS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_tugas`
--
ALTER TABLE `detil_tugas`
  ADD CONSTRAINT `FK_MENGUMPULKAN` FOREIGN KEY (`ID_PS`) REFERENCES `peserta` (`ID_PS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENGUMPULKAN2` FOREIGN KEY (`ID_TG`) REFERENCES `tugas` (`ID_TG`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK_KTG_KELAS` FOREIGN KEY (`ID_KTGKLS`) REFERENCES `ktg_kelas` (`ID_KTGKLS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENGAJAR` FOREIGN KEY (`ID_ADM`) REFERENCES `admin` (`ID_ADM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi_sub`
--
ALTER TABLE `materi_sub`
  ADD CONSTRAINT `materi_sub_ibfk_1` FOREIGN KEY (`ID_MT`) REFERENCES `materi` (`ID_MT`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `FK_ROLE_PS` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_KATEGORI` FOREIGN KEY (`ID_CT`) REFERENCES `category` (`ID_CT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEMPOSTING` FOREIGN KEY (`ID_ADM`) REFERENCES `admin` (`ID_ADM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_view`
--
ALTER TABLE `post_view`
  ADD CONSTRAINT `FK_POST_VIEW` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
