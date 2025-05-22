<?php
session_start();
require_once("../../models/entities/categories.php");
use MonoApp\Models\Entities\Categorias;

$cat = new Categorias();
$cat->setName($_POST['name']);

if (!empty($_POST['id'])) {
    $cat->setId($_POST['id']);
    $res = $cat->UpdateCategory();
    $_SESSION['msg'] = $res ? '✅ Categoría modificada correctamente.' : '❌ Error al modificar la categoría.';
} else {
    $res = $cat->AddCategory();
    $_SESSION['msg'] = $res ? '✅ Categoría registrada correctamente.' : '❌ Error al registrar la categoría.';
}

header("Location: ../categories.php");
exit;
