<?php include_once 'views/layout/header.php'; ?>

<h2>Nueva Categoría</h2>
<form action="?controlador=categorias&accion=guardar" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <button type="submit">Guardar</button>
</form>

<?php include_once 'views/layout/footer.php'; ?>
