<?php
$mensaje = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recogemos los datos del formulario de forma segura
    $valor1_str = $_POST['valor1'] ?? '';
    $valor2_str = $_POST['valor2'] ?? '';

    // 2. Validación de campos vacíos
    if (trim($valor1_str) === '' || trim($valor2_str) === '') {
        $error = "Error: Los campos no pueden estar vacíos.";
    } 
    // 3. Validación de que sean estrictamente numéricos
    elseif (!is_numeric($valor1_str) || !is_numeric($valor2_str)) {
        $error = "Error: Ambos valores deben ser numéricos.";
    } else {
        // Convertimos a float para poder operar matemáticamente con seguridad
        $valor1 = (float)$valor1_str;
        $valor2 = (float)$valor2_str;

        // 4. Validación de que sean distintos
        if ($valor1 === $valor2) {
            $error = "Error: Los valores introducidos tienen que ser distintos.";
        } else {
            // 5. Lógica principal: determinar cuál es el mayor
            if ($valor1 > $valor2) {
                $mensaje = "El valor mayor es el primero: " . $valor1;
            } else {
                $mensaje = "El valor mayor es el segundo: " . $valor2;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7 - Comparador de Valores</title>
    <style>
        .error { color: red; font-weight: bold; }
        .exito { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Comparador de Números</h1>

    <form action="" method="POST">
        <div>
            <label for="valor1">Primer valor:</label>
            <input type="number" step="any" name="valor1" id="valor1" required>
        </div>
        <br>
        <div>
            <label for="valor2">Segundo valor:</label>
            <input type="number" step="any" name="valor2" id="valor2" required>
        </div>
        <br>
        <button type="submit">Comparar</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <hr>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php else: ?>
            <p class="exito"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>