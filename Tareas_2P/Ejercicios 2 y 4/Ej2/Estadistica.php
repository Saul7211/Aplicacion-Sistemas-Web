<?php
declare(strict_types=1); // Activa el tipado fuerte

// Interfaz que obliga a definir los métodos estadísticos
interface OperacionesEstadisticas {
    public function calcularMedia(array $datos): float;
    public function calcularMediana(array $datos): float;
    public function calcularModa(array $datos): array;
}

// Clase abstracta que implementa la interfaz, pero delega el método principal
abstract class Estadistica implements OperacionesEstadisticas {
    // Método abstracto que debe ser definido por la clase hija
    abstract public function generarInforme(array $conjuntos): array;
}
?>
