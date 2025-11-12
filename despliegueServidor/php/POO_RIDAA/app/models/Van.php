<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Vehicle.php";
class Van extends Vehicle
{
    public function __construct(
        $plate,
        $brand,
        $model,
        $fabricationYear,
        $consumation,
        $pricePerDay,
        $available,
        private int $volume,
        private int $maxCapacity,
    ) {
        parent::__construct($plate, $brand, $model, $fabricationYear, $consumation, $pricePerDay, $available);
    }

    public function getVolume()
    {
        return $this->volume;
    }

    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    public function getMaxCapacity()
    {
        return $this->maxCapacity;
    }

    public function setMaxCapacity($maxCapacity)
    {
        $this->maxCapacity = $maxCapacity;
        return $this;
    }

    public function __toString() {
        $ret = "Furgoneta " . parent::__toString() . 
        " con un volumen de " . $this->getVolume() . " cm cúbicos y una capacidad máxima de " . 
        $this->getMaxCapacity();
        return $ret;
    }

    public function calculateConsumation() {}
}
