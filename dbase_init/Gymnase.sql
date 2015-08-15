-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 19 Juillet 2015 à 16:36
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `serveur`
--

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE IF NOT EXISTS `caisse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fond` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `caisse`
--

INSERT INTO `caisse` (`id`, `fond`, `date`) VALUES
(1, 30, '2015-07-10'),
(2, 45, '2015-07-11'),
(3, 76, '2015-07-12'),
(4, 31, '2015-07-14'),
(5, 50.5, '2015-07-16'),
(6, 67, '2015-07-17'),
(7, 96.5, '2015-07-18');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `img`) VALUES
(1, 'Boisson', 'img/Cat/Boissons.png'),
(2, 'Alcool', 'img/Cat/Alcool.png'),
(3, 'Snack', 'img/Cat/Mangé.png'),
(4, 'Barre Chocolatée', 'img/Cat/BarresChoco.png'),
(5, 'Glace', 'img/Cat/Glaces.png'),
(6, 'Boisson Chaude', 'img/Cat/Chaud.png'),
(7, 'Divers', 'img/Cat/Objets.png');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `who` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE IF NOT EXISTS `prix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `prix`
--

INSERT INTO `prix` (`id`, `prix`) VALUES
(1, 0.5),
(2, 1),
(3, 1.5),
(4, -1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `prix_achat` float NOT NULL,
  `nbr` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `scancode` varchar(255) NOT NULL,
  `nbr_limit` int(11) DEFAULT NULL,
  `id_prix` int(11) DEFAULT NULL,
  `total_stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `name`, `img`, `prix_achat`, `nbr`, `id_categorie`, `scancode`, `nbr_limit`, `id_prix`, `total_stock`) VALUES
