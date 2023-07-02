-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 05:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectspk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_admin`
--

CREATE TABLE `tab_admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tab_admin`
--

INSERT INTO `tab_admin` (`username`, `password`) VALUES
('1', '1'),
('2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tab_alternatif`
--

CREATE TABLE `tab_alternatif` (
  `id_alternatif` varchar(10) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_alternatif`
--

INSERT INTO `tab_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
('1', 'Intan'),
('2', 'Dila'),
('3', 'Muti');

-- --------------------------------------------------------

--
-- Table structure for table `tab_hasil`
--

CREATE TABLE `tab_hasil` (
  `nama` varchar(30) NOT NULL,
  `hasil` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `jam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tab_hasil`
--

INSERT INTO `tab_hasil` (`nama`, `hasil`, `tanggal`, `jam`) VALUES
('Intan', '0.92293821582848\n', '2023/01/18', '11:53:20'),
('Dila', '0.29910256410256\n', '2023/01/18', '11:53:20'),
('Muti', '0.43171685091309\n', '2023/01/18', '11:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kriteria`
--

CREATE TABLE `tab_kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_kriteria`
--

INSERT INTO `tab_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `status`) VALUES
('1', 'Jumlah Pengalaman', 5, 'Benefit'),
('2', 'Rating Penampilan', 4, 'Benefit'),
('3', 'Rating Komunikasi', 4, 'Benefit'),
('4', 'Jenjang Pendidikan', 3, 'Benefit'),
('5', 'Umur', 2, 'Cost'),
('6', 'Jarak Tempuh', 1, 'Cost'),
('7', 'Tingi Badan', 2, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tab_topsis`
--

CREATE TABLE `tab_topsis` (
  `id_alternatif` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_topsis`
--

INSERT INTO `tab_topsis` (`id_alternatif`, `id_kriteria`, `nilai`) VALUES
('1', '1', 5),
('1', '2', 5),
('1', '3', 5),
('1', '4', 5),
('1', '5', 21),
('1', '6', 4),
('1', '7', 5),
('2', '1', 1),
('2', '2', 2),
('2', '3', 3),
('2', '4', 4),
('2', '5', 20),
('2', '6', 3),
('2', '7', 3),
('3', '1', 5),
('3', '2', 2),
('3', '3', 1),
('3', '4', 2),
('3', '5', 19),
('3', '6', 2),
('3', '7', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD CONSTRAINT `tab_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `tab_topsis` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD CONSTRAINT `tab_topsis_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tab_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
