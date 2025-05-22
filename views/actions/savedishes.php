<?php
require_once '../../models/entities/platos.php';
require_once '../../controllers/ControlPlatos.php';

use App\controllers\ControlPlatos;
$controller = new ControlPlatos();


if (!isset($_POST['description'], $_POST['price'])) {
    echo "Faltan campos por completar";
    exit;
}


if (isset($_GET['edit']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $data = [
        'id' => $id,
        'description' => $description,
        'price' => $price
    ];

    $result = $controller->updateDishe($data);
    echo $result === 'yes' ? "Plato modificado correctamente" : "Error al modificar";
} else {
    // Nuevo plato
    if (!isset($_POST['idCategory'])) {
        echo "Debe seleccionar una categoría";
        exit;
    }

    $description = $_POST['description'];
    $price = $_POST['price'];
    $idCategory = $_POST['idCategory'];

    $data = [
        'description' => $description,
        'price' => $price,
        'idCategory' => $idCategory
    ];

    $result = $controller->saveNewDishe($data);
    echo $result === 'yes' ? "Plato registrado correctamente" : "Error al registrar";
}
?>

<a href="../views/platos.php">Volver a la lista de platos</a>
<a href="../views/index.php">Volver a Menu Principal</a>
 