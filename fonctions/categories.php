<?php

function getCategories()
{
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM categories");
  $req->execute();
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
