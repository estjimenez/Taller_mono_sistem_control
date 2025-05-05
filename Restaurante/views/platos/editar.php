<?php include_once 'views/layout/header.php'; ?>

<h2>Editar Plato</h2>
<form action="?controlador=platos&accion=actualizar" method="post">
    <input type="hidden" name="id" value="<?= $plato['id'] ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $plato['nombre'] ?>" required>

    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" value="<?= $plato['precio'] ?>" required>

    <label for="categoria_id">Categoría:</label>
    <select name="categoria_id" required>
        <?php while($categoria = $categorias->fetch_assoc()): ?>
            <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $plato['categoria_id'] ? 'selected' : '' ?>>
                <?= $categoria['nombre'] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Actualizar</button>
</form>

<?php include_once 'views/layout/footer.php'; ?>
