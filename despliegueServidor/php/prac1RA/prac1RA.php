<?php
include("functions/shopRA.php");
include("functions/gameRA.php");
include("functions/functionsRA.php");
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

    //saco el máximo, la ciudad de ese máximo y el día
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

    //lo mismo con el min
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


    /*para sacar la variación, recorro primero las temperaturas de los 
    de todas las ciudades, es decir, al revés que para sacar la media 
    que obtendre mas adelante. Y por cada dia tengo que reiniciar los 
    valores de max y min para que no se me guarden los de dias anteriores
    */
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

    /*Primero saco la media maxima, para luego pintar la ciudad con mas media
    en función de esta media max*/
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

    //ahora recorro cada ciudad y comparo su media con la media max
    //y si coincide pues me guardo la ciudad
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


            //ya aqui es aplicar estilos segun lo que necesitamos
            //aqui pues primero empiezo por el de media maxima
            for ($i = 0; $i < count($temp); $i++) {
                if ($ciudad === $cityM) {
                    if ($temp[$i] == $min) {
                        if ($temp[$i] < 0) {
                            echo "<td class=\"higheravg lowest blue\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"higheravg lowest\">$temp[$i]º</td>";
                        }
                    } elseif ($temp[$i] == $max) {
                        if ($temp[$i] > 35) {
                            echo "<td class=\"higheravg highest red\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"higheravg highest\">$temp[$i]º</td>";
                        }
                    } elseif ($temp[$i] < 0) {
                        echo "<td class=\"higheravg blue\">$temp[$i]º</td>";
                    } elseif ($temp[$i] > 35) {
                        echo "<td class=\"red higheravg\">$temp[$i]º</td>";
                    } else {
                        echo "<td class=\"higheravg\">$temp[$i]º</td>";
                    }
                    //este es para pintar los fines de semana
                } elseif ($i === 5) {
                    if ($temp[$i] == $min) {
                        if ($temp[$i] < 0) {
                            echo "<td class=\"weekends lowest blue\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"weekends lowest\">$temp[$i]º</td>";
                        }
                    } elseif ($temp[$i] == $max) {
                        if ($temp[$i] > 35) {
                            echo "<td class=\"weekends highest red\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"weekends highest\">$temp[$i]º</td>";
                        }
                    } elseif ($temp[$i] < 0) {
                        echo "<td class=\"weekends blue\">$temp[$i]º</td>";
                    } elseif ($temp[$i] > 35) {
                        echo "<td class=\"weekends red\">$temp[$i]º</td>";
                    } else {
                        echo "<td class=\"weekends\">$temp[$i]º</td>";
                    }
                    //Y finalmente pinto los que quedan
                } else {
                    if ($temp[$i] == $min) {
                        if ($temp[$i] < 0) {
                            echo "<td class=\"lowest blue\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"lowest\">$temp[$i]º</td>";
                        }
                    } elseif ($temp[$i] == $max) {
                        if ($temp[$i] > 35) {
                            echo "<td class=\"highest red\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"highest\">$temp[$i]º</td>";
                        }
                    } elseif ($temp[$i] < 0) {
                        echo "<td class=\"blue\">$temp[$i]º</td>";
                    } elseif ($temp[$i] > 35) {
                        echo "<td class=\"red\">$temp[$i]º</td>";
                    } else {
                        echo "<td>$temp[$i]º</td>";
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

    $type = filterByType([12, -15, 3, 5, 13, 7], "negativo");
    var_dump($type);
    $type = filterByType([12, -15, 3, 5, 13, 7], "positivo");
    var_dump($type);
    $type = filterByType([12, -15, 3, 5, 13, 7], "par");
    var_dump($type);
    $type = filterByType([12, -15, 3, 5, 13, 7], "impar");
    var_dump($type);
    $type = filterByType([12, -15, 3, 5, 13, 7], "primo");
    var_dump($type);
    echo "<hr>";
    $statistics = calculateStatistics([12, -15, 3, 5, 13, 7]);
    var_dump($statistics);
    echo "<hr>";
    $words = analizarPalabras("hola es una prueba y ya");
    var_dump($words);
    echo "<hr>";
    $temperatureprueba = convertTemperature(30, "clesius", "kelvin");
    var_dump($temperatureprueba);
    $temperatureprueba = convertTemperature(30, "celsius", "kelvin");
    var_dump($temperatureprueba);
    echo "<hr>";
    var_dump(inventoRida("11223344C", $personas));
    var_dump(inventoRida("asdasdA", $personas));
    ?>
    <h2>Ejercicio 4</h2>
    <?php

    echo "<table class=\"shop\">";
    echo "<tr><th>Nombre</th><th>Precio con IVA</th><th>Stock</th></tr>";
    foreach ($productos as $producto => $valor) {
        echo "<tr>";
        echo "<td>" . ucwords($valor["nombre"]) . "</td>";
        echo "<td>" . formatPrice(calculateIVA($valor["precio"])) . "</td>";
        if ($valor["stock"] == 0) {
            echo "<td class=\"red2\">" . $valor["stock"] . "</td>";
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

    echo "<table class=\"shop\">";
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
            echo "<td class=\"red2\">" . $valor["stock"] . "</td>";
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
    $max = 0;
    foreach ($maximos as $jugador => $valor) {
        if ($valor > $max) {
            $max = $valor;
        }
    }
    foreach ($jugadores as $clave => $jugador) {
        echo "<tr>";
        if ($jugador["activo"]) {
            echo "<td class=\"activo\">" . $clave . "</td>";
        } else {
            echo "<td>" . $clave . "</td>";
        }
        echo "<td>" . $jugador["nombre"] . "</td>";
        echo "<td>" . $jugador["edad"] . "</td>";
        if (nivel(promedio($clave, $jugadores)) == "Principiante") {
            echo "<td class=\"principiante\">" . nivel(promedio($clave, $jugadores)) . "</td>";
        } elseif (nivel(promedio($clave, $jugadores)) == "Intermedio") {
            echo "<td class=\"intermedio\">" . nivel(promedio($clave, $jugadores)) . "</td>";
        } else {
            echo "<td class=\"experto\">" . nivel(promedio($clave, $jugadores)) . "</td>";
        }
        echo "<td>" . $partidas[$clave] . "</td>";
        if ($maximos[$clave] == $max) {
            echo "<td class=\"record\">" . $maximos[$clave] . "</td>";
        } else {
            echo "<td>" . $maximos[$clave] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<p>
    Simplemente se trata de una especie de juego de puntuaciones, en el que se
    muestra el usuario y dependiendo de si está activo saldrá de una 
    u otra manera, su nombre, la edad, el nivel(que también llevara diferentes estilos,
    además el nivel lo calculamos con otra funcion y dependiendo de su media sera 
    un nivel u otro), cuántas partidas lleva y la maxima puntuacion. El máximo 
    tendrá su puntuacion destacada por un borde dorado.
    </p>"
    ?>
</body>

</html>