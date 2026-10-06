<?php

$sumaTotal = 0;
$multiplosPares = [];
$listaMultiplos = [];

for ($i=5; $i <=100 ;$i += 5){
     $sumaTotal += $i;

     $listaMultiplos[] = $i;

     if($i %2 ===0) {
        $multiplosPares[] = $i;
    }

}

$sumaPares = array_sum($multiplosPares);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 10 - Múltiplos de 5 y Arrays</title>
</head>
<body>
    <h1>Resultado ejercicio 10</h1>
    <p>Múltiplos de 5 entre 1 y 100: <br>
    <?php echo implode(", ", $listaMultiplos); ?></p>
    <br>
    <p><strong>Suma total de todos los múltiplos de 5:</strong> <?php echo $sumaTotal; ?></p>
    <br>
    <p>Múltiplos de 5 que son pares  <br>
    <?php echo implode(" ,",$multiplosPares) ?>    </p>
    <p><strong>Suma de los valores del array de pares:</strong> <?php echo $sumaPares; ?></p>

</body>
</html>