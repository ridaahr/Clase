<?php
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <h1>Funciones</h1>
    
    <?php
        showName();

        //Se pueden usar las variables declaradas en el fichero
        var_dump($variable);

        echo "<br>";
        printAddition(7,9);

        echo "<br>";
        $sum = addition(4,2);
        echo $sum;
        echo "<br>";

        echo addition(5,2);
        echo "<br>";

        echo "La suma de 6 y 9 es " . addition(6,9);
        echo "<br>";
        echo greet("rida");
        echo "<br>";
        echo greet("rida", "buenos dias");

        echo infoHtml("hola");

        echo "<br>";
        echo matricula("Rida", "Tierno");
        echo "<br>";
        echo matricula("Juan", "Brasil", "DAM", 2026);

        
    ?>

    <?php
    function increment($number) {
        $number++;
        return $number;
    }

    $number = 8;
    increment($number); //Parámetros por valor
    echo "<p>$number</p>";

    function incrementReference(&$number) {
        $number++;
        return $number;
    }

    $number = 8;
    incrementReference($number); //Parámetros por referencia
    echo "<p>$number</p>";

    $edad = 17;
    $edad = add1($edad);
    var_dump( $edad );
    ?>


    <h3>Funciones con un número variable de parámetros</h3>

    <?php

    echo "uno ", " dos", " tres" ,"<br>";

    max(4,8);
    max(4,9,11,-4);
    
    $resta = substract(4,9,8,5);
    var_dump( $resta );

    

    ?>
</body>
</html>