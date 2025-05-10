<?php

require_once 'models/Orden.php';
require_once 'config/database.php';

class AnuladaController {

    public function index() {
       
        $db = Database::connect();

        // Instanciar el modelo con la conexión
        $orden = new Orden($db);

        // Obtener órdenes anuladas
        $anuladas = $orden->getAnuladas();

        // Cargar vista
        require_once 'views/ordenes/anuladas.php';
    }
}
