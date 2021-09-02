<?php
include_once "../fonctions/fonctions.php";
session_start();

if ($_SESSION['type'] != 'admin')
  header("Location: ../Accueil");

$erreur = "";
$categories = getCategories();

if (empty($_POST['titre'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer un titre</span>";
}

if (empty($_POST['description'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer une description</span>";
}

if (empty($_POST['prix'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer un prix</span>";
}

if (empty($_FILES['image'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer une image</span>";
}

if ($_POST['statut'] == "Solde" && empty($_POST['reduction'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer une réduction</span>";
}

if (empty($erreur)) {
  $temp = $_FILES['image']['tmp_name'];
  $name = $_FILES['image']['name'];
  $dest = $_SERVER['DOCUMENT_ROOT'] . "/la_boutique/public/img/" . $name;
  move_uploaded_file($temp, $dest);
  addProduct($_POST, $name);
  $erreur .= "<span class='succes'>Ajout réussi</span>";
}

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
  <title>La Maison - Panel Admin</title>
</head>

<body>
  <header>
    <h1>La Maison</h1>
    <nav class="container">
      <ul>
        <li><a href="Accueil"><i class="fas fa-home"></i><span> Accueil</span></a></li>
        <li><a href="Soldes"><i class="fas fa-dollar-sign"></i><span> Solde</span></a></li>
        <li><a href="Categorie/Homme"><i class="fas fa-male"></i><span> Homme</span></a></li>
        <li><a href="Categorie/Femme"><i class="fas fa-female"></i><span> Femme</span></a></li>
      </ul>
      <ul>
        <?php if (isset($_SESSION['email'])) : ?>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn active"><i class="fas fa-user"></i><span> <?= $_SESSION['prenom'] ?></span></a>
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
    <h2>Ajouter produit</h2>
    <form method="post" enctype="multipart/form-data">
      <input type="text" name="titre" placeholder="Titre" value="<?= $_POST['titre'] ?>">
      <input type="text" name="description" placeholder="Description" value="<?= $_POST['description'] ?>">
      <input type="text" name="prix" placeholder="Prix" value="<?= $_POST['prix'] ?>">
      <input type="file" name="image" placeholder="Image">
      <select name="categorie">
        <?php foreach ($categories as $cat) : ?>
          <option value="<?= $cat['id_categorie'] ?>"><?= $cat['nom'] ?></option>
        <?php endforeach ?>
      </select>
      <select name="taille">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
      </select>
      <select name="statut">
        <option value="Solde">Solde</option>
        <option value="New">New</option>
      </select>
      <input type="text" name="reduction" placeholder="Réduction" value="<?= $_POST['reduction'] ?>">
      <input type="submit" name="send" value="Connexion">
      <?php if (isset($_POST['send'])) : ?>
        <?= $erreur ?>
      <?php endif ?>
    </form>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>