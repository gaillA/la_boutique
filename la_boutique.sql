-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 02 sep. 2021 à 21:57
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
-- Base de données : `la_boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` enum('Femme','Homme') NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom`, `description`) VALUES
(1, 'Homme', 'Description catégorie Homme'),
(2, 'Femme', 'Description catégorie Femme');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `produit` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `prix_total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `produit` (`produit`),
  KEY `client` (`client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `categorie` int(11) NOT NULL,
  `taille` enum('S','M','L','XL') NOT NULL,
  `statut` enum('Solde','New') NOT NULL,
  `reduction` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`),
  KEY `categorie` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `titre`, `description`, `prix`, `url_image`, `categorie`, `taille`, `statut`, `reduction`) VALUES
(1, 'Pull homme', 'Description du pull', '27', 'homme.jpg', 1, 'M', 'Solde', 10),
(2, 'Pull', 'Description du pull', '27', 'homme.jpg', 1, 'M', 'New', 0),
(3, 'Robe', 'Description de la robe', '22', 'femme.webp', 2, 'S', 'New', 0),
(4, 'Robe', 'Description de la robe', '22', 'femme.webp', 2, 'L', 'New', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `type` enum('admin','client') NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `mot_de_passe`, `type`) VALUES
(1, 'Admin', 'Admin', 'admin@mail.com', 'admin', 'admin'),
(2, 'Gaillat', 'Anthony', 'anthomee@hotmail.fr', 'test', 'client'),
(3, 'Michel', 'Jean', 'michel@oui.fr', '123', 'client'),
(4, 'test', 'test', 'test@test.com', 'test', 'client'),
(8, 'Gaillat', 'Anthony', 'antho@hotmail.fr', 'test', 'client');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`produit`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`client`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
