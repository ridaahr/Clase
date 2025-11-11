<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/ejerciciosU4POO/Clases/Person.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/ejerciciosU4POO/Clases/Employee.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/ejerciciosU4POO/Clases/Manager.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person</title>
    <style>
        * {
            cursor: crosshair;
        }
    </style>
</head>
<body>
    <?php
    $e1 = new Employee("rida", "aharrar", 10000, []);
    $m1 = new Manager("messi", "mendoza", 10000, [], 5);

    var_dump($m1);
    echo ($m1->toHtml() . $m1->calculateSalary());
    var_dump($e1);
    echo ($e1->toHtml() . $e1->calculateSalary());
    ?>
</body>
</html>