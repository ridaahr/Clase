<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
    <link rel="stylesheet" href="css/index.css">
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
    $van = new Van("6789ZBD", "Ford", "Transit", new DateTime("2018-04-20"), 9.0, 60, true, 12, 2500);

    $rental1 = new Rental(1, $car, new DateTime("2025-11-01"), new DateTime("2025-11-05"));
    $rental2 = new Rental(2, $moto, new DateTime("2025-11-02"), new DateTime("2025-11-07"));

    $customer1 = new Customer("Rida", "Aharrar", "rida@gmail.com", "1234", "12345678A", 99, rentals: [$rental1]);
    $customer2 = new Customer("Mari", "José", "mari@gmail.com", "1235", "12345678B", 99, rentals: [$rental2]);

    $concessionaire = new Concessionaire("Rida S.A.", [$car, $moto, $van], [$customer1, $customer2]);
    ?>

    <header>
        <p><?= $concessionaire ?></p>
    </header>

    <h3>Vehículos disponibles:</h3>
    <div class="container">
        <div class="vehicle">
            <h2><?= $car->vehicleName() ?></h2>
            <?= $car ?>
        </div>
        <div class="vehicle">
            <h2><?= $moto->vehicleName() ?></h2>
            <?= $moto ?>
        </div>
        <div class="vehicle">
            <h2><?= $van->vehicleName() ?></h2>
            <?= $van ?>
        </div>
    </div>

    <h3>Clientes</h3>
    <div class="container">
        <?php
        foreach ($concessionaire->getCustomers() as $customer) {
            echo "<div class=\"customers\">$customer</div>";
        }
        ?>
    </div>

    <h3>Alquileres:</h3>
    <div class="container">
        <?php
        foreach ($concessionaire->getCustomers() as $customer) {
            foreach ($customer->getRentals() as $rental) {
                echo "<div class='rental'>$rental</div>";
            }
        }
        ?>
    </div>

    <h3>Prueba de métodos de todas las clases</h3>
    <div class="methods">
        <h4>Rental:</h4>
        <p>Días entre fechas (1/11 - 5/11): <?= Rental::calculateTotalDays(new DateTime("2025-11-01"), new DateTime("2025-11-05")) ?> días</p>
        <p>Total alquiler 1: <?= $rental1->calculateTotal() ?>€</p>
        <p>Días restantes alquiler 1: <?= $rental1->calculateLeftDays() ?></p>

        <h4>Vehicle:</h4>
        <p>Coche disponible antes:
            <?php
            if ($car->getAvailable()) {
                echo "Sí";
            } else {
                echo "No";
            }
            ?>
        </p>
        <?php $car->changeAvailability(); ?>
        <p>Coche disponible después:
            <?php
            if ($car->getAvailable()) {
                echo "Sí";
            } else {
                echo "No";
            }
            ?>
        </p>
        <p>Nombre del vehículo: <?= $car->vehicleName() ?></p>

        <h4>Car:</h4>
        <p>Consumo real del coche: <?= $car->calculateConsumation() ?> l/100km</p>
        <p>Información de extras: <?= $car->infoExtras() ?></p>
        <p>Información completa del coche: <?= $car ?></p>

        <h4>Motorbike:</h4>
        <p>Consumo real de la moto: <?= $moto->calculateConsumation() ?> l/100km</p>
        <p>Carnet necesario: <?= $moto->licenseNeeded() ?></p>
        <p>Información completa de la moto: <?= $moto ?></p>

        <h4>Van:</h4>
        <p>Consumo real de la furgoneta: <?= $van->calculateConsumation() ?> l/100km</p>
        <p>Información completa de la furgoneta:</p>
        <?php echo $van ?>

        <h4>Customer:</h4>
        <p>Alquileres de <?= $customer1->getName() ?>:</p>
        <?php echo $customer1->listRentals(); ?>
        <p>Coste total: <?php echo $customer1->totalCost() ?></p>
        <?php
        $newRental = new Rental(3, $van, new DateTime("2025-11-10"), new DateTime("2025-11-15"));
        $customer1->addRental($newRental);
        ?>
        <p>Alquileres de <?= $customer1->getName() ?>:</p>
        <?php echo $customer1->listRentals(); ?>
        <p>Coste total: <?php echo $customer1->totalCost() ?> euros</p>
        <?php $customer1->removeRental(1) ?>
        <p>Alquileres de <?php echo $customer1->getName() ?>:</p>
        <?php echo $customer1->listRentals(); ?>
        <p>Coste total: <?php echo $customer1->totalCost() ?> euros</p>

        <h4>Concesionario:</h4>
        <p>Búsqueda de vehículo por matrícula 5555XYZ: <?= $concessionaire->findVehicleByPlate($concessionaire->getVehicles(), "5555XYZ") ?></p>
        <p>Búsqueda de vehículo por matrícula inexistente: <?= $concessionaire->findVehicleByPlate($concessionaire->getVehicles(), "5555XYAZ") ?></p>
        <p><?php echo $concessionaire->listVehicles() ?></p>
        <p>Nombre del concesionario: <?= $concessionaire->getName() ?></p>
        <p>Listado de clientes:</p>
        <?php echo $concessionaire->listCustomers(); ?>
        <p>Búsqueda de cliente por DNI "12345678A": </p>
        <?php echo $concessionaire->findCustomer("12345678A") ?>
        <p>Búsqueda de cliente por DNI no existente: </p>
        <?php echo $concessionaire->findCustomer("12345678DS") ?>

    </div>

    <div class="footer">
        <?= $concessionaire->getName() ?>
    </div>
</body>

</html>