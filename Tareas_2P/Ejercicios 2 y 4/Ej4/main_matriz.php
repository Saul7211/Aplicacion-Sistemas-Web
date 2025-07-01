<?php
declare(strict_types=1); // Habilita el tipado fuerte en este archivo
require_once 'Matriz.php'; // Importa la clase Matriz que contiene toda la lógica

// Se define una matriz 2x2 como ejemplo
$matrizOriginal = [
    [4, 7],
    [2, 6]
];

// Se crea una instancia de la clase Matriz con la matriz definida
$matriz = new Matriz($matrizOriginal);

// Muestra la matriz original en consola
echo "🔢 Matriz Original:\n";
print_r($matrizOriginal);

// Calcula y muestra el determinante
$det = $matriz->determinante();
echo "\nDeterminante: $det\n";

// Calcula y muestra la matriz inversa (si existe)
$inversa = $matriz->inversa();
echo "\nMatriz Inversa:\n";
print_r($inversa);

// Multiplica la matriz por sí misma y muestra el resultado
$producto = $matriz->multiplicar($matrizOriginal);
echo "\nMultiplicación de matriz por sí misma:\n";
print_r($producto);
?>
