<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<body>

</body>
</html>

<?php
session_start();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db_connection = mysqli_connect("localhost","root","","mojaBaza");
    $carid = $_GET["submitbutton"];
    $carinfo = mysqli_fetch_array(mysqli_query($db_connection,"SELECT * FROM samochody WHERE id = '$carid'"));
    if(!$db_connection){
        echo "<p>Connection error</p>";
    }
else {
    echo "<p>Connection successful</p>";
    echo "<form action='edit.php' method='post'>";
    echo "<label>Marka:</label>";
    echo "<input type='text' name='marka' value='{$carinfo["marka"]}'>";
    echo "<label>Model:</label>";
    echo "<input type='text' name='model' value='{$carinfo["model"]}'>";
    echo "<label>Cena:</label>";
    echo "<input type='number' name='cena' value='{$carinfo["cena"]}'>";
    echo "<label>Rok:</label>";
    echo "<input type='number' name='rok' value='{$carinfo["rok"]}'>";
    echo "<label>Opis:</label>";
    echo "<input type='text' name='opis' value='{$carinfo["opis"]}'>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";




    if(isset($_POST["marka"]) && isset($_POST["model"]) && isset($_POST["cena"]) && isset($_POST["rok"]) && isset($_POST["opis"])){
        $marka = $_POST["marka"];
        $model = $_POST["model"];
        $cena = $_POST["cena"];
        $rok = $_POST["rok"];
        $opis = $_POST["opis"];
        $result = mysqli_query($db_connection,"UPDATE samochody SET marka = '$marka' , model = '$model' , cena = '$cena' , rok = '$rok', opis = '$opis'  WHERE id = '$carid'");
        if(!$result){
            echo "<p>Query execution error</p>";
        }
        header('Location: index.php');

    }
}
?>
