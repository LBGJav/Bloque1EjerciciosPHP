<?php
function calificacionAleatoria(){
    $nota = rand(100,1000)/100;

    $resultado = '';

    switch(true){
        case ($nota < 5):
            $resultado = "Suspendido";
            break;
        case ($nota >= 5 && $nota <= 5.99):
            $resultado = "suficiente";
            break;
            
        case ($nota >= 6 && $nota <= 6.99):
            $resultado = "bien";
            break;
            
        case ($nota >= 7 && $nota <= 8.99):
            $resultado = "notable";
            break;
            
        case ($nota >= 9 && $nota <= 10):
        default:
            $resultado = "sobresaliente";
            break;
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
    <h1>Boletín de Notas con switch</h1>
    
    <?php 
    // Ejecutamos la función
    calificacionAleatoria(); 
    ?>

</body>
</html>