<?php
interface OperacionesEstadisticas {
    public function calcularMedia($datos);
    public function calcularMediana($datos);
    public function calcularModa($datos);
}

abstract class Estadistica implements OperacionesEstadisticas {
    abstract public function generarInforme($conjuntos);
}
?>
