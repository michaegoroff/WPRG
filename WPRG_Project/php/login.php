<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body class="bg-light bg-gradient">
<h1>Login</h1>
<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            <form action="login.php" method="post">
                <div>
                    <label>User Name</label>
                    <input class="form-control" type="text" name="UserName" placeholder="Enter user name">
                </div>
                <div>
                    <label>Password</label>
                    <input class="form-control" type="text" name="Password" placeholder="Enter password">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>
</body>
</html>

<?php
session_start();
$db_connection = mysqli_connect("localhost","root","","3ch_db");
function login($db_connection){
    if(isset($_POST["UserName"]) && isset($_POST["Password"])){
        $username = $_POST["UserName"];
        $password = $_POST["Password"];
        $find_user = mysqli_query($db_connection,"SELECT * FROM user WHERE UserName = '$username' AND Password = '$password'");
        $userdata = mysqli_fetch_array($find_user);
        $id = $userdata["UserID"];
        if($find_user->num_rows > 0){
            $query = mysqli_query($db_connection,"UPDATE user SET IsLoggedIn = 1 WHERE UserID = '$id'");
            $query2 = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID = '$id'");
            $row = mysqli_fetch_array($query2);
            $_SESSION["currentusername"] = $username;
            $_SESSION["currentuserid"] = $row["UserID"];
        }
        else{
            $_SESSION["message"] = 'No such user. Register first please.';
            echo $_SESSION["message"];
            return;
        }
        header('Location: index.php');
    }
}


if(!$db_connection){
    echo "<p>Connection error</p>";
}
else{
    login($db_connection);
}
?>
