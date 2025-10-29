<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/sports/Sport.php";
class Tennis extends Sport
{
    public function __construct(
        private string $court,
        private $rackets,
        $type,
        $contact,
        $numPlayers
    ) {
        parent::__construct($type, $contact, $numPlayers);
    }

    public function play(): string
    {
        return "Estoy jugando al tenis";
    }

    public function addRacket($racket): array
    {
        $this->rackets[] = $racket;
        return $this->rackets;
    }
}