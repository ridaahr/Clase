<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO_simul/clases/Vivero.php";
class Arbol extends Vivero
{
    public function __construct(
        private bool $perene,
        $especie,
        $altura
    ) {
        parent::__construct($especie, $altura);
    }

    public function getPerene()
    {
        return $this->perene;
    }

    
    public function __toString(): string
    {
        $ret = parent::info();
        if ($this->getPerene()) {
            return $ret . " Sí es perenne.";
        } else {
            return $ret. " No es perenne.";
        }
    }
}