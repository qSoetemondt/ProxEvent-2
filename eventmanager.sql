-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Mai 2016 à 10:57
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
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `user_id`, `titre`, `adresse`, `latitude`, `longitude`, `categorie_id`, `date_debut`, `date_fin`, `payant`, `plus_un`, `description`) VALUES
(15, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 5, '2016-05-25 10:00:00', '2016-05-25 16:00:00', 0, 12, ''),
(16, 8, '', '27 Boulevard Voltaire, Paris, France', 48.865, 2.36854, 2, '2016-05-25 10:30:00', '2016-05-25 18:30:00', 0, 4, 'azeae'),
(17, 8, '', '34 Rue de Dunkerque, Paris, France', 48.8811, 2.35058, 6, '2016-05-25 11:00:00', '2016-05-25 18:00:00', 0, 2, 'rzara'),
(18, 8, 'fqsdfqdsf', '45 Rue Bichat, Paris, France', 48.8722, 2.36675, 7, '2016-05-25 12:00:00', '2016-05-25 14:00:00', 1, 2, 'qfdsqsfq'),
(19, 8, 'sdfqs', '56 Boulevard Haussmann, Paris, France', 48.8745, 2.32288, 3, '2016-05-25 12:00:00', '2016-05-25 14:00:00', 0, 3, 'qdvxcvdfg'),
(20, 8, 'azeaez', '12 Avenue Jean Jaur&egrave;s, Paris, France', 48.8835, 2.37247, 1, '2016-05-25 12:00:00', '2016-05-25 14:00:00', 1, 3, 'azeaeaea'),
(21, 8, 'gtyhgt', '34 Avenue des Champs-&Eacute;lys&eacute;es, Paris, France', 48.87, 2.30825, 4, '2016-05-26 12:00:00', '2016-05-26 23:00:00', 0, 11, ''),
(22, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 5, '2016-05-25 14:00:00', '2016-05-25 16:00:00', 0, 1, ''),
(23, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 5, '2016-05-26 11:00:00', '2016-05-26 23:00:00', 0, 10, ''),
(24, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 5, '2016-05-26 15:00:00', '2016-05-26 17:00:00', 0, 2, ''),
(25, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 6, '2016-05-26 15:30:00', '2016-05-26 17:30:00', 0, 1, ''),
(26, 8, '', '4 Impasse Saint-Eustache, Paris, France', 48.8636, 2.34544, 1, '2016-05-26 15:30:00', '2016-05-26 17:30:00', 0, 1, ''),
(27, 8, 'azerty', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 7, '2016-05-27 10:00:00', '2016-05-27 12:00:00', 1, 2, 'aezrazrazerazerazerz'),
(28, 8, '', 'Rue des Licences, 75005 Paris, France', 48.846, 2.35793, 8, '2016-05-27 15:00:00', '2016-05-27 17:00:00', 0, 1, ''),
(29, 8, '', '12 Rue Princesse, Paris, France', 48.8522, 2.33439, 7, '2016-05-27 15:00:00', '2016-05-27 17:00:00', 0, 1, 'qsdfqsdf'),
(30, 8, '', '24 Rue Alibert, Paris, France', 48.8718, 2.36843, 7, '2016-05-30 11:30:00', '2016-05-30 13:30:00', 0, 1, ''),
(31, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 6, '2016-05-30 11:30:00', '2016-05-30 13:30:00', 0, 1, ''),
(32, 8, '', '150 Rue de Charonne, Paris, France', 48.8551, 2.38943, 7, '2016-05-30 12:00:00', '2016-05-30 14:00:00', 1, 1, ''),
(33, 8, '', '12 Boulevard du Montparnasse, Paris, France', 48.8452, 2.31926, 8, '2016-05-30 12:00:00', '2016-05-30 14:00:00', 0, 1, ''),
(34, 8, '', '150 Place Denfert-Rochereau, Paris, France', 48.8344, 2.33353, 7, '2016-05-30 12:00:00', '2016-05-30 14:00:00', 1, 1, ''),
(35, 8, '', '12 Rue Pierre Nicole, Paris, France', 48.8421, 2.3404, 2, '2016-05-30 12:00:00', '2016-05-30 14:00:00', 0, 1, ''),
(36, 8, '', '12 Rue du Four, Paris, France', 48.8528, 2.33435, 3, '2016-05-30 12:00:00', '2016-05-30 14:00:00', 0, 1, ''),
(37, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 6, '2016-05-30 14:30:00', '2016-05-30 16:30:00', 0, 1, ''),
(38, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 7, '2016-05-30 15:00:00', '2016-05-30 17:00:00', 0, 1, ''),
(39, 8, '', '23 Rue de la Fontaine au Roi, Paris, France', 48.8685, 2.3706, 5, '2016-05-30 16:30:00', '2016-05-30 18:30:00', 0, 1, ''),
(40, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 8, '2016-05-31 10:30:00', '2016-05-31 12:30:00', 0, 2, ''),
(41, 8, '', '30 Rue Guynemer, 75006 Paris, France', 48.8464, 2.33242, 6, '2016-05-31 11:00:00', '2016-05-31 13:00:00', 0, 1, ''),
(42, 8, 'Soir&eacute;e White', '10 Rue Guynemer, 75006 Paris, France', 48.8479, 2.33211, 1, '2016-05-31 11:00:00', '2016-05-31 16:15:00', 0, 1, 'Soir&eacute;e &agrave; th&egrave;me vestimentaire blanc'),
(43, 8, 'Forum de l''emploi web', '2 Place Ferdinand Brunot, Paris, France', 48.8331, 2.32692, 5, '2016-05-31 11:00:00', '2016-05-31 17:15:00', 1, 1, 'WebDating'),
(44, 8, 'Johny BeGood', '45 Rue de Vaugirard, Paris, France', 48.8476, 2.32951, 7, '2016-05-31 11:00:00', '2016-05-31 19:00:00', 0, 1, 'Performing jonglages'),
(45, 8, 'Syst&egrave;me', '5 Rue de Cond&eacute;, Paris, France', 48.8513, 2.33827, 2, '2016-05-31 11:00:00', '2016-05-31 23:15:00', 0, 1, 'Groupe de Laurent, reprise musique rock'),
(46, 8, 'Yann Arthus-Bertand', '15 Rue du Four, Paris, France', 48.8526, 2.3349, 3, '2016-05-31 11:00:00', '2016-05-31 19:45:00', 0, 1, 'Expo photo '),
(47, 8, 'Match de tennis', '12 Rue Oudinot, Paris, France', 48.8505, 2.31754, 4, '2016-05-31 11:00:00', '2016-05-31 20:45:00', 0, 1, ''),
(48, 8, '', '16 Rue Antoine Bourdelle, Paris, France', 48.8429, 2.31896, 1, '2016-05-31 11:00:00', '2016-05-31 21:30:00', 0, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_validite` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vote_user`
--

CREATE TABLE IF NOT EXISTS `vote_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `vote_user`
--

INSERT INTO `vote_user` (`id`, `event_id`, `user_id`) VALUES
(157, 23, 8),
(158, 21, 8),
(159, 24, 8),
(160, 27, 8),
(161, 40, 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `wusers`
--

INSERT INTO `wusers` (`id`, `username`, `email`, `password`) VALUES
(8, 'Quentin', 'quentin.soetemondt@gmail.com', '$2y$10$N5x9jNZSRmv4BFVsaa20N.Z4Rs9qlM21jtSHQ9YV5g9GGa8kR6MN.'),
(9, 'blam', 'blam@free.fr', '$2y$10$cORttLa8T.OyXt5zayQ6TezHDAD8lOMcfAZEpT1hx.yNZyNr1VCZm'),
(10, 'xave', 'caver@gflem.fr', '$2y$10$Tfsyma9aTJxeh6nBzdW4E.FJ3e/FiMpjITrbNBsGFu2EaUdpS7gUK');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
