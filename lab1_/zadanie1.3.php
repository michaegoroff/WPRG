<?php
    function unnecessary_censorship(string $zdanie, array $censored){
        foreach ($censored as $word){
             if (str_contains($zdanie, $word)) {
                $replace = "";
                for ($i = 0; $i < strlen($word); $i++) {
                    $replace .= "*";
                }
                $zdanie = str_replace($word, $replace, $zdanie);
            }
        }
        echo $zdanie;
    }
    $censored = array("word1","word2","word3");
    unnecessary_censorship("A sentence to word1 censore word2 word3",$censored);
?>
