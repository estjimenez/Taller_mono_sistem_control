<?php
class Orden {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll($fecha_inicio = null, $fecha_fin = null, $anulada = false) {
        $query = "SELECT o.*, m.nombre as mesa 
                  FROM orders o 
                  JOIN restaurant_tables m ON o.mesa_id = m.id 
                  WHERE o.anulada = ?";
        $params = [$anulada];

        if ($fecha_inicio && $fecha_fin) {
            $query .= " AND o.fecha BETWEEN ? AND ?";
            $params[] = $fecha_inicio;
            $params[] = $fecha_fin;
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($fecha, $mesa_id, $total) {
        $stmt = $this->conn->prepare("INSERT INTO orders (fecha, mesa_id, total, anulada) VALUES (?, ?, ?, 0)");
        $stmt->execute([$fecha, $mesa_id, $total]);
        return $this->conn->lastInsertId();
    }

    public function anular($id) {
        $stmt = $this->conn->prepare("UPDATE orders SET anulada = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getAnuladas() {
        $stmt = $this->conn->prepare("SELECT o.*, m.nombre as mesa 
                                      FROM orders o 
                                      JOIN restaurant_tables m ON o.mesa_id = m.id 
                                      WHERE o.anulada = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
