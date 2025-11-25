<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php

    //session_start();  //Mejor al principio

    if (!isset($_SESSION["origin"])) {
        header("Location: login.php");
    }

    var_dump($_SESSION);
    echo "<p>Te damos la bienvenida " .
        $_SESSION['name']
        . "</p>";

    ?>
</body>

</html>