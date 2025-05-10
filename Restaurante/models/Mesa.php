<?php
class Mesa {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM mesas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM mesas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nombre) {
        $stmt = $this->conn->prepare("INSERT INTO mesas (nombre) VALUES (?)");
        return $stmt->execute([$nombre]);
    }

    public function update($id, $nombre) {
        $stmt = $this->conn->prepare("UPDATE mesas SET nombre = ? WHERE id = ?");
        return $stmt->execute([$nombre, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM mesas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>