<?php
session_start();
$plate = $brand = $model = "";
$consumation = $pricePerDay = 0.0;
$fabricationYear = date("Y-m-d");
$available = true;
$doors = $seats = 0;
$extras = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/functions.php";
    $plate = secure($_POST[$plate]);
    $brand = secure($_POST[$brand]);
    $model = secure($_POST[$model]);
    $fabricationYear = secure($_POST[$model]);
    $consumation = secure($_POST[$model]);
    $pricePerDay = secure($_POST[$model]);
    $available = secure($_POST[$model]);
    $doors = secure($_POST[$model]);
    $seats = secure($_POST[$model]);
    if (isset($_POST["extras"])) {
        $extras = $_POST["extras"];
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
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/form-car.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php" ?>
</body>

</html>