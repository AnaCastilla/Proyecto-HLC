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

        //Para la consulta de buscar al equipo en la tabla con sql necesito este tipo de conexion
        $conexion = mysqli_connect("localhost", "root", "", "bdliga");

        //Para medoo
        $database = new Medoo([
          'database_type' => 'mysql',
          'database_name' => 'bdliga',
          'server' => 'localhost',
          'username' => 'root',
          'password' => ''
        ]);

        //Busco si el equipo exite en la tabla
        $consulta = mysqli_query($conexion, "SELECT * FROM equipo WHERE nombre_eq LIKE '$eqName'");
        $results = mysqli_num_rows ($consulta);

        if ($results == 0) {
          echo "<h1 class='titulo'>No existe un equipo con ese nombre</h1>";
        }
        else {
          //Cojo el codigo del equipo a eliminar
          $toUpdate = mysqli_query($conexion, "SELECT cod_eq FROM equipo WHERE nombre_eq LIKE '$eqName'");
          while ($fila = mysqli_fetch_array($toUpdate)) {
            //Guardo ese numero en una variable
            $codEqDeleted = $fila['cod_eq'];
          }
          //Elimino al equipo
          $resultado = $database->delete("equipo", ["nombre_eq" => $eqName]);
          //Todos los equipos con codigos posteriores al del eliminado, se restan en 1
          $update = mysqli_query($conexion, "UPDATE equipo SET cod_eq = (cod_eq - 1) WHERE cod_eq > $codEqDeleted");
          echo "<h1 class='titulo'>EQUIPO ELIMINADO</h1>";
        }
      }
    ?>
    <div class='buttons'>
      <a href='./equipos.php'>Volver</a>
    </div>
  </body>
</html>
