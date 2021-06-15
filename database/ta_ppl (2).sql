-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 04:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kondisi` enum('Baru','Bekas','','') NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'default.png',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `user_id`, `nama`, `harga`, `deskripsi`, `kondisi`, `kategori`, `lokasi`, `image`, `created_at`) VALUES
(1, 7, 'Kemeja Distro Gaul2', 12000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente officia est suscipit eos laboriosam, incidunt quasi ratione provident velit! Esse cum adipisci doloribus molestiae, natus dignissimos pariatur excepturi. Omnis fugit doloremque delectus voluptatum nam officia voluptas magnam, excepturi nemo laudantium. Itaque, optio? Placeat illo minima quos consequatur nisi doloribus ratione!\"\"\"\"', 'Baru', 'Makanan dan Minuman', 'Semarang', 'im-60c776301c849.png', '2021-06-14'),
(6, 7, '3333', 10000, 'www', 'Baru', 'Makanan dan Minuman', 'Bantul', 'default.png', '2021-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `slug` text NOT NULL,
  `isi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('Pending','Publish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `user_id`, `judul`, `slug`, `isi`, `image`, `created_at`, `status`) VALUES
(2, 7, 'Pelatihan Website Sekolah Dasar Tahap 4', 'Pelatihan-Website-Sekolah-Dasar-Tahap-4', '<p><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\">Diskominfo Kota Semarang melakukan pelatihan website sd tahap 4. Kali&nbsp;ini pelatihan tersebut dilakukan di SDN Srondol Kulon 2.</span><br style=\"margin: 0px; padding: 0px; -webkit-tap-highlight-color: transparent; zoom: 1; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\">Diskominfo Kota Semarang yang di dampingi oleh Dinas Pendidikan Kota Semarang akan terus melakukan pelatihan website sekolah dasar yang berjumlah 400an ini bertujuan supaya guru maupun murid dapat mengakses tentang profil sekolah mereka dan melakukan sekolah online secara mudah dalam kondisi pandemi seperti ini.</span><br></p>', 'im-60c7ef4d5f152.crdownload', '2021-06-14 19:07:41', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pt` varchar(255) NOT NULL,
  `tlp` varchar(255) DEFAULT NULL,
  `tipe` enum('Full Time','Part Time') NOT NULL,
  `lokasi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `image` varchar(255) DEFAULT 'default.png',
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id`, `user_id`, `posisi`, `email`, `pt`, `tlp`, `tipe`, `lokasi`, `deskripsi`, `created_at`, `image`, `gaji`) VALUES
(2, 7, 'Frontend Developer', 'wisnuputrapratama24@gmail.com', 'PT. Wisnu Membangun Indonesia', '085700924165', 'Full Time', 'semarang', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente officia est suscipit eos laboriosam, incidunt quasi ratione provident velit! Esse cum adipisci doloribus molestiae, natus dignissimos pariatur excepturi. Omnis fugit doloremque delectus voluptatum nam officia voluptas magnam, excepturi nemo laudantium. Itaque, optio? Placeat illo minima quos consequatur nisi doloribus ratione!', '2021-06-14 11:21:46', 'default.png', 5000000),
(3, 7, 'Backend Developer', 'wisnuputrapratama24@gmail.com', 'PT. Wisnu Membangun Indonesia', '', 'Full Time', 'Kendal', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente officia est suscipit eos laboriosam, incidunt quasi ratione provident velit! Esse cum adipisci doloribus molestiae, natus dignissimos pariatur excepturi. Omnis fugit doloremque delectus voluptatum nam officia voluptas magnam, excepturi nemo laudantium. Itaque, optio? Placeat illo minima quos consequatur nisi doloribus ratione!', '2021-06-14 11:24:03', 'default.png', 7000000),
(4, 7, 'Warehouse Supervisor (Jabodetabek)', 'wisnuputrapratama24@gmail.com', 'PT. Wisnu Membangun Indonesia', '', 'Full Time', 'Bantul', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente officia est suscipit eos laboriosam, incidunt quasi ratione provident velit! Esse cum adipisci doloribus molestiae, natus dignissimos pariatur excepturi. Omnis fugit doloremque delectus voluptatum nam officia voluptas magnam, excepturi nemo laudantium. Itaque, optio? Placeat illo minima quos consequatur nisi doloribus ratione!', '2021-06-14 11:24:22', 'default.png', 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `role_id` enum('admin','user') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `tlp`, `password`, `is_active`, `role_id`, `created_at`) VALUES
(7, 'Wisnu Pratama', 'wisnuputrapratama24@gmail.com', '081', '$2y$10$9IeP8nHAAMfh0XBfJgUfCOO5qujnivsPAsLQgSNxvL0R03kMsh62C', '1', 'admin', '2021-06-14 03:24:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
