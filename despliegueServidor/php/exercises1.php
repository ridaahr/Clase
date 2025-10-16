<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="tablasMultiplicarEstilos.css">

<body>
    <h2>Ejercicios</h2>
    <?php
    echo "<h1>Ej 1</h1>";
    $i = 5;
    $num = 4.3;
    $frase = 'una frase';
    $verdadero = true;

    echo "La variable es de tipo " . gettype($i) . " y tiene valor $i<br>";
    echo "La variable es de tipo " . gettype($num) . " y tiene valor $num<br>";
    echo "La variable es de tipo " . gettype($frase) . " y tiene valor $frase<br>";
    echo "La variable es de tipo " . gettype($verdadero) . " y tiene valor $verdadero<br>";
    ?>
    <?php
    echo "<h1>Ej 2</h1>";
    $n1 = 5;
    $n2 = 2;
    $mod = $n1 % $n2;
    echo "$mod<br>";
    $pow = pow($n1, $n2);
    echo "$pow<br>";
    ?>

    <?php
    echo "<h1>Ej 3</h1>";
    $name = "rida";
    $surname = "aharrar";
    $year = 2000;

    echo "<table>
            <tr>
                <th>Nombre</th>
                <td>$name</td>
            </tr>
            <tr>
                <th>Apellido</th>
                <td>$surname</td>
            </tr>
            <tr>
                <th>Año</th>
                <td>$year</td>
            </tr>
        </table>"
        ?>
    <?php
    echo "<h1>Ej 4</h1>";
    $edad = 39;
    $edad2 = $edad + 10;
    $edad3 = 69 - $edad;
    echo "Actualmente tienes $edad años, dentro de 10 tendrás $edad2 y 
    para la jubilación te quedan $edad3 años";
    ?>

    <?php
    echo "<h1>Ej 5</h1>";
    echo "<br>";
    $precio = -1001;
    if ($precio >= 100) {
        echo "Caro";
    } elseif ($precio < 1000 && $precio > 100) {
        echo "Medio";
    } elseif ($precio <= 100 && $precio >= 0) {
        echo "Barato";
    } elseif ($precio < 0) {
        echo "Negativo";
    }
    ?>

    <?php
    echo "<h1>Ej 6</h1>";
    echo "<br>";
    $hora = 22;
    $minuto = 59;
    $segundo = 30;
    if ($hora == 23 && $minuto == 59 && $segundo == 59) {
        echo "00:00:00";
    } else {
        if ($segundo == 59) {
            if ($minuto == 59) {
                echo $hora + 1 . ":00:00";
            } elseif ($segundo < 59) {
                if ($minuto == 59) {
                    echo "$hora:00:" . $segundo + 1;
                } else {
                    echo $hora . ":00:00";
                }
            } elseif ($segundo == 59) {
                echo "$hora:" . $minuto + 1 . ":00";
            }
        } elseif ($segundo < 59) {
            echo "$hora:$minuto:" . $segundo + 1;
        }
    }
    ?>
    <?php
    echo "<h1>Ej 7</h1>";
    $num = 5;
    for ($i = 1; $i <= $num; $i++) {
        echo $i;
    }
    ?>
    <?php
    echo "<h1>Ej 8</h1>";

    $n = 9;
    echo "<ul>";
    while ($n <= 15) {
        echo "<li>$n</li>";
        $n++;
    }
    echo "</ul>";
    ?>
    <?php
    echo "<h1>Ej 9</h1>";
    $n = 0;
    while ($n <= 10) {
        if ($n % 2 == 0) {
            if ($n == 10) {
                echo "$n.";
            } else {
                echo "$n, ";
            }
        }
        $n++;
    }

    ?>
    <?php
    echo "<h1>Ej 10</h1>";
    $n = 50;
    echo "<ol>";
    while ($n >= 20) {
        if (!($n % 3 == 0) && !($n % 7 == 0)) {
            echo "<li>$n</li>";
        }
        $n--;
    }
    echo "</ol>";

    ?>
    <?php
    echo "<h1>Ej 11</h1>";
    $n = 0;
    for ($i = 1; $i <= 10; $i++) {
        $n = $i + $n;
    }
    echo $n;


    ?>
    <?php
    echo "<h1>Ej 12</h1>";
    $n = 5;
    $res = 1;
    for ($i = 1; $i <= $n; $i++) {
        $res = $res * $i;
    }
    echo $res;


    ?>
    <?php
    echo "<h1>Ej 13</h1>";
    $base = 3;
    $exp = 4;
    $res = 1;
    for ($i = 0; $i < $exp; $i++) {
        $res = $res * $base;
    }
    echo $res;


    ?>
    <?php
    echo "<h1>Ej 14</h1>";
    $base = 3;
    $exp = 3;
    $res = 1;
    $n = 0;
    while ($n < $exp) {
        $res = $res * $base;
        $n++;
    }
    echo $res;

    ?>

    <?php
    echo "<h1>Ej 15</h1>";
    $num = 7;
    $cont = 0;
    echo "<table>
    <tr><th>a</th><th>b</th><th>resultado</th></tr>";
    while ($cont <= 10) {
        $res = $cont * $num;
        echo "<tr><td>$num</td><td>$cont</td><td>$res</td></tr>";
        $cont++;
    }

    echo "</table>";

    ?>
    <?php
    echo "<h1>Ej 16</h1>";
    $cont = 0;

    $num = 1;
    $num2 = 0;
    $res = 0;
    do {
        $res = $num2;
        echo $res . ",";
        $num2 = $num + $num2;
        $num = $res;
        $cont++;
    } while ($cont <= 20);

    ?>
    <?php
    echo "<h1>Ej 17</h1>";
    $col = 5;
    $fila = 3;
    for ($i = 0; $i < $fila; $i++) {
        for ($j = 0; $j < $col; $j++) {
            echo "* ";
        }
        echo "<br>";
    }

    ?>
    <?php
    echo "<h1>Ej 18</h1>";
    $fila = 5;
    for ($i = 0; $i < $fila; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo "* ";
        }
        echo "<br>";
    }

    ?>
    <?php
    echo "<h1>Ej 19</h1>";
    $fila = 5;
    for ($i = 0; $i < $fila; $i++) {
        for ($j = 1; $j <= $i + 1; $j++) {
            echo "$j ";
        }
        echo "<br>";
    }

    ?>
    <?php
    echo "<h1>Ej 20</h1>";

    echo "<table>";
    echo "<tr >";
    echo "<th id=\"x\">X</th>";
    for ($i = 0; $i < 10; $i++) {
        echo "<th id=\"cabecera\">$i</th>";
    }
    echo "</tr>";
    for ($i = 0; $i < 10; $i++) { 
        echo "<th>$i</th>";
        for ($j = 0; $j < 10; $j++) {
            echo "<td>" . $i * $j . "</td>";
        }
        echo "</tr>";
    }


    echo "</table>";
    ?>
    <?php
    echo "<h1>Ej 21</h1>";
    $cadena = "ejercicio 21  ";
    var_dump( $cadena );
    echo "<br>";
    $cadena = rtrim($cadena);
    var_dump( $cadena );
    echo "<br>";
    $cadena = ltrim($cadena);
    var_dump( $cadena );
    echo "<br>";
    $cadena = trim($cadena);
    var_dump( $cadena );
    echo "<br>";
    $cadena = str_replace(' ', '', $cadena);
    var_dump( $cadena );
    echo "<br>";

    //sumar 1 da error

    ?>
</body>

</html>