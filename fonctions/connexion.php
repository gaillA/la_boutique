<?php

function userExist($email)
{
  $db = dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
  $req->execute([$email]);
  $result = (int) $req->fetchAll(PDO::FETCH_COLUMN)[0];

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
    $result = $req->fetchAll(PDO::FETCH_ASSOC)[0];

    if ($mdp == $result['mot_de_passe'])
      return $result;
    else
      return "<span class='erreur'>Erreur mauvais mot de passe</span>";
  } else {
    return "<span class='erreur'>Erreur utilisateur non trouvé</span>";
  }
}
