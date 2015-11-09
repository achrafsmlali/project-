-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 14 Septembre 2015 à 00:49
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `table 1`
--

CREATE TABLE IF NOT EXISTS `table 1` (
  `Numéro` varchar(8) DEFAULT NULL,
  `Catégorie` varchar(18) DEFAULT NULL,
  `État` varchar(7) DEFAULT NULL,
  `État du problème` varchar(16) DEFAULT NULL,
  `Affectation` varchar(49) DEFAULT NULL,
  `Responsable` varchar(15) DEFAULT NULL,
  `Brève description` varchar(99) DEFAULT NULL,
  `Code Priorité` varchar(12) DEFAULT NULL,
  `Initial Impact` varchar(26) DEFAULT NULL,
  `Gravité` varchar(12) DEFAULT NULL,
  `Type de problème` varchar(18) DEFAULT NULL,
  `Clôturé par` varchar(20) DEFAULT NULL,
  `Date/Heure d'ouverture` varchar(16) DEFAULT NULL,
  `Date/Heure de clôture` varchar(16) DEFAULT NULL,
  `open` datetime DEFAULT NULL,
  `close` datetime DEFAULT NULL,
  `duree` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
