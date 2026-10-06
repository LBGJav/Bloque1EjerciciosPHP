<?php

$contadorImpares = 0;
$sumaImpares = 0;


for ($i = 1; $i <= 300; $i++) {
    
    if ($i % 2 !== 0) {
        $contadorImpares++;       
        $sumaImpares += $i;       
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 11 - Conteo y Suma de Impares</title>
</head>
<body>

    <h1>Análisis de los primeros 300 números enteros</h1>

    <p><strong>Cantidad de números impares encontrados:</strong> <?php echo $contadorImpares; ?></p>
    <p><strong>Suma total de dichos números impares:</strong> <?php echo $sumaImpares; ?></p>

</body>
</html>