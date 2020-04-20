-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 17:12
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
  `TypeCarteAcheteur` varchar(255) NOT NULL,
  `NumCarteAcheteur` bigint(16) NOT NULL,
  `NomCarteAcheteur` varchar(255) NOT NULL,
  `DatedExpAcheteur` date NOT NULL,
  `CodeSecuAcheteur` int(4) NOT NULL,
  PRIMARY KEY (`IDAcheteur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`IDAcheteur`, `NomAcheteur`, `PrenomAcheteur`, `EmailAcheteur`, `MDPAcheteur`, `AdresseLigne1Acheteur`, `AdresseLigne2Acheteur`, `VilleAcheteur`, `CodePostalAcheteur`, `PaysAcheteur`, `NumAcheteur`, `TypeCarteAcheteur`, `NumCarteAcheteur`, `NomCarteAcheteur`, `DatedExpAcheteur`, `CodeSecuAcheteur`) VALUES
(1, 'Bois', 'Timothee', 'timothee.bois@gmail.com', 'timtimbois', '35', 'rue des brulis', 'Chaumontel', 95270, 'France', 611736838, 'Mastercard', 4856216975163294, 'Timothée Bois', '2020-05-17', 123),
(2, 'Tadrous', 'Dany', 'dany.tadrous@gmail.com', 'TDany', '123', 'grande rue', 'Paris', 75015, 'France', 612345876, 'Amex', 4875132945618542, 'Dany Tadrous', '2020-08-08', 456),
(4, 'Lion', 'Sandrine', 'Sandrine.lion@gmail.com', 'lion', '101', 'rue principale', 'Crouy', 60530, 'France', 612345678, 'Paypal', 1234567812345678, 'Sandrine Lion', '2020-12-15', 123);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IDAdmin`, `EmailAdmin`, `MdpAdmin`) VALUES
(1, 'timothee.bois@edu.ece.fr', 'timtimbois');

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
  `NomVendeur` varchar(255) NOT NULL,
  PRIMARY KEY (`IDItem`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`IDItem`, `NomItem`, `Photo1Item`, `Photo2Item`, `VideoItem`, `DescriptionItem`, `PrixItem`, `Photo3Item`, `CategorieItem`, `TypeVenteItem`, `NomVendeur`) VALUES
(18, 'PetiteTourEiffel', 'PetiteTourEiffel.jpg', 'PetiteTourEiffel2.jpg', 'none', 'Tour Eiffel à petite échelle', 150, 'none', 'Ferraille ou Trésor', 'AcheterMaintenant', 'Tadrous'),
(16, 'VoitureAncienne', 'VoitureAncienne.jpg', 'VoitureAncienne2.jpg', 'none', 'Ancienne voiture de sport', 1000, 'none', 'Ferraille ou Trésor', 'Enchère', 'Bois'),
(17, 'GrosCoffre', 'GrosCoffre.jpg', 'none', 'none', 'Ancien coffre avec quelque chose caché à l\'intérieur...', 500, 'none', 'Ferraille ou Trésor', 'MeilleureOffre', 'Tadrous'),
(15, 'TshirtDeTonyParker', 'TshirtDeTonyParker.jpg', 'none', 'none', 'TShirt de sport de Tony Parker', 200, 'none', 'Accessoire VIP', 'AcheterMaintenant', 'Lion'),
(13, 'ParapluieDeTadrous', 'parapluie.jpg', 'none', 'none', 'Beau Parapluie de Dany Tadrous', 90, 'none', 'Accessoire VIP', 'Enchère', 'Tadrous'),
(14, 'LunettesDeMJ', 'LunettesDeMJ.jpg', 'LunettesDeMJ2.jpg', 'none', 'Ancienne lunettes de Michael Jackson', 450, 'none', 'Accessoire VIP', 'MeilleureOffre', 'Lion'),
(10, 'OsDeDinosaure', 'OsDeDinosaure1.jpg', 'OsDeDinosaure2.jpg', 'none', 'Bel os de Trex', 150, 'none', 'Bon pour le musée', 'Enchère', 'Lion'),
(11, 'TableauDePicasso', 'TableauDePicasso.jpg', 'none', 'none', 'Beau Tableau de Picasso', 300, 'none', 'Bon pour le musée', 'MeilleureOffre', 'Bois'),
(12, 'StatueRomaine', 'StatueRomaine.jpg', 'StatueRomaine2.jpg', 'none', 'Belle statue romaine', 270, 'none', 'Bon pour le musée', 'AcheterMaintenant', 'Bois'),
(19, 'MalleLouisVuitton', 'MalleLouisVuitton1.jpg', 'none', 'none', 'Ancienne Malle Louis Vuitton', 300, 'none', 'Ferraille ou Trésor', 'AcheterMaintenant', 'Tadrous');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `IDPanier` int(11) NOT NULL AUTO_INCREMENT,
  `IDAcheteur` int(11) NOT NULL,
  `IDItem` int(11) NOT NULL,
  `PrixItem` int(11) NOT NULL,
  `NomItem` varchar(255) NOT NULL,
  `Photo1Item` varchar(255) NOT NULL,
  PRIMARY KEY (`IDPanier`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`IDVendeur`, `PseudoVendeur`, `EmailVendeur`, `NomVendeur`, `PhotoVendeur`, `ImageVendeur`) VALUES
(1, 'timtimbois', 'timothee.bois@edu.ece.fr', 'Bois', 'none', 'none'),
(2, 'TDany', 'dany.tadrous@edu.ece.fr', 'Tadrous', 'none', 'none'),
(7, 'sansanlion', 'Sandrine.lion@hotmail.fr', 'Lion', 'none', 'none');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
