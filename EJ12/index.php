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
$enviado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enviado = true;

    // Recogemos los 4 números de forma segura validando si son numéricos
    $n1 = is_numeric($_POST['n1'] ?? '') ? (float)$_POST['n1'] : 0;
    $n2 = is_numeric($_POST['n2'] ?? '') ? (float)$_POST['n2'] : 0;
    $n3 = is_numeric($_POST['n3'] ?? '') ? (float)$_POST['n3'] : 0;
    $n4 = is_numeric($_POST['n4'] ?? '') ? (float)$_POST['n4'] : 0;

    // Agrupamos los números en un array para pasárselo cómodamente a las funciones
    $listaNumeros = [$n1, $n2, $n3, $n4];

    // 3. Ejecutamos las funciones asignando el resultado
    $res15_30 = contarEntre15y30($listaNumeros);
    $resMayores30 = contarMayoresDe30($listaNumeros);
    $resMenores25 = contarMenoresDe25($listaNumeros);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 12 - Análisis de Rangos con Funciones</title>
</head>
<body>

    <h1>Analizador de 4 Números</h1>
    <form action="" method="POST">
        <div>
            <label for="n1">Número 1</label>
            <input type="number" name="n1" id="n1" required>
        </div>
        <br>
        <div>
            <label for="n2">Número 2</label>
            <input type="number" name="n2" id="n2" required>
        </div>
        <br>
        <div>
            <label for="n3">Número 3</label>
            <input type="number" name="n3" id="n3" required>
        </div>
        <br>
        <div>
            <label for="n1">Número 4</label>
            <input type="number" name="n4" id="n4" required>
        </div>
        <br>
        <button type="submit">Enviar</button>
    </form>
    <?php if($enviado): ?>
        <h2>Resultados del análisis:</h2>
        <ul>
            <li>Números entre 15 y 30 (inclusive): <strong><?php echo $res15_30; ?></strong></li>
            <li>Números mayores de 30: <strong><?php echo $resMayores30; ?></strong></li>
            <li>Números menores de 25: <strong><?php echo $resMenores25; ?></strong></li>
        </ul>
    <?php endif; ?>
    
    
    
</body>
</html>