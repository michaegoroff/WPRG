<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie3</title>
</head>
<body>
    <?php
        $arr = array(
                array("adres1","opis1"),
                array("adres2","opis2"),
                array("adres3","opis3"),
                array("adres4","opis4"),
                array("adres5","opis5"),
        );
        create_list($arr);
    ?>
</body>
</html>

<?php
    function create_list($arr){
        $str = "";
        $path = "D:/xampp/htdocs/lab4/zadanie3.txt";
        foreach($arr as $line){
            $str .= ("http://" . $line[0] . "/;" . $line[1] . "\n");
        }
        $file = fopen($path,"w");
        file_put_contents($path,$str);
        echo "File created\n";
    }
?>