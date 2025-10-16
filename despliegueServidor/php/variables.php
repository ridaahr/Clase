<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables de PHP</title>
</head>

<body>

    <?php
        //boolean
        $underAge = true;
        $type = gettype($underAge);
        echo $type;
        echo "<br>";

        //int
        $number = 14;
        echo gettype($number);
        echo "<br>";

        //float
        $decimal = 14.1;
        var_dump($decimal);
        echo "<br>";

        //string
        $text = "texto";
        echo gettype($text);
        echo "<br>";
        
        //Concatenar con .
        $text = $text . " - fin";
        var_dump ($text);
        echo "<br>";
        var_dump($a);

        echo "<br>";

        const GROUP = "2DAW";
        echo "el grupo es " . GROUP;
        echo "<br>";
        $mod = 5 % 2;
        var_dump($mod);

        echo "<br>";
        $pow = 4 ** 3;
        var_dump($pow);

        echo "<br>";
        $a = 4;
        $a++;
        var_dump($a);
        $a++;
        var_dump($a);

        echo "<br>";
        $a = 5;
        $b = $a++;
        echo "b = $b";

        echo "<br>";
        $a = 5;
        $b = ++$a;
        echo "b = $b";
        echo "<br>";

        $age = 9;
        echo "La edad es " . $age++ . "<br>"; //Sale 9 porque primero se imprime y ya luego sumamos
        $age = 9;
        echo "Ahora la edad es " . ++$age . "<br>"; //Sale 10 porque ya está sumado

        $a = 4;
        //$a = 4 + 9;
        $a += 9;
        $a /= 24;
        
        $text = "hola";
        $text .= " y adiós";
        var_dump($text);
        echo "<br>";

        //OPERADORES DE COMPARACIÓN
        $a = 4;
        $b = 4;

        $comp = $a == $b;
        var_dump($comp);
        echo "<br>";

        $comp = $a > $b;
        var_dump($comp);
        echo "<br>";

        $comp = $a >= $b;
        var_dump($comp);
        echo "<br>";

        $comp = $a != $b;
        var_dump($comp);
        echo "<br>";

        echo "Nave espacial <br>";
        $comp = $a <=> $b;
        var_dump($comp);
        echo "<br>";

    ?>

</body>
</html>