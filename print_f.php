<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function print_f($variable)
{
    //Si es un array, lo recorro y guardo el contenido en datos.txt
    if (is_array($variable)) {
        $archivo = fopen("datos.txt", "a+");
        foreach ($variable as $item) {
            fwrite($archivo, "\n" . $item);
        }
        fclose($archivo);
    } else {
        //Entonces es string, guardo el contenido en el archivo datos.txt
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo generado";
}

function print_f1($variable)
{
    //Si es un array, lo recorro y guardo el contenido en datos.txt
    if (is_array($variable)) {
        $contenido = "";
        foreach ($variable as $item) {
            $contenido = $item . "\n";
        }
        file_put_contents("datos.txt", $contenido);
    } else {
        //Entonces es string, guardo el contenido en el archivo datos.txt
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado";
}

$aNotas = array(9, 8, 5, 2, 7);
$msg = "Este es un mensaje de texto";
print_f($aNotas);
