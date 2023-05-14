<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 4</title>
</head>
<body>
    <?php
        load_page();
    ?>
</body>
</html>

<?php
    function load_page(){
        $ips = file("D:/xampp/htdocs/lab4/zadanie4.txt");
        foreach ($ips as $line){
            if(str_ends_with($line,"\n")){
                str_replace("\n","",$line);
            }

        }
        if(in_array($_SERVER['REMOTE_ADDR'],$ips)){
            include 'zadanie4_1.php';
        }
        else{
            echo "<p>" . "Default Page" . "</p>";
        }

    }
?>