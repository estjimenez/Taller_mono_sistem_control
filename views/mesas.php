<?php
include_once __DIR__ . '/../models/entities/mesa.php';
use App\models\Mesa;

$mesaModel = new Mesa();
$mesas = $mesaModel->all();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mesas</title>
    <link rel="stylesheet" href="/Taller_mono_sistem_control/views/css/categories.css">
</head>

    <div class="container">
        <h2>Mesas</h2>
        <a href="form_mesa.php" class="button-link">Agregar Nueva Mesa</a>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID:</th>
                        <th>Nombre:</th>
                        <th>Opciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($mesa = $mesas->fetch_object()): ?>
                        <tr>
                            <td><?= $mesa->id ?></td>
                            <td><?= $mesa->name ?></td>
                            <td>
                                <a class="action-link" href="form_mesa.php?id=<?= $mesa->id ?>">Modificar</a> |
                                <a class="action-link" href="actions/deletemesa.php?id=<?= $mesa->id ?>" onclick="return confirm('¿Estás seguro de eliminar esta mesa?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <br>
        <a class="button-link" href="index.php">Regresar al Menú Principal</a>
    </div>
</body>
</html>
