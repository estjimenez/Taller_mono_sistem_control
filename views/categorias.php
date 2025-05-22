<?php
session_start();
include '../models/entities/categorias.php';
use MonoApp\Models\Entities\Categorias;

$categories = Categorias::getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
    <link rel="stylesheet" href="/Taller_mono_sistem_control/views/css/categories.css">

</head>
<body>

<div class="container">
    <?php if (!empty($_SESSION['msg'])): ?>
        <div class="success-message"><?= htmlspecialchars($_SESSION['msg']) ?></div>
        <?php unset($_SESSION['msg']); ?>
    <?php endif; ?>

    <h2>Categorías</h2>
    <a class="button-link" href="form_category.php">Registrar nueva categoría</a>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($categorias && $categorias->num_rows > 0): ?>
                <?php while ($cat = $categorias->fetch_assoc()): ?>
                    <tr>
                        <td><?= (int)$cat['id'] ?></td>
                        <td><?= htmlspecialchars($cat['name']) ?></td>
                        <td>
                            <a class="action-link" href="form_category.php?id=<?= urlencode($cat['id']) ?>">Editar</a> |
                            <a class="action-link" href="actions/EliminarCat.php?id=<?= urlencode($cat['id']) ?>" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No se encontraron categorías.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <br>
    <a class="button-link" href="index.php">Volver al menú principal</a>
</div>

</body>
</html>

 