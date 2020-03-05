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
          require '../Medoo.php';
          use Medoo\Medoo;

          $database = new Medoo([
              'database_type' => 'mysql',
              'database_name' => 'bdliga',
              'server' => 'localhost',
              'username' => 'root',
              'password' => ''
          ]);

          $resultado = $database->select("resultado","*");
          $numFilas = count($resultado);
          if ($numFilas == 0) {
            echo '<p class="error">No existe ningún resultado<p>';
            echo '<p class="mensaje">Para crear un resultado, pincha en el icono de abajo a la derecha</p>';
          } else {
            $cod1=$database->select("jorn_resul","cod_eq1");
            $cod2=$database->select("jorn_resul","cod_eq2");
            $pts1=$database->select("jorn_resul","puntos_eq1");
            $pts2=$database->select("jorn_resul","puntos_eq2");
            $jorn=$database->select("jorn_resul","jornada");

            echo "<center><h2 class='titulo'><b>RESULTADOS</b></h2></center>";
            echo "<center>";
            echo "<table width='700' border='0'>";
            echo "<tr bordercolor='#4F85B7' bgcolor='#4F85B7'>";
            echo "<td align='center'><b>Equipo 1</b></td>";
            echo "<td align='center'><b>Equipo 2</b></td>";
            echo "<td align='center'><b>Puntos Equipo 1</b></td>";
            echo "<td align='center'><b>Puntos Equipo 2</b></td>";
            echo "<td align='center'><b>Jornada</b></td></tr>";



            echo "<tr class='fondo_res'>";
            echo "<td align='center'>",implode($cod1),"</td>";
            echo "<td align='center'>",implode($cod2),"</td>";
            echo "<td align='center'>",implode($pts1),"</td>";
            echo "<td align='center'>",implode($pts2),"</td>";
            echo "<td align='center'>",implode($jorn),"</td>";
            echo "<td align='center'><a href='editResultados.php'>Edit</a></td>";
            echo "<td align='center'><a href='editResultados.php'>Borrar</a></td>";
            echo "</tr>";


            echo "</table></center>";
          }
         ?>
         <a href="./addResultados.php" class="addButton"><img src="../img/add-icon.png" alt="Añadir Equipo" class="img-rounded center-block"></a>
      </div>
    </div>
  </body>
</html>
