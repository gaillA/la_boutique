<?php
include_once "../fonctions/fonctions.php";
session_start();

if ($_SESSION['type'] != 'admin')
  header("Location: ../Accueil");
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
  <?php include_once "../public/templates/header.php" ?>
  <main class="container">
    <h2>Panel Admin</h2>
    <div class="panel">
      <a href="AjouterProduit" class="button">Ajouter produit</a><br>
      <a href="ListeClients" class="button">Liste clients</a><br>
      <a href="ListeProduits" class="button">Liste produits</a><br>
    </div>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>