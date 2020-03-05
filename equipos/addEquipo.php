<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="addEquipo.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="topMenu">
      <i id="menu" class="fas fa-bars" onclick="doOnMenu()" nav-linkdisabled></i>
    </div>
    <form action="addEquipo.php" method="post">
      <div class="">
        <br>
        <div class="row">
          <label for="nombEq">Nombre de equipo:</label>
          <input type="text" name="nombEq" value="">
        </div>
        <br>
        <div class="row">
          <label for="cityEq">Ciudad del equipo:</label>
          <input type="text" name="cityEq" value="">
        </div>
        <br>
        <div class="row">
          <label for="yearEq">Año de creacion del equipo:</label>
          <input type="number" name="yearEq" value="" min="1900" max="2020">
        </div>
        <br>
        <div class="buttons">
          <input type="submit" name="submit" class="btn" value="Crear">
          <a href="./equipos.php">Volver</a>
        </div>
      </div>
    </form>
  </body>
</html>

<?php
require '../Medoo.php';
use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'bdliga',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

if(isset($_POST['submit'])) {
  $nom=$_POST['nombEq'];
  $city=$_POST['cityEq'];
  $creacion=$_POST['yearEq'];

  $query = $database->select("equipo","*");
  $numFilas = count($query);

  if (empty($nom) or empty($city) or empty($creacion)) {
    echo '<p class="error">Error, todos los campos tienen que estar rellenos para crear el equipo</p>';
  } else {
    $resultado = $database->insert("equipo", ["cod_eq" => $numFilas+1,
                                            "nombre_eq" => $nom,
                                            "ciudad_eq" => $city,
                                            "año_eq" => $creacion,
                                            "cod_liga" => 1]);
     header("Location: equipos.php");
  }


}
 ?>
