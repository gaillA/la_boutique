<?php
include_once "../fonctions/fonctions.php";
session_start();

$erreur = "";

if (empty($_POST['email'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer un mail</span>";
}

if (empty($_POST['mdp'])) {
  $erreur .= "<span class='erreur'>Erreur veuillez entrer un mot de passe</span>";
}

if (empty($erreur)) {
  $user = getUser($_POST['email'], $_POST['mdp']);
  if (is_array($user)) {
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['prenom'] = $user['prenom'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['type'] = $user['type'];
  } else {
    $erreur = $user;
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
        <li><a href="Accueil" class="active"><i class="fas fa-home"></i><span> Accueil</span></a></li>
        <li><a href="Soldes"><i class="fas fa-dollar-sign"></i><span> Solde</span></a></li>
        <li><a href="Categorie/Homme"><i class="fas fa-male"></i><span> Homme</span></a></li>
        <li><a href="Categorie/Femme"><i class="fas fa-female"></i><span> Femme</span></a></li>
      </ul>

      <ul>
        <li><a href="Connexion"><i class="fas fa-user"></i><span> Se connecter</span></a></li>
        <li><a href="Inscription"><i class="fas fa-sign-in-alt"></i><span> S'inscrire</span></a></li>
      </ul>
    </nav>
  </header>
  <main class="container">
    <h2>Connexion</h2>
    <form method="post">
      <input type="text" name="email" placeholder="email"><br>
      <input type="password" name="mdp" placeholder="mdp"><br>
      <input type="submit" name="send" value="Connexion"><br>
      <?php if (isset($_POST['send'])) : ?>
        <?= $erreur ?>
      <?php endif ?>
    </form>
  </main>
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>