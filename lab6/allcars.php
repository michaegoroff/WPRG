<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All cars</title>
</head>
<body>
    <form action="index.php" method="post">
        <button>Strona glowna</button>
    </form>
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
    $query = 'SELECT * FROM samochody ORDER BY rok';
    $result = mysqli_query($db_connection,$query);
    if (!$result) {
        echo "<p>Execution error</p>";
        exit();
    }
    if (!mysqli_close($db_connection)) {
        echo "<p>Error while closing connection</p>";
        exit();
    }
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
            echo "<td><form action='info.php' method='post'><button type='submit' name='submitbutton' value='{$row["id"]}'>Szczegoly</button></form></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<h2>Brak wynikow!</h2>";
    }

}

?>