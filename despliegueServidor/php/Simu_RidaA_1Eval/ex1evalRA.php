<?php
include("funcionesRA.php");
include("alumnado.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacro</title>
</head>

<body>
    <h3>Ejercicio 1</h3>
    <?php
    $array = [];
    for ($i = 1; $i < 4; $i++) { 
        for ($j = 1; $j < 6; $j++) {
            $array[$i][$j] = $j * $i;
            echo $j * $i . " ";
        }
        echo "<br>";
    }

    var_dump($array);

    ?>
    <h3>Ejercicio 2</h3>
    <?php

    $array2 = [];
    echo "<table>";
    for ($i = 0; $i < 4; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 4; $j++) {
            echo "<td>";
            if ($i == $j) {
                $array2[$i][$j] = "si";
                echo "si";
            } else {
                $array2[$i][$j] = "no";
                echo "no";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    var_dump($array2);
    ?>
    <h3>Ejercicio 3</h3>
    <?php

    $promedio = promedio(5, 6, 7);
    echo $promedio;

    echo "<br>";

    $promedio2 = promedio();
    var_dump($promedio2);
    ?>
    <h3>Ejercicio 4</h3>
    <?php

    $first = potencia(4, 3);
    echo $first;
    echo "<br>";
    $second = potencia(4);
    echo $second;
    echo "<br>";
    $third = potencia(2, 8);
    echo $third;
    echo "<br>";
    ?>
    <h3>Ejercicio 5</h3>
    <?php

    $personas = [
        41 => "Juan",
        21 => "Ahmed",
        14 => "Blanca"
    ];


    asort($personas);

    var_dump($personas);

    echo "<ul>";
    foreach ($personas as $key => $person) {
        echo "<li>$person tiene el id $key</li>";
    }

    echo "</ul>";

    ?>
    <h3>Ejercicio 6</h3>
    <?php


    //a
    echo "<p>" . $alumnado["2345X"]["edad"] . "</p>";

    //b
    echo "<ol>";
    foreach ($alumnado as $key => $alumn) {
        if ($alumnado[$key]["matricula"] == true) {
            echo "<li>" . $alumnado[$key]["name"] . " sí tiene matrícula </li>";
        } else {
            echo "<li>" . $alumnado[$key]["name"] . " no tiene matrícula </li>";
        }
    }
    echo "</ol>";


    //c
    echo "<ul>";
    foreach ($alumnado as $key => $alumn) {
        if ($alumnado[$key]["edad"] >= 18) {
            echo "<li>" . $alumnado[$key]["name"] . " tiene " . $alumnado[$key]["edad"] . " años y su DNI es " . $key . "</li>";
        }
    }
    echo "</ul>";
    ?>
</body>

</html>