-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 avr. 2020 à 08:46
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
  `img_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `contenu`, `date`, `titre`, `type`, `img_url`) VALUES
(2, '★ Du 18 au 20 Novembre à la BàG ! Réalisation en intelligence collective et agile de notre beautiful modular office desk, un bureau modulaire et multifonctionnel !\r\n\r\n★ Pour que les bénévoles puissent assurer leur permanence dans un cadre optimal, la BàG propose un workshop conception et construction d\'un bureau modulaire multi-fonction,  qui fait reception, réunion, établi, cantine. \r\nA swiss army knife desk, very versatile !\r\n\r\n★ Au cours des 3 jours de workshops les participant.e.s pourront ainsi se former mutuellement au maniement des outils électroportatifs, se sensibiliser au réemploi et rendre le plateau plus zen.\r\n\r\n★ 200% scrap-materials : notre beautiful modular office desk est réalisé sur place ⇩On-site⇩ avec les matériaux présents à la récuperathèque ! Le beautiful modular office desk : \r\nune structure orthogonale et systémique pour une économie ⟳globalement⟳ circulaire\r\n\r\nAffiche par Nina Six', '2019-11-02 11:44:50', '★ Our Beautiful Modular Office Desk Set Up ★', 'Workshop', 'img/2.jpg'),
(1, 'Diffusion du poster-fassicule de présentation de la BàG pour le début de l\'année scolaire 2019-2020.\r\n\r\nNotre campagne de diffusion est accompagnée de divers matériaux de la BàG éparpillés dans l\'ERG sur lesquels sont inscrits des parties d\'infos, examplifiant ainsi les possibilitées de réemploie qu\'offre la BàG.\r\n\r\nN\'hésitez pas à venir nous rencontrer, posez des questions sur le fonctionnement de la BàG, participer à son organisation ou nous ramener des matériaux !', '2019-10-06 21:12:45', 'Nouveau Poster-Fascicule de Présentation', 'Communication', 'img/1.jpg'),
(3, 'Merci beaucoup à celles et ceux qui ont participé à notre workshop &quot;Our beautiful modular office desk set up&quot; donné à l’occasion du séminaire 2019 &quot;Économies interstices&quot; de l’erg.\r\n\r\nNous sommes super content.e.s de notre nouveau bureau pensé et réalisé par vos soins!\r\n\r\nLe résultat est un bureau en trois modules:\r\n★ deux tables similaires qui peuvent se joindre en longueurs, en carré, ou en d\'autres formes plus complexes.\r\n★ ainsi qu\'un module complémentaire sur roulette possédant une grille verticale d\'affichage et un bac de rangement, qui peut se glisser juste en dessous des tables.\r\n\r\nVernissage du bureau très bientôt...', '2019-11-22 00:00:00', 'Nouveau Bureau et Énergie Collective', 'Communication', 'img/3.jpg'),
(4, 'Le 12 DECEMBRE à 17h, la Boite à Gants inaugure la finalisation du bureau modulaire réalisé pendant le Workshop du séminaire de Novembre \"Our beautiful modular desk set up\" !\r\n\r\nCet évènements est organisé et présenté avec l\'aide d\'ERGOTE RADIO.\r\n\r\nLa BàG vous attend toustes sur le plateau art de l\'Erg pour profiter des projections, du bar et des concerts. \r\n\r\nPROGRAMME:\r\n★ 17H : projection du workshop\r\n★ 19H : live FEUILLEDETHE × THE  LOUKOUMS\r\n★ 20H : live LOURDES × GASPARD HERS + dj set LOURDES\r\n\r\nAffiche par Simon Raguin', '2019-12-04 00:00:00', 'Opening: OUR BEAUTIFUL MODULAR DESK SET UP X ERGOTE RADIO', 'Évènement', 'img/4.jpg'),
(6, 'Jeudi 13 février la BàG rayonne sur le plateau art avec 3 galettes des rois véganes faites maisons et à partager librement ☼ ☼ ☼', '2020-02-13 00:00:00', 'Galettes de la BàG', 'Évènement', 'img/6.jpg'),
(7, 'La BàG fleurie à nouveau.\r\nUn énorme rangement a été effectué, matériaux reclassés, retriés et reconditionnés.\r\n\r\nLe mobilier bureau collectif et modulaire officiel a été updaté pour une nouvelle existence encore plus solide.\r\nComme nappé de sirop d\'érable, il est prêt à reflèter les premiers rayons de soleil.\r\nLes nouveaux.elles bénévoles pour les permanences vont etre bien loti.e.s!\r\n\r\nNotons en plus, certains arrivages particuliers:\r\n★ Pigments & autres petits trésors\r\n★ Une tonne de cadre dans une multitudes de formats\r\n★ Du lettrage typographique autocollant vintage', '2020-03-03 00:00:00', 'Printemps', 'Communication', 'img/7.jpg'),
(5, 'La BàG présente jeudi dernier à la manifestation devant le parlement contre la coupe budgétaire des 60% de Jan Jambon pour l\'Art et la culture.', '2019-12-02 13:18:30', 'BàG for Survival', 'Communication', 'img/5.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
