<?php
    session_start();
    $db_connection = mysqli_connect("localhost","root","","3ch_db");

    function list_top($db_connection){
        $query = mysqli_query($db_connection,"SELECT * FROM Topic");
        while($topic = mysqli_fetch_array($query)){
            echo "<form action='edit_topic.php' method='post'>";
            echo "<label>Name</label>";
            echo "<input class='form-control' type='text' name='TopicName{$topic["TopicID"]}' value='{$topic["TopicName"]}'>";
            echo "<label>Description</label>";
            echo "<input class='form-control' type='text' name='TopicDesc{$topic["TopicID"]}' value='{$topic["TopicDescription"]}'>";
            echo "<button class='btn btn-primary' type='submit' name='submitbutton{$topic["TopicID"]}' value='{$topic["TopicID"]}'>Change</button>";
            echo "</form>";
            if($_SESSION["currentuserrole"] == 'admin'){
                echo "<form action='delete_topic.php' method='post'>";
                echo "<button class='btn btn-danger' type='submit' name='deletetopic' value='{$topic["TopicID"]}'>Delete</button>";
                echo "</form>";
            }
            echo "<hr>";

            if(isset($_POST["TopicName" . $topic["TopicID"]]) && isset($_POST["TopicDesc" . $topic["TopicID"]])){
                $id = $topic["TopicID"];
                $name = $_POST["TopicName" . $topic["TopicID"]];
                $desc = $_POST["TopicDesc" . $topic["TopicID"]];
                $changequery = mysqli_query($db_connection,"UPDATE Topic SET TopicName = '$name' , TopicDescription = '$desc' WHERE TopicID = '$id'");
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
    <title>Edit topics info</title>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="d-flex justify-content-center">All Topics</h1>
                <?php
                    list_top($db_connection);
                ?>
                <div>
                    <a class="btn btn-primary" href="index.php" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>