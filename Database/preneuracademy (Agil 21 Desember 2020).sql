-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2020 pada 16.46
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
  `DATE_ADM` int(11) NOT NULL,
  `UPDATE_ADM` int(11) NOT NULL,
  `UPDATE_PSWADM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_ADM`, `ID_ROLE`, `FTO_ADM`, `NM_ADM`, `HP_ADM`, `ALMT_ADM`, `EMAIL_ADM`, `PSW_ADM`, `ACTIVE`, `DATE_ADM`, `UPDATE_ADM`, `UPDATE_PSWADM`) VALUES
('ADM0000', 1, 'tepung.jpg', 'AHP', '089775667775', 'Solo, Jawa Tengah.', 'turtleninjaaa77@gmail.com', '$2y$10$ZN7xKarMFaxyPLS2AbLeAOU8Iw9SHshJJRl2ZXOEIgQvnSPknRiLi', 1, 0, 1608043593, 1605846423);

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
('CT0004', 'Akuntansi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `ID_TRN` varchar(20) NOT NULL,
  `ID_KLS` int(11) NOT NULL,
  `ID_PS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_kelas`
--

INSERT INTO `detail_kelas` (`ID_TRN`, `ID_KLS`, `ID_PS`) VALUES
('TRN118291475', 39, 'PS00000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_materi`
--

CREATE TABLE `detail_materi` (
  `ID_MT` int(11) NOT NULL,
  `ID_KLS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_materi`
--

INSERT INTO `detail_materi` (`ID_MT`, `ID_KLS`) VALUES
(1, 12),
(2, 12),
(3, 12),
(4, 16),
(5, 12),
(7, 12),
(8, 12),
(9, 12),
(10, 12),
(11, 12);

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
('PS00001', 'TG0002'),
('PS00002', 'TG0002'),
('PS00003', 'TG0003'),
('PS00004', 'TG0003'),
('PS00006', 'TG0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_tugas`
--

CREATE TABLE `detil_tugas` (
  `ID_PS` varchar(10) NOT NULL,
  `ID_TG` varchar(10) NOT NULL,
  `ID_MT` int(11) NOT NULL
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
  `ID_KLS` int(11) NOT NULL,
  `ID_ADM` char(10) NOT NULL,
  `ID_KTGKLS` int(11) NOT NULL,
  `ID_DISKON` int(11) NOT NULL,
  `TITTLE` varchar(50) DEFAULT NULL,
  `PERMALINK` varchar(250) DEFAULT NULL,
  `GBR_KLS` varchar(100) DEFAULT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `STAT` char(1) DEFAULT NULL,
  `DATE_KLS` int(11) DEFAULT NULL,
  `UPDATE_KLS` int(11) DEFAULT NULL,
  `LOK_KLS` varchar(50) NOT NULL,
  `TGL_MULAI` varchar(20) NOT NULL,
  `TGL_SELESAI` varchar(20) NOT NULL,
  `HARI` varchar(30) NOT NULL,
  `JAM_MULAI` varchar(20) NOT NULL,
  `JAM_SELESAI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`ID_KLS`, `ID_ADM`, `ID_KTGKLS`, `ID_DISKON`, `TITTLE`, `PERMALINK`, `GBR_KLS`, `DESKRIPSI`, `PRICE`, `STAT`, `DATE_KLS`, `UPDATE_KLS`, `LOK_KLS`, `TGL_MULAI`, `TGL_SELESAI`, `HARI`, `JAM_MULAI`, `JAM_SELESAI`) VALUES
(12, 'ADM0000', 4, 0, 'Dasar-dasar berwirausaha', 'dasar', 'WhatsApp_Image_2020-12-20_at_10_43_29_(2).jpeg', 'Kelas ini merupakan kelas dasar bagi para pemula yang ingin terjun ke dunia bisnis', 100000, '1', 1605844837, 1608467297, 'Online Class', '2020-12-20', '2021-01-09', '3 Hari (Senin-Rabu)', '', ''),
(16, 'ADM0000', 6, 0, 'Bisnis Digital', 'digital', 'Hydrangeas.jpg', 'Ini kelas bisnis digital&lt;u&gt;&lt;b&gt;&lt;br&gt;&lt;/b&gt;&lt;/u&gt;', 250000, '1', 1606143974, 1606934941, '', '', '', '', '', ''),
(39, 'ADM0000', 5, 0, 'Strategi Bisnis Lewat Sosmed', 'sosmed', 'Penguins.jpg', '&lt;p&gt;ini kelas sosmed&lt;br&gt;&lt;/p&gt;', 300000, '1', 1607334601, 0, '', '', '', '', '', ''),
(40, 'ADM0000', 6, 0, 'Pariwisata yuhu', 'http://pariwisata.com', 'unnamed.jpg', '&lt;p&gt;asnfjsnfasnfjkanskfafa&lt;/p&gt;', 10000, '1', 1607853987, 1607864524, 'Online Class', '2020-12-13', '2020-12-15', '6 Hari (Senin-Sabtu)', '', '');

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
(4, 'Dasar', NULL, 1608466148),
(5, 'Lanjutan', 1605843085, 0),
(6, 'Advance', 1605843803, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `ID_MT` int(11) NOT NULL,
  `NM_MT` varchar(50) NOT NULL,
  `DETAIL_MT` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`ID_MT`, `NM_MT`, `DETAIL_MT`) VALUES
(1, 'Pengenalan Kelas', '<p>Pada tahap  ini akan diberikan pengenalan mengenai kelas kursus ini.</p>'),
(2, 'Pekan 1', '<p>Pengenalan mengenai pengertian kursus sebagai dasar wirausaha</p>'),
(3, 'Pekan 2', '<p>Dasar pengetahuan wirausaha muda</p>'),
(4, 'Pengenalan', '<p>BAB 1 Pengenalan Kelas dan Materi</p>'),
(5, 'Pekan 3', '<p>oke<br></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_sub`
--

CREATE TABLE `materi_sub` (
  `ID_SUB` int(11) NOT NULL,
  `ID_MT` int(11) NOT NULL,
  `NM_SUB` varchar(40) NOT NULL,
  `FILE_SUB` varchar(100) NOT NULL,
  `ICON_SUB` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi_sub`
--

INSERT INTO `materi_sub` (`ID_SUB`, `ID_MT`, `NM_SUB`, `FILE_SUB`, `ICON_SUB`) VALUES
(1, 2, 'Presentasi kelas 1', 'Mantap.pdf', 'fas fa-file-pdf'),
(4, 3, 'Kelas', 'Konsep_Etika_Bisnis.pptx', 'fas fa-file-powerpoint'),
(5, 2, 'Dasar wirausaha', 'Manajemen_kualitas_(Tugas_2).docx', 'fas fa-file-word'),
(6, 1, 'Presentasi kelas 1', 'Rancangan_Anggaran_Biaya.docx', 'fas fa-file-word'),
(7, 3, 'Pengenalan GIS', '01_-_Sekilas_Tentang_GIS.pdf', 'fas fa-file-pdf'),
(8, 3, 'Materi 2', 'Agile.docx', 'fas fa-file-word');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `ID_NOT` int(11) NOT NULL,
  `GLOBAL_ID` varchar(128) NOT NULL,
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

INSERT INTO `notif` (`ID_NOT`, `GLOBAL_ID`, `TITTLE_NOT`, `MSG_NOT`, `LINK`, `IS_READ`, `ST_NOT`, `DATE_NOT`) VALUES
(35, '68243ac1-4654-4849-988a-6700c6b29b16', 'Transaksi baru', 'Order id TRN118291475, atas nama budi.', 'admin/transaksi/detpending/68243ac1-4654-4849-988a-6700c6b29b16', '1', '0', '2020-12-20 23:42:50'),
(55, 'PS00000002', 'Pendaftar baru', 'Ada pendaftar baru, atas nama Kura Gayming.', 'admin/peserta', '1', '0', '2020-12-21 16:47:23'),
(56, 'PS00000002', 'Selamat datang!', 'Selamat bergabung di Preneur Academy ', 'peserta/profil', '0', '1', '2020-12-21 16:47:24'),
(57, 'PS00000002', 'Aktivasi akun', 'Pendaftar dengan nama Kura Gayming berhasil mangaktivasi akun.', 'admin/peserta', '1', '0', '2020-12-21 16:47:24');

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
  `JURUSAN` varchar(100) DEFAULT NULL,
  `UNIVERSITAS` varchar(100) DEFAULT NULL,
  `SMT_PS` varchar(5) DEFAULT NULL,
  `LAMA_KERJA` varchar(5) DEFAULT NULL,
  `HP_PS` varchar(15) DEFAULT NULL,
  `ALMT_PS` text DEFAULT NULL,
  `EMAIL_PS` varchar(30) DEFAULT NULL,
  `PSW_PS` varchar(100) DEFAULT NULL,
  `ACTIVE` varchar(1) DEFAULT NULL,
  `DATE_CREATE` varchar(15) DEFAULT NULL,
  `STATUS_BELI` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`ID_PS`, `ID_ROLE`, `FTO_PS`, `NM_PS`, `JK_PS`, `AGAMA_PS`, `USIA_PS`, `KOTA`, `PEKERJAAN`, `JURUSAN`, `UNIVERSITAS`, `SMT_PS`, `LAMA_KERJA`, `HP_PS`, `ALMT_PS`, `EMAIL_PS`, `PSW_PS`, `ACTIVE`, `DATE_CREATE`, `STATUS_BELI`) VALUES
('PS00000001', 2, 'default.jpg', 'budi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '089998778998', NULL, 'budi@gmail.com', '$2y$10$jJJO7Oi2mU0/GTU249xD7OAnYnJgftfRe6KxdE9Y7y3w.cl3kUZXq', '1', '1608393656', '201'),
('PS00000002', 2, 'default.jpg', 'Kura Gayming', 'Laki-laki', 'Islam', NULL, 'Kediri', 'Pelajar/Mahasiswa', NULL, NULL, NULL, NULL, '085736554445', 'Jember', 'kurak4647@gmail.com', '$2y$10$KurDs.psN0eGQFIHYp2wReR6w2ZXcbTPXDy.UEMoZhCAXEk5IVnOC', '1', '1608544043', '0');

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
  `ST_POST` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`ID_POST`, `ID_CT`, `ID_ADM`, `JUDUL_POST`, `KONTEN_POST`, `TGL_POST`, `FOTO_POST`, `UPDT_TRAKHIR`, `ST_POST`) VALUES
('PS00001', 'CT0003', 'ADM0000', 'Kenapa Universitas Jarang Melahirkan Pengusahaa ', '&lt;b&gt;Wait,,&lt;/b&gt; bagi kamu yang lagi cari channel buat promosiin produk atau bisnis, coba simak dulu hasil analisis dari Mas Fardi Yandi founder Social Kreatif tentang perbandingan antara Instagram dan TikTok berikut ini ya..Ok, kita mulai dengan InstagramGrabbing attention-nya dengan visual berupa warna atau typografi. Jadi sebelum kita bicara value, kita harus tahu dulu apa yang bisa membuat orang berhenti dan mau melihat postingan kita. Salah satu yang bisa membuat netizen Instagram tertarik yaitu warna dan typografi (misal tulisan atau headline yang clickbait). Setelah itu, kita satukan warna tadi dengan value yang ingin kita berikan pada mereka. Sekarang mengapa konten microblog bisa cepat viral..? Instagram punya data konsumsi waktu setiap orang pada setiap postingan. Postingan yang berhasil membuat orang berlama-lama melihatnya, akan cepat dinaikkan oleh Instagram. Nah microblog adalah salah satu jenis postingan yang bisa membuat orang berlama-lama di Instagram. Oleh karena itu lebih cepat viralnya.Hashtag adalah salah satu cara agar postingan kita bisa masuk ke explore. Tapi pertanyaannya adalah bagaimana cara menemukan hashtag yang tepat..? Sobat eagles bisa ikuti step organik berikut ya:1. List 5 kompetitor dan list masing-masing hashtag-nya2. Misal ada 50 hashtag, kemudian kita bagi jadi 3 kelompok A, B, C.3. Lalu kita bandingkan hasilnya dengan cara misal hari ini kita posting dengan hashtag kelompok A, besoknya kelompok B, dan besoknya lagi kelompok C.4. Kita data sehabis 24 jam posting, likenya berapa, sharenya berapa, jangkauannya berapa.5. Pilih kelompok hashtag yang menghasilkan data jangkauan paling luas.Apa bedanya hashtag di caption dan di comment..?Sebenarnya tidak ada bedanya, hanya saja jika kita taruh hashtag di comment maka akan mempercantik tampilan caption dan orang tidak akan terganggu.Trus gimana dengan TikTok..? Ok, sekarang kita bahas TikTokGrabbing attention with audio, words, or the visual. 2 dan 3 detik pertama sangat menentukan apakah audience akan nonton sampai habis atau tidak. Contoh video: bagaimana caranya menjadi viral di Instagram, 3 tips menjadi pebisnis muda, 3 cara membuat video ciamik, video tutorial dan yang mengajarkan sesuatu yang rata-rata bisa menarik perhatian.Jika dilihat customer journey tik tok yang selalu swipe up, maka visual dan headline video menjadi penting untuk bisa membuat mereka mau untuk swipe up. Tips: lagu kalau bisa jangan pakai lagu sendiri, tapi pakailah lagu yang sedang trending di tik tok. Durasi video maksimal 30 detik saja.Jika ada orang yang melihat video yang kita posting beberapa bulan lalu sampai habis, maka video tersebut bisa terus naik di tik tok. Berbeda dengan Instagram yang sangat memperhatikan tanggal terbaru dari postingan kita.Di tik tok, meskipun kita tidak punya followers tapi postingan kita tetap bisa menjangkau banyak orang.Hashtag di tik tok bisa menjadi trending. Jika kita pakai hashtag yang sedang trend maka postingan kita bisa tetap naik. Jadi maksimalkan itu, tapi pakai hashtag yang sesuai dengan konten kita ya. Nah, gimana sobat eagles..? Sudah lebih jelas ya perbedaan antara 2 sosial media tersebut, tinggal pilih aja nih mana yang lebih sesuai untuk promosi bisnisnya masing-masing.Good luck..', '2020-11-15', 'Screenshot_(228).jpg', '2020-11-15', 1),
('PS00002', 'CT0004', 'ADM0000', 'Kenapa Universitas Jarang Melahirkan Pengusaha ', '', '2020-10-17', 'Screenshot_(228).jpg', NULL, 1),
('PS00003', 'CT0004', 'ADM0000', 'Harga Sebuah Peluang', NULL, '2020-11-03', '20170709_105802.jpg', NULL, 1),
('PS00004', 'CT0001', 'ADM0000', 'Bisnis Serakah Vs Bisnis Berkah ', NULL, '2020-11-04', 'Screenshot_(228).jpg', NULL, 0),
('PS00005', 'CT0001', 'ADM0000', 'saf', NULL, '2020-11-16', '20170507_070504.jpg', '2020-11-16', 0),
('PS00006', 'CT0001', 'ADM0000', 'sajh', NULL, '2020-11-16', '20170507_0705041.jpg', '2020-11-16', 0);

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
('TG0003', 'berwirausaha');

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
(21, 'kurakk4647@gmail.com', 'e3WWxbkpAAYDXE+O8P1X19AOVsFyghhi6PaUZwPtppQ=', '1608543698');

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
('TRN118291475', '68243ac1-4654-4849-988a-6700c6b29b16', 300000, 'bank_transfer', 'bri', '120941949181547154', '2020-12-20 23:42:50', 'https://app.sandbox.midtrans.com/snap/v1/transactions/28889db9-4bf5-4f2a-bc45-1917f98126a9/pdf', 39, 'PS00000001', '201', '2020-12-21 23:42:52', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `ID_TG` varchar(10) NOT NULL,
  `ID_MT` int(11) NOT NULL,
  `DETAIL_TG` varchar(255) DEFAULT NULL,
  `DEADLINE` varchar(20) DEFAULT NULL,
  `FILE_TG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `ID_KLS` (`ID_KLS`,`ID_PS`) USING BTREE,
  ADD KEY `ID_TRN` (`ID_TRN`);

--
-- Indeks untuk tabel `detail_materi`
--
ALTER TABLE `detail_materi`
  ADD KEY `ID_MT` (`ID_MT`,`ID_KLS`),
  ADD KEY `ID_KLS` (`ID_KLS`);

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
  ADD KEY `ID_PS` (`ID_PS`,`ID_TG`) USING BTREE,
  ADD KEY `ID_MT` (`ID_MT`);

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
  ADD PRIMARY KEY (`ID_SUB`),
  ADD KEY `ID_MT` (`ID_MT`);

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
  ADD KEY `GLOBAL_ID` (`GLOBAL_ID`);

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
  MODIFY `ID_KB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `ID_KLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `ID_MT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `ID_NV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `ID_NOT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `ID_TOKEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_ROLE_ADM` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD CONSTRAINT `FK_MENGIKUTI` FOREIGN KEY (`ID_KLS`) REFERENCES `kelas` (`ID_KLS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENGIKUTI2` FOREIGN KEY (`ID_PS`) REFERENCES `peserta` (`ID_PS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_materi`
--
ALTER TABLE `detail_materi`
  ADD CONSTRAINT `detail_materi_ibfk_2` FOREIGN KEY (`ID_KLS`) REFERENCES `kelas` (`ID_KLS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_tags`
--
ALTER TABLE `detail_tags`
  ADD CONSTRAINT `FK_R_TAGS` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_R_TAGS2` FOREIGN KEY (`ID_TAGS`) REFERENCES `tags` (`ID_TAGS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detil_tugas`
--
ALTER TABLE `detil_tugas`
  ADD CONSTRAINT `FK_MENGUMPULKAN` FOREIGN KEY (`ID_PS`) REFERENCES `peserta` (`ID_PS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENGUMPULKAN2` FOREIGN KEY (`ID_TG`) REFERENCES `tugas` (`ID_TG`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK_KTG_KELAS` FOREIGN KEY (`ID_KTGKLS`) REFERENCES `ktg_kelas` (`ID_KTGKLS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENGAJAR` FOREIGN KEY (`ID_ADM`) REFERENCES `admin` (`ID_ADM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `FK_ROLE_PS` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_KATEGORI` FOREIGN KEY (`ID_CT`) REFERENCES `category` (`ID_CT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEMPOSTING` FOREIGN KEY (`ID_ADM`) REFERENCES `admin` (`ID_ADM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `post_view`
--
ALTER TABLE `post_view`
  ADD CONSTRAINT `FK_POST_VIEW` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
