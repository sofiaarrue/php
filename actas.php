<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function promediar($aNumeros)
{
    $suma = 0;

    foreach ($aNumeros as $numero) {
        $suma = $suma + $numero;
    }

    return $suma / count($aNumeros);
}

$aAlumnos = array();
$aAlumnos[] = array(
    "alumno" => "Bernabe Paz",
    "aNotas" => array(5, 7),
);
$aAlumnos[] = array(
    "alumno" => "Sebastián Aguirre",
    "aNotas" => array(6, 9),
);
$aAlumnos[] = array(
    "alumno" => "Ana Valle",
    "aNotas" => array(7, 8),
);
$aAlumnos[] = array(
    "alumno" => "Monica Ledesma",
    "aNotas" => array(8, 9),
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
            <div class="col-12 text-center py-3">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sumPromedios=0;

                            foreach ($aAlumnos as $alumno):
                                $promedio = promediar($alumno["aNotas"]);
                                $sumPromedios += $promedio;
                            ?>
                        <tr>
                            <td><?php echo $alumno["alumno"]; ?></td>
                            <td><?php echo $alumno["aNotas"][0]; ?></td>
                            <td><?php echo $alumno["aNotas"][1]; ?></td>
                            <td><?php echo number_format($promedio, 2, ",", "."); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Promedio de la cursada: <?php echo number_format(($sumPromedios / count($aAlumnos)), 2, ",", ".");?></p>
            </div>
        </div>
    </main>
</body>

</html>