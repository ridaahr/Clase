<?php
class Concessionaire
{
    public function __construct(
        private string $name,
        private $vehicles,
        private $customers
    ) {
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getVehicles()
    {
        return $this->vehicles;
    }


    public function setVehicles($vehicles)
    {
        $this->vehicles = $vehicles;

        return $this;
    }


    public function getCustomers()
    {
        return $this->customers;
    }

    public function setCustomers($customers)
    {
        $this->customers = $customers;

        return $this;
    }

    public static function findVehicleByPlate(array $vehicles, string $plate): ?Vehicle
    {
        foreach ($vehicles as $v) {
            if ($v->getPlate() === $plate) {
                return $v;
            }
        }
        return null;
    }

    public function listVehicles() {

    }

    public function listCustomers() {

    }

    public function findCustomer() {

    }

    public function __toString() {
        return "Concesionario " . $this->getName() .
        " Vehículos: " . count($this->getVehicles()) .
        " Clientes: " . count($this->getCustomers()) . ".";
    }
}