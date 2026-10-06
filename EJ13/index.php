<?php
// 1. Declaración de funciones lógicas independientes
// Cada función recibe el array completo de números y cuenta según su criterio específico

function contarEntre15y30(array $numeros): int {
    $contador = 0;
    foreach ($numeros as $num) {
        if ($num >= 15 && $num <= 30) {
            $contador++;
        }
    }
    return $contador;
}

function contarMayoresDe30(array $numeros): int {
    $contador = 0;
    foreach ($numeros as $num) {
        if ($num > 30) {
            $contador++;
        }
    }
    return $contador;
}

function contarMenoresDe25(array $numeros): int {
    $contador = 0;
    foreach ($numeros as $num) {
        if ($num < 25) {
            $contador++;
        }
    }
    return $contador;
}

// Inicialización de variables de resultados
$res15_30 = 0;
$resMayores30 = 0;
$resMenores25 = 0;

$listaNumeros = [12, 22, 35, 18, 40, 15, 24];

$res15_30 = contarEntre15y30($listaNumeros);
$resMayores30 = contarMayoresDe30($listaNumeros);
$resMenores25 = contarMenoresDe25($listaNumeros);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 13 - Análisis de Rangos con Funciones</title>
</head>
<body>
    
    <h1>Análisis de Números desde un Array</h1>

    <p><strong>Array analizado:</strong> [<?php echo implode(", ", $listaNumeros); ?>]</p>

    <hr>

    <h2>Resultados del análisis:</h2>
    <ul>
        <li>Números entre 15 y 30 (inclusive): <strong><?php echo $res15_30; ?></strong></li>
        <li>Números mayores de 30: <strong><?php echo $resMayores30; ?></strong></li>
        <li>Números menores de 25: <strong><?php echo $resMenores25; ?></strong></li>
    </ul>  
    
</body>
</html>