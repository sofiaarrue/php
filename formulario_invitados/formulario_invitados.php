<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
//los dni permitidos
if (file_exists("invitados.txt")) {
    $archivo = fopen("invitados.txt", "r");
    $aDnis = fgetcsv($archivo, 0, ",");
}else {
    $aDnis = array();
//sino el array queda como un array vacio
}

if($_POST){
    if(isset($_POST["btnInvitado"])){
        $dni = $_POST["txtDni"];
        //si el dni ingresado se encuentra en la lista se mostrara un mensaje de bienvenida
        if (in_array($dni, $aDnis)){
            $mensaje = "Bienvenida.";
        } else{
            //sino un mensaje de NO se encuentra en la lista de invitados
            $mensaje = "No se encuentra en la lista de invitados";
        }
    }

    if(isset($_POST["btnCodigo"])){
        $codigo = $_POST["txtCodigo"];
        //si el codigo es "verde" entonces mostrara su codigo de acceso es....
        if ($codigo == "verde") {
            $mensaje = "Su código de acceso es" . rand(1000, 9999);
        }else
        //sino usted no tiene pase VIP
        $mensaje = "usted no tiene pase VIP";
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
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-8">
                <h1>Lista de invitados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <p>Complete el siguiente formulario:</p>
            </div>
        </div>
        <form action="" method="POST">
            <div class="row py-3">
                <div class="col-8 pb-2">
                    <label for="txtDni">Ingrese el DNI:</label>
                </div>
                <div class="col-8 pb-2">
                    <input type="number" name="txtDni" id="txtDni" class="form-control">
                </div>
                <div class="col-8 pb-2">
                    <button type="submit" name="btnInvitado" id="btnInvitado" class="btn btn-primary">Verificar invitado</button>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-8 pb-2">
                    <label for="txtCodigo">Ingrese el código secreto para el pase VIP:</label>
                </div>
                <div class="col-8 pb-2">
                    <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
                </div>
                <div class="col-8 pb-2">
                    <button name="btnCodigo" id="btnCodigo" class="btn btn-primary">Verificar código</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>