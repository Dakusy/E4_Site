-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 nov. 2019 à 10:30
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
-- Base de données :  `e4site`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `numAgence` int(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adressePostale` varchar(50) NOT NULL,
  `numTelephone` varchar(10) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `numTelecopie` varchar(50) NOT NULL,
  `codeRegion` int(11) NOT NULL,
  PRIMARY KEY (`numAgence`),
  KEY `fk_codeRegion` (`codeRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`numAgence`, `nom`, `adressePostale`, `numTelephone`, `adresseMail`, `numTelecopie`, `codeRegion`) VALUES
(1, 'Agence Lille', 'Lycée Gaston Berger', '0612131415', 'agencelille@cashcash.fr', '0000000', 1),
(2, 'Agence Douai', 'Douai', '0617123468', 'agencedouai@cashcash.fr', '0000000', 2);

-- --------------------------------------------------------

--
-- Structure de la table `assistant_telephonique`
--

DROP TABLE IF EXISTS `assistant_telephonique`;
CREATE TABLE IF NOT EXISTS `assistant_telephonique` (
  `numEmploye` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adressePerso` varchar(50) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `codeRegion` int(3) NOT NULL,
  PRIMARY KEY (`numEmploye`),
  KEY `fk_codeRegionAssistant` (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` int(11) NOT NULL,
  `raisonSociale` varchar(2) NOT NULL,
  `numSIREN` int(11) NOT NULL,
  `codeAPE` varchar(5) NOT NULL,
  `adressePostale` varchar(50) NOT NULL,
  `numTelephone` varchar(10) NOT NULL,
  `numTelecopie` varchar(50) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `distanceAgence` varchar(3) NOT NULL,
  `dureeTrajet` varchar(9) NOT NULL,
  `numAgence` int(4) NOT NULL,
  PRIMARY KEY (`numClient`),
  KEY `fk_numAgence` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numClient`, `raisonSociale`, `numSIREN`, `codeAPE`, `adressePostale`, `numTelephone`, `numTelecopie`, `adresseMail`, `distanceAgence`, `dureeTrajet`, `numAgence`) VALUES
(1, 'SA', 0, '0', 'Porte de Douai', '0718995456', '0', 'Client1@outlook.fr', '1', '2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `numContrat` int(11) NOT NULL AUTO_INCREMENT,
  `dateSignature` date NOT NULL,
  `dateEcheance` date NOT NULL,
  `refTypeContrat` int(11) NOT NULL,
  PRIMARY KEY (`numContrat`),
  KEY `fk_refTypeContrat` (`refTypeContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `numIntervention` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` varchar(5) NOT NULL,
  `tempsIntervention` varchar(20) NOT NULL,
  `commentaireTechnicien` varchar(1024) NOT NULL,
  `numClient` int(11) NOT NULL,
  `numEmploye` int(11) NOT NULL,
  PRIMARY KEY (`numIntervention`),
  KEY `fk_numEmploye` (`numEmploye`),
  KEY `fk_numClientIntervention` (`numClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `numClient` int(11) NOT NULL,
  PRIMARY KEY (`numSerie`),
  KEY `fk_numClient` (`numClient`),
  KEY `fk_refereceType` (`referenceType`),
  KEY `fk_numContrat` (`numContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `codeRegion` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`codeRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`codeRegion`, `libelle`) VALUES
(1, 'Nord'),
(2, 'Pas-De-Calais');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `libelle`) VALUES
(1, 'technicien'),
(2, 'assistant');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `numEmploye` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adressePerso` varchar(25) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `numTelephone` varchar(10) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `dateObtentionQualification` date NOT NULL,
  `dateEmbauche` date NOT NULL,
  `numAgence` int(11) NOT NULL,
  PRIMARY KEY (`numEmploye`),
  KEY `fk_numAgenceTech` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typecontrat`
--

DROP TABLE IF EXISTS `typecontrat`;
CREATE TABLE IF NOT EXISTS `typecontrat` (
  `refTypeContrat` int(11) NOT NULL AUTO_INCREMENT,
  `delaiIntervention` int(11) NOT NULL,
  `tauxApplicable` varchar(5) NOT NULL,
  PRIMARY KEY (`refTypeContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typemateriel`
--

DROP TABLE IF EXISTS `typemateriel`;
CREATE TABLE IF NOT EXISTS `typemateriel` (
  `referenceType` varchar(2) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `codeFamille` varchar(2) NOT NULL,
  PRIMARY KEY (`referenceType`),
  KEY `fk_codeFamille` (`codeFamille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(4) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `role` int(2) NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `login`, `mdp`, `role`) VALUES
(1, 'tvaringot', 'tvaringot', 1),
(2, 'ttourdot', 'ttourdot', 2),
(3, 'jcappelle', 'jcappelle', 0);

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
  ADD CONSTRAINT `fk_refTypeContrat` FOREIGN KEY (`refTypeContrat`) REFERENCES `typecontrat` (`refTypeContrat`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
