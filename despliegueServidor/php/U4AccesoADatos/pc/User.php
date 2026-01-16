<?php

class User{
    public function __construct(
        private string $name,
        private string $pass,
        private int $id = -1
    )
    {
    }

    public function __toString()
    {
        return "$this->name $this->id";
    }

    

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Get the value of pass
         */ 
        public function getPass()
        {
                return $this->pass;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
}