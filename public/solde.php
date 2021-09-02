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
  <header>
    <h1>La Maison</h1>
    <nav class="container">
      <ul>
        <li><a href="Accueil"><i class="fas fa-home"></i><span> Accueil</span></a></li>
        <li><a href="Soldes" class="active"><i class="fas fa-dollar-sign"></i><span> Solde</span></a></li>
        <li><a href="Categorie/Homme"><i class="fas fa-male"></i><span> Homme</span></a></li>
        <li><a href="Categorie/Femme"><i class="fas fa-female"></i><span> Femme</span></a></li>
      </ul>
      <ul>
        <?php if (isset($_SESSION['email'])) : ?>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-user"></i><span> <?= $_SESSION['prenom'] ?></span></a>
            <div class="dropdown-content mobile">
              <?php if ($_SESSION['type'] == 'admin') : ?>
                <a href="Admin"><i class="fas fa-tachometer-alt"></i><span> Panel admin</span></a>
              <?php endif ?>
              <a href="Panier"><i class="fas fa-shopping-cart"></i><span> Mes achats</span></a>
              <a href="Deconnexion"><i class="fas fa-times"></i><span> Déconnexion</span></a>
            </div>
          </li>
        <?php else : ?>
          <li><a href="Connexion"><i class="fas fa-user"></i><span> Se connecter</span></a></li>
          <li><a href="Inscription"><i class="fas fa-sign-in-alt"></i><span> S'inscrire</span></a></li>
        <?php endif ?>
      </ul>
    </nav>
  </header>
  <main class="container">
    <h2>Accueil</h2>
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