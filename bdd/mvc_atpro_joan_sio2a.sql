-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 oct. 2024 à 09:51
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc_atpro_joan_sio2a`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `art_id` int NOT NULL AUTO_INCREMENT,
  `art_nom` text COLLATE utf8mb4_general_ci NOT NULL,
  `art_prix` text COLLATE utf8mb4_general_ci NOT NULL,
  `art_poid` int NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`art_id`, `art_nom`, `art_prix`, `art_poid`) VALUES
(16, 's', '9', 0),
(17, 's', 'm', 0),
(18, 's', 'm', 0),
(19, 'perrey', '99', 0),
(20, 'perrey', '99', 0),
(21, 'perrey', '99', 0),
(22, 'perrey', '99', 0),
(23, 'perrey', '99', 0),
(24, 'perrey', '99', 0),
(25, 'perrey', '99', 0),
(26, 'tt', '9', 0),
(27, 'tt', '9', 0),
(28, 'perrey', '99', 0),
(29, 'perrey', '99', 0),
(30, 'perrey', '99', 0),
(31, 'perrey', '99', 0),
(32, 's', '9', 54),
(33, 'kjmihmuhiugoigoygouyugogouyugoygoufyfyofyuyf', '78', 65);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `idjoueur` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `rankrl` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `mmr` int NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idjoueur`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`idjoueur`, `pseudo`, `rankrl`, `mmr`, `email`, `photo`) VALUES
(16, 'luxy0', 'c3', 1302, 'luxy0.ons.pc@gmail.com', 'uploads/Capture d\'écran 2023-09-26 210024.png'),
(19, 'bazo', 'c3', 44, 'luxy0.on.pc@gmail.comm', 'uploads/Capture d\'écran 2023-12-13 144503.png'),
(17, 'emm', 'd3', 1230, 'joanpesrrey71i@gmail.com', 'uploads/671167c0d3967.png'),
(15, 'test', 'test', 54, 'josanperrey71i@gmail.com', 'uploads/Capture d\'écran 2023-09-26 205522.png'),
(21, 'soso', 'ssl', 2000, 'lusxy0.on.pc@gmail.com', 'uploads/Capture d\'écran 2024-02-25 220142.png'),
(22, 'blizz', 'd2', 1100, 'joasnperrey71i@g.com', 'uploads/6712170384925.png'),
(23, 'hill', 'gc2', 1590, 'luxy0.on.pcs@gmail.com', 'uploads/671217274a8f0.png'),
(24, 'hello', 'c4', 1500, 'luxy0.on.pc@gsmail.com', 'uploads/67121eca1d7eb.png');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `pseudo`, `mdp`, `date`, `role`) VALUES
('joanperrey71i@gmail.come', '', '$2y$12$vR8Fc7hzRrMYKcHiNbLS8OohngkdrXdna9xqSIOxvJ.tSKA.xKzkC', '2024-09-14 10:49:44', '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
