<?php
declare(strict_types=1); // Tipado estricto

require_once __DIR__ . '/Polinomio.php'; // Carga la clase Polinomio

use App\Polinomio\Polinomio; // Usa el namespace definido

// Función que convierte el input en texto a array [grado => coeficiente]
function parsePolinomio(string $input): array {
    $terminos = [];
    $pares = explode(',', $input);
    foreach ($pares as $par) {
        [$grado, $coef] = explode('=', $par);
        $terminos[(int)$grado] = (float)$coef;
    }
    return $terminos;
}

// Suma dos polinomios representados como arrays asociativos
function sumarPolinomios(array $p1, array $p2): array {
    $resultado = $p1;
    foreach ($p2 as $grado => $coef) {
        $resultado[$grado] = ($resultado[$grado] ?? 0) + $coef;
    }
    return $resultado;
}

// Convierte el array del polinomio a una cadena legible
function polinomioToString(array $terminos): string {
    krsort($terminos); // Orden descendente por grado
    $partes = [];
    foreach ($terminos as $grado => $coef) {
        if ($coef == 0) continue;
        $partes[] = match (true) {
            $grado === 0 => (string)$coef,
            $grado === 1 => "$coef x",
            default => "$coef x^$grado"
        };
    }
    return implode(' + ', $partes);
}

// Redirige si no viene por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Captura los datos del formulario
$p1Input = $_POST['p1'] ?? '';
$p2Input = $_POST['p2'] ?? '';
$x = isset($_POST['x']) ? (float)$_POST['x'] : 0.0;

// Convierte las cadenas a arrays de términos
$p1Array = parsePolinomio($p1Input);
$p2Array = parsePolinomio($p2Input);

// Crea objetos Polinomio
$p1 = new Polinomio($p1Array);
$p2 = new Polinomio($p2Array);

// Evalúa ambos polinomios en x
$evalP1 = $p1->evaluar($x);
$evalP2 = $p2->evaluar($x);

// Calcula derivadas
$derivadaP1 = $p1->derivada();
$derivadaP2 = $p2->derivada();

// Suma de los polinomios
$suma = sumarPolinomios($p1Array, $p2Array);

// Convierte todos los arrays a texto legible
$p1String = polinomioToString($p1Array);
$p2String = polinomioToString($p2Array);
$derivadaP1String = polinomioToString($derivadaP1);
$derivadaP2String = polinomioToString($derivadaP2);
$sumaString = polinomioToString($suma);
?>
<!-- HTML con Bootstrap para mostrar resultados -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados del Polinomio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
<header class="bg-success text-white text-center py-3">
    <h1 class="h3">Resultados del Análisis de Polinomios</h1>
</header>

<main class="container flex-grow-1 py-4">
    <div class="row g-4">
        <!-- Valor evaluado -->
        <div class="col-12">
            <div class="alert alert-info shadow-sm text-center">
                <strong>Valor evaluado de x:</strong> <?= htmlspecialchars((string)$x) ?>
            </div>
        </div>

        <!-- Polinomio 1 -->
        <div class="col-md-6">
            <div class="card shadow rounded-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Polinomio 1</h5>
                </div>
                <div class="card-body">
                    <p><span class="badge bg-secondary">Ingresado:</span> <?= htmlspecialchars($p1Input) ?></p>
                    <p><span class="badge bg-secondary">Ecuación:</span> <?= htmlspecialchars($p1String) ?></p>
                    <p><span class="badge bg-secondary">Evaluado en x:</span> <?= $evalP1 ?></p>
                    <hr>
                    <h6 class="fw-bold">Derivada</h6>
                    <p><span class="badge bg-dark">Como ecuación:</span> <?= htmlspecialchars($derivadaP1String) ?></p>
                    <div class="bg-light border rounded p-2">
                        <pre class="mb-0"><?= print_r($derivadaP1, true) ?></pre>
                    </div>
                </div>
            </div>
        </div>

        <!-- Polinomio 2 -->
        <div class="col-md-6">
            <div class="card shadow rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Polinomio 2</h5>
                </div>
                <div class="card-body">
                    <p><span class="badge bg-secondary">Ingresado:</span> <?= htmlspecialchars($p2Input) ?></p>
                    <p><span class="badge bg-secondary">Ecuación:</span> <?= htmlspecialchars($p2String) ?></p>
                    <p><span class="badge bg-secondary">Evaluado en x:</span> <?= $evalP2 ?></p>
                    <hr>
                    <h6 class="fw-bold">Derivada</h6>
                    <p><span class="badge bg-dark">Como ecuación:</span> <?= htmlspecialchars($derivadaP2String) ?></p>
                    <div class="bg-light border rounded p-2">
                        <pre class="mb-0"><?= print_r($derivadaP2, true) ?></pre>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suma de Polinomios -->
        <div class="col-12">
            <div class="card shadow rounded-4 border-success">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Suma de Polinomios</h5>
                </div>
                <div class="card-body">
                    <p><span class="badge bg-secondary">Ecuación:</span> <?= htmlspecialchars($sumaString) ?></p>
                    <div class="bg-light border rounded p-2">
                        <pre class="mb-0"><?= print_r($suma, true) ?></pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 text-center">
            <a href="index.php" class="btn btn-outline-primary px-4 mt-3">← Volver al formulario</a>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-2 mt-auto">
    Desarrollado por <strong>Christian Vasconez</strong>
</footer>
</body>
</html>
