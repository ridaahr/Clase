<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Vehicle.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Customer.php";
class Concessionaire
{
    public function __construct(
        private string $name,
        private $vehicles,
        private $customers
    ) {}

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

    /**
     * busca un vehículo dependiendo de la matrícula y este le he puesto estático
     * pensando en que voy a buscar el vehículo en una lista de vehículos que le pase
     * y no del concesionario actual aunque más adelante si quee tendría menos sentido
     * si lo quiero para mi concesionario concreto, lo pongo más que nada como prueba
     * @param array $vehicles
     * @param string $plate
     * @return string
     */
    public static function findVehicleByPlate(array $vehicles, string $plate)
    {
        foreach ($vehicles as $v) {
            if ($v->getPlate() === $plate) {
                return "Vehículo encontrado: $v";
            }
        }
        return "Vehículo no encontrado";
    }

    /**
     * lista los vehiculos de mi concesionario
     * @return string
     */
    public function listVehicles()
    {
        if (empty($this->vehicles)) {
            return "No hay vehículos en el concesionario.<br>";
        }
        $ret = "Listado de vehículos:<br>";
        foreach ($this->vehicles as $v) {
            $ret .= $v->vehicleName() . ": " . $v . "<br>";
        }
        return $ret;
    }

    /**
     * lista los clientes que tengo registrados en mi concesionario
     * @return string
     */
    public function listCustomers()
    {
        if (empty($this->customers)) {
            return "No hay clientes registrados.<br>";
        }

        $ret = " ";
        foreach ($this->customers as $c) {
            $ret .= $c;
        }
        return $ret;
    }

    /**
     * para buscar un cliente en mi concesionario y lo devuelve si lo encuentra
     * y si no me devuelve qu eno se ha encontrado
     * @param mixed $search
     * @return string
     */
    public function findCustomer($search)
    {
        foreach ($this->customers as $c) {
            if ($c->getDni() === $search || $c->getEmail() === $search) {
                return "Cliente encontrado: $c";
            }
        }
        return "Cliente no encontrado.";
    }

    /**
     * información general del concesionario
     * @return string
     */
    public function __toString()
    {
        return "Concesionario " . $this->getName() .
            " Vehículos: " . count($this->getVehicles()) .
            ". Clientes: " . count($this->getCustomers()) . ".";
    }
}
