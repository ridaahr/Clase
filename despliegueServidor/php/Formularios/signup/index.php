<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
</head>

<body>
    <p>En esta página:</p>
    <ol>
        <li>Se comprueba que ha llegado a través de POST</li>
        <li>Haz var_dump($_POST)</li>
        <li>Se instancia un objeto User</li>
        <li>Se muestra el user creado(toString)</li>
    </ol>
    <?php
    require $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/Formularios/signup/User.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $pass2 = $_POST["pass2"];
        $age = $_POST["age"];

        $u = new User($name, $pass, $email, $age);
        echo "<p    >$u</p>";
    } else {
        echo "<p>No puedes estar aquí.</p>";
    }
    ?>
</body>

</html>