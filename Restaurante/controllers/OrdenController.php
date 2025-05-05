<?php

require_once "../core/controller.php";

class OrdenController extends Controller {
    public function listarOrdenes() {
        $ordenModel = $this->loadModel("OrdenModel");
        $ordenes = $ordenModel->getAllOrdenes();
        $this->renderView("ordenes/listar", ["ordenes" => $ordenes]);
    }

    public function agregarOrden($cliente, $total, $fecha) {
        $ordenModel = $this->loadModel("OrdenModel");
        $resultado = $ordenModel->insertOrden($cliente, $total, $fecha);

        if ($resultado) {
            echo "Orden agregada exitosamente.";
        } else {
            echo "Error al agregar la orden.";
        }
    }

    public function eliminarOrden($id) {
        $ordenModel = $this->loadModel("OrdenModel");
        $resultado = $ordenModel->deleteOrden($id);

        if ($resultado) {
            echo "Orden eliminada exitosamente.";
        } else {
            echo "Error al eliminar la orden.";
        }
    }

    public function actualizarOrden($id, $cliente, $total, $fecha) {
        $ordenModel = $this->loadModel("OrdenModel");
        $resultado = $ordenModel->updateOrden($id, $cliente, $total, $fecha);

        if ($resultado) {
            echo "Orden actualizada exitosamente.";
        } else {
            echo "Error al actualizar la orden.";
        }
    }
}
?>