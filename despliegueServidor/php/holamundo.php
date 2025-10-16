<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primer programa en PHP</title>
</head>

<body>
    <h2>PHP:</h2>

    <?php
        echo "Hola Mundo";

        //Variables::
        //Java: String name = "Rida";
    
            $name = "Rida";
        echo "<br>";
        echo "Me llamo $name";

        echo "<p>Hola, me llamo $name</p>";
        echo '<p>Hola, me llamo $name</p>';

        $name = 3;
        echo "<p>Hola $name</p>"
    ?>

    <h2>Más PHP:</h2>
    <?php
        echo "<p>La variable name tiene: $name</p>";

        //Java: Double number = 0.0;

        //PHP
        $number = 0.0;

        echo $number;
        
        
    ?>
</body>

</html>