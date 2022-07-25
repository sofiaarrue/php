<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION["listadoClientes"])) {
    //Si está seteada la variable de session, le asigna su valor a aClientes
    $aClientes = $_SESSION["listadoClientes"];
} else {
    //Sino, aClientes es un array vacío
    $aClientes = array();
}

if ($_POST) {
    //Si hace click en Enviar
    if (isset($_POST["btnEnviar"])) {

        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        $aClientes[] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "telefono" => $telefono,
            "edad" => $edad
        );

        //Actualiza el contenido de variable de session
        $_SESSION["listadoClientes"] = $aClientes;
    }

    if (isset($_POST["btnEliminar"])) {
        session_destroy();
        $aClientes = array();
    }

    if (isset($_POST["pos"])) {
        $pos = $_POST["pos"];
        unset($aClientes["pos"]);
        $aClientes = array();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Clientes</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Listado de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="POST">
                    <div class="pb-2">
                        <label for="">Nombre:</label><br>
                        <input name="txtNombre" id="txtNombre" class="form-control" type="text">
                    </div>
                    <div class="pb-2">
                        <label for="">DNI:</label><br>
                        <input name="txtDni" id="txtDni" class="form-control" type="number">
                    </div>
                    <div class="pb-2">
                        <label for="">Teléfono:</label><br>
                        <input name="txtTelefono" id="txtTelefono" class="form-control" type="text">
                    </div>
                    <div class="pb-2">
                        <label for="">Edad:</label><br>
                        <input name="txtEdad" id="txtEdad" class="form-control" type="number">
                    </div>
                    <div>
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary d-inline">Enviar</button>
                        <button type="submit" name="btnEliminar" id="btnEliminar" class="btn btn-danger d-inline">Eliminar</button>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Teléfono:</th>
                            <th>Edad:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $pos => $cliente) : ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                                <td>
                                    <form method="POST"><button type="submit" id="btnTacho<?php echo $pos;?>" name="btnTacho"><i class="bi bi-trash"></i></button></form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>