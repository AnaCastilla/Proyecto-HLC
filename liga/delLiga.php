<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="addLiga.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="topMenu">
      <i id="menu" class="fas fa-bars" onclick="doOnMenu()" nav-linkdisabled></i>
    </div>
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

    $resultado = $database->delete("liga", ["cod_liga" => 1]);

    echo "<h1 class='titulo'>LIGA ELIMINADA</h1>";

    ?>
    <div class="buttons">
      <a href='./liga.php'>Volver</a>
    </div>
  </body>
</html>
