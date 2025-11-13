<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/despliegueServidor/php/POO_RIDAA/app/models/Vehicle.php";
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

    public function setIncludesHelmet()
    {
        return $this->getIncludesHelmet();
    }

    public function calculateConsumation()
    {
        if ($this->getHorsePower() <= 50) {
            $consumo = 0.9;
        } elseif ($this->getHorsePower() <= 125) {
            $consumo = 1.0;
        } elseif ($this->getHorsePower() <= 300) {
            $consumo = 1.2;
        } else {
            $consumo = 1.5;
        }

        return $this->getConsumation() * $consumo;
    }

    public function licenseNeeded() 
    {
        if ($this->getHorsePower() <= 50) {
            return "AM (ciclomotor)";
        } elseif ($this->getHorsePower() <= 125) {
            return "A1";
        } elseif ($this->getHorsePower() <= 300) {
            return "A2";
        } else {
            return "A";
        }
    }

    public function __toString() {
        $ret = "Moto " . parent::__toString() . 
        " con una potencia de " . $this->getHorsePower() . " cv"; 
        if ($this->getIncludesHelmet()) {
            return $ret . " e incluye casco.";
        } else {
            return $ret . " y no incluye casco.";
        }
    }
}