<?php
session_start();
$email = $name = $password = "";
$emailError = $passError = "";
$errors = false;

if (isset($_SESSION["origin"])) {
    header("Location: index.php");
    exit();
}

if (isset($_COOKIE["stay-connected"])) {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/repositories/CustomerDAO.php";
    $email = $_COOKIE["stay-connected"];
    $customer = CustomerDAO::read($email);

    if ($customer) {
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $customer->getName();
        $_SESSION["surname"] = $customer->getSurname();
        $_SESSION["origin"] = "login";
        header("Location: index.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/functions.php";
    $email = secure($_POST["email"]);
    $password = ($_POST["password"]);

    if (strlen($email) < 3) {
        $emailError = "Error, la longitud tiene que ser mayor";
        $errors = true;
    }
    if (strlen($password) < 3) {
        $passError = "Error, contraseña muy corta";
        $errors = true;
    }


    if (!$errors) {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/repositories/CustomerDAO.php";
        $customer = CustomerDAO::read($email);
        if ($customer == null) {
            $_SESSION["error"] = "Email o contraseña incorrectos";
        } else {
            if (password_verify($password, $customer->getPassword())) {
                if (isset($_POST["stay-connected"])) {
                    setcookie("stay-connected", $email, time() + 60 * 60 * 24 * 30, "/");
                }
                unset($_SESSION["error"]);
                $_SESSION["email"] = $email;
                $_SESSION["origin"] = "login";
                $_SESSION["name"] = $customer->getName();
                $_SESSION["surname"] = $customer->getSurname();
                $_SESSION["id"] = $customer->getId();
                header("Location: index.php");
                exit();
            } else {
                $_SESSION["error"] = "Email o contraseña incorrectos";
            }
        }
    }
}

$isLogged = isset($_SESSION["origin"]) || isset($_COOKIE["stay-connected"]);
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
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php" ?>

    <?php
    if (isset($_SESSION["error"])) {
        $err = $_SESSION["error"];
        echo "<p class=\"info\">$err</p>";
    }
    ?>
    <?php
    if (isset($_SESSION["id"])) {
        echo '<p class="info">Ya has iniciado sesión</p>';
    } else {
        include_once $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/form-login.php";
    }
    ?>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php" ?>

</body>

</html>