(1, 'Coca-Cola', 'img/Item/F12.png', 0.48, 10, 1, 'Coca-Cola', 0, 2, 30),
(2, 'Perrier', 'img/Item/F1.png', 0.35, 0, 1, 'Perrier', 0, 1, 0),
(3, 'Nestea', 'img/Item/unknow.png', 0.44, 0, 1, 'Nestea', 0, 2, 0),
(4, 'Orangina 25cl', 'img/Item/F10.png', 0.52, 0, 1, 'Origina 25cl', 0, 2, 12),
(5, 'Oasis Tropical Zero', 'img/Item/F9.png', 0.55, 0, 1, 'Oasis Tropical 0', 0, 2, 20),
(6, 'Panach''', 'img/Item/F3.png', 0.3, 0, 1, 'Panach''', 0, 1, 10),
(7, 'Leffe Blonde', 'img/Item/A2.png', 0.57, 0, 2, 'Leffe Blonde', 0, 3, 0),
(8, 'Crêpe', 'img/Item/M2.png', 0.1, 0, 3, 'Crepes', 0, 2, 0),
(9, 'Croque-Monsieur', 'img/Item/M1.png', 0.42, 0, 3, 'Croques Monsieur', 0, 1, 0),
(10, 'Twix', 'img/Item/G1.png', 0.3, 15, 4, 'Twix', 0, 2, 20),
(11, 'Lion', 'img/Item/B7.png', 0.32, 2, 4, 'Lion', 0, 2, 9),
(12, 'Sundy', 'img/Item/B1.png', 0.35, 0, 4, 'Sundy', 0, 2, 0),
(13, 'Kit-Kat', 'img/Item/B9.png', 0.34, 0, 4, 'Kit-Kat', 0, 2, 0),
(14, 'Bounty', 'img/Item/B6.png', 0.36, 0, 4, 'Bounty', 0, 2, 0),
(15, 'Forfait The / Cafe', 'img/Item/C1.png', 0.5, 483, 6, 'Forfait The / Cafe', 0, 1, 500),
(16, 'Ecocup', 'img/Item/O1.png', 1, 16, 7, 'Ecocup', 0, 2, 30),
(17, 'Schweppes Agrum''', 'img/Item/F8.png', 0.47, 0, 1, 'Schweppes Agrum''', 0, 2, 6),
(18, 'Oasis Tropical', 'img/Item/F9.png', 0.47, 0, 1, 'Oasis Tropical', 0, 2, 6),
(19, 'Ice Tea', 'img/Item/F4.png', 0.5, 0, 1, 'Ice Tea', 0, 2, 0),
(20, '7 Up Mojito', 'img/Item/F5.png', 0.42, 0, 1, '7 Up Mojito', 0, 2, 12),
(21, 'Kinder Bueno', 'img/Item/B8.png', 0.53, 0, 4, 'Kinder Bueno', 0, 2, 0),
(22, 'Remboursement', 'img/Item/O2.png', 0, 495, 7, '', 0, 4, 500),
(23, 'Leffe Ruby', 'img/Item/A1.png', 0.6, 0, 2, '', 0, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `refeel`
--

CREATE TABLE IF NOT EXISTS `refeel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock` text NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list` text NOT NULL,
  `prix_total` float NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=160 ;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`id`, `list`, `prix_total`, `date`, `id_user`) VALUES
(1, '[{"id":5,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-10 21:39:11', 4),
(2, '[{"id":5,"nbr":1,"prix_unit":"1"},{"id":1,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-10 21:42:15', 1),
(3, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-10 21:43:17', 1),
(4, '[{"id":5,"nbr":1,"prix_unit":"1"},{"id":21,"nbr":2,"prix_unit":"1"}]', 3, '2015-07-10 22:24:39', 5),
(5, '[{"id":13,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-10 22:32:07', 5),
(6, '[{"id":13,"nbr":1,"prix_unit":"1"},{"id":17,"nbr":1,"prix_unit":"1"},{"id":5,"nbr":1,"prix_unit":"1"},{"id":21,"nbr":1,"prix_unit":"1"}]', 4, '2015-07-10 23:01:39', 5),
(7, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-10 23:17:31', 5),
(8, '[{"id":6,"nbr":1,"prix_unit":"0.5"},{"id":3,"nbr":1,"prix_unit":"1"},{"id":21,"nbr":1,"prix_unit":"1"}]', 2.5, '2015-07-11 00:10:11', 5),
(9, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 14:27:09', 2),
(10, '[{"id":17,"nbr":1,"prix_unit":"1"},{"id":6,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-11 14:39:37', 2),
(11, '[{"id":15,"nbr":1,"prix_unit":"0.5"},{"id":16,"nbr":1,"prix_unit":"1"}]', 1.5, '2015-07-11 15:17:01', 2),
(12, '[{"id":3,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 15:18:54', 2),
(13, '[{"id":17,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 15:36:06', 2),
(14, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-11 15:37:00', 2),
(15, '[{"id":16,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 15:46:18', 2),
(16, '[{"id":16,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 15:48:23', 2),
(17, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 15:55:55', 2),
(18, '[{"id":22,"nbr":1,"prix_unit":"-1"}]', -1, '2015-07-11 16:03:14', 2),
(19, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-11 16:05:14', 2),
(20, '[{"id":4,"nbr":2,"prix_unit":"1"},{"id":1,"nbr":2,"prix_unit":"1"},{"id":5,"nbr":1,"prix_unit":"1"}]', 5, '2015-07-11 16:30:44', 2),
(21, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 16:31:21', 2),
(22, '[{"id":5,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 16:32:21', 2),
(23, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 16:47:04', 2),
(24, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 16:56:43', 2),
(25, '[{"id":5,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 16:58:12', 2),
(26, '[{"id":3,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 16:59:29', 2),
(27, '[{"id":5,"nbr":1,"prix_unit":"1"},{"id":21,"nbr":1,"prix_unit":"1"},{"id":1,"nbr":1,"prix_unit":"1"}]', 3, '2015-07-11 17:04:54', 2),
(28, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 17:26:20', 2),
(29, '[{"id":17,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 17:31:22', 2),
(30, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 18:17:25', 2),
(31, '[{"id":10,"nbr":1,"prix_unit":"1"},{"id":13,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-11 18:21:18', 2),
(32, '[{"id":10,"nbr":1,"prix_unit":"1"},{"id":1,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-11 18:25:51', 2),
(33, '[{"id":13,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-11 18:28:57', 2),
(34, '[{"id":21,"nbr":2,"prix_unit":"1"},{"id":5,"nbr":1,"prix_unit":"1"},{"id":1,"nbr":1,"prix_unit":"1"}]', 4, '2015-07-11 18:38:06', 2),
(35, '[{"id":6,"nbr":1,"prix_unit":"0.5"},{"id":3,"nbr":1,"prix_unit":"1"}]', 1.5, '2015-07-11 19:10:54', 2),
(36, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-11 19:22:09', 2),
(37, '[{"id":22,"nbr":1,"prix_unit":"-1"}]', -1, '2015-07-11 19:22:25', 2),
(38, '[{"id":5,"nbr":2,"prix_unit":"1"},{"id":3,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"},{"id":16,"nbr":1,"prix_unit":"1"}]', 4.5, '2015-07-12 15:46:42', 2),
(39, '[{"id":5,"nbr":1,"prix_unit":"1"},{"id":13,"nbr":2,"prix_unit":"1"},{"id":21,"nbr":2,"prix_unit":"1"}]', 5, '2015-07-12 16:01:12', 2),
(40, '[{"id":5,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-12 16:04:14', 2),
(41, '[{"id":4,"nbr":1,"prix_unit":"1"},{"id":5,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-12 16:08:28', 2),
(42, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-12 16:24:50', 2),
(43, '[{"id":5,"nbr":1,"prix_unit":"1"},{"id":3,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-12 16:56:07', 2),
(44, '[{"id":21,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-12 16:58:04', 2),
(45, '[{"id":13,"nbr":1,"prix_unit":"1"},{"id":10,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-12 17:00:01', 2),
(46, '[{"id":21,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-12 17:05:57', 2),
(47, '[{"id":5,"nbr":1,"prix_unit":"1"},{"id":1,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-12 18:53:49', 2),
(48, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 14:47:51', 2),
(49, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 14:48:51', 2),
(50, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 14:49:10', 2),
(51, '[{"id":18,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 14:49:40', 2),
(52, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 14:53:53', 2),
(53, '[{"id":13,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 15:22:08', 2),
(54, '[{"id":3,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 15:26:46', 2),
(55, '[{"id":3,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 15:31:20', 2),
(56, '[{"id":1,"nbr":2,"prix_unit":"1"},{"id":17,"nbr":1,"prix_unit":"1"}]', 3, '2015-07-13 15:37:44', 2),
(57, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 15:48:33', 2),
(58, '[{"id":1,"nbr":2,"prix_unit":"1"},{"id":21,"nbr":1,"prix_unit":"1"}]', 3, '2015-07-13 15:50:00', 2),
(59, '[{"id":5,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 15:56:53', 2),
(60, '[{"id":5,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 16:10:59', 2),
(61, '[{"id":1,"nbr":1,"prix_unit":"1"},{"id":6,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-13 17:14:26', 2),
(62, '[{"id":1,"nbr":2,"prix_unit":"1"},{"id":6,"nbr":1,"prix_unit":"0.5"}]', 2.5, '2015-07-13 17:15:28', 2),
(63, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-13 17:18:29', 2),
(64, '[{"id":21,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 17:23:48', 2),
(65, '[{"id":3,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 17:27:16', 2),
(66, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 17:31:10', 2),
(67, '[{"id":17,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 18:15:02', 2),
(68, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 18:16:21', 2),
(69, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-13 21:26:03', 2),
(70, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-14 11:03:21', 2),
(71, '[{"id":16,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-14 11:25:16', 2),
(72, '[{"id":15,"nbr":1,"prix_unit":"0.5"},{"id":16,"nbr":1,"prix_unit":"1"}]', 1.5, '2015-07-14 11:27:32', 2),
(73, '[{"id":5,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-14 11:28:52', 2),
(74, '[{"id":5,"nbr":1,"prix_unit":"1"},{"id":17,"nbr":1,"prix_unit":"1"},{"id":21,"nbr":1,"prix_unit":"1"}]', 3, '2015-07-14 11:37:47', 2),
(75, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-14 15:53:52', 2),
(76, '[{"id":17,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-14 16:01:19', 2),
(77, '[{"id":13,"nbr":1,"prix_unit":"1"},{"id":10,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-14 16:02:21', 2),
(78, '[{"id":1,"nbr":1,"prix_unit":"1"},{"id":17,"nbr":1,"prix_unit":"1"},{"id":18,"nbr":1,"prix_unit":"1"}]', 3, '2015-07-14 16:33:35', 2),
(79, '[{"id":21,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-14 16:37:41', 2),
(80, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-14 16:47:15', 2),
(81, '[{"id":21,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-14 17:20:47', 2),
(82, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-14 17:28:27', 2),
(83, '[{"id":13,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-14 17:33:21', 2),
(84, '[{"id":18,"nbr":1,"prix_unit":"1"},{"id":4,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-16 14:27:34', 2),
(85, '[{"id":4,"nbr":1,"prix_unit":"1"},{"id":11,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-16 14:48:13', 2),
(86, '[{"id":17,"nbr":2,"prix_unit":"1"},{"id":4,"nbr":1,"prix_unit":"1"}]', 3, '2015-07-16 15:25:18', 2),
(87, '[{"id":18,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-16 16:18:09', 2),
(88, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-16 16:20:25', 2),
(89, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-16 16:28:51', 2),
(90, '[{"id":18,"nbr":1,"prix_unit":"1"},{"id":17,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-16 17:12:17', 2),
(91, '[{"id":4,"nbr":2,"prix_unit":"1"}]', 2, '2015-07-16 17:37:50', 2),
(92, '[{"id":18,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-16 19:13:27', 2),
(93, '[{"id":16,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-16 19:18:36', 2),
(94, '[{"id":16,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-17 13:58:50', 2),
(95, '[{"id":16,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-17 14:00:36', 2),
(96, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 14:57:13', 2),
(97, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 15:08:46', 2),
(98, '[{"id":16,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-17 15:10:24', 2),
(99, '[{"id":17,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 15:16:14', 2),
(100, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 15:16:42', 2),
(101, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 15:20:34', 2),
(102, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 15:34:29', 2),
(103, '[{"id":16,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-17 15:39:29', 2),
(104, '[{"id":18,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 16:02:21', 2),
(105, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 16:07:46', 2),
(106, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 16:10:32', 2),
(107, '[{"id":16,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 16:10:35', 2),
(108, '[{"id":18,"nbr":1,"prix_unit":"1"},{"id":4,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-17 16:11:25', 2),
(109, '[{"id":17,"nbr":2,"prix_unit":"1"}]', 2, '2015-07-17 16:12:43', 2),
(110, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 16:16:18', 2),
(111, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 16:49:12', 2),
(112, '[{"id":22,"nbr":1,"prix_unit":"-1"}]', -1, '2015-07-17 17:00:48', 2),
(113, '[{"id":22,"nbr":1,"prix_unit":"-1"}]', -1, '2015-07-17 17:01:03', 2),
(114, '[{"id":22,"nbr":1,"prix_unit":"-1"}]', -1, '2015-07-17 17:12:53', 2),
(115, '[{"id":11,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 17:19:32', 2),
(116, '[{"id":4,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 17:46:11', 2),
(117, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 17:47:17', 2),
(118, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 18:15:30', 2),
(119, '[{"id":16,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-17 18:26:46', 2),
(120, '[{"id":20,"nbr":2,"prix_unit":"1"}]', 2, '2015-07-17 18:42:49', 2),
(121, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-17 18:46:35', 2),
(122, '[{"id":1,"nbr":2,"prix_unit":"1"}]', 2, '2015-07-17 19:09:00', 2),
(123, '[{"id":15,"nbr":2,"prix_unit":"0.5"},{"id":16,"nbr":2,"prix_unit":"1"}]', 3, '2015-07-18 14:07:12', 2),
(124, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 14:45:02', 2),
(125, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 14:48:27', 2),
(126, '[{"id":16,"nbr":2,"prix_unit":"1"},{"id":15,"nbr":2,"prix_unit":"0.5"}]', 3, '2015-07-18 14:58:32', 2),
(127, '[{"id":16,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"}]', 1.5, '2015-07-18 14:58:57', 2),
(128, '[{"id":1,"nbr":1,"prix_unit":"1"},{"id":15,"nbr":1,"prix_unit":"0.5"},{"id":16,"nbr":1,"prix_unit":"1"}]', 2.5, '2015-07-18 15:09:37', 2),
(129, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 15:09:41', 2),
(130, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 15:17:32', 2),
(131, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 15:24:35', 2),
(132, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-18 15:32:51', 2),
(133, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-18 15:38:03', 2),
(134, '[{"id":6,"nbr":1,"prix_unit":"0.5"},{"id":1,"nbr":2,"prix_unit":"1"}]', 2.5, '2015-07-18 15:40:19', 2),
(135, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 15:44:20', 2),
(136, '[{"id":15,"nbr":1,"prix_unit":"0.5"},{"id":16,"nbr":1,"prix_unit":"1"}]', 1.5, '2015-07-18 15:45:20', 2),
(137, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 15:48:43', 2),
(138, '[{"id":6,"nbr":2,"prix_unit":"0.5"}]', 1, '2015-07-18 15:50:04', 2),
(139, '[{"id":11,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 15:54:01', 2),
(140, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 16:02:19', 2),
(141, '[{"id":11,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 16:06:47', 2),
(142, '[{"id":20,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 16:11:31', 2),
(143, '[{"id":6,"nbr":1,"prix_unit":"0.5"},{"id":11,"nbr":1,"prix_unit":"1"}]', 1.5, '2015-07-18 16:21:59', 2),
(144, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 16:23:36', 2),
(145, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 16:43:33', 2),
(146, '[{"id":10,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 16:44:29', 2),
(147, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 16:44:51', 2),
(148, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 17:36:44', 2),
(149, '[{"id":11,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 17:38:58', 2),
(150, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-18 17:40:43', 2),
(151, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 17:47:54', 2),
(152, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 17:49:23', 2),
(153, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 18:03:12', 2),
(154, '[{"id":1,"nbr":2,"prix_unit":"1"}]', 2, '2015-07-18 18:09:50', 2),
(155, '[{"id":6,"nbr":2,"prix_unit":"0.5"}]', 1, '2015-07-18 18:34:25', 2),
(156, '[{"id":6,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-18 18:51:39', 2),
(157, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 18:57:39', 2),
(158, '[{"id":11,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 19:08:05', 2),
(159, '[{"id":1,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-18 19:08:56', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `pass`, `admin`) VALUES
(1, 'Pyrate', '60ca972e501e0a2cd9e97e7744c99917018c1722fa6307febbda17bf11366771eab5e92141f04b4647321fdb98b97ebd1593d9742f9c036114dc64547a11eb79', 1),
(2, 'Simon', 'c4453ba8b761cced2b61b5e9081c2b1d27c96b5555fe6453211e4d2a5bfcd8cd32d94a7f831768d8671a98f7cd962e37fc680cbffe25e08d121fc95fca645a8e', 1),
(4, 'Dom', 'ff46e7838cfcd781c60b13251215acdfe8669b055d7ac452fd2092db11353551709ce2231b31f357027cc5b0f385fc2a6fae0d0233badea14dd1feb944f464aa', 0),
(5, 'Paul', '6b445e317a2c8318b34b1a24aab988de6efc6cd346c3cf092f03bf4056da260f04a555b72f3feec5ce273f6343b7d1b175ec363227205ba1e62280791b1ba6c2', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
