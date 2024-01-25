<?php
 // Variables
 $server = 'localhost:3306';
 $username = 'root';
 $password = '1234';
 $database = 'intermedia3';
  // Conecta con base de datos
  try {
      $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
      die('Connection Failed: ' . $e->getMessage());
    }


// Prepara SELECT
$miConsulta = $conn->prepare('SELECT * FROM comentarios;');
// Ejecuta consulta
$miConsulta->execute();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leer - CRUD PHP</title>
    <style>
         html{background-color: rgba(172, 255, 47, 0.127);}
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td {
            border: 1px solid green;
            text-align: center;
            padding: 1.3rem;
        }
        .button {
            border-radius: 5rem;
            color: white;
            background-color: green;
            padding: 1rem;
            text-decoration: none;
        }

        html{
    font-family: Arial, Helvetica, sans-serif;
}

a{
    text-decoration:none;
    color:black;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.cart {
    text-align: center;
    height: 20em;
    margin-top: 14em;
    border: 1px solid #333;
    padding: 10px;
}

.navbar{
    background-color:green;
    height: 2.5em;
    display:flex;
    margin-bottom: 2em;
}

.navbar a{
    display:flex;
    color: white;
    margin:auto;
    justify-content: space-between;
    padding: 0.5em;
    text-align: center;
}
.final {
    background-color: black;
    color: white;
    display: flex;
    bottom: 0;
    position: absolute;
    width: 99%;
    text-align: center;

}

.final a{
    display: flex;
    color: white;
    margin: auto;
}
    </style>
</head>
<body>
<header>
        <div class="navbar">
        <a href="Cerrar Sesion.php"> cerrar Sesion</a>
            <a href="inicio.php">Inicio</a>
            <a href="Tienda.php">Tienda</a>
            <a href="AtencionCliente.php">Atención al cliente</a>
            <a href="leer.php">Reseñas</a>
            <a href="Carrito.php">Carrito</a>
        </div>
    </header>  
    <p><a class="button" href="nuevo.php">Crear</a></p>
    <table>
        <tr>
            <th>Usuario</th>
            <th>Comentario</th>
        </tr>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['Usuario']; ?></td>
           <td><?= $valor['Comentario']; ?></td>
           <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
           <td><a class="button" href="modificar.php?id=<?= $valor['id'] ?>">Modificar</a></td>
           <td><a class="button" href="borrar.php?id=<?= $valor['id'] ?>">Borrar</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
    <footer>
        <div class=" final">
            <a href="PoliticaPrivacidad.php">Poltica de Privacidad</a>
            <a href="Cookies.php">Cookies</a>
            <a href="Conocenos.php">Quienes Somos</a>
            <a href="Ubicaciones.php">Ubicacion</a>
    </footer>
</body>
</html>