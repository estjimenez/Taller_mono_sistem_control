<?php
class Categoria extends Model {
    public function guardar($name) {
        $sql = "INSERT INTO categories (name) VALUES ('$name')";
        return $this->conexion->query($sql);
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM categories";
        return $this->conexion->query($sql);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM categories WHERE id = $id";
        return $this->conexion->query($sql);
    }
}
?>