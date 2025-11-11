<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Rental.php";
class Customer {
    public function __construct(
        private String $name,
        private String $surname,
        private String $email,
        private String $password,
        private String $dni,
        private int $age,
        private array $rentals
    ) {}
    
    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getSurname(): string {
        return $this->surname;
    }
    public function setSurname(string $surname): void {
        $this->surname = $surname;
    }

    public function getEmail(): string {
        return $this->email;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getDni(): string {
        return $this->dni;
    }
    public function setDni(string $dni): void {
        $this->dni = $dni;
    }

    public function getAge(): int {
        return $this->age;
    }
    public function setAge(int $age): void {
        $this->age = $age;
    }

    public function getRentals() {
        return $this->rentals;
    }
    public function setRentals($rentals): void {
        $this->rentals = $rentals;
    }

    public function addRental(Rental $rental) {
        $this->getRentals()[] = $rental;
    }

    public function removeRental(int $id)
    {
        foreach ($this->rentals as $key => $rental) {
            if ($rental->getId() == $id) {
                unset($this->rentals[$key]);
            }
        }
    }

    public function listRentals() {
        foreach ($this->rentals as $key => $r) {

        }
    }

    public function totalCost() {
        $sum = 0;
        foreach ($this->rentals as $r) {
            $sum += $r->calculateTotal();
        }
    }
}