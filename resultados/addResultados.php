<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="addResultados.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="topMenu">
      <i id="menu" class="fas fa-bars" onclick="doOnMenu()" nav-linkdisabled></i>
    </div>
    <form>
      <div class="">
        <div class="row">
          <label for="codEq">Código del equipo 1:</label>
          <input type="number" name="cod1" value="" min="0" max="200">
        </div>
        <br>
        <div class="row">
          <label for="vict">Código del equipo 2:</label>
          <input type="number" name="cod2" value="" min="0" max="200">
        </div>
        <br>
        <div class="row">
          <label for="cityEq">Puntos del equipo 1:</label>
          <input type="number" name="ptos1" value="" min="0" max="300">
        </div>
        <br>
        <div class="row">
          <label for="yearEq">Puntos del equipo 2:</label>
          <input type="number" name="ptos2" value="" min="0" max="300">
        </div>
        <br>
        <div class="row">
          <label for="jornada">Jornada:</label>
          <input type="date" name="jornada" value="">
        </div>
        <br>
        <div class="buttons">
          <input type="submit" name="submit" class="btn" value="Crear">
          <a href="./resultados.php">Volver</a>
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
   $cod1=$_POST['cod1'];
   $cod2=$_POST['cod2'];
   $pts1=$_POST['ptos1'];
   $pts2=$_POST['ptos2'];
   $jorn=$_POST['jornada'];


   if (empty($cod1) or empty($cod2) or empty($pts1) or empty($pts2) or empty($jorn)) {
     echo '<p class="error">Error, todos los campos tienen que estar rellenos para crear el resultado</p>';
   } else {
     $existe1=$database->select("equipo","*",["cod_eq[=]" => $cod1]);
     $existe2=$database->select("equipo","*",["cod_eq[=]" => $cod2]);

     if ($cod1==$cod2) {
      echo '<p class="error">Los equipos no pueden ser iguales</p>';
    } elseif (count($existe1)==0) {
      echo '<p class="error">No existe el equipo 1</p>';
    } elseif (count($existe2)==0) {
      echo '<p class="error">No existe el equipo 1</p>';
    } elseif (count($existe1)==0 and count($existe2)==0) {
      echo '<p class="error">No existen ninguno de los dos equipos introducidos</p>';
    } else {
      $resultado = $database->insert("jorn_resul", ["cod_eq1" => $cod1,
                                              "cod_eq2" => $cod2,
                                              "puntos_eq1" => $pts1,
                                              "puntos_eq2" => $pts2,
                                              "jornada" => $jorn]);
       header("Location: resultados.php");
    }

   }


 }

 ?>
