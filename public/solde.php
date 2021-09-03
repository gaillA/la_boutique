<?php
include_once "../fonctions/fonctions.php";
session_start();
$produits = getSoldes();
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
  <title>La Maison - Soldes</title>
</head>

<body>
  <?php include_once "templates/header.php" ?>
  <main class="container">
    <h2>Soldes</h2>
    <div class="products">
      <?php foreach ($produits as $produit) : ?>
        <div class="card">
          <div class="img-card">
            <a href="Produit/<?= $produit['id_product'] ?>">
              <img src="public/img/<?= $produit['url_image'] ?>">
            </a>
          </div>
          <div class="card-content">
            <h3><a href="Produit/<?= $produit['id_product'] ?>"><?= $produit['titre'] ?></a></h3>
            <div>
              <span class="price"><?= $produit['prix'] - $produit['prix'] * $produit['reduction'] / 100 ?> €</span>
              <?php if ($produit['reduction'] > 0) : ?>
                <span class="solde">Solde</span>
              <?php else : ?>
                <span class="new">New</span>
              <?php endif ?>
              <a href="#" class="button-buy">Acheter</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>