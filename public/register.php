<?php
include_once "../fonctions/fonctions.php";
session_start();

$erreur = errorsInscription($_POST);

if (isset($_SESSION['email']))
  header("Location: Accueil");

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
  <title>La Maison - Inscription</title>
</head>

<body>
  <?php include_once "../public/templates/header.php" ?>
  <main class="container">
    <h2>Inscription</h2>
    <form method="post">
      <input type="text" name="prenom" placeholder="Prenom" value="<?= $_POST['prenom'] ?>"><br>
      <input type="text" name="nom" placeholder="Nom" value="<?= $_POST['nom'] ?>"><br>
      <input type="text" name="email" placeholder="Email" value="<?= $_POST['email'] ?>"><br>
      <input type="password" name="mdp" placeholder="Mdp" value="<?= $_POST['mdp'] ?>"><br>
      <input type="submit" name="send" value="Inscription"><br>
      <?php if (isset($_POST['send'])) : ?>
        <?= $erreur ?>
      <?php endif ?>
    </form>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>