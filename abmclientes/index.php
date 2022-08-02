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


$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if ($_POST) {

    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
        }
    }

    if ($pos >= 0) {

        $aClientes[$pos] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen
        );
    } else {

        $aClientes[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen
        );
    }

    //Convertir el array de Clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el archivo "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);
}

if (isset($_GET["pos"]) && $_GET["do"] == "eliminar") {
    //Eliminar el array aClientes
    unset($aClientes[$pos]);
    $jsonClientes = json_encode($aClientes);
    file_put_contents("archivo.txt", $jsonClientes);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" src="css/estilos.css" type="text/css">
    <title>ABM Clientes</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pb-2">
                        <label for="">DNI: *</label><br>
                        <input name="txtDni" id="txtDni" class="form-control" type="number" required value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["dni"] : ""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="">Nombre: *</label><br>
                        <input name="txtNombre" id="txtNombre" class="form-control" type="text" required value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["nombre"] : ""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="">Teléfono: *</label><br>
                        <input name="txtTelefono" id="txtTelefono" class="form-control" type="text" required value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["telefono"] : ""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="">Correo: *</label><br>
                        <input name="txtCorreo" id="txtCorreo" class="form-control" type="text" required value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["correo"] : ""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="">Archivo adjunto:</label>
                        <input type="file" name="archivo" id="archivo" accept=" .jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div>
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary d-inline my-2">Guardar</button>
                        <button type="submit" name="btnEliminar" id="btnEliminar" class="btn btn-danger d-inline my-2"><a href="index.php">Nuevo</a></button>
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
                        <?php foreach ($aClientes as $pos => $cliente) : ?>
                            <tr>
                                <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["correo"]; ?></td>
                                <td>
                                    <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil-square"></i></a>
                                    <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash"></i></a>
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