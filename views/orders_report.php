<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reporte de Órdenes</title>
    <link rel="stylesheet" href="css/menuprincipal.css" />
<style>
    :root {
        --gris-oscuro: #2f2f2f;
        --gris-medio: #666666;
        --gris-claro: #dddddd;
        --gris-suave: #f5f5f5;
        --blanco: #ffffff;

        --amarillo-fondo: #fff9db;
        --amarillo-borde: #ffe58f;
        --amarillo-texto: #665c00;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: var(--gris-suave);
        color: var(--gris-oscuro);
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 900px;
        margin: 100px auto;
        background-color: var(--blanco);
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    h1 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        text-align: center;
        color: var(--gris-oscuro);
        border-bottom: 2px solid var(--gris-claro);
        padding-bottom: 0.5rem;
    }

    .no-results {
        background-color: var(--amarillo-fondo);
        color: var(--amarillo-texto);
        border: 2px solid var(--amarillo-borde);
        padding: 1.25rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        text-align: center;
        margin-top: 2rem;
        font-size: 1.1rem;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04);
    }

    .order-card {
        border: 1px solid var(--gris-claro);
        background-color: var(--gris-suave);
        border-radius: 10px;
        margin-bottom: 2rem;
        padding: 1rem 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        transition: box-shadow 0.3s ease;
    }

    .order-card h3 {
        color: var(--gris-oscuro);
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }

    .order-card:hover {
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        font-size: 0.95rem;
    }

    th, td {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid var(--gris-claro);
    }

    th {
        background-color: #e6e6e6;
        color: var(--gris-oscuro);
        font-weight: 600;
        text-align: left;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    td {
        color: var(--gris-medio);
    }

    tr:hover {
        background-color: #f0f0f0;
    }

    .nav-buttons {
        margin-top: 2rem;
        text-align: center;
    }

    .nav-buttons a {
        display: inline-block;
        background-color: var(--gris-oscuro);
        color: var(--blanco);
        text-decoration: none;
        padding: 0.8rem 1.5rem;
        margin: 0.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
    }

    .nav-buttons a:hover {
        background-color: #1f1f1f;
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        .container {
            padding: 1.5rem;
        }

        table, th, td {
            font-size: 0.9rem;
        }

        .nav-buttons a {
            width: 100%;
            display: block;
        }
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Reporte actual buscado de la fecha: <?= htmlspecialchars($startDate) ?> hasta la fecha es: <?= htmlspecialchars($endDate) ?></h1>

        <?php if (empty($orders)): ?>
            <p class="no-results">⚠️No se encontraron resultados para la fecha consultada.</p>
        <?php else: ?>
            <?php foreach ($orders as $order): ?>
                <div class="order-card">
                    <h3>Orden #<?= $order['id'] ?> - Mesa <?= $order['idTable'] ?></h3>
                    <p><strong>Fecha:</strong> <?= $order['dateOrder'] ?></p>
                    <p><strong>Total:</strong> $<?= number_format($order['total'], 0, ',', '.') ?></p>
                    <p><strong>Estado:</strong> <span style="color:green;">Activa</span></p>

                    <h4>Detalle:</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Plato</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order['details'] as $item): ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['description']) ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td>$<?= number_format($item['price'], 0, ',', '.') ?></td>
                                    <td>$<?= number_format($item['quantity'] * $item['price'], 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="nav-buttons">
            <a href="../report_form.php">Realizar Nueva Consulta</a>
            <a href="../orders.php">Volver a Menú Principal</a>
        </div>
    </div>
</body>
</html>
