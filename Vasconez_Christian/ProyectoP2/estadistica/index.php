<?php
declare(strict_types=1); // Fuerza tipado estricto en PHP
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Codificación -->
    <title>Calculadora de Estadísticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
</head>
<body class="bg-light d-flex flex-column min-vh-100">
<header class="bg-success text-white text-center py-3">
    <h1 class="h3">Resultados del Análisis Estadístico</h1>
</header>

<main class="container flex-grow-1 d-flex justify-content-center align-items-center py-5">
    <div class="card shadow-lg p-4 rounded-4 mx-auto w-100" style="max-width: 600px;">
        <h2 class="text-center mb-4 text-primary">Ingresar Datos</h2>
        <form action="procesar.php" method="post">
            <!-- Primer conjunto -->
            <div class="mb-3">
                <label for="conjunto1" class="form-label fw-semibold">Primer conjunto de datos:</label>
                <input type="text" id="conjunto1" name="conjunto1" class="form-control"
                       placeholder="Ej: 1,2,3,4"
                       pattern="^(\s*\d+(\.\d+)?\s*,)*\s*\d+(\.\d+)?\s*$"
                       title="Ingrese solo números separados por comas"
                       required>
            </div>
            <!-- Segundo conjunto -->
            <div class="mb-3">
                <label for="conjunto2" class="form-label fw-semibold">Segundo conjunto de datos:</label>
                <input type="text" id="conjunto2" name="conjunto2" class="form-control"
                       placeholder="Ej: 5,6,7,8"
                       pattern="^(\s*\d+(\.\d+)?\s*,)*\s*\d+(\.\d+)?\s*$"
                       title="Ingrese solo números separados por comas"
                       required>
            </div>
            <button type="submit" class="btn btn-success w-100 fw-bold">
                Calcular estadísticas
            </button>
        </form>
    </div>
</main>

<footer class="bg-dark text-white text-center py-2">
    Desarrollado por <strong>Christian Vasconez</strong>
</footer>
</body>
</html>
