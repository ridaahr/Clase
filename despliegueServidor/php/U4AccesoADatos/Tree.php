<?php
class Tree
{
    public function __construct(
        private float $price,
        private float $height,
        private string $material,
        private int $id = -1,
    ) {}

    public function __toString()
    {
        return "$this->id:
            $this->price - 
            $this->height - 
            $this->material";
    }

    /**
     * Inserta en la base de datos el árbol
     * @param Tree $tree árbol a insertar en la bd
     * @param mysqli $conn conexión en la bd
     * @return int id con el que se ha insertado en la bd
     */
    static function insert(Tree $tree, mysqli $conn)
    {
        $sql = "INSERT INTO trees (price, height, material) 
        VALUES (\"$tree->price\", \"$tree->height\", \"$tree->material\")";
        $conn->query($sql);
        $id = $conn->insert_id;
        $tree->id = $id;
        return $id;
    }

    /**
     * Buscar por id un árbol
     * @param int $id id a buscar en la BD
     * @param mysqli $conn conexión con la bd
     * @return Tree el árbol de la bd o null si no existe el id
     */
    public static function select($id, $conn): ?Tree
    {
        $sql = "SELECT * FROM trees WHERE id = $id";
        $row = $conn->query($sql);
        if ($row->num_rows > 0) {
            $arr = $row->fetch_assoc();
            $t = new Tree($arr["price"], $arr["height"], $arr["material"], $arr["id"]);
            return $t;
        }
        return null;
    }


    public static function delete($id, $conn): bool
    {
        $sql = "DELETE FROM trees WHERE id = $id";
        $conn->query($sql); //aquí se lanza la consulta
        $rows = $conn->affected_rows; //filas afectadas por la consulta
        if ($rows > 0) {
            return true;
        }
        return false;
    }

    public static function selectAll($conn): array
    {
        $trees = array();
        $sql = "SELECT * FROM trees";
        $conn->query($sql);
        $rows = $conn->query($sql);
        while (($row = $rows->fetch_assoc()) != null) {
            $trees[] = new Tree($row["price"], $row["height"], $row["material"], $row["id"]);
        }
        return $trees;
    }
}
