<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie2</title>
</head>
<body>
    <?php
        count_entries();
    ?>
</body>
</html>

<?php
    function count_entries(){
        $path = "D:/xampp/htdocs/lab4/zadanie2.txt";
        if(!file_exists($path)){
            $file = fopen($path,"w");
            file_put_contents($path,"1");
        }
        else{
            $num = file($path);
            $num[0] = (int)$num[0];
            $num[0]++;
            file_put_contents($path,(string)$num[0]);
        }
    }

?>