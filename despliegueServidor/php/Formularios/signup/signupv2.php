<?php
session_start();

$name = $email = $pass = $pass2 = "";
$age = 0;
$studies = [];
$errors = false;
$passError = "";

function secure($text){
    /*
    //Quitar espacios de delante y detrás
    $text = trim($text);
    // Escapar caracteres especiales
    $text = stripslashes($text);
    // Caracteres especiales de HTML
    $text = htmlspecialchars($text);*/

    $text = htmlspecialchars(stripslashes(trim($text)));
    return $text;
}

//Hago las comprobaciones del formulario:
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Solo se va a meter en este if si llega con una petición POST,
    // es decir, después de hacer clic en el botón del formulario post
    //echo "hola";

    $name = secure($_POST["name"]);
    $email = secure($_POST["email"]);
    $pass = secure($_POST["pass"]);
    $pass2 = secure($_POST["pass2"]);
    $age = secure($_POST["age"]);
    if (isset($_POST["studies"])) {
        $studies = $_POST["studies"];
    }

    if ($pass != $pass2) {
        //Hay errores, muestro el formulario (sigo aquí)
        $errors = true;
        $passError = "Las contraseñas no coinciden";
        //echo "estoy en el if de contraseñas";
    } else {
        //Guardo en la sesión los datos que quiero pasar:
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["pass"] = $pass;
        $_SESSION["age"] = $age;
        $_SESSION["studies"] = $studies;
        //Le puedo meter otra información
        $_SESSION["origin"] = "signup";

        //Me voy al index:
        header("Location: ../indexv2.php");
        exit(); //Con esto termina el script, no se ejecuta nada más
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
        .error {
            color: red;
            font-size: 0.5em;
        }
    </style>
</head>

<body>
    <p>Formulario de registro. Al pulsar el botón enviar, se va al index.</p>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?= $name ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $email ?>"><br>

        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass"><br>

        <label for="pass2">Repite la contraseña:</label>
        <input type="password" id="pass2" name="pass2"><br>
        <p class="error"><?= $passError ?></p>

        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" value="<?= $age ?>"><br>

        <p>Cursos</p>
        <input type="checkbox" id="daw" name="studies[]" value="daw"
            <?php
            if (in_array("daw", $studies)) {
                echo "checked";
            }
            ?>>
        <label for="daw">DAW</label><br>
        <input type="checkbox" id="dam" name="studies[]" value="dam"
            <?= in_array("dam", $studies) ? "checked" : "" ?>>
        <label for="dam">DAM</label><br>
        <input type="checkbox" id="asir" name="studies[]" value="asir"
            <?= in_array("asir", $studies) ? "checked" : "" ?>>
        <label for="daw">ASIR</label><br>
        <br>

        <input type="submit" value="Enviar datos">

        
    </form>

</body>

</html>