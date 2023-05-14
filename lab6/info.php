<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>info</title>
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
else {
    echo "<p>Connection successful</p>";
    $query = "SELECT * FROM samochody WHERE id = '{$_POST["submitbutton"]}'";
    $result = mysqli_query($db_connection,$query);
    if(!mysqli_num_rows($result)==0)
    {
        echo "<table>";
        echo "<tr>";
        echo "<td>Marka:</td>";
        echo "<td>Model:</td>";
        echo "<td>Cena:</td>";
        echo "<td>Rok:</td>";
        echo "<td>Opis:</td>";
        echo "<td>Id uzytkownika:</td>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>{$row["marka"]}</td>";
            echo "<td>{$row["model"]}</td>";
            echo "<td>{$row["cena"]}</td>";
            echo "<td>{$row["rok"]}</td>";
            echo "<td>{$row["opis"]}</td>";
            echo "<td>{$row["id_uzytkownik"]}</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<form method='post' action='index.php'>";
        echo "<button>Strona glowna</button>";
        echo "</form>";
    }
    else
    {
        echo "<h2>Brak wyników!</h2>";
    }

}
?>