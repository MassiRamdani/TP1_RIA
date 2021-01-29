# TP1_RIA
  
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 jan. 2021 à 10:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbprix`
--

-- --------------------------------------------------------

--
-- Structure de la table `evolutions`
--

DROP TABLE IF EXISTS `evolutions`;
CREATE TABLE IF NOT EXISTS `evolutions` (
  `id_evo` int(11) NOT NULL COMMENT 'clé',
  `id_produit` int(11) NOT NULL COMMENT 'clé étrangère',
  `date_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de maj',
  `prix` float NOT NULL COMMENT 'prix maj'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evolutions`
--

INSERT INTO `evolutions` (`id_evo`, `id_produit`, `date_up`, `prix`) VALUES
(1, 1, '2021-01-18 10:04:44', 385),
(2, 1, '2021-01-18 10:04:44', 410),
(3, 1, '2021-01-19 10:06:10', 312),
(4, 1, '2021-01-20 10:06:10', 365),
(5, 1, '2021-01-23 10:06:53', 370),
(6, 1, '2021-01-24 10:06:53', 399);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé',
  `nom` varchar(80) NOT NULL,
  `date_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date d''ajout',
  `date_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de maj',
  `description` text NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom`, `date_in`, `date_up`, `description`, `prix`) VALUES
(1, 'Apple iPhone 12 Bleu 64 Go', '2021-01-18 15:20:53', '2021-01-24 10:07:37', 'Puce A1 ', 349),
(2, 'Samsung Galaxy S21 5G Gris 128 Go', '2021-01-19 10:00:48', '2021-01-22 10:00:48', 'Stabilisation optique', 300),
(3, 'Samsung Galaxy S20 FE 5G ', '2021-01-16 10:02:07', '2021-01-24 10:02:07', 'Deux fois plus rapide que de nombreux ecrans de smartphones', 700),
(4, 'Huawei P smart 2021', '2021-01-17 10:02:07', '2021-01-26 10:02:07', 'Le HUAWEI P smart 2021 embarque la technologie HUAWEI ', 650);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
