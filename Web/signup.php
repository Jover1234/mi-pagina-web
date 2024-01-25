<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php if(!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<h1>Registrarse</h1>
<span>O<a href="login.php">Iniciar Sesion</a></span>

<form action="signup.php" method="POST">
    <input name="email" type="text" placeholder="Ingresa tu email">
    <input name="password" type="password" placeholder="Ingresa Tu contraseña">
    <input name="confirm_password" type="password" placeholder="Confirma la Contraseña">
    <input type="submit" value="Submit">
</form>

</body>
</html>
