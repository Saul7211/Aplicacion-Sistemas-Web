<?php
declare(strict_types=1);
require_once 'Estadistica.php'; // Importa la clase abstracta

// Clase concreta que extiende la clase abstracta Estadistica
class EstadisticaBasica extends Estadistica {

    // Calcula la media aritmética (promedio)
    public function calcularMedia(array $datos): float {
        return array_sum($datos) / count($datos);
    }

    // Calcula la mediana (valor central)
    public function calcularMediana(array $datos): float {
        sort($datos); // Ordena los datos
        $n = count($datos);
        $medio = intdiv($n, 2); // Parte entera de n/2

        // Si el número de datos es par
        return $n % 2 === 0
            ? ($datos[$medio - 1] + $datos[$medio]) / 2
            : $datos[$medio];
    }

    // Calcula la moda (valores que más se repiten)
    public function calcularModa(array $datos): array {
        $frecuencias = array_count_values($datos); // Cuenta cada número
        $max = max($frecuencias);                  // Encuentra la frecuencia máxima
        return array_keys($frecuencias, $max);     // Devuelve todos los valores con esa frecuencia
    }

    // Genera un informe con media, mediana y moda para cada conjunto de datos
    public function generarInforme(array $conjuntos): array {
        $informe = [];
        foreach ($conjuntos as $nombre => $datos) {
            $informe[$nombre] = [
                'media' => $this->calcularMedia($datos),
                'mediana' => $this->calcularMediana($datos),
                'moda' => $this->calcularModa($datos),
            ];
        }
        return $informe;
    }
}
?>


