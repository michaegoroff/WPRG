<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
</head>
<body>
    <form action="index.php">
        <button type="submit">Strona glowna</button>
    </form>
    <br>
    <form action="allcars.php">
        <button type="submit">Wszystkie samochody</button>
    </form>
    <br>
    <form action="add.php">
        <button type="submit">Dodaj samochod</button>
    </form>
    <br>
    <form action="register.php">
        <button type="submit">Zarejestruj sie</button>
    </form>
    <br>
    <form action="login.php">
        <button type="submit">Zaloguj sie</button>
    </form>
    <br>
    <form action="logout.php">
        <button type="submit">Wyloguj sie</button>
    </form>


</body>
</html>

<?php
session_start();
    $db_connection = mysqli_connect("localhost","root","","mojaBaza");
    if($_SESSION["permission_index"] != 2 && $_SESSION["permission_index"] != 3){
        $_SESSION["permission_index"] = 1;
        $_SESSION["currentuserid"] = 1;
    }
    if(!$db_connection){
        echo "<p>Connection error</p>";
    }
    else{
        echo "<p>Connection successful</p>";
        $query = 'SELECT * FROM samochody ORDER BY cena LIMIT 5';
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
            echo "</tr>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>{$row["marka"]}</td>";
                echo "<td>{$row["model"]}</td>";
                echo "<td>{$row["cena"]}</td>";
                echo "<td>{$row["rok"]}</td>";
                echo "<td>{$row["opis"]}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<h2>Brak wynikow!</h2>";
        }
    }
    echo "Current user name: " . $_SESSION["currentusername"] . " " . $_SESSION["currentuserid"] . " ";
    echo "Current user permission level: " . $_SESSION["permission"] . " " . $_SESSION["permission_index"];
    if($_SESSION["permission_index"] != 1){
        echo "<form action='mycars.php' method='post'>";
        echo "<button type='submit'>Moje samochody</button>";
    }

?>