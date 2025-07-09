<?php
declare(strict_types=1); // Tipado estricto

require_once __DIR__ . '/EstadisticaBasica.php'; // Incluye la clase de estadísticas
use App\Estadistica\EstadisticaBasica;

// Convierte la cadena de entrada a un array de floats
function convertirAFloatArray(string $cadena): array {
    $valores = array_map('trim', explode(',', $cadena)); // Elimina espacios y separa por coma
    return array_map('floatval', $valores); // Convierte cada valor a float
}

// Verifica si la solicitud fue por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [];

    // Procesa el conjunto 1 si está presente
    if (!empty($_POST['conjunto1'])) {
        $datos['Conjunto 1'] = convertirAFloatArray($_POST['conjunto1']);
    }

    // Procesa el conjunto 2 si está presente
    if (!empty($_POST['conjunto2'])) {
        $datos['Conjunto 2'] = convertirAFloatArray($_POST['conjunto2']);
    }

    $estadistica = new EstadisticaBasica(); // Instancia la clase de estadísticas
    $informe = $estadistica->generarInforme($datos); // Genera el informe
} else {
    echo "No se recibieron datos."; // Mensaje si no se accedió por POST
    exit;
}
?>
<!-- HTML para mostrar resultados -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Estadísticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
<header class="bg-success text-white text-center py-3">
    <h1 class="h3">Resultados del Análisis Estadístico</h1>
</header>

<main class="container flex-grow-1 py-5">
    <div class="card shadow-lg p-4 rounded-4">
        <h4 class="fw-bold mb-3">Datos ingresados:</h4>
        <ul class="list-group mb-4">
            <?php foreach ($datos as $nombre => $valores): ?>
                <li class="list-group-item">
                    <strong><?= htmlspecialchars($nombre) ?>:</strong>
                    <?= implode(', ', $valores) ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <h4 class="fw-bold mb-3">Informe estadístico (tabla):</h4>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>Conjunto</th>
                    <th>Media</th>
                    <th>Mediana</th>
                    <th>Moda</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informe as $conjunto => $estadisticas): ?>
                    <tr>
                        <td><?= htmlspecialchars($conjunto) ?></td>
                        <td><?= $estadisticas['media'] ?></td>
                        <td><?= $estadisticas['mediana'] ?></td>
                        <td>
                            <?= is_array($estadisticas['moda'])
                                ? implode(', ', $estadisticas['moda'])
                                : $estadisticas['moda'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h4 class="fw-bold mt-5">En arrays:</h4>
        <div class="bg-dark text-light p-3 rounded mb-3">
            <pre class="mb-0"><?= print_r($informe, true) ?></pre>
        </div>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-primary">← Volver al formulario</a>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-2 mt-auto">
    Desarrollado por <strong>Christian VASCONEZ</strong>
</footer>
</body>
</html>
