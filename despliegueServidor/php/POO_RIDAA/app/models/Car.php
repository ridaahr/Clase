<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Vehicle.php";
class Car extends Vehicle
{
    public function __construct(
        $plate,
        $brand,
        $model,
        $fabricationYear,
        $consumation,
        $pricePerDay,
        $available,
        private int $doors,
        private int $seats,
        private array $extras,
    ) {
        parent::__construct($plate, $brand, $model, $fabricationYear, $consumation, $pricePerDay, $available);
    }
    public function calculateConsumation()
    {
    }

    public function getDoors()
    {
        return $this->doors;
    }

    public function setDoors($doors)
    {
        $this->doors = $doors;

        return $this;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    public function getExtras()
    {
        return $this->extras;
    }

    public function setExtras($extras)
    {
        $this->extras = $extras;

        return $this;
    }

    public function infoExtras()
    {
        if (empty($this->getExtras())) return "";
        return " Extras: " . implode(", ", $this->getExtras()) . ".";
    }

    public function __toString() {
        $ret = "Coche " . parent::__toString() . 
        " con " . $this->getDoors() . " puertas y " . 
        $this->getSeats() . " asientos."; 
        return $ret . $this->infoExtras();
    }
}