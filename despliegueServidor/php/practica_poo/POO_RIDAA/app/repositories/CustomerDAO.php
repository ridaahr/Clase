<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Customer.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";

class CustomerDAO {
    public static function create(Customer $customer) {
        $conn = CoreDB::getConnection();
        $sql = "INSERT INTO customers (name, surname, email, password, dni, age) values (?, ?, ?, ?, ?, ?);";
        $ps = $conn->prepare($sql);
        $name = $customer->getName();
        $surname = $customer->getSurname();
        $email = $customer->getEmail();
        $password = password_hash($customer->getPassword(), PASSWORD_DEFAULT);
        $dni = $customer->getDni();
        $age = $customer->getAge();
        $ps->bind_param("sssssi", $name, $surname, $email, $password, $dni, $age);
        
        try {
            $ps->execute();
            $customer->setId($ps->insert_id);
        } catch (Exception $e) {
            $conn->close();
            return false;
        }
    }
}
