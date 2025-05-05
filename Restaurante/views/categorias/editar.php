<?php include_once 'views/layout/header.php'; ?>

<h2>Editar Categoría</h2>
<form action="?controlador=categorias&accion=actualizar" method="post">
    <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $categoria['nombre'] ?>" required>
    <button type="submit">Actualizar</button>
</form>

<?php include_once 'views/layout/footer.php'; ?>
