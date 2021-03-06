<?php

function getCategories()
{
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM categories");
  $req->execute();
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getCategory($id)
{
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM categories WHERE id_categorie = ?");
  $req->execute([$id]);
  $result = $req->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function getCategoryId($cat)
{
  $db = dbConnect();
  $req = $db->prepare("SELECT id_categorie FROM categories WHERE nom = ?");
  $req->execute([$cat]);
  $result = $req->fetch(PDO::FETCH_ASSOC)['id_categorie'];
  return $result;
}
