<?php
$profesores = ["Jose", "Lola", "Lorenzo", "Isabel", "Mariluz", "Maria Jose"];
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogemos el nombre del formulario y limpiamos espacios sobrantes con trim()
    $nombreBuscado = trim($_POST['nombre'] ?? '');
    
    // Bandera o indicador lógico para saber si hemos encontrado la coincidencia
    $encontrado = false;

    // 2. Bucle for para recorrer el array paso a paso
    for ($i = 0; $i < count($profesores); $i++) {
       if (strtolower($profesores[$i]) === strtolower($nombreBuscado)) {
            $encontrado = true;
            break;
        }
    }

    if ($encontrado) {
        $mensaje = "Nombre encontrado";
    } else {
        // Mostramos el nombre introducido (protegiéndolo con htmlspecialchars)
        $mensaje = htmlspecialchars($nombreBuscado) . " no es profesor";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Búsqueda en Arrays</title>
</head>
<body>

    <h1>Buscador de Profesores</h1>

    <form action="" method="POST">
        <label for="nombre">Introduce un nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <hr>
        <p><strong><?php echo $mensaje; ?></strong></p>
    <?php endif; ?>

</body>
</html>