<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Vehicle.php";
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

    /**
     * sirve para calcular el total de días y este en concreto lo he puesto estático
     * ya que no depende de ninguna instancia de Rental y por tanto es algo 
     * útil para Rental, no necesitamos un alquiler en concreto, es una operación
     * general más que nada
     * @param DateTime $start
     * @param DateTime $end
     */
    public static function calculateTotalDays(DateTime $start, DateTime $end)
    {
        return $start->diff($end)->days;
    }

    
    /**
     * calcula los días que le quedan a un alquiler para que se acabe
     */
    public function calculateLeftDays() 
    {
        $today = new DateTime();
        $diff = $today->diff($this->getEnd());

        return ($today < $this->getEnd()) ? $diff->days : 0;
    }

    /**
     * calcula el coste total que tiene el alquiler según los días 
     * y el precio por dia que tiene el vehículo
     * @return float|int
     */
    public function calculateTotal() {
        $days = $this->calculateTotalDays($this->start, $this->end);
        return $days * $this->getVehicle()->getPricePerDay();
    }

    /**
     * información general sobre el alquiler como el id, la matricula, inicio y fin
     * @return string
     */
    public function __toString() {
        $ret = "<h2>Alquiler con id " . $this->getId() . 
        ".</h2> <p>Matricula: " . $this->getVehicle()->getPlate() . ".</p> <p>Inicio: " . $this->getStart()->format('Y-m-d') . 
        ".</p> <p>Fin: " . $this->getEnd()->format('Y-m-d') . ".</p> <p>Total: " . $this->calculateTotal() . "€.</p>";
        return $ret;
    }
}