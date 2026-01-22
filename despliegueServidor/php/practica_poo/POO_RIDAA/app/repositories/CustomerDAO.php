<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Customer.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";

class CustomerDAO {
    /**
     * crea un cliente
     * @param Customer $customer le pasamos un objeto customer
     * @return bool devuelve true o false dependiendo de si lo ha creado o no
     */
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
        
        $conn->close();
        return true;
    }

    /**
     * para obtener un cliente a través de su email, ya que es único
     * @param string $email le pasamos un email
     * @return Customer|null nos devuelve el cliente o null si no se encuentra
     */
    public static function read(string $email): ?Customer {
        $conn = CoreDB::getConnection();
        $sql = "SELECT * FROM customers WHERE email = ?;";
        $ps = $conn->prepare($sql);
        $ps->bind_param("s", $email);
        $ps->execute();
        $result = $ps->get_result();

        if ($row = $result->fetch_assoc()) {
            $customer = new Customer(
                $row["name"], 
                $row["surname"], 
                $row["email"],
                $row["password"],
                $row["dni"],
                $row["age"]
            );
            $customer->setId($row["id"]);
            return $customer;
        }
        return null;
    }
}
