<?php

function userExist($email)
{
  $db = dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
  $req->execute([$email]);
  $result = (int) $req->fetch(PDO::FETCH_COLUMN);

  if ($result == 1) {
    return true;
  }
  return false;
}

function getUser($email, $mdp)
{
  if (userExist($email)) {
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([$email]);
    $result = $req->fetch(PDO::FETCH_ASSOC);

    if ($mdp == $result['mot_de_passe'])
      return $result;
    else
      return "<span class='erreur'>Erreur mauvais mot de passe</span>";
  } else {
    return "<span class='erreur'>Erreur utilisateur non trouvé</span>";
  }
}

function errorsConnexion($post)
{
  $erreur = "";

  if (empty($post['email'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer un mail</span><br>";
  }
  if (empty($post['mdp'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer un mot de passe</span><br>";
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

  return $erreur;
}
