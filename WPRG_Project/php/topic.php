<?php
session_start();
if(isset($_POST["newesttopic"])){
    $_POST["topicbutton"] = $_POST["newesttopic"];
}
else if(!isset($_POST["topicbutton"])){
    $_POST["topicbutton"] = $_SESSION["currenttopicid"];
}
$currentsectionid = $_SESSION["currentsectionid"];
$currenttopicid = $_POST["topicbutton"];
$_SESSION["currenttopicid"] = $currenttopicid;
$db_connection = mysqli_connect("localhost","root","","3ch_db");

function topic_content($db_connection,$currenttopicid){
    $query = mysqli_query($db_connection,"SELECT * FROM Topic WHERE TopicID = '$currenttopicid'");
    $topic = mysqli_fetch_array($query);
    $title = $topic["TopicName"];
    $desc = $topic["TopicDescription"];
    $usercreatedid = $topic["CreatedByUserID"];
    $query2 = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID = '$usercreatedid'");
    $usercreated = mysqli_fetch_array($query2);
    $avatarname = $usercreated["UserPicName"];
    $username = $usercreated["UserName"];
    $date = $topic["CreationDate"];
    $path = "../images/" . $avatarname;
    echo '<div class="mt-3"></div>';
    echo "<div class='col-sm-2'><img src='$path'><div>". $username."</div><div>$date</div></div>";
    echo "<div class='col-lg-10'>";
    echo "<div><h2>$title</h2></div>";
    echo "<div>" . $desc . "</div>";
    echo "</div>";
    echo "<hr>";

}

function list_commentaries($db_connection,$currenttopicid){
    $query = mysqli_query($db_connection,"SELECT * FROM Commentary WHERE IntopicID ='$currenttopicid'");
    while($comment = mysqli_fetch_array($query)){
        if($comment["CreatedByuserID"] != null){
            $query2 = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID='{$comment["CreatedByuserID"]}'");
            $user = mysqli_fetch_array($query2);
            $path = "../images/" . $user["UserPicName"];
            $username = $user["UserName"];
        }
        else{
            $path = "../images/default.png";
            $username = $comment["CreatedByUserName"];
        }
        $date = $comment["CreationDate"];
        $text = $comment["CommentText"];
        $logged = $comment["UserWasLogged"];
        $mes = "";
        if($logged == 0){
            $mes = "Guest";
        }
        else{
            $mes = "Logged in";
        }
        echo "<div class='row'>";
        echo "<div class='col-sm-2'><img src='$path'><div>". $username."</div><div>$date</div>$mes</div>";
        echo "<div class='col-lg-10'>";
        echo "<div class='d-flex text-lg-start'>" . $text . "</div>";
        if(($_SESSION["currentuserrole"] == 'admin') ||($_SESSION["currentuserrole"] == 'moder')){
            echo "<form action='edit_commentary.php' method='post'>";
            echo "<button class='btn btn-info mt-2 mb-2' type='submit' name='commentbutton' value='{$comment["CommentID"]}'>Edit</button>";
            echo "</form>";
        }
        echo "</div>";
        echo "</div>";
        echo "<hr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/topic.css">
    <title></title>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <?php
                topic_content($db_connection,$currenttopicid);
            ?>
        </div>
        <?php
            list_commentaries($db_connection,$currenttopicid);
        ?>
        <div class="row">
            <?php
                if(($_SESSION["currentuserrole"] != 'guest') || ((isset($_SESSION["pseudo"])) && $_SESSION["pseudo"] != '' && !str_contains($_SESSION["pseudo"],' '))){
                    echo '<form action="upload_comment.php" method="get">';
                    echo '<label>Comment</label>';
                    echo '<input class="form-control" type="text" name="comment" placeholder="Enter your comment" maxlength="4096">';
                    echo '<button type="submit" class="btn btn-primary mt-2 mb-2">Submit</button>';
                    echo '</form>';
                }
                else{
                    echo '<div>Enter pseudonym or log on to comment</div>';
                }
            ?>
            <?php
                echo "<form action='index.php' method='post'><button class='btn btn-primary' type='submit'>Back</button></form>";
            ?>
        </div>

    </div>
</body>
</html>