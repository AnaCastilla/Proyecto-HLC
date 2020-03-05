<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="addResultados.css">
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
          <label for="codEq">Código del equipo 1:</label>
          <input type="number" name="cod1" value="" min="0" max="200">
        </div>
        <br>
        <div class="row">
          <label for="vict">Código del equipo 2:</label>
          <input type="number" name="cod2" value="" min="0" max="200">
        </div>
        <br>
        <div class="row">
          <label for="cityEq">Puntos del equipo 1:</label>
          <input type="number" name="ptos1" value="" min="0" max="200">
        </div>
        <br>
        <div class="row">
          <label for="yearEq">Puntos del equipo 2:</label>
          <input type="number" name="ptos2" value="" min="0" max="200">
        </div>
        <br>
        <div class="row">
          <label for="yearEq">Jornada:</label>
          <input type="date" name="ptos2" value="">
        </div>
        <br>
        <div class="buttons">
          <input type="submit" name="submit" class="btn" value="Editar">
          <a href="./resultados.php">Volver</a>
        </div>
      </div>
    </form>
  </body>
</html>
