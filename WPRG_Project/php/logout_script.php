<?php
    session_start();
    $db_connection = mysqli_connect("localhost","root","","3ch_db");
    function logout($db_connection){
        $username = $_SESSION["currentusername"];
        if($username != 'guest'){
            $query = mysqli_query($db_connection,"SELECT * FROM User WHERE UserName = '$username'");
            if($query->num_rows > 0){
                $logout = mysqli_query($db_connection,"UPDATE User SET IsLoggedIn = 0 WHERE UserName = '$username'");
                $_SESSION["currentusername"] = 'guest';
                $_SESSION["currentuserid"] = null;
                $_SESSION["pseudo"] = null;
            }
            else{
                echo"<p>User not found in db</p>";
            }
        }
    }

    if(!$db_connection){
        echo "<p>Connection error</p>";
    }
    else{
        logout($db_connection);
        header('Location: index.php');
    }

?>