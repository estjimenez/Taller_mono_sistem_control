<?php include '../views/layout/header.php'; ?>

<h2>Listado de Órdenes</h2>

<a href="/ordenes/form">Registrar Nueva Orden</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Mesa</th>
        <th>Total</th>
        <th>Anulada</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($ordenes as $orden): ?>
    <tr>
        <td><?= $orden['id'] ?></td>
        <td><?= $orden['fecha'] ?></td>
        <td><?= $orden['mesa_nombre'] ?></td>
        <td>$<?= number_format($orden['total'], 2) ?></td>
        <td><?= $orden['anulada'] ? 'Sí' : 'No' ?></td>
        <td>
            <a href="/ordenes/detalle&id=<?= $orden['id'] ?>">Ver Detalle</a>
            <?php if (!$orden['anulada']): ?>
                | <a href="/ordenes/anular&id=<?= $orden['id'] ?>" onclick="return confirm('¿Deseas anular esta orden?')">Anular</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../views/layout/footer.php'; ?>
