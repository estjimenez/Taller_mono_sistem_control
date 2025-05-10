<?php include 'views/layout/header.php'; ?>

<div class="container">
    <h1>Bienvenido al Sistema de Órdenes del Restaurante</h1>
    <p>Utiliza el menú para gestionar categorías, platos, mesas y órdenes.</p>

    <div class="card-container">
        <div class="card">
            <h3>Categorías</h3>
            <p><a href="index.php?url=categoria/index">Gestionar</a></p>
        </div>
        <div class="card">
            <h3>Platos</h3>
            <p><a href="index.php?url=plato/index">Gestionar</a></p>
        </div>
        <div class="card">
            <h3>Mesas</h3>
            <p><a href="index.php?url=mesa/index">Gestionar</a></p>
        </div>
        <div class="card">
            <h3>Órdenes</h3>
            <p><a href="index.php?url=orden/index">Registrar</a></p>
        </div>
        <div class="card">
            <h3>Reportes</h3>
            <p><a href="index.php?url=reporte/index">Ver</a></p>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>