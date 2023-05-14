<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie1</title>
</head>
<body>
    <form action="zadanie1.php" method="get">
        <label>Put file:</label>
        <input type="file" name="file">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    if(isset($_GET["file"])){
        $txt = file($_GET["file"]);
        $txt[count($txt) - 1] .= "\n";
        foreach ($txt as $line){
            echo "<p>" . $line . "</p>";
        }
        $txtreverse = array_reverse($txt);
        file_put_contents($_GET["file"],$txtreverse);
        $txt = file($_GET["file"]);
        foreach ($txt as $line){
            echo "<p>" . $line . "</p>";
        }


    }
?>