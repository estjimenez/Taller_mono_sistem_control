<?php
include '../models/drivers/conexDB.php';
include '../models/entities/model.php';
include '../models/entities/platos.php';
include '../models/entities/categorias.php';
include '../controllers/ControlPlatos.php';

use App\controllers\ControlPlatos;
use MonoApp\Models\Entities\Categorias;

$controller = new ControlPlatos();
$categorias = Categorias::getAllDishe(); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'idCategory' => $_POST['idCategory']
    ];

    $resultado = $controller->saveNewDishe($data);

    if ($resultado === 'yes') {
        header('Location: platos.php');
        exit;
    } else {
        echo "Error al registrar el plato.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Plato</title>
    <link rel="stylesheet" href="/Taller_mono_sistem_control/views/css/form.css">
</head>
<body>
    <div class="form-container">
        <h1>Registrar nuevo plato</h1>
        <form method="post">
            <label for="description">Descripción:</label>
            <input type="text" name="description" id="description" required>

            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" step="0.01" required>

            <label for="idCategory">Categoría:</label>
            <select name="idCategory" id="idCategory" required>
                <option value="">Seleccione...</option>
                <?php
                if ($categorias && $categorias->num_rows > 0) {
                    while ($cat = $categorias->fetch_assoc()) {
                        echo '<option value="' . $cat['id'] . '">' . $cat['name'] . '</option>';
                    }
                }
                ?>
            </select>

            <button type="submit">Registrar</button>
            <a href="platos.php" class="cancel-link">Cancelar</a>
        </form>
        <a href="../views/index.php" class="back-link">Volver a Menú Principal</a>
    </div>
</body>
</html>