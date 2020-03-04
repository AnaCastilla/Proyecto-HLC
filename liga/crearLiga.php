<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="liga.css">
    <body>
      <form class="formulario" action="proceso.php" method="post">
        <div class="divForm">
          <h3>Creación de Liga de Baloncesto</h3>
          <p>Nombre de la liga: <input type="text" name="nombre"></p>
        </br>
        </br>
          <p>Descripción: <textarea type="text" name="descripcion" rows="5" columns="10"></textarea></p>
        </br>
        </br>
          <p>Año de creación: <input type="number" name="creacion"></p>
        </br>
        </br>
          <button type="submit" name="crear">Crear liga</button><button type="submit" name="volver">Volver atrás</button>
        </div>
      </form>

    </body>
</html>

<?php
if(isset($_POST['volver'])) {
  header('Location: liga.php');
}
?>
