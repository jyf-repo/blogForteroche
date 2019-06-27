-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 27 juin 2019 à 09:15
-- Version du serveur :  5.7.25
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_comment` datetime NOT NULL,
  `comment` text NOT NULL,
  `alert` tinyint(1) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `first_page` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_ticket`, `author`, `date_comment`, `comment`, `alert`, `visibility`, `first_page`) VALUES
(4, 2, 'cameleon', '2019-03-08 00:00:00', 'j\'accroche pas pour l\'instant', 0, 1, 0),
(7, 0, 'narine', '2019-05-13 14:25:16', 'Il est perdu', 0, 1, 0),
(8, 0, 'narine', '2019-05-13 14:26:10', 'il est perdu', 0, 1, 0),
(9, 0, 'narine', '2019-05-13 14:26:52', 'il est perdu', 0, 1, 0),
(10, 0, '', '2019-05-13 14:32:46', 'narine', 0, 1, 0),
(11, 0, '19', '2019-05-13 14:37:16', 'narine', 0, 1, 0),
(12, 0, 'narine', '2019-05-13 14:37:46', 'pres d\'un arbre', 0, 1, 0),
(13, 0, 'bob l\'eponge', '2019-05-13 14:40:12', 'prend un tracteur', 0, 1, 0),
(16, 5, 'oeil', '2019-05-13 14:50:51', 'a personne', 1, 1, 0),
(17, 5, 'oreille', '2019-05-13 14:51:06', 'c\'est un chat', 1, 0, 0),
(20, 2, 'bob l\'eponge', '2019-05-20 15:05:27', 'LOISDNCIEXUHRGS', 0, 1, 0),
(21, 5, 'oreille', '2019-05-29 15:35:46', 'pourquoi c\'est en cours de modération?', 1, 0, 0),
(24, 17, 'eclopé', '2019-06-05 06:33:27', 'ce chapitre est trés interessant', 0, 1, 1),
(25, 19, 'pepere', '2019-06-11 01:17:56', 'L\'histoire du train semble bien etrange', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `pass`) VALUES
(1, 'jyjy', 'dkdk');

-- --------------------------------------------------------

--
-- Structure de la table `readers`
--

CREATE TABLE `readers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `readers`
--

INSERT INTO `readers` (`id`, `name`, `email`, `date_inscription`) VALUES
(1, 'jojo', 'jojo@coco.com', '2019-06-15 14:53:55'),
(2, 'jaja', 'jaja@dodo.com', '2019-06-15 14:56:49');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'parDefaut.jpg',
  `visibility` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id`, `title`, `date_creation`, `content`, `image`, `visibility`) VALUES
(1, 'Prologue ', '2019-05-11 20:03:05', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. etc..etc...\r\ntu quoque mi filii ... asterix et obelix', 'alaskaHerbe.jpg', 0),
(2, 'Chapitre 1', '2019-05-11 16:55:57', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'alaskaOurs.jpeg', 0),
(3, 'Chapitre 2', '2019-06-01 09:43:59', 'C\'est une histoire TRES étrange que celle-ci, n\'est ce pas?', 'alaskaLoup.jpeg', 0),
(4, 'Chapitre 3', '2019-05-11 16:55:34', 'C\'est justement là que l\'histoire devient interessante, comme je l\'avais dit à l\'interlocuteur à côté de la table.', 'alaskaGlacier.jpg', 0),
(5, 'Chapitre 4', '2019-05-12 19:36:19', 'La grande polémique qui fait évènement, c\'est à qui appartient le petit chien du deuxième étage.', 'alaska1.jpg', 1),
(17, 'Chapitre 5', '2019-06-01 19:26:57', 'Le film reprend et les protagonistes courent', 'alaskaBaleine.jpg', 0),
(18, 'Chapitre 6', '2019-06-16 17:22:55', 'osritvosituvsitb oistoivnpos', 'parDefaut.jpg', 0),
(19, 'Chapitre 8: le train', '2019-06-11 01:11:30', 'Passage du train à travers les champs glacés.', 'villeAlaska.jpg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `readers`
--
ALTER TABLE `readers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `readers`
--
ALTER TABLE `readers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
