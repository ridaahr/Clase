<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/CoreDB.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/Component.php";
class ComponentDAO
{
    public static function create($c): int
    {
        $conn = CoreDB::getConnection();
        $sql = "INSERT INTO components (name, brand, model) 
        VALUES (\"{$c->getName()}\", \"{$c->getBrand()}\", \"{$c->getModel()}\")";
        $conn->query($sql);
        $id = $conn->insert_id;
        $c->setId($id);
        $conn->close();
        return $id;
    }

    public static function read($id): ?Component
    {
        $conn = CoreDB::getConnection();
        $sql = "SELECT * FROM components WHERE id = $id";
        $result = $conn->query($sql);
        $conn->close();
        if (($row = $result->fetch_assoc()) != null) {
            return new Component($row["name"], $row["brand"], $row["model"], $row["id"]);

        }
        return null;
    }

    public static function update($c): bool
    {
        $conn = CoreDB::getConnection();
        $sql = "UPDATE components 
        SET name = \"{$c->getName()}\",
        brand = \"{$c->getBrand()}\",
        model = \"{$c->getModel()}\"
        WHERE id = {$c->getId()};";
        $conn->query($sql);
        $conn->close();
        $num = $conn->affected_rows;
        if ($num > 0) {
            return true;
        }
        return false;
        //return (num > 0);
    }

    public static function delete($id): ?Component
    {
        $conn = CoreDB::getConnection();
        $c = ComponentDAO::read($id);
        $sql = "DELETE FROM components WHERE id = $id";
        $conn->query($sql);
        $conn->close();
        return $c;
    }

    public static function readAll(): array
    {
        $conn = CoreDB::getConnection();
        $components = [];
        $sql = "SELECT * FROM components";
        $rows = $conn->query($sql);
        $conn->close();
        while (($row = $rows->fetch_assoc()) != null) {
            $c = new Component($row["name"], $row["brand"], $row["model"], $row["id"]);
            $components[] = $c;
        }
        return $components;
    }
}
