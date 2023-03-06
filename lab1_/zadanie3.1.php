<?php
    function for_ver(){
        $array = array();
        for($i = 0;$i < 20;$i++){
            $array[$i] = rand(1,50);
        }
        echo "Tablica:\n";
        for($i = 0;$i < 20;$i++){
            echo $array[$i] . " ";
        }
        echo"\n";
        $max = $array[0];
        for($i = 1;$i < 20;$i++){
            if($array[$i] > $max){
                $max = $array[$i];
            }
        }
        return $max;
    }
    function while_ver(){
        $array = array();
        for($i = 0;$i < 20;$i++){
            $array[$i] = rand(1,50);
        }
        echo "Tablica:\n";
        for($i = 0;$i < 20;$i++){
            echo $array[$i] . " ";
        }
        echo"\n";
        $max = $array[0];
        $i = 1;
        while($i < 20){
            if($array[$i] > $max){
                $max = $array[$i];
            }
            $i++;
        }
        return $max;
    }
    function do_while_ver(){
        $array = array();
        for($i = 0;$i < 20;$i++){
            $array[$i] = rand(1,50);
        }
        echo "Tablica:\n";
        for($i = 0;$i < 20;$i++){
            echo $array[$i] . " ";
        }
        echo"\n";
        $max = $array[0];
        $i = 1;
        do{
            if($array[$i] > $max){
                $max = $array[$i];
            }
            $i++;
        }while($i < 20);
        return $max;
    }
    function foreach_ver(){
        $array = array();
        for($i = 0;$i < 20;$i++){
            $array[$i] = rand(1,50);
        }
        echo "Tablica:\n";
        for($i = 0;$i < 20;$i++){
            echo $array[$i] . " ";
        }
        echo"\n";
        $max = $array[0];
        foreach ($array as $num){
            if($num > $max){
                $max = $num;
            }
        }
        return $max;
    }

    $max = for_ver();
    echo $max . "\n";
    $max = while_ver();
    echo $max . "\n";
    $max = do_while_ver();
    echo $max . "\n";
    $max = foreach_ver();
    echo $max . "\n";
?>
