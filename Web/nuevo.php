<?php
// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $Usuario = isset($_REQUEST['Usuario']) ? $_REQUEST['Usuario'] : null;
    $Comentario = isset($_REQUEST['Comentario']) ? $_REQUEST['Comentario'] : null;
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
    // Prepara INSERT
    $miInsert = $conn->prepare('INSERT INTO comentarios (Usuario, Comentario) VALUES (:Usuario, :Comentario)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'Usuario' => $Usuario,
            'Comentario' => $Comentario,
           
        )
    );
    // Redireccionamos a Leer
    header('Location: leer.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear - CRUD PHP</title>
    <style>
body{
    text-align: center;
}
input.guardar{
            border-radius: 5rem;
            color: white;
            background-color: green;
            padding: 1rem;
            text-decoration: none;
  
}
input#Comentarios{
    PADDING-LEFT: 49EM;
    HEIGHT: 45EM;

}
a{
    border-radius: 5rem;
            color: white;
            background-color: green;
            padding: 1rem;
            text-decoration: none;
}
    </style>
</head>
<body>
    <form action="" method="post">
        <p>
            <label for="Usuario">Usuario</label>
            <input id="Usuario" type="text" name="Usuario">
        </p>
        <p>
            <label class=text for="Comentarios">Comentario</label>
            <input id="Comentarios" type="text" name="Comentario">
        </p>
        <p>
            <input class="guardar" type="submit" value="Guardar">
            <a href="leer.php">Cancelar</a>
        </p>
    </form>
</body>
</html>

</form>