<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $host = "127.0.0.1";
    $user = "root";
    $pass = "Sandia4you";
    $db = "shop";
    $port = 3306;
    //Conectamos:
    $conn = new mysqli($host, $user, $pass, $db);

    ?>
</body>
</html>