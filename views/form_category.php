<?php
include '../models/entities/categories.php';
use MonoApp\Models\Entities\Categorias;

$category = null;
$isEditing = false;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $category = Categorias::getById($_GET['id']);
    $isEditing = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $isEditing ? 'Editar' : 'Agregar' ?> Categoría</title>
    <link rel="stylesheet" href="/taller_mono_sitem_control/views/css/form.css">
</head>
<body>
    <div class="form-container">
        <h2><?= $isEditing ? 'Editar' : 'Registrar' ?> Categoría</h2>

        <form method="POST" action="actions/savecategory.php">
            <?php if ($isEditing): ?>
                <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" required
                       value="<?= $isEditing ? htmlspecialchars($category['name']) : '' ?>">
            </div>

            <div class="form-actions">
                <button type="submit"><?= $isEditing ? ' Actualizar' : ' Guardar' ?></button>
                <a href="orders.php" class="btn">Volver</a>

            </div>
        </form>
    </div>
</body>
</html>


