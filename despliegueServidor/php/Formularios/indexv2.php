<?php
session_start();

//Si no ha llegado al indexv2 después del formulario de signupv2, que le devuelva a signupv2.php
var_dump(isset($_SESSION["origin"]));

//Compruebo la cookie
$nameCookie = "";
$session = $cookie = false;
if (isset($_COOKIE["logged"])) {
    $cookie = true;
    $nameCookie = $_COOKIE["logged"];
} else if (!isset($_SESSION["origin"]) or $_SESSION["origin"] != "signup") {
    $session = true;
    //header("Location: ./signup/signupv2.php");
    //exit(); //Con esto termina el script, no se ejecuta nada más
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Bien!!</p>
    <?php
    if ($cookie) {
        echo "<p>Tenías la cookie activada, $nameCookie</p>";
    }
    if ($session) {
        echo "<p>El nombre introducido era... </p>";
        require $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/Formularios/signup/User.php";
        var_dump($_POST);
        var_dump($_GET);
        var_dump($_SESSION);

        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $pass = $_SESSION["pass"];
        $age = $_SESSION["age"];
        $studies = [];

        if (isset($_SESSION["studies"])) {
            $studies = $_SESSION["studies"];
        }
    }

    $user = new User($name, $pass, $email, $age, $studies);
    echo $user;
    ?>
</body>

</html>