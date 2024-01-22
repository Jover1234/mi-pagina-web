<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="stylesindexphp.css">
  </head>
  <body>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Has sido registrado correctamente
      <a href="logout.php">
        cerrar Sesion
      </a>
    <?php else: ?>
      <div class = cuadrado>
      <h1>INICIA SESSION O REGISTRATE</h1>

      <a href="login.php">INICIAR SESION</a> O
      <a href="signup.php">REGISTARSE</a>
      </div>
    <?php endif; ?>
  </body>
</html>