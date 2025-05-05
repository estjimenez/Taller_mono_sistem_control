<?php
class PlatoController extends Controller {
    public function listarPlatos() {
        $platoModel = $this->loadModel("Plato");
        $platos = $platoModel->obtenerTodos();
        $this->renderView("platos/listar", ["platos" => $platos]);
    }

    public function agregarPlato($description, $price, $idCategory) {
        $platoModel = $this->loadModel("Plato");
        $platoModel->setDatos($description, $price, $idCategory);
        $platoModel->guardar();
    }
}
?>