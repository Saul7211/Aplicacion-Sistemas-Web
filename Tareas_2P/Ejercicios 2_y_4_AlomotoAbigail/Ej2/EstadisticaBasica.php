<?php
require_once 'Estadistica.php';

class EstadisticaBasica extends Estadistica {
    
    public function calcularMedia($datos) {
        return array_sum($datos) / count($datos);
    }

    public function calcularMediana($datos) {
        sort($datos);
        $n = count($datos);
        $mid = intval($n / 2);
        return $n % 2 === 0 ? ($datos[$mid - 1] + $datos[$mid]) / 2 : $datos[$mid];
    }

    public function calcularModa($datos) {
        $valores = array_count_values($datos);
        $max = max($valores);
        return array_keys($valores, $max);
    }

    public function generarInforme($conjuntos) {
        $informe = [];
        foreach ($conjuntos as $nombre => $datos) {
            $informe[$nombre] = [
                'media' => $this->calcularMedia($datos),
                'mediana' => $this->calcularMediana($datos),
                'moda' => $this->calcularModa($datos)
            ];
        }
        return $informe;
    }
}
?>
