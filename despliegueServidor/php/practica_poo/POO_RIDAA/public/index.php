<?php
session_start();

if (!(isset($_COOKIE["stay-connected"]) || isset($_SESSION["origin"]))) {
    $_SESSION["error"] = "Tienes que iniciar sesión primero";
    header("Location: login.php");
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
    }
}

$name = $surname = "";

if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
}

if (isset($_SESSION["surname"])) {
    $surname = $_SESSION["surname"];
}

$isLogged = isset($_SESSION["origin"]) || isset($_COOKIE["stay-connected"]);
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/repositories/CarDAO.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Car.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php";

$plate = $brand = $model = $fabricationYear = $consumation = $pricePerDay = "";
$available = false;
$doors = $seats = 0;
$extras = [];

$plateError = $brandError = $modelError = $fabricationYearError = "";
$consumationError = $pricePerDayError = $doorsError = $seatsError = $errorBD = "";
$errors = false;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_car']) && isset($_POST['car_id'])) {
        $carId = $_POST['car_id'];
        CarDAO::deleteById($carId);
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }

    if (isset($_POST['create_car']) && isset($_POST["plate"])) {
        $plate = secure($_POST["plate"]);
        $brand = secure($_POST["brand"]);
        $model = secure($_POST["model"]);
        $fabricationYear = secure($_POST["fabricationYear"]);
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
            $car = new Car($plate, $brand, $model, $fabricationYear, $consumation, $pricePerDay, $available, $doors, $seats, $extras);
            if (CarDAO::create($car)) {
                header("Location: index.php");
                exit();
            } else {
                $errorBD = "El vehículo con esa matrícula ya existe";
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
    <title>Concesionario</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php" ?>

    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Vehicle.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Car.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Motorbike.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Van.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Rental.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Customer.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Concessionaire.php";
    ?>
    <div class="welcome">
        <h1>Bienvenido, <?= $name . " " . $surname ?> 👋</h1>
    </div>
    <?php
    $cars = CarDAO::readAll();
    if (empty($cars)) {
        echo "<p class=\"info\">No hay coches registrados.</p>";
    } else {
        echo "<ul class=\"list-cars\">";
        foreach ($cars as $car) {
            echo "<li>$car</li>";
        }
        echo "</ul>";
    }
    ?>
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/form-car.php"; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/components/form-delete.php" ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php" ?>

</body>

</html>