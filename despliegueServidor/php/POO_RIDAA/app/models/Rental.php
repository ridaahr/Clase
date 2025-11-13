<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/despliegueServidor/php/POO_RIDAA/app/models/Vehicle.php";
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

    public static function calculateTotalDays(DateTime $start, DateTime $end)
    {
        return $start->diff($end)->days;
    }

    public function calculateLeftDays() 
    {
        $today = new DateTime();
        $diff = $today->diff($this->getEnd());

        return ($today < $this->getEnd()) ? $diff->days : 0;
    }

    public function calculateTotal() {
        $days = $this->calculateTotalDays($this->start, $this->end);
        return $days * $this->vehicle->getPricePerDay();
    }

    public function __toString() {
        $ret = "<h2>Alquiler con id " . $this->getId() . 
        ".</h2> <p>Matricula: " . $this->getVehicle()->getPlate() . ".</p> <p>Inicio: " . $this->getStart()->format('Y-m-d') . 
        ".</p> <p>Fin: " . $this->getEnd()->format('Y-m-d') . ".</p> <p>Total: " . $this->calculateTotal() . "€.</p>";
        return $ret;
    }
}