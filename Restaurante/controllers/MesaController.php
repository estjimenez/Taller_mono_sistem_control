<?php


require_once "../core/controller.php";

class MesaController extends Controller {
   
    public function listarMesas() {
        $mesaModel = $this->loadModel("MesaModel"); 
        $mesas = $mesaModel->getAllMesas(); 
        $this->renderView("mesas/listar", ["mesas" => $mesas]); 
    }


    public function agregarMesa($numero, $capacidad) {
        $mesaModel = $this->loadModel("MesaModel");
        $resultado = $mesaModel->insertMesa($numero, $capacidad);

        if ($resultado) {
            echo "Mesa agregada exitosamente.";
        } else {
            echo "Error al agregar la mesa.";
        }
    }

    public function eliminarMesa($id) {
        $mesaModel = $this->loadModel("MesaModel");
        $resultado = $mesaModel->deleteMesa($id);

        if ($resultado) {
            echo "Mesa eliminada exitosamente.";
        } else {
            echo "Error al eliminar la mesa.";
        }
    }
}
?>