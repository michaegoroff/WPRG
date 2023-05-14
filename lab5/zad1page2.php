<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page 2</title>
</head>
<body>
    <?php
        session_start();
        form($_SESSION["num"]);
    ?>
    <a href="zad1page3.php">Nastepna strona</a>
</body>
</html>


<?php
    function form(int $index){
        echo "<form action='zad1page2.php' method='get'>";
        for($i = 1;$i <= $index;$i++){
            echo "<label>" . "Imie" . "</label>";
            echo "<input type='text' name='name$i' >";
            echo "<label>" . "Nazwisko" . "</label>";
            echo "<input type='text' name='surname$i'>";
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>";

        for($i = 1;$i <= $index;$i++){
            $_SESSION["name" . "$i"] = $_GET["name$i"];
            $_SESSION["surname" . "$i"] = $_GET["surname$i"];
        }
    }


?>