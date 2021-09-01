<?php
include_once "fonctions/fonctions.php";
session_start();
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
  <title>La Maison - Accueil</title>
</head>

<body>
  <header>
    <h1>La Maison</h1>
    <nav class="container">
      <ul>
        <li><a href="Accueil" class="active"><i class="fas fa-home"></i><span> Accueil</span></a></li>
        <li><a href="Soldes"><i class="fas fa-dollar-sign"></i><span> Solde</span></a></li>
        <li><a href="Categorie/Homme"><i class="fas fa-male"></i><span> Homme</span></a></li>
        <li><a href="Categorie/Femme"><i class="fas fa-female"></i><span> Femme</span></a></li>
      </ul>
      <ul>
        <?php if (isset($_SESSION['email'])) : ?>
          <li><a href="Deconnexion"><i class="fas fa-user"></i><span>Déconnexion</span></a></li>
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
      <div class="card">
        <div class="img-card">
          <a href="pages/detail_product.php">
            <img src="public/img/homme.jpg">
          </a>
        </div>
        <div class="card-content">
          <h3><a href="pages/detail_product.php">Pull Homme</a></h3>
          <div>
            <span class="price">27 €</span>
            <a href="#" class="button-buy">Acheter</a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="img-card">
          <a href="pages/detail_product.php">
            <img src="public/img/femme.webp">
          </a>
        </div>
        <div class="card-content">
          <h3><a href="pages/detail_product.php">Robe Femme</a></h3>
          <div>
            <span class="price">23 €</span>
            <a href="#" class="button-buy">Acheter</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>