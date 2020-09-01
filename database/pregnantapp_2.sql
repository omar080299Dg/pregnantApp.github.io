-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 01 sep. 2020 à 08:45
-- Version du serveur :  8.0.18
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
-- Base de données :  `pregnantapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `analyse_biochimie`
--

DROP TABLE IF EXISTS `analyse_biochimie`;
CREATE TABLE IF NOT EXISTS `analyse_biochimie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pat` int(11) DEFAULT NULL,
  `glycemieAJeune` varchar(20) DEFAULT NULL,
  `azotemie` varchar(20) DEFAULT NULL,
  `creatininemie` varchar(20) DEFAULT NULL,
  `glycemie` varchar(20) DEFAULT NULL,
  `albuminurie` varchar(20) DEFAULT NULL,
  `cetonurie` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `laboratoire` varchar(50) DEFAULT NULL,
  `mailLabo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pat` (`id_pat`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `analyse_biochimie`
--

INSERT INTO `analyse_biochimie` (`id`, `id_pat`, `glycemieAJeune`, `azotemie`, `creatininemie`, `glycemie`, `albuminurie`, `cetonurie`, `date`, `laboratoire`, `mailLabo`) VALUES
(12, 1, '2,9', '0.1', '7', '1', '1', '4', '12/09/2020', 'centre de sante Khadimou Rassoul', '99omar.niang@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `appointement`
--

DROP TABLE IF EXISTS `appointement`;
CREATE TABLE IF NOT EXISTS `appointement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `dateAp` varchar(50) DEFAULT NULL,
  `id_pat` int(11) NOT NULL,
  `heures` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pat` (`id_pat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `appointement`
--

INSERT INTO `appointement` (`id`, `nom`, `dateAp`, `id_pat`, `heures`, `description`) VALUES
(7, 'echographie', '08/10/2020', 1, '10h', 'cette echographie va nous permetre de  connaire en reel la forme de votre feoutus ainsi de verifier '),
(8, 'analyse sanguin', '08/22/2020', 1, '10h', ' cette analyse va nous permetre de savoir les proportions de substance dans votre sang'),
(9, 'spafon', '10/03/2020', 1, '10h', 'spafon');

-- --------------------------------------------------------

--
-- Structure de la table `hemobiologie`
--

