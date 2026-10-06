<?php
// 1. Inicializamos un array vacío
$numerosAleatorios = [];

// 2. Bucle para generar exactamente 10 números e introducirlos en el array
for ($i = 0; $i < 10; $i++) {
    // Generamos un número aleatorio, por ejemplo, entre 1 y 100
    // y lo añadimos automáticamente al final del array indexado
    $numerosAleatorios[] = rand(1, 100);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 18 - Array de Números Aleatorios</title>
</head>
<body>

    <h1>Array de 10 Números Aleatorios</h1>

    <p><strong>Array generado:</strong> 
        [<?php echo implode(", ", $numerosAleatorios); ?>]
    </p>

</body>
</html>