<?php
/* creacion de las siguientes variables para poder conectarnos a la base de datos */
$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'php_login_database';

try {/* con el try nos conectaremos a la base de datos con las variables anteriores */
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());/* De no haber conexion, mandara un mensaje de error */
}

?>
