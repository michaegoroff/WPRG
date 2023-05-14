<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
</head>
<body>
    <form action="zadanie1.php" method="get">
        <p>Data urodzenia</p>
        <label>Dzień</label>
        <input type="number" name="day">
        <label>Miesiąc</label>
        <input type="number" name="month">
        <label>Rok</label>
        <input type="number" name="year">
        <input type="submit" value="Submit">
        <?php
            weekday();
            yo();
            daysleft();
        ?>
    </form>
</body>
</html>

<?php
    function weekday(){
        $date = mktime(0,0,0,$_GET["month"],$_GET["day"],$_GET["year"]);
        $weekday = date('l',strtotime($date));
        echo "<p>"."Jest " . $weekday ."\n"."</p>";
    }
    function yo(){
        $date = date($_GET["year"]."-".$_GET["month"]."-".$_GET["day"]);
        $now = date("Y-m-d");
        $diff =date_diff(date_create($date),date_create($now));
        echo "<p>"."Masz " . $diff->format("%y") . " lat"."</p>";
    }
    function daysleft(){
        $now = date("Y-m-d");
        $nowtime = strtotime($now);
        $arr = explode("-",$now);
        $yearaftertime = mktime(0,0,0,$_GET["month"],$_GET["day"],(int)$arr[0]);
        $daysleft = ($yearaftertime - $nowtime)/86400;
        echo "<p>"."Ilość dni " . $daysleft."</p>";
    }
?>