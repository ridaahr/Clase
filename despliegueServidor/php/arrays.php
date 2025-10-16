<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Arrays indexados</h3>

    <?php
    //Crear array con la función array();
    $ages = array("25", "19", "42");
    echo "<p>En la posición 0 está el número $ages[0]";
    echo "<p>En la posición 1 está el número $ages[1]";
    echo "<p>En la posición 2 está el número $ages[2]";

    //Para saber la longitud: count();
    echo "<p>Número de elementos del array: " . count($ages) . "</p>";
    //Crear array directamente
    $names[0] = "Juan";
    $names[1] = "Lucía";


    $courses = ["DWES", "DWEC", "DIW", "EIE"];

    //Para añadir al final poner []
    $names[] = "Luz";

    //Recorrer:
    //Con for normal
    for ($i = 0; $i < count($ages); $i++) {
        echo "<p>$i. $names[$i]</p>";
    }

    //Con foreach
    foreach ($names as $name) {
        echo "<p>-$name</p>";
    }

    $ages[5] = 50;  //Esto se puede hacer pero hay que tener cuidado al recorrerlo
    //En realidad lo que he hecho es convertirlo en un array asociativo
    $size = count($ages);
    var_dump($size);
    for ($i = 0; $i < count($ages); $i++) {
        echo "<p>$ages[$i]</p>";
    }
    ?>
    <h3>Arrays asociativos</h3>
    <?php

    $students = [
        "123W" => "Javi",
        "357S" => "Luz",
        "987Q" => "Alberto"
    ];

    //Acceder al nombre Luz;
    var_dump($students["357S"]);
    //Añadir elemento nuevo
    $students["456Y"] = "Maria";
    var_dump($students);
    //Modificar un valor
    $students["123W"] = "Juan";

    $school = array(
        "DIW" => "Marco",
        "DWES" => "Sete",
        "DWEC" => "Diego",
        "IPE" => "Santi"
    );
    echo "<p>Estos son mis profes</p>";
    //Esto no funciona porque los índices no son 0, 1, 2,3.
    for ($i = 0; $i < count($school); $i++) {
        echo $school[$i];
    }

    foreach ($school as $teacher) {
        echo "<p>$teacher</p>";
    }
    echo "<p>Profes y asignaturas</p>";
    foreach ($school as $subject => $teacher) {
        echo "<p>$subject $teacher</p>";
    }

    $films = array(
        "Action" => "Francotirador",
        "Comedia" => "Ted",
        "Ciencia Ficción" => "Star Wars",
        "Drama" => "Joker"
    );

    foreach ($films as $category => $film) {
        echo "<p>$category $film</p>";
    }



    //sort() y rsort() para ordenar, pero en un asociativo me cargo las claves
    
    //Ordenar por claves
    ksort($films);
    var_dump($films);

    //Para buscar valor:
    if (in_array("Diego", $school)) {
        echo "SI";
    } else {
        echo "NO";
    }
    echo "<br>";

    //Buscar si existe clave:
    //NO hay un método específico para hacerlo
    if (in_array("DIW", array_keys($school))) {
        echo "SI";
    } else {
        echo "NO";
    }
    echo "<br>";

    //Otra forma isset($var) -> true si existe la variable o false si no está declarada
    if (isset($computer)) {
        echo "SI";
    } else {
        echo "NO";
    }
    echo "<br>";
    //Ver si existe clave "Ingles" del array asociativo usando isset
    if (isset($school["Ingles"])) {
        echo "SI";
    } else {
        echo "NO";
    }



    ?>

    <h2>Arrays bidimensionales</h2>

    <?php

    $bid = array(
        array(5, 6, 7, 8),
        array(9, 10, 11, 12),
        array(13, 14, 15, 16)
    );

    //Otra forma de declararlo
    $bid2 = [
        [5, 6, 7, 8],
        [9, 10, 11, 12],
        [13, 14, 15, 16]
    ];

    //Acceder al valor 15:
    var_dump($bid2[2][2]);
    //Recorrer con for:
    for ($i = 0; $i < count($bid); $i++) {
        for ($j = 0; $j < count($bid[$i]); $j++) {
            echo $bid[$i][$j] . " - ";
        }
    }

    echo "<br><br>";
    //Recorrer con foreach
    echo "<ul>";
    foreach ($bid as $value) {
        foreach ($value as $num) {
            echo "<li>" . $num . "</li>";
        }
    }
    echo "</ul>";
    ?>

    <h2>Array tridimensional</h2>
    <?php
    
    ?>
</body>

</html>