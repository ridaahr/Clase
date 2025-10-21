<?php
include "funcionesrepaso.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repaso</title>
</head>
<body>
    <?php
    $prueba = multiplos(19, -100);
    var_dump($prueba);
    echo "<br>";
    $analiza = analiza("hola", "p", "k", "s", "z");
    var_dump($analiza);
    echo "<br>";
    $analiza2 = analiza2("hola", "h");
    var_dump($analiza2);
    ?>
</body>
</html>