<?php
    function triangle($h,$base){
        return ($h * $base)/2.0;
    }
    function rectangle($a,$b){
        return ($a*$b);
    }
    function trap($base,$top,$h){
        return ($base+$top)/2.0 * $h;
    }
    function area_calculator(){
        echo "Wpisz rodzaj figury(trapez[a],trójkąt[b],prostokąt[c]\n)";
        $fig_type = readline();
        switch ($fig_type){
            case "a":
                echo "base:\n";
                $base = readline();
                echo "top:\n";
                $top = readline();
                echo "h:\n";
                $h = readline();
                $area = trap($base,$top,$h);
                break;
            case "b":
                echo "base:\n";
                $base = readline();
                echo "h:\n";
                $h = readline();
                $area = triangle($h,$base);
                break;

            case "c":
                echo "a:\n";
                $a = readline();
                echo "b:\n";
                $b = readline();
                $area = rectangle($a,$b);
                break;
            default:
                echo "Niepoprawna litera";
                return;
        }
        return $area;
    }
    $area = area_calculator();
    echo $area;
?>
