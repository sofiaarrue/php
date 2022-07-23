<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Datos Personales</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="resultado.php">
                    <div class="pb-3">
                        <label for="">Nombre: *</label>
                        <input name="txtUsuario" class="form-control" id="txtUsuario" type="string">
                    </div>
                    <div class="pb-3">
                        <label for="">DNI: *</label>
                        <input name="txtDni" id="txtDni" class="form-control" type="text">
                    </div>
                    <div class="pb-3">
                        <label for="">Teléfono: *</label>
                        <input name="txtTelefono" id="txtTelefono" class="form-control" type="text">
                    </div>
                    <div class="pb-3">
                        <label for="">Edad: *</label>
                        <input name="txtEdad" id="txtEdad" class="form-control" type="number">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-end">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>