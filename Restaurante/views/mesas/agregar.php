<?php include_once 'views/layout/header.php'; ?>

<h2>Mesas</h2>
<a href="?controlador=mesas&accion=crear">Nueva Mesa</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while($mesa = $mesas->fetch_assoc()): ?>
        <tr>
            <td><?= $mesa['id'] ?></td>
            <td><?= $mesa['numero'] ?></td>
            <td>
                <a href="?controlador=mesas&accion=editar&id=<?= $mesa['id'] ?>">Editar</a>
                <a href="?controlador=mesas&accion=eliminar&id=<?= $mesa['id'] ?>" onclick="return confirm('¿Eliminar esta mesa?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include_once 'views/layout/footer.php'; ?>
