<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Rental.php";
class Customer
{
    public function __construct(
        private String $name,
        private String $surname,
        private String $email,
        private String $password,
        private String $dni,
        private int $age,
        private array $rentals = [],
        private int $id = -1
    ) {}

    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getDni()
    {
        return $this->dni;
    }
    public function setDni(string $dni)
    {
        $this->dni = $dni;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function getRentals()
    {
        return $this->rentals;
    }
    public function setRentals($rentals)
    {
        $this->rentals = $rentals;
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

    /**
     * sirve para agregar un alquiler nuevo
     * @param Rental $rental
     * @return void
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * sirve para eliminar un alquiler en función del id
     * @param int $id
     * @return void
     */
    public function removeRental(int $id)
    {
        foreach ($this->getRentals() as $key => $r) {
            if ($r->getId() == $id) {
                unset($this->rentals[$key]);
            }
        }
    }

    /**
     * sirve para mostrar los alquileres del cliente
     * @return void
     */
    public function listRentals(): string
    {
        if (empty($this->getRentals())) {
            return "No hay alquileres.<br>";
        }
        $ret = "";
        foreach ($this->getRentals() as $r) {
            $ret .= $r . "<br>";
        }
        return $ret;
    }

    /**
     * nos va a devolvere el coste total en función de los días y del
     * coste que tiene cada vehículo
     * @return int
     */
    public function totalCost()
    {
        $sum = 0;
        foreach ($this->rentals as $r) {
            $sum += $r->calculateTotal();
        }
        return $sum;
    }

    /**
     * un resumen del cliente con información importante
     * @return string
     */
    public function __toString(): string
    {
        $rentalsCount = count($this->rentals);
        return "<p>Cliente: " . $this->getName() . " " . $this->getSurname() .
            ".</p> <p>Alquileres: " . $rentalsCount .
            ".</p> <p>Coste total: " . $this->totalCost() . "€.</p> <p>ID: " . $this->getId() . "</p>";
    }
}
