<?php $url = $_SERVER['REQUEST_URI'] ?>

<header>
  <h1>La Maison</h1>
  <nav class="container">
    <ul>
      <li><a href="Accueil" <?php if ($url == '/la_boutique/Accueil' || $url == '/la_boutique/') echo 'class="active"' ?>><i class="fas fa-home"></i><span> Accueil</span></a></li>
      <li><a href="Soldes" <?php if ($url == '/la_boutique/Soldes') echo 'class="active"' ?>><i class="fas fa-dollar-sign"></i><span> Solde</span></a></li>
      <li><a href="Categorie/Homme" <?php if ($url == '/la_boutique/Categorie/Homme') echo 'class="active"' ?>><i class="fas fa-male"></i><span> Homme</span></a></li>
      <li><a href="Categorie/Femme" <?php if ($url == '/la_boutique/Categorie/Femme') echo 'class="active"' ?>><i class="fas fa-female"></i><span> Femme</span></a></li>
    </ul>
    <ul>
      <?php if (isset($_SESSION['email'])) : ?>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn <?php if ($url == '/la_boutique/Panier') echo 'active' ?>"><i class="fas fa-user"></i><span> <?= $_SESSION['prenom'] ?></span></a>
          <div class="dropdown-content mobile">
            <?php if ($_SESSION['type'] == 'admin') : ?>
              <a href="Admin"><i class="fas fa-tachometer-alt"></i><span> Panel admin</span></a>
            <?php endif ?>
            <a href="Panier"><i class="fas fa-shopping-cart"></i><span> Mes achats</span></a>
            <a href="Deconnexion"><i class="fas fa-times"></i><span> Déconnexion</span></a>
          </div>
        </li>
      <?php else : ?>
        <li><a href="Connexion" <?php if ($url == '/la_boutique/Connexion') echo 'class="active"' ?>><i class="fas fa-user"></i><span> Se connecter</span></a></li>
        <li><a href="Inscription" <?php if ($url == '/la_boutique/Inscription') echo 'class="active"' ?>><i class="fas fa-sign-in-alt"></i><span> S'inscrire</span></a></li>
      <?php endif ?>
    </ul>
  </nav>
</header>