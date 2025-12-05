<?php
$name = $pass = $pass2 = $age = $accept = "";
$nameError = $passError = $acceptError = "";
$errors = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];
    $age = $_POST["age"];
    if (!isset($_POST["accept"])) {
        $acceptError = "Tienes que aceptar las condiciones";
        $errors = true;
    } else {
        $accept = $_POST["accept"];
    }
    if (empty($name)) {
        $nameError = "El nombre es obligatorio";
        $errors = true;
    }
    if ($pass != $pass2) {
        $passError = "Las contraseñas no coinciden";
        $errors = true;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio clase</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="name">Nombre:*</label>
        <input type="text" name="name" id="name" value="<?= $name ?>"><br>
        <?= empty($nameError) ? "" : "<p class=\"error\">$nameError</p>" ?>
        <label for="pass">Contraseña:*</label>
        <input type="password" name="pass" id="pas"><br>
        <label for="pass2">Repite la contraseña:*</label>
        <input type="password" name="pass2" id="pass2"><br>
        <?= empty($passError) ? "" : "<p class=\"error\">$passError</p>" ?>
        <label for="age">Grupo de edad:</label>
        <select name="age" id="age">
            <option value="menor">Menor de edad</option>
            <option value="de18a65">Entre 18 y 65</option>
            <option value="mayor65">Mayor de 65</option>
        </select><br>
        <input type="checkbox" id="accept" name="accept">
        <label for="accept">Acepto las condiciones de uso</label><br>
        <?= empty($acceptError) ? "" : "<p class=\"error\">$acceptError</p>" ?>
        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
    <?php
    if (!$errors) {
        echo "<p>$name . Edad: $age</p>";
    }
    ?>
</body>

</html>