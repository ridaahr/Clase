<?php
class Component
{
    public function __construct(
        private string $name,
        private string $brand,
        private string $model,
        private int $id = -1,
    ) {}

    public function __toString()
    {
        return "id: $this->id - Name: $this->name - Brand: $this->brand - Model: $this->model";
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
