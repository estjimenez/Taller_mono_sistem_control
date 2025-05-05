<?php
class ReporteOrdenes {
    private $conexion;

    public function __construct($dbHost, $dbUser, $dbPass, $dbName) {
        
        $this->conexion = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function generarReporte() {
        $sql = "SELECT id_orden, cliente, total, fecha FROM ordenes";
        $resultado = $this->conexion->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID Orden</th><th>Cliente</th><th>Total</th><th>Fecha</th></tr>";

            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['id_orden'] . "</td>";
                echo "<td>" . $fila['cliente'] . "</td>";
                echo "<td>" . $fila['total'] . "</td>";
                echo "<td>" . $fila['fecha'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No hay órdenes disponibles.";
        }
    }

    public function __destruct() {
        $this->conexion->close();
    }
}


?>