<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="index.css">
    <title>Inicio de sesión</title>
  </head>
  <body>
    <form class="formulario"  action="index.php" method="post">
      <h3>Liga de Baloncesto</h3>
      <div class="user">
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario">
      </div>
      <br>
      <div class="pass">
        <label for="password">Contraseña: </label>
        <input type="password" name="password">
      </div>
      </br>
      <button type="submit" name="enviar">Entrar</button>
    </form>
  </body>
</html>
<?php
  if(isset($_POST['enviar'])) {
    $user=$_POST['usuario'];
    $pass=$_POST['password'];

    if (($user == "" || $pass == "") || ($user != "admin" || $pass != "admin")) {
      echo '<h1>Error en el usuario o la contraseña</h1>';
    } else if ($user == "admin" && $pass == "admin") {
      echo 'Iniciando sesión';
    }
  }
?>
