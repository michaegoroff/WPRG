<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
        if(!isset($_COOKIE["LICZNIK"])){
            setcookie("LICZNIK",1,time() + 60*60*24);
        }
        else{
            $cookie = ++$_COOKIE["LICZNIK"];
            setcookie("LICZNIK",$cookie);
        }
        echo "Ilosc odwiedzin: " . $_COOKIE["LICZNIK"];
        if($_COOKIE["LICZNIK"] == 5){
            echo "<p>" . "Odwiedziles strone 5 razow" . "</p>";
        }
        if($_COOKIE["LICZNIK"] == 10){
            echo "<p>" ."Odwiedziles strone 10 razow" . "</p>";
        }
        if($_COOKIE["LICZNIK"] == 50){
            echo "<p>". "Odwiedziles strone 50 razow" . "</p>";
        }
    ?>
</body>
</html>