<?php
$respuesta ='';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $respuesta = $_POST['respuesta'] ?? '';

    if($respuesta === 'Si'){
        echo "<h3>Si</h3>";
    }elseif ($respuesta === 'No'){
        echo "<p style='color: red;'>Dato no aceptado</p>";
    }
}


?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>
    <body>
        <form action="" method="POST">
            <label for="opcion"> Estás de acuerdo? </label>
            <select name="respuesta" id="opcion">
                <option value="Si">Sí</option>
                <option value="No">No</option>  
            </select>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>