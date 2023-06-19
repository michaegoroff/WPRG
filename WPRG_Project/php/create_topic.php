<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <title></title>
</head>
<body class="bg-gradient bg-light">
    <div class="container">
        <div class="row">
            <h1 class="mt-5 mb-5">Create new topic</h1>
            <form action="create_topic.php" method="post">
                <div class="col-lg-12">
                    <label>Name</label>
                    <input class="form-control" type="text" placeholder="Enter the title here" name="TopicName" maxlength="256">
                </div>
                <div class="col-lg-12">
                    <label>Description</label>
                    <input class="form-control" type="text" placeholder="Enter your question here" name="TopicDesc" maxlength="512">
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-primary" href="list_sections.php" role="button">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


<?php
session_start();
$db_connection = mysqli_connect("localhost","root","","3ch_db");
if(isset($_POST["TopicName"]) && isset($_POST["TopicDesc"])){
    $name = $_POST["TopicName"];
    $desc = $_POST["TopicDesc"];
    $currentuserid = $_SESSION["currentuserid"];
    $currentsectionid = $_SESSION["currentsectionid"];
    $query = mysqli_query($db_connection,"INSERT INTO Topic (TopicName,TopicDescription,CreationDate,CreatedByUserID,InSectionID) VALUES ('$name','$desc',NOW(),'$currentuserid','$currentsectionid')");
    $query2 = mysqli_query($db_connection,"SELECT * FROM Topic ORDER BY TopicID DESC LIMIT 1");
    $row = mysqli_fetch_array($query2);

    header('Location: index.php');
}

?>