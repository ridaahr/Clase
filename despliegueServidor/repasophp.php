<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    for ($i = 0; $i <= 10; $i++) {
        if ($i % 2 == 0 && $i == 10) {
            echo " $i.";
        } elseif ($i % 2 == 0) {
            echo "$i, ";
        }
    }


    echo "<ol>";
    for ($i = 50; $i >= 20; $i--) {
        if (!($i % 3 == 0) && !($i % 7 == 0)) {
            echo "<li>$i</li>";
        }
    }
    echo "</ol>";

    $num = 5;
    for ($i = 1; $i < 5; $i++) {

        $num *= $i;
    }

    echo ($num);
    echo "<br>";

    $base = 2;
    $exp = 3;
    $res = 1;

    for ($i = 0; $i < $exp; $i++) {
        $res *= $base;
    }
    echo $res;

    $numero = 7;

    echo "<table>";
    echo "<tr><td>a</td><td>b</td><td>resultado</td></tr>";
    for ($i = 0; $i <= 10; $i++) {
        echo "<tr><td>$numero</td><td>$i</td><td>" . $numero * $i . "</td></tr>";
    }
    echo "</table>";

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 5; $j++) {
            echo "*";
        }
        echo "<br>";
    }

    echo "<br>";

    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "* ";
        }
        echo "<br>";
    }

    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "$j ";
        }
        echo "<br>";
    }


    $filas = 5;
    $col = 3;
    $arr = [];

    for ($i = 1; $i <= $filas; $i++) {
        for ($j = 1; $j <= $col; $j++) {
            $arr[$i][$j] = $i * $j;
        }
    }

    var_dump($arr);
    echo "<br>";
    $filas2 = 4;
    $col2 = 4;
    $arr = [];

    for ($i = 0; $i < $filas2; $i++) {
        for ($j = 0; $j < $col2; $j++) {
            if ($i == $j) {
                $arr[$i][$j] = "si ";
                echo $arr[$i][$j];
            } else {
                $arr[$i][$j] = "no" . " ";
                echo $arr[$i][$j] . " ";
            }
        }
        echo "<br>";
    }

    var_dump($arr);

    function promedio(...$numbers)
    {
        if (count($numbers) == 0) {
            return false;
        } else {
            $counter = 0;
            $sum = 0;
            for ($i = 0; $i < count($numbers); $i++) {
                $sum += $numbers[$i];
            }
            return $sum / count($numbers);
        }
    }

    function potencia($base, $exp = 2)
    {
        $res = 1;
        for ($i = 0; $i < $exp; $i++) {
            $res *= $base;
        }
        return $res;
    }

    var_dump(potencia(3));

    echo "<br>";
    $personas = [
        41 => "Juan",
        14 => "Blanca",
        21 => "Ahmed",
    ];

    asort($personas);
    var_dump($personas);

    echo "<ul>";
    foreach ($personas as $id => $nombre) {
        echo "<li>$nombre tiene el id $id</li>";
    }
    echo "</ul>";


    $alumnado = [
        "1234W" => [
            "name" => "Amir",
            "edad" => 21,
            "matricula" => true
        ],
        "2345X" => [
            "name" => "Laura",
            "edad" => 17,
            "matricula" => false
        ],
        "3456Y" => [
            "name" => "Juan",
            "edad" => 23,
            "matricula" => true
        ],
        "4567Z" => [
            "name" => "Martin",
            "edad" => 12,
            "matricula" => false
        ]
    ];
    /*
    echo "<h4>6.b)</h4>";
    echo "<ol>";
    foreach ($alumnado as $dni => $alumno) {
        echo "<li>" . $alumno["name"];
        if ($alumno["matricula"]) {
            echo " sí";
        } else {
            echo " no";
        }
        //echo $alumno["matricula"] ? " sí" : " no";
        echo " tiene matrícula.</li>";
    }
    echo "</ol>";
    */
    echo "<p>La alumna con DNI 2345X tiene la edad " . $alumnado["2345X"]["edad"] ."</p>";
    echo "<ol>";
    foreach ($alumnado as $dni => $info) {
        if ($info["matricula"]) {
            echo "<li>" . $info["name"] . " sí tiene matrícula</li>";
        } else {
            echo "<li>" . $info["name"] . " no tiene matrícula</li>";
        }
    }
    echo "</ol>";

    echo "<ul>";
    foreach ($alumnado as $dni => $info) {
        if ($info["edad"] >= 18) {
            echo "<li>" . $info["name"] . " tiene " . $info["edad"] . " años y su DNI es $dni</li>";
        }
    }
    echo "</ul>";

    ?>
</body>

</html>