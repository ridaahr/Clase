<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
    <link rel="stylesheet" href="styles/stylesRA.css">
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
    foreach ($temps as $city => $temp) {
        foreach ($temp as $dia => $t) {
            if ($t > $max) {
                $max = $t;
            }
        }
    }
    echo "<br>";
    var_dump($max);

    $min = $temps["Ciudad 1"][0];
    foreach ($temps as $city => $temp) {
        foreach ($temp as $dia => $t) {
            if ($t < $min) {
                $min = $t;
            }
        }
    }
    echo "<br>";
    var_dump($min);


    $mayorVariacion = 0;
    for ($i = 0; $i < count($temp); $i++) {
        $maxDia = $temp[0];
        $minDia = $temp[0];
        foreach ($temps as $ciudad => $temp) {
            if ($temp[$i] > $maxDia) {
                $maxDia = $temp[$i];
            }
            if ($temp[$i] < $minDia) {
                $minDia = $temp[$i];
            }
        }
        if ($maxDia - $minDia > $mayorVariacion) {
            $mayorVariacion = $maxDia - $minDia;
            $diaM = $i + 1;
        }
    }
    echo "<br>";
    var_dump($mayorVariacion);
    echo "<div>";
    echo "<table>
        <tr class=\"headers\"><td>Ciudad/Día</td><td>Día 1</td><td>Día 2</td><td>Día 3</td><td>Día 4</td><td>Día 5</td><td class=\"weekends\">Día 6</td><td>Media</td></tr>
    ";
    $max = -INF;
    $cityM;
    foreach ($temps as $ciudad => $temp) {
        $sum = 0;
        for ($i = 0; $i < count($temp); $i++) {
            $sum += $temp[$i];
        }
        $avg = $sum / count($temp);
        if ($avg > $max) {
            $max = $avg;
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
            $avg = $sum / count($temp);
            if ($avg > $max) {
                $max = $avg;
                $cityM = $ciudad;
            }

            if ($ciudad === $cityM) {
                for ($i = 0; $i < count($temp); $i++) {
                    if ($i === 5) {
                        if ($temp[$i] > 35) {
                            echo "<td class=\"weekends red higheravg\">$temp[$i]º</td>";
                        } elseif ($temp[$i] < 0) {
                            echo "<td class=\"weekends higheravg\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"weekends higheravg\">$temp[$i]º</td>";
                        }
                    } elseif ($temp[$i] > 35) {
                        echo "<td class=\"red higheravg\">$temp[$i]º</td>";
                    } elseif ($temp[$i] < 0) {
                        echo "<td class=\"blue higheravg\">$temp[$i]º</td>";
                    } else {
                        echo "<td class=\"higheravg\">$temp[$i]º</td>";
                    }
                }
            } else {
                for ($i = 0; $i < count($temp); $i++) {
                    if ($i === 5) {
                        if ($temp[$i] > 35) {
                            echo "<td class=\"weekends red\">$temp[$i]º</td>";
                        } elseif ($temp[$i] < 0) {
                            echo "<td class=\"weekends blue\">$temp[$i]º</td>";
                        } else {
                            echo "<td class=\"weekends\">$temp[$i]º</td>";
                        }
                    } elseif ($temp[$i] > 35) {
                        echo "<td class=\"red\">$temp[$i]º</td>";
                    } elseif ($temp[$i] < 0) {
                        echo "<td class=\"blue\">$temp[$i]º</td>";
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



    echo "El día con más variación es el día $diaM<br>";
    echo "La ciudad con mas media es $cityM";

    echo "</div>";
    ?>

    <h2>Ejercicio 3</h2>
</body>

</html>