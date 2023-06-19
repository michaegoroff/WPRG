<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Create new section</title>
</head>
<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row">
            <h1 class="mt-5 mb-5">Create a new section</h1>
           <form action="create_section.php" method="post">
               <div class="col-sm">
                   <label>Section name</label>
                   <input class="form-control" type="text" name="SectionName" maxlength="64">
               </div>
               <div class="col-sm">
                   <label>Section description</label>
                   <textarea class="form-control" name="SectionDesc" rows="3" maxlength="512"></textarea>
               </div>
               <div class="col-sm">
                   <button type="submit"  class="btn btn-primary">Create</button>
               </div>
           </form>
        </div>
    </div>
</body>
</html>
<?php
session_start();
$_dbconnection = mysqli_connect("localhost","root","","3ch_db");
if(isset($_POST["SectionName"]) && isset($_POST["SectionDesc"])){
    $name = $_POST["SectionName"];
    $desc = $_POST["SectionDesc"];
    $query = mysqli_query($_dbconnection,"INSERT INTO Section (SectionName,SectionDescription) VALUES ('$name','$desc')");
    if(!$query){
        echo "<p>Query execution error</p>";
    }

    header('Location: index.php');
}
?>


