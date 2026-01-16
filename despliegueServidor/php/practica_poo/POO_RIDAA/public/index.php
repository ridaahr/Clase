<?php
session_start();
if (!(isset($_COOKIE["stay-connected"]) or isset($_SESSION["origin"]))) {
    $_SESSION["error"] = "Tienes que iniciar sesión primero";
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php" ?>

    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Vehicle.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Car.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Motorbike.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Van.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Rental.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Customer.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Concessionaire.php";
    ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php" ?>

</body>

</html>