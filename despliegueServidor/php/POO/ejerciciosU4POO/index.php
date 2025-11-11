<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/ejerciciosU4POO/Clases/Empleado.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado</title>
</head>
<body>
    <?php

    $e1 = new Empleado("rida", "aharrar", 254234, ["634232532"]);
    echo $e1;
    echo "<p>" . $e1->getNombreCompleto() . "</p>";
    echo $e1->pagarImpuestos();



    $e1->anadirTelefono("634123124");
    echo "<p>" . $e1->listarTelefonos() . "</p>";
    echo $e1->toHtml();
    $e1->vaciarTelefonos();
    echo $e1->toHtml()
    ?>
</body>
</html>