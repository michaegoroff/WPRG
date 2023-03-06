<?php
    function selec_rand(){
        $index = 0;
        $nums = array();
        for($i = 0;$i < 20;$i++) {
            $nums[$i] = rand(1, 50);
        }
        echo "Wybierz indeks:(0-19) ";
        $index = readline();
        return $nums[$index];
    }
    $num = selec_rand();
    echo $num;
?>
