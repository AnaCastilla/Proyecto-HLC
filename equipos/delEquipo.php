<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="addEquipo.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="topMenu">
      <i id="menu" class="fas fa-bars" onclick="doOnMenu()" nav-linkdisabled></i>
    </div>
    <form action='delEquipo.php' method='post'>
      <label>Nombre del equipo a borrar:</label>
      <input type="text" name="toEdit" value="">
      <br><br>
      <input type="submit" class="save" name="submit" value="Borrar">
    </form>
    <?php
      require '../Medoo.php';
      use Medoo\Medoo;

      if(isset($_POST['submit']))  {
        $eqName = $_POST["toEdit"];


        $database = new Medoo([
          'database_type' => 'mysql',
          'database_name' => 'bdliga',
          'server' => 'localhost',
          'username' => 'root',
          'password' => ''
        ]);

        $query = $database->select("equipo", ["nombre_eq" => $eqName]);
        $numFilas = count($query);

        if ($numFilas == 0) {
          echo "<h1 class='titulo'>No existe un equipo con ese nombre</h1>";
        }
        else {
          $resultado = $database->delete("equipo", ["nombre_eq" => $eqName]);
          echo "<h1 class='titulo'>EQUIPO ELIMINADO</h1>";
        }

        echo "<div class='buttons'>";
        echo "  <a href='./equipos.php'>Volver</a>";
        echo "</div>";
      }
    ?>
  </body>
</html>
