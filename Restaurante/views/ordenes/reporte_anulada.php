<?php include '../views/layout/header.php'; ?>

<h2>Reporte de Órdenes Anuladas</h2>

<form method="get" action="/reportes/anuladas">
    <label>Desde:</label>
    <input type="date" name="desde" required>
    <label>Hasta:</label>
    <input type="date" name="hasta" required>
    <button type="submit">Filtrar</button>
</form>

<h3>Órdenes Anuladas</h3>
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

<p><strong>Total de Órdenes Anuladas:</strong> $<?= number_format($total_anulado, 2) ?></p>

<?php include '../views/layout/footer.php'; ?>
