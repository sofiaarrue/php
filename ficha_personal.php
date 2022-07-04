<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");

$nombre = "Sofía Arrúe";
$edad = 19;

/* $aPeliculas = ["Volver al futuro", "Titanic", "El día después de mañana"]; otra forma*/

$aPeliculas = array("Mamma mia", "Harry Potter");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Ficha personal</h1>
            </div>
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>Fecha:</th>
                        <td> <?php echo date("d/m/y"); ?></td>
                    </tr>
                    <tr>
                        <th>Nombre y apelido:</th>
                        <td><?php echo $nombre; ?></td>
                    </tr>
                    <tr>
                        <th>Edad:</th>
                        <td><?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <th>Películas favoritas:</th>
                        <td><?php echo $aPeliculas[0]; ?><br>
                            <?php echo $aPeliculas[1]; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>