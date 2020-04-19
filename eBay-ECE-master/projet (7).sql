-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 avr. 2020 à 17:31
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
  `Nom_acheteur` varchar(20) NOT NULL,
  `Prenom_acheteur` varchar(20) NOT NULL,
  `Email_acheteur` varchar(30) NOT NULL,
  `Adresse_acheteur` varchar(30) NOT NULL,
  `Clause` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_acheteur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`ID_acheteur`, `Nom_acheteur`, `Prenom_acheteur`, `Email_acheteur`, `Adresse_acheteur`, `Clause`) VALUES
(1, 'e', 'e', 'e@gmail.com', '5e', 1);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_admin` int(11) NOT NULL AUTO_INCREMENT,
  `mdp_admin` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_admin`, `mdp_admin`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `ID_item` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_item` varchar(20) NOT NULL DEFAULT 'accessoire VIP',
  `Nom_item` varchar(20) NOT NULL,
  `Photo_item` varchar(300) NOT NULL,
  `Description_item` varchar(300) NOT NULL DEFAULT 'none',
  `Video_item` varchar(300) NOT NULL DEFAULT 'none',
  `Prix_item` float NOT NULL DEFAULT 2,
  `vente_item` varchar(20) NOT NULL DEFAULT 'aucun',
  `achat_imm_item` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_item`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ID_item`, `categorie_item`, `Nom_item`, `Photo_item`, `Description_item`, `Video_item`, `Prix_item`, `vente_item`, `achat_imm_item`) VALUES
(2, 'accessoire VIP', 'b', 'b', 'none', 'none', 2, 'aucun', 1),
(5, '', 'e', 'e', 'none', 'none', 2, 'aucun', 1),
(7, 'bon pour le musÃ©e', 'f', 'f', 'none', 'none', 2, 'aucun', 1),
(8, 'bon pour le musÃ©e', 'f', 'f', 'none', 'none', 2, 'aucun', 1),
(18, 'accessoire VIP', 'qsq', 'qs', 'none', 'none', 2, 'aucun', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `ID_vendeur` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo_vendeur` varchar(20) NOT NULL,
  `Email_vendeur` varchar(20) NOT NULL,
  `Nom_vendeur` varchar(20) NOT NULL,
  `Photo_vendeur` varchar(200) NOT NULL,
  `Image_fond` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID_vendeur`, `Pseudo_vendeur`, `Email_vendeur`, `Nom_vendeur`, `Photo_vendeur`, `Image_fond`) VALUES
(2, 'v', 'v@gmail.com', 'vba', 'kp', 've'),
(12, 'a', 'a@z', 'a', 'a', 'a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
