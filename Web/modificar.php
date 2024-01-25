<?php
 // Variables
 $server = 'localhost:3306';
 $username = 'root';
 $password = '1234';
 $database = 'intermedia3';
 $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
 $Usuario = isset($_REQUEST['Usuario']) ? $_REQUEST['Usuario'] : null;
$Comentario = isset($_REQUEST['Comentario']) ? $_REQUEST['Comentario'] : null;
  // Conecta con base de datos
  try {
      $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
      die('Connection Failed: ' . $e->getMessage());
    }

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $conn->prepare('UPDATE comentarios SET Usuario = :Usuario, Comentario = :Comentario WHERE id = :id');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute([
        'id' => $id,
        'Usuario' => $Usuario,
        'Comentario' => $Comentario
    ]);

    // Verifica si la actualización se realizó correctamente
    if ($miUpdate->rowCount() > 0) {
        // Redirecciona solo si se realizó la actualización
        header('Location: leer.php');
    } else {
        // Manejo de errores o mensajes de alerta, si es necesario
        echo "La actualización no se realizó correctamente.";
    }
}

else {
    // Prepara SELECT
    $miConsulta = $conn->prepare('SELECT * FROM comentarios WHERE id = ?;');
    // Ejecuta consulta
    $miConsulta->execute([ $id]);
}
// Obtiene un resultado
$comentarios = $miConsulta->fetch();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear - CRUD PHP</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="Usuario">Usuario</label>
            <input id="Usuario" type="text" name="Usuario" value="<?= $comentarios['Usuario'] ?>">
        </p>
        <p>
            <label for="Comentario">Comentario</label>
            <input id="Comentario" type="text" name="Comentario" value="<?= $comentarios['Comentario'] ?>">
        </p>
        <p>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Modificar">
        </p>
    </form>
</body>
</html>