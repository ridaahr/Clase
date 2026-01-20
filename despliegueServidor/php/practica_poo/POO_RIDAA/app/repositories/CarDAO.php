<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Car.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";

class CarDAO
{
    public static function create(Car $car)
    {
        $conn = CoreDB::getConnection();
        $sql = "INSERT INTO cars (plate, brand, model, fabricationYear, consumation, pricePerDay, available, doors, seats, extras) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $ps = $conn->prepare($sql);
        $plate = $car->getPlate();
        $brand = $car->getBrand();
        $model = $car->getModel();
        $fabricationYear = $car->getFabricationYear();
        $consumation = $car->getConsumation();
        $pricePerDay = $car->getPricePerDay();
        $available = $car->getAvailable();
        $doors = $car->getDoors();
        $seats = $car->getSeats();
        $extras = implode(", ", $car->getExtras());
        $ps->bind_param("sssiddiiis", $plate, $brand, $model, $fabricationYear, $consumation, $pricePerDay, $available, $doors, $seats, $extras);

        try {
            $ps->execute();
            $car->setId($ps->insert_id);
        } catch (Exception $e) {
            $conn->close();
            return false;
        }

        $conn->close();
        return true;
    }

    /*public static function existsPlate($plate)
    {
        $conn = CoreDB::getConnection();
        $sql = "SELECT id FROM cars WHERE plate = ?";
        $ps = $conn->prepare($sql);
        $ps->bind_param("s", $plate);
        $ps->execute();
        $ps->store_result();
        $exists = $ps->num_rows > 0;
        $ps->close();
        $conn->close();
        return $exists;
    }*/

    public static function deleteAll() {}
}
