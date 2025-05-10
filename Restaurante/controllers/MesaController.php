<?php

class MesaController {
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

    public function store($numero) {
        return $this->model->create($numero);
    }

    public function update($id, $numero) {
        return $this->model->update($id, $numero);
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}
?>