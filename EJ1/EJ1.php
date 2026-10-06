<?php
$var1 = $_GET['variable1'] ?? 'No def';
$var2 = $_GET['variable2'] ?? 'No def';

echo "El valor de la variable 1 es: ". htmlspecialchars($var1). "<br>";
echo "El valor de la variable 2 eS: ". htmlspecialchars($var2);

?>