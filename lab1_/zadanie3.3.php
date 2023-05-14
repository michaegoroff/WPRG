<?php
    function table($n){
        for($i = 1;$i <= $n;$i++){
            for($j = 1;$j <= $n;$j++) {
                echo $i . "*" . $j . "=" . ($i*$j) . " ";
            }
            echo "\n";
        }
    }
    table(10);

?>
