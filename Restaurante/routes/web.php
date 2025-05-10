<?php

function loadController($controllerName, $action) {
    $controllerPath = __DIR__ . "/../controllers/{$controllerName}.php";

    if (file_exists($controllerPath)) {
        require_once $controllerPath;
        $controller = new $controllerName();
        
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo "Método no encontrado: $action";
        }
    } else {
        echo "Controlador no encontrado: $controllerName";
    }
}

$route = $_GET['url'] ?? 'home';

switch (true) {
    case $route === 'home':
        loadController('HomeController', 'index');
        break;
    case $route === 'categorias':
        loadController('CategoriaController', 'index');
        break;
    case $route === 'categorias/form':
        loadController('CategoriaController', 'form');
        break;
    case $route === 'categorias/store':
        loadController('CategoriaController', 'store');
        break;
    case $route === 'categorias/update':
        loadController('CategoriaController', 'update');
        break;
    case str_starts_with($route, 'categorias/delete'):
        loadController('CategoriaController', 'delete');
        break;
    case $route === 'platos':
        loadController('PlatoController', 'index');
        break;
    case $route === 'platos/form':
        loadController('PlatoController', 'form');
        break;
    case $route === 'platos/store':
        loadController('PlatoController', 'store');
        break;
    case $route === 'platos/update':
        loadController('PlatoController', 'update');
        break;
    case str_starts_with($route, 'platos/delete'):
        loadController('PlatoController', 'delete');
        break;
    case $route === 'mesas':
        loadController('MesaController', 'index');
        break;
    case $route === 'mesas/form':
        loadController('MesaController', 'form');
        break;
    case $route === 'mesas/store':
        loadController('MesaController', 'store');
        break;
    case $route === 'mesas/update':
        loadController('MesaController', 'update');
        break;
    case str_starts_with($route, 'mesas/delete'):
        loadController('MesaController', 'delete');
        break;
    case $route === 'ordenes':
        loadController('OrdenController', 'index');
        break;
    case $route === 'ordenes/form':
        loadController('OrdenController', 'form');
        break;
    case $route === 'ordenes/store':
        loadController('OrdenController', 'store');
        break;
    case str_starts_with($route, 'ordenes/anular'):
        loadController('OrdenController', 'anular');
        break;
    case str_starts_with($route, 'ordenes/detalle'):
        loadController('OrdenController', 'detalle');
        break;
    case $route === 'reporte':
        loadController('ReporteController', 'reporte');
        break;
    case $route === 'reporte_anuladas':
        loadController('ReporteController', 'reporteAnuladas');
        break;
    default:
        echo "Ruta no válida: $route";
        break;
}