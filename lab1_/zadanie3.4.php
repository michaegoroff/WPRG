<?php
    function IsPrime(int $n){
        $root = sqrt($n);
        if($n <= 1){
            return false;
        }
        for($i = 2;$i <= $root;$i++){
            if($n%$i == 0){
                return false;
            }
        }
        return true;
    }
    for($i = 1;$i <= 100;$i++){
        if(IsPrime($i) == true){
            echo $i . " ";
        }
    }

?>