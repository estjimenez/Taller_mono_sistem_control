<?php
class Model {
    protected $conexion;

    public function __construct() {
        $db = new Database();
        $this->conexion = $db->conexion;
    }
}
?>