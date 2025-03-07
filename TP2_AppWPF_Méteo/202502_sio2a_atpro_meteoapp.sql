-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 mars 2025 à 10:14
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
-- Base de données : `202502_sio2a_atpro_meteoapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `meteo`
--

DROP TABLE IF EXISTS `meteo`;
CREATE TABLE IF NOT EXISTS `meteo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ville` varchar(100) NOT NULL,
  `insee` varchar(10) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `date_recherche` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_jour0` date NOT NULL,
  `temp_min_jour0` int NOT NULL,
  `temp_max_jour0` int NOT NULL,
  `weather_code_jour0` int NOT NULL,
  `date_jour1` date NOT NULL,
  `temp_min_jour1` int NOT NULL,
  `temp_max_jour1` int NOT NULL,
  `weather_code_jour1` int NOT NULL,
  `date_jour2` date NOT NULL,
  `temp_min_jour2` int NOT NULL,
  `temp_max_jour2` int NOT NULL,
  `weather_code_jour2` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `meteo`
--

INSERT INTO `meteo` (`id`, `ville`, `insee`, `postal_code`, `date_recherche`, `date_jour0`, `temp_min_jour0`, `temp_max_jour0`, `weather_code_jour0`, `date_jour1`, `temp_min_jour1`, `temp_max_jour1`, `weather_code_jour1`, `date_jour2`, `temp_min_jour2`, `temp_max_jour2`, `weather_code_jour2`) VALUES
(15, 'alès', 'insee_valu', '30100', '2025-03-07 09:53:52', '2025-03-07', 7, 11, 210, '2025-03-08', 9, 13, 210, '2025-03-09', 10, 10, 212),
(16, 'carcassonne', 'insee_valu', '11000', '2025-03-07 09:54:15', '2025-03-07', 11, 12, 210, '2025-03-08', 12, 15, 210, '2025-03-09', 11, 13, 41),
(17, 'nimes', 'insee_valu', '30000', '2025-03-07 10:41:34', '2025-03-07', 9, 13, 10, '2025-03-08', 11, 15, 10, '2025-03-09', 11, 13, 12),
(14, 'monteils', 'insee_valu', '12200', '2025-03-07 09:01:53', '2025-03-07', 8, 14, 3, '2025-03-08', 10, 16, 3, '2025-03-09', 8, 11, 44);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
