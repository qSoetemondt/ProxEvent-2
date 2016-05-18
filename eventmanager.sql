-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Mai 2016 à 17:20
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eventmanager`
--
CREATE DATABASE IF NOT EXISTS `eventmanager` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `eventmanager`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `libelle`, `description`) VALUES
(1, 0, 'Soirée', 'Evénement de type soirée'),
(2, 0, 'Concert', 'Evénement de type concert musical'),
(3, 0, 'Expo', 'Evénement de type expo culturelle'),
(4, 0, 'Sport', 'Evénement de type sportif'),
(5, 0, 'Forum', 'Evénement de type forum'),
(6, 0, 'Salon', 'Evénement de type salon'),
(7, 0, 'Performing', 'Evénement relatif au street art'),
(8, 0, 'Festival', 'Evénement de type festival'),
(9, 1, 'Soirée à thème', 'Soirée dont le thème suggère un dress code'),
(10, 1, 'Soirée DJ', 'Soirée dont l''animation musicale est assurée par un DJ reconnu'),
(11, 2, 'Rock', 'Concert de type rock'),
(12, 2, 'Electro', 'Concert de type electro'),
(13, 3, 'Photo', 'Expo photo'),
(14, 3, 'Peinture', 'Expo de tableaux'),
(15, 4, 'Tennis', 'Evenement de tennis'),
(16, 4, 'Football', 'Evénement de football');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titre` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `payant` tinyint(1) NOT NULL,
  `plus_un` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wusers`
--

CREATE TABLE IF NOT EXISTS `wusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `wusers`
--

INSERT INTO `wusers` (`id`, `username`, `email`, `password`) VALUES
(1, 'Quilegan', 'quentin.soetemondt@gmail.com', 'azerty'),
(2, 'Quilegan', 'quentin.soetemondt@gmail.com', ''),
(3, 'Quilegan', 'quentin.soetemondt@gmail.com', '$2y$10$BzJQS0wRSqqQCoOmOaMr8e8kWEpnNgwdKUQWAWvVEe2xcOuPQQQo2'),
(4, 'Quilegan', 'quentin.soetemondt@gmail.com', '$2y$10$QRAt3NLo68vAryElKErUX.aIxvGfBk4D8Mt5WAdprtQD2pkelmdGq'),
(5, 'azerty', 'azerty@mail.fr', '$2y$10$fx6w5ZSSwlONFVNQqEp21u6wK8MXWyn0wQhY/Zg9n/B1Wkz/hGZrC'),
(6, 'JohnDoe', 'batman@gotham.fr', '$2y$10$VGE1ZLqxS3QYE1y9nphITea6YSBQ9YOyXYG3tmWidAxzh9pYh6Fya'),
(7, 'bloum', 'bloum@free.fr', '$2y$10$kYyGxYUKyo.jpW.sEugzZes3UQ8SqiGVc.X1UHH1cYwXcIQSFtFKC');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
