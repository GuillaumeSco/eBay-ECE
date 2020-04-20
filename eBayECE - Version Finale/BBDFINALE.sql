-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 10:34
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enchere`
--

INSERT INTO `enchere` (`ID_enchere`, `Prix_actuel`, `date_fin`, `Prix_reel`, `ID_item`, `ID_acheteur`) VALUES
(17, 150, '2020-05-12 00:00:00', 150, 227, 0),
(18, 300, '2020-05-20 00:00:00', 300, 233, 0),
(19, 200, '2020-05-21 00:00:00', 200, 235, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`ID_item`) REFERENCES `item` (`ID_item`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
