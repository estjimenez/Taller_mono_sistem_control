<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../models/drivers/conexDB.php';
include '../models/entities/model.php';
include '../models/entities/platos.php';
include '../models/entities/categorias.php';
include '../controllers/ControlPlatos.php';

use App\controllers\ControlPlatos;
use MonoApp\Models\Entities\Categorias;

$controller = new ControlPlatos();
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID de plato no proporcionado.";
    exit;
}

$plato = $controller->getDishe($id);
if (!$plato) {
    echo "Plato no encontrado.";
    exit;
}

$categorias = Categorias::getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $_POST['id'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'idCategory' => $_POST['idCategory']
    ];

    $resultado = $controller->updateDishe($data);

    if ($resultado === 'yes') {
        header('Location: platos.php');
        exit;
    } else {
        echo "Error al modificar el plato.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>modificar Plato</title>
</head>
<body>
    <h1>modificar Plato</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $plato->get('id'); ?>">

        <label>Descripción:</label>
        <input type="text" name="description" value="<?php echo $plato->get('description'); ?>" required><br>

        <label>Precio:</label>
        <input type="number" name="price" value="<?php echo $plato->get('price'); ?>" step="0.01" required><br>

        <label>Categoría:</label>
        <select name="idCategory" required>
            <option value="">Seleccione...</option>
            <?php
            if ($categorias && $categorias->num_rows > 0) {
                while ($cat = $categorias->fetch_assoc()) {
                    $selected = $cat['id'] == $plato->get('idCategory') ? 'selected' : '';
                    echo '<option value="' . $cat['id'] . '" ' . $selected . '>' . $cat['name'] . '</option>';
                }
            }
            ?>
        </select><br><br>

        <button type="submit">Modificar</button>
        <a href="platos.php">Cancelar</a>
    </form>
</body>
</html>
