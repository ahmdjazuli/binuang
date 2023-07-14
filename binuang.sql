-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 05:12 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binuang`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `tanggal`, `gambar`, `judul`, `kategori`, `konten`) VALUES
(89, '2020-06-30 21:09:37', 'foto/Thumb29.jpg', 'WOW, anak ini Punya TT Gede', 'Tutorial', '  Lorem ipsum dolor sit amet, c<span style=\"background-color: rgb(206, 198, 206);\">onsectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi u</span>t aliquip ex ea commodo\r\nconsequat. Duis<span style=\"background-color: rgb(8, 49, 57);\"> aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint </span>occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.  '),
(90, '2020-06-30 21:23:58', 'foto/Thumb28.jpg', 'Lihatlah, anak ini Punya TT Gede padahal masih Bocil!', 'Viral', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus voluptates molestiae omnis laudantium animi, eos veritatis cumque temporibus quibusdam ex officiis nulla itaque, doloribus nobis mollitia pariatur molestias, aspernatur qui? asddsad sadas dasd\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus voluptates molestiae omnis laudantium animi, eos veritatis cumque temporibus quibusdam ex officiis nulla itaque, doloribus nobis mollitia pariatur molestias, aspernatur qui?'),
(91, '2020-06-30 21:28:29', 'foto/cekaceka.jpg', 'Cara Membuat Hati Tak Bergetak', 'Tutorial', ' Lorem ipsum dolor sit amet, consecte Lorem ipsum do Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus voluptates molestiae omnis laudantium animi, eos veritatis cumque temporibus quibusdam ex officiis nulla itaque, doloribus nobis mollitia pariatur molestias, aspernatur qui? natur qui? '),
(92, '2020-06-30 21:52:23', 'foto/Thumb14.jpg', 'Terlalu lama Sendiri', 'nasional', '<p><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</b></p><p><b>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</b></p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` enum('admin','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `jabatan`, `alamat`, `jk`, `telp`, `tgl`, `foto`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', 'Programmer', 'Komplek Pangeran Antasari no.32 Rt.3 Rt.5 Martapura', 'Laki-Laki', '089724721385', '2020-06-30', 'foto/IMG_20180109_155910_207.jpg', 'admin'),
(2, 'Pipi Pikachi', 'pipi46', 'pipi', 'youyuber', 'Komplek Pangeran Antasari no.32 Rt.3 Rt.5 Banjarbaru', 'Perempuan', '2090918490', '2020-06-01', 'foto/31694821_2082162665159709_3574322382740914176_n.jpg', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
