<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
</head>
<body>

</body>
</html>
<?php
session_start();
logout();

function logout(){
    $db_connection = mysqli_connect("localhost","root","","mojaBaza");
    if(!$db_connection){
        echo"<p>Connection error</p>";
    }
    else{
        $login = $_SESSION["currentusername"];
        $result = mysqli_query($db_connection,"UPDATE uzytkownik SET id_rola = 1 WHERE login = '$login'");
        if(!$result){
            echo "<p>Query execution error</p>";
        }
        else{
            $_SESSION["currentusername"] = 'gosc';
            $_SESSION["permission"] = 'gosc';
            $_SESSION["permission_index"] = 1;
            $_SESSION["currentuserid"] = 1;
            header('Location: index.php');
        }
    }
}
?>