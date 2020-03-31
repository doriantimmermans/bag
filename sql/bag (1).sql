-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 nov. 2019 à 20:57
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bag`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` datetime DEFAULT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `contenu`, `date`, `titre`, `type`) VALUES
(2, '★ Du 18 au 20 Novembre à la BàG ! ★ Réalisation en intelligence collective et agile de notre beautiful modular office desk, un bureau modulaire et multifonctionnel !\r\nPour que les bénévoles puissent assurer leur permanence dans un cadre optimal, la BàG propose un workshop conception et construction d\'un bureau modulaire multi-fonction,  qui fait reception, réunion, établi, cantine. \r\n★ A swiss army knife desk, very versatile ! ★\r\nAu cours des 3 jours de workshops les participant.e.s pourront ainsi se former mutuellement au maniement des outils électroportatifs, se sensibiliser au réemploi et rendre le plateau plus zen.\r\n★ 200% scrap-materials : notre beautiful modular office desk est réalisé sur place ⇩On-site⇩ avec les matériaux présents à la récuperathèque ! ★ Le beautiful modular office desk : \r\nune structure orthogonale et systémique pour une économie ⟳globalement⟳ circulaire ★ ', '2019-11-02 11:44:50', '★ Our beautiful modular office desk set up ★', 'Workshop'),
(1, 'Diffusion du poster-fassicule de présentation de la BàG pour le début de l\'année scolaire 2019-2020.\r\nNotre campagne de diffusion est accompagnée de divers matériaux de la BàG éparpillés dans l\'ERG sur lesquels sont inscrits des parties d\'infos, examplifiant ainsi les possibilitées de réemploie qu\'offre la BàG.', '2019-10-06 21:12:45', 'Nouveau Poster-fassicule de présentation', 'communication');

-- --------------------------------------------------------

--
-- Structure de la table `journal`
--

DROP TABLE IF EXISTS `journal`;
CREATE TABLE IF NOT EXISTS `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `glocks` int(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `nom_prenom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `journal`
--

INSERT INTO `journal` (`id`, `id_user`, `action`, `glocks`, `date`, `nom_prenom`) VALUES
(25, 27, 'Ajout', 11, '2019-11-21 20:39:54', NULL),
(26, 27, 'Décompte', -2, '2019-11-21 20:40:11', NULL),
(27, 8, 'Désinscription', 12, '2019-11-21 20:40:21', 'Talarico Louise'),
(24, 27, 'Inscription', 1, '2019-11-21 20:39:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(1000) NOT NULL,
  `prenom` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `glocks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `glocks`) VALUES
(2, 'Suarez', 'Beny', 'beny.suarez_piedra@me.com', 200),
(6, 'Peters', 'Sylvain', 'sylvain.peters01@gmail.com', 72),
(11, 'Proisy', 'Dylan', 'dylanproisy@yahoo.fr', 40),
(24, 'Marcot', 'Patxi', 'colombelrj@gmail.com', 20),
(27, 'Tsyshin', 'Matvei', 'matvei.lol@gmail.com', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
