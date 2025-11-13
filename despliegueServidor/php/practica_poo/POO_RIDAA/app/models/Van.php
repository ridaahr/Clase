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

    /**
     * calculamos el consumo de la furgoneta y que va a depender del volumen y de la capacidad
     * de carga
     * @return float|int el consumo en litros/100km
     */
    public function calculateConsumation()
    {
        $plus = ($this->getVolume() / 1000 + $this->getMaxCapacity() / 1000) * 0.1;
        return $this->consumation + $plus;
    }

    /**
     * muestra información sobre la furgoneta
     * @return string
     */
    public function __toString()
    {
        $ret = "Furgoneta " . parent::__toString() .
            " Con un volumen de " . $this->getVolume() . " cm cúbicos y una capacidad máxima de " .
            $this->getMaxCapacity() . ".";
        return $ret;
    }
}
