<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Polinomios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<header class="bg-success text-white text-center py-3">
    <h1 class="h3">Calculadora de Polinomios</h1>
</header>

<main class="container flex-grow-1 py-5">
    <div class="card shadow-lg p-4 rounded-4 mx-auto" style="max-width: 650px;">
        <h2 class="text-center mb-4 text-primary">Ingrese los Polinomios</h2>

        <!-- Formulario que envía datos por POST al script procesar.php -->
        <form action="procesar.php" method="post">
            <!-- Primer polinomio -->
            <div class="mb-3">
                <label for="p1" class="form-label fw-semibold">Polinomio 1:</label>
                <input type="text" id="p1" name="p1" class="form-control"
                       placeholder="Ej: 2=3,1=4,0=5"
                       pattern="\d+=-?\d+(?:,\d+=-?\d+)*"
                       title="Ingrese pares grado=coef separados por comas. Ej: 2=3,1=4,0=5"
                       required>
                <div class="form-text">Ejemplo: 2=3,1=4,0=5 representa 3x² + 4x + 5</div>
            </div>

            <!-- Segundo polinomio -->
            <div class="mb-3">
                <label for="p2" class="form-label fw-semibold">Polinomio 2:</label>
                <input type="text" id="p2" name="p2" class="form-control" placeholder="Ej: 1=1,0=2"
                       pattern="\d+=-?\d+(?:,\d+=-?\d+)*"
                       required>
            </div>

            <!-- Valor de x -->
            <div class="mb-3">
                <label for="x" class="form-label fw-semibold">Valor de x para evaluar:</label>
                <input type="number" step="any" id="x" name="x" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100 fw-bold">Calcular</button>
        </form>
    </div>
</main>

<footer class="bg-dark text-white text-center py-2">
    Desarrollado por <strong>Christian Vasconez</strong>
</footer>
</body>
</html>
