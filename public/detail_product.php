<?php
include_once "../fonctions/fonctions.php";
session_start();

$produit = getProduct($_GET['produit']);
$categorie = getCategory($produit['categorie'])['nom'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <base href="/la_boutique/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <title>La Maison - Détail produit</title>
</head>

<body>
  <?php include_once "templates/header.php" ?>
  <main class="container">
    <h2>Détail produit</h2>
    <?php if (!empty($produit)) : ?>
      <div class="product">
        <img src="public/img/<?= $produit['url_image'] ?>" alt="<?= $produit['titre'] ?>">
        <h3><?= $produit['titre'] ?></h3>
        <p><?= $produit['description'] ?></p>
        <p>Catégorie : <?= $categorie ?></p>
        <?php if ($produit['reduction'] > 0) : ?>
          <p>Prix : <span><?= $produit['prix'] ?>€</span> <?= $produit['prix'] - $produit['prix'] * $produit['reduction'] / 100 ?>€</p>
          <p><?= $produit['statut'] ?> : -<?= $produit['reduction'] ?>%</p>
        <?php else : ?>
          <p>Prix : <?= $produit['prix'] ?>€</p>
          <p><?= $produit['statut'] ?></p>
        <?php endif ?>
        <p>Taille : <?= $produit['taille'] ?></p>
        <a href="#" class="button">Acheter</a>
      </div>
    <?php else : ?>
      <div class="center">
        <span class="erreur">Le produit n'existe pas</span>
      </div>

    <?php endif ?>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>