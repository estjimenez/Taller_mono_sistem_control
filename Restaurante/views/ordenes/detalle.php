<?php include '../views/layout/header.php'; ?>

<h2>Detalle de Orden #<?= $orden['id'] ?></h2>

<p><strong>Fecha:</strong> <?= $orden['fecha'] ?></p>
<p><strong>Mesa:</strong> <?= $orden['mesa_nombre'] ?></p>
<p><strong>Anulada:</strong> <?= $orden['anulada'] ? 'Sí' : 'No' ?></p>

<h3>Platos Ordenados</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Total</th>
    </tr>
    <?php foreach ($detalle as $item): ?>
    <tr>
        <td><?= $item['descripcion'] ?></td>
        <td><?= $item['cantidad'] ?></td>
        <td>$<?= number_format($item['precio_unitario'], 2) ?></td>
        <td>$<?= number_format($item['cantidad'] * $item['precio_unitario'], 2) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<p><strong>Total de la orden:</strong> $<?= number_format($orden['total'], 2) ?></p>

<?php include '../views/layout/footer.php'; ?>
