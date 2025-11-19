<?php
class User{
    public function __construct(
        private string $name,
        private string $password,
        private string $email,
        private int $age,
        private array $curso,  //DAW, DAM, ASIR (checkboxes)
    ){

    }
   
}