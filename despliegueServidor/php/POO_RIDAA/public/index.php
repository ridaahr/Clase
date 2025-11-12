<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
</head>

<body>
    <?php


    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Vehicle.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Car.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Motorbike.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Van.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Rental.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Customer.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Concessionaire.php";

    $car = new Car("1234ABC", "Toyota", "Yaris", new DateTime("2020-01-01"), 6.2, 40, true, 5, 5, ["Aire acondicionado", "GPS"]);
    $moto = new Motorbike("5555XYZ", "Yamaha", "MT-07", new DateTime("2021-06-15"), 4.5, 30, true, 75, true);
    $van = new Van("8888ZZZ", "Ford", "Transit", new DateTime("2018-04-20"), 9.0, 60, true, 12, 2500);

    $concessionaire = new Concessionaire("Rida S.A.", [$car, $moto, $van], []);

    $customer = new Customer("Carlos", "García", "carlos@example.com", "1234", "12345678A", 30, []);

    $rental1 = new Rental(1, $car, new DateTime("2025-11-01"), new DateTime("2025-11-05"));
    $rental2 = new Rental(2, $moto, new DateTime("2025-11-02"), new DateTime("2025-11-07"));

    $customer->setRentals([$rental1, $rental2]);

    echo "<h3>Vehículos disponibles:</h3>";
    echo "<p>$car</p>";
    echo "<p>$moto</p>";
    echo "<p>$van</p>";

    echo "<h3>Cliente y alquileres:</h3>";
    echo "<p>$customer</p>";

    echo "<h3>Alquileres:</h3>";
    foreach ($customer->getRentals() as $rental) {
        echo "<p>$rental</p>";
    }

    echo "<h3>Prueba de métodos:</h3>";
    echo "<p><strong>Días entre fechas:</strong> " . Rental::calculateTotalDays(new DateTime("2025-11-01"), new DateTime("2025-11-05")) . " días</p>";
    echo "<p><strong>Total alquiler 1:</strong> " . $rental1->calculateTotal() . "€</p>";
    echo "<p><strong>Días restantes alquiler 1:</strong> " . $rental1->calculateLeftDays() . "</p>";

    echo "<h3>Disponibilidad del coche antes y después de cambiar:</h3>";

    echo "<p>Antes: ";
    if ($car->getAvailable()) {
        echo "Disponible";
    } else {
        echo "No disponible";
    }
    echo "</p>";

    $car->changeAvailability();

    echo "<p>Después: ";
    if ($car->getAvailable()) {
        echo "Disponible";
    } else {
        echo "No disponible";
    }
    echo "</p>";

    echo "<h3>Búsqueda de vehículo en el concesionario:</h3>";
    $found = $concessionaire->findVehicleByPlate($concessionaire->getVehicles(), "5555XYZ");
    echo $found ? "<p>Vehículo encontrado: $found</p>" : "<p>No encontrado.</p>";

    echo "<h3>Concesionario:</h3>";
    echo "<p>$concessionaire</p>";

    ?>
</body>

</html>