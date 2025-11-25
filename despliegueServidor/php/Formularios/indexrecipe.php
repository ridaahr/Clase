<?php
session_start();
if (!isset($_SESSION["origin"]) or $_SESSION["origin"] != "recipe") {
    header("Location: /recipes/formrecipe.php");
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
    <p>Correcto</p>
</body>
</html>