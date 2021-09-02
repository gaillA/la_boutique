<?php
include_once "../fonctions/fonctions.php";
session_start();

$erreur = "";

if (empty($_POST['prenom'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer un prenom</span><br>";
}

if (empty($_POST['nom'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer un nom</span><br>";
}

if (empty($_POST['email'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer un email</span><br>";
}

if (empty($_POST['mdp'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer un mot de passe</span><br>";
}

if (empty($erreur)) {
  if (!userExist($_POST['email'])) {
    addUser($_POST);
    $erreur = "<span class='succes'>Inscription réussie</span><br>";
  } else {
    $erreur = "<span class='erreur'>Cet email est déjà utilisé</span><br>";
  }
}

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
  <title>La Maison - Connexion</title>
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
        <li><a href="Connexion"><i class="fas fa-user"></i><span> Se connecter</span></a></li>
        <li><a href="Inscription" class="active"><i class="fas fa-sign-in-alt"></i><span> S'inscrire</span></a></li>
      </ul>
    </nav>
  </header>
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