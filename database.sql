CREATE TABLE `products`
(
  `id_product` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `titre` VARCHAR(255) DEFAULT NULL,
  `description` TEXT DEFAULT NULL,
  `prix` INT DEFAULT NULL,
  `url_image` VARCHAR(255) DEFAULT NULL,
  `categorie` INT(11) DEFAULT NULL,
  `taille` ENUM('S','M','L','XL'),
  `statut` ENUM('Solde','New'),
  `reduction` INT(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE `categories`
(
  `id_categorie` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `nom` ENUM('Femme','Homme'),
  `description` TEXT DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE `users`
(
  `id_user` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(255) DEFAULT NULL,
  `prenom` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `mot_de_passe` VARCHAR(255) DEFAULT NULL,
  `type` ENUM('admin', 'client')
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE `commandes`
(
  `id_commande` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `produit` INT(11) DEFAULT NULL,
  `client` INT(11) DEFAULT NULL,
  `prix_total` INT(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
