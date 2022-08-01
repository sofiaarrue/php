<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Preguntar si existe el archivo
if (file_exists("archivo.txt")) {
    //Vamos a leerlo y almacenar el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");

    //Convertir jsonClientes en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);
} //Si no existe el archivo
else {
    //Creamos un aClientes inicializado como un array vacío
    $aClientes = array();
}





if ($_POST) {
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);

    $aClientes[] = array(
        "dni" => $dni,
        "nombre" => $nombre,
        "telefono" => $telefono,
        "correo" => $correo,
    );

    //Convertir el array de Clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el archivo "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);
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
    <title>ABM Clientes</title>
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
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pb-2">
                        <label for="">DNI:</label><br>
                        <input name="txtDni" id="txtDni" class="form-control" type="number">
                    </div>
                    <div class="pb-2">
                        <label for="">Nombre:</label><br>
                        <input name="txtNombre" id="txtNombre" class="form-control" type="text">
                    </div>
                    <div class="pb-2">
                        <label for="">Teléfono:</label><br>
                        <input name="txtTelefono" id="txtTelefono" class="form-control" type="text">
                    </div>
                    <div class="pb-2">
                        <label for="">Correo:</label><br>
                        <input name="txtCorreo" id="txtCorreo" class="form-control" type="text">
                    </div>
                    <div class="pb-2">
                        <label for="">Archivo adjunto:</label>
                        <input type="file" name="archivo">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div>
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary d-inline my-2">Guardar</button>
                        <a href="index.php" class="btn btn-danger">Nuevo</a>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Imagen:</th>
                            <th>DNI:</th>
                            <th>Nombre:</th>
                            <th>Correo:</th>
                            <th>Acciones:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $cliente) : ?>
                            <tr>
                                <td></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["correo"]; ?></td>
                                <td>
                                    <form method="GET">
                                        <a href="index.php?pos=<?php echo $pos ?>"><i class="bi bi-trash"></i></a>
                                        <a href="index.php?pos=<?php echo $pos ?>"><i class="bi bi-pencil-square"></i></a>
                                    </form>
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