<?php
declare(strict_types=1); // Fuerza el uso estricto de tipos

namespace App\Polinomio; // Define el namespace (espacio de nombres)

// Clase abstracta que define la estructura general para trabajar con polinomios
abstract class PolinomioAbstracto
{
    // Método abstracto que se debe implementar para evaluar el polinomio en un valor x
    abstract public function evaluar(float $x): float;

    // Método abstracto que se debe implementar para obtener la derivada del polinomio
    abstract public function derivada(): array;
}
