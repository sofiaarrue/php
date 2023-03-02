<?php

if (isset($_POST["item"])) {
    $item = $_POST["pantalla"] . $_POST["item"];
} else {
    $item = "";
}

if (isset($_POST["op"])) {
    $op = $_POST["pantalla"] . $_POST["op"];
} else {
    $op = "";
}

$resultado = $item . $op;

$aNumeros = explode("+", $resultado);

print_r($aNumeros);

$op = isset($_POST["op"]);
$igual = isset($_POST["igual"]);

if ($igual) {
    if ($op) {
        switch ($_POST["op"]) {
            case "+":
                $resultado == array_sum($aNumeros);
                break;
            case "-":
                $resultado == "hola";
                break;
        }
    }
} else {
    # code...
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Calculadora php</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-3">
                <h2>Calculadora</h2>
            </div>
        </div>
        <form action="calculadora2.php" method="post">
            <table class="table table-bordered table-hover" style="width: 270px; margin: auto;">
                <tr>
                    <td colspan="4"> <input type="text" name="pantalla" id="pantalla" class="form-control" value="<?php echo $resultado; ?>"></td>

                <tr>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="btn"><-- </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="btn"> CE </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="btn"> C </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="op" value="/"> / </button></td>
                </tr>
                <tr>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=7> 7 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=8> 8 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=9> 9 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="op" value="*"> * </button></td>
                </tr>
                <tr>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=4> 4 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=5> 5 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=6> 6 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="op" value="+"> + </button></td>
                </tr>
                <tr>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=1> 1 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=2> 2 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item" value=3> 3 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="op" value="-"> - </button></td>
                </tr>
                <tr>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="item"> 0 </button></td>
                    <td class="text-center"> <button class="btn btn-primary" type="submit" name="btn."> . </button></td>
                    <td class="text-center" colspan="2"> <button class="btn btn-primary" type="submit" name="igual"> = </button></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>