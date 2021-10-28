<?php
/* Para iniciar sesion */
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /Modulo F1');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');/* realizara esta consulta para compararlos con los datos que hemos ingresado */
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Modulo F1");
    } else {
      $message = 'Sorry, those credentials do not match';/* si nos equivocamos en los datos ingresados nos mandara este mensaje de que no han sido ingresados correctamente */
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>
  
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Inicio de Sesion</h1>
    <span>si no tienes una cuenta puedes ir a  <a href="signup.php">Registro</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu Usuario o correo electronico">
      <input name="password" type="password" placeholder="Ingresa tu contraseña">
      <input type="submit" value="Entrar">
    </form>
  </body>
</html>
