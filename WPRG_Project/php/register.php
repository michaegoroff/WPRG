

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/register.css">
    <title>Register</title>
</head>
<body class="bg-light bg-gradient">
    <h1>Register</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <form action="register.php" method="post">
                    <div>
                        <label>User Name</label>
                        <input class="form-control" type="text" name="UserName" placeholder="Enter user name">
                    </div>
                    <div>
                        <label>Password</label>
                        <input class="form-control" type="text" name="Password" placeholder="Enter password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Register</button>
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
    if(!$db_connection){
        echo "<p>Database connection error</p>";
    }
    else{
        register($db_connection);
    }
    function register($db_connection){
        if(isset($_POST["UserName"]) && isset($_POST["Password"])){
            $username = $_POST["UserName"];
            $password = $_POST["Password"];
            $find_usernames = mysqli_query($db_connection,"SELECT * FROM User");
            while($row = mysqli_fetch_array($find_usernames)){
                if(($row["UserName"] == $_POST["UserName"])||($_POST["UserName"] == '')||($_POST["Password"] == '') || (str_contains($_POST["UserName"],' '))||(str_contains($_POST["Password"],' '))){
                    echo "<p>This user already exists or some of the fields are null</p>";
                    return;
                }
            }
            $query = mysqli_query($db_connection,"INSERT INTO User(isLoggedIn,UserName,Password,UserRole,CreationDate) VALUES (1,'$username','$password','user',NOW())");
            $query2 = mysqli_query($db_connection,"SELECT * FROM User ORDER BY UserID DESC LIMIT 1");
            $_SESSION["currentusername"] = $username;
            $row = mysqli_fetch_array($query2);
            $_SESSION["currentuserid"] = $row["UserID"];
            header('Location: index.php');
        }
    }
?>