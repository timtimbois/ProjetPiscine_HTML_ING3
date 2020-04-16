-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 avr. 2020 à 11:51
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
-- Base de données :  `projetpiscineweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `IDAcheteur` int(11) NOT NULL AUTO_INCREMENT,
  `NomAcheteur` varchar(50) NOT NULL,
  `PrenomAcheteur` varchar(50) NOT NULL,
  `EmailAcheteur` varchar(250) NOT NULL,
  `MDPAcheteur` varchar(50) NOT NULL,
  `AdresseLigne1Acheteur` varchar(255) NOT NULL,
  `AdresseLigne2Acheteur` varchar(255) NOT NULL,
  `VilleAcheteur` varchar(100) NOT NULL,
  `CodePostalAcheteur` int(5) NOT NULL,
  `PaysAcheteur` varchar(50) NOT NULL,
  `NumAcheteur` int(10) NOT NULL,
  `TypeCarteAcheteur` int(255) NOT NULL,
  `NumCarteAcheteur` int(16) NOT NULL,
  `NomCarteAcheteur` int(255) NOT NULL,
  `DatedExpAcheteur` date NOT NULL,
  `CodeSecuAcheteur` int(4) NOT NULL,
  PRIMARY KEY (`IDAcheteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`IDAcheteur`, `NomAcheteur`, `PrenomAcheteur`, `EmailAcheteur`, `MDPAcheteur`, `AdresseLigne1Acheteur`, `AdresseLigne2Acheteur`, `VilleAcheteur`, `CodePostalAcheteur`, `PaysAcheteur`, `NumAcheteur`, `TypeCarteAcheteur`, `NumCarteAcheteur`, `NomCarteAcheteur`, `DatedExpAcheteur`, `CodeSecuAcheteur`) VALUES
(1, 'Bois', 'Timothee', 'timothee.bois@edu.ece.fr', 'timtimbois', '35 ', 'rue des brulis', 'Chaumontel', 95270, 'France', 611736838, 1, 2, 3, '2020-05-17', 123),
(2, 'Tadrous', 'Dany', 'dany.tadrous@edu.ece.fr', 'TDany', '123', '456', 'Paris', 75015, 'France', 612345678, 1, 2, 3, '2020-08-08', 456);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IDAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `EmailAdmin` varchar(255) NOT NULL,
  `MdpAdmin` varchar(255) NOT NULL,
  PRIMARY KEY (`IDAdmin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `IDCommande` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IDCommande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `IDItem` int(11) NOT NULL AUTO_INCREMENT,
  `NomItem` varchar(255) NOT NULL,
  `Photo1Item` varchar(255) NOT NULL,
  `Photo2Item` varchar(255) NOT NULL,
  `VideoItem` varchar(255) NOT NULL,
  `DescriptionItem` varchar(255) NOT NULL,
  `PrixItem` int(9) NOT NULL,
  `Photo3Item` varchar(255) NOT NULL,
  `CategorieItem` varchar(255) NOT NULL,
  `TypeVenteItem` varchar(255) NOT NULL,
  PRIMARY KEY (`IDItem`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `IDPanier` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IDPanier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `IDVendeur` int(11) NOT NULL AUTO_INCREMENT,
  `PseudoVendeur` varchar(255) NOT NULL,
  `EmailVendeur` varchar(255) NOT NULL,
  `NomVendeur` varchar(255) NOT NULL,
  `PhotoVendeur` varchar(255) NOT NULL,
  `ImageVendeur` varchar(255) NOT NULL,
  PRIMARY KEY (`IDVendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`IDVendeur`, `PseudoVendeur`, `EmailVendeur`, `NomVendeur`, `PhotoVendeur`, `ImageVendeur`) VALUES
(1, 'timtimbois', 'timothee.bois@edu.ece.fr', 'Bois', 'none', 'none'),
(2, 'TDany', 'dany.tadrous@edu.ece.fr', 'Tadrous', 'none', 'none');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
