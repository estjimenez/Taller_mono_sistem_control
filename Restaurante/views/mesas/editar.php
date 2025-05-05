<?php include_once 'views/layout/header.php'; ?>

<h2>Editar Mesa</h2>
<form action="?controlador=mesas&accion=actualizar" method="post">
    <input type="hidden" name="id" value="<?= $mesa['id'] ?>">
    <label for="numero">Número de Mesa:</label>
    <input type="number" name="numero" value="<?= $mesa['numero'] ?>" required>
    <button type="submit">Actualizar</button>
</form>

<?php include_once 'views/layout/footer.php'; ?>
