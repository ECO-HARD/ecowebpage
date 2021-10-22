<!-- Esta pagina es para conectarse a la base de datos -->
<?php
include('db.php');
$usuario=$_POST['usuario']; /* se conecta por medio de usuario y contraseña */
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost:3306","root","","loggin");/* Se conecta a una base de datos, como es prueba se conecta a la base del xampp */

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">Su contrasena es incorrecta</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
-