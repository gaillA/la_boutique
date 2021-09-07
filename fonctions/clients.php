<?php

function getClients()
{
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM users");
  $req->execute();
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
