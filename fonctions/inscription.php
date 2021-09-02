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
