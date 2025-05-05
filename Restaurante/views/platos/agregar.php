<?php include_once 'views/layout/header.php'; ?>

<h2>Platos</h2>
<a href="?controlador=platos&accion=crear">Nuevo Plato</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while($plato = $platos->fetch_assoc()): ?>
        <tr>
            <td><?= $plato['id'] ?></td>
            <td><?= $plato['nombre'] ?></td>
            <td>$<?= number_format($plato['precio'], 2) ?></td>
            <td><?= $plato['categoria'] ?></td>
            <td>
                <a href="?controlador=platos&accion=editar&id=<?= $plato['id'] ?>">Editar</a>
                <a href="?controlador=platos&accion=eliminar&id=<?= $plato['id'] ?>" onclick="return confirm('¿Eliminar este plato?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include_once 'views/layout/footer.php'; ?>
