<?php include '../views/layout/header.php'; ?>

<h2><?= isset($plato) ? 'Editar Plato' : 'Registrar Nuevo Plato' ?></h2>

<form method="post" action="<?= isset($plato) ? '/platos/update' : '/platos/store' ?>">
    <?php if (isset($plato)): ?>
        <input type="hidden" name="id" value="<?= $plato['id'] ?>">
    <?php endif; ?>

    <label>Descripción:</label>
    <input type="text" name="descripcion" required value="<?= $plato['descripcion'] ?? '' ?>"><br><br>

    <label>Categoría:</label>
    <select name="categoria_id" <?= isset($plato) ? 'disabled' : '' ?> required>
        <option value="">Seleccione</option>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>"
                <?= (isset($plato) && $plato['categoria_id'] == $cat['id']) ? 'selected' : '' ?>>
                <?= $cat['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Precio Unitario:</label>
    <input type="number" step="0.01" name="precio" required value="<?= $plato['precio'] ?? '' ?>"><br><br>

    <button type="submit"><?= isset($plato) ? 'Actualizar' : 'Registrar' ?></button>
</form>

<?php include '../views/layout/footer.php'; ?>
