<?php
session_start();

$currentsectionid = $_POST["sectionbutton"];

$db_connection = mysqli_connect("localhost","root","","3ch_db");
$query = mysqli_query($db_connection,"SELECT * FROM Section WHERE SectionID = '$currentsectionid'");
$section = mysqli_fetch_array($query);
$_SESSION["currentsectionid"] = $section["SectionID"];
$_SESSION["currentsectionname"] = $section["SectionName"];
function list_topics($db_connection,$currentsectionid){
    $query = mysqli_query($db_connection,"SELECT * FROM Topic WHERE InSectionID = '$currentsectionid' ORDER BY CreationDate DESC ");
    while($row = mysqli_fetch_array($query)){
        $userid = $row["CreatedByUserID"];
        $query2 = mysqli_query($db_connection,"SELECT * FROM User WHERE UserID = '$userid'");
        $user = mysqli_fetch_array($query2);
        $id = $row["TopicID"];
        echo "<div class='col-lg-12'>";
        echo "<div class='d-flex border-dark'>";
        echo $row["TopicName"];
        echo "</div>";
        echo "<div class='d-flex border-dark'>";
        echo $row["TopicDescription"];
        echo "</div>";
        echo "<div class='d-flex border-dark'>";
        echo $row["CreationDate"];
        echo "</div>";
        echo "<div>";
        echo $user["UserName"];
        echo "</div>";
        echo "<br>";
        echo "<form action='topic.php' method='post'>";
        echo "<button class='btn btn-primary' value='$id' name='topicbutton' type='submit'>Go to topic</button>";
        echo "</form>";
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
    <link rel="stylesheet" href="../css/index.css">
    <?php echo '<title>'. $_SESSION["currentsectionname"] .'</title>'?>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <h1 class="d-flex justify-content-center mt-5 mb-5">All topics</h1>
            <?php list_topics($db_connection,$currentsectionid);?>
        </div>

        <?php
            if($_SESSION["currentuserrole"] != 'guest'){
                echo"<div>";
                echo"<form action='create_topic.php' method='post'><button class='btn btn-primary' type='submit'>Create new topic</button></form>";
                echo"</div>";
            }
        ?>
    </div>
</body>
</html>

<?php

?>