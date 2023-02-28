<?php
if ($_POST) {

    $num1 = $_REQUEST["num1"];
    $num2 = $_REQUEST["num2"];
    $slcOperacion = $_REQUEST["slcOperacion"];
    
    
    if ($slcOperacion == "+") {
        $resultado = $num1 + $num2;
    } else if ($slcOperacion == "-") {
        $resultado = $num1 - $num2;
    } else if ($slcOperacion == "*") {
        $resultado = $num1 * $num2;
    } else {
        $resultado = $num1 / $num2;
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>
    <h2>Calculadora 1 </h2>
    <form action="calculadora1.php" method="$_POST">
        <input type="text" name="num1" id="num1">
        <select name="slcOperacion" id="slcOperacion">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num2" id="num2">
        <button type="submit">CALCULAR</button>
        <br>

    </form>
    <?php echo "El resultado es: " . $resultado; ?>
</body>

</html>