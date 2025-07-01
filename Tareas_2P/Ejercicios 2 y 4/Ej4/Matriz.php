<?php
declare(strict_types=1); // Activa tipado fuerte
require_once 'MatrizAbstracta.php'; // Importa la clase base

// Clase concreta que hereda de la clase abstracta y define los métodos
class Matriz extends MatrizAbstracta {

    // Método para multiplicar la matriz actual con otra matriz dada
    public function multiplicar(array $otra): array {
        $resultado = [];
        $n = count($this->matriz); // Se asume que la matriz es cuadrada

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $suma = 0;
                for ($k = 0; $k < $n; $k++) {
                    // Se realiza la multiplicación de elementos fila por columna
                    $suma += $this->matriz[$i][$k] * $otra[$k][$j];
                }
                $resultado[$i][$j] = $suma; // Se almacena el resultado en la posición correspondiente
            }
        }
        return $resultado;
    }

    // Método para calcular el determinante de una matriz 2x2
    public function determinante(): float {
        $a = $this->matriz;

        // Verifica si la matriz es de 2x2 y aplica la fórmula del determinante
        if (count($a) === 2) {
            return ($a[0][0] * $a[1][1]) - ($a[0][1] * $a[1][0]);
        }

        // Si no es 2x2, lanza una excepción
        throw new Exception("Determinante solo soportado para matrices 2x2.");
    }

    // Método para calcular la inversa de una matriz 2x2
    public function inversa(): ?array {
        $det = $this->determinante(); // Obtiene el determinante

        // Si el determinante es 0, no existe inversa
        if ($det === 0.0) return null;

        $a = $this->matriz;

        // Devuelve la matriz inversa utilizando la fórmula para matrices 2x2
        return [
            [ $a[1][1] / $det, -$a[0][1] / $det ],
            [ -$a[1][0] / $det, $a[0][0] / $det ]
        ];
    }
}
?>
