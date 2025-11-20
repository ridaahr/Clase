<?php
session_start();
if (isset($_SESSION["origin"]) && $_SESSION["origin"] == "form") {
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];
    $pass2 = $_SESSION["pass2"];
    $studies = $_SESSION["studies"];
} else {
    header("Location: signupv2.php");
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
    session_start();
    ?>
</body>

</html>                                                                                                                                                                                                                                                                                