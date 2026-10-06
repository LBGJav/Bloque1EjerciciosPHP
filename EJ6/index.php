<?php
function calificacionAleatoria(){
    $nota = rand(100,1000)/100;

    $resultado = '';

    if($nota < 5){
        $resultado = "suspendido";
    } elseif ($nota >= 5 && $nota <= 5.99) {
        $resultado = "suficiente";
    } elseif ($nota >= 6 && $nota <= 6.99) {
        $resultado = "bien";
    } elseif ($nota >= 7 && $nota <= 8.99) {
        $resultado = "notable";
    } elseif ($nota >= 9 && $nota <= 10) {
        $resultado = "sobresaliente";
    } else {
        // Por si sale un 10.0 exacto o caso extremo superior
        $resultado = "sobresaliente";
    }

    echo "Calificación numérica es: $nota <br><br>";
    echo "Resultado: $resultado";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 - Calificaciones Aleatorias</title>
</head>
<body>
    <h1>Boletín de Notas</h1>
    
    <?php 
    // Ejecutamos la función
    calificacionAleatoria(); 
    ?>

</body>
</html>