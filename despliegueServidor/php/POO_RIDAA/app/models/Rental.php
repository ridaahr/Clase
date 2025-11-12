<?php
class Rental
{
    public function __construct(
        private int $id,
        private $vehicle,
        private DateTime $start,
        private DateTime $end,
    ) {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getVehicle()
    {
        return $this->vehicle;
    }

    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    public static function calculateTotalDays(DateTime $start, DateTime $end): int
    {
        return $start->diff($end)->days;
    }

    public function calculateTotal() {
        $sum = 0;
        
    }

    public function __toString() {
        $ret = "Alquiler con id " . $this->getId() . 
        ". " . $this->getVehicle() . " Inicio: " . $this->getStart() . 
        ". Fin: " . $this->getEnd() . ".";
        return $ret;
    }
}