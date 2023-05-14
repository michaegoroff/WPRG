<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page 3</title>
</head>
<body>
    <?php
        session_start();
        echo "Imie zamawiajacego: " . $_SESSION["o_name"] . "<br/>";
        echo "Nazwisko zamawiajacego: " . $_SESSION["o_surname"] . "<br/>";
        echo "Ilosc osob: " . $_SESSION["num"] . "<br/>";
        for($i = 1;$i <= $_SESSION["num"];$i++){
            echo "Imie " . $i . ": " . $_SESSION["name" . $i] . "<br/>";
            echo "Nazwisko " . $i . ": " . $_SESSION["surname" . $i] . "<br/>";
        }
        session_destroy();
    ?>
</body>
</html>