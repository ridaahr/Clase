<?php
session_start();
$name = $surname = $email = $password = $password2 = $dni = $age = "";
$nameError = $surnameError = $passError = $dniError = $ageError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/functions.php";
    $name = secure($_POST["name"]);
    $surname = secure($_POST["surname"]);
    $email = secure($_POST["email"]);
    $password = secure($_POST["password"]);
    $password2 = secure($_POST["password2"]);
    $dni = strtoupper(trim($_POST["dni"]));
    $age = secure($_POST["age"]);

    if (!empty($_POST["stay-connected"])) {
        $connect = $_POST["stay-connected"];
    }

    if (empty($name)) {
        $errors = true;
        $nameError = "El nombre es obligatorio";
    }

    if (empty($surname)) {
        $errors = true;
        $surnameError = "El apellido es obligatorio";
    }

    if (empty($email)) {
        $errors = true;
        $emailError = "El correo es obligatorio";
    }

    if (empty($password) or $password != $password2) {
        $errors = true;
        $passError = "Las contraseñas tienen que coincidir";
    }

    if (empty($dni)) {
        $errors = true;
        $dniError = "El DNI es obligatorio";
    } elseif (!preg_match("/^\d{8}[A-Z]$/", $dni)) {
        $errors = true;
        $dniError = "Formato de DNI inválido";
    }

    if ($age < 18) {
        $errors = true;
        $ageError = "Tienes que ser mayor de edad";
    }

    if (!$errors) {
        $_SESSION["name"] = $name;
        $_SESSION["surname"] = $surname;
        $_SESSION["email"] = $email;
        $_SESSION["dni"] = $dni;
        $_SESSION["age"] = $age;
        $_SESSION["origin"] = "signup";
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php" ?>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/form-signup.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php" ?>

</body>

</html>