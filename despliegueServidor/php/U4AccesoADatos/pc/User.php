<?php
class User {
    public function __construct(
        private string $name,
        private string $pass,
        private int $id = -1
    ) {}

    public function __toString()
    {
        return "$this->name $this->id";
    }
}