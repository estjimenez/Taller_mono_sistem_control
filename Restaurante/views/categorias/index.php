<?php require_once 'views/layout/header.php'; ?>

<h2>Categorías</h2>
<a href="index.php?controlador=categorias&accion=crear">Nueva Categoría</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($categorias as $categoria): ?>
        <tr>
            <td><?= $categoria['id'] ?></td>
            <td><?= $categoria['nombre'] ?></td>
            <td>
                <a href="index.php?controlador=categorias&accion=editar&id=<?= $categoria['id'] ?>">Editar</a>
                |
                <a href="index.php?controlador=categorias&accion=eliminar&id=<?= $categoria['id'] ?>" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'views/layout/footer.php'; ?>
