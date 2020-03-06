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
    <form action='editEquipo.php' method='post'>
      <label>Nombre del equipo a editar:</label>
      <input type="text" name="toEdit" value="">
      <br><br>
      <input type="submit" class="save" name="submit" value="Buscar">
    </form>
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

    if(isset($_POST['submit']))  {
      $eqName = $_POST["toEdit"];

      $resultado = $database->select("equipo","*",["nombre_eq" => [$eqName]]);
      $numFilas = count($resultado);

      if ($numFilas == 0) {
        echo "<h1>No existen equipos con ese nombre</h1>";
      }
      else {
        foreach($resultado as $data) {
          $nombreEq = $data["nombre_eq"];
          $city = $data["ciudad_eq"];
          $año = $data["año_eq"];

        }

        echo "<form action='editEquipo.php' method='post'>";
        echo "  <div class=''>";
        echo "    <div class='row'>";
        echo "      <label for='nombLig'>Nombre del equipo:</label>";
        echo "      <input type='text' name='nombEq' value='${nombreEq}'>";
        echo "    </div>";
        echo "    <br>";
        echo "    <div class='row'>";
        echo "      <label for='descripLiga'>Ciudad:</label>";
        echo "      <input type='text' name='cityEq' value='${city}'>";
        echo "    </div>";
        echo "    <br>";
        echo "    <div class='row'>";
        echo "      <label for='yearLig'>Año de creación:</label>";
        echo "      <input type='number' name='yearEq' min='1900' max='2020' value='${año}'>";
        echo "    </div>";
        echo "    <br>";
        echo "    <div class='buttons'>";
        echo "      <input type='submit' name='submit2' class='btn' value='Editar'>";
        echo "      <a href='./equipos.php'>Volver</a>";
        echo "    </div>";
        echo "  </div>";
        echo "</form>";
      }
    }
        ?>
  </body>
</html>

<?php
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'bdliga',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

 if(isset($_POST['submit2'])) {
   $nom = $_POST['nombEq'];
   $city = $_POST['cityEq'];
   $creacion = $_POST['yearEq'];

   if (empty($nom) or empty($city) or empty($creacion)) {
     echo '<p class="error">Error, todos los campos tienen que estar rellenos para crear el equipo</p>';
   } else {
     $resultado = $database->update("equipo",["nombre_eq" => $nom],
                                             ["ciudad_eq" => $city],
                                             ["año_eq" => $creacion]);
      header("Location: equipos.php");
   }
 }
 ?>
