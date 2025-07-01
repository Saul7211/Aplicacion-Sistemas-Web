<?php
declare(strict_types=1);
require_once 'EstadisticaBasica.php'; // Incluye la clase que contiene toda la lógica

// Conjuntos de datos de prueba (array asociativo)
$datos = [
    'grupo1' => [1, 2, 2, 3, 4],
    'grupo2' => [10, 20, 30, 40],
    'grupo3' => [7, 7, 8, 9, 10]
];

// Se instancia la clase concreta
$estadistica = new EstadisticaBasica();

// Se genera el informe completo
$resultados = $estadistica->generarInforme($datos);

// Imprime los resultados estadísticos por grupo
echo "📊 Resultados Estadísticos:\n";
foreach ($resultados as $grupo => $estadisticas) {
    echo "Grupo: $grupo\n";
    echo "  Media: {$estadisticas['media']}\n";
    echo "  Mediana: {$estadisticas['mediana']}\n";
    echo "  Moda: " . implode(', ', $estadisticas['moda']) . "\n\n";
}
?>
