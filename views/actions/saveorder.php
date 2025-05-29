<?php
require_once '../../models/drivers/conexDB.php';
require_once(__DIR__ . '/../orders.php');

use MonoApp\Models\Drivers\ConexDB;

$db = new ConexDB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fecha = $_POST["fecha"];
    $mesa = $_POST["id_mesa"];
    $total = $_POST["total"];
    $platos = $_POST["platos"];
    $cantidades = $_POST["cantidades"];
    $precios = $_POST["precios"];


    $queryOrder = "INSERT INTO `Orders` (dateOrder, total, idTable) VALUES ('$fecha', $total, $mesa)";
    $db->exeSQL($queryOrder);


    $orderId = $db->lastInsertId();

    for ($i = 0; $i < count($platos); $i++) {
        $idPlato = (int)$platos[$i];
        $cantidad = (int)$cantidades[$i];   
        $precio = (float)$precios[$i];

        $queryDetail = "INSERT INTO order_details (quantity, price, idOrder, idDish)
                        VALUES ($cantidad, $precio, $orderId, $idPlato)";
        $db->exeSQL($queryDetail);
    }

    echo "<script>
        alert('Orden registrada correctamente.');
        window.location.href = '../index.php';
    </script>";
}
?>
