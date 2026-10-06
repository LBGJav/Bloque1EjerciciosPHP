<?php
// 1. Funciones auxiliares modulares para cada tarea específica

function obtenerFechaEspanol(): string {
    $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    
    $diaSemana = $dias[date('w')];
    $diaMes = date('j');
    $mes = $meses[date('n') - 1];
    $anio = date('Y');
    $hora = date('H:i:s');
    
    return "$diaSemana, $diaMes de $mes de $anio a las $hora";
}

function calcularPrimos1a100(): array {
    $primos = [];
    $suma = 0;
    
    for ($i = 2; $i <= 100; $i++) {
        $esPrimo = true;
        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j === 0) {
                $esPrimo = false;
                break;
            }
        }
        if ($esPrimo) {
            $primos[] = $i;
            $suma += $i;
        }
    }
    
    return ['lista' => $primos, 'suma' => $suma];
}

function calcularImpares1a20(): array {
    $impares = [];
    $suma = 0;
    
    for ($i = 1; $i <= 20; $i += 2) {
        $impares[] = $i;
        $suma += $i;
    }
    
    $tipoSumatoria = ($suma % 2 === 0) ? "par" : "impar";
    
    return ['lista' => $impares, 'suma' => $suma, 'tipo' => $tipoSumatoria];
}

// 2. La función principal solicitada que recibe los tres valores de los checkboxes como parámetros
function procesarOpcionesFormulario(bool $mostrarFecha, bool $mostrarPrimos, bool $mostrarImpares): string {
    $htmlSalida = "";

    // Opción 1: Fecha y hora en español
    if ($mostrarFecha) {
        $htmlSalida .= "<section>";
        $htmlSalida .= "<h3>1. Fecha y Hora Actual</h3>";
        $htmlSalida .= "<p>" . obtenerFechaEspanol() . "</p>";
        $htmlSalida .= "</section>";
    }

    // Opción 2: Números primos entre 1 y 100 y su suma
    if ($mostrarPrimos) {
        $datosPrimos = calcularPrimos1a100();
        $htmlSalida .= "<section>";
        $htmlSalida .= "<h3>2. Números Primos (1 al 100)</h3>";
        $htmlSalida .= "<p><strong>Primos encontrados:</strong> " . implode(", ", $datosPrimos['lista']) . "</p>";
        $htmlSalida .= "<p><strong>Suma total de los primos:</strong> " . $datosPrimos['suma'] . "</p>";
        $htmlSalida .= "</section>";
    }

    // Opción 3: Números impares entre 1 y 20 y paridad de su suma
    if ($mostrarImpares) {
        $datosImpares = calcularImpares1a20();
        $htmlSalida .= "<section>";
        $htmlSalida .= "<h3>3. Números Impares (1 al 20)</h3>";
        $htmlSalida .= "<p><strong>Números impares:</strong> " . implode(", ", $datosImpares['lista']) . "</p>";
        $htmlSalida .= "<p><strong>Suma total:</strong> " . $datosImpares['suma'] . " (Es un número <strong>" . $datosImpares['tipo'] . "</strong>)</p>";
        $htmlSalida .= "</section>";
    }

    // Control por si el usuario envía el formulario sin marcar nada
    if (!$mostrarFecha && !$mostrarPrimos && !$mostrarImpares) {
        $htmlSalida = "<p style='color: red;'>Por favor, selecciona al menos una opción en el formulario.</p>";
    }

    return $htmlSalida;
}

// 3. Procesamiento de la petición POST
$resultadoFinal = "";
$chkFechaChecked = false;
$chkPrimosChecked = false;
$chkImparesChecked = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobamos la existencia de cada checkbox con isset()
    $chkFechaChecked = isset($_POST['chk_fecha']);
    $chkPrimosChecked = isset($_POST['chk_primos']);
    $chkImparesChecked = isset($_POST['chk_impares']);

    // Llamamos a la función única pasándole los tres estados booleanos
    $resultadoFinal = procesarOpcionesFormulario($chkFechaChecked, $chkPrimosChecked, $chkImparesChecked);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 17 - Panel de Opciones Múltiples</title>
</head>
<body>

    <h1>Panel de Control de Tareas</h1>

    <form action="" method="POST">
        <fieldset>
            <legend>Selecciona las operaciones a realizar:</legend>
            <br>
            <label>
                <input type="checkbox" name="chk_fecha" value="1" <?php echo $chkFechaChecked ? 'checked' : ''; ?>>
                Mostrar fecha/hora en formato español
            </label>
            <br><br>
            <label>
                <input type="checkbox" name="chk_primos" value="1" <?php echo $chkPrimosChecked ? 'checked' : ''; ?>>
                Mostrar los números primos entre el 1 y el 100, y la suma de ellos al final
            </label>
            <br><br>
            <label>
                <input type="checkbox" name="chk_impares" value="1" <?php echo $chkImparesChecked ? 'checked' : ''; ?>>
                Mostrar los números impares entre el 1 y el 20, e indicar si la suma de ellos es par o impar
            </label>
            <br><br>
            <button type="submit">Ejecutar Opciones</button>
        </fieldset>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <hr>
        <h2>Resultados:</h2>
        <div>
            <?php echo $resultadoFinal; ?>
        </div>
    <?php endif; ?>

</body>
</html>