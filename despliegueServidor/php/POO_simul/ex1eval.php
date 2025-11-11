<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vivero</title>
</head>
<body>
    <h2>Ejercicio 2</h2>
    <?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO_simul/clases/Arbol.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO_simul/clases/Flor.php";

    $flor = new Flor("enero", "Rosa", 22.8);
    $arbol1 = new Arbol(true, "Pino", 120);
    $arbol2 = new Arbol(false, "Roble", 250);
    $flor->crecer(1.3);
    $imprimir = [$flor, $arbol1, $arbol2];
    echo "<ul>";
    foreach ($imprimir as $objeto) {
        echo "<li>$objeto</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>