<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Car.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";

class CarDAO {
    public static function create(Car $car) {
        $conn = CoreDB::getConnection();
        $sql = "INSERT INTO cars (brand, model, fabricationYear, consumation, pricePerDay, available, doors, seats, extras) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $date = $car->getFabricationYear()->format('Y-m-d');
    }
}
