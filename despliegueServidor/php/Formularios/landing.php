<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del formulario</title>
</head>

<body>
    <p>Estoy en la landing page</p>
    <?php
    var_dump($_GET);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        ?>
        <p>El nombre es: <?php echo $_GET["name"] ?></p>
        <p>La contraseña es: <?php echo $_GET["pass"] ?></p>
        <?php
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        ?>
        <p>El nombre es: <?php echo $_POST["name"] ?></p>
        <p>La contraseña es: <?php echo $_POST["pass"] ?></p>
        <?php
        if (isset($_POST['genero'])) {
            ?>
            <p>Tu genero es: <?php echo $_POST['genero'] ?></p>
        <?php } else { ?>
            <p>No has elegido ningun genero</p>
            <?php
        }
    }

    ?>


</body>

</html>