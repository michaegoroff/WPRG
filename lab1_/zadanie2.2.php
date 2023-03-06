<?php
    function table(string $word){
        $array = array("English"=>"England","French"=>"France","German"=>"Germany",
                        "Polish"=>"Poland","Italian"=>"Italy","Spanish"=>"Spain",
                        "Chinese"=>"China","Japanese"=>"Japan","Ukrainian"=>"Ukraine",
                        "Swedish"=>"Sweden","Finnish"=>"Finland","Korean"=>"Korea");
        foreach($array as $key => $key_value){
            if($word == $key) {
                echo "You are from " . $key_value;
            }
        }
    }

    echo "Who are you?\n";
    $word = readline();
    table($word);
    ?>
