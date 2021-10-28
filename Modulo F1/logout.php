<?php
  session_start();

  session_unset();

  session_destroy();/* al requerir el archivo logout prodremos cerrar nuestra sesion */

  header('Location: /Modulo F1');/* y nos mandara a la pagina principal de cuenta */
?>
