<?php
abstract class Vehicle
{
    public function __construct(
        protected string $plate,
        protected string $brand,
        protected string $model,
        protected DateTime $fabricationYear,
        protected float $consumation,
        protected float $pricePerDay,
        protected bool $available
    ) {

    }

    public function getPlate()
    {
        return $this->plate;
    }

    public function setPlate($plate)
    {
        $this->plate = $plate;

        return $this;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function getFabricationYear()
    {
        return $this->fabricationYear;
    }

    public function setFabricationYear($fabricationYear)
    {
        $this->fabricationYear = $fabricationYear;

        return $this;
    }

    public function getConsumation()
    {
        return $this->consumation;
    }

    public function setConsumation($consumation)
    {
        $this->consumation = $consumation;

        return $this;
    }

    public function getPricePerDay()
    {
        return $this->pricePerDay;
    }

    public function setPricePerDay($pricePerDay)
    {
        $this->pricePerDay = $pricePerDay;

        return $this;
    }

    public function getAvailable()
    {
        return $this->available;
    }

    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }
    public abstract function calculateConsumation();

    public function isAvailable() {
        return $this->getAvailable();
    }

    public function vehicleName() {
        return $this->getBrand() . " " . $this->getModel();
    }

    public function changeAvailability() 
    {
        $this->setAvailable(!$this->getAvailable());
    }

    public function __toString()
    {
        $year = $this->getFabricationYear()->format('Y');
        $ret = "con matrícula " . $this->getPlate() . ", " .
            $this->getBrand() . " " . $this->getModel() .
            " del año " . $year .
            ". Consumo de " . $this->getConsumation() . " l/100km. " .
            $this->getPricePerDay() . "€/día.";
        return $ret . ($this->getAvailable() ? " Disponible," : " No disponible.");
    }
}