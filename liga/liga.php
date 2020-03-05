<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="liga.css">
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

          $resultado=$database->select("liga","*");
          $numFilas=count($resultado);
          if ($numFilas==0) {
            echo '<p class="error">No existe ninguna liga<p>';
            echo '<p class="mensaje">Para crear una liga, pincha en el icono de abajo a la derecha</p>';
            echo '<a href="./addLiga.php" class="addButton"><img src="../img/add-icon.png" alt="Añadir Equipo" class="img-rounded center-block"></a>';
          } else {
            $nom=$database->select("liga","nombre_liga");
            $desc=$database->select("liga","desc_liga");
            $año=$database->select("liga","año_liga");
            echo "<center><h2 class='titulo'><b>LIGAS</b></h2></center>";
            echo "<center>";
            echo "<table width='700' border='0'>";
            echo "<tr bordercolor='#4F85B7' bgcolor='#4F85B7'>";
            echo "<td align='center'><b>Nombre</b></td>";
            echo "<td align='center'><b>Descripción</b></td>";
            echo "<td align='center'><b>Año de creación</b></td></tr>";



            echo "<tr class='fondo_res'>";
            echo "<td align='center'>",implode($nom),"</td>";
            echo "<td align='center'>",implode($desc),"</td>";
            echo "<td align='center'>",implode($año),"</td>";
            echo "<td align='center'><a href='editLiga.php'>Edit</a></td>";
            echo "<td align='center'><a href='editLiga.php'>Borrar</a></td>";
            echo "</tr>";


            echo "</table></center>";
          }
         ?>

      </div>
      </div>
    </div>
  </body>
</html>
