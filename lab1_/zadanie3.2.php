<?php
    function dice(int $n){
        $array = array();
        for($i = 0;$i <= $n;$i++){
            $array[$i] = rand(1,6);
        }
        return $array;
    }
    $array = dice(10);
    for($i = 0;$i <10;$i++){
        echo "Rzut " . $i + 1 . ":" . $array[$i] . "\n";
    }
?>
