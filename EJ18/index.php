<?php
$numerosAleatorios = [];

for ($i = 0; $i < 10; $i++) {

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