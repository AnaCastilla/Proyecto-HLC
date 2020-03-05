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

    $resultado = $database->select("liga","*");
    $numFilas = count($resultado);

    foreach($resultado as $data) {
      $liga = $data["nombre_liga"];
      $desc = $data["desc_liga"];
      $año = $data["año_liga"];

    }

    echo "<form action='editLiga.php' method='post'>";
    echo "  <div class=''>";
    echo "    <div class='row'>";
    echo "      <label for='nombLig'>Nombre de la liga:</label>";
    echo "      <input type='text' name='nombLig' value='${liga}'>";
    echo "    </div>";
    echo "    <br>";
    echo "    <div class='row'>";
    echo "      <label for='descripLiga'>Descripción:</label>";
    echo "      <textarea type='text' name='descripLiga' colums=10>${desc}</textarea>";
    echo "    </div>";
    echo "    <br>";
    echo "    <div class='row'>";
    echo "      <label for='yearLig'>Año de creación:</label>";
    echo "      <input type='number' name='yearLig' min='1900' max='2020' value='${año}'>";
    echo "    </div>";
    echo "    <br>";
    echo "    <div class='buttons'>";
    echo "      <input type='submit' name='submit' class='btn' value='Editar'>";
    echo "      <a href='./liga.php'>Volver</a>";
    echo "    </div>";
    echo "  </div>";
    echo "</form>";

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
