<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="./public/css/estilos.css">
    <script src="./public/js/funciones.js"></script>
</head>
<body>
    <h1>Bienvenido al Sistema de Control de Órdenes</h1>
    <nav>
        <ul>
            <li><a href="?controlador=home&accion=index">Inicio</a></li>
            <li><a href="?controlador=mesas&accion=listar">Mesas</a></li>
            <li><a href="?controlador=ordenes&accion=listar">Órdenes</a></li>
            <li><a href="?controlador=productos&accion=listar">Productos</a></li>
            <li><a href="?controlador=categorias&accion=listar">Categorías</a></li>
        </ul>
    </nav>
</body>
</html>