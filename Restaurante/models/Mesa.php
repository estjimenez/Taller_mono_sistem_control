<?php
class Mesa {
    private $id;
    private $numero;
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function setNumero($numero) {
        $this->numero = intval($numero);
    }

    public function guardar() {
        $sql = "INSERT INTO mesas (numero) VALUES ($this->numero)";
        return $this->conexion->query($sql);
    }

    public function obtenerTodas() {
        $sql = "SELECT * FROM mesas";
        return $this->conexion->query($sql);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM mesas WHERE id = $id";
        return $this->conexion->query($sql)->fetch_assoc();
    }

    public function actualizar($id) {
        $sql = "UPDATE mesas SET numero = $this->numero WHERE id = $id";
        return $this->conexion->query($sql);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM mesas WHERE id = $id";
        return $this->conexion->query($sql);
    }
}