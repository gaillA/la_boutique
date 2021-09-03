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

function errorsAddProduct($post, $files)
{
  $erreur = "";

  if (empty($post['titre'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer un titre</span><br>";
  }
  if (empty($post['description'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer une description</span><br>";
  }
  if (empty($post['prix'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer un prix</span><br>";
  } elseif (!is_numeric($post['prix'])) {
    $erreur .= "<span class='erreur'>Erreur le prix doit être numérique</span><br>";
  }
  if (empty($files['image']['name'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer une image</span><br>";
  }
  if ($post['statut'] == "Solde" && empty($post['reduction'])) {
    $erreur .= "<span class='erreur'>Erreur veuillez entrer une réduction</span><br>";
  } elseif (!empty($post['reduction']) && !is_numeric($post['reduction'])) {
    $erreur .= "<span class='erreur'>Erreur la réduction doit être numérique</span><br>";
  }

  if (empty($erreur)) {
    $temp = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $dest = $_SERVER['DOCUMENT_ROOT'] . "/la_boutique/public/img/" . $name;
    move_uploaded_file($temp, $dest);
    addProduct($_POST, $name);
    $erreur .= "<span class='succes'>Ajout réussi</span>";
  }

  return $erreur;
}

function getProducts($cat = "")
{
  $db = dbConnect();
  if (empty($cat)) {
    $req = $db->prepare("SELECT * FROM products");
    $req->execute();
  } else {
    $req = $db->prepare("SELECT * FROM products WHERE categorie = ?");
    $req->execute([$cat]);
  }

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
