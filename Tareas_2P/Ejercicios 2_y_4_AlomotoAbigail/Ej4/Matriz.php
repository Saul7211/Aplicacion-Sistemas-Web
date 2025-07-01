<?php
require_once 'MatrizAbstracta.php';

class Matriz extends MatrizAbstracta {

    public function multiplicar($otraMatriz) {
        $resultado = [];
        foreach ($this->matriz as $i => $fila) {
            foreach ($otraMatriz[$i] as $j => $valor) {
                $suma = 0;
                foreach ($fila as $k => $val) {
                    $suma += $val * $otraMatriz[$k][$j];
                }
                $resultado[$i][$j] = $suma;
            }
        }
        return $resultado;
    }

    public function inversa() {
        $a = $this->matriz;
        $det = $this->determinante();
        if ($det == 0) return null;

        if (count($a) == 2) {
            return [
                [ $a[1][1]/$det, -$a[0][1]/$det ],
                [ -$a[1][0]/$det, $a[0][0]/$det ]
            ];
        }
        return null; // solo implementado para 2x2
    }

    public function determinante() {
        $a = $this->matriz;
        if (count($a) == 2) {
            return ($a[0][0] * $a[1][1]) - ($a[0][1] * $a[1][0]);
        }
        return null;
    }
}
?>
