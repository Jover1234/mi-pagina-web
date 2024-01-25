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

 // Variables para almacenar el carrito y el total
 $carrito = [];
 $total = 0;
// Prepara SELECT
$miConsulta = $conn->prepare('SELECT * FROM carrito;');
$miConsulta2 = $conn->prepare('SELECT SUM(precio) as total FROM carrito;');

// Ejecuta consulta 1
$miConsulta->execute();
// Recupera resultados de consulta 1
$carrito = $miConsulta->fetchAll(PDO::FETCH_ASSOC);

// Ejecuta consulta 2
$miConsulta2->execute();
// Recupera resultados de consulta 2
$resultadoConsulta2 = $miConsulta2->fetch(PDO::FETCH_ASSOC);
$total = $resultadoConsulta2['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leer - CRUD PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td {
           
            text-align: center;
            padding: 1.3rem;
            background-color: white;
        }
        table th {
            
            text-align: center;
            padding: 0.3rem;
            background-color:greenyellow ;
        }
        .button {
            border-radius: 5rem;
            color: white;
            background-color: red;
            padding: 1rem;
            text-decoration: none;
        }
        .button1 {
            border-radius: 5rem;
            color: white;
            background-color: green;
            padding: 1rem;
            text-decoration: none;
        }
        html{
    font-family: Arial, Helvetica, sans-serif;
    background-image: url(https://img.freepik.com/vector-premium/paw-heart-animal-love-linea-silueta-icono-mascota-perro-gato-huella-pictograma-conjunto-huella-pie-cachorro_541122-577.jpg);
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
    margin-bottom: 0em;
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

p{
    border-radius: 5rem;
    border: 3px  solid green;
            color: green;
            background-color: white;
            padding: 1rem;
            text-decoration: none;
            margin-right: 5em;
            margin-right: 80em;
    margin-bottom: 2em;
}
    </style>
</head>
<body>
<div class="navbar">
<a href="Cerrar Sesion.php"> cerrar Sesion</a>
            <a href="inicio.php">Inicio</a>
            <a href="Tienda.php">Tienda</a>
            <a href="AtencionCliente.php">Atención al cliente</a>
            <a href="leer.php">Reseñas</a>
            <a href="Carrito.php">Carrito</a>
        </div>
<table>
    <tr>
        <th>PRECIO</th>
        <th>NOMBRE</th>
        <th>                          </th>
    </tr>
    <?php foreach ($carrito as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['precio']; ?></td>
           <td><?= $valor['nombre']; ?></td>
           <td><a class="button" href="Eliminar Carrito.php?id=<?= $valor['id'] ?>">Quitar del Carrito</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<p>Total del carrito: $<?= $total ?></p>
<div class="pagar">
<a class="button1" onclick="mostrarAlerta()">Pagar</a>
</div>
<script>
    function mostrarAlerta() {
        alert(" Se ha realizado Tu Compra");
    }
</script>
<footer>
        <div class=" final">
            <a href="PoliticaPrivacidad.php">Poltica de Privacidad</a>
            <a href="Cookies.php">Cookies</a>
            <a href="Conocenos.php">Quienes Somos</a>
            <a href="Ubicaciones.php">Ubicacion</a>
    </footer>
</body>
</html>

