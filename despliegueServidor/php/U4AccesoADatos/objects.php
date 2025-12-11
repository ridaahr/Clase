<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/Tree.php";

    //Conexión con la BD
    try {
        $conn = new mysqli("127.0.0.1", "root", "Sandia4you", "shop"); //Puerto default 3306
    } catch (Exception $e) {
        echo "<p>Error en la conexión: {$e->getMessage()}</p>";
        echo "<p>No puedo continuar</p>";
        exit();
    }

    $t = new Tree(26, 47.9, "wood");
    Tree::insert($t, $conn);
    echo "<p>Se ha insertado el árbol con id id.</p>";

    $t = Tree::select(3227, $conn);
    echo "<p>Arbol con select: $t</p>";

    $trees = Tree::selectAll($conn);
    foreach ($trees as $tree) {
        echo "<p>$t</p>";
    }
    ?>
</body>

</html>