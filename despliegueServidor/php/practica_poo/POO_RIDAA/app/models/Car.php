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

    /**
     * sirve para mostrar información de los extras del vehículo, si no tiene devuelve
     * un string vacío
     * @return string con los extras
     */
    public function infoExtras()
    {
        if (empty($this->getExtras())) return "";
        return " Extras: " . implode(", ", $this->getExtras()) . ".";
    }

    /**
     * para calcular el consumo del coche, en este caso se le suma al consumo
     * un multiplicador dependiendo de las puertas y asientos, suponiendo que 
     * va a dar más peso al coche y por tanto más consumo
     * @return float|int el consumo en litros/100km
     */
    public function calculateConsumation()
    {
        $extraDoors = $this->getDoors() * 0.1;
        $extraSeats = $this->getSeats() * 0.05;
        return $this->consumation + $extraDoors + $extraSeats;
    }

    /**
     * para mostrar información del vehículo en general
     * @return string
     */
    public function __toString()
    {
        $ret = "Coche " . parent::__toString() .
            " Con " . $this->getDoors() . " puertas y " .
            $this->getSeats() . " asientos.";
        return $ret . $this->infoExtras();
    }
}
