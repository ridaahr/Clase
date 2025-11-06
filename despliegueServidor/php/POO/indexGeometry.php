<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geometry</title>
</head>
<body>
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/geometry/Square.php";
    $s1 = new Square(6);
    $s2 = new Square(4.6);

    $s1->nonStaticAtr = 10;
    echo "<p>$s1</p>";
    $s2->nonStaticAtr = 12;
    echo "<p>$s2</p>";

    Square::$staticAtr = 25;
    echo "<p>$s1</p>";
    echo "<p>$s2</p>";

    echo Square::calculateAnyArea(25);
    ?>
</body>
</html>