<?php
session_start();
$db_connection = mysqli_connect("localhost","root","","3ch_db");


function list_sec($db_connection){
    $query = mysqli_query($db_connection,"SELECT * FROM Section");
    while($section = mysqli_fetch_array($query)){
        echo "<form action='edit_section.php' method='post'>";
        echo "<label>Name</label>";
        echo "<input class='form-control' type='text' name='SectionName{$section["SectionID"]}' value='{$section["SectionName"]}'>";
        echo "<label>Description</label>";
        echo "<input class='form-control' type='text' name='SectionDesc{$section["SectionID"]}' value='{$section["SectionDescription"]}'>";
        echo "<button class='btn btn-primary' type='submit' name='submitbutton{$section["SectionID"]}' value='{$section["SectionID"]}'>Change</button>";
        echo "</form>";
        echo "<form action='delete_section.php' method='post'>";
        echo "<button class='btn btn-danger' type='submit' name='deletesection' value='{$section["SectionID"]}'>Delete</button>";
        echo "</form>";
        echo "<hr>";

        if(isset($_POST["SectionName" . $section["SectionID"]]) && isset($_POST["SectionDesc" . $section["SectionID"]])){
            $name = $_POST["SectionName" . $section["SectionID"]];
            $desc = $_POST["SectionDesc" . $section["SectionID"]];
            $id = $section["SectionID"];
            $changequery = mysqli_query($db_connection,"UPDATE Section SET SectionName = '$name' , SectionDescription ='$desc' WHERE SectionID = '$id'");
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
    <title>Edit sections</title>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="d-flex justify-content-center">All Sections</h1>
                <?php
                    list_sec($db_connection);
                ?>
                <div>
                    <a class="btn btn-primary" href="index.php" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>