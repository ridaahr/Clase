<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require $_SERVER["DOCUMENT_ROOT"] ."/despliegueServidor/php/U4AccesoADatos/pc/Component.php";
    try {
        $conn = new mysqli("127.0.0.1", "root", "Sandia4you", "shop"); //Puerto default 3306
        echo "Dentro";
    } catch (Exception $e) {
        echo "<p>Error en la conexión: {$e->getMessage()}</p>";
        echo "<p>No puedo continuar</p>";
        exit();
    }
    
    $c = new Component("Procesador", "Intel", "i9");
    Component::create($c, $conn);
    ?>
</body>
</html>