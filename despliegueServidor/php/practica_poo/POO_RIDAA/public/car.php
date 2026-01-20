<?php
session_start();

$plate = $brand = $model = $fabricationYear = $consumation = $pricePerDay = "";
$available = false;
$doors = $seats = 0;
$extras = [];

$plateError = $brandError = $modelError = $fabricationYearError = "";
$consumationError = $pricePerDayError = $doorsError = $seatsError = $errorBD = "";
$errors = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/functions.php";


    $plate = secure($_POST["plate"]);
    $brand = secure($_POST["brand"]);
    $model = secure($_POST["model"]);
    $fabricationYear = secure($_POST["fabricactionYear"]);
    $consumation = secure($_POST["consumation"]);
    $pricePerDay = secure($_POST["pricePerDay"]);
    $doors = secure($_POST["doors"]);
    $seats = secure($_POST["seats"]);
    $available = isset($_POST["available"]);
    $extras = isset($_POST["extras"]) ? $_POST["extras"] : [];


    if (empty($plate)) {
        $errors = true;
        $plateError = "La matrícula es obligatoria";
    }

    if (empty($brand)) {
        $errors = true;
        $brandError = "La marca es obligatoria";
    }

    if (empty($model)) {
        $errors = true;
        $modelError = "El modelo es obligatorio";
    }

    if (!is_numeric($fabricationYear) || $fabricationYear < 1900 || $fabricationYear > date("Y")) {
        $errors = true;
        $fabricationYearError = "Introduce un año válido";
    }

    if (!is_numeric($consumation) || $consumation <= 0) {
        $errors = true;
        $consumationError = "El consumo debe ser un número positivo";
    }

    if (!is_numeric($pricePerDay) || $pricePerDay <= 0) {
        $errors = true;
        $pricePerDayError = "El precio por día debe ser un número positivo";
    }

    if (!is_numeric($doors) || $doors <= 0) {
        $errors = true;
        $doorsError = "El número de puertas debe ser un entero positivo";
    }

    if (!is_numeric($seats) || $seats <= 0) {
        $errors = true;
        $seatsError = "El número de asientos debe ser un entero positivo";
    }

    if (!$errors) {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/repositories/CarDAO.php";
        $car = new Car($plate, $brand, $model, $fabricationYear, $consumation, $pricePerDay, $available, $doors, $seats, $extras);
        if (CarDAO::create($car)) {
            $_SESSION["plate"] = $plate;
            $_SESSION["brand"] = $brand;
            $_SESSION["model"] = $model;
            $_SESSION["fabricationYear"] = $fabricationYear;
            $_SESSION["consumation"] = $consumation;
            $_SESSION["pricePerDay"] = $pricePerDay;
            $_SESSION["available"] = $available;
            $_SESSION["doors"] = $doors;
            $_SESSION["seats"] = $seats;
            $_SESSION["extras"] = $extras;
            $_SESSION["origin"] = "car";
            $_SESSION["id"] = $car->getId();
            header("Locatio: index.php");
            exit();
        } else {
            $errorBD = "Error al insertar el vehículo en la base de datos";
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
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/layouts/header.php"; ?>
    <?= $errorBD ?>
    <?php if ($errorBD != "") : ?>
        <script>
            alert("Email ya usado");
        </script>
    <?php endif; ?>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/form-car.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php" ?>
</body>

</html>