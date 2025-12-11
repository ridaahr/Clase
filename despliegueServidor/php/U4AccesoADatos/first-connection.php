<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $host = "127.0.0.1";
    $user = "root";
    $pass = "Sandia4you";
    $db = "shop";
    $port = 3306;
    //Conectamos:
    $conn = new mysqli($host, $user, $pass, $db);
    echo "BIENNN!";

    //Creamos una tabla
    $sql = "CREATE TABLE trees (
        id int AUTO_INCREMENT PRIMARY KEY,
        price float NOT NULL,
        height float,
        material varchar(255)
    );";
    try {
        $conn->query($sql);
    } catch (Exception $e) {
        echo "<p>Excepción: {$e->getMessage()}</p>";
    }


    //INSERT
    $sql = "INSERT INTO trees (price, height, material) VALUES 
        (1, 1.50, 'plastic');";
    $conn->query($sql);
    //Recupero el id con el que se ha insertado:
    $id = $conn->insert_id;
    echo "<p>El árbol se ha insertado con id $id.</p>";

    //DELETE
    $sql = "DELETE FROM trees WHERE material = 'plastic';";
    $conn->query($sql);
    $filasAfectadas = $conn->affected_rows;
    echo "<p>Se han eliminado $filasAfectadas filas.</p>";

    //UPDATE
    $sql = "UPDATE trees SET 
        material = 'iron'
        WHERE id = 15
    ";
    $conn->query($sql);
    echo "<p>Se han actualizado $filasAfectadas filas.</p>";

    //SELECT
    $sql = "SELECT * FROM trees where material = 'iron';";
    $result = $conn->query($sql);
    $fila = $result->fetch_assoc(); //$fila contiene un array asociativo con la primera fila
    //fetch_assoc devuelve null cuando no hay más resultados
    $cant = $result->num_rows; //número de resultados del select
    echo "<p>Ha habido $cant resultados.</p>";
    while($fila != null) {
        //Imprimo resultados
        echo "<p>{$fila['id']} - {$fila['price']} - {$fila['height']} - {$fila['material']}</p>";
        $fila = $result->fetch_assoc(); //Cojo la siguiente fila
    }
    
    echo "<hr>";

    //SELECT con bucle abreviado
    $sql = "SELECT * FROM trees where material = 'iron';";
    $result = $conn->query($sql);
    while (($fila = $result->fetch_assoc()) != null) {
        echo "<p>{$fila['id']} - {$fila['price']} - {$fila['height']} - {$fila['material']}</p>";
    }

    //Creo objeto árbol y lo inserto
    require $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/Tree.php";
    $tree = new Tree(4, 2.05, 'iron', 10);
    Tree::insert($tree, $conn);

    ?>
</body>
</html>