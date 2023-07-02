-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 02:16 PM
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
('Leonel Messi', '0.26993800197266', '2023/01/02', '12:42:45'),
('Kylian Mbappe', '0.39929609241043', '2023/01/02', '12:42:45'),
('Ahmad', '0.9044578502037', '2023/01/02', '12:42:45'),
('Fiqri', '0.38354854136777', '2023/01/02', '12:42:45'),
('Leonel Messi', '0.26993800197266', '2023/01/02', '12:42:59'),
('Kylian Mbappe', '0.39929609241043', '2023/01/02', '12:42:59'),
('Ahmad', '0.9044578502037', '2023/01/02', '12:42:59'),
('Fiqri', '0.38354854136777', '2023/01/02', '12:42:59'),
('Leonel Messi', '0.26973425473341', '2023/01/02', '12:43:38'),
('Kylian Mbappe', '0.4058293774053', '2023/01/02', '12:43:38'),
('Ahmad', '0.84809467550411', '2023/01/02', '12:43:38'),
('Fiqri', '0.37181740248607', '2023/01/02', '12:43:38'),
('David', '0.4957507082153', '2023/01/02', '12:43:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
