<?php
class OrdenController {
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

    public function store($mesa_id) {
        return $this->model->create($mesa_id);
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}
?>