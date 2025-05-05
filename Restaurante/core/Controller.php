<?php
class Controller {
    protected $viewPath = "../views/";
    protected $modelPath = "../models/";

    public function loadModel($modelName) {
        $modelFile = $this->modelPath . $modelName . ".php";
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $modelName();
        } else {
            die("El modelo '$modelName' no se encuentra.");
        }
    }

    public function renderView($viewName, $data = []) {
        $viewFile = $this->viewPath . $viewName . ".php";
        if (file_exists($viewFile)) {
            extract($data);
            require_once $viewFile;
        } else {
            die("La vista '$viewName' no se encuentra.");
        }
    }
}
?>