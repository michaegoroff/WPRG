<?php
    session_start();
    $db_connection = mysqli_connect("localhost","root","","3ch_db");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/account_info_panel.css">
    <title>Account settings</title>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mt-5">Your profile picture</h1>
                <?php
                $userid = $_SESSION["currentuserid"];
                $query = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID = '$userid'");
                $row = mysqli_fetch_array($query);
                $path = '../images/' . $row["UserPicName"];
                echo "<img src='{$path}'>";
                ?>
                <?php
                    echo "<form action='upload_photo.php' method='post' enctype='multipart/form-data'>";
                    echo "<label>Drop your photo here:</label>";
                    echo "<input class='form-control' type='file' name='UserPic'>";
                    echo "<input class='form-control' type='submit' value='Upload image' name='submitbutton'>";
                    echo "</form>";
                ?>
            </div>
            <div class="col-md-6">
                <h1 class="mt-5">Your account settings</h1>
                <?php
                echo '<form action="account_info_panel.php" method="post">';
                    echo "<label>User name:</label>";
                    echo "<input class='form-control' type='text' name='UserName' placeholder='Change user name' value='{$row["UserName"]}'>";
                    echo "<label>Password:</label>";
                    echo "<input class='form-control' type='text' name='OldPassword' placeholder='Confirm old password'>";
                    echo "<input class='form-control' type='text' name='NewPassword' placeholder='Enter new password'>";
                    echo "<input class='btn btn-primary mt-2' type='submit' value='Confirm'>";
                echo "</form>";
                echo "<a type='submit' class='btn btn-primary mt-2' href='index.php'>Back</a>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST["UserName"])){
        $username = $_POST["UserName"];
        $query = mysqli_query($db_connection,"UPDATE User SET UserName = '$username' WHERE UserID = '$userid'");
        $_SESSION["currentusername"] = $username;
    }
    if(isset($_POST["OldPassword"]) && isset($_POST["NewPassword"])){
        $query = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID = '$userid'");
        $row = mysqli_fetch_array($query);
        if($_POST["OldPassword"] == $row["Password"]){
            $query = mysqli_query($db_connection,"UPDATE User SET Password ='{$_POST["NewPassword"]}' WHERE UserID = '$userid'");
        }
    }


?>