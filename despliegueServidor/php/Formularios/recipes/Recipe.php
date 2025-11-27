<?php
Class Recipe {
    public function __construct(
        private string $email,
        private string $name,
        private int $time,
        private string $type,
        private string $gluten,
        private string $color
    ) {}

    public function __toString()
    {
        return "<h2>Correo:</h2> <p>{$this->email}</p> 
        <br><h2>Nombre:</h2> <p>{$this->name}</p>
        <br><h2>Tiempo:</h2> <p>{$this->time}</p>
        <br><h2>Tipo:</h2> <p>{$this->type}</p>
        <br><h2>Gluten:</h2> <p>{$this->gluten}" . " " . "gluten</p>
        <br><h2>Color:</h2> <p>{$this->color}</p>";
    }
}