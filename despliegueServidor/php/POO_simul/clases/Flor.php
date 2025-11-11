<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO_simul/clases/Vivero.php";
class Flor extends Vivero
{
    public function __construct(
        private string $mesFloracion,
        $especie,
        $altura
    ) {
        parent::__construct($especie, $altura);
    }

    public function getMesFloracion()
    {
        return $this->mesFloracion;
    }
    

    public function __toString()
    {
        $ret = parent::info();
        return $ret . " Su mes de floración es " . $this->getMesFloracion();
    }
}