<?php include '../views/layout/header.php'; ?>

<h2><?= isset($mesa) ? 'Editar Mesa' : 'Registrar Nueva Mesa' ?></h2>

<form method="post" action="<?= isset($mesa) ? '/mesas/update' : '/mesas/store' ?>">
    <?php if (isset($mesa)): ?>
        <input type="hidden" name="id" value="<?= $mesa['id'] ?>">
    <?php endif; ?>

    <label>Nombre:</label>
    <input type="text" name="nombre" required value="<?= $mesa['nombre'] ?? '' ?>"><br><br>

    <button type="submit"><?= isset($mesa) ? 'Actualizar' : 'Registrar' ?></button>
</form>

<?php include '../views/layout/footer.php'; ?>
