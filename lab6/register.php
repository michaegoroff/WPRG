<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Zarejestuj sie</h1>
    <form method="post" action="register.php">
      <label>Login:</label>
      <input type="text" name="login">
      <br>
      <label>Haslo:</label>
      <input type="text" name="haslo">
      <input type="submit" value="Zarejestruj sie">
    </form>
</body>
</html>

<?php
session_start();
$db_connection = mysqli_connect("localhost","root","", "mojaBaza");
if(!$db_connection){
    echo "<p>Connection error</p>";
}
else{
    if(isset($_POST["login"]) && isset($_POST["haslo"])){
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
        $result = mysqli_query($db_connection,"INSERT INTO uzytkownik(login,haslo,id_rola) VALUES('$login','$haslo',3)");

        if(!$result){
            echo "<p>Query execution error</p>";
        }
        else{
            $_SESSION["currentusername"] = $login;
            $_SESSION["permission"] = 'uzytkownik';
            $_SESSION["permission_index"] = 3;
            $result2 =mysqli_query($db_connection,"SELECT * FROM uzytkownik WHERE login = '$login' AND haslo = '$haslo'");
            $row = mysqli_fetch_array($result2);
            $_SESSION["currentuserid"] = $row["id"];
            header('Location: index.php');
        }
    }
}
?>