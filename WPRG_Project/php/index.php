<?php
session_start();

$db_connection = mysqli_connect("localhost","root","","3ch_db");

if(!isset($_SESSION["currentuserid"])){
    $_SESSION["currentusername"] = 'guest';
    $_SESSION["currentuserrole"] = 'guest';
}
else{
    $query = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID = '{$_SESSION["currentuserid"]}'");
    $userdata = mysqli_fetch_array($query);
    $_SESSION["currentuserrole"] = $userdata["UserRole"];
    $_SESSION["currentuserpicname"] = $userdata["UserPicName"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Welcome to 3ch!</title>
</head>
<body class="bg-light bg-gradient">
    <h1>Welcome to forum!</h1>
    <h2>I do not know how to frontend,sorry</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="justify-content-center d-flex">
                    <a href="list_sections.php" role="button" class="btn btn-info leftpanel">All sections</a>
                </div>
                <?php
                    if(isset($_SESSION["currentuserid"]) && $_SESSION["currentuserrole"] == 'admin'){
                        echo'<div class="d-flex justify-content-center">';
                        echo'<a href="create_section.php" role="button" class="btn btn-info leftpanel">Create new section</a>';
                        echo'</div>';
                        echo'<div class="d-flex justify-content-center">';
                        echo'<a href="edit_user.php" role="button" class="btn btn-info leftpanel">Edit users info</a>';
                        echo'</div>';
                        echo'<div class="d-flex justify-content-center">';
                        echo'<a href="edit_section.php" role="button" class="btn btn-info leftpanel">Edit sections</a>';
                        echo'</div>';
                    }
                    if(isset($_SESSION["currentuserid"]) && (($_SESSION["currentuserrole"] == 'admin') || ($_SESSION["currentuserrole"] == 'moder'))){
                        echo'<div class="d-flex justify-content-center">';
                        echo'<a href="edit_topic.php" role="button" class="btn btn-info leftpanel">Edit topics</a>';
                        echo'</div>';
                    }
                ?>
            </div>
            <div class="col-sm">
                <div class="d-flex justify-content-center">
                    <a href="register.php" class="btn btn-info justify-content-center" role="button">Register</a>
                    <a href="login.php" class="btn btn-info justify-content-center" role="button">Log In</a>
                    <?php
                    if($_SESSION["currentusername"] != 'guest'){
                        echo "<a href='logout_script.php' class='btn btn-info justify-content-center' role='button'>Log Out</a>";
                    }
                    ?>
                </div>
                <div class="d-flex justify-content-center">
                    <?php
                        if($_SESSION["currentusername"] == 'guest'){
                         echo '<form action="index.php" method="post">';
                         echo '<div>';
                         echo  '<label>Enter pseudo to continue without logging in</label>';
                         echo '<input type="text" class="form-control" name="Pseudo">';
                         echo '</div>';
                         echo '<div class="d-flex justify-content-center">';
                         echo '<button type="submit" class="btn btn-primary">Enter</button>';
                         echo'</div>';
                         echo'</form>';
                        }
                    ?>
                </div>
                <h1>Newest topics</h1>
                <?php show_newest_topic($db_connection); ?>
            </div>
            <div class="col-sm">
                <?php
                    if(isset($_SESSION["currentuserid"])){
                        $userpic = $_SESSION["currentuserpicname"];
                        $path = "../images/" . $userpic;
                        echo "<div class='d-flex justify-content-center'>";
                        echo "<img src='{$path}' width='150' height='150'>";
                        echo "</div>";
                        echo "<div class='d-flex justify-content-center'>Name: {$_SESSION["currentusername"]}</div>";
                        echo "<div class='d-flex justify-content-center'>Permission: {$_SESSION["currentuserrole"]}</div>";
                    }
                    else{

                    }
                ?>
                <?php
                    if(isset($_SESSION["currentuserid"]) && ($_SESSION["currentuserrole"] != 'guest')){
                        echo '<div class="d-flex justify-content-center">';
                        echo '<a href="account_info_panel.php" role="button" class="btn btn-info">Account settings</a>';
                        echo '</div>';
                    }
                ?>

            </div>
        </div>
    </div>

</body>
</html>

<?php
    if(isset($_POST["Pseudo"])){
        $_SESSION["pseudo"] = $_POST["Pseudo"];
        header('Location: index.php');
    }

    function show_newest_topic($db_connection){
        $topics = mysqli_query($db_connection,"SELECT * FROM TOPIC ORDER BY CreationDate DESC LIMIT 5");
        while($row = mysqli_fetch_array($topics)){
            $userid = $row["CreatedByUserID"];
            $query2 = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID = '$userid'");
            $user = mysqli_fetch_array($query2);
            echo "<div>";
            echo "<div>" . $row["TopicName"] . "</div>";
            echo "<div>" . $row["TopicDescription"] . "</div>";
            echo "<div>". $row["CreationDate"] ."</div>";
            echo "<div>". $user["UserName"] ."</div>";
            echo "<div><form action='topic.php' method='post'><button class='btn btn-primary' type='submit' name='topicbutton' value='{$row["TopicID"]}'>Go to topic</button></form></div>";
            echo "</div>";
        }
    }
?>


