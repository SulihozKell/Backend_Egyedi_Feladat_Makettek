-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 12:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makettek`
--

-- --------------------------------------------------------

--
-- Table structure for table `makett`
--

CREATE TABLE `makett` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `anyag` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `meretarany` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `osszerakasi_ido` int(11) NOT NULL,
  `gyartas_ideje` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `makett`
--

INSERT INTO `makett` (`id`, `nev`, `anyag`, `meretarany`, `osszerakasi_ido`, `gyartas_ideje`) VALUES
(1, '41M Turán', 'műanyag', '1:35', 25, '2015-03-03'),
(2, '38M Toldi', 'műanyag', '1:35', 25, '2005-11-11'),
(3, '42M Toldi II', 'műanyag', '1:72', 20, '2008-05-05'),
(4, '40M Turán', 'műanyag', '1:72', 18, '2009-09-09'),
(5, '44M Tas', 'műanyag', '1:35', 23, '2017-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makett`
--
ALTER TABLE `makett`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `makett`
--
ALTER TABLE `makett`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
