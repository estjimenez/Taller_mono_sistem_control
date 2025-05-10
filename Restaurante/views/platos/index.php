<?php include '../views/layout/header.php'; ?>

<h2>Listado de Platos</h2>

<a href="/platos/form">Registrar Nuevo Plato</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Descripción</th>
        <th>Categoría</th>
        <th>Precio Unitario</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($platos as $plato): ?>
    <tr>
        <td><?= $plato['id'] ?></td>
        <td><?= $plato['descripcion'] ?></td>
        <td><?= $plato['categoria_nombre'] ?></td>
        <td>$<?= number_format($plato['precio'], 2) ?></td>
        <td>
            <a href="/platos/form&id=<?= $plato['id'] ?>">Editar</a> |
            <a href="/platos/delete&id=<?= $plato['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este plato?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../views/layout/footer.php'; ?>
