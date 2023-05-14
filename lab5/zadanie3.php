<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
    $page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');

    if(!isset($_COOKIE["LICZNIK2"])){
        setcookie("LICZNIK2",1,time() + 60 * 60 * 24);
    }

    if(isset($_COOKIE["LICZNIK2"]) && !$page_refreshed){
        $cookie = ++$_COOKIE["LICZNIK2"];
        setcookie("LICZNIK2",$cookie);
    }
    echo "<p>" . "Licznik: " . $_COOKIE["LICZNIK2"] . "</p>";
    ?>
</body>
</html>