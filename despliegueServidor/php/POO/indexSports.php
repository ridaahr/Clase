<?php
//phpinfo();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportes</title>
</head>
<body>
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/sports/Rugbaaay.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/sports/Tennis.php";
    //No se puede porque Sport es abstracta
    $r1 = new Rugby("Los Pumas", "equipo", true, 15);
    $r1->addPlayers(2);
    echo "<p>$r1</p>";

    $s1 = new Tennis("Tierra", ["Wilson", "Sonwil"], "Individual", false, 4);
    echo "<p>$s1</p>";
    ?>
</body>
</html>