<?php

$server = 'localhost:3306';
$username = 'root';
$password = '1234';
$database = 'intermedia3';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>