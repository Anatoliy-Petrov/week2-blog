-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 03, 2017 at 12:21 AM
-- Server version: 5.5.48
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `week2-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `liked_id` int(10) unsigned NOT NULL,
  `liked_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `liked_id`, `liked_type`, `created_at`, `updated_at`) VALUES
(6, 1, 16, 'App\\Post', '2017-09-02 13:20:15', '2017-09-02 13:20:15'),
(7, 2, 18, 'App\\Post', '2017-09-02 13:21:08', '2017-09-02 13:21:08'),
(8, 2, 16, 'App\\Post', '2017-09-02 13:21:42', '2017-09-02 13:21:42'),
(12, 3, 19, 'App\\Post', '2017-09-02 15:08:05', '2017-09-02 15:08:05'),
(13, 2, 19, 'App\\Post', '2017-09-02 15:08:36', '2017-09-02 15:08:36'),
(14, 1, 19, 'App\\Post', '2017-09-02 15:08:59', '2017-09-02 15:08:59'),
(15, 1, 20, 'App\\Post', '2017-09-02 17:39:15', '2017-09-02 17:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2017_08_26_091629_create_posts_table', 1),
(13, '2017_09_02_130013_create_likes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'first post', 'some text', 'default.jpg', '2017-08-25 21:00:00', '2017-08-25 21:00:00'),
(10, 1, 'nice post', '<p>lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;lot or text&nbsp;</p>', 'argue.jpg', '2017-08-28 10:19:56', '2017-08-28 10:24:57'),
(11, 1, 'lklklkl', '<p>km;k;km</p>', '', '2017-09-02 05:40:11', '2017-09-02 05:40:11'),
(16, 1, 'picture', '<p>По словам правоохранителей, чиновник дал указания руководителям подчиненных подразделений рассчитать и подделать официальные документы по изготовлению асфальтобетона.<br />\r\n<br />\r\n&quot;Государственному предприятию были излишне перечислены из государственного бюджета более 2,8 млн грн на оплату электроэнергии, природного газа и на выполнение работ согласно актам приема выполненных строительных работ&quot;, - говорится в сообщении.<br />\r\n<br />\r\nПо факту открыто уголовное производство по ч.5 ст.191 (присвоение, растрата имущества или завладение им путем злоупотребления служебным положением) и ч.1 ст.366 (служебный подлог) УК Украины.</p>\r\n\r\n<p>&nbsp;</p>', '8020170902094351obam.jpg', '2017-09-02 06:43:51', '2017-09-02 07:00:50'),
(18, 1, 'one else', '<p>По словам правоохранителей, чиновник дал указания руководителям подчиненных подразделений рассчитать и подделать официальные документы по изготовлению асфальтобетона.<br />\r\n<br />\r\n&quot;Государственному предприятию были излишне перечислены из государственного бюджета более 2,8 млн грн на оплату электроэнергии, природного газа и на выполнение работ согласно актам приема выполненных строительных работ&quot;, - говорится в сообщении.<br />\r\n<br />\r\nПо факту открыто уголовное производство по ч.5 ст.191 (присвоение, растрата имущества или завладение им путем злоупотребления служебным положением) и ч.1 ст.366 (служебный подлог) УК Украины.</p>\r\n\r\n<p>&nbsp;</p>', 'beauty.jpg', '2017-09-02 09:44:41', '2017-09-02 09:47:30'),
(19, 1, 'nice post', '<p>like me please</p>', '2420170902053651eva.jpg', '2017-09-02 14:36:51', '2017-09-02 14:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'triocomfort@gmail.com', '$2y$10$CGozJcEaYweuhne09/L/aOGYrIZhSOn5DUzpWIRjpBLeLLhELY9Em', 'SKkfuoapuuIIMxvdK3bXYWoh5MDWmvEigCjzkkRNOTWu7dA5pGouUBlyxpFH', '2017-08-26 06:59:39', '2017-08-26 06:59:39'),
(2, 'somebody', 'without@gmail.com', '$2y$10$Vhr.ICjMrB0s2cgOnt4aDuRny.UAzx2lE7R8XtNS2DCF58k.VCzWK', 'D4isXljOxQGoe1qRDVedRkdwFfWaYaHHmmgIonAsTqmJ39npgNsIDTlQr0S8', '2017-09-02 13:17:32', '2017-09-02 13:17:32'),
(3, 'user', 'user@gmail.com', '$2y$10$39WQcAfAMN4E7Ik5JMrpr.0i8uL.z4LPq8dbWLOpjIWR3ZzLNqRuC', 'kKRhEKHpFkyPjfTjvPTtla6Dj0xw2ZbLX4H940p9pZvWTmqV4yAIWJEYVqfl', '2017-09-02 14:38:18', '2017-09-02 14:38:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `likes_user_id_liked_id_liked_type_unique` (`user_id`,`liked_id`,`liked_type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
