<?php
session_start();
$db_connection = mysqli_connect("localhost","root","","3ch_db");

function list_sections($db_connection){
    $query = mysqli_query($db_connection,"SELECT * FROM Section");
    echo '<div class="col-lg-12">';
    while($row = mysqli_fetch_array($query)){
        $query2 = mysqli_query($db_connection,"SELECT * FROM Topic WHERE InSectionID = '{$row["SectionID"]}' ORDER BY CreationDate DESC LIMIT 1");
        $newest = mysqli_fetch_array($query2);
        $id = $row["SectionID"];
        $name = $row["SectionName"];
        $desc = $row["SectionDescription"];
        echo "<div class='d-flex'><form method='post' action='section.php'><button class='btn btn-primary section' type='submit' name='sectionbutton' value='$id'>$name</button></form><span class='d-flex justify-content-center'>$desc</span></div>";
        if($query2->num_rows > 0){
            echo '<div class="mt-5">Newest:</div>';
            echo '<div>'.$newest["TopicName"].'</div>';
            echo '<div>'.$newest["TopicDescription"].'</div>';
            echo '<div>'.$newest["CreationDate"].'</div>';
            echo '</div>';
            echo "<div class='d-flex'><form action='topic.php' method='post'><button class='btn btn-primary' type='submit' name='newesttopic' value='{$newest["TopicID"]}'>Go to topic</button></form></div>";

        }
        echo '<hr>';
    }
    echo "</div>";



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/list_sections.css">
    <title>List of sections</title>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <h1 class="justify-content-center d-flex mt-5 mb-5">List of all sections</h1>
            <?php
                list_sections($db_connection);
            ?>
            <div class="col-lg-12 d-flex justify-content-center">
                <a href="index.php" role="button" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>

</body>
</html>


