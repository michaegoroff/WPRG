<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 3</title>
</head>
<body>
    <form action="zadanie3.php" method="post">
        <label>Podaj rok</label>
        <input type="number" name="input">
        <input type="submit" value="Oblicz">
    </form>
</body>
</html>

<?php
    $x = 0;$y = 0;$a = 0;$b = 0;$c = 0;$d = 0;$f = 0;
    switch ($_POST["input"]){
        case $_POST["input"] > 0 && $_POST["input"] < 1583:
            $x = 15;
            $y = 6;
            $a = $_POST["input"]%19;
            $b = $_POST["input"]%4;
            $c = $_POST["input"]%7;
            $d = (19*$a + $x)%30;
            $f = (2*$b + 4*$c + 6*$d + $y)%7;
            break;
        case $_POST["input"] > 1582 && $_POST["input"] < 1700:
            $x = 22;
            $y = 2;
            $a = $_POST["input"]%19;
            $b = $_POST["input"]%4;
            $c = $_POST["input"]%7;
            $d = (19*$a + $x)%30;
            $f = (2*$b + 4*$c + 6*$d + $y)%7;
            break;
        case $_POST["input"] > 1699 && $_POST["input"] < 1800:
            $x = 23;
            $y = 3;
            $a = $_POST["input"]%19;
            $b = $_POST["input"]%4;
            $c = $_POST["input"]%7;
            $d = (19*$a + $x)%30;
            $f = (2*$b + 4*$c + 6*$d + $y)%7;
            break;
        case $_POST["input"] > 1799 && $_POST["input"] < 1900:
            $x = 23;
            $y = 4;
            $a = $_POST["input"]%19;
            $b = $_POST["input"]%4;
            $c = $_POST["input"]%7;
            $d = (19*$a + $x)%30;
            $f = (2*$b + 4*$c + 6*$d + $y)%7;
            break;
        case $_POST["input"] > 1899 && $_POST["input"] < 2100:
            $x = 24;
            $y = 5;
            $a = $_POST["input"]%19;
            $b = $_POST["input"]%4;
            $c = $_POST["input"]%7;
            $d = (19*$a + $x)%30;
            $f = (2*$b + 4*$c + 6*$d + $y)%7;
            break;
        case $_POST["input"] > 2099 && $_POST["input"] < 2200:
            $x = 24;
            $y = 6;
            $a = $_POST["input"]%19;
            $b = $_POST["input"]%4;
            $c = $_POST["input"]%7;
            $d = (19*$a + $x)%30;
            $f = (2*$b + 4*$c + 6*$d + $y)%7;
            break;
        default:
            echo "Nieprawidłowy rok";
            break;
    }
    if($_POST["input"] > 0 && $_POST["input"] < 2200){
        if($f == 6 && $d == 29){
            echo "Wielkanoc wypada 26 kwietnia";
        }
        else if($f == 6 && $d == 28 && ((11*$x + 11)%30 < 19)){
            echo "Wielkanoc wypada 18 kwietnia";
        }
        else if(($d+$f) < 10){
            echo "Wielkanoc wypada " . 22+$d+$f . " marca";
        }
        else if(($d + $f)>9){
            echo "Wielkanoc wypada " . $d + $f- 9 . " kwietnia";
        }
    }

?>