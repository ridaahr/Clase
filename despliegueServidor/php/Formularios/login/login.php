<?php
session_start();    //abro sesión: voy a utilizar $_SESSION


$name = $pass = $terms = "";
$termsError = $nameError = "";
$errores = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/Formularios/utils.php";
    $name = secure($_POST["name"]);
    $pass = secure($_POST["pass"]);

    //var_dump($_POST);
    if (isset($_POST["terms"])) {
        $terms = $_POST["terms"];
    } else {
        $errores = true;
        $termsError = "Es obligatorio aceptar los términos";
    }

    //Esto en realidad lo puedo verificar por HTML, 
    //pero también se podría hacer en el servidor (aunque es peor práctica)
    if (strlen($name) < 3 || strlen($name) > 15){
        $nameError = "La longitud entre 3 y 15";
        $errores = true;
    }


    //Si está todo bien: a index,
    //si no, me quedo.
    if (!$errores){
        $_SESSION["name"] = $name;
        $_SESSION["pass"] = $pass; 
        $_SESSION["origin"] = "login";  //este me viene bien para saber en el index de dónde vengo
        $_SESSION["terms"] = $terms;
        $_SESSION["test"] = 45.9;   //este no vale para nada
        //Hago de la cookie permanecer logueado
        setcookie("logged", $name, time() + 30*24*60*60, "/");
        //Redirijo:
        //header("Location: indexprovisional.php");
        header("Location: ../indexv2.php");
        //termino el script
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../formularios.css" rel="stylesheet">
</head>

<body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="name">Nombre:</label>
        <input type="text" placeholder="Nombre..." name="name" 
            id="name" value="<?= $name ?>" >
            <?= "<p class='error'> " . $nameError . "</p>" ?>
        <br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass" >
        <br>
        <input type="checkbox" name="terms" id="terms" value="t" 
            class="<?= empty($termsError) ? "" : "checkError" ?>">
        <label for="terms"
            class="<?= empty($termsError) ? "" : "checkError" ?>">
            Acepto los términos</label>
        <?= "<p class='error'> " . $termsError . "</p>" ?>
        

        <input type="checkbox" name="logged" id="logged">
        <label for="logged">Quiero permanecer regitrado</label><br>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>