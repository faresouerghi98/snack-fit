-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 27 Novembre 2019 à 21:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `snack-fit`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Prix` float NOT NULL,
  `Cord` varchar(100) COLLATE utf8_bin NOT NULL,
  `date_creation` date NOT NULL,
  `date_expiration` date DEFAULT NULL,
  `etat_commande` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'En Attente',
  PRIMARY KEY (`id_commande`),
  KEY `id_client` (`id_client`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `id_produit`, `Qty`, `Prix`, `Cord`, `date_creation`, `date_expiration`, `etat_commande`) VALUES
(1, 23, 2, 8, 2, '123', '2019-11-28', '2019-11-30', 'En Attente'),
(2, 23, 5, 4, 23, '123', '2019-11-29', '2019-11-30', 'En Attente'),
(114, 6, 1, 123, 22140, 'Tunisie/Ariana/Ariana Essoughra', '2019-11-27', '2019-11-29', 'En Attente');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `descp` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dated` date NOT NULL,
  `datef` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `nb_place` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nom`, `descp`, `image`, `dated`, `datef`, `lieu`, `nb_place`, `prix`) VALUES
(4, 'kitch', 'c''est un évenement international ', 'img/events/event.jpg', '1970-01-01', '1970-01-01', 'tunis', 22, 4);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `nb_place` int(11) NOT NULL,
  `date_res` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `event_id_2` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE IF NOT EXISTS `reclamation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cmd_id` int(11) NOT NULL,
  `date_rec` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `motif` varchar(255) NOT NULL,
  `descp` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cmd_id` (`cmd_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `cmd_id_2` (`cmd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fidelity` int(11) DEFAULT '0',
  `surname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `fidelity`, `surname`, `email`, `password`, `role`, `number`) VALUES
(6, 'Rassilo', 'rassil', 1, 'br', 'br.rassil@gmail.com', '1234', 'user', '55236654'),
(9, 'client2', 'noice', 1, 'two', 'client2@email.com', '0000', 'user', '24252636'),
(13, 'client3', 'client', 0, 'three', 'client3@email.com', '1234', 'user', '52556523'),
(22, 'admin', 'admin', 0, '', 'admin@email.com', 'admin', 'admin', '55236654'),
(23, 'fares', 'fares', 0, '123', '54545', 'fares', 'user', '123');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_2` FOREIGN KEY (`cmd_id`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
