<?php
    session_start();
    $db_connection = mysqli_connect("localhost","root","","3ch_db");
    if(isset($_POST["commentbutton"])){
        $_SESSION["currentcomment"] = $_POST["commentbutton"];
    }
    $currentcommentid = $_SESSION["currentcomment"];

    function list_comm($db_connection,$currentcommentid){
        $query = mysqli_query($db_connection,"SELECT * FROM Commentary WHERE CommentID='$currentcommentid'");
        $commentdata = mysqli_fetch_array($query);
        echo "<form action='edit_commentary.php' method='post'>";
        echo "<label>Edit text</label>";
        echo "<input class='form-control' type='text' name='Text{$commentdata["CommentID"]}' value='{$commentdata["CommentText"]}'>";
        echo "<button class='btn btn-primary' type='submit' name='submitcomment'>Edit</button>";
        echo "</form>";
        if($_SESSION["currentuserrole"] == 'admin'){
            echo "<form action='delete_comment.php' method='post'>";
            echo "<button class='btn btn-danger' type='submit' name='deletecomment' value='{$commentdata["CommentID"]}'>Delete</button>";
            echo "</form>";
        }

        if(isset($_POST["Text" . $commentdata["CommentID"]])){
            $text = $_POST["Text" . $commentdata["CommentID"]];
            $changequery = mysqli_query($db_connection,"UPDATE Commentary SET CommentText ='$text' WHERE CommentID ='$currentcommentid'");
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
    <title>Edit commentaries</title>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="justify-content-center mt-5 mb-5">Edit a comment</h1>
                <?php
                    list_comm($db_connection,$currentcommentid);
                ?>
                <a class="btn btn-primary" role="button" href="topic.php">Back</a>
            </div>
        </div>
    </div>
</body>
</html>