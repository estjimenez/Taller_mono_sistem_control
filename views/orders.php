<?php
require_once __DIR__ . '/../models/drivers/conexDB.php';
$db = new \MonoApp\Models\Drivers\ConexDB();


$anuladas = [];
$filename = __DIR__ . '/actions/anuladas.txt';
if (file_exists($filename)) {
    $anuladas = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}


$queryOrders = "
    SELECT o.id, o.dateOrder, o.total, t.name AS mesa
    FROM orders o
    JOIN restaurant_tables t ON o.idTable = t.id
    ORDER BY o.dateOrder DESC
";
$ordersResult = $db->exeSQL($queryOrders);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Órdenes</title>
    <link rel="stylesheet" href="/taller_mono_sitem_control/views/css/form.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        background-color: #f4f5f7; /* gris muy claro */
        font-family: 'Segoe UI', sans-serif;
        color: #333;
    }

    .main-container {
        background-color: #fff; /* blanco puro */
        max-width: 95%;
        margin: 30px auto;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        transition: box-shadow 0.3s ease;
    }

    .main-container:hover {
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.16);
    }

    h1.form-title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 30px;
        color: #222; /* gris oscuro */
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        user-select: none;
    }

    .btn-footer {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    .form-link {
        font-weight: 600;
        color: #5a5a5a; /* gris medio */
        font-size: 1rem;
        text-decoration: none;
        background-color: #e0e0e0; /* gris claro */
        padding: 12px 24px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
        user-select: none;
    }

    .form-link:hover,
    .form-link:focus {
        background-color: #cfcfcf;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
        outline: none;
        color: #444; /* Gris más oscuro al hover */
    }

    /* Responsivo */
    @media (max-width: 600px) {
        .main-container {
            padding: 20px 25px;
        }

        h1.form-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .form-link {
            font-size: 0.9rem;
            padding: 10px 18px;
        }
    }
</style>

</head>
<body>

<div class="main-container">
    <h1 class="form-title">Listado de Órdenes</h1>

    <table class="table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Mesa</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Detalle</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($order = $ordersResult->fetch_object()): ?>
            <?php
            $isCancelled = in_array((string)$order->id, $anuladas, true);
            $estado = $isCancelled ? 'Anulada' : 'Activa';
            ?>
            <tr>
                <td><?= $order->id ?></td>
                <td><?= $order->dateOrder ?></td>
                <td><?= $order->mesa ?></td>
                <td>$<?= number_format($order->total, 2) ?></td>
                <td>
                    <span class="<?= $isCancelled ? 'estado-anulada' : 'estado-activa' ?>">
                        <?= $estado ?>
                    </span>
                </td>
                <td>
                    <table class="table-details">
                        <thead>
                            <tr>
                                <th>Plato</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryDetails = "
                                SELECT d.description, od.quantity, od.price
                                FROM order_details od
                                JOIN platos d ON od.idDish = d.id
                                WHERE od.idOrder = {$order->id}
                            ";
                            $detailsResult = $db->exeSQL($queryDetails);
                            while ($detail = $detailsResult->fetch_object()):
                                $subtotal = $detail->quantity * $detail->price;
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($detail->description) ?></td>
                                <td><?= $detail->quantity ?></td>
                                <td>$<?= number_format($detail->price, 2) ?></td>
                                <td>$<?= number_format($subtotal, 2) ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </td>
                <td>
                    <?php if (!$isCancelled): ?>
                        <a href="actions/cancelorder.php?id=<?= $order->id ?>"
                           onclick="return confirm('¿Anular esta orden?')"
                           class="form-button cancel-button">
                            Anular
                        </a>
                    <?php else: ?>
                        <span class="form-text-muted">-</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <div class="btn-footer">
        <a href="index.php" class="form-link"> Volver al Menú Principal</a>
    </div>
</div>

</body>
</html>
