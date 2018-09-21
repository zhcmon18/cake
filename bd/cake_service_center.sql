-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 21 Septembre 2018 à 16:33
-- Version du serveur :  5.6.37
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cake_service_center`
--

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `current_km` int(11) NOT NULL,
  `date_service` date NOT NULL,
  `payment_received` tinyint(1) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `client_id`, `car_id`, `current_km`, `date_service`, `payment_received`, `description`, `created`, `modified`) VALUES
(1, 1, 3, 5, 55000, '2018-09-01', 0, 'Test', '2018-09-01 22:53:45', '2018-09-02 18:10:29'),
(2, 1, 4, 4, 100000, '2018-10-11', 0, 'It''s a booking for the motor', '2018-09-02 18:43:22', '2018-09-21 16:02:42'),
(3, 1, 3, 5, 55555, '2018-09-07', 0, 'No ID test', '2018-09-02 20:09:18', '2018-09-02 20:09:18'),
(4, 2, 4, 4, 7777, '2018-09-10', 1, 'Test Admin2', '2018-09-02 20:11:30', '2018-09-02 20:12:39');

-- --------------------------------------------------------

--
-- Structure de la table `bookings_tags`
--

CREATE TABLE IF NOT EXISTS `bookings_tags` (
  `booking_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `bookings_tags`
--

INSERT INTO `bookings_tags` (`booking_id`, `tag_id`) VALUES
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `license` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cars`
--

INSERT INTO `cars` (`id`, `client_id`, `license`, `model`, `color`, `photo`, `created`, `modified`) VALUES
(4, 4, 'AAA111', 'Test Model 2018', 'Gris', '', '2018-09-01 21:54:17', '2018-09-01 21:54:17'),
(5, 3, 'AAA222', 'Test Model 3 2018', 'Rouge', '', '2018-09-01 21:55:00', '2018-09-01 21:55:20');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `name`, `slug`, `telephone`, `address`, `email`, `created`, `modified`) VALUES
(3, 'Test Client', 'test_client', '450-111-1111', 'Test Address 1111', 'test@mail.com', '2018-09-01 21:36:13', '2018-09-01 21:36:13'),
(4, 'Test Client 2', 'test_client_2', '222-222-2222', 'Test Address 222', 'test2@mail.com', '2018-09-01 21:48:53', '2018-09-01 21:48:53'),
(5, 'Test Client 3', 'Test3', '111-111-1111', '11sdfs ', 'test3@mail.com', '2018-09-05 16:24:39', '2018-09-17 15:10:21');

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Bookings', 2, 'description', 'C''est une réservation pour le moteur.'),
(3, 'ru', 'Bookings', 2, 'description', 'Это бронирование для мотора.'),
(4, 'fr_CA', 'Tags', 1, 'title', 'Moteur'),
(5, 'ru', 'Tags', 1, 'title', 'Мотор'),
(6, 'fr_CA', 'Tags', 2, 'title', 'Pneu'),
(7, 'ru', 'Tags', 2, 'title', 'Колёса');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Motor', '2018-09-01 20:19:20', '2018-09-21 16:08:31'),
(2, 'Tiers', '2018-09-01 20:19:53', '2018-09-21 16:09:55');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'admin@mail.com', '$2y$10$UMe4Embd/BW0MLV0N3cWrOkV3N.UxbaW9ZSpLmgey5o2LW03lzpLC', 'admin', '2018-09-01 22:53:31', '2018-09-07 13:18:10'),
(2, 'user1@mail.com', '$2y$10$985Bgee5OehenArgM2q9wOrb3eK4/bzhBk9yJiqWtIqAEMd3aIesC', '', '2018-09-02 19:42:09', '2018-09-07 13:18:33');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `bookings_tags`
--
ALTER TABLE `bookings_tags`
  ADD PRIMARY KEY (`booking_id`,`tag_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`(100),`foreign_key`,`field`(100)),
  ADD KEY `I18N_FIELD` (`model`(100),`foreign_key`,`field`(100));

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `bookings_tags`
--
ALTER TABLE `bookings_tags`
  ADD CONSTRAINT `bookings_tags_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `bookings_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Contraintes pour la table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
