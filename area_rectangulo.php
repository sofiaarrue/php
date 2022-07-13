<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function calcularAreaReact($base,$altura){
    return $base * $altura;
}

echo "El área es ". calcularAreaReact(100,0.6) ."<br>";
echo "El área es " . calcularAreaReact(800, 300);

?>