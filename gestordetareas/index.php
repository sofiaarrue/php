<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")) {
    //Si el archivo existe, cargo las tareas en la variable aTareas
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else {
    //Si el archivo no existe es porque no hay tareas
    $aTareas = array();
}

if (isset($_GET["id"]) && $_GET["id"] >= 0 ? $id = $_GET["id"] : $id = "");

if ($_POST) {
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $titulo = $_POST["txtTitulo"];
    $descripcion = $_POST["txtDescripcion"];

    if ($id >= 0) {
        //Editar una tarea
        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion,
        );
    } else {
        //Insertar una tarea
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );
    }

    //Convertir el array de aTareas en json
    $strJson = json_encode($aTareas);

    //Almacenar en un archivo.txt el json
    file_put_contents("archivo.txt", $strJson);
}

if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    $strJson = json_encode($aTareas);
    file_put_contents("borrado.txt", $strJson);
    unset($aTareas[$id]);
    $strJson = json_encode($aTareas);
    file_put_contents("archivo.txt", $strJson);
    header("Location: index.php");
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
    <title>Gestor de tareas</title>
</head>

<body>
    <main class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-12 text-center py-3">
                    <h1>Gestor de Tareas</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="">Prioridad</label>
                    <select name="lstPrioridad" id="lstPrioridad" class="form-control mb-3" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : ""; ?>>Alta</option>
                        <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media" ? "selected" : ""; ?>>Media</option>
                        <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja" ? "selected" : ""; ?>>Baja</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Usuario</label>
                    <select name="lstUsuario" id="lstUsuario" class="form-control mb-3" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana" ? "selected" : ""; ?>>Ana</option>
                        <option value="Bernabe" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe" ? "selected" : ""; ?>>Bernabe</option>
                        <option value="Daniela" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Daniela" ? "selected" : ""; ?>>Daniela</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Estado</label>
                    <select name="lstEstado" id="lstEstado" class="form-control mb-3" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Sin asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin asignar" ? "selected" : ""; ?>>Sin asignar</option>
                        <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado" ? "selected" : ""; ?>>Asignado</option>
                        <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso" ? "selected" : ""; ?>>En proceso</option>
                        <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado" ? "selected" : ""; ?>>Terminado</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="">Título</label>
                    <input type="text" name="txtTitulo" id="txtTitulo" class="form-control mb-3" required value="<?php echo isset($aTareas[$id]) && $aTareas[$id] >= 0 ? $aTareas[$id]["titulo"] : ""; ?>">
                </div>
                <div class="col-12">
                    <label for="">Descripción</label>
                    <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control mb-1" required value="<?php echo isset($aTareas[$id]) && $aTareas[$id] >= 0 ? $aTareas[$id]["descripcion"] : ""; ?>">
                </div>
                <div class="col-12 text-center mb-2">
                    <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary d-inline my-2">ENVIAR</button>
                    <button type="submit" name="btnCancelar" id="btnCancelar" class="btn btn-secondary d-inline my-2">CANCELAR</button>
                </div>
            </div>
        </form>
        <?php if (count($aTareas) != 0) : ?>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de inserción</th>
                                <th>Título</th>
                                <th>Prioridad</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aTareas as $pos => $tarea) : ?>
                                <tr>
                                    <td><?php echo $pos; ?></td>
                                    <td><?php echo $tarea["fecha"]; ?></td>
                                    <td><?php echo $tarea["titulo"]; ?></td>
                                    <td><?php echo $tarea["prioridad"]; ?></td>
                                    <td><?php echo $tarea["usuario"]; ?></td>
                                    <td><?php echo $tarea["estado"]; ?></td>
                                    <td>
                                        <a href="index.php?id=<?php echo $pos ?>&do=editar" class="btn btn-secondary d-inline"><i class="bi bi-pencil-square"></i></a>
                                        <a href="index.php?id=<?php echo $pos ?>&do=eliminar" class="btn btn-danger d-inline"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>