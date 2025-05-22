<?php
include '../models/drivers/conexDB.php';
include '../models/entities/model.php';
include '../models/entities/platos.php';
include '../controllers/ControlPlatos.php';

use App\controllers\ControlPlatos;
$controller = new ControlPlatos();

$searchId = null;
$searchError = false;

if (isset($_GET['search'])) {
    $searchInput = $_GET['search'];
    if (filter_var($searchInput, FILTER_VALIDATE_INT) !== false) {
        $searchId = (int)$searchInput;
    } else {
        $searchError = true;
    }
}

if ($searchId !== null) {
    $plato = $controller->getDishe($searchId);
    $platos = $plato ? [$plato] : [];
} else {
    $platos = $controller->getAllDishes();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestión de Platos</title>
    <link rel="stylesheet" href="/MonoAplicacion2/views/css/categories.css" />
</head>
<body>
    <main class="container">
        <header>
            <h1>Gestión de Platos</h1>
            <a href="form_dishe.php" class="btn btn-primary">Registrar Nuevo Plato</a>
        </header>

        <section aria-labelledby="search-heading" style="margin-top: 1.5rem;">
            <h2 id="search-heading" class="sr-only">Buscar platos</h2>
            <form method="get" role="search" aria-label="Buscar plato por ID" style="display:flex; gap:0.5rem; max-width: 280px;">
                <label for="search-id" class="sr-only">Buscar por ID</label>
                <input
                    id="search-id"
                    type="number"
                    name="search"
                    placeholder="Buscar por ID"
                    required
                    aria-required="true"
                    value="<?= $searchId !== null ? htmlspecialchars($searchId) : '' ?>"
                    class="input-search"
                />
                <button type="submit" class="btn btn-secondary">Buscar</button>
            </form>
            <?php if ($searchError): ?>
                <p role="alert" style="color: #d9534f; margin-top: 0.5rem;">
                    Por favor, ingresa un número válido para buscar.
                </p>
            <?php endif; ?>
        </section>

        <section aria-labelledby="dishes-heading" style="margin-top: 2rem;">
            <h2 id="dishes-heading">Listado de Platos</h2>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($platos)): ?>
                            <?php foreach ($platos as $plato): ?>
                                <tr>
                                    <td><?= htmlspecialchars($plato->get("id")) ?></td>
                                    <td><?= htmlspecialchars($plato->get("description")) ?></td>
                                    <td>$<?= number_format((float)$plato->get("price"), 2, ',', '.') ?></td>
                                    <td><?= htmlspecialchars($plato->get("idCategory")) ?></td>
                                    <td>
                                        <a class="action-link" href="edit_dishe.php?id=<?= urlencode($plato->get("id")) ?>">Editar</a> | 
                                        <a 
                                            class="action-link" 
                                            href="actions/deletedishes.php?id=<?= urlencode($plato->get("id")) ?>"
                                            onclick="return confirm('¿Seguro que deseas eliminar este plato?')"
                                        >Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center; font-style: italic; color: #666;">
                                    No se encontraron platos.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <footer style="margin-top: 3rem; text-align: center;">
            <a href="../views/index.php" class="btn btn-primary">Volver a Menú Principal</a>
        </footer>
    </main>
</body>
</html>
x