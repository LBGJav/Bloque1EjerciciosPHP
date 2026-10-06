<?php
$suma = 0;
$expresion = '';

for ($i=1; $i <= 10 ; $i++) {
    $suma += $i;

    if($i === 1){
        $expresion = "1";
    }else{
        $expresion .= "+" . $i;
    }

    echo $suma . "|| para ". $expresion . "<br>";
}

?>