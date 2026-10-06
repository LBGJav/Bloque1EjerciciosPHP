<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $numero_str = $_POST['numero'] ?? '';

    if(is_numeric($numero_str)){
        $numero = (int)$numero_str;

        if($numero % 2 === 0){
            $mensaje = "El número $numero es PAR";
        }else{
            $mensaje = "El número $numero es IMPAR";
        }
    }else{
        $mensaje = "Introduce un número válido";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9 - Par o Impar</title>
</head>
<body>

    <h1>Comprobador de Números Pares e Impares</h1>

    <form action="" method="POST">
        <label for="numero">Introduce un número:</label>
        <input type="number" name="numero" id="numero" required>
        <button type="submit">Comprobar</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <hr>
        <p><strong><?php echo htmlspecialchars($mensaje); ?></strong></p>
    <?php endif; ?>

</body>
</html>