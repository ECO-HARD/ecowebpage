<?php
/* PAra registrarnos ocuparemos nuevamente la base de datos */
  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";/* Ingresara en la tabla los datos obtenidos de los campos */
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);/* Password hash es un metodo de encriptacion */
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Se ha creado tu cuenta satisfactoriamente';/* si se creo satisfactoriamente el usuario, mostrara el mensaje */
    } else {
      $message = 'Sorry there must have been an issue creating your account';/* Si no se creo satisfactoriamente nos mostrara este mensaje */
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registra tu cuenta ECOHARD® ahora</h1>
    <span>Ya tienes una cuenta? ve ahora a  <a href="login.php">Inicio de Sesion</a></span>

    <form action="signup.php" method="POST"><!-- todas las formas en donde ingresaremos los datos para registrarnos -->
      <input name="email" type="text" placeholder="Ingresa tu usuario ">
      <input name="email" type="text" placeholder="Ingresa tu correo electronico">
      <input name="password" type="password" placeholder="Ingresa tu contraseña">
      <input name="confirm_password" type="password" placeholder="Confirma tu contraseña">
      <input type="submit" value="Registrarme">
    </form>
    <span>Te recomendamos que tu contraseña tenga   </span>
    <br>
    <span>al menos una mayuscula, un numero y un </span>
    <br>
    <span>signo(! " # $ % & ' ( ) * + , - . / : )  </span>

  </body>
</html>
