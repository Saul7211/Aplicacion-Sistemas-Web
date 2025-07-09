<?php
declare(strict_types=1); // Fuerza el uso estricto de tipos

namespace App\Estadistica; // Define el espacio de nombres de la clase

// Clase abstracta base para estadísticas
abstract class Estadistica
{
    // Método abstracto para calcular la media
    abstract public function calcularMedia(array $numeros): float;

    // Método abstracto para calcular la mediana
    abstract public function calcularMediana(array $numeros): float;

    // Método abstracto para calcular la moda
    abstract public function calcularModa(array $numeros): float;
}
