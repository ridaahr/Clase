<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/PcDAO.php";
    $pc = new Pc("asus199", "andrea", "Asus", 1364.1);
    $c1 = new Component("ssd", "samsung", "58H");
    $c2 = new Component("ram", "samsung", "W526");
    $c3 = new Component("mouse", "logitech", "asd");
    $pc->addComponent($c1);
    $pc->addComponent($c2);
    $pc->addComponent($c3);

    //Lo añado a la BD:

    echo PcDAO::read("asus199");

    ?>
</body>
</html>