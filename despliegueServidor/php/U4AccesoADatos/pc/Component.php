<?php
Class Component {
    public function __construct(
        private string $name,
        private string $brand,
        private string $model,
        private int $id = -1,
    ) {}

    public function __toString()
    {
        return "id: $this->id - Name: $this->name - Brand: $this->brand - Model: $this->model";
    }
    public static function create($c, $conn):int{
        $sql = "INSERT INTO components (name, brand, model) 
        VALUES (\"$c->name\", \"$c->brand\", \"$c->model\")";
        $conn->query($sql);
        $id = $conn->insert_id;
        $c->id = $id;
        return $id;
    }

    public static function Component($id, $conn): ?Component{
        $sql = "SELECT * FROM components WHERE id = $id";
        $row = $conn->query($sql);
        if($row > 0) {
            $arr = $row->fetch_assoc();
            $c = new Component($arr["id"], $arr["name"], $arr["brand"], $arr["model"]);
            return $c;
        }
        return null;
    }

    public static function update($c, $conn):bool{
        $sql = "UPDATE components 
        SET name = \"$c->name\",
        brand = \"$c->name\",
        model = \"$c->model\",
        id = \"$c->id\"
        WHERE id = \"$c->id\";";
        $conn->query($sql);
        if ($conn->affected_rows > 0) {
            return true;
        }
        return false;
    }

    public static function delete($id, $conn): ?Component{
        $sql = "SELECT * FROM components WHERE id = $id";
        $row = $conn->query($sql);
        if($row > 0) {
            $arr = $row->fetch_assoc();
            $c = new Component($arr["id"], $arr["name"], $arr["brand"], $arr["model"]);
            $sql2 = "DELETE FROM components WHERE id = $id";
            $conn->query($sql2);
            return $c;
        }
        return null;
    }

    public static function readAll($conn):array{
        $components = [];
        $sql = "SELECT * FROM components";
        $rows = $conn->query($sql);
        while($row = $rows->fetch_assoc()) {
            $c = new Component($row["id"], $row["name"], $row["brand"], $row["model"]);
            $components[] = $c;
        }
        return $components;
    }
}
