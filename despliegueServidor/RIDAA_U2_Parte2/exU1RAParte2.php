<?php
include("functions/functionsRA.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 2</title>
</head>
<body>
    <?php
    echo "<h3>1</h3>";
    $filas = 5;
    $columnas = 4;
    $posiciones = [];
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            if (($i * $j) % 3 == 0) {
                $posiciones[$i][$j] = "múltiplo";
            } else {
                $posiciones[$i][$j] = "no";
            }
        }
    }

    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            echo $posiciones[$i][$j] . ", ";
        }
        echo "<br>";
    }

    echo "<h3>2</h3>";
    $resultado = numberAnalysis(4, -2, 7, 0, -5, 3);
    echo "<ul>";
    foreach ($resultado as $key => $value) {
        if ($key == "squares") { 
            echo "<li>$key: ";
            for ($i = 0; $i < count($value); $i++) {
                if ($i == count($value) -1) {
                    echo " " . $value[$i];
                } else {
                echo " " . $value[$i] .", ";
                }
            }
            echo "</li>";
        } else {
        echo "<li>$key: $value</li>";
        }
    }
    echo "</ul>";

    echo "<h3>3</h3>";
    echo calculate([1, 6, 8.3, 9]);
    echo "<br>";
    echo calculate([1, 6, 8.3, 9], "product");
    echo "<br>";
    echo calculate([1, 6, 8.3, 9], "product", true);
    echo "<br>";
    echo calculate([1, 6, 8.3, 9], "sum");
    ?>
</body>
</html>