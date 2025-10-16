<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
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
    foreach ($temps as $ciudad => $temp) {
        $maxDia = $temp[0];
        $minDia = $temp[0];
        for ($i = 0; $i < count($temp); $i++) {
            if ($temp[$i] > $maxDia) {
                $maxDia = $temp[$i];
            }
            if ($temp[$i] < $minDia) {
                $minDia = $temp[$i];
            }
        }
        if ($maxDia - $minDia > $mayorVariacion) {
            $mayorVariacion = $maxDia - $minDia;
        }
    }
    echo "<br>";
    var_dump($mayorVariacion);
    ?>

    <h2>Ejercicio 3</h2>
</body>

</html>