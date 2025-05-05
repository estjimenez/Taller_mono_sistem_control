<?php
class View {
    public static function render($viewPath, $data = []) {
        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            die("La vista no se encuentra: " . $viewPath);
        }
    }
}
?>