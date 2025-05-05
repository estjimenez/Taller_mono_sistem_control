<?php
class Orden {
    private $id;
    private $idMesa;
    private $fecha;
    private $estado;
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function setDatos($idMesa, $estado = 'activa') {
        $this->idMesa = intval($idMesa);
        $this->fecha = date('Y-m-d H:i:s');
        $this->estado = $estado;
    }

    public function guardar() {
        $sql = "INSERT INTO ordenes (id_mesa, fecha, estado) VALUES ($this->idMesa, '$this->fecha', '$this->estado')";
        return $this->conexion->query($sql);
    }

    public function obtenerTodas() {
        $sql = "SELECT * FROM ordenes";
        return $this->conexion->query($sql);
    }

    public function anular($id) {
        $sql = "UPDATE ordenes SET estado = 'anulada' WHERE id = $id";
        return $this->conexion->query($sql);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM ordenes WHERE id = $id";
        return $this->conexion->query($sql)->fetch_assoc();
    }
}