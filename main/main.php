<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
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
        <h1 class="titulo">¡BIENVENID@!</h1>
        <img class="gif" src="../img/ball-gif.gif">
        <div class="information">
          <p>Gracias por elegir nuestro gestor de ligas de baloncesto!! Como no queremos que te pierdas, antes de empezar leete esta guia super rapida del funcionamiento de la aplicacion:</p>
          <br>
          <p>Te pondremos como ejemplo la pestaña de "Liga" a la que podras acceder desde el menu desplegable situado a la izquierda de tu pantalla</p>
          <div class="liga">
            <img src="../img/liga2.PNG" alt="imgLiga">
          </div>
          <p>Como veras, lo primero que te encontraras es una ventana con un texto que te informa de que no existe ninguna liga creada y que tendras que pinchar en el icono de la cruceta situado en la esquina inferior derecha de la pantalla</p>
          <div class="liga2">
            <img src="../img/liga3.PNG" alt="imgLiga">
          </div>
          <br><br><br><br>
          <p>Al pulsar en este icono, lo que te encontraras no es mas que un sencillo y normal formulario, en el que deberas rellenar los datos de la liga que deseas crear. ¿Sencillo verdad?</p>
          <br><br><br><br><br>
          <p>Finalmente, una vez hallas creado tu liga, se te redirigirá automaticamente a la pantalla anterior, en la que podras ver reflejados en una tabla los mismos. Ahora, se te ha deshabilitado el boton de crear liga, ya que solo podras tener una, y se te han habilitado dos botones nuevos. Uno para editar(El cual te mandará a un formulario con los datos rellenos, para que los modifiques) y el boton de eliminar, que simplemente, eliminará la liga.</p>
          <div class="liga3">
            <img src="../img/liga.PNG" alt="imgLiga">
          </div>
          <p>Y eso es todo, espero que disfrutes de nuestra herramienta, ¡un saludo!</p>
        </div>
      </div>
    </div>
  </body>
</html>
