<?php
$turno = '';
$curso = '';
$suscripcion = 'No Marcado';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $turno = $_POST['turno'] ?? 'No seleccionado';
    $curso = $_POST['curso'] ?? 'No seleccionado';

    if(isset($_POST['suscribirse'])){
        $suscripcion = 'Marcado(Sí)';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Formularios en PHP</title>
</head>
<body>
    <h1>Formulario de registros</h1>
    <form action="" method="POST">
        <fieldset>
            <legend>Elige tu turno:</legend>
            <label>
                <input type="radio" name="turno" value="Mañana"> Mañana
            </label>
            <label>
                <input type="radio" name="turno" value="Tarde"> Tarde
            </label>
        </fieldset>
        <br>

        <label for="curso">Curso de interés: </label>
        <select name="curso" id="curso">
            <option value=""> -Selecciona opción-</option>
            <option value="PHP">PHP</option>
            <option value="JavaScript">JS</option>
            <option value="Java">Java</option>
        </select>
        <br>

        <label>
            <input type="checkbox" name="suscribirse" value="si">Deseo recibir info
        </label>
        <br>

        <button type="submit"> Enviar </button>
    </form>

    <?php if($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>Resultados procesados:</h2>
        <p><strong>Turno seleccionado:</strong> <?php echo htmlspecialchars($turno); ?></p>
        <p><strong>Curso seleccionado:</strong> <?php echo htmlspecialchars($curso); ?></p>
        <p><strong>Estado del Checkbox:</strong> <?php echo htmlspecialchars($suscripcion); ?></p>
    
     <?php endif; ?> 
</body>