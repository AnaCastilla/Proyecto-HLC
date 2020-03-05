<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="addLiga.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="topMenu">
      <i id="menu" class="fas fa-bars" onclick="doOnMenu()" nav-linkdisabled></i>
    </div>
    <form action="editLiga.php" method="post">
      <div class="">
        <div class="row">
          <label for="nombLig">Nombre de la liga:</label>
          <input type="text" name="nombLig" value="">
        </div>
        <br>
        <div class="row">
          <label for="descripLiga">Descripción:</label>
          <textarea type="text" name="descripLiga" value="" colums=10></textarea>
        </div>
        <br>
        <div class="row">
          <label for="yearLig">Año de creación:</label>
          <input type="number" name="yearLig" value="" min="1900" max="2020">
        </div>
        <br>
        <div class="buttons">
          <input type="submit" name="submit" class="btn" value="Editar">
          <a href="./liga.php">Volver</a>
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
   $nombre=$_POST['nombLig'];
   $descrip=$_POST['descripLiga'];
   $creacion=$_POST['yearLig'];

   if (empty($nombre) or empty($descrip) or empty($creacion)) {
     echo '<p class="error">Error, todos los campos tienen que estar rellenos para crear la liga</p>';
   } else {
     $resultado = $database->update("liga", ["nombre_liga" => $nombre],
                                            ["desc_liga" => $descrip],
                                            ["año_liga" => $creacion]);
      header("Location: liga.php");
   }


 }

 ?>
