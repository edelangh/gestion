-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Juillet 2015 à 22:39
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
(1, 100, '2015-07-06');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `name`, `img`, `prix_achat`, `nbr`, `id_categorie`, `scancode`, `nbr_limit`, `id_prix`, `total_stock`) VALUES
(1, 'Coca', 'img/Item/F12.png', 0.33, 49, 1, '9782818903193', 15, 1, 100),
(3, 'Leff blonde', 'img/Item/A2.png', 1.03, 50, 2, '9782350789606', 3, 2, 50),
(4, 'Crêpe', 'img/Item/M2.png', 0.08, 200, 3, '9782350789293', 20, 3, 200),
(6, 'Balisto', 'img/Item/B2.png', 0.42, 29, 4, '9782350788364', 10, 4, 30),
(7, 'Café / Thé', 'img/Item/C1.png', 0.01, 499, 6, '9782350787923', 10, 6, 500),
(8, 'Ecocup', 'img/Item/O1.png', 1, 500, 7, '9782350787077', 10, 7, 500),
(17, 'Panach''', 'img/Item/F3.png', 0.73, 15, 1, '9782818901731', 10, 1, 20);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`id`, `list`, `prix_total`, `date`, `id_user`) VALUES
(1, '[{"id":17,"nbr":1,"prix_unit":"1"},{"id":1,"nbr":1,"prix_unit":"1"}]', 2, '2015-07-06 20:55:17', 3),
(2, '[{"id":17,"nbr":4,"prix_unit":"1"}]', 4, '2015-07-06 21:16:59', 3),
(3, '[{"id":6,"nbr":1,"prix_unit":"1"}]', 1, '2015-07-06 22:15:33', 3),
(4, '[{"id":7,"nbr":1,"prix_unit":"0.5"}]', 0.5, '2015-07-06 22:15:54', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `pass`, `admin`) VALUES
(1, 'Pyrate', '60ca972e501e0a2cd9e97e7744c99917018c1722fa6307febbda17bf11366771eab5e92141f04b4647321fdb98b97ebd1593d9742f9c036114dc64547a11eb79', 1),
(2, 'Dominique', '813937f2bd0fe3f5402bceda538d375e09818ec33ddc047f0cea43e5fdffe4803395e04b88e1dee288489205a6301ded612062c2ce47ff10d8eba78d73cce36d', 0),
(3, 'bar', '28af7dd8a08381b732b428541ddbf4e1b6d120d8318eb9cf8801c483147283b34761304518e502e28eeda8e9fdf9efa35fe0fb138078b21b444d3032e0cae10f', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
