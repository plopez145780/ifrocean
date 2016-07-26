-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 25 Juillet 2016 à 13:29
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_ifrocean`
--

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

DROP TABLE IF EXISTS `especes`;
CREATE TABLE IF NOT EXISTS `especes` (
  `idEspece` int(11) NOT NULL AUTO_INCREMENT,
  `nomEspece` varchar(50) NOT NULL,
  PRIMARY KEY (`idEspece`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `especes`
--

INSERT INTO `especes` (`idEspece`, `nomEspece`) VALUES
(1, 'Spirobranchus giganteus'),
(2, 'Haemopis sanguisuga'),
(3, 'Ophelia borealis'),
(4, 'Eteone longa'),
(5, 'Magelona johnstoni'),
(6, 'Ochetostoma erythrogrammon'),
(7, 'Pherecardia striata'),
(8, 'Marphysa sanguinea'),
(9, 'Phyllodoce rosea');

-- --------------------------------------------------------

--
-- Structure de la table `espece_zone`
--

DROP TABLE IF EXISTS `espece_zone`;
CREATE TABLE IF NOT EXISTS `espece_zone` (
  `idZone` int(11) NOT NULL,
  `idEspece` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idZone`,`idEspece`),
  KEY `idZone` (`idZone`),
  KEY `idEspece` (`idEspece`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `espece_zone`
--

INSERT INTO `espece_zone` (`idZone`, `idEspece`, `quantite`) VALUES
(1, 1, 65),
(1, 7, 14),
(1, 9, 25),
(2, 3, 18),
(2, 6, 47),
(2, 7, 50),
(3, 1, 31),
(3, 2, 4),
(3, 7, 39);

-- --------------------------------------------------------

--
-- Structure de la table `etudes`
--

DROP TABLE IF EXISTS `etudes`;
CREATE TABLE IF NOT EXISTS `etudes` (
  `idEtude` int(11) NOT NULL AUTO_INCREMENT,
  `nomEtude` varchar(50) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `superficie` int(11) NOT NULL,
  `date` date NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEtude`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudes`
--

INSERT INTO `etudes` (`idEtude`, `nomEtude`, `ville`, `superficie`, `date`, `validation`) VALUES
(1, 'Etude 001 - été 2016', 'biarritz', 5000, '2016-07-20', 1);

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `idZone` int(11) NOT NULL AUTO_INCREMENT,
  `nomZone` varchar(50) NOT NULL,
  `latA` float NOT NULL,
  `longA` float NOT NULL,
  `latB` float NOT NULL,
  `longB` float NOT NULL,
  `latC` float NOT NULL,
  `longC` float NOT NULL,
  `latD` float NOT NULL,
  `longD` float NOT NULL,
  `surface` int(11) NOT NULL,
  `validZone` tinyint(1) NOT NULL,
  `idEtude` int(11) NOT NULL,
  PRIMARY KEY (`idZone`),
  KEY `idEtude` (`idEtude`),
  KEY `idEtude_2` (`idEtude`),
  KEY `idEtude_3` (`idEtude`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `zones`
--

INSERT INTO `zones` (`idZone`, `nomZone`, `latA`, `longA`, `latB`, `longB`, `latC`, `longC`, `latD`, `longD`, `surface`, `validZone`, `idEtude`) VALUES
(1, 'Zone Alpha', 43.4845, -1.559, 43.4847, -1.55929, 43.4848, -1.55913, 43.4847, -1.55884, 536, 1, 1),
(2, 'Zone Beta', 43.4835, -1.56061, 43.4836, -1.56038, 43.4839, -1.56074, 43.4838, -1.56094, 853, 1, 1),
(3, 'Zone gamma', 43.4853, -1.55819, 43.4852, -1.55819, 43.4854, -1.55856, 43.4854, -1.55843, 238, 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `espece_zone`
--
ALTER TABLE `espece_zone`
  ADD CONSTRAINT `espece_zone_ibfk_1` FOREIGN KEY (`idZone`) REFERENCES `zones` (`idZone`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `espece_zone_ibfk_2` FOREIGN KEY (`idEspece`) REFERENCES `especes` (`idEspece`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_ibfk_1` FOREIGN KEY (`idEtude`) REFERENCES `etudes` (`idEtude`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
