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

    public function __toString() {
        $ret = "Moto " . parent::__toString() . 
        " con una potencia de " . $this->getHorsePower() . " cv."; 
        if ($this->getIncludesHelmet()) {
            return $ret . " e incluye casco";
        } else {
            return $ret . " y no incluye casco";
        }
    }
}