-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 08 août 2020 à 01:06
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `appointement`
--

INSERT INTO `appointement` (`id`, `nom`, `dateAp`, `id_pat`, `heures`, `description`) VALUES
(1, 'echographie', '08/05/2020', 2, '20h', 'echographie');

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
-- Contraintes pour la table `appointement`
--
ALTER TABLE `appointement`
  ADD CONSTRAINT `appointement_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `infos_perso`
--
ALTER TABLE `infos_perso`
  ADD CONSTRAINT `infos_perso_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
