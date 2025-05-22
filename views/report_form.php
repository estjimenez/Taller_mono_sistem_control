<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reporte de Órdenes por Fecha</title>
    <link rel="stylesheet" href="css/menuprincipal.css" />
</head>
<body>
    <div class="container">
        <h1>Ingrese la fecha a consultar</h1>

        <form method="POST" action="actions/reportorders.php">
            <label>Fecha inicio:</label>
            <input type="date" name="startDate" required>

            <label>Fecha fin:</label>
            <input type="date" name="endDate" required>

            <button type="submit">Generar Reporte</button>
        </form>

        <br>
        <a href="Orden.php" class="btn-link">Ordenes:</a>
    </div>
    <style>
.btn-link {
  display: inline-block;
  background-color: #e0e0e0;
  color: #5a5a5a;
  font-weight: 600;
  padding: 10px 20px;
  border-radius: 8px;
  text-decoration: none;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  transition: background-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
  user-select: none;
}

.btn-link:hover,
.btn-link:focus {
  background-color: #cfcfcf;
  color: #444;
  box-shadow: 0 4px 12px rgba(0,0,0,0.12);
  outline: none;
  transform: translateY(-2px);
}
</style>

</body>
</html>
