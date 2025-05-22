<?php
require_once __DIR__ . '/../models/entities/categorias.php';
require_once __DIR__ . '/../models/drivers/ConexDB.php';


class CategoriesController {

    public function index() {
        $model = new \MonoApp\Models\Entities\Categorias();
        $categories = $model->all();
        include("views/categorias.php");
    }

    public function form() {
    $category = null;

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $category = \MonoApp\Models\Entities\Categorias::getById($_GET['id']);
    }

    include("views/form_category.php");
}


    public function save() {
        $category = new \MonoApp\Models\Entities\Categorias();
        $category->setName($_POST['name']);

        if (!empty($_POST['id'])) {
            $category->setId($_POST['id']);
            $category->UpdateCategory();
        } else {
            $category->AddCategory();
        }

        header("Location: ?c=Categoriescontroller&m=index");
    }

  public function getAll() {
    $model = new \MonoApp\Models\Entities\Categorias();
    return $model->all();
}
    public function delete() {
        if (isset($_GET['id'])) {
            $category = new \MonoApp\Models\Entities\Categorias();
            $category->setId($_GET['id']);
            $category->DeleteCategory();
        }
        header("Location: ?c=Categoriescontroller&m=index");
    }
    public function getById($id) {
        $model = new \MonoApp\Models\Entities\Categorias();
        return $model->getById($id);
    }
    

}

