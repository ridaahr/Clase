<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/ComponentDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/Component.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/CoreDB.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/Pc.php";

Class PcDAO {
    /**
     * Guarda en la bd un ordenador, y también guarda todos sus componentes.
     * @param Pc $pc
     * @return int true si lo ha insertado, false si no.
     */
    public static function create($pc):bool {
        $conn = CoreDB::getConnection();
        $sql = "INSERT into pcs (id, owner, brand, price)
            values(?, ?, ?, ?)";

        $ps = $conn->prepare($sql); /*prepared statement - sentencia preparada */

        /*operación de binding: asignar valores a cada ? (es decir, asignar valores
        donde faltan)*/
        $id = $pc->getId();
        $owner = $pc->getOwner();
        $brand = $pc->getBrand();
        $price = $pc->getPrice();
        $ps->bind_param("sssd", $id, $owner, $brand, $price);

        /* ejecuto la sentencia */
        $ret = $ps->execute();  /* aquí se guarda en la bd el ordenador */

        //Guardo los componentes en la bd:
        foreach($pc->getComponents() as $component){
            ComponentDAO::create($component, $id);
        }

        $conn->close();
        return $ret;
    }

    /**
     * Lee un pc de la bd con todos sus componentes.
     * @param string $id
     * @return Pc Pc leído de la bd o null si no existe el id.
     */
    public static function read($id): ?Pc {
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from pcs where id = ?";
        $ps = $conn->prepare($sql);
        $ps->bind_param("s", $id);
        $ps->execute();
        $result = $ps->get_result();
        //En result tengo el objeto mysqli_result con la información leída de la bd
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            //fetch_assoc convierte el primer resultado que hay en el mysqli_result en un array 
            // asociativo más fácil de manejar
            $pc = new Pc($id, $row["owner"], $row["brand"], $row["price"]);

            //Ahora tengo que leer los componentes donde su pc_id sea el de este pc:
            $pc->setComponents(ComponentDAO::readByPcId($id));
        }else{
            $pc = null;
        }

        $conn->close();
        return $pc;
    }

    public static function update($pc) : bool {
        return false;
    }

    public static function delete($id): ?Pc {
        return null;
    }

    public static function readAll() {
        //todo
        
    }

    /**
     * lee de la BD los pcs entre un rango de precio
     * @param mixed $min precio mínimo
     * @param mixed $max precio máximo
     * @return array Array con los pcs
     */
    public static function readBetweenPrice($min, $max) {

    }
}