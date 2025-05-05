<?php
class DetalleOrden {
    private $idOrden;
    private $idPlato;
    private $cantidad;
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function setDatos($idOrden, $idPlato, $cantidad) {
        $this->idOrden = intval($idOrden);
        $this->idPlato = intval($idPlato);
        $this->cantidad = intval($cantidad);
    }

    public function guardar() {
        $sql = "INSERT INTO detalle_orden (id_orden, id_plato, cantidad) VALUES ($this->idOrden, $this->idPlato, $this->cantidad)";
        return $this->conexion->query($sql);
    }

    public function obtenerPorOrden($idOrden) {
        $sql = "SELECT * FROM detalle_orden WHERE id_orden = $idOrden";
        return $this->conexion->query($sql);
    }
}
