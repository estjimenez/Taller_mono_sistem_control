<?php
class DetalleOrdenController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index($orden_id) {
        return $this->model->getAllByOrdenId($orden_id);
    }

    public function store($orden_id, $plato_id, $cantidad) {
        return $this->model->create($orden_id, $plato_id, $cantidad);
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}
?>
