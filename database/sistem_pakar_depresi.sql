-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 27, 2023 at 03:55 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar_depresi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$lvQrvhzUYFP55gZXb1DjduZthjaU4iQ8gl3kdtJUcWDtrDwmNTg1O');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode` varchar(3) NOT NULL,
  `gejala` varchar(100) DEFAULT NULL,
  `bobot` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode`, `gejala`, `bobot`) VALUES
('G01', 'Merasa sedih', '0.05'),
('G02', 'Merasa pesimis', '0.05'),
('G03', 'Merasa gagal', '0.05'),
('G04', 'Merasa kehilangan atau tidak memiliki gairah/semangat', '0.05'),
('G05', 'Merasa bersalah', '0.05'),
('G06', 'Merasa sedang dihukum', '0.05'),
('G07', 'Merasa tidak suka atau benci dengan diri sendiri', '0.05'),
('G08', 'Mengkritik diri sendiri', '0.05'),
('G09', 'Merasa ingin bunuh diri', '0.05'),
('G10', 'Adanya keinginan menangis', '0.05'),
('G11', 'Merasa gelisah', '0.05'),
('G12', 'Merasa hilang minat beraktivitas', '0.05'),
('G13', 'Merasa sulit mengambil keputusan', '0.05'),
('G14', 'Merasa tidak layak dan tidak berguna', '0.05'),
('G15', 'Merasa tidak bertenaga', '0.05'),
('G16', 'Berubahnya pola tidur', '0.05'),
('G17', 'Merasa mudah marah', '0.05'),
('G18', 'Berubahnya pola/selera makan', '0.05'),
('G19', 'Merasa sulit berkonsentrasi', '0.05'),
('G20', 'Merasa capek atau kelelahan', '0.05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
