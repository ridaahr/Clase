<?php
include("modeloB.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo B</title>
</head>

<body>
    <?php

    echo "<h3>1</h3>";
    echo "<ul>";
    foreach ($menuItems as $menuItem) {
        if ($menuItem["category"] == "Main Course") {
            echo "<li>" . $menuItem["name"] . " tiene un nivel de picante " . $menuItem["spicy_level"] . "</li>";
        }
    }
    echo "</ul>";

    echo "<h3>2</h3>";
    $sumMC = 0;
    $countMC = 0;
    $sumD = 0;
    $countD = 0;

    foreach ($menuItems as $menuItem) {
        if ($menuItem["category"] == "Main Course") {
            $sumMC += $menuItem["price"];
            $countMC++;
        } else {
            $sumD += $menuItem["price"];
            $countD++;
        }
    }

    $avgMC = $sumMC / $countMC;
    $avgD = $sumD / $countD;

    echo "<p>El precio medio de Main Course es $avgMC</p>";
    echo "<p>El precio medio de Dessert es $avgD</p>";


    echo "<h3>3</h3>";


    $names = [];
    foreach ($menuItems as $menuItem) {
        if ($menuItem["category"] == "Dessert") {
            $names[] = $menuItem["name"];
        }
    }


    asort($names);

    echo "<ul>";
    foreach ($names as $n) {
        echo "<li>$n</li>";
    }
    echo "</ul>";



    ?>
</body>

</html>