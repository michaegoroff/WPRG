<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 2</title>
</head>
<body>
    <form action="zadanie2.php" method="post">
        <p>Prosty</p>
        <input type="number" name="1">
        <select name="options1">
            <option value="+">Dodawanie</option>
            <option value="-">Odejmowanie</option>
            <option value="*">Mnożenie</option>
            <option value="/">Dzielenie</option>
        </select>
        <input type="number" name="2">
        &nbsp;
        <p>Zaawansowany</p>
        <input type="number" name="3">
        <select name="options2">
            <option value="sin">Sin</option>
            <option value="cos">Cos</option>
            <option value="tan">Tan</option>
            <option value="2to10">2 to 10</option>
            <option value="10to2">10 to 2</option>
            <option value="10to16">10 to 16</option>
            <option value="16to10">16 to 10</option>
            <option value="0torad">0 to rad</option>
            <option value="radto0">Rad to 0</option>
        </select>
        <input type="submit" value="Oblicz">
    </form>
</body>
</html>

<?php
    if(isset($_POST["1"],$_POST["2"])){
        switch($_POST["options1"]) {
            case "+":
                echo (float)$_POST["1"] + (float)$_POST["2"] . "\n";
                break;
            case "-":
                echo (float)$_POST["1"] - (float)$_POST["2"] . "\n";
                break;
            case "*":
                echo (float)$_POST["1"] * (float)$_POST["2"] . "\n";
                break;
            case "/":
                echo (float)$_POST["1"] / (float)$_POST["2"] . "\n";
                break;
        }
    }

    if(isset($_POST["3"])){
        switch($_POST["options2"]){
            case "2to10":
                echo bindec((int)$_POST["3"]) . "\n";
                break;
            case "10to2":
                echo decbin((int)$_POST["3"]) . "\n";
                break;
            case "2to16":
                echo bin2hex((int)$_POST["3"]) . "\n";
                break;
            case "16to2":
                echo hex2bin((int)$_POST["3"]) . "\n";
                break;
            case "0torad":
                echo deg2rad((float)$_POST["3"]) . "\n";
                break;
            case "radto0":
                echo rad2deg((float)$_POST["3"]) . "\n";
                break;
            case "sin":
                echo sin((float)$_POST["3"]) . "\n";
                break;
            case "cos":
                echo cos((float)$_POST["3"]) . "\n";
                break;
            case "tan":
                echo tan((float)$_POST["3"]) . "\n";
                break;
        }

    }

?>