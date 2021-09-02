<?php

function addProduct($prod, $img)
{
  $titre = $prod['titre'];
  $description = $prod['description'];
  $prix = $prod['prix'];
  $categorie = $prod['categorie'];
  $taille = $prod['taille'];
  $statut = $prod['statut'];
  $reduction = $prod['reduction'];

  $db = dbConnect();
  $req = $db->prepare("INSERT INTO products (titre, description, prix, url_image, categorie, taille, statut, reduction) VALUES (?,?,?,?,?,?,?,?)");
  $req->execute([$titre, $description, $prix, $img, $categorie, $taille, $statut, $reduction]);
}
