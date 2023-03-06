<?php
    function pesel_decoder(string $pesel){
        $rr = "";
        $mm = "";
        $dd = "";
        for($i = 0;$i < strlen($pesel);$i++){
            if($i < 2){
                $rr .= $pesel[$i];
            }
            else if($i >= 2 && $i < 4){
                $mm .= $pesel[$i];
            }
            else if($i >= 4 && $i < 6){
                $dd .= $pesel[$i];
            }
        }
        $result = $dd . "-" . $mm . "-" . $rr;
        return $result;
    }
    $data = pesel_decoder("021213000101");
    echo $data;
?>
