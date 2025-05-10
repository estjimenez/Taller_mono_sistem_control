<?php
class Plato {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT platos.*, categorias.nombre as categoria FROM platos JOIN categorias ON platos.categoria_id = categorias.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM platos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($descripcion, $categoria_id, $precio) {
        $stmt = $this->conn->prepare("INSERT INTO platos (descripcion, categoria_id, precio) VALUES (?, ?, ?)");
        return $stmt->execute([$descripcion, $categoria_id, $precio]);
    }

    public function update($id, $descripcion, $precio) {
        $stmt = $this->conn->prepare("UPDATE platos SET descripcion = ?, precio = ? WHERE id = ?");
        return $stmt->execute([$descripcion, $precio, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM platos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>