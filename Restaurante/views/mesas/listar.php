<?php include_once 'views/layout/header.php'; ?>

<h2>Nueva Mesa</h2>
<form action="?controlador=mesas&accion=guardar" method="post">
    <label for="numero">Número de Mesa:</label>
    <input type="number" name="numero" required>
    <button type="submit">Guardar</button>
</form>

<?php include_once 'views/layout/footer.php'; ?>
