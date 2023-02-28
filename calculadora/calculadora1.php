<?php
    if ($_POST) {
        
    $resultado="";

    if ($_POST["slcOperacion"] == "+") {
        $resultado = $_POST["num1"] + $_POST["num2"];
    } else if ($_POST["slcOperacion"] == "-") {
        $resultado = $_POST["num1"] - $_POST["num2"];
    } else if ($_POST["slcOperacion"] == "*") {
        $resultado = $_POST["num1"] * $_POST["num2"];
    } else {
        $resultado = $_POST["num1"] / $_POST["num2"];
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