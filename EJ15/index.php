<?php
$mensaje = "";
$error = "";

// 1. Función para ordenar dos números de menor a mayor
function ordenarDosNumeros(float $a, float $b): array {
    
    if ($a > $b) {
        return [$b, $a]; 
    }
    
    return [$a, $b];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n1_str = $_POST['num1'] ?? '';
    $n2_str = $_POST['num2'] ?? '';

    if (trim($n1_str) === '' || trim($n2_str) === '') {
        $error = "Error: Los campos no pueden estar vacíos.";
    } elseif (!is_numeric($n1_str) || !is_numeric($n2_str)) {
        $error = "Error: Ambos valores deben ser numéricos.";
    } else {
        $num1 = (float)$n1_str;
        $num2 = (float)$n2_str;

        [$menor, $mayor] = ordenarDosNumeros($num1, $num2);

        $mensaje = "Los números ordenados de menor a mayor son: <strong>" . $menor . "</strong> y <strong>" . $mayor . "</strong>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 15 - Ordenar dos números</title>
</head>
<body>

    <h1>Ordenador de Números</h1>

    <form action="" method="POST">
        <div>
            <label for="num1">Primer número:</label>
            <input type="number" step="any" name="num1" id="num1" required>
        </div>
        <br>
        <div>
            <label for="num2">Segundo número:</label>
            <input type="number" step="any" name="num2" id="num2" required>
        </div>
        <br>
        <button type="submit">Ordenar</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <hr>
        <?php if (!empty($error)): ?>
            <p style="color: red; font-weight: bold;"><?php echo htmlspecialchars($error); ?></p>
        <?php else: ?>
            <p style="color: green; font-weight: bold;"><?php echo $mensaje; ?></p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>