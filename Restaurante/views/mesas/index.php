<?php include '../views/layout/header.php'; ?>

<h2>Listado de Mesas</h2>

<a href="/mesas/form">Registrar Nueva Mesa</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($mesas as $mesa): ?>
    <tr>
        <td><?= $mesa['id'] ?></td>
        <td><?= $mesa['nombre'] ?></td>
        <td>
            <a href="/mesas/form&id=<?= $mesa['id'] ?>">Editar</a> |
            <a href="/mesas/delete&id=<?= $mesa['id'] ?>" onclick="return confirm('¿Está seguro de eliminar esta mesa?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../views/layout/footer.php'; ?>
