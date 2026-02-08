<?php
session_start();
$email = $name = $password = "";
$emailError = $passError = "";
$errors = false;

if (isset($_COOKIE["stay-connected"])) {
    $_SESSION["email"] = $_COOKIE["stay-connected"];
    $_SESSION["origin"] = "login";
    header("Location: index.php");
    exit();
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include $_SERVER["DOCUMENT_ROOT"] . "/utils/functions.php";
    $email = secure($_POST["email"]);
    $password = ($_POST["password"]);

    if (strlen($email) < 3) {
        $emailError = "Error";
        $errors = true;
    }
    if (strlen($password) < 3) {
        $passError = "Error";
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
                header("Location: index.php");
                exit();
            } else {
                $_SESSION["error"] = "Email o contraseña incorrectos";
            }
        }
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

    <?php
    if (isset($_SESSION["error"])) {
        $err = $_SESSION["error"];
        echo "<p class=\"errors\">$err</p>";
    }
    ?>

    <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/form-login.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php" ?>

</body>

</html>