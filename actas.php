<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

foreach ($aAlumnos as $alumno) {
    
}

$aAlumnos = array();
$aAlumnos[] = array(
    "alumno" => "Bernabe Paz",
    "notas" => array(5, 7),
);
$aAlumnos[] = array(
    "alumno" => "Sebastián Aguirre",
    "notas" => array(6, 9),
);
$aAlumnos[] = array(
    "alumno" => "Ana Valle",
    "notas" => array(7, 8),
);
$aAlumnos[] = array(
    "alumno" => "Monica Ledesma",
    "notas" => array(8, 9),
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table>
                    <thead>
                        <th>Alumno</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Promedio</th>
                    </thead>
                    <?php foreach ($aAlumnos as $alumno):?>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>