<?php
include("functions/shopRA.php");
include("functions/gameRA.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
    <link rel="stylesheet" href="styles/stylesRA.css">
    <link rel="stylesheet" href="styles/gameRA.css">
</head>

<body>
    <h2>Ejercicio 1</h2>
    <?php
    echo "<h3>A</h3>";
    $rows = 19 % 8 + 4;
    $columns = 1 % 6 + 5;
    echo "<code>";
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            echo "* ";
        }
        echo "<br>";
    }
    echo "</code>";

    echo "<h3>B</h3>";
    echo "<code>";
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($j < $columns) {
                echo "* ";
            }
        }
        echo "<br>";
    }
    echo "</code>";

    echo "<h3>C</h3>";
    echo "<code>";
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            if ($i == 0 || $i == $rows - 1) {
                echo "* ";
            } elseif ($j == 0 || $j == $columns - 1) {
                echo "* ";
            } else {
                echo "&nbsp&nbsp";
            }
        }
        echo "<br>";
    }
    echo "</code>";

    echo "<h3>D</h3>";
    echo "<code>";
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            if (($i + $j) % 2 == 0) {
                echo "* ";
            } else {
                echo "&nbsp&nbsp";
            }
        }
        echo "<br>";
    }
    echo "</code>";

    ?>

    <h2>Ejercicio 2</h2>
    <?php

    $temps = [
        "Ciudad 1" => [rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45)],
        "Ciudad 2" => [rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45)],
        "Ciudad 3" => [rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45)],
        "Ciudad 4" => [rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45)],
        "Ciudad 5" => [rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45)],
        "Ciudad 6" => [rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45), rand(-10, 45)],
    ];

    var_dump($temps);


    $max = $temps["Ciudad 1"][0];
    $maxCity = "Ciudad 1";
    $maxDay = 1;
    foreach ($temps as $city => $temp) {
        foreach ($temp as $day => $t) {
            if ($t > $max) {
                $max = $t;
                $maxCity = $city;
                $maxDay = $day + 1;
            }
        }
    }
    echo "<br>";


    $min = $temps["Ciudad 1"][0];
    $minCity = "Ciudad 1";
    $minDay = 1;
    foreach ($temps as $city => $temp) {
        foreach ($temp as $day => $t) {
            if ($t < $min) {
                $min = $t;
                $minCity = $city;
                $minDay = $day + 1;
            }
        }
    }
    echo "<br>";



    $mayorVariacion = 0;
    for ($i = 0; $i < count($temp); $i++) {
        $maxDia = $temp[0];
        $minDia = $temp[0];
        foreach ($temps as $city => $temp) {
            if ($temp[$i] > $maxDia) {
                $maxDia = $temp[$i];
            }
            if ($temp[$i] < $minDia) {
                $minDia = $temp[$i];
            }
        }
        if ($maxDia - $minDia > $mayorVariacion) {
            $mayorVariacion = $maxDia - $minDia;
            $diaMV = $i + 1;
        }
    }

    echo "<br>";
    var_dump($mayorVariacion);
    echo "<div class=\"tabla\">";
    echo "<h2 id=\"tableHeader\">Temperaturas de ciudades por día (ºC)</h2>";
    echo "<table>
        <tr class=\"headers\"><th>Ciudad/Día</th><th>Día 1</th><th>Día 2</th><th>Día 3</th><th>Día 4</th><th>Día 5</th><th class=\"weekends\">Día 6</th><th>Media</th></tr>
    ";
    $maxAvg = -INF;
    $cityM;
    foreach ($temps as $ciudad => $temp) {
        $sum = 0;
        for ($i = 0; $i < count($temp); $i++) {
            $sum += $temp[$i];
        }
        $avg = $sum / count($temp);
        if ($avg > $maxAvg) {
            $maxAvg = $avg;
            $cityM = $ciudad;
        }
    }

    foreach ($temps as $ciudad => $temp) {

        echo "<tr>";
        echo "<td class=\"cities\">$ciudad</td>";
        $sum = 0; {
            for ($i = 0; $i < count($temp); $i++) {
                $sum += $temp[$i];
            }
            $avg = round($sum / count($temp), 1);
            if ($avg > $maxAvg) {
                $maxAvg = $avg;
                $cityM = $ciudad;
            }

            if ($ciudad === $cityM) {
                for ($i = 0; $i < count($temp); $i++) {
                    if ($i === 5) {
                        if ($temp[$i] == $max) {
                            echo "<td class=\"weekends higheravg highest\">$temp[$i]º</td>";
                        } elseif ($temp[$i] == $min) {
                            echo "<td class=\"weekends higheravg lowest\">$temp[$i]º</td>";
                        } elseif ($temp[$i] > 35) {
                            echo "<td class=\"weekends red higheravg\">$temp[$i]º</td>";
                        } elseif ($temp[$i] < 0) {
                            echo "<td class=\"weekends higheravg\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"weekends higheravg\">$temp[$i]º</td>";
                        }
                    } else {
                        if ($temp[$i] == $max) {
                            echo "<td class=\"highest\">$temp[$i]º</td>";
                        } elseif ($temp[$i] == $min) {
                            echo "<td class=\"higheravg lowest\">$temp[$i]º</td>";
                        } elseif ($temp[$i] > 35) {
                            echo "<td class=\"red higheravg\">$temp[$i]º</td>";
                        } elseif ($temp[$i] < 0) {
                            echo "<td class=\"blue higheravg\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"higheravg\">$temp[$i]º</td>";
                        }
                    }
                }
            } else {
                for ($i = 0; $i < count($temp); $i++) {
                    if ($i === 5) {
                        if ($temp[$i] == $max) {
                            echo "<td class=\"weekends highest\">$temp[$i]º</td>";
                        } elseif ($temp[$i] == $min) {
                            echo "<td class=\"weekends lowest\">$temp[$i]º</td>";
                        } elseif ($temp[$i] > 35) {
                            echo "<td class=\"weekends red\">$temp[$i]º</td>";
                        } elseif ($temp[$i] < 0) {
                            echo "<td class=\"weekends blue\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"weekends\">$temp[$i]º</td>";
                        }
                    } else {
                        if ($temp[$i] == $max) {
                            echo "<td class=\"highest\">$temp[$i]º</td>";
                        } elseif ($temp[$i] == $min) {
                            echo "<td class=\"lowest\">$temp[$i]º</td>";
                        } elseif ($temp[$i] > 35) {
                            echo "<td class=\"red\">$temp[$i]º</td>";
                        } elseif ($temp[$i] < 0) {
                            echo "<td class=\"blue\">$temp[$i]º</td>";
                        } else {
                            echo "<td>$temp[$i]º</td>";
                        }
                    }
                }
            }

            echo "<td class=\"averageValues\">" . $avg . "º</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";

    echo "<div class=\"info\">";
    echo "<span class=\"estadisticas\">Estadísticas</span>";
    echo "<hr class=\"infohr\">";
    echo "<p><span>Temperatura mínima:</span> " . $min . "ºC (Día $minDay, $minCity)</p>";
    echo "<hr class=\"dashed\">";
    echo "<p><span>Temperatura máxima:</span> " . $max . "ºC (Día $maxDay, $maxCity)</p>";
    echo "<hr class=\"dashed\">";
    echo "<p><span>Día con mayor variación:</span> Día $diaMV (" . $mayorVariacion . "ºC de diferencia)</p>";
    echo "</div>";

    ?>

    <h2>Ejercicio 3</h2>
    <?php



    ?>
    <h2>Ejercicio 4</h2>
    <?php

    echo "<table>";
    echo "<tr><th>Nombre</th><th>Precio con IVA</th><th>Stock</th></tr>";
    foreach ($productos as $producto => $valor) {
        echo "<tr>";
        echo "<td>" . ucwords($valor["nombre"]) . "</td>";
        echo "<td>" . formatPrice(calculateIVA($valor["precio"])) . "</td>";
        if ($valor["stock"] == 0) {
            echo "<td class=\"red\">" . $valor["stock"] . "</td>";
        } elseif ($valor["stock"] > 10) {
            echo "<td class=\"green\">" . $valor["stock"] . "</td>";
        } else {
            echo "<td class=\"yellow\">" . $valor["stock"] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";


    ?>

    <h2>Ejercicio 4.1</h2>
    <?php

    echo "<table>";
    echo "<tr><th>Nombre</th><th>Precio con IVA</th><th>Descuento</th><th>Stock</th></tr>";
    foreach ($productosConDescuento as $producto => $valor) {
        echo "<tr>";
        echo "<td>" . ucwords($valor["nombre"]) . "</td>";
        if (isset($valor["descuento"])) {
            echo "<td class=\"tachado\">" . formatPrice(calculateIVA($valor["precio"])) . "</td>";
            echo "<td>" . formatPrice($valor["descuento"]) . "</td>";
        } else {
            echo "<td>" . formatPrice(calculateIVA($valor["precio"])) . "</td>";
            echo "<td>No hay descuento :(</td>";
        }
        if ($valor["stock"] == 0) {
            echo "<td class=\"red\">" . $valor["stock"] . "</td>";
        } elseif ($valor["stock"] > 10) {
            echo "<td class=\"green\">" . $valor["stock"] . "</td>";
        } else {
            echo "<td class=\"yellow\">" . $valor["stock"] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";


    ?>

    <h2>Ejercicio 5</h2>

    <?php
    
    echo "<table class=\"punt\">";

    echo "<tr><th>Usuario</th><th>Nombre</th><th>Edad</th><th>Nivel</th><th>Número de partidas</th><th>Máxima puntuacion</th></tr>";
    $partidas = partidas($jugadores);
    $maximos = maxPuntuacion($jugadores);
    foreach ($jugadores as $clave => $jugador) {
        echo "<tr>";
        if ($jugador["activo"]) {
        echo "<td class=\"activo\">". $clave . "</td>";
        } else {
            echo "<td>". $clave . "</td>";
        }
        echo "<td>". $jugador["nombre"] . "</td>";
        echo "<td>". $jugador["edad"] . "</td>";
        echo "<td>". nivel(promedio($clave, $jugadores)) . "</td>";
        echo "<td>". $partidas[$clave] . "</td>";
        echo "<td>". $maximos[$clave] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>