<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zaloguj sie</title>
</head>
<body>
    <h1>Zaloguj sie</h1>
    <form method="post" action="login.php">
        <label>Login</label>
        <input type="text" name="login">
        <br>
        <label>Haslo</label>
        <input type="text" name="haslo">
        <input type="submit" value="Zaloguj sie">
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
        if(isset($_POST["login"])&&isset($_POST["haslo"])){
            $login = $_POST["login"];
            $haslo = $_POST["haslo"];
            $result = mysqli_query($db_connection,"SELECT * FROM uzytkownik WHERE login = '$login' AND haslo = '$haslo'");
            if(!($result->num_rows > 0)){
                echo"<p>Query execution error</p>";
            }
            else{
                $_SESSION["currentusername"] = $login;
                $row = mysqli_fetch_array($result);
                if($login == "admin"){
                    $result2 = mysqli_query($db_connection,"UPDATE uzytkownik SET id_rola=2 WHERE login='$login' AND haslo='$haslo'");
                    $_SESSION["permission"] = 'admin';
                    $_SESSION["permission_index"] = 2;
                    $_SESSION["currentuserid"] = $row["id"];
                }
                else{
                    $result2 = mysqli_query($db_connection,"UPDATE uzytkownik SET id_rola=3 WHERE login='$login' AND haslo='$haslo'");
                    $_SESSION["permission"] = 'uzytkownik';
                    $_SESSION["permission_index"] = 3;
                    $_SESSION["currentuserid"] = $row["id"];
                }
            }
            header('Location: index.php');
        }
    }

?>