#!/usr/bin/php
<?PHP

function get_name_day($p)
{
    //preg_match_all("/ (^[L|l]undi|^[V|v]endredi) /", $p, $array);
    
    if (preg_match("/ [[L|l]un| [M|m]ar | [M|m]ercre |[J|j]eu | [V|v]endre]di /", $p))
        echo "O.U.I";
    else 
        echo "N.O.N";
    //print_r($array);
}

function impr($tab)
{
    $i = 0;
    foreach ($tab as $v)
    {
        echo $v;
        if ($i < count($tab) - 1)
             echo " ";
        $i++;
    }
    echo "\n";
}

//$var = explode(" ", $argv[1]);
//$tab = print_r($argv[1]);
get_name_day($argv[1]);
?>