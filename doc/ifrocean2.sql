-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Juin 2016 à 16:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_ifrocean`
--

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

CREATE TABLE IF NOT EXISTS `especes` (
  `idEspece` int(11) NOT NULL AUTO_INCREMENT,
  `nomEspece` varchar(50) NOT NULL,
  PRIMARY KEY (`idEspece`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `especes`
--

INSERT INTO `especes` (`idEspece`, `nomEspece`) VALUES
(1, 'colubus tractus'),
(2, 'camus bogus'),
(3, 'bernadus frolixus'),
(4, 'colubus bacus'),
(5, 'poulotus furus'),
(6, 'giolus ducos'),
(7, 'locus fractus'),
(8, 'litus tructos'),
(9, 'motus lacus'),
(10, 'licusos dalamos'),
(11, 'mifacos colos'),
(12, 'benjamus fructusos'),
(13, 'albertus laqus'),
(14, 'jmalos filatos'),
(15, 'pierros veneros'),
(16, 'loivitus calactus'),
(17, 'ribertus delobus'),
(18, 'jiulos fractos'),
(19, 'polizus frictis'),
(20, 'barusos colubas');

-- --------------------------------------------------------

--
-- Structure de la table `espece_zone`
--

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
(1, 1, 214),
(1, 2, 652),
(1, 3, 231),
(1, 4, 154),
(1, 5, 256),
(3, 1, 658),
(3, 2, 623),
(3, 4, 124),
(3, 5, 658),
(3, 10, 753),
(4, 1, 951),
(4, 2, 65),
(4, 3, 45),
(4, 5, 321),
(4, 15, 98),
(5, 16, 124),
(5, 17, 78),
(5, 18, 35),
(5, 19, 26),
(5, 20, 101),
(6, 16, 87),
(6, 17, 35),
(6, 18, 15),
(6, 19, 85),
(6, 20, 26),
(7, 6, 65),
(7, 7, 87),
(7, 8, 65),
(7, 9, 12),
(7, 10, 14),
(8, 11, 65),
(8, 12, 87),
(8, 13, 65),
(8, 14, 12),
(8, 15, 14),
(9, 16, 65),
(9, 17, 87),
(9, 18, 65),
(9, 19, 12),
(9, 20, 14),
(10, 1, 65),
(10, 2, 87),
(10, 3, 65),
(10, 4, 12),
(10, 5, 14),
(11, 6, 65),
(11, 7, 87),
(11, 8, 65),
(11, 9, 12),
(11, 10, 14),
(12, 11, 65),
(12, 12, 87),
(12, 13, 65),
(12, 14, 12),
(12, 15, 14),
(13, 16, 65),
(13, 17, 87),
(13, 18, 65),
(13, 19, 12),
(13, 20, 14),
(14, 1, 65),
(14, 2, 87),
(14, 3, 65),
(14, 4, 12),
(14, 5, 14),
(15, 6, 65),
(15, 7, 87),
(15, 8, 65),
(15, 9, 12),
(15, 10, 14),
(16, 11, 65),
(16, 12, 87),
(16, 13, 65),
(16, 14, 12),
(16, 15, 14),
(17, 16, 65),
(17, 17, 87),
(17, 18, 65),
(17, 19, 12),
(17, 20, 14),
(18, 1, 65),
(18, 2, 87),
(18, 3, 65),
(18, 4, 12),
(18, 5, 14),
(19, 6, 65),
(19, 7, 87),
(19, 8, 65),
(19, 9, 12),
(19, 10, 14),
(20, 11, 65),
(20, 12, 87),
(20, 13, 65),
(20, 14, 12),
(20, 15, 14),
(21, 16, 65),
(21, 17, 87),
(21, 18, 65),
(21, 19, 12),
(21, 20, 14),
(22, 1, 65),
(22, 2, 87),
(22, 3, 65),
(22, 4, 12),
(22, 5, 14),
(23, 6, 65),
(23, 7, 87),
(23, 8, 65),
(23, 9, 12),
(23, 10, 14),
(24, 11, 65),
(24, 12, 87),
(24, 13, 65),
(24, 14, 12),
(24, 15, 14),
(25, 16, 65),
(25, 17, 87),
(25, 18, 65),
(25, 19, 12),
(25, 20, 14),
(26, 1, 65),
(26, 2, 87),
(26, 3, 65),
(26, 4, 12),
(26, 5, 14),
(27, 6, 65),
(27, 7, 87),
(27, 8, 65),
(27, 9, 12),
(27, 10, 14),
(28, 11, 65),
(28, 12, 87),
(28, 13, 65),
(28, 14, 12),
(28, 15, 14),
(29, 16, 65),
(29, 17, 87),
(29, 18, 65),
(29, 19, 12),
(29, 20, 14);

-- --------------------------------------------------------

--
-- Structure de la table `etudes`
--

CREATE TABLE IF NOT EXISTS `etudes` (
  `idEtude` int(11) NOT NULL AUTO_INCREMENT,
  `nomEtude` varchar(50) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `superficie` int(11) NOT NULL,
  `date` date NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEtude`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `etudes`
--

