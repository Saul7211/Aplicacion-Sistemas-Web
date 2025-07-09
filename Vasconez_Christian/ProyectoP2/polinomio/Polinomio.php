<?php
declare(strict_types=1); // Usa tipado estricto

namespace App\Polinomio;

require_once __DIR__ . '/PolinomioAbstracto.php'; // Incluye la clase abstracta

// Clase que representa un polinomio concreto y hereda de PolinomioAbstracto
class Polinomio extends PolinomioAbstracto
{
    // Arreglo que contiene los términos del polinomio: [grado => coeficiente]
    private array $terminos;

    // Constructor que recibe un arreglo de términos
    public function __construct(array $terminos)
    {
        $this->terminos = $terminos;
    }

    // Evalúa el polinomio en un valor x usando la fórmula coef * x^grado
    public function evaluar(float $x): float
    {
        $resultado = 0.0;
        foreach ($this->terminos as $grado => $coeficiente) {
            $resultado += $coeficiente * pow($x, $grado);
        }
        return $resultado;
    }

    // Calcula la derivada del polinomio y devuelve un nuevo arreglo de términos
    public function derivada(): array
    {
        $derivada = [];
        foreach ($this->terminos as $grado => $coeficiente) {
            if ($grado > 0) {
                $derivada[$grado - 1] = $coeficiente * $grado;
            }
        }
        return $derivada;
    }

    // Devuelve los términos originales del polinomio
    public function getTerminos(): array
    {
        return $this->terminos;
    }
}
