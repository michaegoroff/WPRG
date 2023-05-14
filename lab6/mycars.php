<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moje samochody</title>
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
        $currentid = $_SESSION["currentuserid"];
        if($_SESSION["permission_index"] == 3){
            $result = mysqli_query($db_connection,"SELECT * FROM samochody WHERE id_uzytkownik = '$currentid'");
            if(mysqli_num_rows($result) > 0){
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
                    echo "<td><form action='edit.php' method='get'><button type='submit' name='submitbutton' value='{$row["id"]}'>Edytuj</button></form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<h2>Brak wynikow!</h2>";
            }
        }
        else{
            $result = mysqli_query($db_connection,"SELECT * FROM samochody");
            if(mysqli_num_rows($result) > 0){
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
                    echo "<td><form action='edit.php' method='get'><button type='submit' name='submitbutton' value='{$row["id"]}'>Edytuj</button></form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<h2>Brak wynikow!</h2>";
            }
        }
    }
?>