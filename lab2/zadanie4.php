<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form action="zadanie4.php" method="post">
        <fieldset>
            <legend>
                PESEL
            </legend>
            <label>Pesel:</label>
            <input type="number" name="pesel">
            <input type="submit" value="Dekoduj">
        </fieldset>
    </form>
</body>
</html>

<?php
    $str = $_POST["pesel"];
    if($str[9]%2 == 0){
        echo "Jesteś kobietą. Urodziłaś się " . $str[4] . $str[5] . "." . $str[2] . $str[3] . "." . $str[0] . $str[1];

    }
    else{
        echo "Jesteś mężczyzną. Urodziłeś się " . $str[4] . $str[5] . "." . $str[2] . $str[3] . "." . $str[0] . $str[1];
    }

?>