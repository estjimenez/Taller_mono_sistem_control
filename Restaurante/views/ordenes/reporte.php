<?php include '../views/layout/header.php'; ?>

<h2>Reporte de Órdenes (No Anuladas)</h2>

<form method="get" action="/reportes">
    <label>Desde:</label>
    <input type="date" name="desde" required>
    <label>Hasta:</label>
    <input type="date" name="hasta" required>
    <button type="submit">Filtrar</button>
</form>

<h3>Órdenes</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Mesa</th>
        <th>Total</th>
    </tr>
    <?php foreach ($ordenes as $orden): ?>
    <tr>
        <td><?= $orden['id'] ?></td>
        <td><?= $orden['fecha'] ?></td>
        <td><?= $orden['mesa_nombre'] ?></td>
        <td>$<?= number_format($orden['total'], 2) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<p><strong>Total Recaudado:</strong> $<?= number_format($total_recaudado, 2) ?></p>

<h3>Ranking de Platos Más Vendidos</h3>
<table border="1">
    <tr>
        <th>Plato</th>
        <th>Cantidad Vendida</th>
    </tr>
    <?php foreach ($ranking as $plato): ?>
    <tr>
        <td><?= $plato['descripcion'] ?></td>
        <td><?= $plato['total_vendido'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../views/layout/footer.php'; ?>
