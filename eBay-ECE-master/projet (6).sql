-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 avr. 2020 à 12:46
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ID_vendeur` int(11) NOT NULL DEFAULT 10,
  PRIMARY KEY (`ID_item`),
  KEY `ID_vendeur` (`ID_vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ID_item`, `categorie_item`, `Nom_item`, `Photo_item`, `Description_item`, `Video_item`, `Prix_item`, `vente_item`, `achat_imm_item`, `ID_vendeur`) VALUES
(1, 'accessoire VIP', 'a', 'a', 'a', 'a', 5.2, 'a', 1, 10),
(2, 'accessoire VIP', 'b', 'b', 'none', 'none', 2, 'aucun', 1, 10),
(3, 'accessoire VIP', 'c', 'c', 'none', 'none', 2, 'aucun', 1, 10),
(4, 'accessoire VIP', 'd', 'd', 'none', 'none', 2, 'aucun', 1, 10),
(5, '', 'e', 'e', 'none', 'none', 2, 'aucun', 1, 10),
(6, 'bon pour le musÃ©e', 'f', 'f', 'none', 'none', 2, 'aucun', 1, 10),
(7, 'bon pour le musÃ©e', 'f', 'f', 'none', 'none', 2, 'aucun', 1, 10),
(8, 'bon pour le musÃ©e', 'f', 'f', 'none', 'none', 2, 'aucun', 1, 10),
(9, 'bon pour le musÃ©e', 'f', 'f', 'none', 'none', 2, 'aucun', 1, 10),
(10, 'bon pour le musee', 'g', 'g', 'none', 'none', 2, 'aucun', 1, 10),
(11, 'bon pour le musee', 'g', 'g', 'none', 'none', 2, 'aucun', 1, 10),
(12, 'accessoire VIP', '', '', 'none', 'none', 2, 'aucun', 1, 10),
(13, 'ferraille ou tresor', 's', 's', 'none', 'none', 2, 'aucun', 1, 10),
(14, 'bon pour le musee', 'v', 'v', 'none', 'none', 2, 'aucun', 1, 10),
(15, 'accessoire VIP', 'kkkkkkkk', 'k', 'none', 'none', 2, 'aucun', 1, 10),
(16, 'accessoire VIP', 'rr', 'r', 'none', 'none', 2, 'aucun', 1, 2),
(17, 'accessoire VIP', 'o', 'oo', 'none', 'none', 2, 'aucun', 1, 10),
(18, 'accessoire VIP', 'qsq', 'qs', 'none', 'none', 2, 'aucun', 1, 10),
(19, 'accessoire VIP', 'qsq', 'qs', 'none', 'none', 2, 'aucun', 1, 10),
(20, 'accessoire VIP', 'uyi', 'kduy', 'none', 'none', 2, 'aucun', 1, 10),
(21, 'accessoire VIP', 'liu', 'liu', 'none', 'none', 2, 'aucun', 1, 10),
(22, 'accessoire VIP', 'liu', 'liu', 'none', 'none', 2, 'aucun', 1, 10),
(23, 'accessoire VIP', '', '', 'none', 'none', 2, 'aucun', 1, 10),
(24, 'accessoire VIP', 'azert', 'azert', 'none', 'none', 2, 'aucun', 1, 10),
(25, 'accessoire VIP', 'qsdf', 'qsdf', 'none', 'none', 2, 'aucun', 1, 10),
(26, 'accessoire VIP', 'wxc', 'wxc', 'none', 'none', 2, 'aucun', 1, 10),
(27, 'accessoire VIP', '', '', 'none', 'none', 2, 'aucun', 1, 10),
(28, 'accessoire VIP', '', '', 'none', 'none', 2, 'aucun', 1, 10),
(29, 'accessoire VIP', '', '', 'none', 'none', 2, 'aucun', 1, 10),
(30, 'accessoire VIP', '', '', 'none', 'none', 2, 'aucun', 1, 10),
(31, 'accessoire VIP', '', '', 'none', 'none', 2, 'aucun', 1, 10),
(32, 'bon pour le musee', 'whwhw', 'whwhh', 'none', 'none', 2, 'aucun', 1, 10),
(33, 'bon pour le musee', 'ololol', 'lolool', 'lolol', 'none', 2, 'aucun', 1, 10),
(34, 'bon pour le musee', 'dede', 'deded', 'dede', 'deded', 2, 'aucun', 1, 10),
(35, 'bon pour le musee', 'aaaaaaaaa', 'aaaaaaa', 'a', 'aaa', 0.34, 'aucun', 1, 10),
(36, 'bon pour le musee', 'zzzzzz', 'zzzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzz', 'zzzzzzzzzzzzzz', 55.98, 'on', 1, 10),
(37, 'accessoire VIP', 'rtrtr', 'rtrtrt', 'rtrtrt', 'rtrtrt', 74.96, 'on', 1, 10),
(38, 'accessoire VIP', 'jjj', 'jj', 'jj', 'jjj', 78.01, 'on', 1, 10),
(39, 'ferraille ou tresor', 'mpmp', 'mpmpm', 'mpmp', 'mpmp', 85.98, 'on', 1, 10),
(40, 'bon pour le musee', 'hyh', 'hyhy', 'hyh', 'hyhy', 0.92, 'vente par enchere', 1, 10),
(41, 'accessoire VIP', 'uuuuuu', 'uu', 'u', 'u', 651.99, 'vente par enchere', 1, 10),
(42, 'accessoire VIP', 'k', 'k', 'k', 'k', 5, 'vente par enchere', 0, 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID_vendeur`, `Pseudo_vendeur`, `Email_vendeur`, `Nom_vendeur`, `Photo_vendeur`, `Image_fond`) VALUES
(2, 'v', 'v@gmail.com', 'vba', 'kp', 've'),
(3, 'i', 'i@gmail.com', 'il', 'ij', 'im'),
(10, 'n', 'n@gmail.com', 'nl', 'np', 'ni');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `f1` FOREIGN KEY (`ID_vendeur`) REFERENCES `vendeur` (`ID_vendeur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
