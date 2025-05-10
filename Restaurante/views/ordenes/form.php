<?php include '../views/layout/header.php'; ?>

<h2>Registrar Orden</h2>

<form method="post" action="/ordenes/store">
    <label>Fecha:</label>
    <input type="date" name="fecha" required><br><br>

    <label>Mesa:</label>
    <select name="mesa_id" required>
        <option value="">Seleccione</option>
        <?php foreach ($mesas as $mesa): ?>
            <option value="<?= $mesa['id'] ?>"><?= $mesa['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <h3>Platos</h3>
    <div id="detalle">
        <div class="fila">
            <select name="platos[]" required onchange="actualizarPrecio(this)">
                <option value="">Seleccione plato</option>
                <?php foreach ($platos as $plato): ?>
                    <option value="<?= $plato['id'] ?>" data-precio="<?= $plato['precio'] ?>"><?= $plato['descripcion'] ?> ($<?= $plato['precio'] ?>)</option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="cantidades[]" min="1" placeholder="Cantidad" required>
            <input type="number" name="precios[]" step="0.01" readonly placeholder="Precio">
        </div>
    </div>

    <button type="button" onclick="agregarFila()">+ Agregar Plato</button><br><br>

    <button type="submit">Registrar Orden</button>
</form>

<script>
function agregarFila() {
    const detalle = document.getElementById('detalle');
    const fila = detalle.querySelector('.fila').cloneNode(true);
    fila.querySelectorAll('input').forEach(i => i.value = '');
    detalle.appendChild(fila);
}

function actualizarPrecio(select) {
    const precio = select.options[select.selectedIndex].getAttribute('data-precio');
    select.parentElement.querySelector('input[name="precios[]"]').value = precio;
}
</script>

<?php include '../views/layout/footer.php'; ?>
