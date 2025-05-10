<?php

$url = isset($_GET['url']) ? $_GET['url'] : 'home';


$route = explode('/', trim($url, '/'));
$controllerName = ucfirst($route[0]) . 'Controller'; 
$method = $route[1] ?? 'index';


$controllerPath = 'controllers/' . $controllerName . '.php';


if (file_exists($controllerPath)) {
    require_once $controllerPath;

  
    if (class_exists($controllerName)) {
        $controller = new $controllerName();

      
        if (method_exists($controller, $method)) {
     
            call_user_func([$controller, $method]);
        } else {
            echo "⚠️ Método '$method' no encontrado en el controlador '$controllerName'.";
        }
    } else {
        echo "Clase '$controllerName' no definida dentro de '$controllerPath'.";
    }
} else {
    echo " Controlador '$controllerName' no encontrado en '$controllerPath'.";
}
