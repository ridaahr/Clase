<?php
class User{
    public function __construct(
        private string $name,
        private string $password,
        private string $email,
        private int $age,
        private array $curso = [],  //DAW, DAM, ASIR (checkboxes)
    ){}
   
    public function __toString()
    {
        return "Nombre: {$this->name} 
        <br>Contraseña: {$this->password} 
        <br>Email: {$this->email} 
        <br>Edad: {$this->age}" . "<br>Cursos: " . implode(",", $this->curso);
    }
}