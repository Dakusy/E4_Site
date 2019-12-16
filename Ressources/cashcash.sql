-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 déc. 2019 à 09:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cashcash`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `numAgence` int(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adressePostale` varchar(5) NOT NULL,
  `numTelephone` varchar(10) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `numTelecopie` varchar(50) NOT NULL,
  `codeRegion` int(11) NOT NULL,
  PRIMARY KEY (`numAgence`),
  KEY `fk_codeRegion` (`codeRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`numAgence`, `nom`, `adressePostale`, `numTelephone`, `adresseMail`, `numTelecopie`, `codeRegion`) VALUES
(1, 'Agence du Nord', '59000', '0301459643', 'agenceNord@cashcash.fr', '01-40-50-60-70', 1),
(2, 'Agence IDF', '75000', '0350243819', 'agenceIDF@cashcash.fr', '01-50-60-70-80', 2),
(3, 'Agence Grand Est', '57000', '0336492078', 'agenceGrandEst@cashcash.fr', '01-30-40-50-60', 3),
(4, 'Agence BFC', '21000', '0378592364', 'agenceBFC@cashcash.fr', '01-70-50-60-70', 4),
(5, 'Agence ARA', '69000', '0369853125', 'agenceARA@cashcash.fr', '01-10-50-60-70', 5),
(6, 'Agence PACA', '13000', '0313587623', 'agencePACA@cashcash.fr', '01-90-60-70-80', 6),
(7, 'Agence Occitanie', '31000', '0331654816', 'agenceOccitanie@cashcash.fr', '01-20-50-60-70', 7),
(8, 'Agence Nouvelle-Aquitaine', '33000', '0333956748', 'agenceNA@cashcash.fr', '01-15-50-60-70', 8),
(9, 'Agence CVdL', '45000', '0345247929', 'agenceCVdL@cashcash.fr', '01-10-40-20-70', 9),
(10, 'Agence PdL', '44000', '0344856417', 'agencePdL@cashcash.fr', '01-65-82-70-80', 10),
(11, 'Agence Bretagne', '29200', '0329546934', 'agenceBretagne@cashcash.fr', '01-29-50-90-70', 11),
(12, 'Agence Normandie', '76600', '0376605464', 'agenceNormandie@cashcash.fr', '01-30-90-20-50', 12),
(13, 'Agence Corse', '20200', '0320206824', 'agenceCorse@cashcash.fr', '01-20-20-40-90', 13);

-- --------------------------------------------------------

--
-- Structure de la table `assistant_telephonique`
--

DROP TABLE IF EXISTS `assistant_telephonique`;
CREATE TABLE IF NOT EXISTS `assistant_telephonique` (
  `numEmploye` int(5) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adressePerso` varchar(50) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `codeRegion` int(3) NOT NULL,
  PRIMARY KEY (`numEmploye`),
  KEY `fk_codeRegionAssistant` (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assistant_telephonique`
--

INSERT INTO `assistant_telephonique` (`numEmploye`, `nom`, `prenom`, `adressePerso`, `dateEmbauche`, `codeRegion`) VALUES
(1, 'David', 'Louis', 'rue jeanne maillotte', '2019-11-12', 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` int(6) NOT NULL,
  `raisonSociale` varchar(6) NOT NULL,
  `numSIREN` varchar(25) NOT NULL,
  `codeAPE` varchar(5) NOT NULL,
  `adressePostale` varchar(50) NOT NULL,
  `numTelephone` varchar(10) NOT NULL,
  `numTelecopie` varchar(10) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `distanceAgence` varchar(6) NOT NULL,
  `dureeTrajet` varchar(9) NOT NULL,
  `numAgence` int(4) NOT NULL,
  PRIMARY KEY (`numClient`),
  KEY `fk_numAgence` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numClient`, `raisonSociale`, `numSIREN`, `codeAPE`, `adressePostale`, `numTelephone`, `numTelecopie`, `adresseMail`, `distanceAgence`, `dureeTrajet`, `numAgence`) VALUES
(1, 'SELARL', '362 521 879 00034', '4711D', '59110', '0620635489', '0150607080', 'exemple1@orange.fr', '3', '45', 1),
(2, 'SARL', '492 781 163 00045', '8264A', '75000', '0345333984', '0125954212', 'exemple2@gmail.com', '0.5', '5', 2);

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `numContrat` int(11) NOT NULL AUTO_INCREMENT,
  `dateSignature` date NOT NULL,
  `dateEcheance` date NOT NULL,
  `numClient` int(6) NOT NULL,
  PRIMARY KEY (`numContrat`),
  KEY `fk_numClientContrat` (`numClient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contratmaintenance`
--

INSERT INTO `contratmaintenance` (`numContrat`, `dateSignature`, `dateEcheance`, `numClient`) VALUES
(1, '2019-12-16', '2021-12-16', 1),
(2, '2018-01-17', '2020-01-17', 2);

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

DROP TABLE IF EXISTS `effectuer`;
CREATE TABLE IF NOT EXISTS `effectuer` (
  `numIntervention` int(11) NOT NULL,
  `numSerie` int(11) NOT NULL,
  `tempsTotal` varchar(10) NOT NULL,
  PRIMARY KEY (`numIntervention`,`numSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `famillemateriel`
--

DROP TABLE IF EXISTS `famillemateriel`;
CREATE TABLE IF NOT EXISTS `famillemateriel` (
  `codeFamille` varchar(2) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`codeFamille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `famillemateriel`
--

INSERT INTO `famillemateriel` (`codeFamille`, `libelle`) VALUES
('CB', 'lecteur de cartes'),
('CP', 'caisse avec processeur'),
('LO', 'lecteur optique'),
('MO', 'modem'),
('PC', 'petite caisse'),
('SE', 'serveur');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `numIntervention` int(6) NOT NULL AUTO_INCREMENT,
  `date` varchar(10) DEFAULT NULL,
  `heure` varchar(5) DEFAULT NULL,
  `tempsIntervention` varchar(20) NOT NULL,
  `commentaireTechnicien` varchar(1024) DEFAULT NULL,
  `numClient` int(6) NOT NULL,
  `numEmploye` int(11) NOT NULL,
  PRIMARY KEY (`numIntervention`),
  KEY `fk_numEmploye` (`numEmploye`),
  KEY `fk_numClientIntervention` (`numClient`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`numIntervention`, `date`, `heure`, `tempsIntervention`, `commentaireTechnicien`, `numClient`, `numEmploye`) VALUES
(1, '2019-12-02', '17h30', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `numSerie` varchar(25) NOT NULL,
  `dateVente` date NOT NULL,
  `dateInstallation` date NOT NULL,
  `prix` double NOT NULL,
  `emplacement` varchar(50) NOT NULL,
  `referenceType` varchar(4) NOT NULL,
  `numContrat` int(11) NOT NULL,
  `numClient` int(6) NOT NULL,
  PRIMARY KEY (`numSerie`),
  KEY `fk_numClient` (`numClient`),
  KEY `fk_refereceType` (`referenceType`),
  KEY `fk_numContrat` (`numContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`numSerie`, `dateVente`, `dateInstallation`, `prix`, `emplacement`, `referenceType`, `numContrat`, `numClient`) VALUES
('1353645', '2018-01-15', '2019-12-17', 650, 'rayon fruits et légumes', 'B550', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `codeRegion` int(4) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`codeRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`codeRegion`, `libelle`) VALUES
(1, 'Haut-de-France'),
(2, 'Ile-de-France'),
(3, 'Grand Est'),
(4, 'Bourgogne-Franche-Comté'),
(5, 'Auvergne-Rhône-Alpes'),
(6, 'Provence-Alpes-Côte d\'Azur'),
(7, 'Occitanie'),
(8, 'Nouvelle-Aquitaine'),
(9, 'Centre-Val de Loire'),
(10, 'Pays de la Loire'),
(11, 'Bretagne'),
(12, 'Normandie'),
(13, 'Corse');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `numEmploye` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adressePerso` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `numTelephone` varchar(10) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `dateObtentionQualification` date NOT NULL,
  `dateEmbauche` date NOT NULL,
  `numAgence` int(11) NOT NULL,
  PRIMARY KEY (`numEmploye`),
  KEY `fk_numAgenceTech` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`numEmploye`, `nom`, `prenom`, `adressePerso`, `mail`, `numTelephone`, `qualification`, `dateObtentionQualification`, `dateEmbauche`, `numAgence`) VALUES
(1, 'Pierre', 'Jean', 'Rue des Gantois', 'jean.pierre@gmail.com', '0658521793', 'Master', '2019-06-03', '2019-11-04', 1),
(2, 'Jean', 'Baptiste', 'Rue Alain de Lille', 'baptiste.jean@hotmail.fr', '0616359548', 'BTS SIO SISR', '2019-06-20', '2019-09-09', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typemateriel`
--

DROP TABLE IF EXISTS `typemateriel`;
CREATE TABLE IF NOT EXISTS `typemateriel` (
  `referenceType` varchar(4) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `codeFamille` varchar(2) NOT NULL,
  PRIMARY KEY (`referenceType`),
  KEY `fk_codeFamille` (`codeFamille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typemateriel`
--

INSERT INTO `typemateriel` (`referenceType`, `libelle`, `codeFamille`) VALUES
('B450', 'TPV M150', 'PC'),
('B550', 'TPV H720', 'CP');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `proprietaireTech` int(11) DEFAULT NULL,
  `proprietaireAssistant` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsers`),
  KEY `proprietaireTech` (`proprietaireTech`),
  KEY `proprietaireAssistant` (`proprietaireAssistant`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `login`, `mdp`, `proprietaireTech`, `proprietaireAssistant`) VALUES
(1, 'jpierre', 'jpierre', 1, NULL),
(2, 'ldavid', 'ldavid', NULL, 1),
(3, 'jbaptiste', 'jbaptiste', 2, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `fk_codeRegion` FOREIGN KEY (`codeRegion`) REFERENCES `region` (`codeRegion`);

--
-- Contraintes pour la table `assistant_telephonique`
--
ALTER TABLE `assistant_telephonique`
  ADD CONSTRAINT `fk_codeRegionAssistant` FOREIGN KEY (`codeRegion`) REFERENCES `region` (`codeRegion`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_numAgence` FOREIGN KEY (`numAgence`) REFERENCES `agence` (`numAgence`);

--
-- Contraintes pour la table `contratmaintenance`
--
ALTER TABLE `contratmaintenance`
  ADD CONSTRAINT `fk_numClientContrat` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`);

--
-- Contraintes pour la table `effectuer`
--
ALTER TABLE `effectuer`
  ADD CONSTRAINT `fk_numIntervention` FOREIGN KEY (`numIntervention`) REFERENCES `intervention` (`numIntervention`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `fk_numClientIntervention` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `fk_numEmploye` FOREIGN KEY (`numEmploye`) REFERENCES `technicien` (`numEmploye`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `fk_numClient` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `fk_numContrat` FOREIGN KEY (`numContrat`) REFERENCES `contratmaintenance` (`numContrat`),
  ADD CONSTRAINT `fk_refereceType` FOREIGN KEY (`referenceType`) REFERENCES `typemateriel` (`referenceType`);

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `fk_numAgenceTech` FOREIGN KEY (`numAgence`) REFERENCES `agence` (`numAgence`);

--
-- Contraintes pour la table `typemateriel`
--
ALTER TABLE `typemateriel`
  ADD CONSTRAINT `fk_codeFamille` FOREIGN KEY (`codeFamille`) REFERENCES `famillemateriel` (`codeFamille`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`proprietaireTech`) REFERENCES `technicien` (`numEmploye`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`proprietaireAssistant`) REFERENCES `assistant_telephonique` (`numEmploye`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
