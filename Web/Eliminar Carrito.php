<?php
 // Variables
 $server = 'localhost';
$username = 'root';
$password = '1234';
$database = 'intermedia3';
// Conecta con base de datos
try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
// Prepara DELETE
$miConsulta = $conn->prepare('DELETE FROM carrito WHERE id = ?');
// Ejecuta la sentencia SQL

$miConsulta->execute([ $id]);
// Redireccionamos al PHP con todos los datos
header('Location: Carrito.php');
?>