<?php
class DetalleOrden {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getByOrdenId($orden_id) {
        $stmt = $this->conn->prepare("SELECT do.*, p.descripcion FROM detalle_orden do JOIN platos p ON do.plato_id = p.id WHERE do.orden_id = ?");
        $stmt->execute([$orden_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($orden_id, $plato_id, $cantidad, $precio_unitario) {
        $stmt = $this->conn->prepare("INSERT INTO detalle_orden (orden_id, plato_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$orden_id, $plato_id, $cantidad, $precio_unitario]);
    }
}
?>