<?php
class PlatoController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        return $this->model->getAll();
    }

    public function show($id) {
        return $this->model->getById($id);
    }

    public function store($descripcion, $categoria_id, $precio) {
        return $this->model->create($descripcion, $categoria_id, $precio);
    }

    public function update($id, $descripcion, $precio) {
        return $this->model->update($id, $descripcion, $precio);
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}
?>