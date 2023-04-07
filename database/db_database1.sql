-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 déc. 2022 à 11:06
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
-- Base de données : `db_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `idE` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_agent_entropot_idE` (`idE`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id`, `nom`, `prenom`, `adresse`, `photo`, `idE`) VALUES
(2, 'BOO', 'Golo', 'Porto-Novo', 'thorgal.jpg', 1),
(4, 'SGDFGH', 'dfjkglhj', 'dfghj', 'jungle.jpg', 2),
(6, 'DOLO', 'Sabi', 'Kandi', 'jungle.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `entropot`
--

DROP TABLE IF EXISTS `entropot`;
CREATE TABLE IF NOT EXISTS `entropot` (
  `idE` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  PRIMARY KEY (`idE`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entropot`
--

INSERT INTO `entropot` (`idE`, `code`, `libelle`, `adresse`) VALUES
(2, 'EC', 'Entreprise Commerciale', 'Porto-Novo');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'BONA', 'do', 'do@gmail.com', 'do'),
(2, 'DODO', 'ro', 'ro@gmail.com', '3605c251087b88216c9bca890e07ad9c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*---------------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";                         
START TRANSACTION;
SET time_zone = "+00:00";                                       

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `idE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `entropot`;
CREATE TABLE IF NOT EXISTS `entropot` (
  `idE` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `libelle` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-----------------the constrainte & add key-------------------------------
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `entropot`
  ADD PRIMARY KEY (`idE`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agent`
--
--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `fk_agent_entropot_idE` FOREIGN KEY (`idE`) REFERENCES `entropot` (`idE`);
COMMIT;


-----------------------------------------------------------------*/