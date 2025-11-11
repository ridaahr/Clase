<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/ejerciciosU4POO/Clases/Person.php";
class Manager extends Person
{
    public function __construct(
        $name,
        $surname,
        $salary,
        $telephones = [],
        private int $seniority = 0,
    ) {
        parent::__construct($name, $surname, $salary, $telephones);
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

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    public function getTelephones()
    {
        return $this->telephones;
    }

    public function setTelephones($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    public function getSeniority()
    {
        return $this->seniority;
    }


    public function setSeniority($seniority)
    {
        $this->seniority = $seniority;

        return $this;
    }
    public function getFullName(): string
    {
        return $this->getName() . " " . $this->getSurname();

    }

    public function payTaxes(): float
    {
        if ($this->getSalary() == -1) {
            return -1;
        } else {
            if ($this->getSalary() >= 0 && $this->getSalary() < 12450) {
                return $this->getSalary() * 0.19;
            } elseif ($this->getSalary() >= 12450 && $this->getSalary() <= 20199) {
                return $this->getSalary() * 0.24;
            } elseif ($this->getSalary() > 20199 && $this->getSalary() <= 35199) {
                return $this->getSalary() * 0.30;
            } elseif ($this->getSalary() >= 35200 && $this->getSalary() <= 59999) {
                return $this->getSalary() * 0.37;
            } elseif ($this->getSalary() >= 60000 && $this->getSalary() <= 299999) {
                return $this->getSalary() * 0.45;
            } else {
                return $this->getSalary() * 0.47;
            }
        }
    }

    public function addTelephone($telephone)
    {
        $this->telephones[] = $telephone;
        return $this->telephones;
    }

    public function listTelephones()
    {
        $telephones = "";
        foreach ($this->telephones as $telephone) {
            $telephones .= $telephone . ", ";
        }
        return $telephones;
    }

    public function emptyTelephones(): void
    {
        if (count($this->telephones) > 0) {
            while (count($this->telephones) > 0) {
                array_pop($this->telephones);
            }
        }
    }

    public function toHtml(): string
    {
        $ret = "Empleado: " . $this->getName() . " " . $this->getSurname() . ". Sueldo: " . $this->salary . " ";
        if (count($this->telephones) > 0) {
            $ret .= "<ul>";
            foreach ($this->telephones as $telefono) {
                $ret .= "<li>$telefono</li>";
            }
            $ret .= "</ul>";
        }
        return "<p>$ret</p>";
    }

    public function calculateSalary()
    {
        return ($this->salary - $this->payTaxes()) + 50 * $this->getSeniority();
    }
}