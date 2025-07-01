<?php
require_once 'Matriz.php';

$matrizA = [
    [4, 7],
    [2, 6]
];

$matriz = new Matriz($matrizA);

echo "Determinante: " . $matriz->determinante() . PHP_EOL;

$inversa = $matriz->inversa();
echo "Inversa: " . PHP_EOL;
print_r($inversa);
?>
