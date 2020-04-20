-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 19 avr. 2020 à 11:59
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`ID_acheteur`, `Nom_acheteur`, `Prenom_acheteur`, `Email_acheteur`, `Adresse_acheteur`, `Clause`) VALUES
(28, 'e', 'e ', 'e@gmail.com', 'e', 1),
(29, 'p', 'p ', 'p@p', 'p', 1),
(30, 'd', 'd ', 'd@d', 'd', 1),
(31, 'co', 'ko ', 'coko@gmail.com', '5 rue', 1),
(32, 'le', 'ni ', 'nile@fr', 'lm', 1),
(33, 'test', 'test ', 'te@h', 'e', 0),
(34, 'a', 'a ', 'a@a', 'a', 1),
(35, 'z', 'z ', 'z@zzzz', 'z', 0),
(36, 'q', 'q ', 'q@s', 'q', 1),
(37, 'o', 'o ', 'o@o', 'o', 1);

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
-- Structure de la table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `ID_enchere` int(11) NOT NULL AUTO_INCREMENT,
  `Prix_actuel` float NOT NULL,
  `date_fin` datetime NOT NULL,
  `Prix_reel` float NOT NULL,
  `ID_item` int(11) NOT NULL,
  `ID_acheteur` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_enchere`),
  KEY `ID_item` (`ID_item`),
  KEY `ID_item_2` (`ID_item`),
  KEY `ID_acheteur` (`ID_acheteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `vente_item` varchar(30) NOT NULL DEFAULT 'aucun',
  `achat_imm_item` tinyint(1) NOT NULL DEFAULT 1,
  `achete` tinyint(1) NOT NULL DEFAULT 0,
  `ID_vendeur` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`ID_item`),
  KEY `ID_vendeur` (`ID_vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ID_item`, `categorie_item`, `Nom_item`, `Photo_item`, `Description_item`, `Video_item`, `Prix_item`, `vente_item`, `achat_imm_item`, `achete`, `ID_vendeur`) VALUES
(132, 'accessoire VIP', 's', 's', 's', 's', 56.6, 'vente par enchere', 0, 1, 2),
(133, 'accessoire VIP', 'ssd', 'sds', 'gg', 'gs', 0.5, 'vente par enchere', 0, 0, 2),
(134, 'accessoire VIP', 'f', 'f', 'f', 'f', 32.3, 'vente par enchere', 0, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `item_panier`
--

DROP TABLE IF EXISTS `item_panier`;
CREATE TABLE IF NOT EXISTS `item_panier` (
  `ID_item_panier` int(11) NOT NULL AUTO_INCREMENT,
  `ID_acheteur` int(11) NOT NULL,
  `ID_item` int(11) NOT NULL,
  PRIMARY KEY (`ID_item_panier`),
  KEY `ID_acheteur` (`ID_acheteur`),
  KEY `ID_item` (`ID_item`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item_panier`
--

INSERT INTO `item_panier` (`ID_item_panier`, `ID_acheteur`, `ID_item`) VALUES
(59, 28, 132);

-- --------------------------------------------------------

--
-- Structure de la table `meilleure_offre`
--

DROP TABLE IF EXISTS `meilleure_offre`;
CREATE TABLE IF NOT EXISTS `meilleure_offre` (
  `ID_m_offre` int(11) NOT NULL AUTO_INCREMENT,
  `Prix_acheteur` float NOT NULL,
  `Decompte` int(11) NOT NULL DEFAULT 5,
  `en_cours_vendeur` int(11) NOT NULL DEFAULT 1,
  `ID_acheteur` int(11) NOT NULL,
  `ID_vendeur` int(11) NOT NULL,
  `ID_item` int(11) NOT NULL,
  PRIMARY KEY (`ID_m_offre`),
  KEY `ID_acheteur` (`ID_acheteur`),
  KEY `ID_vendeur` (`ID_vendeur`),
  KEY `ID_item` (`ID_item`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `ID_paiement` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(20) NOT NULL DEFAULT 'd',
  `code_postal` int(11) NOT NULL DEFAULT 94440,
  `pays` varchar(20) NOT NULL DEFAULT 'france',
  `tel` int(11) NOT NULL DEFAULT 123455678,
  `type_carte` varchar(20) NOT NULL DEFAULT 'visa',
  `ID_carte` int(11) NOT NULL DEFAULT 123456,
  `date` date NOT NULL DEFAULT '2022-01-01',
  `code_securite` int(11) NOT NULL DEFAULT 123,
  `solde` float NOT NULL DEFAULT 500,
  `ID_acheteur` int(11) NOT NULL,
  PRIMARY KEY (`ID_paiement`),
  KEY `ID_acheteur` (`ID_acheteur`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`ID_paiement`, `ville`, `code_postal`, `pays`, `tel`, `type_carte`, `ID_carte`, `date`, `code_securite`, `solde`, `ID_acheteur`) VALUES
(8, 'e', 4, 'e', 4, 'e', 4, '2020-04-09', 4, 155.25, 28),
(9, 'p', 8, 'p', 8, 'p', 8, '2020-04-04', 8, 281.08, 29),
(10, 'd', 8, 'd', 8, 'd', 8, '1156-02-01', 8, 44.5, 30),
(11, 'cokoland', 94532, 'cokc', 4, 'f', 5, '2020-04-25', 5, 500, 31),
(12, 'a', 5, 'a', 5, 'a', 5, '0010-01-01', 5, 500, 34),
(13, 'z', 6, 'z6', 6, 'z', 6, '0060-01-06', 6, 500, 35),
(14, 'q', 5, 'q5', 6, '5', 6, '2020-04-24', 6, 380, 36),
(15, 'o', 8, 'o', 0, 'f', 7, '2020-05-03', 8, 500, 37);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID_vendeur`, `Pseudo_vendeur`, `Email_vendeur`, `Nom_vendeur`, `Photo_vendeur`, `Image_fond`) VALUES
(2, 'v', 'v@gmail.com', 'vba', 'kp', 've'),
(12, 'a', 'a@z', 'a', 'a', 'a'),
(16, 'bn', 'bn@l', 'bn', 'bn', 'bn');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`ID_item`) REFERENCES `item` (`ID_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`ID_vendeur`) REFERENCES `vendeur` (`ID_vendeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `item_panier`
--
ALTER TABLE `item_panier`
  ADD CONSTRAINT `item_panier_ibfk_1` FOREIGN KEY (`ID_item`) REFERENCES `item` (`ID_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_panier_ibfk_2` FOREIGN KEY (`ID_acheteur`) REFERENCES `acheteur` (`ID_acheteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `meilleure_offre`
--
ALTER TABLE `meilleure_offre`
  ADD CONSTRAINT `meilleure_offre_ibfk_1` FOREIGN KEY (`ID_acheteur`) REFERENCES `acheteur` (`ID_acheteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meilleure_offre_ibfk_2` FOREIGN KEY (`ID_vendeur`) REFERENCES `vendeur` (`ID_vendeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meilleure_offre_ibfk_3` FOREIGN KEY (`ID_item`) REFERENCES `item` (`ID_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`ID_acheteur`) REFERENCES `acheteur` (`ID_acheteur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