DROP TABLE IF EXISTS `hemobiologie`;
CREATE TABLE IF NOT EXISTS `hemobiologie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pat` int(11) DEFAULT NULL,
  `groupageSanguin` varchar(20) DEFAULT NULL,
  `testDEmel` varchar(20) DEFAULT NULL,
  `factureRheus` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `laboratoire` varchar(50) DEFAULT NULL,
  `mailLabo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pat` (`id_pat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `infos_perso`
--

DROP TABLE IF EXISTS `infos_perso`;
CREATE TABLE IF NOT EXISTS `infos_perso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nom_patient` varchar(50) DEFAULT NULL,
  `prenom_patient` varchar(50) DEFAULT NULL,
  `age_patient` varchar(50) DEFAULT NULL,
  `proffession_patient` varchar(50) DEFAULT NULL,
  `ethenie_patient` varchar(50) DEFAULT NULL,
  `addresse_patiente` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(50) DEFAULT NULL,
  `tel_patiente` varchar(50) DEFAULT NULL,
  `num_urg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `infos_perso`
--

INSERT INTO `infos_perso` (`id`, `id_user`, `nom_patient`, `prenom_patient`, `age_patient`, `proffession_patient`, `ethenie_patient`, `addresse_patiente`, `date_naissance`, `lieu_naissance`, `tel_patiente`, `num_urg`) VALUES
(1, 1, 'tall', 'fama', '34 ', 'menagere ', 'diola', 'camberene', '0000-00-00', 'diamaguene', '77232123343 ', '77232123343 ');

-- --------------------------------------------------------

--
-- Structure de la table `numhemoglobine`
--

DROP TABLE IF EXISTS `numhemoglobine`;
CREATE TABLE IF NOT EXISTS `numhemoglobine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pat` int(11) DEFAULT NULL,
  `tauxDHemoglobine` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `laboratoire` varchar(50) DEFAULT NULL,
  `mailLabo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pat` (`id_pat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `numhemoglobine`
--

INSERT INTO `numhemoglobine` (`id`, `id_pat`, `tauxDHemoglobine`, `date`, `laboratoire`, `mailLabo`) VALUES
(1, 1, '12%', '0000-00-00', 'centre de sante Cheikh Souhaibou Mbacké', '99omar.niang@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `parasitologie`
--

DROP TABLE IF EXISTS `parasitologie`;
CREATE TABLE IF NOT EXISTS `parasitologie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pat` int(11) DEFAULT NULL,
  `goutteEpaisse` varchar(20) DEFAULT NULL,
  `DP` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `laboratoire` varchar(50) DEFAULT NULL,
  `mailLabo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pat` (`id_pat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `parasitologie`
--

INSERT INTO `parasitologie` (`id`, `id_pat`, `goutteEpaisse`, `DP`, `date`, `laboratoire`, `mailLabo`) VALUES
(1, 1, '2', 'AD', '12/09/2020', 'centre de sante Cheikh Abdou Khadre Mbacké', '99omar.niang@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `segmentation`
--

DROP TABLE IF EXISTS `segmentation`;
CREATE TABLE IF NOT EXISTS `segmentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pat` int(11) DEFAULT NULL,
  `premiereHeure` varchar(20) DEFAULT NULL,
  `deuxiementHeure` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `laboratoire` varchar(50) DEFAULT NULL,
  `mailLabo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pat` (`id_pat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `segmentation`
--

INSERT INTO `segmentation` (`id`, `id_pat`, `premiereHeure`, `deuxiementHeure`, `date`, `laboratoire`, `mailLabo`) VALUES
(5, 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `serologie`
--

DROP TABLE IF EXISTS `serologie`;
CREATE TABLE IF NOT EXISTS `serologie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pat` int(11) DEFAULT NULL,
  `serologieSyphilitiqueRPR` varchar(20) DEFAULT NULL,
  `recherche` varchar(20) DEFAULT NULL,
  `serologieToxoplasmose` varchar(20) DEFAULT NULL,
  `serologieSyphilitiqueTPHA` varchar(20) DEFAULT NULL,
  `serologieRetrovirale` varchar(20) DEFAULT NULL,
  `serologieRubeole` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `laboratoire` varchar(50) DEFAULT NULL,
  `mailLabo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `serologie`
--

INSERT INTO `serologie` (`id`, `id_pat`, `serologieSyphilitiqueRPR`, `recherche`, `serologieToxoplasmose`, `serologieSyphilitiqueTPHA`, `serologieRetrovirale`, `serologieRubeole`, `date`, `laboratoire`, `mailLabo`) VALUES
(1, 1, 'satisfaisant', '32', 'affrimatif', 'affrimatif', 'affrimatif', 'affrimatif', '0000-00-00', 'centre de sante Cheikh Abdoul Lahat Mbacké', '99omar.niang@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `passwordd` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `lien_img` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `passwordd`, `email`, `statut`, `lien_img`) VALUES
(1, 'fama', 'omar', 'omarniang57@yahoo.com', 'patient', 'upload/123269-OQR5JK-283.jpg'),
(2, 'aicha', 'omar', 'omarniang57@yahoo.com', 'medecin', 'upload/123269-OQR5JD-851.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `analyse_biochimie`
--
ALTER TABLE `analyse_biochimie`
  ADD CONSTRAINT `analyse_biochimie_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `appointement`
--
ALTER TABLE `appointement`
  ADD CONSTRAINT `appointement_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `hemobiologie`
--
ALTER TABLE `hemobiologie`
  ADD CONSTRAINT `hemobiologie_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `infos_perso`
--
ALTER TABLE `infos_perso`
  ADD CONSTRAINT `infos_perso_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `numhemoglobine`
--
ALTER TABLE `numhemoglobine`
  ADD CONSTRAINT `numhemoglobine_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `parasitologie`
--
ALTER TABLE `parasitologie`
  ADD CONSTRAINT `parasitologie_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `segmentation`
--
ALTER TABLE `segmentation`
  ADD CONSTRAINT `segmentation_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
