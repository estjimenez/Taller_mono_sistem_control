<?php


require_once "../core/controller.php";

class CategoriaController extends Controller {
   
    public function listarCategorias() {
        $categoriaModel = $this->loadModel("CategoriaModel"); 
        $categorias = $categoriaModel->getAllCategorias(); 
        $this->renderView("categorias/listar", ["categorias" => $categorias]); 
    }

    
    public function agregarCategoria($nombre, $descripcion) {
        $categoriaModel = $this->loadModel("CategoriaModel");
        $resultado = $categoriaModel->insertCategoria($nombre, $descripcion);

        if ($resultado) {
            echo "Categoría agregada exitosamente.";
        } else {
            echo "Error al agregar la categoría.";
        }
    }

   
    public function eliminarCategoria($id) {
        $categoriaModel = $this->loadModel("CategoriaModel");
        $resultado = $categoriaModel->deleteCategoria($id);

        if ($resultado) {
            echo "Categoría eliminada exitosamente.";
        } else {
            echo "Error al eliminar la categoría.";
        }
    }
}
?>