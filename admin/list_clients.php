<?php
include_once "../fonctions/fonctions.php";
session_start();

if ($_SESSION['type'] != 'admin')
  header("Location: ../Accueil");

$clients = getClients();
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
  <title>La Maison - Liste clients</title>
</head>

<body>
  <?php include_once "../public/templates/header_admin.php" ?>
  <main class="container">
    <h2>Liste clients</h2>
    <table>
      <thead>
        <tr>
          <th>Nom</td>
          <th>Prenom</td>
          <th>Email</td>
          <th>Mdp</td>
          <th>Type</td>
          <th>Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clients as $client) : ?>
          <tr>
            <td><?= $client['nom'] ?></td>
            <td><?= $client['prenom'] ?></td>
            <td><?= $client['email'] ?></td>
            <td><?= $client['mot_de_passe'] ?></td>
            <td><?= $client['type'] ?></td>
            <td class="actions">
              <a href="#" class="edit">Editer</a>
              <a href="#" class="supp">Supprimer</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>