-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 09:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`, `status`) VALUES
(1, 'ffffff', 1),
(2, 'ff0000', 1),
(3, '1ab2ff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `addedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id`, `name`, `link`, `color`, `size`, `addedby`, `status`, `addedon`) VALUES
(5, 'adminQR', 'https://google.com', '1ab2ff', '200x200', 1, 1, '2023-01-16 06:00:05'),
(6, 'hary QR', 'https://google.com', 'ff0000', '200x200', 4, 1, '2023-01-16 06:00:43'),
(9, 'userqr', 'https://google.com', '1ab2ff', '200x200', 6, 1, '2023-01-20 06:34:58'),
(10, 'userQR2', 'https://google.com', '1ab2ff', '200x200', 6, 1, '2023-01-20 06:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `qrtraffic`
--

CREATE TABLE `qrtraffic` (
  `id` int(11) NOT NULL,
  `qrcodeid` int(11) NOT NULL,
  `device` varchar(50) DEFAULT NULL,
  `os` varchar(100) NOT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `addedon` datetime NOT NULL,
  `addedonstr` date NOT NULL,
  `ipaddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qrtraffic`
--

INSERT INTO `qrtraffic` (`id`, `qrcodeid`, `device`, `os`, `browser`, `city`, `state`, `country`, `addedon`, `addedonstr`, `ipaddress`) VALUES
(1, 8, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 05:57:47', '2023-01-20', '117.237.198.169'),
(2, 8, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 05:58:02', '2023-01-20', '117.237.198.169'),
(3, 7, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 05:58:16', '2023-01-20', '117.237.198.169'),
(4, 8, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 05:58:25', '2023-01-20', '117.237.198.169'),
(5, 7, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 05:59:24', '2023-01-20', '117.237.198.169'),
(6, 7, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 05:59:27', '2023-01-20', '117.237.198.169'),
(7, 6, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:31:32', '2023-01-20', '117.237.198.169'),
(8, 6, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:31:38', '2023-01-20', '117.237.198.169'),
(9, 6, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:31:42', '2023-01-20', '117.237.198.169'),
(10, 9, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:35:35', '2023-01-20', '117.237.198.169'),
(11, 9, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:35:39', '2023-01-20', '117.237.198.169'),
(12, 9, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:35:42', '2023-01-20', '117.237.198.169'),
(13, 9, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:35:44', '2023-01-20', '117.237.198.169'),
(14, 9, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:35:47', '2023-01-20', '117.237.198.169'),
(15, 9, 'PC', 'Window', 'Chrome', 'New Delhi', 'National Capital Territory of Delhi', 'India', '2023-01-20 06:35:50', '2023-01-20', '117.237.198.169');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `status`) VALUES
(1, '100x100', 1),
(2, '200x200', 1),
(3, '300x300', 1),
(4, '250x250', 1),
(5, '500x500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `totalqr` int(11) NOT NULL,
  `totalhit` int(11) NOT NULL,
  `role` enum('0','1') NOT NULL COMMENT '0=>"Admin" , 1=>"user"',
  `status` int(11) NOT NULL,
  `addedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `totalqr`, `totalhit`, `role`, `status`, `addedon`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$Y7BzNAth3nrGTSAQlCG5luaOxtKcPkc7OaRJgaeAa5WLzj8g3nkjm', 0, 0, '0', 1, '2023-01-14 14:56:11'),
(2, 'harry', 'harry@gmail.com', '$2y$10$K2S.ZOEJ0e0otV3YU9Dm6.41F.yuUc.uzC2IWotXxH0Pf.fncYVWK', 1, 0, '1', 0, '2023-01-15 05:57:52'),
(3, 'dary', 'dary@gmail.com', '$2y$10$srJYiYEnDGUNBw1waEZhHukpJPWugmQuxNCNsbTgEYfAViiU3uaeu', 0, 0, '1', 1, '2023-01-15 07:09:46'),
(4, 'xyz', 'hary@gmail.com', '$2y$10$9rg9NIBfC8V0eEEvwAL4j.r513f3X2RRD.G4ERWvFG4thhfeYG84S', 0, 0, '1', 1, '2023-01-15 07:12:47'),
(6, 'user', 'user@gmail.com', '$2y$10$VfUluoWbn8qA/tqyv4VCZuPf8aMWdzQet0WCe0RZMiIsHMiI8oiDe', 2, 6, '1', 1, '2023-01-20 06:33:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrtraffic`
--
ALTER TABLE `qrtraffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `qrtraffic`
--
ALTER TABLE `qrtraffic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
