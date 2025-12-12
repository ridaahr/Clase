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
    require $_SERVER["DOCUMENT_ROOT"] ."/despliegueServidor/php/U4AccesoADatos/pc/ComponentDAO.php";
    try {
        $conn = new mysqli("127.0.0.1", "root", "Sandia4you", "shop"); //Puerto default 3306
        echo "Dentro";
    } catch (Exception $e) {
        echo "<p>Error en la conexión: {$e->getMessage()}</p>";
        echo "<p>No puedo continuar</p>";
        exit();
    }
    
    $c = new Component("Procesador", "Intel", "i9");
    //ComponentDAO::create($c);
    $c2 = new Component("Procesador", "Intel", "i7");
    //ComponentDAO::create($c2);
    $c3 = new Component("Procesador", "Intel", "i3", 3);
    //ComponentDAO::create($c3);
    //ComponentDAO::update($c3);
    //ComponentDAO::delete(4);
    $components = ComponentDAO::readAll();
    foreach ($components as $component) {
        echo "<p>$component</p>";
    }
    ?>
</body>
</html>