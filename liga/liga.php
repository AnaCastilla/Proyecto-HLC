<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="liga.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
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
          <li class="nav-item">
            <a href="../index.php"><img src="../img/logout-icon.png" alt="Cerrar sesión"></a>
          </li>
        </ul>
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

          $numLigas=$database->select("liga","*");
          if ($numLigas==0) {
            echo '<h1>No existe ninguna liga</h1>';
          }
         ?>
      </div>
    </div>
  </body>
</html>
