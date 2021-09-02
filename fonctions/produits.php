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

  if ($statut == 'Solde') {
    $req = $db->prepare("INSERT INTO products (titre, description, prix, url_image, categorie, taille, statut, reduction) VALUES (?,?,?,?,?,?,?,?)");
    $req->execute([$titre, $description, $prix, $img, $categorie, $taille, $statut, $reduction]);
  } else {
    $req = $db->prepare("INSERT INTO products (titre, description, prix, url_image, categorie, taille, statut) VALUES (?,?,?,?,?,?,?)");
    $req->execute([$titre, $description, $prix, $img, $categorie, $taille, $statut]);
  }
}

function getProducts()
{
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM products");
  $req->execute();
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getProduct($id)
{
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM products WHERE id_product = ?");
  $req->execute([$id]);
  $result = $req->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function getSoldes()
{
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM products WHERE statut = (?)");
  $req->execute(['Solde']);
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
