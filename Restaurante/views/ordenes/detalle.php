<?php include_once 'views/layout/header.php'; ?>

<h2>Detalle de Orden #<?= $orden['id'] ?></h2>

<p><strong>Mesa:</strong> <?= $orden['mesa'] ?></p>
<p><strong>Fecha:</strong> <?= $orden['fecha'] ?></p>
<p><strong>Estado:</strong> <?= $orden['estado'] ?></p>
<p><strong>Total:</strong> $<?= number_format($orden['total'], 2) ?></p>

<h3>Platos:</h3>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($detalles as $detalle): ?>
        <tr>
            <td><?= $detalle['nombre_plato'] ?></td>
            <td><?= $detalle['categoria'] ?></td>
            <td><?= $detalle['cantidad'] ?></td>
            <td>$<?= number_format($detalle['precio'], 2) ?></td>
            <td>$<?= number_format($detalle['cantidad'] * $detalle['precio'], 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="?controlador=ordenes&accion=index">← Volver</a>

<?php include_once 'views/layout/footer.php'; ?>
