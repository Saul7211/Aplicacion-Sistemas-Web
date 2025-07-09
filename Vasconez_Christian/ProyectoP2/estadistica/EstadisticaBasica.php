<?php
declare(strict_types=1); // Usa tipos estrictos para evitar errores de conversión

namespace App\Estadistica; // Mismo espacio de nombres

require_once __DIR__ . '/Estadistica.php'; // Incluye la clase abstracta base

// Clase concreta que extiende la clase Estadistica
class EstadisticaBasica extends Estadistica
{
    // Implementación del cálculo de la media
    public function calcularMedia(array $numeros): float
    {
        $total = array_sum($numeros); // Suma de todos los elementos
        $cantidad = count($numeros); // Cantidad de elementos
        return $cantidad > 0 ? $total / $cantidad : 0; // Retorna el promedio o 0 si no hay datos
    }

    // Implementación del cálculo de la mediana
    public function calcularMediana(array $numeros): float
    {
        sort($numeros); // Ordena los números
        $cantidad = count($numeros); // Cuenta los elementos
        if ($cantidad === 0) {
            return 0; // Si no hay datos, retorna 0
        }
        $medio = (int) ($cantidad / 2); // Posición central
        if ($cantidad % 2 === 0) {
            // Si es par, promedia los dos valores centrales
            return ($numeros[$medio - 1] + $numeros[$medio]) / 2;
        } else {
            // Si es impar, toma el valor central
            return $numeros[$medio];
        }
    }

    // Implementación del cálculo de la moda
    public function calcularModa(array $numeros): float
    {
        // Cuenta las repeticiones de cada valor como string (para evitar errores con floats)
        $conteos = array_count_values(array_map('strval', $numeros));

        arsort($conteos); // Ordena descendente por frecuencia
        $moda = array_key_first($conteos); // Toma el primer valor más frecuente
        return (float)$moda; // Retorna convertido a float
    }

    // Genera un informe de estadísticas para varios conjuntos de datos
    public function generarInforme(array $datos): array
    {
        $informe = [];
        foreach ($datos as $nombre => $numeros) {
            $informe[$nombre] = [
                'media' => $this->calcularMedia($numeros),
                'mediana' => $this->calcularMediana($numeros),
                'moda' => $this->calcularModa($numeros),
            ];
        }
        return $informe;
    }
}
