<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="addEquipos.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="topMenu">
      <i id="menu" class="fas fa-bars" onclick="doOnMenu()" nav-linkdisabled></i>
    </div>
    <form>
      <div class="">
        <div class="row">
          <label for="nombEq">Nombre de equipo:</label>
          <input type="text" name="nombEq" value="">
        </div>
        <br>
        <div class="row">
          <label for="cityEq">Ciudad del equipo:</label>
          <input type="text" name="cityEq" value="">
        </div>
        <br>
        <div class="row">
          <label for="yearEq">Año de creacion del equipo:</label>
          <input type="number" name="yearEq" value="" min="1900" max="2020">
        </div>
        <br>
        <div class="buttons">
          <input type="submit" name="submit" class="btn" value="Crear">
          <a href="./equipos.php">Volver</a>
        </div>
      </div>
    </form>
  </body>
</html>
