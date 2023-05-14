<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 2</title>
</head>
<body>
    <?php
        $start = microtime(true);
        $i = fact_rec(15);
        $end = microtime(true) - $start;
        echo "<p>"."Rekurencyjna: " . $end . "</p>";
        $start1 = microtime(true);
        $k = fact(15);
        $end1 = microtime(true) - $start1;
        echo $i . " " . $k;
        echo "<p>"."Zwykła: " . $end1 . "</p>";
    ?>
</body>
</html>

<?php
    function fact_rec(int $n){
        if($n <= 1){
            return 1;
        }
        return $n * fact($n - 1);
    }
    function fact(int $n){
        $result = 1;
        for($i = 1;$i <= $n;$i++){
            $result *= $i;
        }
        return $result;
    }

?>