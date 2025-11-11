<?php
class Van extends Vehicle
{
    public function __construct(
        private int $volume,
        private int $maxCapacity,
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

    public function calculateConsumation()
    {
    }
}