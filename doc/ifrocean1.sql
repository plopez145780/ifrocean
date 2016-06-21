-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Juin 2016 à 15:40
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ifrocean`
--

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

CREATE TABLE IF NOT EXISTS `especes` (
  `idEspece` int(11) NOT NULL AUTO_INCREMENT,
  `nomEspece` varchar(50) NOT NULL,
  `quantiteEspece` int(11) NOT NULL,
  `idZone` int(11) NOT NULL,
  PRIMARY KEY (`idEspece`),
  KEY `idZone` (`idZone`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `especes`
--

INSERT INTO `especes` (`idEspece`, `nomEspece`, `quantiteEspece`, `idZone`) VALUES
(1, 'scrabulus cumulus', 21, 1),
(2, 'comolos fretanos', 54, 2),
(3, 'chloetus colorus', 1, 2),
(4, 'manuelus volterus', 51, 2),
(5, 'benjamus comicus', 24, 3),
(6, 'cedricus wattwattus', 35, 3),
(7, 'vincinus papatus', 78, 4),
(8, 'polotus caninbus', 65, 4);

-- --------------------------------------------------------

--
-- Structure de la table `etudes`
--

CREATE TABLE IF NOT EXISTS `etudes` (
  `idEtude` int(11) NOT NULL AUTO_INCREMENT,
  `nomEtude` varchar(50) NOT NULL,
  `nomVille` varchar(50) NOT NULL,
  `superficie` int(11) NOT NULL,
  `datePrelevement` date NOT NULL,
  `finEtude` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEtude`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `etudes`
--

INSERT INTO `etudes` (`idEtude`, `nomEtude`, `nomVille`, `superficie`, `datePrelevement`, `finEtude`) VALUES
(1, 'pornic2016', 'pornic', 2015457865, '2016-06-07', 0),
(2, 'vendéen2015', 'vendée', 1656656560, '2016-06-02', 1),
(3, 'ifrocean', 'Nantes', 215487, '2016-06-06', 0),
(4, 'ifroceanus2016', 'Nantes', 215465, '2016-06-10', 0),
(5, 'mehdya2014', 'Kénitra', 21549887, '2014-07-28', 0),
(6, 'allanus2016', 'Pornichet', 350000, '2016-06-07', 0),
(7, 'pierroLélico', 'Nantes', 152, '2016-06-10', 0);

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `idZone` int(11) NOT NULL AUTO_INCREMENT,
  `nomZone` varchar(50) NOT NULL,
  `latPointA` int(11) NOT NULL,
  `longPointA` int(11) NOT NULL,
  `latPointB` int(11) NOT NULL,
  `longPointB` int(11) NOT NULL,
  `latPointC` int(11) NOT NULL,
  `longPointC` int(11) NOT NULL,
  `latPointD` int(11) NOT NULL,
  `longPointD` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `finZone` tinyint(1) NOT NULL,
  `idEtude` int(11) NOT NULL,
  PRIMARY KEY (`idZone`),
  KEY `idEtude` (`idEtude`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `zones`
--

INSERT INTO `zones` (`idZone`, `nomZone`, `latPointA`, `longPointA`, `latPointB`, `longPointB`, `latPointC`, `longPointC`, `latPointD`, `longPointD`, `surface`, `finZone`, `idEtude`) VALUES
(1, 'loulou44', 123651, 215473, 215471, 326588, 326598, 326598, 875421, 325498, 12324565, 0, 1),
(2, 'popo77', 325498, 876521, 326598, 875421, 325465, 876521, 213265, 215421, 12326554, 0, 1),
(3, 'francheB', 214548, 216554, 326598, 875432, 213265, 326598, 215487, 216554, 21655487, 0, 2),
(4, 'groupeA', 215487, 326598, 326598, 215487, 325498, 216598, 215487, 215421, 20326598, 0, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `especes`
--
ALTER TABLE `especes`
  ADD CONSTRAINT `especes_ibfk_1` FOREIGN KEY (`idZone`) REFERENCES `zones` (`idZone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_ibfk_1` FOREIGN KEY (`idEtude`) REFERENCES `etudes` (`idEtude`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
