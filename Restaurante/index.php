<?php
require_once "./core/Controller.php";
require_once "./core/Model.php";

// Obtener el controlador y la acción desde la URL
$controlador = isset($_GET['controlador']) ? $_GET['controlador'] : 'home';
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'index';

// Construir el nombre del controlador
$controlador = ucfirst($controlador) . "Controller";
$controladorArchivo = "./controllers/" . $controlador . ".php";

// Verificar si el controlador existe
if (file_exists($controladorArchivo)) {
    require_once $controladorArchivo;
    $controladorObjeto = new $controlador();

    // Verificar si el método (acción) existe en el controlador
    if (method_exists($controladorObjeto, $accion)) {
        $controladorObjeto->$accion();
    } else {
        die("La acción '$accion' no existe en el controlador '$controlador'.");
    }
} else {
    die("El controlador '$controlador' no existe.");
}
?>