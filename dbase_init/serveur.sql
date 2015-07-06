-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Juillet 2015 à 04:22
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
-- Structure de la table `prix`
--

CREATE TABLE IF NOT EXISTS `prix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` float NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `prix`
--

INSERT INTO `prix` (`id`, `prix`, `id_categorie`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1.5, 3),
(4, 1, 4),
(5, 2, 5),
(6, 0.5, 6),
(7, 1, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `name`, `img`, `prix_achat`, `nbr`, `id_categorie`, `scancode`, `nbr_limit`, `id_prix`, `total_stock`) VALUES
(1, 'Coca', 'img/Item/F12.png', 0.5, 10, 1, '9782818903193', 10, 1, 16),
(2, 'Panach''', 'img/Item/F3.png', 0.73, 9, 1, '9782818901731', 10, 1, 16),
(3, 'Leff blonde', 'img/Item/A2.png', 1, 5, 2, '9782350789606', 2, 2, 5),
(4, 'Crêpe', 'img/Item/M2.png', 0.07, 200, 3, '9782350789293', 10, 3, 200),
(6, 'Balisto', 'img/Item/B2.png', 0.57, 8, 4, '9782350788364', 5, 4, 10),
(7, 'Café / Thé', 'img/Item/C1.png', 0.01, 199, 6, '9782350787923', 20, 6, 200),
(8, 'Ecocup', 'img/Item/O1.png', 1, 99, 7, '9782350787077', 0, 7, 100),
(9, 'Twix', 'img/Item/B10.png', 0.53, 0, 4, '2951703709401', 0, 4, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`id`, `list`, `prix_total`, `date`, `id_user`) VALUES
(1, '[{"id":6,"nbr":1,"prix_unit":"1"},{"id":7,"nbr":1,"prix_unit":"0.5"},{"id":8,"nbr":1,"prix_unit":"1"}]', 2.5, '2015-07-06 04:09:03', 1),
(2, '[{"id":1,"nbr":5,"prix_unit":"1"},{"id":2,"nbr":5,"prix_unit":"1"},{"id":"","nbr":1,"prix_unit":null}]', 10, '2015-07-06 04:14:39', 1);

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
