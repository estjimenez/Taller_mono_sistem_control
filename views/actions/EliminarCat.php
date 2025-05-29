<?php
session_start();

require_once("../../models/entities/categorias.php");
use MonoApp\Models\Entities\Categorias;

if (isset($_GET['id'])) {
    $cat = new Categorias();
    $cat->setId($_GET['id']);

    $res = $cat->DeleteCategory();

    if ($res) {
        $_SESSION['msg'] = '✅ Categoría eliminada .';
    } else {
        $_SESSION['msg'] = '❌ No se pudo eliminar.';
    }
} 

header("Location: ../categories.php");
exit;
