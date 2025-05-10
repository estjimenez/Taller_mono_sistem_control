<?php require_once 'views/layout/header.php'; ?>

<h2><?= isset($categoria) ? 'Editar Categoría' : 'Nueva Categoría' ?></h2>

<form method="post" action="index.php?controlador=categorias&accion=guardar">
    <input type="hidden" name="id" value="<?= isset($categoria) ? $categoria['id'] : '' ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" required value="<?= isset($categoria) ? $categoria['nombre'] : '' ?>">
    <br><br>

    <input type="submit" value="Guardar">
    <a href="index.php?controlador=categorias&accion=index">Cancelar</a>
</form>

<?php require_once 'views/layout/footer.php'; ?>
