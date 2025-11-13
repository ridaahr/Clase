<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/despliegueServidor/php/POO_RIDAA/app/models/Vehicle.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/despliegueServidor/php/POO_RIDAA/app/models/Customer.php";
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

    public static function findVehicleByPlate(array $vehicles, string $plate)
    {
        foreach ($vehicles as $v) {
            if ($v->getPlate() === $plate) {
                return "Vehículo encontrado: $v";
            }  
        }
        return "Vehículo no encontrado";
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
        ". Clientes: " . count($this->getCustomers()) . ".";
    }
}