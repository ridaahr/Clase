<?php
class Tree {
    public function __construct(
        private float $price,
        private float $height,
        private string $material,
        private int $id
    ){}
    /**
     * Inserta en la base de datos el árbol
     * @param Tree $tree árbol a insertar en la bd
     * @param mysqli $conn conexión en la bd
     * @return int id con el que se ha insertado en la bd
     */
    public static function insert(Tree $tree, mysqli $conn) {
        $sql = "INSERT INTO trees (price, height, material, id) 
        VALUES ($tree->price, $tree->height, '$tree->material', $tree->id);";
        $conn->query($sql);
        $conn->insert_id;
        return $conn->insert_id;
    }
}