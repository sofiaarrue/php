<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

for ($numero = 2; $numero <=100; $numero +=2) {
    echo $numero . "<br>";

    if ($numero==60) {
        break;
    }
}



?>