INSERT INTO `etudes` (`idEtude`, `nomEtude`, `ville`, `superficie`, `date`, `validation`) VALUES
(1, 'noirmoutier2013', 'noirmoutier', 123654789, '2016-06-16', 0),
(2, 'pornic2014', 'pornic', 956321458, '2016-06-29', 0),
(5, 'mehdya2016', 'mehdya', 984563215, '2016-08-19', 0),
(7, 'M.Hulo2015', 'Saint-Mars/Mer', 874512369, '2016-07-14', 0),
(8, 'toulouse2020', 'toulouse', 654123659, '2019-12-31', 0),
(9, 'marseille2010', 'Marseille', 654187965, '2010-07-29', 0),
(10, 'pearl habor 1914', 'Hong-kong', 962365487, '2016-07-05', 0),
(11, 'pornic2009', 'pornic', 451278963, '2016-06-26', 0),
(12, 'Alan', 'Breton', 198, '2016-06-23', 0);

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `zones`
--

INSERT INTO `zones` (`idZone`, `nomZone`, `latA`, `longA`, `latB`, `longB`, `latC`, `longC`, `latD`, `longD`, `surface`, `validZone`, `idEtude`) VALUES
(1, 'groupeA', 39.1545, 45.2125, 87.3266, 21.3266, 15.2357, 20.2356, 24.1237, 62.0145, 23659, 0, 8),
(3, 'groupeB', 12.5487, 35.1245, 59.2214, 24.1245, 75.1224, 30.2145, 51.0123, 84.2145, 65148, 0, 8),
(4, 'groupeC', 65.1245, 45.2356, 87.2316, 65.2145, 65.3214, 12.2145, 23.1245, 32.0124, 62514, 0, 8),
(5, 'groupeD', 31.0235, 62.0124, 52.0324, 65.0125, 32.0124, 32.0235, 42.0214, 42.0369, 95361, 0, 8),
(6, 'groupeA', 21.3265, 54.3136, 65.2356, 84.2655, 65.2354, 54.0236, 85.0325, 15.0321, 45128, 0, 1),
(7, 'groupeB', 48.3256, 54.2365, 21.3256, 25.3214, 62.2365, 51.3247, 36.3258, 85.2157, 94561, 0, 1),
(8, 'groupeC', 61.3265, 57.3254, 62.2154, 92.3265, 51.3254, 96.3215, 39.0325, 40.2154, 51427, 0, 1),
(9, 'groupeD', 28.0268, 24.0215, 16.2359, 20.3697, 62.3254, 96.2164, 43.0326, 50.3264, 95847, 0, 1),
(10, 'groupeA', 23.5487, 21.3265, 32.3265, 26.3254, 62.3266, 62.2145, 54.3266, 59.3254, 65412, 0, 2),
(11, 'groupeB', 87.3256, 65.3215, 84.3265, 54.3215, 84.3265, 64.3264, 84.3251, 15.3265, 62315, 0, 2),
(12, 'groupeC', 65.3254, 58.2145, 12.3256, 54.3265, 84.3265, 65.3221, 51.6255, 78.2154, 32564, 0, 2),
(13, 'groupeD', 65.3265, 54.3298, 14.5432, 26.3265, 25.2154, 54.2145, 87.3215, 65.0321, 15487, 0, 2),
(14, 'groupeA', 62.3265, 60.3265, 58.2154, 36.2548, 51.3265, 21.3265, 89.3265, 54.3265, 56984, 0, 5),
(15, 'groupeB', 65.3265, 54.3165, 62.3254, 18.3254, 65.3235, 15.2365, 84.3265, 54.3265, 65147, 0, 5),
(16, 'groupeC', 84.3265, 87.3265, 65.3254, 18.3221, 62.3265, 54.3216, 58.2357, 61.3265, 65984, 0, 5),
(17, 'groupeD', 87.3254, 51.3265, 62.5184, 63.3214, 62.2145, 64.3265, 45.3215, 84.2356, 65147, 0, 5),
(18, 'groupeA', 89.3265, 65.3221, 65.3287, 26.1245, 65.1948, 24.3265, 14.2356, 89.9999, 62458, 0, 7),
(19, 'groupeB', 54.3265, 21.5487, 62.3256, 84.3215, 48.2359, 15.5115, 54.5454, 59.5959, 12457, 0, 7),
(20, 'groupeC', 54.3214, 65.3214, 84.2326, 54.0325, 54.3655, 65.3214, 87.3265, 78.3256, 68594, 0, 7),
(21, 'groupeD', 65.2154, 87.6532, 21.3232, 45.5478, 84.3254, 58.2314, 45.1265, 75.2145, 62145, 0, 7),
(22, 'groupeA', 59.2659, 54.3265, 15.2615, 59.2356, 54.3265, 28.2828, 21.2121, 45.2364, 98745, 0, 9),
(23, 'groupeB', 54.2356, 21.3265, 12.4578, 36.3254, 52.3312, 49.3265, 40.3215, 15.2365, 62154, 0, 9),
(24, 'groupeC', 45.2365, 54.3221, 19.2948, 42.3265, 54.4545, 83.0233, 59.2314, 62.2354, 95487, 0, 9),
(25, 'groupeD', 54.3221, 65.2356, 14.1255, 29.2587, 65.1465, 36.2544, 58.2685, 50.2314, 95514, 0, 9),
(26, 'groupeA', 54.2615, 59.2365, 48.1523, 47.2665, 12.2365, 45.0235, 51.3265, 84.2355, 68412, 0, 10),
(27, 'groupeB', 89.3265, 84.2355, 15.2651, 48.2356, 62.2544, 48.2356, 12.1256, 56.3254, 63214, 0, 10),
(28, 'groupeC', 28.2645, 65.2365, 54.3257, 68.2214, 18.0315, 17.2365, 9.2155, 72.0321, 58961, 0, 10),
(29, 'groupeD', 84.2355, 48.2365, 54.3265, 18.2615, 17.2585, 35.2321, 1.3222, 45.3235, 15498, 0, 10);

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
