<?php
    session_start();
    $currentuserid = $_SESSION["currentuserid"];
    $db_connection = mysqli_connect("localhost","root","","3ch_db");
    function list_users($db_connection,$currentuserid){
        $query = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID != '$currentuserid'");
        while($user = mysqli_fetch_array($query)){
            echo "<div class='d-flex'>";
            echo "<form action='edit_user.php' method='post'>";
            echo "<label>Username</label>";
            echo "<input class='form-control' type='text' name='UserName{$user["UserID"]}' value='{$user["UserName"]}'>";
            echo "<label>Password</label>";
            echo "<input class='form-control' type='text' name='Password{$user["UserID"]}' value='{$user["Password"]}'>";
            echo "<label>User role</label>";
            echo "<input class='form-control' type='text' name='UserRole{$user["UserID"]}' value='{$user["UserRole"]}'>";
            echo "<button class='btn btn-primary' type='submit' name='submitbutton{$user["UserID"]}' value='{$user["UserID"]}'>Change</button>";
            echo "</form>";
            echo "</div>";
            echo "<div class='d-flex'>";
            echo "<form action='delete_user.php' method='post'>";
            echo "<button class='btn btn-danger' type='submit' name='deleteuser' value='{$user["UserID"]}'>Delete</button>";
            echo "</form>";
            echo "</div>";
            echo "<div class='d-flex'>";
            echo "<form action='edit_user_photo.php' method='post' enctype='multipart/form-data'>";
            echo "<label>User Image</label>";
            echo "<input class='form-control' type='file' name='UserPic{$user["UserID"]}'>";
            echo "<button class='btn btn-primary' type='submit' name='uploadphoto' value='{$user["UserID"]}'>Change</button>";
            echo "</form>";


            echo "<hr>";

            echo "</div>";

            if(isset($_POST["UserName" . $user["UserID"]]) && isset($_POST["Password" . $user["UserID"]]) && isset($_POST["UserRole" . $user["UserID"]])){
                $userid = $user["UserID"];
                $username = $_POST["UserName" . $user["UserID"]];
                $password = $_POST["Password" . $user["UserID"]];
                $userrole = $_POST["UserRole" . $user["UserID"]];
                $changequery = mysqli_query($db_connection,"UPDATE User SET UserName = '$username', Password = '$password', UserRole = '$userrole' WHERE UserID = '$userid'");
            }
        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Edit users settings</title>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="d-flex justify-content-center">All users</h1>
                <?php
                    list_users($db_connection,$currentuserid);
                ?>
                <div>
                    <a class="btn btn-primary" href="index.php" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>