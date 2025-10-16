<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condicionales</title>
    <style>
        table,
        th,
        td {
            border: 1px solid blueviolet;
        }
    </style>
</head>

<body>
    <?php

    $age = 30;
    if ($age = 30) {
        echo "<p>No tienes abono joven</p>";
    } else {
        echo "<p>Si tienes abono joven</p>";
    }

    if ($age < 3) {
        echo "<p>Bebé</>";
    } elseif ($age < 10) {
        echo "<p>Infantil</p>";
    } else {
        echo "<p>Mayor de 10 años</p>";
    }

    $dia = 2;
    switch ($dia) {
        case 1:
            echo "<p>lunes</p>";
            break;
        case 2:
            echo "<p>martes</p>";
            break;
        case 3:
            echo "<p>miércoles</p>";
            break;
        case 4:
            echo "<p>jueves</p>";
            break;
        default:
            echo "<p>fin de semana</p>";
            break; //aunque no es necesario
    }

    //Si la edad está entre 5 y 12 años incluidos, que salga el mensaje "estás en el colegio"
    $age = 6;
    if ($age >= 5 && $age <= 12) {
        echo "<p>Estás en el colegio</p>";
    }

    $number = 5;
    if ($age > 3 || $age < 5) {
        echo "<p>A</p>";
    } else {
        echo "<p>B</p>";
    }

    //Operador ternario
    $age = 4;
    $underAge = false;
    if ($age >= 18) {
        $underAge = false;
    } else {
        $underAge = true;
    }

    var_dump($underAge);

    //Operador ternario: (condicion) ? instruccionTrue : instruccionFalse;
    $underAge = ($age >= 18) ? false : true;
    echo "<br>";

    //BUCLES
    //imprimir números del 0 al 9
    $i;
    for ($i = 0; $i < 10; $i++) {
        echo "$i<br>";
    }


    for ($i = 0; $i < 10; $i++) {
        if ($i % 2 == 0) {
            echo "<p>$i</p>";
        }
    }

    ?>

    <h3>Bucles while</h3>
    <?php

    //Transformar el bucle anterior en un while
    
    $number = 0;
    while ($number < 10) {
        echo "<p>$number</p>";
        $number++;
    }

    $number = 0;
    do {
        $number++;
    } while ($number < 10);

    //Imprime por pantalla los números del 1 al 5 incluidos dentro de una lista html no ordenada
    echo "<p>Lista no ordenada</p>";
    $i = 1;
    echo "<ul>";
    do {
        echo "<li>$i</li>";
        $i++;
    } while ($i <= 5);
    echo "</ul>";

    //Imprime en una tabla los valores de
    $course1 = 'DWES';
    $course2 = 'DWEC';
    $course3 = 'DIW';
    $teacher1 = 'Sete';
    $teacher2 = 'Diego';
    $teacher3 = 'Marco';

    echo "<table>
                <tr>
                    <th>Asignatura</th>
                    <th>Profesor</th>
                </tr>
                <tr>
                    <td>$course1</td>
                    <td>$teacher1</td>
                </tr>
                <tr>
                    <td>$course2</td>
                    <td>$teacher2</td>
                </tr>
                <tr>
                    <td>$course3</td>
                    <td>$teacher3</td>
                </tr>
            </table>";

    $number = 1;
    echo "<br>";
    echo "<table>
                <tr>
                    <th>Número</th>
                    <th>El doble</th>
                </tr>";
    while ($number < 101) {
        echo "<tr>
                <td>$number</td>";
        $num = $number * 2;
        echo "<td>$num</td>;
                </tr>";
        $number++;
    }
    echo "</table>";

    echo "<br>";
    echo "<table>
                <tr>
                    <th>Número</th>
                    <th>¿Es par?</th>
                </tr>";
    $i = 0;
    while ($i < 101) {
        echo "<tr>
                <td>$i</td>";
        if ($i % 2 == 0) {
            echo "<td>Sí</td>";
        } else {
            echo "<td>No</td>";
        }
        $i++;
    }
    echo "</table>";


    for ($i = 0; $i <= 2; $i++) {
        for ($j = 0; $j <= 3; $j++) {
            echo "a ";

        }
        echo "<br>";
    }

    /*Bucles anidados
    0 0 0 0 0 
    1 1 1 1 1
    2 2 2 2 2

    */
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 5; $j++) {
            echo $i . " ";
        }
        echo "<br>";
    }


    /*
    0 1 2 3 4 5
    0 1 2 3 4 5
    */
    echo "<br>";
    echo "<br>";
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 6; $j++) {
            echo $j . " ";
        }
        echo "<br>";
    }

    /*
    0 1 2 3 4
    5 6 7 8 9
    10 11 12 13 14
    15 16 17 18 19
    20 21 22 23 24
    */
    echo "<br>";
    echo "<br>";
    $k = 0;
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            echo $k . " ";
            $k++;
        }
        echo "<br>";
    }

    $n = 0;
    echo "<table>";
    for ($i = 0; $i < 5; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 4; $j++) {
            echo "<td>";
            echo $n;
            echo "</td>";
            $n++;

        }
        $n--;
        echo "</tr>";
        echo "<br>";
    }
    echo "</table>";

    
    ?>

</body>

</html>