<?php

class Minotauro{
    //atributos fuera
    private float $percetage;
    //atributos dentro del constructo
    public function __construct(
        private string $name,
        private int $age = -1,
    ){
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

        public function __tostring() {
            return $this->name ." tiene ". $this->age . " años ";
        }
}