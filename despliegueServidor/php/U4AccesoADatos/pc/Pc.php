<?php
class Pc
{
        public function __construct(
                private string $id,
                private string $owner,
                private string $brand,
                private float $price,
                private array $components = [],
        ) {}


        public function addComponent($c)
        {
                $this->components[] = $c;
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
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

        /**
         * Get the value of owner
         */
        public function getOwner()
        {
                return $this->owner;
        }

        /**
         * Set the value of owner
         *
         * @return  self
         */
        public function setOwner($owner)
        {
                $this->owner = $owner;

                return $this;
        }

        /**
         * Get the value of brand
         */
        public function getBrand()
        {
                return $this->brand;
        }

        /**
         * Set the value of brand
         *
         * @return  self
         */
        public function setBrand($brand)
        {
                $this->brand = $brand;

                return $this;
        }

        /**
         * Get the value of price
         */
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of components
         */
        public function getComponents()
        {
                return $this->components;
        }

        /**
         * Set the value of components
         *
         * @return  self
         */
        public function setComponents($components)
        {
                $this->components = $components;

                return $this;
        }

        public function __toString()
        {
                return "$this->id $this->owner $this->brand $this->price - Components: " . 
                implode(" | ", $this->components);
        }
}
