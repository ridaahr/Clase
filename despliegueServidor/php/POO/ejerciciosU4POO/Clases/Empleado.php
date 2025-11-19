<?php
class Empleado
{
    public function __construct(
        private string $name,
        private string $surname,
        private float $salary = -1,
        private $numbers,
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

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    public function getNombreCompleto()
    {
        return $this->name . " " . $this->surname;
    }

    public function pagarImpuestos(): float
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

    public function anadirTelefono($telefono)
    {
        $this->numbers[] = $telefono;
        return $this->numbers;
    }

    public function listarTelefonos()
    {
        $telefonos = "";
        foreach ($this->numbers as $telefono) {
            $telefonos .= $telefono . ", ";
        }
        return $telefonos;
    }

    public function vaciarTelefonos(): void
    {
        if (count($this->numbers) > 0) {
            while (count($this->numbers) > 0) {
                array_pop($this->numbers);
            }
        }
    }

    public function toHtml(): string
    {
        $ret = "Empleado: " . $this->getName() . " " . $this->getSurname() . ". Sueldo: " . $this->salary . " ";
        if (count($this->numbers) > 0) {
            $ret .= "<ul>";
            foreach ($this->numbers as $telefono) {
                $ret .= "<li>$telefono</li>";
            }
            $ret .= "</ul>";
        }
        return "<p>$ret</p>";
    }

    public function __toString()
    {
        return "<p>Empleado: " . $this->name . " " . $this->surname . ". Sueldo: " . $this->salary . ".</p>";
    }
}