<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="tables.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<h1>Ej 1</h1>";
    $aleatorios = [];
    for ($i = 0; $i < 20; $i++) {
        $aleatorios[$i] = rand(10, 50);
    }

    for ($i = 0; $i < count($aleatorios); $i++) {
        echo "<p> $aleatorios[$i], </p>";
    }
    ?>
    <?php
    echo "<h1>Ej 2</h1>";
    $sum = 0;
    for ($i = 0; $i < count($aleatorios); $i++) {
        $sum += $aleatorios[$i];
    }
    $average = $sum / 20;

    $max = 1;

    for ($i = 0; $i < count($aleatorios); $i++) {
        if ($aleatorios[$i] > $max) {
            $max = $aleatorios[$i];
        }
    }
    $min = $max;
    for ($i = 0; $i < count($aleatorios); $i++) {
        if ($aleatorios[$i] < $min) {
            $min = $aleatorios[$i];
        }
    }

    echo "<p>El máximo es " . $max . " y el mínimo " . $min . "</p>"

        ?>
    <?php
    echo "<h1>Ej 3</h1>";
    $personas = array(
        "Rida" => 175,
        "Nico" => 178,
        "Javi" => 181,
        "Marcos" => 173,
        "Jesus" => 174
    );

    $avg = 0;
    echo "<table class=\"personas\">";
    echo "<tr><th>Nombre</th><th>Altura</th></tr>";
    foreach ($personas as $persona => $altura) {
        echo "<tr>";
        echo "<td>$persona</td>";
        echo "<td>$altura</td>";
        echo "</tr>";
        $avg = $avg + $altura;
    }
    $avg = $avg / count($personas);
    echo "<tr><td colspan=2>La media es $avg</td></tr>";

    echo "</table>";

    ?>
    <?php
    echo "<h1>Ej 4</h1>";
    $numeros = [];
    $cubos = [];
    $cuadrados = [];
    for ($i = 0; $i < 10; $i++) {
        $numeros[$i] = mt_rand(0, 100);
    }

    for ($i = 0; $i < 10; $i++) {
        $cuadrados[$i] = $numeros[$i] * $numeros[$i];
    }

    for ($i = 0; $i < 10; $i++) {
        $cubos[$i] = $numeros[$i] * $cuadrados[$i];
    }

    echo "<table>
        <tr>
            <th>Valor</th>
            <th>Cuadrados</th>
            <th>Cubos</th>
        </tr>";

    for ($i = 0; $i < count($numeros); $i++) {
        echo "<tr>";
        echo "<td>" . $numeros[$i] . "</td>";
        echo "<td>" . $cuadrados[$i] . "</td>";
        echo "<td>" . $cubos[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>
    <?php
    echo "<h1>Ej 5</h1>";
    $alumnado = ["Fátima", "Alberto", "Amir", "Juan"];
    $notas = [7.8, 4.1, 6.8, 5.3];
    $matriculado = [true, true, false, false];
    echo "<ul>";
    for ($i = 0; $i < count($alumnado); $i++) {
        if ($matriculado[$i] == true) {
            echo "<li>" . $alumnado[$i] . " tiene un " . $notas[$i] . "y sí esta matriculado</li>";
        } else {
            echo "<li>" . $alumnado[$i] . " tiene un " . $notas[$i] . "y no esta matriculado</li>";
        }
    }
    echo "</ul>";

    ?>
    <?php
    echo "<h1>Ej 6</h1>";

    $temperaturas = [
        "Enero" => 14.8,
        "Febrero" => 19,
        "Marzo" => 25.2,
        "Abril" => 30.9,
        "Mayo" => 29.1,
        "Junio" => 37,
        "Julio" => 38.7,
        "Agosto" => 40,
        "Septiembre" => 31.6,
        "Octubre" => 30.1,
        "Noviembre" => 18.6,
        "Diciembre" => 13.1,
    ];



    echo "<table><tr>";
    foreach ($temperaturas as $mes => $temperatura) {
        echo "<th>$mes</th>";
    }

    echo "</tr>";
    echo "<tr>";

    foreach ($temperaturas as $mes => $temperatura) {
        echo "<td>$temperatura</td>";
    }
    echo "</tr>";

    echo "</table>";

    ?>
    <?php

    echo "<h1>Ej 7</h1>";
    echo "<table>";
    foreach ($temperaturas as $mes => $temperatura) {
        echo "<tr>
            <th>$mes</th>";

        echo "<td>";
        for ($i = 0; $i < $temperatura; $i++) {
            echo " - ";
        }
        echo "</td>
        </tr>";
    }
    echo "</table>";


    ?>
    <?php
    echo "<h1>Ej 8</h1>";
    $temperaturas = [
        "Enero" => [14.8, -1.8],
        "Febrero" => [19, -1.8],
        "Marzo" => [25.2, -1.6],
        "Abril" => [30.9, 5.1],
        "Mayo" => [29.1, 8.3],
        "Junio" => [37, 13.4],
        "Julio" => [38.7, 17.4],
        "Agosto" => [40, 15.1],
        "Septiembre" => [31.6, 10.7],
        "Octubre" => [30.1, 7.5],
        "Noviembre" => [18.6, 3],
        "Diciembre" => [13.1, -0.2]
    ];


    echo "<table class=\"temp\">";
    echo "<tr><th>Mes</th><th>Máx</th><th>Min</th>";
    foreach ($temperaturas as $mes => $temperatura) {
        echo "<tr>
        <td>$mes</td>";
        echo "<td>$temperatura[0]</td><td>$temperatura[1]</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <?php
    echo "<h1>Ej 9</h1>";
    $cartas = [];

    $palos = ["oro", "copa", "espada", "basto"];

    $numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    $puntos = [11, 0, 10, 0, 0, 0, 0, 0, 0, 2, 3, 4];
    $puntuacion = 0;

    for ($i = 0; $i < 10; $i++) {
        $index = rand(0, count($numeros) - 1);
        $cartas[$i] = $numeros[$index] . " " . $palos[rand(0, count($palos) - 1)];
        $puntuacion += $puntos[$index];
    }


    var_dump($cartas);
    echo "<br>";
    echo "La puntuacion es $puntuacion";

    ?>

    <?php
    /*
    echo "<h1>Ej 10</h1>";
    $cartas = [];

    $palos = ["oro", "copa", "espada", "basto"];

    $numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    $puntos = [11, 0, 10, 0, 0, 0, 0, 0, 0, 2, 3, 4];
    $puntuacion = 0;

    for ($i = 0; $i < 10; $i++) {
        $index = rand(0, count($numeros) - 1);
        $carta = $numeros[$index] . " " . $palos[rand(0, count($palos) - 1)];
        while ($i != 0 and in_array($carta, $cartas)) {
            $index = rand(0, count($numeros) - 1);
            $cartas[$i] = $numeros[$index] . " " . $palos[rand(0, count($palos) - 1)];
        }
        $cartas[] = $carta;
        $puntuacion += $puntos[$index];
    }


    var_dump($cartas);
    echo "<br>";
    echo "La puntuacion es $puntuacion";
    */
    ?>

    <?php

    echo "<h1>Ej 11</h1>";
    $dicc = [
        "Desarrollo" => "Development",
        "Lenguaje" => "Language",
        "Depurar" => "Debug",
        "Ejecutar" => "Run",
        "Probar" => "Test",
        "Funcion" => "Function",
        "Vector" => "Array",
        "Proyecto" => "Project"
    ];
    $claves = array_keys($dicc); // ["Desarrollo", "Lenguaje", "Depurar" , ... , "Proyecto"]
    $random = rand(0, count($dicc));
    echo "<p>La palabra " . $claves[$random] . " significa " . $dicc[$claves[$random]] . "</p>"

        ?>

    <?php
    echo "<h1>Ej 12</h1>";

    $bid = [
        [],
        [],
        [],
        [],
        [],
        [],
        [],
        [],
        [],
        []
    ];

    echo "<table>";
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
            $bid[$i] = [];
            do {
                $num = rand(0, 500);
            } while (in_array($num, $bid[$i]));

            $bid[$i][$j] = $num;
            echo "<td>" . $bid[$i][$j] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

    ?>
    <?php
    echo "<h1>Ej 13</h1>";

    $estudiantes = [
        ["nombre" => "Ana García", "matematicas" => 8.5, "historia" => 7.0, "programacion" => 9.0],
        ["nombre" => "Luis Martínez", "matematicas" => 6.0, "historia" => 8.5, "programacion" => 7.5],
        ["nombre" => "Marta Rodríguez", "matematicas" => 9.0, "historia" => 6.5, "programacion" => 8.0],
        ["nombre" => "Carlos López", "matematicas" => 7.5, "historia" => 9.0, "programacion" => 6.5],
        ["nombre" => "Elena Torres", "matematicas" => 8.0, "historia" => 7.5, "programacion" => 9.5]
    ];

    //1
    $media = 0;



    for ($i = 0; $i < count($estudiantes); $i++) {
        $media = ($estudiantes[$i]["matematicas"] + $estudiantes[$i]["historia"] + $estudiantes[$i]["programacion"]) / 3;
        $estudiantes[$i]["media"] = $media;
    }


    $max = $estudiantes[0]["media"];
    $nombre = "";
    for ($i = 0; $i < count($estudiantes); $i++) {
        if ($max < $estudiantes[$i]["media"]) {
            $max = $estudiantes[$i]["media"];
            $nombre = $estudiantes[$i]["nombre"];
        }
    }



    var_dump($estudiantes);

    echo "<hr>";



    echo "$nombre es el estudiante con más promedio, el cual es de $max";

    $mate = 0;
    $hist = 0;
    $prog = 0;
    for ($i = 0; $i < count($estudiantes); $i++) {
        if ($estudiantes[$i]["matematicas"] >= 7) {
            $mate += 1;
        }
        if ($estudiantes[$i]["historia"] >= 7) {
            $hist += 1;
        }
        if ($estudiantes[$i]["programacion"] >= 7) {
            $prog += 1;
        }
    }
    echo "<hr>";

    echo "$mate estudiantes han aprobado matematicas<br>";
    echo "$hist estudiantes han aprobado historia<br>";
    echo "$prog estudiantes han aprobado programacion<br>";

    echo "<hr>";
    $maxMate = $estudiantes[0]["matematicas"];
    $maxHist = $estudiantes[0]["historia"];
    $maxProg = $estudiantes[0]["programacion"];


    for ($i = 0; $i < count($estudiantes); $i++) {
        if ($estudiantes[$i]["matematicas"] > $maxMate) {
            $maxMate = $estudiantes[$i]["matematicas"];
        }
        if ($estudiantes[$i]["historia"] > $maxHist) {
            $maxHist = $estudiantes[$i]["historia"];
        }
        if ($estudiantes[$i]["programacion"] > $maxProg) {
            $maxProg = $estudiantes[$i]["programacion"];
        }
    }

    $notas = [$maxMate, $maxHist, $maxProg];

    echo "La nota más alta de matemáticas es $maxMate<br>";
    echo "La nota más alta de historia es $maxHist<br>";
    echo "La nota más alta de programacion es $maxProg<br>";

    var_dump($notas);

    echo "<hr>";

    for ($i = 0; $i < count($estudiantes); $i++) {
        for ($j = 0; $j < count($estudiantes) - $i - 1; $j++) {
            if ($estudiantes[$j]["media"] < $estudiantes[$j + 1]["media"]) {
                $aux = $estudiantes[$j + 1];
                $estudiantes[$j + 1] = $estudiantes[$j];
                $estudiantes[$j] = $aux;
            }
        }
    }

    var_dump($estudiantes);

    ?>


    <?php
    echo "<h1>Ej 14</h1>";
    $hotel = [
        "habitaciones" => [
            101 => ["tipo" => "individual", "precio" => 50, "ocupada" => false, "dias_ocupada" => 0],
            102 => ["tipo" => "doble", "precio" => 80, "ocupada" => true, "dias_ocupada" => 3],
            103 => ["tipo" => "suite", "precio" => 150, "ocupada" => false, "dias_ocupada" => 0],
            201 => ["tipo" => "individual", "precio" => 50, "ocupada" => true, "dias_ocupada" => 5],
            202 => ["tipo" => "doble", "precio" => 80, "ocupada" => false, "dias_ocupada" => 0],
            203 => ["tipo" => "suite", "precio" => 150, "ocupada" => true, "dias_ocupada" => 2]
        ],
        "reservas" => [
            ["habitacion" => 102, "cliente" => "Juan Pérez", "dias" => 3],
            ["habitacion" => 201, "cliente" => "María López", "dias" => 5],
            ["habitacion" => 203, "cliente" => "Carlos Ruiz", "dias" => 2]
        ]
    ];

    //1
    foreach ($hotel["habitaciones"] as $key => $habitacion) {
        if ($hotel["habitaciones"][$key]["tipo"] == "individual") {
            var_dump($hotel["habitaciones"][$key]);
        }
    }
    echo "<hr>";
    //2
    $ingresos = 0;
    foreach ($hotel["habitaciones"] as $key => $habitacion) {
        if ($hotel["habitaciones"][$key]["ocupada"] == true) {
            $ingresos += $hotel["habitaciones"][$key]["precio"] * $hotel["habitaciones"][$key]["dias_ocupada"];
        }
    }
    echo "Los ingresos totales son de $ingresos euros";
    echo "<hr>";
    //3
    
    $habitacion = 103;
    $libre = false;


    $hotel["habitaciones"][$habitacion]["ocupada"] = true;
    $hotel["habitaciones"][$habitacion]["dias_ocupada"] = 2;
    $hotel["reservas"]["habitacion"] = $habitacion;
    $hotel["reservas"]["cliente"] = "Mari Carmen";
    $hotel["reservas"]["dias"] = 2;


    var_dump($hotel);

    echo "<hr>";

    //4
    $costo = 0;
    $hotel["habitaciones"][102]["ocupada"] = false;
    $costo = $hotel["habitaciones"][102]["precio"] * $hotel["habitaciones"][102]["dias_ocupada"];
    var_dump($costo);
    echo "<hr>";
    //5
    $habitacion;
    $max = $hotel["habitaciones"][102]["precio"] * $hotel["habitaciones"][103]["dias_ocupada"];
    foreach ($hotel["habitaciones"] as $key => $habitacion) {
        if ($hotel["habitaciones"][$key]["ocupada"] == true) {
            if ($max < $hotel["habitaciones"][$key]["precio"] * $hotel["habitaciones"][$key]["dias_ocupada"]) {
                $max = $hotel["habitaciones"][$key]["precio"] * $hotel["habitaciones"][$key]["dias_ocupada"];
                $habitacion = $hotel["habitaciones"][$key];
            }
        }

    }

    var_dump($max);
    echo "<br>";
    var_dump($habitacion);
    echo "<hr>";
    ?>
</body>

</html>