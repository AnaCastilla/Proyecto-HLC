<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="resultados.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/113416730f.js" crossorigin="anonymous"></script>
    <script>
      x = new Boolean(true);
      function mostrar() {
          document.getElementById("sidebar").style.animation = "slidein 1s forwards";
          document.getElementById("menu").style.animation = "rotateOpenMenu 1s forwards, colorChange 1s forwards";
          x = false;
      }
      function ocultar() {
          document.getElementById("sidebar").style.animation = "slideout 1s forwards";
          document.getElementById("menu").style.animation = "rotateCloseMenu 1s forwards, reverseColorChange 1s forwards";
          x = true;
      }
      function doOnMenu() {
        if (x) {
          mostrar();
        }
        else {
          ocultar();
        }
      }
    </script>
    <title></title>
  </head>
  <body>
    <div class="topMenu">
      <i id="menu" class="fas fa-bars" onclick="doOnMenu()"></i>
      <a href="../main/main.php" class="aHome"><i class="fas fa-home home"></i></a>
    </div>
    <div class="body">
      <div id="sidebar" class="sideMenu">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../liga/liga.php">Liga</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../equipos/equipos.php">Equipos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../resultados/resultados.php">Resultado</a>
          </li>
        </ul>
        <a href="../index.php" class="logOut"><img src="../img/logout-icon.png" alt="Cerrar sesión"></a>
      </div>
      <div class="content">
        <?php

          $conexion = mysqli_connect("localhost", "root", "", "bdliga");

          require '../Medoo.php';
          use Medoo\Medoo;

          $database = new Medoo([
              'database_type' => 'mysql',
              'database_name' => 'bdliga',
              'server' => 'localhost',
              'username' => 'root',
              'password' => ''
          ]);

          $resultado = $database->select("jorn_resul","*");
          $numFilas = count($resultado);
          if ($numFilas == 0) {
            echo '<h2 class="zeroMensaje">No existe ningún resultado<h2>';
            echo '<h3 class="zeroMensaje">Para crearlo, pincha en el icono de abajo a la derecha</h3>';
          } else {
            echo "<center><h2 class='titulo'><b>RESULTADOS</b></h2></center>";
            echo "<center>";
            echo "<table width='700' border='0'>";
            echo "<tr bordercolor='#4F85B7' bgcolor='#4F85B7'>";
            echo "<th align='center'>Equipo 1</th>";
            echo "<th align='center'>Puntos Equipo 1</th>";
            echo "<th align='center'>VS</th>";
            echo "<th align='center'>Puntos Equipo 2</th>";
            echo "<th align='center'>Equipo 2</th>";

            foreach($resultado as $data) {
              echo "<tr class='fondo_res'>";
              echo "<td align='center'>", $data["cod_eq1"],"</td>";
              echo "<td align='center'>", $data["puntos_eq1"],"</td>";
              echo "<td align='center'>","VS","</td>";
              echo "<td align='center'>", $data["puntos_eq2"],"</td>";
              echo "<td align='center'>", $data["cod_eq2"],"</td>";
              echo "</tr>";
            }

            echo "</table></center>";
          }
         ?>
         <a href="./addResultados.php" class="addButton"><img src="../img/add-icon.png" alt="Añadir Equipo" class="img-rounded center-block"></a>
      </div>
    </div>
  </body>
</html>
