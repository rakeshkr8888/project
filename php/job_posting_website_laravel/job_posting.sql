-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 12:21 PM
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
-- Database: `job_posting`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `title`, `logo`, `company`, `location`, `tag`, `website`, `email`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Possimus aspernatur tenetur et et quis architecto.', NULL, 'Haag, Farrell and Pollich', 'Vickieburgh', 'laravel,api,php,python', 'http://tromp.info/ut-at-debitis-in-quaerat-error-enim-mollitia.html', 'onie91@heller.com', 'Rem officiis inventore odio nobis temporibus eveniet. Officiis voluptas sint doloremque veritatis voluptatum doloremque. Architecto consequuntur dolorem et earum ea exercitationem enim. Voluptas omnis in asperiores odit. Voluptatem ea illo pariatur.', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(2, 1, 'Consequatur nobis accusamus ipsum.', NULL, 'Gislason PLC', 'Khalilfurt', 'laravel,api,php,python', 'https://www.prohaska.com/culpa-aliquid-magni-culpa-voluptas-voluptas-sit', 'ckuphal@walter.net', 'Placeat iste accusamus ut nisi ipsum at ut. Qui tempore asperiores adipisci maiores sint nulla. Inventore aut eum dolores quidem reiciendis. Odio aut aut quo pariatur suscipit ut. Unde iure quia quaerat molestias non. Rerum voluptas velit mollitia asperiores ab. Voluptatibus molestias recusandae sequi. Quis in beatae nam sequi quas laboriosam et. Officiis quo laborum aliquid sunt temporibus ut distinctio aspernatur.', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(3, 1, 'Qui ut natus quaerat earum nemo.', NULL, 'Howell, Champlin and Reinger', 'Haskellview', 'laravel,api,php,python', 'https://zulauf.biz/qui-blanditiis-similique-officiis-et.html', 'mblick@weimann.org', 'Est asperiores et in minus est ut qui repellendus. Tempore voluptatum et sint voluptatum dolorum. Ipsum molestiae fugiat veritatis commodi architecto. Velit perferendis dolorem voluptates doloribus aliquam laboriosam. Ut est accusantium cupiditate sed eos praesentium. Aut consequatur sint qui eveniet nam sit dolorum rerum. Non beatae ab dolorem inventore porro unde explicabo. Doloremque occaecati delectus illum rerum. Quia error et rerum temporibus asperiores dolores.', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(4, 1, 'Itaque nihil dolor ratione autem consectetur soluta.', NULL, 'Macejkovic, Renner and Lemke', 'West Filiberto', 'laravel,api,php,python', 'http://beer.com/maxime-consequatur-aut-natus-et-est.html', 'umann@roberts.com', 'Similique sint nisi quis officia ducimus. Dolores fuga atque a ab voluptas modi non. Explicabo perspiciatis a exercitationem delectus sequi quia. Qui eos dicta perspiciatis modi soluta aperiam adipisci ut. Cupiditate nisi omnis et sunt. Atque amet ullam magnam est sed eum. Odit ipsam expedita fuga eveniet cum.', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(5, 1, 'Rerum modi sapiente reiciendis iste molestias et temporibus sequi.', NULL, 'Thiel PLC', 'New Rowena', 'laravel,api,php,python', 'http://www.emmerich.net/omnis-cum-occaecati-voluptatem-quos-ad', 'cartwright.geovanni@bayer.net', 'Nemo voluptatem consequatur et et adipisci consequuntur. Esse eaque et sint enim sapiente voluptatem qui laborum. Aut aut optio molestiae explicabo aut. Quia aut blanditiis et rerum neque nemo. Iste suscipit unde omnis amet iusto voluptatem fugiat. Reiciendis ut ducimus adipisci doloremque ex. Ut error recusandae fugit ratione. Atque ducimus hic ratione facere consequatur distinctio. Voluptates earum voluptatibus fugit.', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(6, 6, 'c++', 'logos/EgZrH8UfQExvdcBgX0NvO65fZ1a1DRZza0ZlVMo3.jpg', 'c++ ltd', 'delhi', 'c++,c,dsa', 'https://google.com', 'cpp@gmail.com', 'gdf', '2023-04-20 22:39:02', '2023-04-20 22:49:20'),
(7, 6, 'laravel', 'logos/JvPltgokYhoZlIyWf0stcnevVbXBkS3xwVRCHxgE.png', 'larvel ltd', 'delhi', 'laravel,php,api', 'https://google.com', 'laravel@gmail.com', 'Note: Elements are floated only horizontally i.e. left or right\r\n\r\nProperty Value:\r\n\r\nleft: Place an element on its container’s right.\r\nright: Place an element on its container’s left.\r\ninherit: Element inherits floating property from it’s parent (div, table etc…) elements.\r\nnone: Element is displayed as it is (Default).', '2023-04-20 23:03:57', '2023-04-20 23:04:53'),
(8, 7, 'java', 'logos/s9hShhg3Puk1IhInz1mqQ2guuG3ZlaXnpvqexiBI.png', 'java LTD', 'noida', 'java,dsa,c++,CP', 'https://google.com', 'java@gmail.com', 'Note: Elements are floated only horizontally i.e. left or right\r\n\r\nProperty Value:\r\n\r\nleft: Place an element on its container’s right.\r\nright: Place an element on its container’s left.\r\ninherit: Element inherits floating property from it’s parent (div, table etc…) elements.\r\nnone: Element is displayed as it is (Default).', '2023-04-20 23:09:18', '2023-04-20 23:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_08_042507_create_listings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Salvatore Vandervort Jr.', 'kacey80@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(2, 'Dr. Rosanna Sawayn', 'lelia.jacobs@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(3, 'Sammy Ziemann Sr.', 'gavin.renner@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(4, 'Miss Abbigail Beier', 'kkerluke@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(5, 'Prof. Rafael Sawayn', 'cummerata.kaleb@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-04-18 00:54:32', '2023-04-18 00:54:32'),
(6, 'harry', 'harry@gmail.com', '$2y$10$OwiY8ho9GdAjrh7irdpnU.QTL0MsBEZVr2J1G0pDU3wxshiFT3gUO', '2023-04-19 22:57:59', '2023-04-19 22:57:59'),
(7, 'user', 'user@gmail.com', '$2y$10$LrdUBU1i7nhrzDR/P8rTbeCeYjk1SzKw8GP.BMVkviSk7T6tj7v.a', '2023-04-20 23:08:19', '2023-04-20 23:08:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listings_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
