<?php

function addUser($user)
{
  $prenom = $user['prenom'];
  $nom = $user['nom'];
  $email = $user['email'];
  $mdp = $user['mdp'];
  $type = "client";
  $db = dbConnect();
  $req = $db->prepare("INSERT INTO users (prenom, nom, email, mot_de_passe, type) VALUES (?,?,?,?,?)");
  $req->execute([$prenom, $nom, $email, $mdp, $type]);
}

function errorsInscription($post)
{
  $erreur = "";

  if (empty($post['prenom'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer un prenom</span><br>";
  }
  if (empty($post['nom'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer un nom</span><br>";
  }
  if (empty($post['email'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer un email</span><br>";
  }
  if (empty($post['mdp'])) {
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

  return $erreur;
}
