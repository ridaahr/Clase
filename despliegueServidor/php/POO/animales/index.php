<?php
include "Cat.php" ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases</title>
</head>
<body>
    <h3>Clases: Animales</h3>
    <?php

    $cat = new Cat("Mari Carmen", "naranja", 9);
    echo $cat->miaw();

    ?>

    <?php

    include "Minotauro.php";
    $min1 = new Minotauro("Mari Carmen");
    $min2 = new Minotauro("Josefina", 15);
    echo "<p>La edad del " . $min1->getName() . " es " . $min1->getAge() . "</p>";
    echo "<p>La edad del " . $min2->getName() . " es " . $min2->getAge() . "</p>";
    
    echo "<p>$min2</p>";
    ?>
</body>
</html>
