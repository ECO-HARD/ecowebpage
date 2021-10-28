<?php 
/* Este sera el index que se mostrara al clickear en el boton de cuenta */
session_start();/* esto permitira mantener la sesion iniciada en la cuenta por la sesion en el navegador */

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
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body >
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?><!-- Si ya hemos iniciado sesion y entramos al index, nos mostrara un mensaje de que ya estamos dentro -->
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Has iniciadio sesion satisfactoriamente!
      <a href="logout.php">
        Cerrar Sesion<!-- mostrara la opcion de poder cerrar sesion -->
      </a>
      <br>Volver a la
      <a href="/ecowebpage/index.html">
        Pagina Principal<!-- mostrara la opcion de poder cerrar sesion -->
      </a>
    <?php else: ?>
      <h1>Por favor Inicia Sesion o Registrate</h1><!-- Si no hemos iniciado sesion nos dara la opcion de o iniciar o registrarnos -->

      <a href="login.php">Iniciar Sesion</a> o <!-- Para iniciar sesion  -->
      <a href="signup.php">Registrarse</a> <!-- Para registrarnos -->
    <?php endif; ?>
  </body>

 
