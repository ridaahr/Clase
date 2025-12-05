<?php
include "funcionesrepaso.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repaso</title>
    <style>
        .red {
            background-color: red;
        }

        .center {
            background-color: blue;
        }
    </style>
</head>

<body>
    <?php
    $prueba = multiplos(19, -100);
    var_dump($prueba);
    echo "<br>";
    $analiza = analiza("hola", "p", "k", "s", "z");
    var_dump($analiza);
    echo "<br>";
    $analiza2 = analiza2("hola", "h");
    var_dump($analiza2);
    ?>

    <?php
    $bid = [];
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $bid[$i][$j] = $j;
        }
    }


    echo "<table>";
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
            if (($i == 4 || $i == 5) && ($j == 4 || $j == 5)) {
                echo "<td class=\"center\">" . $bid[$i][$j] . "</td>";
            } else if ($i == $j || $i + $j == 9) {
                echo "<td class=\"red\">" . $bid[$i][$j] . "</td>";
            } else {
                echo "<td>" . $bid[$i][$j] . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>
</body>

</html>