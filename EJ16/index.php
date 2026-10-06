<?php

$precioUnitario = 9.00; 

$mostrarResultados = false;
$cantidad = 0;
$subtotal = 0;
$porcentajeDescuento = 0;
$montoDescuento = 0;
$totalFinal = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cantidadInput = $_POST['cantidad'] ?? 1;
    
    if (is_numeric($cantidadInput) && $cantidadInput >= 1 && $cantidadInput <= 10) {
        $cantidad = (int)$cantidadInput;
        $mostrarResultados = true;

        $subtotal = $cantidad * $precioUnitario;

        if ($cantidad <= 5) {
            $porcentajeDescuento = 10;
        } elseif ($cantidad <= 8) {
            $porcentajeDescuento = 15;
        } else {
            $porcentajeDescuento = 20; 
        }

        // 3. Calculamos la cantidad económica a descontar y el total final
        $montoDescuento = $subtotal * ($porcentajeDescuento / 100);
        $totalFinal = $subtotal - $montoDescuento;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 16 - Venta de Entradas</title>
</head>
<body>

    <h1>Taquilla de Cine</h1>

    <form action="" method="POST">
        <label for="cantidad">Selecciona la cantidad de entradas:</label>
        <select name="cantidad" id="cantidad">
            <?php
            // Generamos el desplegable dinámicamente del 1 al 10 con un bucle for
            for ($i = 1; $i <= 10; $i++) {
                // Mantenemos seleccionada la opción elegida previamente si ya se envió el formulario
                $selected = (isset($_POST['cantidad']) && (int)$_POST['cantidad'] === $i) ? 'selected' : '';
                echo "<option value='$i' $selected>$i</option>";
            }
            ?>
        </select>
        <button type="submit">Calcular Compra</button>
    </form>

    <?php if ($mostrarResultados): ?>
        <hr>
        <h2>Resumen de la Compra</h2>
        <ul>
            <li>Precio por entrada: <strong><?php echo number_format($precioUnitario, 2); ?> €</strong></li>
            <li>Entradas seleccionadas: <strong><?php echo $cantidad; ?></strong></li>
            <li>Precio total (sin descuento): <strong><?php echo number_format($subtotal, 2); ?> €</strong></li>
            <li>Descuento aplicado: <strong><?php echo $porcentajeDescuento; ?>%</strong> (<?php echo number_format($montoDescuento, 2); ?> €)</li>
            <li><strong>Total a pagar: </strong><strong><?php echo number_format($totalFinal, 2); ?> €</strong></li>
        </ul>
    <?php endif; ?>

</body>
</html>