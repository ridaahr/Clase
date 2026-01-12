<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/CoreDB.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/Component.php";
class ComponentDAO
{
    public static function create(Component $c, $pc_id = null): int
    {
        $conn = CoreDB::getConnection();
        /*$sql = "INSERT INTO components (name, brand, model) 
        VALUES (\"{$c->getName()}\", 
        \"{$c->getBrand()}\", 
        \"{$c->getModel()}\")";
        $conn->query($sql);
        $id = $conn->insert_id;
        $c->setId($id);
        $conn->close();
        return $id;*/

        //Con prepared statement
        $sql = "INSERT into components (name, brand, model, pc_id) 
            values (?, ?, ?, ?);";
        $ps = $conn->prepare($sql);

        //hago el bind (asignar valores a los ?)
        $name = $c->getName();
        $brand = $c->getBrand();
        $model = $c->getModel();
        //$id = $pc_id;   //No es necesario
        $ps->bind_param("ssss", $name, $brand, $model, $pc_id);

        //ejecuto la query
        $ps->execute();

        //obtengo el id con el que se ha insertado
        $id = $ps->insert_id;   //todo funciona con $conn en lugar de $ps?????
        $c->setId($id);

        //cerrar conexión
        $conn->close();

        //return
        return $id;
    }

    public static function read($id): ?Component
    {
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from components where id = $id";
        //$id = "0; delete * from componentes where 1 = 1";
        //select * from components where id=0; delete * from componentes where 1 = 1;
        $result = $conn->query($sql);
        $conn->close();
        if (($row = $result->fetch_assoc()) != null) {

            return new Component(
                $row["name"],
                $row["brand"],
                $row["model"],
                $row["id"]
            );
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
        $arr = [];
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from components";
        $result = $conn->query($sql);
        while (($row = $result->fetch_assoc()) != null) {
            $arr[] = new Component(
                $row["name"],
                $row["brand"],
                $row["model"],
                $row["id"]
            );
        }
        $conn->close();
        return $arr;
    }

    public static function readByPcId($id){
        $components = array();
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from components where pc_id = ?";
        $ps = $conn->prepare($sql);

        $ps->bind_param("s", $id);
        $ps->execute();
        $result = $ps->get_result();
        while (($row = $result->fetch_assoc()) != null) {
            $components[] = new Component($row["name"], $row["brand"], $row["model"], $row["id"]);
        }
        $conn->close();
        return $components;
    }
}
