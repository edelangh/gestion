-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Juillet 2015 à 02:05
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
  `fond` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `caisse`
--

INSERT INTO `caisse` (`id`, `fond`, `date`) VALUES
(1, 100, '2015-07-08');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `prix`
--

INSERT INTO `prix` (`id`, `prix`) VALUES
(1, 0.5),
(2, 1),
(3, 1.5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `name`, `img`, `prix_achat`, `nbr`, `id_categorie`, `scancode`, `nbr_limit`, `id_prix`, `total_stock`) VALUES
(1, 'Coca-Cola', 'img/Item/F12.png', 0.48, 90, 1, 'Coca-Cola', 15, 2, 90),
(2, 'Perrier', 'img/Item/F1.png', 0.35, 24, 1, 'Perrier', 8, 1, 24),
(3, 'Nestea', 'img/Item/unknow.png', 0.44, 12, 1, 'Nestea', 0, 2, 12),
(4, 'Orangina 25cl', 'img/Item/F10.png', 0.52, 16, 1, 'Origina 25cl', 0, 2, 16),
(5, 'Oasis Tropical Zero', 'img/Item/F9.png', 0.55, 12, 1, 'Oasis Tropical 0', 0, 2, 12),
(6, 'Panach''', 'img/Item/F3.png', 0.3, 40, 1, 'Panach''', 15, 1, 40),
(7, 'Leffe Blonde', 'img/Item/A2.png', 0.57, 48, 2, 'Leffe Blonde', 24, 3, 48),
(8, 'Crêpe', 'img/Item/M2.png', 0.1, 150, 3, 'Crepes', 30, 2, 150),
(9, 'Croque-Monsieur', 'img/Item/M1.png', 0.42, 40, 3, 'Croques Monsieur', 10, 1, 40),
(10, 'Twix', 'img/Item/G1.png', 0.3, 71, 4, 'Twix', 15, 2, 71),
(11, 'Lion', 'img/Item/B7.png', 0.32, 30, 4, 'Lion', 15, 2, 30),
(12, 'Sundy', 'img/Item/B1.png', 0.35, 29, 4, 'Sundy', 0, 2, 29),
(13, 'Kit-Kat', 'img/Item/B9.png', 0.34, 75, 4, 'Kit-Kat', 15, 2, 75),
(14, 'Bounty', 'img/Item/B6.png', 0.36, 15, 4, 'Bounty', 0, 2, 15),
(15, 'Forfait The / Cafe', 'img/Item/C1.png', 0.5, 5000, 6, 'Forfait The / Cafe', 0, 1, 5000),
(16, 'Ecocup', 'img/Item/O1.png', 1, 500, 7, 'Ecocup', 0, 2, 500);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `pass`, `admin`) VALUES
(1, 'Pyrate', '60ca972e501e0a2cd9e97e7744c99917018c1722fa6307febbda17bf11366771eab5e92141f04b4647321fdb98b97ebd1593d9742f9c036114dc64547a11eb79', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
