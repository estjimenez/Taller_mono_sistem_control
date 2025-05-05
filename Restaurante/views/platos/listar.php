<table>
    <tr>
        <th>ID</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Categoría</th>
    </tr>
    <?php foreach ($platos as $plato): ?>
        <tr>
            <td><?= $plato['id'] ?></td>
            <td><?= $plato['description'] ?></td>
            <td><?= $plato['price'] ?></td>
            <td><?= $plato['idCategory'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>