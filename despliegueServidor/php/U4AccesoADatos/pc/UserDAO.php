<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/CoreDB.php";


class UserDAO
{

    /**
     * Inserta un usuario hasheando su contraseña
     * @param User $user usuario a insertar, tiene la contraseña clara en sus parámetros
     * @return int con el id del usuario insertado
     */
    public static function create($user)
    {
        //conexión
        $conn = CoreDB::getConnection();

        //sentencia preparada
        $sql = "INSERT into users (name, password) values (?, ?)";
        $ps = $conn->prepare($sql);

        //bind (pass la tenemos que hashear)
        $name = $user->getName();
        $pass = $user->getPass();   //$pass contiene la contraseña clara
        $passHash = password_hash($pass, PASSWORD_DEFAULT); //$passHash tiene la contraseña hasheada
        $ps->bind_param("ss", $name, $passHash);

        //lanza
        $ps->execute();

        //recupera id
        $id = $ps->insert_id;
        $user->setId($id);

        //cierra conexión
        $conn->close();

        return $id;
    }

    /**
     * Verifica si una contraseña corresponde con la contraseña de eses nombre en la bd
     * @param mixed $name nombre del usuario
     * @param mixed $pass contraseña introducida que será verificada con la que está guardada
     * en la bd
     * @return int 1 si coinciden, -1 sin o existe el user, -2 si existe el user pero la contraseña
     * no es correcta
     */
    public static function verifyPassword($name, $pass): int
    {
        $ret = 0;
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from users where name = ?";
        $ps = $conn->prepare($sql);
        $ps->bind_param("s", $name);
        $ps->execute();
        $result = $ps->get_result();
        $row = $result->fetch_assoc();
        if ($row != null) {
            $passBD = $row["password"];
            if (password_verify($pass, $passBD)) {
                $ret = 1;   //user y contraseña correctas
            } else {
                $ret = -2;  //user existe, pero su contraseña no es correcta
            }
        } else {
            $ret = -1;  //el select no ha devuelto ningún resultado, por tanto no existe el user
        }
        $conn->close();
        return $ret;
    }
}