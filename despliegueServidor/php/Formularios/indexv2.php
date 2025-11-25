<?php
session_start();
if (!isset($_SESSION["origin"]) or $_SESSION["origin"] != "signup") {
    header("Location: /signup/signupv2.php");
    exit();
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

    $user = new User($name, $pass, $email, $age, $studies);
    echo $user;
    ?>
</body>

</html>