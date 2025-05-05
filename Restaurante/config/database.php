<?php


class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "proyecto_2_db";
    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->dbName);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function close() {
        $this->conexion->close();
    }
}
?>