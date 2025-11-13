<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Vehicle.php";
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

    
    /**
     * nos va a mostrar que tipo de carnet vamos a necesitar
     * en función de la potencia de la moto
     * @return string
     */
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

    /**
     * calcula el consumo en función de la potencia de la moto
     * @return float el consumo en litros/100km
     */
    public function calculateConsumation()
    {
        if ($this->getHorsePower() <= 50) {
            $consum = 0.9;
        } elseif ($this->getHorsePower() <= 125) {
            $consum = 1.0;
        } elseif ($this->getHorsePower() <= 300) {
            $consum = 1.2;
        } else {
            $consum = 1.5;
        }

        return $this->getConsumation() * $consum;
    }

    /**
     * descripción de la moto
     * @return string
     */
    public function __toString() {
        $ret = "Moto " . parent::__toString() . 
        " Con una potencia de " . $this->getHorsePower() . " cv"; 
        if ($this->getIncludesHelmet()) {
            return $ret . " e incluye casco.";
        } else {
            return $ret . " y no incluye casco.";
        }
    }
}