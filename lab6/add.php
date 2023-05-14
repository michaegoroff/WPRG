<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a car</title>
</head>
<body>

</body>
</html>

<?php
session_start();
    $db_connection = mysqli_connect("localhost","root","","mojaBaza");
    if(!$db_connection){
        echo "<p>Connection error</p>";
    }
    else{
        echo "<p>Connection successful</p>";
        echo "<form action='add.php' method='post'>";
        echo "<label>Marka:</label>";
        echo "<input type='text' name='marka'>";
        echo "<label>Model:</label>";
        echo "<input type='text' name='model'>";
        echo "<label>Cena:</label>";
        echo "<input type='number' name='cena'>";
        echo "<label>Rok:</label>";
        echo "<input type='number' name='rok'>";
        echo "<label>Opis:</label>";
        echo "<input type='text' name='opis'>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";

        $marka = $_POST["marka"];
        $model = $_POST["model"];
        $cena = $_POST["cena"];
        $rok = $_POST["rok"];
        $opis = $_POST["opis"];
        $userid = $_SESSION["currentuserid"];

        $result = mysqli_query($db_connection,"INSERT INTO samochody(marka,model,cena,rok,opis,id_uzytkownik) VALUES ('$marka','$model','$cena','$rok','$opis','$userid')");
        if (!$result) {
            echo "<p>Execution error</p>";
            exit();
        }
        if (!mysqli_close($db_connection)) {
            echo "<p>Error while closing connection</p>";
            exit();
        }
        header('Location: index.php');
    }

?>


