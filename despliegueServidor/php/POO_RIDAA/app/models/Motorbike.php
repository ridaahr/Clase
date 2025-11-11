<?php
class Motorbike extends Vehicle
{
    public function __construct(
        $plate,
        $brand,
        $model,
        $fabricationYear,
        $consumation,
        $pricePerDay,
        $available,
        private int $horsePower,
        private bool $includesHelmet,
    ) {
        parent::__construct($plate, $brand, $model, $fabricationYear, $consumation, $pricePerDay, $available);
    }

    public function getHorsePower()
    {
        return $this->horsePower;
    }

    public function setHorsePower($horsePower)
    {
        $this->horsePower = $horsePower;

        return $this;
    }

    public function getIncludesHelmet()
    {
        return $this->includesHelmet;
    }

    public function setIncludesHelmet($includesHelmet)
    {
        $this->includesHelmet = $includesHelmet;

        return $this;
    }

    public function calculateConsumation()
    {
    }
}