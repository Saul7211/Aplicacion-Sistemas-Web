<?php
interface OperacionesMatriz {
    public function multiplicar($matriz);
    public function inversa();
    public function determinante();
}

abstract class MatrizAbstracta implements OperacionesMatriz {
    protected $matriz;

    public function __construct($matriz) {
        $this->matriz = $matriz;
    }
}
?>
