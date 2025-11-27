<?php
session_start();
if (!isset($_SESSION["origin"]) or $_SESSION["origin"] != "recipe") {
    header("Location: recipes/formrecipe.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="recipes/style.css">
</head>

<body>
    <?php
    require $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/Formularios/recipes/Recipe.php";

    $email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $time = $_SESSION["time"];
    $type = $_SESSION["type"];
    $gluten = $_SESSION["gluten"];
    $color = $_SESSION["color"];

    $recipe = new Recipe($email, $name, $time, $type, $gluten, $color);
    echo "<div class=\"container\">$recipe</div>";

    ?>
    <a href="recipes/closesession.php">Cerrar sesión y borrar cookies</a>
</body>

</html>