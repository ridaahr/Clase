<?php
session_start();
$email = $name = $color = "";
$time = 0;
$type = "";
$gluten = "";
$errors = false;
$radioError = "";
$selectError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/Formularios/utils.php";
    $email = secure($_POST["email"]);
    $name = secure($_POST["name"]);
    $color = secure($_POST["color"]);
    $time = secure($_POST["time"]);

    if (!empty($_POST["type"])) {
        $type = secure($_POST["type"]);
    } else {
        $selectError = "Tienes que seleccionar un tipo";
        $errors = true;
    }

    if (!empty($_POST["gluten"])) {
        $gluten = secure($_POST["gluten"]);
    } else {
        $radioError = "Tienes que seleccionar si tiene gluten o no";
        $errors = true;
    }

    if (!$errors) {
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        $_SESSION["time"] = $time;
        $_SESSION["type"] = $type;
        $_SESSION["gluten"] = $gluten;
        $_SESSION["color"] = $color;
        $_SESSION["origin"] = "recipe";
        header("Location: ../indexrecipe.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--
    email
    nombre (persona)
    titulo receta
    tiempo (number)
    select: vegana, vegetariana, carnivora
    radio: gluten / sin gluten
    color (input color)

    ---
    El action es a este mismo fichero
    Verificamos que algún radio haya sido marcado.
    Verificamos que algún select haya sido marcado.
    Si está todo bien -> indexrecipe.php
    Si no -> recuperar valores y cambiar la clase para que se vea el error y mostrar un mensajito
-->
    <h1>Introduce una receta</h1>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $email ?>"><br>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="<?= $name ?>"><br>
        <label for="time">Tiempo</label>
        <input type="number" name="time" id="time" value="<?= $time ?>"><br>
        <label for="type">Selecciona el tipo:</label>
        <select name="type" id="type">
            <option value="">Elige</option>
            <option value="vegana" <?= ($type == "vegana") ? "selected" : ""?>>Vegana</option>
            <option value="vegetariana" <?= ($type == "vegetariana") ? "selected" : ""?>>Vegetariana</option>
            <option value="carnivora" <?= ($type == "carnivora") ? "selected" : ""?>>Carnívora</option>
        </select>
        <?= "<p class='error'> " . $selectError . "</p>" ?>
        <br>
        <label for="conGluten">Gluten</label>
        <input type="radio" name="gluten" id="conGluten" value="con" <?= ($gluten=="con") ? "checked" : "" ?>><br>
        <label for="sinGluten">Sin Gluten</label>
        <input type="radio" name="gluten" id="sinGluten" value="sin" <?= ($gluten=="sin") ? "checked" : "" ?>><br>
        <?= "<p class='error'> " . $radioError . "</p>" ?>
        <label for="color">Elige el color</label>
        <input type="color" name="color" id="color" value="<?= $color ?>"><br>
        <input type="submit" value="Enviar datos">
    </form>
</body>

</html>