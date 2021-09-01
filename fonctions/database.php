<?php

function dbConnect()
{
  try {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "la_boutique";
    $pdo = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  }
  return $pdo;
}
