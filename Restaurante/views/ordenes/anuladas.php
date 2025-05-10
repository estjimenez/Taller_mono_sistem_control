<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Órdenes Anuladas</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <header>
        <h1>Órdenes Anuladas</h1>
        <nav>
            <a href="index.php">Inicio</a> |
            <a href="index.php?controller=Orden&action=index">Órdenes</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Listado de Órdenes Anuladas</h2>
            <?php if ($anuladas && $anuladas->num_rows > 0): ?>
                <table border="1" cellpadding="8" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mesa</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($orden = $anuladas->fetch_object()): ?>
                            <tr>
                                <td><?= $orden->id ?></td>
                                <td><?= $orden->table_id ?></td>
                                <td><?= $orden->created_at ?></td>
                                <td>$<?= number_format($orden->total, 2) ?></td>
                                <td><?= $orden->motivo_cancelacion ?? 'N/A' ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay órdenes anuladas registradas.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Restaurante MVC</p>
    </footer>
</body>
</html>
