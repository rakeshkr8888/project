-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 10:23 AM
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
-- Database: `calculator`
--

-- --------------------------------------------------------

--
-- Table structure for table `calculation`
--

CREATE TABLE `calculation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `expression` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calculation`
--

INSERT INTO `calculation` (`id`, `user_id`, `name`, `expression`, `result`, `created_at`, `updated_at`) VALUES
(37, 3, 'money needed', '1+6', '7', '2023-05-29 13:18:03', '2023-05-29 13:18:03'),
(38, 3, 'bodmas Q1', '2*(6/3)+4*2', '12', '2023-05-29 13:19:27', '2023-05-29 13:19:27'),
(39, 3, 'apple', '1444-100', '1344', '2023-05-29 13:20:26', '2023-05-29 13:20:26'),
(40, 3, '22 november', '12-(54*2)/36-54*9', '-477', '2023-05-29 13:22:24', '2023-05-29 13:22:24'),
(41, 3, 'minus', '7896-459875', '-451979', '2023-05-29 13:23:08', '2023-05-29 13:23:08'),
(42, 3, 'bodmas Q2', '586*9*6+3-2/4', '31646.5', '2023-05-29 13:23:45', '2023-05-29 13:23:45'),
(43, 3, 'attendance needed', '(1+2)*(3-2)', '3', '2023-05-29 13:24:37', '2023-05-29 13:24:37'),
(44, 4, 'my_cal', '(45-69)/(1+3-5)', '24', '2023-05-29 13:43:00', '2023-05-29 13:43:00'),
(45, 4, 'random', '745-96*3+24*6/8', '475', '2023-05-29 13:43:35', '2023-05-29 13:43:35'),
(46, 4, 'gold', '74-652', '-578', '2023-05-29 13:43:45', '2023-05-29 13:43:45'),
(47, 4, 'silver', '178*(52-65)+32', '-2282', '2023-05-29 13:44:15', '2023-05-29 13:44:15'),
(48, 4, 'sem', '74+36+98+65', '273', '2023-05-29 13:44:41', '2023-05-29 13:44:41'),
(49, 4, 'random', '(89-36+65)/(25-37*351)', '-0.0091035334053387', '2023-05-29 13:45:21', '2023-05-29 13:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'user1', 'user1@gmail.com', '$2y$10$NdW9v6IVCfl9563IzpI9auT4IRG0E7.qD1UHLBDq2aamDp5Lq6XZy', '2023-05-29', '2023-05-29'),
(4, 'user2', 'user2@gmail.com', '$2y$10$Z1XhuZg/.rhM.nM16GnuiOIGxPlsl0ElVdlJ2WyT4eHrDxmvChWjW', '2023-05-29', '2023-05-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculation`
--
ALTER TABLE `calculation`
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
-- AUTO_INCREMENT for table `calculation`
--
ALTER TABLE `calculation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
