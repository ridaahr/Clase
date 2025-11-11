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
}