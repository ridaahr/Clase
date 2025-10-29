<?php
abstract class Sport
{
    public function __construct(
        protected string $type,
        protected bool $contact,
        private int $numPlayers
    ) {
    }

    /* lo de arriba equivale a esto: 
    protected String $type;
    protected bool $contact;
    private int $numPlayers;
    public function __construct($type, $contact, $numPlayers) 
    {
        $this->type = $type;
        $this->contact = $contact;
        $this->numPlayers = $numPlayers
    }
    */

    public function addPlayers(int $num): int
    {
        $this->numPlayers += $num;
        return $this->numPlayers;
    }

    public abstract function play(): string;

    public function __toString(): string
{
    $ret = "Tipo de deporte: " . $this->type . " Contacto: ";
    if ($this->contact) {
        $ret .= "Sí";
    } else {
        $ret .= "No";
    }

    $ret .= " - Número de jugadores: " . $this->numPlayers;
    return $ret;
}
}