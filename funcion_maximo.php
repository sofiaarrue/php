<?php

function maximo($aVectores){
    $maximo = 0;
    foreach ($aVectores as $vector) {
        if ($maximo < $vector) {
            $maximo = $vector;
        }
    }
    return $maximo;
}

$aVectores = array(8, 4, 5, 3, 9, 1);
echo "La nota máxima es: " . maximo($aVectores) . "<br>";

?>