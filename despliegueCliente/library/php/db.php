<?php
class CoreDB
{
    public static function connect()
    {
        $host = "localhost";
        $user = "root";
        $pass = "Sandia4you";
        $db = "library";
        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");
        return $conn;
    }
}
