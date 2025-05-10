<?php
class CategoriaController {
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

    public function store($nombre) {
        return $this->model->create($nombre);
    }

    public function update($id, $nombre) {
        return $this->model->update($id, $nombre);
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}

?>