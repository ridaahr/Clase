<?php
class Customer {
    public function __construct(
        private String $name,
        private String $surname,
        private String $email,
        private String $password,
        private String $dni,
        private String $age,
        private $rentals
    ) {}
    
}