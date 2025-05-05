<?php
require_once "./core/Controller.php";
require_once "./core/Model.php";

// Redirigir a la página principal
header("Location: views/home.php");
exit();

?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>