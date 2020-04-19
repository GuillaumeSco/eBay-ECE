-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 avr. 2020 à 11:56
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `ID_acheteur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `clause` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_acheteur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`ID_acheteur`, `Nom`, `Prenom`, `Email`, `Adresse`, `clause`) VALUES
(1, 'e', 'ed', 'e@gmail.com', 'er', 1);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID`, `mdp`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `ID_vendeur` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Photo` varchar(300) NOT NULL,
  `Image_fond` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_vendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID_vendeur`, `Pseudo`, `Email`, `Nom`, `Photo`, `Image_fond`) VALUES
(1, 'N', 'N@gmail.com', 'nl', 'maxresdefault.jpg', 'v'),
(2, 'v', 'v@gmail.com', 'vn', 'https://www.gettyimages.fr/gi-resources/images/frontdoor/creative/PanoramicImagesRM/FD_image.jpg', ''),
(3, 'f', 'f@gmail.com', 'f', 'f', 'f'),
(4, 'a', 'a@z', 'a', 'a', 'a'),
(5, 'aa', 'va@gmail.com', 'a', 'a', 'a'),
(6, 'd', 'd@gmail.com', 'd', 'd', 'd'),
(7, 'e', 'e@gmail.com', 'e', 'e', 'e'),
(8, 'dr', 'dr@gmail.com', 'd', 'd', 'd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;