<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {
    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];

if ($usuario != "" && $clave != "")
    header("Location:acceso-confirmado.php");
} else {
    $mensaje = "Válido para usuarios registrados.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Formulario</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-6">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?php if (isset($mensaje)): ?>
                    <div class="alert alert-danger" role="alegrt">
                        <?php echo $mensaje; ?>
                    </div>
                    <?php endif; ?>
                <form method="POST" action="">
                    <div class="pb-3">
                        <label for="">Usuario</label>
                        <input name="txtUsuario" class="form-control" id="txtUsuario" type="text">
                    </div>
                    <div class="pb-3">
                        <label for="">Clave</label>
                        <input name="txtClave" id="txtClave" class="form-control" type="password">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>