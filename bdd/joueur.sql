-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 oct. 2024 à 08:49
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
  PRIMARY KEY (`idjoueur`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`idjoueur`, `pseudo`, `rankrl`, `mmr`, `email`, `photo`) VALUES
(16, 'luxy0ytbytbytb', 'c3', 1302, 'luxy0.on.pc@gmail.com', 'uploads/Capture d\'écran 2023-09-26 210024.png'),
(19, 'bazo', 'c3', 44, 'luxy0.on.pc@gmail.comm', 'uploads/Capture d\'écran 2023-12-13 144503.png'),
(17, 'emm', 'd3', 1230, 'joanperrey71i@gmail.com', 'uploads/671167c0d3967.png'),
(15, 'test', 'test', 54, 'joanperrey71i@gmail.com', 'uploads/Capture d\'écran 2023-09-26 205522.png'),
(21, 'soso', 'ssl', 2000, 'luxy0.on.pc@gmail.com', 'uploads/Capture d\'écran 2024-02-25 220142.png'),
(22, 'blizz', 'd2', 1100, 'joanperrey71i@g.com', 'uploads/6712170384925.png'),
(23, 'hill', 'gc2', 1590, 'luxy0.on.pc@gmail.com', 'uploads/671217274a8f0.png'),
(24, 'hello', 'c4', 1500, 'luxy0.on.pc@gmail.com', 'uploads/67121eca1d7eb.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
