<?php

abstract class Polygon
{
    public function __construct(
        protected float $side
    ) {
        $this->side = $side;
    }

    public function getSide() {
        return $this->side;
    }
    public abstract function calculateArea(): float;

    public function __toString() {
        $ret = "Polígono de lado: " . $this->side . ".";
        return $ret;
    }
}