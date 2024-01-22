<?php
session_start();
require 'database.php';

if (isset($_SESSION['user_id'])) {
    // El usuario ya está autenticado, redirige o realiza acciones necesarias
    header("Location: home.php");
    exit();
}

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        // Autenticación exitosa, redirige o realiza acciones necesarias
        header("Location: index.html");
        exit();
    } else {
        $message = 'Sorry, those credentials do not match';
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar Sesion</h1>
    <span>0 <a href="signup.php">Registrarse</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu email">
      <input name="password" type="password" placeholder="Ingresa Tu contraseña">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>