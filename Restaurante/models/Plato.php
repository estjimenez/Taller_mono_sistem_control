<?php


class Plato extends Model {
    private $description;
    private $price;
    private $idCategory;

    public function setDatos($description, $price, $idCategory) {
        $this->description = $this->conexion->real_escape_string($description);
        $this->price = floatval($price);
        $this->idCategory = intval($idCategory);
    }

    public function guardar() {
        $sql = "INSERT INTO dishes (description, price, idCategory) VALUES ('$this->description', $this->price, $this->idCategory)";
        if ($this->conexion->query($sql)) {
            return true;
        } else {
            die("Error al guardar el plato: " . $this->conexion->error);
        }
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM dishes";
        $result = $this->conexion->query($sql);
        if ($result) {
            return $result;
        } else {
            die("Error al obtener los platos: " . $this->conexion->error);
        }
    }

    public function obtenerPorId($id) {
        $id = intval($id);
        $sql = "SELECT * FROM dishes WHERE id = $id";
        $result = $this->conexion->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            die("Error al obtener el plato: " . $this->conexion->error);
        }
    }

    public function actualizar($id) {
        $id = intval($id);
        $sql = "UPDATE dishes SET description = '$this->description', price = $this->price, idCategory = $this->idCategory WHERE id = $id";
        if ($this->conexion->query($sql)) {
            return true;
        } else {
            die("Error al actualizar el plato: " . $this->conexion->error);
        }
    }

    public function eliminar($id) {
        $id = intval($id);
        $sql = "DELETE FROM dishes WHERE id = $id";
        if ($this->conexion->query($sql)) {
            return true;
        } else {
            die("Error al eliminar el plato: " . $this->conexion->error);
        }
    }
}
?>