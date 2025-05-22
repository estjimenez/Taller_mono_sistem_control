<?php
include '../../models/drivers/conexDB.php';
include '../../models/entities/model.php';
include '../../models/entities/platos.php';
include '../../controllers/ControlPlatos.php';

use App\controllers\ControlPlatos;

$controller = new ControlPlatos();

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$res = $id ? $controller->removeDishe($id) : 'empty';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Eliminar Plato</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .msg-ok { color: green; font-weight: bold; }
        .msg-error { color: red; font-weight: bold; }
    </style>

    <meta http-equiv="refresh" content="3; url=../platos.php" />
</head>
<body>
    <h1>Resultado de la busqueda</h1>
    <?php
    switch ($res) {
        case 'yes':
            echo '<p class="msg-ok">Plato eliminado correctamente. Redirigiendo...</p>';
            break;
        case 'not':
            echo '<p class="msg-error">No se pudo eliminar el plato. Puede estar relacionado con un pedido.</p>';
            break;
        default:
            echo '<p class="msg-error">El plato no existe o no se proporcionó ID.</p>';
            break;
    }
    ?>
    <p><a href="../platos.php">haz clic: </a>.</p>
</body>
</html>
