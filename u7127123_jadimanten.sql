-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2017 at 04:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7127123_jadimanten`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_foto`
--

CREATE TABLE `album_foto` (
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_foto`
--

INSERT INTO `album_foto` (`id_foto`, `id_user`, `nama_file`) VALUES
(1, 0, 'cicaks.dead@gmail.com1.jpg'),
(2, 0, 'cicaks.dead@gmail.com2.jpg'),
(3, 0, 'cicaks.dead@gmail.com3.jpg'),
(4, 0, 'cicaks.dead@gmail.com4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_guest` int(11) NOT NULL,
  `id_undangan` int(11) DEFAULT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_guest`, `id_undangan`, `comment`) VALUES
(1, 2147483647, NULL, 'jhghghj');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `locale`, `picture_url`, `created`, `modified`) VALUES
(1, 'google', '106932733263770224067', 'Rizaldi', 'Habibie', 'rizaldihabibie28@gmail.com', 'in', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-02-15 10:18:06', '2017-02-15 10:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id_user` int(15) NOT NULL,
  `kode_konfirmasi` varchar(32) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `undangan`
--

CREATE TABLE `undangan` (
  `id_undangan` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `link_url` varchar(250) NOT NULL,
  `nama_lengkap_pria` varchar(150) NOT NULL,
  `nama_lengkap_wanita` varchar(150) NOT NULL,
  `nama_panggilan_pria` varchar(150) NOT NULL,
  `nama_panggilan_wanita` varchar(150) NOT NULL,
  `nama_ayah_pria` varchar(150) NOT NULL,
  `nama_ibu_pria` varchar(150) NOT NULL,
  `nama_ayah_wanita` varchar(150) NOT NULL,
  `nama_ibu_wanita` varchar(150) NOT NULL,
  `tanggal_akad` date NOT NULL,
  `tempat_akad` varchar(150) NOT NULL,
  `jam_akad` time NOT NULL,
  `tanggal_resepsi` date NOT NULL,
  `tempat_resepsi` varchar(150) NOT NULL,
  `jam_resepsi` time NOT NULL,
  `nama_ayat` varchar(150) NOT NULL,
  `isi_ayat` varchar(150) NOT NULL,
  `maps_akad` varchar(150) NOT NULL,
  `maps_resepsi` varchar(150) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undangan`
--

INSERT INTO `undangan` (`id_undangan`, `id_user`, `link_url`, `nama_lengkap_pria`, `nama_lengkap_wanita`, `nama_panggilan_pria`, `nama_panggilan_wanita`, `nama_ayah_pria`, `nama_ibu_pria`, `nama_ayah_wanita`, `nama_ibu_wanita`, `tanggal_akad`, `tempat_akad`, `jam_akad`, `tanggal_resepsi`, `tempat_resepsi`, `jam_resepsi`, `nama_ayat`, `isi_ayat`, `maps_akad`, `maps_resepsi`, `updated_at`) VALUES
(3, 2, '', 'Rizaldi Habibie', 'Aisya Chikita Rahmawati', 'Habibie', 'aisya', 'Sonny C.B', 'Wahyu Utami', 'Agus', 'M', '0000-00-00', 'Rumah Aisya', '00:00:08', '0000-00-00', 'Gedung X', '00:00:13', 'test nama ayat', 'ini adalah isi dari ayat tersebut', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `hak_akses` tinyint(1) NOT NULL,
  `is_validated` enum('YES','NO') NOT NULL,
  `licence_agreement` enum('AGREE','NO') NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `notif` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `telepon`, `nama`, `hak_akses`, `is_validated`, `licence_agreement`, `is_active`, `is_delete`, `notif`, `created_at`, `updated_at`, `deleted_at`, `last_login`) VALUES
(1, 'niscalindo@gmail.com', 'a06d10b71d6ec6a69b2f90832f1591d4', '345345345', 'djnfjksg', 1, 'YES', 'AGREE', 0, 0, 1, '2017-02-07 22:31:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'cicaks.dead@gmail.com', '40e58ceeeccce8f6e4564a44edc22e33', '535435435', 'hggcgdgfdgf', 1, 'YES', 'AGREE', 1, 0, 1, '2017-02-07 22:35:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_user`
--

CREATE TABLE `verifikasi_user` (
  `id_user` int(15) NOT NULL,
  `kode_konfirmasi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifikasi_user`
--

INSERT INTO `verifikasi_user` (`id_user`, `kode_konfirmasi`) VALUES
(1, '4c743f432eb5e80ce56990446daee6b0'),
(2, '388d786e40272b28772135fd1c666f40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_foto`
--
ALTER TABLE `album_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undangan`
--
ALTER TABLE `undangan`
  ADD PRIMARY KEY (`id_undangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album_foto`
--
ALTER TABLE `album_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `undangan`
--
ALTER TABLE `undangan`
  MODIFY `id_undangan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `undangan`
--
ALTER TABLE `undangan`
  ADD CONSTRAINT `undangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
