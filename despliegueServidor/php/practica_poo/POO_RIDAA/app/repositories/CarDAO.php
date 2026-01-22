<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Car.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";

class CarDAO
{
    /**
     * Sirve para crear un vehículo pasándole un objeto de tipo Car
     * @param Car $car le pasamos un car
     * @return bool devuelve true o false dependiendo de si se crea o no
     */
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


    /**
     * lee todos los coches que hay en la bbdd
     * @return Car[] devuelve un array de todos los coches
     */
    public static function readAll()
    {
        $conn = CoreDB::getConnection();
        $cars = [];
        $res = $conn->query("select * from cars");
        while (($f = $res->fetch_assoc()) != null) {
            $extrasStr = isset($f['extras']) ? (string)$f['extras'] : '';
            $extrasStr = trim($extrasStr);
            $extrasArr = ($extrasStr === '')
                ? []
                : array_map('trim', explode(', ', $extrasStr));
            $availableBool = ((int)$f['available']) === 1;
            $cars[] = new Car(
                $f["plate"],
                $f["brand"],
                $f["model"],
                $f["fabricationYear"],
                $f["consumation"],
                $f["pricePerDay"],
                $availableBool,
                $f["doors"],
                $f["seats"],
                $extrasArr,
                $f["id"]
            );
        }
        $conn->close();
        return $cars;
    }

    /**
     * borra un coche de la bbdd mediante la id que le pasemos
     * @param mixed $id le pasamos un id
     * @return bool devuelve true o false dependiendo si se borró o no
     */
    public static function deleteById($id)
    {
        $conn = CoreDB::getConnection();
        $sql = "DELETE FROM cars where id = ?;";
        $ps = $conn->prepare($sql);
        $ps->bind_param("i", $id);

        try {
            $ps->execute();
        } catch (Exception $e) {
            $conn->close();
            return false;
        }
        $conn->close();
        return true;
    }
}