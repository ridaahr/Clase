<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/POO/sports/Sport.php";
final class Rugby extends Sport
{
    private string $teamName;

    public function __construct($teamName, $type, $contact, $numPlayers)
    {
        $this->teamName = $teamName;
        parent::__construct($type, $contact, $numPlayers);
    }

    public function play(): string
    {
        return "Estoy jugando al rugby";
    }

    public function __toString(): string
    {
        $ret = "Equipo: " . $this->teamName .
            " - " . parent::__toString();
        return $ret;
    }
}