<?php
function mostrarNumero($num)  {
    return "El número introducido es: $num";
}

function contarHastaCero($num) {
    $secuencia = '';
    for ($i= $num; $i >=  0 ; $i --) {
        $secuencia .= $i . " ";
    }
    return "Secuencia hasta el  0: ". $secuencia;
}

$resultado = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $numero = isset($_POST['numero']) ? (int)$_POST['numero']:0;

    if($numero >10){
        $resultado = mostrarNumero($numero);
    }else{
        $resultado = contarHastaCero($numero);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 - Funciones y Bucles</title>
</head>
<body>

    <h1>Evaluador de Números</h1>

    <form action="" method="POST">
        <label for="numero">Introduce un número:</label>
        <input type="number" name="numero" id="numero" required>
        <button type="submit">Procesar</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <hr>
        <h3>Resultado:</h3>
        <p><?php echo htmlspecialchars($resultado); ?></p>
    <?php endif; ?>

</body>
</html>