-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2022 at 07:15 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemweb-project-uts2`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_kamar` int(11) DEFAULT '0',
  `nama_file` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kamar_kost`
--

CREATE TABLE `kamar_kost` (
  `id_kamar` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL DEFAULT '0',
  `no_kamar` varchar(255) NOT NULL DEFAULT '0',
  `fasilitas_kamar` text NOT NULL,
  `kapasitas_kamar` int(11) NOT NULL DEFAULT '0',
  `harga_kamar` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL DEFAULT '0',
  `nama_kost` varchar(255) NOT NULL DEFAULT '0',
  `alamat_kost` varchar(255) NOT NULL DEFAULT '0',
  `kategori_kost` enum('pria','wanita','campuran','none') NOT NULL DEFAULT 'none',
  `fasilitas_kost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(255) NOT NULL,
  `gender_owner` enum('pria','wanita','none') NOT NULL DEFAULT 'none',
  `tgl_lahir_owner` date NOT NULL,
  `alamat_rumah_owner` varchar(255) NOT NULL,
  `no_tlp_owner` varchar(15) NOT NULL,
  `foto_ktp_owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `gender_user` enum('pria','wanita','none') NOT NULL DEFAULT 'none',
  `tgl_lahir_user` date NOT NULL,
  `alamat_rumah_user` varchar(255) NOT NULL,
  `no_tlp_user` varchar(15) NOT NULL,
  `foto_ktp_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `gender_user`, `tgl_lahir_user`, `alamat_rumah_user`, `no_tlp_user`, `foto_ktp_user`) VALUES
(1, 'Abdur Rafi', 'pria', '2001-08-23', 'Bandung', '08123456789', 'ada...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `FK__kamar_kost` (`id_kamar`);

--
-- Indexes for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `FK__kost` (`id_kost`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `FK__owners` (`id_owner`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FK__kamar_kost` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_kost` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  ADD CONSTRAINT `FK__kost` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `FK__owners` FOREIGN KEY (`id_owner`) REFERENCES `owners` (`id_owner`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
`pemweb-project-uts2`