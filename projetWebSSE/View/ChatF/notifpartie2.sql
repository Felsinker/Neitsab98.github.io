-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 13 mai 2020 à 15:48
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetwebsse`
--

-- --------------------------------------------------------

--
-- Structure de la table `notifpartie2`
--

CREATE TABLE `notifpartie2` (
  `role` varchar(255) NOT NULL,
  `chefPompier` int(11) NOT NULL DEFAULT 0,
  `chefPolice` int(11) NOT NULL DEFAULT 0,
  `chefSamu` int(11) NOT NULL DEFAULT 0,
  `maitreJeu` int(11) NOT NULL DEFAULT 0,
  `medecinRepartiteur` int(11) NOT NULL DEFAULT 0,
  `medecinTrieur` int(11) NOT NULL DEFAULT 0,
  `crra` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notifpartie2`
--

INSERT INTO `notifpartie2` (`role`, `chefPompier`, `chefPolice`, `chefSamu`, `maitreJeu`, `medecinRepartiteur`, `medecinTrieur`, `crra`) VALUES
('chefPolice', 0, 0, 0, 0, 0, 0, 0),
('chefPompier', 0, 0, 0, 0, 0, 1, 0),
('chefSamu', 0, 0, 0, 0, 0, 0, 0),
('crra', 0, 0, 0, 0, 0, 0, 0),
('maitreJeu', 0, 0, 0, 0, 0, 0, 0),
('medecinRepartiteur', 0, 0, 0, 0, 0, 0, 0),
('medecinTrieur', 0, 0, 0, 0, 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `notifpartie2`
--
ALTER TABLE `notifpartie2`
  ADD PRIMARY KEY (`role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

