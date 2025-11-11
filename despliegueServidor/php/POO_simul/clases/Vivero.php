<?php
abstract class Vivero
{
    public function __construct(
        protected string $especie,
        protected float $altura
    ) {
    }

    public function getEspecie()
    {
        return $this->especie;
    }


    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    public function crecer(float $cm) {
        $this->setAltura($this->getAltura() + $cm);
    }

    public function info()
    {
        return $this->getEspecie() . ": " . $this->getAltura() . " cm.";
    }
}