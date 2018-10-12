-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2018 at 11:37 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_service_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `current_km` int(11) NOT NULL,
  `date_service` datetime NOT NULL,
  `payment_received` tinyint(1) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `client_id`, `car_id`, `current_km`, `date_service`, `payment_received`, `description`, `created`, `modified`) VALUES
(1, 2, 1, 1, 120456, '2018-10-11 15:00:00', 1, 'Problème avec le moteur.', '2018-10-11 15:43:40', '2018-10-11 16:03:03'),
(2, 2, 1, 2, 74577, '2018-10-13 12:15:00', 1, 'Changement de pneus.', '2018-10-11 22:08:23', '2018-10-11 22:12:29'),
(3, 1, 2, 3, 45006, '2018-10-16 18:00:00', 0, 'Le panneau central ne fonctionne pas.', '2018-10-11 22:19:41', '2018-10-11 22:23:29'),
(4, 1, 2, 3, 56789, '2018-10-17 17:00:00', 0, 'Fuite d''huile', '2018-10-11 22:27:27', '2018-10-11 22:28:29'),
(5, 3, 3, 5, 32000, '2018-10-18 10:00:00', 0, 'Changement de pneus.', '2018-10-11 22:39:36', '2018-10-11 22:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tags`
--

CREATE TABLE IF NOT EXISTS `bookings_tags` (
  `booking_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings_tags`
--

INSERT INTO `bookings_tags` (`booking_id`, `tag_id`) VALUES
(1, 1),
(2, 3),
(3, 2),
(4, 1),
(4, 4),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `license` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `client_id`, `license`, `model`, `color`, `created`, `modified`) VALUES
(1, 1, 'AAA444', 'BMW E38 2012', 'Noire', '2018-10-11 15:27:44', '2018-10-11 22:46:17'),
(2, 1, 'BBB333', 'Nissan Pathfinder 2017', 'Vert', '2018-10-11 15:34:44', '2018-10-11 22:50:01'),
(3, 2, 'CCC456', 'Volkswagen GT 2017', 'Blanc', '2018-10-11 15:35:50', '2018-10-11 22:55:38'),
(4, 2, 'CCC345', 'Volkswagen GTI 2017', 'Blanc', '2018-10-11 15:36:25', '2018-10-11 22:55:33'),
(5, 3, 'GAD435', 'Toyota Corolla 2017', 'Gris', '2018-10-11 15:38:18', '2018-10-11 22:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `cars_files`
--

CREATE TABLE IF NOT EXISTS `cars_files` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars_files`
--

INSERT INTO `cars_files` (`id`, `car_id`, `file_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 5, 3),
(4, 4, 5),
(5, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `slug`, `telephone`, `address`, `email`, `created`, `modified`) VALUES
(1, 'Pavel Zaharciuc', 'Pavel-Zaharciuc', '450-333-3336', '111 Rue Test', 'pavelz@mail.com', '2018-10-11 15:23:32', '2018-10-11 15:25:26'),
(2, 'Michel Schreyer', 'Michel-Schreyer', '450-222-3434', '1600 Rue Street', 'schreyerm@mail.com', '2018-10-11 15:26:51', '2018-10-11 15:26:51'),
(3, 'Yousef Bokari', 'Yousef-Bokari', '514-545-2323', '3455 Rue Quelquepart', 'bokariy@mail.com', '2018-10-11 15:37:34', '2018-10-11 15:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'bmwE38.jpg', 'Files/', '2018-10-11 22:45:53', '2018-10-11 22:45:53', 1),
(2, 'nissanPath.jpg', 'Files/', '2018-10-11 22:48:41', '2018-10-11 22:48:41', 1),
(3, 'corolla2017.jpg', 'Files/', '2018-10-11 22:54:31', '2018-10-11 22:54:31', 1),
(4, 'GT2017.jpg', 'Files/', '2018-10-11 22:54:47', '2018-10-11 22:54:47', 1),
(5, 'Gti2017.jpg', 'Files/', '2018-10-11 22:55:01', '2018-10-11 22:55:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'en_US', 'Tags', 1, 'title', 'Motor'),
(2, 'ru', 'Tags', 1, 'title', 'Мотор'),
(3, 'en_US', 'Tags', 2, 'title', 'Electric'),
(4, 'ru', 'Tags', 2, 'title', 'Электрика'),
(5, 'en_US', 'Tags', 3, 'title', 'Tires'),
(6, 'ru', 'Tags', 3, 'title', 'Колеса'),
(7, 'en_US', 'Tags', 4, 'title', 'Oil'),
(8, 'ru', 'Tags', 4, 'title', 'Масло'),
(9, 'en_US', 'Bookings', 1, 'description', 'Problem with the motor.'),
(11, 'ru', 'Bookings', 1, 'description', 'Проблема с мотором.'),
(15, 'en_US', 'Bookings', 2, 'description', 'Tires change.'),
(16, 'en_US', 'Tags', 9, 'title', 'Tires'),
(17, 'ru', 'Bookings', 2, 'description', 'Замена колес.'),
(18, 'ru', 'Bookings', 3, 'description', 'Центральная панель не работает.'),
(19, 'en_US', 'Bookings', 3, 'description', 'The dashboard is not working.'),
(22, 'en_US', 'Bookings', 4, 'description', 'Oil leak'),
(23, 'ru', 'Bookings', 4, 'description', 'Утечка масла.'),
(24, 'en_US', 'Bookings', 5, 'description', 'Tires change.'),
(25, 'ru', 'Bookings', 5, 'description', 'Замена колес.');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Moteur', '2018-10-11 15:39:20', '2018-10-11 22:29:16'),
(2, 'Electrique', '2018-10-11 15:40:10', '2018-10-11 22:25:15'),
(3, 'Pneus', '2018-10-11 15:41:07', '2018-10-11 22:41:53'),
(4, 'Huile', '2018-10-11 15:42:17', '2018-10-11 22:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `activation_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `password`, `role`, `created`, `modified`, `activation_key`, `status`) VALUES
(1, 'admin@mail.com', '450-555-666', '$2y$10$sq8Z/fSFSJhmu8egyBVE0e/gDMYENaN0XArDP4rpYsqoJcQVy72Fq', 'admin', '2018-09-02 19:42:09', '2018-09-05 23:18:58', '', 1),
(2, 'zaharpl@hotmail.com', '450-553-6671', '$2y$10$IoVYFEJ2KLnfG8r16dNSveuWXWllqtzIiUaDsvMPvICgQ.dQ.lgli', 'supervisor', '2018-10-11 14:59:20', '2018-10-11 15:17:40', '', 1),
(3, 'user2@mail.qc.ca', '450-956-2356', '$2y$10$9XQjWzU8b8s7LuN..x9rt.J6RiEAM4rvVqJXFhkAu5C3RG3j3LkuW', 'supervisor', '2018-10-11 22:30:54', '2018-10-11 22:30:54', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `bookings_tags`
--
ALTER TABLE `bookings_tags`
  ADD PRIMARY KEY (`booking_id`,`tag_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `cars_files`
--
ALTER TABLE `cars_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`(100),`foreign_key`,`field`(100)),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cars_files`
--
ALTER TABLE `cars_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings_tags`
--
ALTER TABLE `bookings_tags`
  ADD CONSTRAINT `bookings_tags_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cars_files`
--
ALTER TABLE `cars_files`
  ADD CONSTRAINT `cars_files_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cars_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
