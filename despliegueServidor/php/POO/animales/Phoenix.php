<?php

class Phoenix
{
    private string $name;
    private int $age = 1;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
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

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function happyBirthday() {
        if ($this->age == -1) {
            return false;
        } else {
            $this->age++;
            return $this;
        }
    }
}