<?php
declare(strict_types=1); // Habilita tipado estricto para todo el archivo

// Se define una interfaz con métodos que toda matriz concreta debe implementar
interface OperacionesMatriz {
    public function multiplicar(array $otra): array;
    public function inversa(): ?array;
    public function determinante(): float;
}

// Clase abstracta que define la estructura base de una matriz
abstract class MatrizAbstracta implements OperacionesMatriz {
    protected $matriz; // Almacena la matriz en forma de array bidimensional

    // Constructor que recibe la matriz al crear el objeto
    public function __construct(array $matriz) {
        $this->matriz = $matriz;
    }
}
?>

