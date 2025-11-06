<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/geometry/Polygon.php"; 
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/geometry/Paint.php"; 
class Square extends Polygon implements Paint
{
    //atributo no estático:
    public int $nonStaticAtr = 0;

    //atributo estático
    public static int $staticAtr = 0;

    /**
     * Get the value of staticAtr
     */ 
    public function getStaticAtr()
    {
        return $this->staticAtr;
    }
    
    /*
    public function calculateArea(): float {
         return $this->side * $this->side;
    }*/

    /* asi lo haria sin constructor */
    public function calculateArea(): float {
         return $this->getSide()**2;
    }
    

    public function __toString() {
        return "<p>Estático: " . Square::$staticAtr . 
        " - No estático: " . $this->nonStaticAtr . "</p>";
    }

    public static function calculateAnyArea($side) {
        return $side**2;
    }

    public function draw(){
        return "dibujo de un cuadrado";
    }
    
}