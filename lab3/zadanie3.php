<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 3</title>
</head>
<body>
    <form action="zadanie3.php" method="get">
        <p>
            <label>Full Path</label>
            <input type="text" name="path">
        </p>
        <p>
            <label>Directory name</label>
            <input type="text" name="dirname">
        </p>
        <p>
            <label>Command</label>
            <input type="text" name="cmd">
        </p>
        <ul>
            <li>Commands</li>
            <li>read</li>
            <li>delete</li>
            <li>create</li>
        </ul>
        <p>
            <input type="submit" value="Execute">
        </p>
    </form>
</body>
</html>

<?php
    if($_GET["cmd"] == "read"){
        read($_GET["path"]);
    }
    else if ($_GET["cmd"] == "delete"){
        delete($_GET["path"],$_GET["dirname"]);
    }
    else if ($_GET["cmd"] == "create"){
        create($_GET["path"],$_GET["dirname"]);
    }
    function read(string $path){
        $files = scandir($path);
        foreach ($files as $file){
            echo "<p>". $file . "</p>";
        }
    }
    function delete(string $path,string $dirname){
        if($path[strlen($path) - 1] != '/'){
            if(is_dir($path . "/" .$dirname) && (count(scandir($path . "/" . $dirname)) == 0 || count(scandir($path . "/" . $dirname)) == 2)){
                rmdir($path . "/" . $dirname);
            }
            else{
                echo "<p>" . "Directory is not empty or does not exist" . "</p>";
            }
        }
        else if($path[strlen($path) - 1] == '/'){
            if(is_dir($path . $dirname) && (count(scandir($path . $dirname)) == 0 || count(scandir($path.$dirname)) == 2)){
                rmdir($path.$dirname);
            }
            else{
                echo "<p>" . "Directory is not empty or does not exist" . "</p>";
            }
        }
    }

    function create(string $path,string $dirname){
        if($path[strlen($path) - 1] != '/'){
            if(is_dir($path . "/" .$dirname)){
                echo "<p>" . "Directory already exists" . "</p>";
            }
            else{
                mkdir($path . "/" . $dirname);
            }
        }
        else if($path[strlen($path) - 1] == '/'){
            if(is_dir($path . $dirname)){
                echo "<p>" . "Directory already exists" . "</p>";
            }
            else{
                mkdir($path . $dirname);
            }
        }
    }

?>