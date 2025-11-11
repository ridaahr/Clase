<?php
class Car extends Vehicle
{
    public function __construct(
        private int $doors,
        private int $seats,
        private $extras,
        $plate,
        $brand,
        $model,
        $fabricationYear,
        $consumation,
        $pricePerDay,
        $available
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
}