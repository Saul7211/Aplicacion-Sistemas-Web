<?php
require_once 'EstadisticaBasica.php';

$datos = [
    'grupo1' => [1, 2, 2, 3, 4],
    'grupo2' => [10, 20, 30, 40],
    'grupo3' => [7, 7, 8, 9, 10]
];

$estadisticas = new EstadisticaBasica();
$resultado = $estadisticas->generarInforme($datos);

print_r($resultado);
?>
