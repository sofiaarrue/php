<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aClientes = array();
$aClientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => "45",
    "peso" => "81.50"
);
$aClientes[] = array(
    "dni" => "23.684.685",
    "nombre" => "Gonzalo Gustamante",
    "edad" => "45",
    "peso" => "79"
);
$aClientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Juan Arriola",
    "edad" => "28",
    "peso" => "79"
);
$aClientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Beatriz Ocampo",
    "edad" => "50",
    "peso" => "79"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <Main class="container">
        <div class="col-12">
            <h1>Listado de pacientes</h1>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre y apellido</th>
                        <th>Edad</th>
                        <th>Peso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($numCliente = 0; $numCliente < count($aClientes); $numCliente++) {?>
                        <tr>
                            <td><?php echo $aClientes[$numCliente]["dni"];?></td>
                            <td><?php echo $aClientes[$numCliente]["nombre"];?></td>
                            <td><?php echo $aClientes[$numCliente]["edad"];?></td>
                            <td><?php echo $aClientes[$numCliente]["peso"];?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </Main>

</body>

</html>