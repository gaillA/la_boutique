<?php
include_once "../fonctions/fonctions.php";
session_start();

if ($_SESSION['type'] != 'admin')
  header("Location: ../Accueil");

$erreur = errorsAddProduct($_POST, $_FILES);
$categories = getCategories();

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
  <title>La Maison - Ajouter produit</title>
</head>

<body>
  <?php include_once "../public/templates/header_admin.php" ?>
  <main class="container">
    <h2>Ajouter produit</h2>
    <form method="post" enctype="multipart/form-data">
      <input type="text" name="titre" placeholder="Titre" value="<?= $_POST['titre'] ?>"><br>
      <textarea name="description" placeholder="Description"><?= $_POST['description'] ?></textarea><br>
      <input type="text" name="prix" placeholder="Prix" value="<?= $_POST['prix'] ?>"><br>
      <input type="file" name="image" placeholder="Image"><br>
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
      </select><br>
      <select name="statut">
        <option value="Solde">Solde</option>
        <option value="New">New</option>
      </select>
      <input type="text" name="reduction" placeholder="Réduction" value="<?= $_POST['reduction'] ?>"><br>
      <input type="submit" name="send" value="Ajouter"><br>
      <?php if (isset($_POST['send'])) : ?>
        <?= $erreur ?>
      <?php endif ?>
    </form>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>