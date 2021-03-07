-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 jan. 2021 à 08:33
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
-- Base de données : `newsmvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `login`, `password`) VALUES
(1, 'etcharpin', '$2y$10$8BQB.F0/D3Etc.c9Iq5j0Oab1N3ho6xcThlbHceE.DQmkhBYdMKwS');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCom` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) NOT NULL,
  `commentaire` text NOT NULL,
  `idNews` int(11) NOT NULL,
  PRIMARY KEY (`idCom`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idCom`, `pseudo`, `commentaire`, `idNews`) VALUES
(1, 'etcharpin', 'on s\'en fout michel', 1),
(2, 'etcharpin', 'je rigole michel', 1),
(11, 'manu', 'incrayable', 8),
(10, 'zinedinesidane', 'Cest biennngggg', 8),
(12, 'ALL', 'Cheh Tibault Courtois', 9),
(13, 'Etienne', 'C&#39;est moi !', 2),
(14, 'laziza', 'cok', 8),
(16, 'olivier', 'jaipudeco', 12);

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

DROP TABLE IF EXISTS `tnews`;
CREATE TABLE IF NOT EXISTS `tnews` (
  `idNews` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `article` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idNews`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tnews`
--

INSERT INTO `tnews` (`idNews`, `titre`, `article`, `date`) VALUES
(1, 'De la neige !', 'De la neige est attendu en ce matin d\'hiver', '2021-01-04'),
(2, 'Qui est cette star né dans l\'alier', 'Un gars est né en allier y s\'appel Etienne voila voila', '2001-06-06'),
(8, 'La france est championne du monde', 'Et un et deux et troisÃ©ro', '1998-07-14'),
(9, 'Deux Ã©toiles sur le maillot', 'Les belges ne sont pas champions du monde', '2018-07-30'),
(12, 'cest le grand jour', 'Eval', '2021-01-06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
