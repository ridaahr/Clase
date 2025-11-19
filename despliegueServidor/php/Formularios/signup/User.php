<?php
class User{
    public function __construct(
        private string $name,
        private string $password,
        private string $email,
        private int $age,
        private array $curso,  //DAW, DAM, ASIR (checkboxes)
    ){}
   
    public function __toString()
    {
        return "{$this->name} 
        {$this->password} 
        {$this->email} 
        {$this->age}" . implode(",", $this->curso);
    }
}