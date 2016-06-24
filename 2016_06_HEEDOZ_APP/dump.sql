-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 24 Juin 2016 à 17:57
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `register`
--

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `author` varchar(40) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `timer` datetime NOT NULL,
  `timerS` time NOT NULL,
  `categorie` varchar(20) CHARACTER SET utf8 NOT NULL,
  `imgTitle` varchar(20) CHARACTER SET utf8 NOT NULL,
  `imgSize` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `promo`
--

INSERT INTO `promo` (`id`, `author`, `title`, `text`, `timer`, `timerS`, `categorie`, `imgTitle`, `imgSize`) VALUES
(23, 'exou', 'test', 'test heure date + username', '2016-06-25 00:00:00', '12:30:00', 'Meuble', '', 0),
(24, 'exou', 'test', 'test heure date + username', '2016-06-25 00:00:00', '17:30:00', 'Meuble', '', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;